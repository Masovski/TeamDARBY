<?php
    
class Comment Extends CI_Model{
    
    function add_comment($data){
        $this->db->insert('comments', $data);
    }
    
    function get_comments($postID){
        $this->db->select('comments.*')
                ->from('comments')
                ->where('postID', $postID)
                ->order_by('comments.date_added', 'asc');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}