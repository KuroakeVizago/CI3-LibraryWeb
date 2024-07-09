<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('UserModel');

	}

	public function index() {
		$this->load->view('auth/login_view');
	}

	public function register() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if (!$this->form_validation->run()) {
			$this->load->view('auth/register_view');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Check if the user already exists
			if ($this->UserModel->user_exists($username)) {
				$this->session->set_flashdata('error', 'Username already taken. Please choose another.');
				$this->load->view('auth/register_view');
			} else {

				// Create the user
				$this->UserModel->create_user($username, $password);
				$this->session->set_flashdata('success', 'Registration successful. You can now log in.');
				redirect('login');
			}
		}
	}


	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login_view');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Verify the user
			$auth_user = $this->UserModel->verifyLogin($username, $password);

			if ($auth_user) {
				$this->session->set_userdata('username', $username);
				redirect('');
			} else {
				$this->session->set_flashdata('error', 'Invalid username or password');
				redirect('login');
			}
		}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		redirect('login');
	}
}
?>
