<?php
class Schedules extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('schedule');
    }

    function index() {
        $data['themes'] = $this->schedule->get_themes();
        $data['title'] = "Schedule of the themes for discussion";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('schedules');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/footer');
    }
}
?>