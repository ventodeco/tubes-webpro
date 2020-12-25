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
        $this->load->model('Konfirmasi_pembayaran_model');
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
        $this->isLogin();
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
        $this->isLogin();

        $this->formValidationInformation();
        if ($this->form_validation->run() == FALSE) {
            $this->information();
        } else {
            $data = $this->prepareData();

            $pesan['barang_id'] = $this->input->post('barang');
            $product = $this->Barang_model->getById($this->input->post('barang'));
            $kota = $this->Kota_model->getById($data['kota_id']);
            $hargaTotal = $kota->rates + $product->price;

            $this->Pesanan_model->create($data);
            $pesanan = $this->Pesanan_model->getLastData();

            
            $pesananDetail = [
                'pesanan_id' => $pesanan->id,
                'barang_id'  => $pesan['barang_id'],
                'quantity'   => 1,
                'harga'      => $hargaTotal
            ];

            $this->Pesanan_detail_model->create($pesananDetail);

            redirect('keranjang/detailPesanan/' . $pesanan->id);
        }
    }

    public function detailPesanan($pesananId)
    {
        $this->isLogin();

        $data['pesanan'] = $this->Pesanan_model->getDataByPesanan($this->session->user_id, $pesananId);
        
        $data['pesanan_detail'] = $this->Pesanan_detail_model->getByPesananId($data['pesanan']->id);
        $data['kota'] = $this->Kota_model->getById($data['pesanan']->kota_id);
        $data['product'] = $this->Barang_model->getById($data['pesanan_detail']->barang_id);
        $this->load->view('page/detail_pesanan', $data);
    }

    public function konfirmasi($pesananId)
    {
        $this->isLogin();
        $data['pesanan'] = $this->Pesanan_model->getById($pesananId);
        // die(var_dump($pesanan));

        if ($data['pesanan'] && $this->session->user_id == $data['pesanan']->user_id) {
            $this->load->view('page/konfirmasi', $data);
        } else {
            redirect('home');
        }
    }

    public function konfirmasiSend()
    {
        $this->formValidationKonfirmasi();
        // die(var_dump($this->input->post('pesanan_id')));

        $data['pesanan_id'] = $this->input->post('pesanan_id');
        $data['nomor_rekening'] = $this->input->post('nomor_rekening');
        $data['nama_account'] = $this->input->post('nama_account');
        $data['total_pembayaran'] = $this->input->post('total_pembayaran');
        $data['tanggal_transfer'] = $this->input->post('tanggal_transfer');

        $this->Konfirmasi_pembayaran_model->create($data);
        $this->Pesanan_model->updateToDibayar($this->input->post('pesanan_id'));
        redirect('home');
    }

    private function formValidation()
    {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
    }

    private function prepareData()
    {
        $data['nama_penerima'] = $this->input->post('name');
        $data['nomor_hp'] = $this->input->post('no_hp');
        $data['alamat'] = $this->input->post('alamat');
        $data['kota_id'] = $this->input->post('kota');
        $data['user_id'] = $this->session->user_id;
        $data['status'] = 'menunggu pembayaran';
        $data['tanggal_pemesanan'] = date('Y-m-d H:i:s');

        return $data;
    }

    private function isLogin()
    {
        if (!$this->session->user_id) {
            redirect('login');
        }
    }

    private function formValidationInformation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('no_hp', 'Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');
        $this->form_validation->set_rules('kota', 'City', 'required');
    }

    private function formValidationKonfirmasi()
    {
        $this->form_validation->set_rules('pesanan_id', 'Pesanan ID', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_account', 'Nama Akun', 'required');
        $this->form_validation->set_rules('total_pembayaran', 'Total Pembayaran', 'required');
        $this->form_validation->set_rules('tanggal_transfer', 'Tanggal Rekening', 'required');

    }
}