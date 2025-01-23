<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_exhibitions_with_art() {
        $this->db->select('exhibition.*, art.*, exhi_art.id_exhart');
        $this->db->from('exhibition');
        $this->db->join('exhi_art', 'exhibition.id_exh = exhi_art.fk_id_exh');
        $this->db->join('art', 'art.id_art = exhi_art.fk_id_art');
        $this->db->order_by('exhibition.id_exh', 'ASC');
        
        $query = $this->db->get();
        
        // Organizamos los resultados por exposición
        $exhibitions = array();
        foreach($query->result() as $row) {
            if(!isset($exhibitions[$row->id_exh])) {
                $exhibitions[$row->id_exh] = array(
                    'name_exh' => $row->name_exh,
                    'description_exh' => $row->description_exh,
                    'dateini' => $row->dateini,
                    'dateend' => $row->dateend,
                    'location' => $row->location,
                    'artworks' => array()
                );
            }
            
            $exhibitions[$row->id_exh]['artworks'][] = array(
                'id_art' => $row->id_art,
                'name_art' => $row->name_art,
                'photo_art' => $row->photo_art,
                'description_art' => $row->description_art
            );
        }
        
        return $exhibitions;
    }
}
?>