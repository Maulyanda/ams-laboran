<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Needs extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Needs_model');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_data'] = $this->Needs_model->getData();

                $page_data['page_name'] = 'Needs';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add'] = 'Tambah Kebutuhan';
                $page_data['lang_edit'] = 'Ubah Kebutuhan';
                $page_data['lang_delete'] = 'Hapus Kebutuhan';
                $page_data['lang_search'] = 'Search Kebutuhan';

                $page_data['lang_name'] = 'Name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';

                $page_data['lang_table_name'] = 'Kebutuhan';
                $page_data['lang_table_description'] = 'Deskripsi Kebutuhan';

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

    function insert_data()
    {
        $data = array(
            'name' => ucwords($this->input->post('name', TRUE)),
            'description' => ucwords($this->input->post('description', TRUE)),
        );

        $this->Needs_model->insertData('needs', $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Ditambahkan');

        redirect('needs/list');
    }

    function update_data()
    {
        $id = $this->input->post('id', TRUE);
        $data = array(
            'is_active' => '0',
            'is_delete' => '1',
        );
        $this->Needs_model->updateData('needs', $id, $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Dihapus');

        redirect('needs/list');
    }
}