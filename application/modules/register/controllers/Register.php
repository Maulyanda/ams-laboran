<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->helper(array('form', 'url'));
          $this->load->library('form_validation');

          $this->load->model('Register_model', 'modelRegister');
          $this->load->model('Info_model');
     }

     function upload_file()
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES['identity_card']['name'];
               $tmpname = $_FILES['identity_card']['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'DATA' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = './assets/upload/';
               $config['upload_url'] =  base_url() . 'assets/upload/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/upload/" . $newname);
               return $newname;
          }
     }

     function index()
     {
          $data['info'] = $this->Info_model->get_informations();

          $this->load->view('index', $data);
          $this->load->view("include/alert");
     }

     public function insert_data()
     {
          $identity_card = '';

          if (!empty($_FILES['identity_card']['name'])) {
               $newname = $this->upload_file();
               $identity_card = $newname;
          }

          $data['identity_card'] = $identity_card;

          $data['first_name'] = $this->input->post('first_name');
          $data['last_name'] = $this->input->post('last_name');
          $data['username'] = $this->input->post('username');
          $data['email'] = $this->input->post('email');
          $data['password'] = MD5($this->input->post('password'));
          $data['is_active'] = 0;
          $data['status'] = 'pending';

          if ($this->modelRegister->insertData('users', $data)) {
               redirect('dashboard/login');
          } else {
               redirect('dashboard/register');
          }
     }
}