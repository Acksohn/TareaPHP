<?php
class Artists extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Artist');
    }
    
    public function index() {
        $artist = $this->Artist->get_All();
        $data['artist'] = $artist;
        $this->load->view('header');
        $this->load->view('Artists/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        
        $id_arti = $this->input->post('id_arti');
        $data = array(
            'name_art' => $this->input->post('name_art'),
            'lastname_arti' => $this->input->post('lastname_arti'),
            'ci_arti' => $this->input->post('ci_arti'),
            'email_arti' => $this->input->post('email_arti'),
            'phone_arti' => $this->input->post('phone_arti')
        );

        if(empty($id_arti)) {
            
            $this->Artist->insert($data);
        } else {
          
            $this->Artist->update($id_arti, $data);
        }

        redirect('Artists/index');
    }

    
    public function delete($id){
        if($this->Artist->deleteforId($id)){
            redirect('Artists/index');
        }else{
            echo "Error al eliminar";
        }
    }

    public function edit($id) {
        
        $artistEdit = $this->Artist->get_by_id($id);
        $data['artistEdit'] = $artistEdit;
        $data['artist'] = $this->Artist->get_All(); // Para mantener la lista actualizada
        
        $this->load->view('header');
        $this->load->view('Artists/index', $data);
        $this->load->view('footer');
    }
}
?>