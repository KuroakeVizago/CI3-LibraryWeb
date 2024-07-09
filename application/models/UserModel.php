<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function __construct() {
		$this->load->database();

	}

	public function get_user($username) {
		$query = $this->db->get_where('users', array('username' => $username));

		return $query->row_array();
	}
	public function verifyLogin($user, $password) {
		$query = $this->db->where(['username'=> $user])
			->get('users');

		if ($query->num_rows() == 1) {
			// hash fetched from db
			$record = $query->row();
			$dbPassword = $record->password;

			// Hash length showing 60
			echo strlen($dbPassword);

			if (md5($password) == $dbPassword) {
				return true;
			} else {
				$this->session->set_flashdata('error', $dbPassword);
				return false;
			}
		}
		return false;

	}
	public function user_exists($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		return $query->num_rows() > 0;
	}
	public function create_user($username, $password) {
		$data = array(
			'username' => $username,
			'password' => md5($password)
		);
		return $this->db->insert('users', $data);
	}
}
?>
