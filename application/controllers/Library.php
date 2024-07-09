<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('LibraryModel');

		// Check if the user is logged in
		if (!$this->session->userdata('username')) {
			// If not logged in, redirect to the login page
			$this->session->set_flashdata('error', 'You must log in to access this page.');
			redirect('login');
		}
    }

    public function index()
    {
		$data['title'] = 'List Library';
		$data['active_menu'] = 'data_Library';
		$data['library'] = $this->LibraryModel->get();
		$data['user'] = $this->session->userdata('username');
		$data['content'] = $this->load->view('Library_view', $data, true);
        $this->load->view('template/template', $data);
    }

	public function store()
	{
		$this->form_validation->set_rules('title', 'Judul Buku', 'required');
		$this->form_validation->set_rules('author', 'Penulis', 'required');
		$this->form_validation->set_rules('genre', 'Genre', 'required');
		$this->form_validation->set_rules('published_year', 'Tahun Terbit', 'required|integer|greater_than[1000]|less_than_equal_to[9999]');
		$this->form_validation->set_rules('borrowed_by', 'Dipinjam Oleh', 'trim');
		$this->form_validation->set_rules('borrow_date', 'Tanggal Pinjam', 'trim');
		$this->form_validation->set_rules('due_date', 'Tanggal Jatuh Tempo', 'trim');
		$this->form_validation->set_rules('return_date', 'Tanggal Kembali', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('Library');
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'author' => $this->input->post('author'),
				'genre' => $this->input->post('genre'),
				'published_year' => $this->input->post('published_year'),
				'borrowed_by' => $this->input->post('borrowed_by'), // Nama peminjam
				'borrow_date' => $this->input->post('borrow_date'), // Tanggal peminjaman
				'due_date' => $this->input->post('due_date'), // Tanggal jatuh tempo pengembalian
				'return_date' => $this->input->post('return_date') // Tanggal pengembalian
			);

			if ($this->LibraryModel->insert_library($data)) {
				$this->session->set_flashdata('success', 'Library created successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to create Library.');
			}

			redirect('Library');
		}
	}

	public function update()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$id_Library = $this->input->post('id');

			// Aturan Validasi
			$this->form_validation->set_rules('title', 'Judul Buku', 'required');
			$this->form_validation->set_rules('author', 'Penulis', 'required');
			$this->form_validation->set_rules('genre', 'Genre', 'required');
			$this->form_validation->set_rules('published_year', 'Tahun Terbit', 'required|integer|greater_than[1000]|less_than_equal_to[9999]');
			$this->form_validation->set_rules('borrowed_by', 'Dipinjam Oleh', 'trim');
			$this->form_validation->set_rules('borrow_date', 'Tanggal Pinjam', 'trim');
			$this->form_validation->set_rules('due_date', 'Tanggal Jatuh Tempo', 'trim');
			$this->form_validation->set_rules('return_date', 'Tanggal Kembali', 'trim');

			if ($this->form_validation->run() === TRUE) {
				$data = array(
					'title' => $this->input->post('title'),
					'author' => $this->input->post('author'),
					'genre' => $this->input->post('genre'),
					'published_year' => $this->input->post('published_year'),
					'borrowed_by' => $this->input->post('borrowed_by'),
					'borrow_date' => $this->input->post('borrow_date'),
					'due_date' => $this->input->post('due_date'),
					'return_date' => $this->input->post('return_date')
				);

				if ($this->LibraryModel->update_library($id_Library, $data)) {
					$this->session->set_flashdata('success', 'Library updated successfully.');
				}
				else {
					$this->session->set_flashdata('error', 'Failed to update Library.');
				}
			}
			else {
				$this->session->set_flashdata('error', validation_errors());
			}

		} else {
			$this->session->set_flashdata('error', 'Invalid request.');
		}

		redirect('Library');
	}

	public function delete()
	{
		$id_Library = $this->input->get('id');

		if (!empty($id_Library)) {
			$this->LibraryModel->delete($id_Library);
			$this->session->set_flashdata('success', 'Library deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'ID parameter is required.');
		}

		redirect('Library');

	}
}
