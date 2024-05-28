<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MahasiswaModel'); // Memuat model Mahasiswa_model
	}
	public function index()
	{
		$data['mahasiswa'] = $this->MahasiswaModel->get_mahasiswa();

		$keyword = $this->input->get('keyword'); // Ambil kata kunci pencarian dari form
		if (!empty($keyword)) {
			$data['mahasiswa'] = $this->MahasiswaModel->search_mahasiswa($keyword);
		}

		$data["keyword"] = $keyword;

		$data['title'] = 'List Mahasiswa';
		$data['active_menu'] = 'data_mahasiswa';
		$data['content'] = $this->load->view('mahasiswa_view', $data, true);
		$this->load->view('template/template', $data); // Menampilkan data mahasiswa ke view
	}

	public function input_data()
	{
		$this->load->view('input_data');
	}

	public function show_result()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => 'Nama harus diisi'));
		$this->form_validation->set_rules('npm', 'NPM', 'required|numeric', array('required' => 'NPM harus diisi', 'numeric' => 'NPM harus berupa angka'));
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required|regex_match[/^\d{4}$/]', array('required' => 'Angkatan harus diisi', 'regex_match' => 'Angkatan harus berupa tahun (format: YYYY)'));
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|regex_match[/^[A-Z]$/]', array('required' => 'Kelas harus diisi', 'regex_match' => 'Format Kelas harus terdiri dari 1 huruf besar'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[20]', array('required' => 'Alamat harus diisi', 'min_length' => 'Alamat harus memiliki minimal 20 karakter'));
		$this->form_validation->set_rules('mata_kuliah', 'Mata Kuliah Favorit', 'required', array('required' => 'Mata Kuliah Favorit harus diisi'));		

		// Jalankan validasi
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, tampilkan kembali form input data
			$this->load->view('input_data');
		} else {
			// Ambil data dari form jika validasi berhasil
			$data['nama'] = $this->input->post('nama');
			$data['npm'] = $this->input->post('npm');
			$data['angkatan'] = $this->input->post('angkatan');
			$data['kelas'] = $this->input->post('kelas');
			$data['alamat'] = $this->input->post('alamat');
			$data['mata_kuliah'] = $this->input->post('mata_kuliah');
			// Tampilkan data di halaman lain
			$this->load->view('result_data', $data);
		}
	}
}
