<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BarangModel');
    }

    public function index()
    {
        $data['barang'] = $this->BarangModel->get_barang();
        $this->load->view('barang_view', $data);
    }
}
