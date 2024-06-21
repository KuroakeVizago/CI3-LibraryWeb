<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('BarangModel');
    }

    public function index()
    {
		$data['title'] = 'List Barang';
		$data['active_menu'] = 'data_barang';
		$data['barang'] = $this->BarangModel->get_barang();
		$data['content'] = $this->load->view('barang_view', $data, true);
        $this->load->view('template/template', $data);
    }

	public function store()
	{

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');
		$this->form_validation->set_rules('deskripsi_barang', 'Deskripsi Barang', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
		$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required|integer');
		$this->form_validation->set_rules('supplier_barang', 'Supplier Barang', 'required');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('barang');
		} else {
			$data = array(
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'deskripsi_barang' => $this->input->post('deskripsi_barang'),
				'harga_beli' => $this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual'),
				'stok_barang' => $this->input->post('stok_barang'),
				'supplier_barang' => $this->input->post('supplier_barang'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk')
			);

			if ($this->BarangModel->insert_barang($data)) {
				$this->session->set_flashdata('success', 'Barang created successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to create barang.');
			}

			redirect('barang');
		}
	}

	public function update()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$id_barang = $this->input->post('id_barang');
			$data = array(
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'deskripsi_barang' => $this->input->post('deskripsi_barang'),
				'harga_beli' => $this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual'),
				'stok_barang' => $this->input->post('stok_barang'),
				'supplier_barang' => $this->input->post('supplier_barang'),
				'tanggal_masuk' => $this->input->post('tanggal_masuk')
			);

			if ($this->BarangModel->update_barang($id_barang, $data)) {
				$this->session->set_flashdata('success', 'Barang updated successfully.');
			} else {
				$this->session->set_flashdata('error', 'Failed to update barang.');
			}
		} else {
			$this->session->set_flashdata('error', 'Invalid request.');
		}

		redirect('barang');

	}

	public function delete()
	{
		$id_barang = $this->input->get('id');

		if (!empty($id_barang)) {
			$this->BarangModel->delete_barang($id_barang);
			$this->session->set_flashdata('success', 'Barang deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'ID parameter is required.');
		}

		redirect('barang');

	}
}
