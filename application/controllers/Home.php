<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');

		// Check if the user is logged in
		if (!$this->session->userdata('username')) {
			// If not logged in, redirect to the login page
			$this->session->set_flashdata('error', 'You must log in to access this page.');
			redirect('login');
		}
	}

	public function index() {
		$data['title'] = 'Home Page';
		$data['active_menu'] = 'home';
		$data['content'] = $this->load->view('home_view', '', true);
		$data['user'] = $this->session->userdata('username');
		$this->load->view('template/template', $data);
	}
}
