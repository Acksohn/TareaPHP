<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('gallery_model');
        $this->load->helper('url');
    }
    
    public function index() {
        $data['exhibitions'] = $this->gallery_model->get_exhibitions_with_art();
        $this->load->view('header2');
        $this->load->view('gallery_view', $data);
        $this->load->view('footer');
    }
}
?>