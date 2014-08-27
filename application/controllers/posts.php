<?php

class Posts extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('post');
    }
    function page($start=0){
        $data['posts'] = $this->post->get_posts(5, $start);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'posts/page/';
        $config['total_rows'] = $this->post->get_posts_count();
        $config['per_page'] = 5;
        $config['use_page_numbers'] = true;

		$config['prev_link'] = '&larr; Newer';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Older &rarr;';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();

        $data['title'] = "Posts";
        $data['author_permissions'] = $this->correct_permisions('author');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('post_index');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function post($postID){
        $this->load->model('comment');
        
        $data['comments'] = $this->comment->get_comments($postID);
        $data['author_permissions'] = $this->correct_permisions('author');
        $data['post'] = $this->post->get_post($postID);
        $data['tags'] = explode(", ", $data['post']['tags']);
        $data['views'] = $data['post']['views'];
        $data['title'] = $data['post']['title'];

        $data_post = array('views'=> $data['views'] + 1);
        $this->post->update_post($postID, $data_post);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('post', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
    
    function new_post(){
        if(!$this->correct_permisions('author')){
            redirect(base_url().'users/login');
        }

        if($_POST){
            $tags = $this->input->post('tags', true);
            $tags = join(",", array_map('trim', explode(',', $tags)));
            $tags =  join(",", preg_split('/,/', $tags, -1, PREG_SPLIT_NO_EMPTY));

            $data = array(
                'title'=>$this->input->post('title', true),
                'post'=>$this->input->post('post', true),
                'author'=>$this->session->userdata('username'),
                'active'=>1,
                'tags'=>$tags
            );
            $this->post->insert_post($data);
            $this->session->set_flashdata('success', "You successfully created a new post.");

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
            $tags = $this->input->post('tags', true);
            $tags = join(",", array_map('trim', explode(',', $tags)));
            $tags =  join(",", preg_split('/,/', $tags, -1, PREG_SPLIT_NO_EMPTY));
            
            $data_post = array(
                'title'=>$this->input->post('title', true),
                'post'=>$this->input->post('post', true),
                'tags'=>$tags,
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

    function archive($year=2014, $month=8, $start = 0) {
        $data['posts'] = $this->post->get_posts(2147483647, $start);
        foreach($data['posts'] as $row) {
            if($year == substr($row['date_added'], 0, 4) && $month == date("n", strtotime($row['date_added']))) {
                $data['archives'][] = $row;
            }
        }
        $archive_var = $year.$month;
        $data[$archive_var] = sizeof($data['archives']);

        $data['title'] = "Archives: ";
        $data['author_permissions'] = $this->correct_permisions('author');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('archive');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }

}