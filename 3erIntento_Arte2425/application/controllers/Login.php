<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }
    
    public function index() {
        $this->load->view('login_view');
    }
    
    public function authenticate() {
        $username = $this->input->post('user');
        $password = $this->input->post('password');
        
        $user = $this->login_model->verify_user($username, $password);
        
        if($user) {
            // Set session data
            $user_data = array(
                'user_id' => $user->id_log,
                'username' => $user->user_log,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);
            
            // Redirect to dashboard or home page
            redirect('welcome2'); // Change 'dashboard' to your desired page
        } else {
            // Set error message
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}

?>