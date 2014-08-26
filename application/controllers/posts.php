<?php

class Posts extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('post');
    }
    function index($start=0){
        $data['posts'] = $this->post->get_posts(5, $start);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'posts/index/';
        $config['total_rows'] = $this->post->get_posts_count();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();

        $data['title'] = "Posts";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('post_index');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function post($postID){
        $data['post'] = $this->post->get_post($postID);

        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('post');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function new_post(){
        if(!$this->correct_permisions('author')){
            redirect(base_url().'users/login');
        }

        if($_POST){
            $data = array(
                'title'=>$_POST['title'],
                'post'=>$_POST['post'],
                'active'=>1
            );
            $this->post->insert_post($data);
            redirect(base_url().'posts/');
        } else {
            $data['title'] = "Add New Post";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav');
            $this->load->view('new_post');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/footer');
        }
    }
    
    function editpost($postID){
        if(!$this->correct_permisions('author')){
            redirect(base_url().'users/login');
        }
        $data['success'] = 0;
        if($_POST){
            $data_post = array(
                'title'=>$_POST['title'],
                'post'=>$_POST['post'],
                'active'=>1
            );
            $this->post->update_post($postID, $data_post);
            $data['success'] = 1;
            redirect(base_url().'posts/post/' . $postID);
        }
        $data['post'] = $this->post->get_post($postID);
        $data['title'] = "Edit Post: " . $data['post']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('edit_post');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function deletepost($postID){
        if(!$this->correct_permisions('author')){
            redirect(base_url().'users/login');
        }
        $this->post->delete_post($postID);
        redirect(base_url().'posts');
    }
    
    function correct_permisions($required)  {
        $user_type = $this->session->userdata('user_type');
        if ($required == "user") {
            if ($user_type) {
                return true;
            }
        } elseif ($required == "author") {
            if ($user_type == "author" || $user_type == "admin") {
                return true;
            }
        } elseif ($required == "admin") {
            if ($user_type == "admin") {
                return true;
            }
        }

        return false;
    }

}