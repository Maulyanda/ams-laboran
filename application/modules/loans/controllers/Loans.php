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

                    $this->load->view("include/backend/head");
                    $this->load->view("include/backend/top-header");
                    $this->load->view('index', $x);
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
}