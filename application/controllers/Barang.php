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

    public function add($error = '')
    {
        $data['title'] = 'Tambah Barang';
        $data['tombol'] = 'Tambah';
        $data['url'] = base_url('dashboard/barang/create');
        $data['error'] = $error;
        $this->load->view('dashboard/barang/form', $data);
    }

    public function create()
    {
        $this->formValidation();
        $this->verifyFile();
        if (!$this->upload->do_upload('image') || $this->form_validation->run() == FALSE) {
            $error = $this->upload->display_errors();
            $this->add($error);  
        } else {
            $this->insertBarangData($this->upload->data('file_name'));
            $this->getFlashData('create');
            redirect('dashboard/barang');
        }   
    }

    public function edit($id, $error = '')
    {
        $data['title'] = 'Edit Barang';
        $data['row'] = $this->Barang_model->getById($id);
        $data['tombol'] = 'Update';
        $data['url'] = base_url('dashboard/barang/update/' . $id);
        $data['error'] = $error;
        $this->load->view('dashboard/barang/form', $data);
    }

    public function update($id)
    {
        $this->formValidation();
        if($this->verifyFile()) {
            $this->deleteCurrentImage($id);
        }

        if (!$this->upload->do_upload('image') || $this->form_validation->run() == FALSE){
            $error = $this->upload->display_errors();
            $this->edit($id, $error);  
        }
        else{
            $this->updateBarangData($id, $this->upload->data('file_name'));
            $this->getFlashData('update');
            redirect('dashboard/barang');
        }    
    }

    public function delete($id)
    {
        $this->getFlashData('delete');
        $this->deleteCurrentImage($id);
        $this->Barang_model->deleteById($id);
        redirect('dashboard/barang');
    }

    private function deleteCurrentImage($id)
    {
        $barang = $this->Barang_model->getById($id);
        unlink("./assets/images/" . $barang->image);
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

    private function insertBarangData($image = '')
    {
        $data = ['name'             => $this->input->post('name'),
                 'description'      => $this->input->post('description'),
                 'price'            => $this->input->post('price'),
                 'stock'            => $this->input->post('stock'),
                 'image'            => $image,
                 'created_at'       => date('Y-m-d H:i:s'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Barang_model->create($data);
    }

    private function updateBarangData($id, $image)
    {
        $data = ['name'             => $this->input->post('name'),
                 'description'      => $this->input->post('description'),
                 'price'            => $this->input->post('price'),
                 'stock'            => $this->input->post('stock'),
                 'image'            => $image,
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

    private function verifyFile()
    {
        $config = ['upload_path' => './assets/images/',
                   'allowed_types' => 'gif|jpg|png|jpeg',
                   'overwrite' => TRUE
                  ];
        $this->load->library('upload', $config);
    }
}