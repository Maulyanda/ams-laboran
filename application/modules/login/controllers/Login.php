<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// LOAD MODELS
		$this->load->model('Login_model');
		$this->load->model('Info_model');
	}

	function index()
	{
		$data['info'] = $this->Info_model->get_informations();

		$this->load->view('index', $data);
		$this->load->view('include/alert');
	}

	public function proses()
	{
		$username = $this->input->post('username', TRUE);
		$password = MD5($this->input->post('password', TRUE));

		if ($this->Login_model->proses($username, $password)) {
			redirect('dashboard/home');
		} else {
			redirect('dashboard/login');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('code');
		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('user_data');
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('dashboard/login');
	}
}