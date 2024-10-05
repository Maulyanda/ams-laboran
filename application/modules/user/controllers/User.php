<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $contoller_name;
    private $function_name;

    function __construct()
    {
        parent::__construct();
        $this->contoller_name = $this->router->class;
        $this->function_name = $this->router->method;
        $this->load->model('User_model', 'modelUser');
        $this->load->model('Dashboard_model');
    }

    public function list()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $user_level = $this->session->userdata('users_level');
            $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);
            if ($check_permission->num_rows() == 1) {
                $page_data['getuser_data'] = $this->modelUser->GetDataUsers();
                $page_data['getrole_data'] = $this->modelUser->GetDataRoles();

                $page_data['page_name'] = 'Users';

                $page_data['lang_submit'] = 'Simpan';
                $page_data['lang_edit'] = 'Ubah';
                $page_data['lang_delete'] = 'Hapus';
                $page_data['lang_close'] = 'Close';

                $page_data['lang_add_user'] = 'Tambah Users';
                $page_data['lang_edit_user'] = 'Ubah Users';
                $page_data['lang_delete_user'] = 'Hapus Users';
                $page_data['lang_search_user'] = 'Search Users';
                $page_data['lang_user_name'] = 'Users Name';
                $page_data['lang_status'] = 'Status';
                $page_data['lang_active'] = 'Active';
                $page_data['lang_inactive'] = 'Inactive';
                $page_data['lang_choose_status'] = 'Choose Status';
                $page_data['lang_choose_level'] = 'Choose Level';

                $page_data['lang_first_name'] = 'First Name';
                $page_data['lang_last_name'] = 'Last Name';
                $page_data['lang_username'] = 'NIP/NPM';
                $page_data['lang_level'] = 'Level User';
                $page_data['lang_email'] = 'Email Address';
                $page_data['lang_password'] = 'Password';


                $this->load->view("include/backend/head");
                $this->load->view("include/backend/top-header");
                $this->load->view('index', $page_data);
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

    function insert_user()
    {
        $data = array(
            'first_name' => ucwords($this->input->post('first_name', TRUE)),
            'last_name' => ucwords($this->input->post('last_name', TRUE)),
            'username' => ucwords($this->input->post('username', TRUE)),
            'email' => ucwords($this->input->post('email', TRUE)),
            'password' => md5($this->input->post('password')),
            'users_level' => ucwords($this->input->post('user_level', TRUE)),
            'is_active' => $this->input->post('is_active', TRUE),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->modelUser->insertData('users', $data);
        $this->session->set_flashdata('success', 'Users Berhasil Ditambahkan');

        redirect('user/list');
    }

    function approve_or_reject_user()
    {
        $id = $this->input->post('id', TRUE);

        if ($this->input->post('status', TRUE) == 'approved') {
            $data = array(
                'is_active' => '1',
                'users_level' => $this->input->post('user_level', TRUE),
                'status' => $this->input->post('status', TRUE)
            );
        } else {
            $data = array(
                'is_active' => '0',
                'status' => $this->input->post('status', TRUE)
            );
        }


        $this->modelUser->updateUser('users', $id, $data);
        $this->session->set_flashdata('success', 'Users Berhasil di ' + $this->input->post('status', TRUE));

        redirect('user/list');
    }
}