<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->model('Pesanan_detail_model');
        $this->load->model('Konfirmasi_pembayaran_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['title'] = 'Pesanan';
        $data['pesanan'] = $this->Pesanan_model->getDetailPesanan();
        $this->load->view('dashboard/pesanan/index', $data);
    }

    public function edit()
    {
        $this->isAdmin();
        $data['title'] = 'Edit Status Pesanan';
    }

    private function isAdmin()
    {
        if (!$this->session->is_admin) {
            redirect('dashboard/pesanan');
        }
    }
}