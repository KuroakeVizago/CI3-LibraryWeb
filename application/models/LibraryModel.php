<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LibraryModel extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $query = $this->db->get('books');
        return $query->result_array();
    }

	public function search_books($query)
	{
		$this->db->like('title', $query);
		$query = $this->db->get('books');
		return $query->result_array();
	}

	public function insert_library($data) {
		if ($this->db->insert('books', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_library($id, $data) {
		// Update item in the database
		$this->db->where('id', $id);
		return $this->db->update('books', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('books');
	}
}
