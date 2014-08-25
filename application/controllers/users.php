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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('login',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);
    }
    
    function register(){
        if($_POST){
            $data=array(
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true),
                'type' => $this->input->post('user_type', true)
            );
            $this->load->model('user');
            $userID = $this->user->create_user($data);
            
            $this->session->set_userdata('userID', $userID);
            $this->session->set_userdata('user_type', $data['user_type']);
            $this->session->set_userdata('username', $data['username']);
        }
        
        $this->load->helper('form');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('register_user',$data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer', $data);


    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'posts');
    }
}