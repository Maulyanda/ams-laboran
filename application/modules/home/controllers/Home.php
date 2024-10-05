<?php defined("BASEPATH") or exit("No direct script access allowed");

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'modelHome');
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        if ($this->session->userdata('is_login') == TRUE) {

            $this->load->view("include/backend/head");
            $this->load->view("include/backend/top-header");
            $this->load->view('index');
            $this->load->view("include/backend/sidebar");
            $this->load->view("include/backend/panel");
            $this->load->view("include/backend/footer");
            $this->load->view("include/alert");
        } else {
            $this->session->set_flashdata('success', 'Upsss!!!, Login dulu ya.');
            redirect('dashboard/login');
        }
    }
}
