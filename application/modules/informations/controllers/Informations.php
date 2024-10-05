<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informations extends CI_Controller
{
     private $contoller_name;
     private $function_name;

     function __construct()
     {
          parent::__construct();
          $this->contoller_name = $this->router->class;
          $this->function_name = $this->router->method;
          $this->load->model('Dashboard_model');
          $this->load->model('Informations_model');
     }

     public function index()
     {
          if ($this->session->userdata('is_login') == TRUE) {
               $user_level = $this->session->userdata('users_level');
               $check_permission =  $this->Dashboard_model->check_permissions($this->contoller_name, $this->function_name, $user_level);

               $data['informations'] =  $this->Informations_model->get_informations();

               if ($check_permission->num_rows() == 1) {
                    $this->load->view("include/backend/head");
                    $this->load->view("include/backend/top-header");
                    $this->load->view('index', $data);
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

     function upload_content($image_name)
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES[$image_name]['name'];
               $tmpname = $_FILES[$image_name]['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'Content-' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = '.assets/img/content/';
               $config['upload_url'] =  base_url() . 'assets/img/content/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/img/content/" . $newname);
               return $newname;
          }
     }

     function upload_logo($image_name)
     {
          foreach ($_FILES as $name => $fileInfo) {
               $filename = $_FILES[$image_name]['name'];
               $tmpname = $_FILES[$image_name]['tmp_name'];
               $exp = explode('.', $filename);
               $ext = end($exp);
               $newname =  'Image-' . date('Ymdhis') . "." . $ext;
               $config['upload_path'] = '.assets/img/logo/';
               $config['upload_url'] =  base_url() . 'assets/img/logo/';
               $config['allowed_types'] = "png|jpg|jpeg";
               $config['max_size'] = '2000';
               $config['file_name'] = $newname;
               $this->load->library('upload', $config);
               move_uploaded_file($tmpname, "assets/img/logo/" . $newname);
               return $newname;
          }
     }

     public function update_informations()
     {
          $id = $this->input->post('id');

          $content_image = '';
          $favicon_logo = '';
          $base_logo = '';
          $colored_logo = '';
          $footer_logo = '';

          if (!empty($_FILES['content_image']['name'])) {
               $image_name = 'content_image';
               $newname = $this->upload_content($image_name);
               $data['content_image'] = $newname;
               $content_image = $newname;
               $update['content_image'] = 'assets/img/content/' . $content_image;
          }

          if (!empty($_FILES['favicon_logo']['name'])) {
               $image_name = 'favicon_logo';
               $newname = $this->upload_logo($image_name);
               $data['favicon_logo'] = $newname;
               $favicon_logo = $newname;
               $update['favicon_logo'] = 'assets/img/logo/' . $favicon_logo;
          } else {
               $update['favicon_logo'] = $this->input->post('favicon_logo_old');
          }

          if (!empty($_FILES['base_logo']['name'])) {
               $image_name = 'base_logo';
               $newname = $this->upload_logo($image_name);
               $data['base_logo'] = $newname;
               $base_logo = $newname;
               $update['base_logo'] = 'assets/img/logo/' . $base_logo;
          }

          if (!empty($_FILES['colored_logo']['name'])) {
               $image_name = 'colored_logo';
               $newname = $this->upload_logo($image_name);
               $data['colored_logo'] = $newname;
               $colored_logo = $newname;
               $update['colored_logo'] = 'assets/img/logo/' . $colored_logo;
          }

          if (!empty($_FILES['footer_logo']['name'])) {
               $image_name = 'footer_logo';
               $newname = $this->upload_logo($image_name);
               $data['footer_logo'] = $newname;
               $footer_logo = $newname;
               $update['footer_logo'] = 'assets/img/logo/' . $footer_logo;
          }

          $update['name'] = $this->input->post('name');
          $update['desc'] = $this->input->post('desc');
          $update['title'] = $this->input->post('title');
          $update['sub_title'] = $this->input->post('sub_title');
          $update['email'] = $this->input->post('email');
          $update['whatsapp'] = $this->input->post('whatsapp');
          $update['address'] = $this->input->post('address');
          $update['facebook_link'] = $this->input->post('facebook_link');
          $update['instagram_link'] = $this->input->post('instagram_link');
          $update['linkedin_link'] = $this->input->post('linkedin_link');
          $update['playstore_link'] = $this->input->post('playstore_link');
          $update['appstore_link'] = $this->input->post('appstore_link');

          $this->Informations_model->update_informations($update, $id);

          $this->session->set_userdata('apps_name', $update['name']);
          $this->session->set_userdata('apps_title', $update['title']);
          $this->session->set_userdata('apps_favicon', $update['favicon_logo']);

          redirect('informations');
     }
}
