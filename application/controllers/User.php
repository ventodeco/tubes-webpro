<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['password']);
        $this->load->model('User_model');
    }

    public function register($page = 'register')
    {
        $this->isLoginAlready();
        $data['title'] = 'Register';
        $this->load->view('page/register', $data);
    }

    public function prosesRegister()
    {
        $this->isLoginAlready();
        $this->formValidation('register');

        if ($this->form_validation->run() == FALSE){
            $this->register();  
        }
        else{
            $this->insertUserData();
            $this->getFlashData('register');
            redirect('login');
        }
    }

    public function login()
    {
        $this->isLoginAlready();
        $data['title'] = 'Login Page';
        $this->load->view('page/login', $data);
    }

    public function prosesLogin()
    {
        $this->isLoginAlready();
        $this->formValidation();

        if ($this->form_validation->run() == FALSE)
        {
            $this->login();
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if($user = $this->User_model->login($email, $password)){
                $dataLogin = ['user_id'   =>  $user->id,
                              'name'      => $user->name,
                              'logged_in' => TRUE,
                              'is_admin'  => $user->is_admin
                            ];
                $this->session->set_userdata($dataLogin);
                if($this->session->is_admin) {
                    redirect('dashboard');
                } else {
                    redirect();
                }
            }else{
                $this->getFlashData('loginFailed');
                $this->login();
            }

        }
    }

    public function logout(){
        $dataLogin = ['user_id', 'name', 'logged_in', 'is_admin'];
        $this->session->unset_userdata($dataLogin);
        redirect('login');
    }

    private function isLoginAlready()
    {
        if($this->session->userdata('logged_in')){
            redirect();
        }
    }

    private function formValidation($for = '')
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]'); 

        if ($for == 'register') {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('con_password', 'Password Confirmation', 'required|matches[password]');
        }
    }

    private function getFlashData($flash = '')
    {
        if($flash == 'register') {
            $dataPesan = ['alert' => 'alert-success',
                          'pesan' => 'Akun MI berhasil dibuat'];
            $this->session->set_flashdata($dataPesan);
        }
        if($flash == 'loginFailed') {
            $dataPesan = ['alert' => 'alert-danger',
                          'pesan' => 'Email atau password yang anda masukan tidak cocok'];
            $this->session->set_flashdata($dataPesan);
        }
    }

    private function insertUserData()
    {
        $dataRegister = ['name'             => $this->input->post('name'),
                         'email'            => $this->input->post('email'),
                         'password'         => $this->password->hash($this->input->post('password')),
                         'is_admin'         => false,
                         'created_at'       => date('Y-m-d H:i:s'),
                         'updated_at'       => date('Y-m-d H:i:s'),
                        ];

        $this->User_model->create($dataRegister);
    }
}