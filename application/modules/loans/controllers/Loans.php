<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loans extends CI_Controller
{
     private $contoller_name;
     private $function_name;

     function __construct()
     {
          parent::__construct();
          $this->contoller_name = $this->router->class;
          $this->function_name = $this->router->method;
          $this->load->model('Loans_model', 'modelLoans');
          $this->load->model('Dashboard_model');
     }

     public function index()
     {
          if ($this->session->userdata('is_login') == TRUE) {
               $user_level = $this->session->userdata('users_level');
               $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
               if ($check_permission->num_rows() == 1) {

                    $x['equipment'] = json_encode($this->modelLoans->dataEquipment());
                    $x['needs'] = $this->modelLoans->dataNeeds();
                    $x['courses'] = $this->modelLoans->dataCourses();

                    $this->load->view("include/backend/head");
                    $this->load->view("include/backend/top-header");
                    $this->load->view('index', $x);
                    $this->load->view("include/backend/sidebar");
                    $this->load->view("include/backend/panel");
                    $this->load->view("include/backend/footer");
                    $this->load->view("include/alert");
               } else {
                    $this->session->set_flashdata('success', 'Upsss!!!, Anda tidak mempunyai akses untuk halaman');
                    redirect('dashboard/home');
               }
          } else {
               $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya.');
               redirect('dashboard/login');
          }
     }

     public function data_loans()
     {
          $id = $this->session->userdata('id');

          $getLoans = $this->modelLoans->getLoans($id);

          $no = 1;
          $data = array();

          foreach ($getLoans as $r) {

               $action = "<a href='" . base_url('dashboard/loans/detail?id=' . $r->id) . "'
               class='btn btn-sm btn-success'><i class='fa fas fa-eye'></i> View</a>";

               $data[] = array(
                    $no++,
                    $r->invoice,
                    $r->start_date,
                    $r->end_date,
                    $r->amount,
                    $r->needs_name,
                    $r->course_name,
                    $r->status,
                    $r->notes,
                    $action
               );
          }

          echo json_encode($data);
     }

     public function getEquipment()
     {
          $json = array();
          $userName =  $this->input->post('query');
          $this->modelLoans->setUserName($userName);
          $getBank = $this->modelLoans->getEquipment();
          foreach ($getBank as $element) {
               $json[] = array(
                    'id' => $element['id'],
                    'code' => $element['code'],
                    'name' => $element['name'],
                    'qty' => $element['qty']
               );
          }
          echo json_encode($json);
     }

     public function dataEquipment()
     {
          if ($this->input->get('searchTerm', TRUE)) {
               $data = $this->modelLoans->dataEquipmentLike($this->input->get('searchTerm', TRUE));
          } else {
               $data = $this->modelLoans->dataEquipment();
          }

          echo json_encode($data);
     }

     public function listEquipment()
     {
          $userName = $this->input->post('searchTerm');
          $geUsers =  $this->modelLoans->listEquipmentLike($userName);

          foreach ($geUsers as $element) {
               $json = array(
                    'equipment_id' => $element['id'],
                    'qty' => $element['qty']
               );
          }
          echo json_encode($json);
     }

     public function insert_loans()
     {
          $qty = count($this->input->post('qty'));
          $sum = 0;
          for ($i = 0; $i < $qty; $i++) {
               $sum += $this->input->post('qty')[$i];
          }

          // Loans
          $loans['user_id'] = $this->input->post('user_id');
          $loans['invoice'] = $this->input->post('invoice_no');
          $loans['start_date'] = $this->input->post('start_date');
          $loans['end_date'] = $this->input->post('end_date');
          $loans['status'] = 'submission';
          $loans['need_id'] = $this->input->post('needs');
          $loans['course_id'] = $this->input->post('courses');
          $loans['objective'] = $this->input->post('objective');
          $loans['amount'] = $sum;

          $this->modelLoans->insert_data('loans', $loans);
          $check = $this->modelLoans->check('loans', $loans['invoice']);

          // Loans History
          $history['loans_id'] = $check[0]->id;
          $history['user_id'] = $this->input->post('user_id');
          $history['status'] = 'submission';
          $history['date'] = date('Y-m-d H:i:s');

          $this->modelLoans->insert_data('loans_history', $history);

          // Loans Item
          $jumlah = count($this->input->post('equipment_id'));
          for ($i = 0; $i < $jumlah; $i++) {
               $data = array(
                    'loans_id' => $check[0]->id,
                    'equipment_id' => $this->input->post('equipment_id')[$i],
                    'qty' => $this->input->post('qty')[$i]
               );

               $this->modelLoans->insert_data("loans_item", $data);
          }

          $this->session->set_flashdata('success', 'Permintaan pengajuan pinjaman telah diajukan, mohon untuk menunggu proses approve dari laboran informatika');

          redirect('dashboard/loans');
     }

     public function detail()
     {
          $id = $this->input->get('id');

          $x['loans'] = $this->modelLoans->get_loans($id);
          $x['loans_history'] = $this->modelLoans->getLoansHistory($id);
          $x['detail_loans'] = $this->modelLoans->detail_loans($id);

          $this->load->view("include/backend/head");
          $this->load->view("include/backend/top-header");
          $this->load->view('detail.php', $x);
          $this->load->view("include/backend/sidebar");
          $this->load->view("include/backend/panel");
          $this->load->view("include/backend/footer");
          $this->load->view("include/alert");
     }
}