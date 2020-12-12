<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library(['password']);
        $this->load->model('User_model');
    }

    public function register($page = 'register'){

        // if($this->session->userdata('logged_in')){
        //     redirect('dashboard');
        // }

        $data['title'] = 'Register';

        $this->load->view('page/register', $data);
    }

    public function prosesRegister(){

        // if($this->session->userdata('logged_in')){
        //     redirect('dashboard');
        // }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->register();  
        }
        else{
            $dataRegister = ['name'             => $this->input->post('name'),
                             'email'            => $this->input->post('email'),
                             'password'         => $this->password->hash($this->input->post('password')),
                             'is_admin'         => false,
                             'created_at'       => date('Y-m-d H:i:s'),
                             'updated_at'       => date('Y-m-d H:i:s'),
                            ];

            $this->User_model->create($dataRegister);

            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Akun MI berhasil dibuat'];
            $this->session->set_flashdata($dataPesan);
            redirect('login');
        }
    }

    public function login()
    {
        // if($this->session->userdata('logged_in')){
        //     redirect('home');
        // }

        $data['title'] = 'Login Page';

        $this->load->view('page/login', $data);
    }

    public function prosesLogin(){

        // if($this->session->userdata('logged_in')){
        //     redirect('home');
        // }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->login();
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if($user = $this->User_model->login($email, $password)){
                $dataLogin = ['user_id'   =>  $user->id,
                              'nama'      => $user->nama,
                              'logged_in' => TRUE
                            ];

                $this->session->set_userdata($dataLogin);

                //pindahkan ke halaman home
                redirect('home');
            }else{
                $dataPesan = ['alert' => 'alert-danger',
                              'pesan' => 'Email atau password yang anda masukan tidak cocok'];

                $this->session->set_flashdata($dataPesan);

                //tampilkan halaman login
                $this->login();
            }

        }
    }
}