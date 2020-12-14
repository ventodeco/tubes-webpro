<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoginAlreadyAndIsAdmin();
        $this->load->model('Kota_model');
    }

    public function index()
    {
        $data['title'] = 'Data Kota';
        $data['allKota'] = $this->Kota_model->getAllKota();
        $this->load->view('dashboard/kota/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Kota';
        $data['tombol'] = 'Tambah';
        $data['url'] = base_url('dashboard/kota/create');
        $this->load->view('dashboard/kota/form', $data);
    }

    public function create()
    {
        $this->formValidation();
        if ($this->form_validation->run() == FALSE){
            $this->add();  
        }
        else{
            $this->insertkotaData();
            $this->getFlashData('create');
            redirect('dashboard/kota');
        }   
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kota';
        $data['row'] = $this->Kota_model->getById($id);
        $data['tombol'] = 'Update';
        $data['url'] = base_url('dashboard/kota/update/' . $id);
        $this->load->view('dashboard/kota/form', $data);
    }

    public function update($id)
    {
        $this->formValidation();

        if ($this->form_validation->run() == FALSE){
            $this->edit();  
        }
        else{
            $this->updateKotaData($id);
            $this->getFlashData('update');
            redirect('dashboard/kota');
        }    
    }

    public function delete($id)
    {
        $this->getFlashData('delete');
        $this->Kota_model->deleteById($id);
        redirect('dashboard/kota');
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
        $this->form_validation->set_rules('rates', 'Tarif', 'required|is_natural');
    }

    private function insertKotaData()
    {
        $data = ['name'             => $this->input->post('name'),
                 'rates'            => $this->input->post('rates'),
                 'created_at'       => date('Y-m-d H:i:s'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Kota_model->create($data);
    }

    private function updateKotaData($id)
    {
        $data = ['name'             => $this->input->post('name'),
                 'rates'            => $this->input->post('rates'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Kota_model->update($id, $data);
    }

    private function getFlashData($flash = '')
    {
        if($flash == 'create') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Data Kota Berhasil Disimpan'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'update') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Data Kota Berhasil Diubah'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'delete') {
            $dataPesan = ['alert' => 'alert-danger',
                          'pesan' => 'Data Kota Berhasil Dihapus'];
            $this->session->set_flashdata($dataPesan);
        }
    }
}