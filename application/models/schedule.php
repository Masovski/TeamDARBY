<?php
class Schedule extends CI_Model{
	function get_themes($end=20, $start=0) {
		$this->db->select()->from('themes')->order_by('dateOfDiscusion', 'desc')->limit($end,$start);
		$query=$this->db->get();
		return $query->result_array();
	}
}