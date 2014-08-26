<?php

class ThemeModule extends CI_Model{
	function get_themes($end=20, $start=0) {
		$this->db->select()->from('themes')->where('active',1)->order_by('dateOfDiscusion', 'desc')->limit($end,$start);
		$query=$this->db->get();
		return $query->result_array();
	}
}

?>