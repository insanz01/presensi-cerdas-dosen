<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('CRUDModel', 'crud');
		$this->load->model('AuthModel', 'auth');
	}

	public function index() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('auth/template/header');
			$this->load->view('auth/index');
			$this->load->view('auth/template/footer');
		} else {
			$data = $this->input->post();

			if($this->auth->login($data)) {
				redirect('App');
			} else {
				redirect('Auth');
			}
		}
	}

	public function login() {
		redirect('Auth');
	}

	public function logout() {
		$this->session->unset_userdata('user_id');

		redirect('Auth');
	}
}