<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoginAlreadyAndIsAdmin();
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['title'] = 'Data Kategori';
        $data['allCategory'] = $this->Category_model->getAllCategory();
        $this->load->view('dashboard/kategori/index', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Kategori';
        $data['tombol'] = 'Tambah';
        $data['url'] = base_url('dashboard/kategori/create');
        $this->load->view('dashboard/kategori/form', $data);
    }

    public function create()
    {
        $this->formValidation();
        if ($this->form_validation->run() == FALSE){
            $this->add();  
        }
        else{
            $this->insertKategoriData();
            $this->getFlashData('create');
            redirect('dashboard/kategori');
        }   
    }

    public function edit($id)
    {
        $data['title'] = 'Edit kategori';
        $data['row'] = $this->Category_model->getById($id);
        $data['tombol'] = 'Update';
        $data['url'] = base_url('dashboard/kategori/update/' . $id);
        $this->load->view('dashboard/kategori/form', $data);
    }

    public function update($id)
    {
        $this->formValidation();

        if ($this->form_validation->run() == FALSE){
            $this->edit();  
        }
        else{
            $this->updatekategoriData($id);
            $this->getFlashData('update');
            redirect('dashboard/kategori');
        }    
    }

    public function delete($id)
    {
        $this->getFlashData('delete');
        $this->Category_model->deleteById($id);
        redirect('dashboard/kategori');
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
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[1]');
    }

    private function insertKategoriData()
    {
        $data = ['name'             => $this->input->post('name'),
                 'created_at'       => date('Y-m-d H:i:s'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Category_model->create($data);
    }

    private function updateKategoriData($id)
    {
        $data = ['name'             => $this->input->post('name'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Category_model->update($id, $data);
    }

    private function getFlashData($flash = '')
    {
        if($flash == 'create') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Kategori Berhasil Disimpan'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'update') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Kategori Berhasil Diubah'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'delete') {
            $dataPesan = ['alert' => 'alert-danger',
                          'pesan' => 'Kategori Berhasil Dihapus'];
            $this->session->set_flashdata($dataPesan);
        }
    }
}