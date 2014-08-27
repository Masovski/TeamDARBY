<?php
class About extends CI_Model {
	
	function get_data(){
		$this->db->select()->from('staff')->order_by('rand()')->limit(6,0);
		$query=$this->db->get();
		return $query->result_array();
	}
}
?>