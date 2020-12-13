<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoginAlreadyAndIsAdmin();
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['allBarang'] = $this->Barang_model->getAllBarang();
        $this->load->view('dashboard/barang/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Barang';
        $data['tombol'] = 'Tambah';
        $data['url'] = base_url('dashboard/barang/create');
        $this->load->view('dashboard/barang/form', $data);
    }

    public function create()
    {
        $this->formValidation();
        if ($this->form_validation->run() == FALSE){
            $this->add();  
        }
        else{
            $this->insertBarangData();
            $this->getFlashData('create');
            redirect('dashboard/barang');
        }   
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Barang';
        $data['row'] = $this->Barang_model->getById($id);
        $data['tombol'] = 'Update';
        $data['url'] = base_url('dashboard/barang/update/' . $id);
        $this->load->view('dashboard/barang/form', $data);
    }

    public function update($id)
    {
        $this->formValidation();

        if ($this->form_validation->run() == FALSE){
            $this->edit();  
        }
        else{
            $this->updateBarangData($id);
            $this->getFlashData('update');
            redirect('dashboard/barang');
        }    
    }

    public function delete($id)
    {
        $this->getFlashData('delete');
        $this->Barang_model->deleteById($id);
        redirect('dashboard/barang');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard Admin';
        $this->load->view('dashboard/index', $data);
    }

    private function isLoginAlreadyAndIsAdmin()
    {
        if(empty($this->session->user_id) || ($this->session->logged_in && !$this->session->is_admin)){
            redirect('home');
        }
    }

    private function formValidation()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[6]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[6]'); 
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural');
        $this->form_validation->set_rules('stock', 'Stock', 'required|is_natural');
    }

    private function insertBarangData()
    {
        $data = ['name'             => $this->input->post('name'),
                 'description'      => $this->input->post('description'),
                 'price'            => $this->input->post('price'),
                 'stock'            => $this->input->post('stock'),
                 'created_at'       => date('Y-m-d H:i:s'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Barang_model->create($data);
    }

    private function updateBarangData($id)
    {
        $data = ['name'             => $this->input->post('name'),
                 'description'      => $this->input->post('description'),
                 'price'            => $this->input->post('price'),
                 'stock'            => $this->input->post('stock'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Barang_model->update($id, $data);
    }

    private function getFlashData($flash = '')
    {
        if($flash == 'create') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Barang Berhasil Disimpan'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'update') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Barang Berhasil Diubah'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'delete') {
            $dataPesan = ['alert' => 'alert-danger',
                          'pesan' => 'Barang Berhasil Dihapus'];
            $this->session->set_flashdata($dataPesan);
        }
    }
}