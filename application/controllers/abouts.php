<?php

class Abouts Extends CI_Controller{

    function __construct() {
        parent::__construct();

        $this->load->model('about');
    }

	function index() {
		
		$data['title'] = "Meet us - Team Darby";
		$data['abouts']= $this->about->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('about');
        $this->load->view('templates/footer');
	}
}
?>