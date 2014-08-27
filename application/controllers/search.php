<?php

class Search extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('post');
    }
function index(){
        $searchphrase = $_GET['searchphrase'];
        $search_by= $_GET['search_by'];
        $sidebar_data['searchphrase'] = $searchphrase;
        $sidebar_data['search_by'] = $search_by;
        
        $data['posts'] = $this->post->search_posts($searchphrase, $search_by);
        $this->load->library('pagination');
        $config['base_url'] = base_url().'search/page/';
        $config['total_rows'] = $this->post->search_posts_count($searchphrase, $search_by);
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

        $data['title'] = "Search results...";
        $data['author_permissions'] = $this->correct_permisions('author');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('search_index');
        $this->load->view('templates/sidebar', $sidebar_data);
        $this->load->view('templates/footer');
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