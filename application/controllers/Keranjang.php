<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model');
        $this->load->model('Category_model');
        $this->load->model('Kota_model');
        $this->load->model('Barang_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Pesanan_detail_model');
    }

    public function index()
    {
        $data['title'] = 'Keranjang';
        if ($this->input->post('barang_id')) {
            $data['product'] = $this->Barang_model->getById($this->input->post('barang_id'));
            $this->load->view('page/keranjang', $data);
        } else {
            $this->load->view('page/keranjang');
        }
    }

    public function hapusBarang()
    {
        if($this->input->post('data') == 'true') {
            redirect('keranjang');
        }
    }

    public function information()
    {
        // if ($this->input->post('barang')) {
            $data['cities'] = $this->Kota_model->getAllKota();
            $data['title'] = 'Informasi Pesanan';
            $data['product'] = $this->Barang_model->getById($this->input->post('barang'));
            $this->load->view('page/keranjang_informasi', $data);
        // } else {
        //     redirect('keranjang');
        // }
    }

    public function informationSend()
    {
        $this->formValidationInformation();
        if ($this->form_validation->run() == FALSE) {
            $this->information();
        } else {
            $data['nama_penerima'] = $this->input->post('name');
            $data['nomor_hp'] = $this->input->post('no_hp');
            $data['alamat'] = $this->input->post('alamat');
            $data['kota_id'] = $this->input->post('kota');
            $data['user_id'] = $this->session->user_id;
            $data['status'] = 'menunggu pembayaran';
            $data['tanggal_pemesanan'] = date('Y-m-d H:i:s');

            $pesan['barang_id'] = $this->input->post('barang');

            $this->Pesanan_model->create($data);
            $pesanan = $this->Pesanan_model->getLastData();

            $datas['product'] = $this->Barang_model->getById($this->input->post('barang'));
            $datas['kota'] = $this->Kota_model->getById($data['kota_id']);
            $hargaTotal = $datas['kota']->rates + $datas['product']->price;
            
            $pesananDetail = [
                'pesanan_id' => $pesanan->id,
                'barang_id'  => $pesan['barang_id'],
                'quantity'   => 1,
                'harga'      => $hargaTotal
            ];

            $this->Pesanan_detail_model->create($pesananDetail);

            $pesananDetail = $this->Pesanan_detail_model->getLastData();
            $datas['pesanan'] = $pesanan;
            $datas['pesanan_detail'] = $pesananDetail;

            // die(var_dump($datas));
            $this->load->view('page/detail_pesanan', $datas);
        }
    }

    public function detailPesanan()
    {
        $data = [];
        $this->load->view('page/partial/detail_pesanan', $data);
    }

    public function konfirmasi()
    {
        $this->load->view('page/konfirmasi');
    }

    private function formValidation()
    {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
    }

    public function formValidationInformation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('kota', 'City', 'required');

    }
}