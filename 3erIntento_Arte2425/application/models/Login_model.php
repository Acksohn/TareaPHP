<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function verify_user($username, $password) {
        $this->db->where('user_log', $username);
        $this->db->where('password_log', $password); // Note: In production, use password_hash()
        $query = $this->db->get('login');
        
        if($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
}
?>