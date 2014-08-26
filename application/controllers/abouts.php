<?php

class Abouts Extends CI_Controller{
    
	function index() {		
		$data['title'] = false;
		$this->load->view('templates/header', $data);
		$this->load->view('about');		
        $this->load->view('templates/nav');
        $this->load->view('templates/footer');
	}
}
?>