<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Incoming_model');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_data'] = $this->Incoming_model->getData();

                $page_data['page_name'] = 'Incoming';

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
        $this->Incoming_model->updateData('needs', $id, $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Dihapus');

        redirect('incoming/list');
    }

    public function approve_data()
    {
        $id = $this->input->post('id', TRUE);

        // Cek Stock
        $detail_loans = $this->Incoming_model->detail_loans($id);
        foreach ($detail_loans as $data) {
            $equipment = $this->Incoming_model->getEquipment($data->equipment_id);
            if ($data->qty > $equipment->qty) {
                $this->session->set_flashdata('success', 'Qty melebihi Stock, Silahkan untuk di rejected');
                redirect('incoming/list');
            }
        }

        // Kurangi Stock
        foreach ($detail_loans as $data) {
            // var_dump($data->equipment_id);
            $equipment = $this->Incoming_model->getEquipment($data->equipment_id);
            $equipment_id = $data->equipment_id;
            $sisa = $equipment->qty - $data->qty;
            $data = array(
                'qty' => $sisa
            );
            $this->Incoming_model->updateData('equipment', $equipment_id, $data);
        }

        // Update Loans
        $loans['status'] = 'approved';
        $this->Incoming_model->updateData('loans', $id, $loans);

        // Insert History
        $history['loans_id'] = $id;
        $history['user_id'] = $this->session->userdata('id');
        $history['status'] = 'approved';
        $history['date'] = date('Y-m-d H:i:s');

        $this->Incoming_model->insertData('loans_history', $history);

        $this->session->set_flashdata('success', 'Data Peminjaman Berhasil di Approved');
        redirect('dashboard/incoming/list');
    }

    public function rejected_data()
    {
        $id = $this->input->post('id', TRUE);

        // Proses Rejected
        $loans['status'] = 'rejected';
        $loans['notes'] = $this->input->post('notes', TRUE);
        $this->Incoming_model->updateData('loans', $id, $loans);

        // Insert History
        $history['loans_id'] = $id;
        $history['user_id'] = $this->session->userdata('id');
        $history['status'] = 'rejected';
        $history['date'] = date('Y-m-d H:i:s');

        $this->Incoming_model->insertData('loans_history', $history);

        $this->session->set_flashdata('success', 'Data Peminjaman Berhasil di Reject');
        redirect('dashboard/incoming/list');
    }

    public function view()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_data'] = $this->Incoming_model->getDataBy($this->session->userdata('id'));

                $page_data['page_name'] = 'Incoming';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add'] = 'Tambah';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_search'] = 'Search';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('view', $page_data);
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

    public function cancel_data()
    {
        $id = $this->input->post('id', TRUE);

        $check_status = $this->Incoming_model->CheckStatus($id);

        if ($check_status[0]->status == 'submission') {
            // Proses Cancel
            $loans['status'] = 'cancel';
            $loans['notes'] = $this->input->post('notes', TRUE);
            $this->Incoming_model->updateData('loans', $id, $loans);

            // Insert History
            $history['loans_id'] = $id;
            $history['user_id'] = $this->session->userdata('id');
            $history['status'] = 'cancel';
            $history['date'] = date('Y-m-d H:i:s');

            $this->Incoming_model->insertData('loans_history', $history);

            $this->session->set_flashdata('success', 'Data Peminjaman Berhasil di Cancel');
            redirect('dashboard/incoming/view');
        } else {
            $this->session->set_flashdata('success', 'Cancel tidak dapat dilakukan');
            redirect('dashboard/incoming/view');
        }
    }
}