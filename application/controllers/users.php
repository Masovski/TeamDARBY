<?php

class Users extends CI_Controller{

    function login(){
        $data['error'] = 0;
        if($_POST){
            $this->load->model('user');
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $type = $this->input->post('user_type', true);
            
            $user = $this->user->login($username, $password, $type);
            if(!$user){
                $data['error'] = 1;
            } else {
                $this->session->set_userdata('userID', $user['userID']);
                $this->session->set_userdata('user_type', $user['user_type']);
                $this->session->set_userdata('username', $user['username']);
            }
        }
        $this->load->view('header');
        $this->load->view('login',$data);
        $this->load->view('footer');
    }
    
    function register(){
        $data['errors'] = false;
        
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
                    'rules' => 'trim|required|umique[users.email]|valid_email'
                )
            );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $data['errors'] = validation_errors();
            } else {
                $data = array(
                    'username' => $this->input->post('username', true),
                    'password' => $this->input->post('password', true),
                    'type' => $this->input->post('user_type', true)
                );
                $this->load->model('user');
                $userID = $this->user->register_user($data);
                $this->session->set_userdata('userID', $userID);
                $this->session->set_userdata('user_type', $data['user_type']);
                $this->session->set_userdata('username', $data['username']);

                redirect(base_url() . 'posts');
            }
        }

        $this->load->view('header');
        $this->load->view('register_user', $data);
        $this->load->view('footer');
        
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }
}