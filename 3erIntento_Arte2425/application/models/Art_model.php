<?php 
class Art_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_All() {
        $this->db->select('art.*, CONCAT(artist.name_art, " ", artist.lastname_arti) as artist_name');
        $this->db->from('art');
        $this->db->join('artist', 'artist.id_arti = art.fk_id_arti');
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    function get_by_id($id) {
        $this->db->where('id_art', $id);
        $query = $this->db->get('art');
        return $query->row();
    }

    function insert($data) {
        return $this->db->insert('art', $data);
    }

    function update($id, $data) {
        $this->db->where('id_art', $id);
        return $this->db->update('art', $data);
    }

    function delete($id) {
        $this->db->where('id_art', $id);
        return $this->db->delete('art');
    }
}
?>