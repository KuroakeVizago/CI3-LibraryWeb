<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BorrowerModel extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get()
	{
		$query = $this->db->get('borrowers');
		return $query->result_array();
	}

	public function search_borrower_name($query)
	{
		$this->db->like('name', $query);
		$result = $this->db->get('borrowers');
		return $result->result_array();
	}

	public function insert($data)
	{
		if ($this->db->insert('borrowers', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id, $data)
	{
		// Update item in the database
		$this->db->where('id', $id);
		return $this->db->update('borrowers', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('borrowers');
	}
}
