<?php 
class ExhibitionArt_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_All() {
        $this->db->select('exhi_art.*, exhibition.name_exh as exhibition_name, 
                          art.name_art as artwork_name, 
                          CONCAT(artist.name_art, " ", artist.lastname_arti) as artist_name');
        $this->db->from('exhi_art');
        $this->db->join('exhibition', 'exhibition.id_exh = exhi_art.fk_id_exh');
        $this->db->join('art', 'art.id_art = exhi_art.fk_id_art');
        $this->db->join('artist', 'artist.id_arti = art.fk_id_arti');
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    function get_by_id($id) {
        $this->db->where('id_exhart', $id);
        $query = $this->db->get('exhi_art');
        return $query->row();
    }

    function insert($data) {
        return $this->db->insert('exhi_art', $data);
    }

    function update($id, $data) {
        $this->db->where('id_exhart', $id);
        return $this->db->update('exhi_art', $data);
    }

    function delete($id) {
        $this->db->where('id_exhart', $id);
        return $this->db->delete('exhi_art');
    }
}
?>