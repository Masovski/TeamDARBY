<?php

class Users extends CI_Controller{

    function login(){
        $data['error'] = 0;
        if($this->session->userdata('userID')) {
            redirect(base_url());
        }
        if($_POST){
            $this->load->model('user');
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            
            $user = $this->user->login($username, $password);
            if(!$user){
                $data['error'] = 1;
            } else {
                $this->session->set_userdata('userID', $user['userID']);
                $this->session->set_userdata('user_type', $user['user_type']);
                $this->session->set_userdata('username', $user['username']);
                redirect(base_url());
            }
        }
        $data['title'] = "Login";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('login');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function register(){
        if($_POST)  {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required|min_length[3]|is_unique[users.username]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'password2',
                    'label' => 'Password confirmed',
                    'rules' => 'trim|required|min_length[5]|matches[password]'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|unique[users.email]|valid_email'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $data['errors'] = validation_errors();
            } else {
                $data = array(
                    'username' => $this->input->post('username', true),
                    'password' => sha1($this->input->post('password', true)),
                    'user_type' => 'user'
                );
                $this->load->model('user');
                $userID = $this->user->register_user($data);
                $this->session->set_userdata('userID', $userID);
                $this->session->set_userdata('user_type', $data['user_type']);
                $this->session->set_userdata('username', $data['username']);
                $this->session->set_flashdata('success', "You successfully created your account.");
                redirect(base_url() . 'posts');
            }
        }

        $data['title'] = "Create new account";
        $this->load->helper('form');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('register_user');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');

    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }
}