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
}
