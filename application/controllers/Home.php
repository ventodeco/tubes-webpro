<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model');
        $this->load->model('Category_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['banners'] = $this->Banner_model->getAllBanner();
        $data['count'] = count($data['banners']);
        $data['title'] = 'Products Mi';
        $data['categories'] = $this->Category_model->getAllCategory();

        $this->load->view('page/home', $data);
    }

    public function products($id = 0)
    {
        $data['categories'] = $this->Category_model->getAllCategory();
        $data['products'] = $this->Barang_model->getByCategory($id);
        $data['title'] = 'Products Mi';

        $this->load->view('page/products', $data);
    }

    public function product($id)
    {
        $data['product'] = $this->Barang_model->getById($id);
        $this->load->view('page/product', $data);
    }
}