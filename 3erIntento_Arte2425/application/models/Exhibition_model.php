<?php 
class Exhibition_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_All() {
        $query = $this->db->get('exhibition');
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    function get_by_id($id) {
        $this->db->where('id_exh', $id);
        $query = $this->db->get('exhibition');
        return $query->row();
    }

    function insert($data) {
        return $this->db->insert('exhibition', $data);
    }

    function update($id, $data) {
        $this->db->where('id_exh', $id);
        return $this->db->update('exhibition', $data);
    }

    function delete($id) {
        $this->db->where('id_exh', $id);
        return $this->db->delete('exhibition');
    }
}
?>