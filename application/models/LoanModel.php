<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoanModel extends CI_Model {


	public function __construct()
	{
		$this->load->database();
	}

	public function get()
	{
		$query = $this->db->get('loans');
		return $query->result_array();
	}

	public function search_title($query)
	{
		$this->db->select('loans.id, books.title, books.author, books.genre, books.published_year, borrowers.name as borrowed_by, loans.borrow_date, loans.due_date, loans.return_date');
		$this->db->from('loans');
		$this->db->join('books', 'books.id = loans.id_book');
		$this->db->join('borrowers', 'borrowers.id = loans.id_borrower');
		$this->db->like('books.title', $query);
		$result = $this->db->get();
		return $result->result_array();
	}

	public function search_borrower($query)
	{
		$this->db->select('loans.id, books.title, books.author, books.genre, books.published_year, borrowers.name as borrowed_by, loans.borrow_date, loans.due_date, loans.return_date');
		$this->db->from('loans');
		$this->db->join('books', 'books.id = loans.id_book');
		$this->db->join('borrowers', 'borrowers.id = loans.id_borrower');
		$this->db->like('borrowers.name', $query);
		$result = $this->db->get();
		return $result->result_array();
	}

	public function insert($data) {
		if ($this->db->insert('loans', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update($id, $data) {
		// Update item in the database
		$this->db->where('id', $id);
		return $this->db->update('loans', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('loans');
	}
}
