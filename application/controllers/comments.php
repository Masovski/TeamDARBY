<?php

class Comments Extends CI_Controller{
    
    function add_comment($postID)  {
        if (!$_POST) {
            redirect(base_url() . 'posts/post/' . $postID);
        }

        $this->load->model('comment');
        $data['errors'] = false;

        if ($_POST) {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required|min_length[3]'
                ),
                array(
                    'field' => 'comment',
                    'label' => 'Comment',
                    'rules' => 'trim|required|min_length[5]'
                ),
            );
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
        } else {
            $data = array(
                'postID' => $postID,
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'comment' => $this->input->post('comment', true)
            );
            
            $this->comment->add_comment(html_escape($data));
            $this->session->set_flashdata('success', "You successfully added a comment");
        }
        
        redirect(base_url() . 'posts/post/' . $postID);
    }

}