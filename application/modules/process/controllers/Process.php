<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Process extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Process_model');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_data'] = $this->Process_model->getData();

                $page_data['page_name'] = 'Process';

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
        $this->Process_model->updateData('needs', $id, $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Dihapus');

        redirect('process/list');
    }

    public function approve_data()
    {
        $id = $this->input->post('id', TRUE);

        $data_loans = $this->Process_model->getDatabyWhere($id);

        $end_date_loans = $data_loans[0]->end_date;
        $current_date = date('Y-m-d');
        $diff = date_diff(date_create($end_date_loans), date_create($current_date));

        if ($diff->days > 0) {
            // Proses Telat Pengembalian
            $loans['status'] = 'late';
            $loans['notes'] = $this->input->post('notes', TRUE);
            $loans['return_date'] = date('Y-m-d');
            $this->Process_model->updateData('loans', $id, $loans);

            // Insert History
            $history['loans_id'] = $id;
            $history['user_id'] = $this->session->userdata('id');
            $history['status'] = 'late';
            $history['date'] = date('Y-m-d H:i:s');

            $this->Process_model->insertData('loans_history', $history);

            $this->session->set_flashdata('success', 'Alat yang dikembalikan telat dari waktu yang telah ditentukan');
        } else {
            // Proses Tepat Waktu Pengembalian
            $loans['status'] = 'returned';
            $loans['notes'] = $this->input->post('notes', TRUE);
            $loans['return_date'] = date('Y-m-d H:i:s');
            $this->Process_model->updateData('loans', $id, $loans);

            // Insert History
            $history['loans_id'] = $id;
            $history['user_id'] = $this->session->userdata('id');
            $history['status'] = 'late';
            $history['date'] = date('Y-m-d H:i:s');

            $this->Process_model->insertData('loans_history', $history);

            $this->session->set_flashdata('success', 'Alat yang dikembalikan sesuai dengan waktunya');
        }

        redirect('dashboard/process/list');
    }
}