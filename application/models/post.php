<?php

class Post extends CI_Model {

    function get_posts($num = 20, $start = 0) {
        $this->db->select()
                ->from('posts')
                ->where('active', 1)
                ->order_by('date_added', 'desc')
                ->limit($num, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_post($postID) {
        $this->db->select()
                ->from('posts')
                ->where(array('active' => 1, 'postID' => $postID))
                ->order_by('date_added', 'desc');
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function search_posts($searchphrase="", $search_by="content"){
        $this->db->select()
            ->from('posts')
            ->where('active', 1)
            ->order_by('date_added', 'desc');

            if($search_by=="content"){
                $this->db->like('post', $searchphrase);
                $this->db->or_like('title', $searchphrase); 
            } else {                
                $searchphrase = join(",", array_map('trim', explode(',', $searchphrase)));
                $searchphrase =  join(",", preg_split('/,/', $searchphrase, -1, PREG_SPLIT_NO_EMPTY));

                $this->db->like('tags', $searchphrase, "none");
                $this->db->or_like('tags', $searchphrase.",", "after");
                $this->db->or_like('tags', ",".$searchphrase, "before");
                $this->db->or_like('tags', ",".$searchphrase.",");
            }
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert_post($data) {
        $this->db->insert('posts', $data);
        return $this->db->insert_id();
    }

    function update_post($postID, $data) {
        $this->db->where('postID', $postID);
        $this->db->update('posts', $data);
    }

    function delete_post($postID) {
        $this->db->where('postID', $postID);
        $this->db->delete('posts');
    }
    
    function get_posts_count(){
        $this->db->select('postID')->from('posts')->where('active', 1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function search_posts_count($searchphrase="", $search_by="content"){
    $this->db->select()
        ->from('posts')
        ->where('active', 1);
        if($search_by=="content"){
            $this->db->like('post', $searchphrase);
            $this->db->or_like('title', $searchphrase); 
        } else {
            $searchphrase = join(",", array_map('trim', explode(',', $searchphrase)));
            $searchphrase =  join(",", preg_split('/,/', $searchphrase, -1, PREG_SPLIT_NO_EMPTY));

            $this->db->like('tags', $searchphrase, "none");
            $this->db->or_like('tags', $searchphrase.",", "after");
            $this->db->or_like('tags', ",".$searchphrase, "before");
            $this->db->or_like('tags', ",".$searchphrase.",");
        }
    $query = $this->db->get();
    return $query->num_rows();}
}
