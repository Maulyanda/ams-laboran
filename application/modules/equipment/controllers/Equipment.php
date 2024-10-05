<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Equipment extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('Equipment_model');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_equipment_data'] = $this->Equipment_model->GetDataEquipment();
                $page_data['get_category_data_active'] = $this->Equipment_model->GetDataCategory();

                $page_data['page_name'] = 'equipment';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add_equipment'] = 'Tambah Equipment';
                $page_data['lang_edit_equipment'] = 'Ubah Equipment';
                $page_data['lang_delete_equipment'] = 'Hapus Equipment';
                $page_data['lang_search_equipment'] = 'Search Equipment';

                $page_data['lang_equipment_name'] = 'Equipment Name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';

                $page_data['lang_choose_category'] = 'Choose Category';
                $page_data['lang_equipment_category'] = 'Category Equipment';
                $page_data['lang_equipment_name'] = 'Nama Alat';
                $page_data['lang_equipment_description'] = 'Deskripsi';
                $page_data['lang_equipment_qty'] = 'Stock Tersedia';

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

    function insert_equipment()
    {
        $data = array(
            'categories_id' => $this->input->post('categories_id', TRUE),
            'name' => ucwords($this->input->post('name', TRUE)),
            'description' => ucwords($this->input->post('description', TRUE)),
            'qty' => $this->input->post('qty', TRUE),
            'is_active' => $this->input->post('is_active', TRUE)
        );

        $this->Equipment_model->insertData('equipment', $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Ditambahkan');

        redirect('equipment/list');
    }

    function delete_equipment()
    {
        $id = $this->input->post('id', TRUE);
        $data = array(
            'is_active' => '0',
            'is_delete' => '1',
        );
        $this->Equipment_model->DeleteData('equipment', $id, $data);
        $this->session->set_flashdata('success', 'Alat Berhasil Dihapus');

        redirect('equipment/list');
    }

    // CATEGORY equipment
    public function category()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['get_category_data'] = $this->Equipment_model->GetDataCategory();

                $page_data['page_name'] = 'Category equipment';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add_category'] = 'Tambah Kategori';
                $page_data['lang_edit_category'] = 'Ubah Kategori';
                $page_data['lang_delete_category'] = 'Hapus Kategori';
                $page_data['lang_search_category'] = 'Search Category';

                $page_data['lang_category_name'] = 'Nama Kategori';
                $page_data['lang_category_description'] = 'Deskripsi kategori';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';

                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('category', $page_data);
                $this->load->view("include/backend/sidebar");
                $this->load->view("include/backend/panel");
                $this->load->view("include/backend/footer");
                $this->load->view("include/alert");
            } else {
                $this->session->set_flashdata('success', 'Upsss!!!, Anda tidak mempunyai akses untuk halaman');
                redirect('admin/home');
            }
        } else {
            $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya.');
            redirect('admin/login');
        }
    }

    function insert_category()
    {
        $data = array(
            'name' => ucwords($this->input->post('name', TRUE)),
            'description' => ucwords($this->input->post('description', TRUE)),
            'is_active' => $this->input->post('is_active', TRUE),
        );

        $this->Equipment_model->insertData('categories', $data);
        $this->session->set_flashdata('success', 'Kategori Berhasil Ditambahkan');

        redirect('equipment/category');
    }

    function delete_category()
    {
        $id = $this->input->post('id', TRUE);
        $data = array(
            'is_active' => '0',
            'is_delete' => '1',
        );
        $this->Equipment_model->DeleteData('categories', $id, $data);
        $this->session->set_flashdata('success', 'Kategori Berhasil Dihapus');

        redirect('equipment/category');
    }
}