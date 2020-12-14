<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->isLoginAlreadyAndIsAdmin();
        $this->load->model('Banner_model');
    }

    public function index()
    {
        $data['title'] = 'Data Banner';
        $data['allBanner'] = $this->Banner_model->getAllBanner();
        $this->load->view('dashboard/banner/index', $data);
    }

    public function add($error = '')
    {
        $data['title'] = 'Tambah Banner';
        $data['tombol'] = 'Tambah';
        $data['url'] = base_url('dashboard/banner/create');
        $data['error'] = $error;
        $this->load->view('dashboard/banner/form', $data);
    }

    public function create()
    {
        $this->verifyFile();
        $this->formValidation();
        if (!$this->upload->do_upload('image') || $this->form_validation->run() == FALSE) {
            $error = $this->upload->display_errors();
            $this->add($error);
        } else {
            $this->insertBannerData($this->upload->data('file_name'));
            $this->getFlashData('create');
            redirect('dashboard/banner');
        }   
    }

    public function edit($id, $error = '')
    {
        $data['title'] = 'Edit Banner';
        $data['row'] = $this->Banner_model->getById($id);
        $data['tombol'] = 'Update';
        $data['url'] = base_url('dashboard/banner/update/' . $id);
        $data['error'] = $error;
        $this->load->view('dashboard/banner/form', $data);
    }

    public function update($id)
    {
        if($this->verifyFile()) {
            $this->deleteCurrentImage($id);
        }
        $this->formValidation();

        if (!$this->upload->do_upload('image') || $this->form_validation->run() == FALSE){
            $error = $this->upload->display_errors();
            $this->edit($id, $error);
        } else{
            $this->updateBannerData($id, $this->upload->data('file_name'));
            $this->getFlashData('update');
            redirect('dashboard/banner');
        }    
    }

    public function delete($id)
    {
        $this->getFlashData('delete');
        $this->deleteCurrentImage($id);
        $this->Banner_model->deleteById($id);
        redirect('dashboard/banner');
    }

    private function deleteCurrentImage($id)
    {
        $banner = $this->Banner_model->getById($id);
        unlink("./assets/images/" . $banner->image);
    }

    private function isLoginAlreadyAndIsAdmin()
    {
        if(empty($this->session->user_id) || ($this->session->logged_in && !$this->session->is_admin)){
            redirect('home');
        }
    }

    private function formValidation()
    {
        $this->form_validation->set_rules('name', 'Description', 'required|min_length[3]');
    }

    private function insertBannerData($image = '')
    {
        $data = ['name'             => $this->input->post('name'),
                 'image'            => $image,
                 'created_at'       => date('Y-m-d H:i:s'),
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Banner_model->create($data);
    }

    private function updateBannerData($id, $image)
    {
        $data = ['name'             => $this->input->post('name'),
                 'image'            => $image,
                 'updated_at'       => date('Y-m-d H:i:s'),
                ];

        $this->Banner_model->update($id, $data);
    }

    private function getFlashData($flash = '')
    {
        if($flash == 'create') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Gambar Banner Berhasil Disimpan'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'update') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Gambar Banner Berhasil Diubah'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'delete') {
            $dataPesan = ['alert' => 'alert-danger',
                          'pesan' => 'Gambar Banner Berhasil Dihapus'];
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