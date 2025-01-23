<?php
class Art extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Art_model');
        $this->load->model('Artist');
    }
    
    public function index() {
        $data['artworks'] = $this->Art_model->get_All();
        $data['artists'] = $this->Artist->get_All();
        $this->load->view('header');
        $this->load->view('Art/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        $id_art = $this->input->post('id_art');
        
        // Configuración para subida de archivo
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        
        $this->load->library('upload', $config);
        
        $data = array(
            'name_art' => $this->input->post('name_art'),
            'description_art' => $this->input->post('description_art'),
            'date_art' => $this->input->post('date_art'),
            'fk_id_arti' => $this->input->post('fk_id_arti')
        );

        // Si se sube una nueva foto
        if($this->upload->do_upload('photo_art')) {
            $upload_data = $this->upload->data();
            $data['photo_art'] = $upload_data['file_name'];
        }

        if(empty($id_art)) {
            $this->Art_model->insert($data);
        } else {
            $this->Art_model->update($id_art, $data);
        }

        redirect('Art');
    }

    public function edit($id) {
        $data['artEdit'] = $this->Art_model->get_by_id($id);
        $data['artworks'] = $this->Art_model->get_All();
        $data['artists'] = $this->Artist->get_All();
        
        $this->load->view('header');
        $this->load->view('Art/index', $data);
        $this->load->view('footer');
    }

    public function delete($id) {
        // Obtener info de la imagen antes de eliminar
        $art = $this->Art_model->get_by_id($id);
        if($art->photo_art) {
            unlink('./uploads/'.$art->photo_art);
        }
        
        $this->Art_model->delete($id);
        redirect('Art');
    }
}
?>