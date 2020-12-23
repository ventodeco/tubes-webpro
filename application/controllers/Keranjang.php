<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model');
        $this->load->model('Category_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        if ($this->input->post('barang_id')) {
            $data['product'] = $this->Barang_model->getById($this->input->post('barang_id'));
            $this->load->view('page/keranjang', $data);
        }

        $this->load->view('page/keranjang');
    }

    public function tambahBarang()
    {
        
    }

    public function hapusBarang()
    {
        if($this->input->post('data') == 'true') {
            redirect('keranjang');
        }
    }

    private function formValidation()
    {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
    }
}