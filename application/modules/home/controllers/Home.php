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

            $data['loans'] = $this->modelHome->loans();
            $data['loans_approved'] = $this->modelHome->loans_approved();
            $data['loans_loaned'] = $this->modelHome->loans_loaned();
            $data['loans_completed'] = $this->modelHome->loans_completed();
            $data['loans_rejected'] = $this->modelHome->loans_rejected();

            $this->load->view("include/backend/head");
            $this->load->view("include/backend/top-header");
            $this->load->view('index', $data);
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