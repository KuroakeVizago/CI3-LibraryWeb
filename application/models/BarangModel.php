<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_barang()
    {
        $query = $this->db->get('barang');
        return $query->result_array();
    }

	public function insert_barang($data) {
		if ($this->db->insert('barang', $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function update_barang($id_barang, $data) {
		// Update item in the database
		$this->db->where('id_barang', $id_barang);
		return $this->db->update('barang', $data);
	}

	public function delete_barang($id_barang) {
		$this->db->where('id_barang', $id_barang);
		$this->db->delete('barang');
	}
}
