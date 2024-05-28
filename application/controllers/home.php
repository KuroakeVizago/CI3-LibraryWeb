<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Home Page';
		$data['active_menu'] = 'home';
		$data['content'] = $this->load->view('home_view', '', true);
		$this->load->view('template/template', $data);
	}
}
