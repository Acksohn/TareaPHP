<?php 
class Artist extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_All() {
        $listArtist = $this->db->get('artist');
        if ($listArtist->num_rows() > 0) {
            return $listArtist->result();
        } else {
            return false;
        }
    }

    //Insercion de clientes en la bdd
    function insert($data){
        $this->db->insert('artist',$data);
    }

    //Eliminacion de datos
    function deleteforId($id){
        //delete from cliente where id_cli=3;
        $this->db->where('id_arti',$id);
        return $this->db->delete('artist');
    }

    function get_by_id($id) {
        $this->db->where('id_arti', $id);
        $query = $this->db->get('artist');
        return $query->row();
    }

    function update($id, $data) {
        $this->db->where('id_arti', $id);
        return $this->db->update('artist', $data);
    }
}
?>