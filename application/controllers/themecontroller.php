<?php

class ThemeController extends CI_Controller{
	function index() {
		$this->load->module('themes');
		$data['themes']=$this->themesmodule->get_themes();
		echo "<pre>";echo print_r($data['themes']);echo "</pre>";
	}
}