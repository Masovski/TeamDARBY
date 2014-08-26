<?php

class ThemeController extends CI_Controller{
	function index() {
		$this->load->model('thememodule');
		$data['themes']=$this->thememodule->get_themes();
		$this->load->view('themes_index', $data);
	}
}