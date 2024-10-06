<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waiting extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Waiting_model');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_data'] = $this->Waiting_model->getData();

                $page_data['page_name'] = 'Waiting';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add'] = 'Tambah Kebutuhan';
                $page_data['lang_edit'] = 'Ubah Kebutuhan';
                $page_data['lang_delete'] = 'Hapus Kebutuhan';
                $page_data['lang_search'] = 'Search Kebutuhan';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('index', $page_data);
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

    function update_data()
    {
        $id = $this->input->post('id', TRUE);
        $data = array(
            'is_active' => '0',
            'is_delete' => '1',
        );
        $this->Waiting_model->updateData('needs', $id, $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Dihapus');

        redirect('waiting/list');
    }

    public function approve_data()
    {
        $id = $this->input->post('id', TRUE);

        // Proses Approved
        $loans['status'] = 'loaned';
        $this->Waiting_model->updateData('loans', $id, $loans);

        // Insert History
        $history['loans_id'] = $id;
        $history['user_id'] = $this->session->userdata('id');
        $history['status'] = 'loaned';
        $history['date'] = date('Y-m-d H:i:s');

        $this->Waiting_model->insertData('loans_history', $history);

        $this->session->set_flashdata('success', 'Alat sudah dipinjamkan');
        redirect('dashboard/waiting/list');
    }

    public function rejected_data()
    {
        $id = $this->input->post('id', TRUE);

        $detail_loans = $this->Waiting_model->detail_loans($id);
        // Tambah Stock
        foreach ($detail_loans as $data) {
            $equipment = $this->Waiting_model->getEquipment($data->equipment_id);
            $equipment_id = $data->equipment_id;
            $sisa = $equipment->qty + $data->qty;
            $data = array(
                'qty' => $sisa
            );
            $this->Waiting_model->updateData('equipment', $equipment_id, $data);
        }

        // Update Loans
        $loans['status'] = 'rejected';
        $loans['notes'] = $this->input->post('notes', TRUE);
        $this->Waiting_model->updateData('loans', $id, $loans);

        // Insert History
        $history['loans_id'] = $id;
        $history['user_id'] = $this->session->userdata('id');
        $history['status'] = 'rejected';
        $history['date'] = date('Y-m-d H:i:s');

        $this->Waiting_model->insertData('loans_history', $history);

        $this->session->set_flashdata('success', 'Alat batal dipinjamkan');
        redirect('dashboard/waiting/list');
    }
}