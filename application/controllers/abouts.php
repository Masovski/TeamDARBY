<?php

class Abouts Extends CI_Controller{
    
	function index() {		
		$data['title'] = "Meet us - Team Darby";
		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
		$this->load->view('about');
        $this->load->view('templates/footer');
	}
}
?>