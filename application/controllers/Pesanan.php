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
        if ($this->session->is_admin) {
            $data['pesanan'] = $this->Pesanan_model->getDetailPesanan();    
        } else {
            $data['pesanan'] = $this->Pesanan_model->getDetailPesananById($this->session->user_id);
        }

        $this->load->view('dashboard/pesanan/index', $data);
    }

    public function editStatus($id)
    {
        $this->isAdmin();
        $data['title'] = 'Edit Status Pesanan';
        $data['pesanan'] = $this->Pesanan_model->getById($id);

        $this->load->view('dashboard/pesanan/form', $data);
    }

    public function update()
    {
        $this->isAdmin();

        $pesanan = $this->Pesanan_model->updateStatus($this->input->post('status'), $this->input->post('pesanan_id'));

        redirect('pesanan');
    }

    private function isAdmin()
    {
        if (!$this->session->is_admin) {
            redirect('dashboard/pesanan');
        }
    }
}