<?php
class ExhibitionArt extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ExhibitionArt_model');
        $this->load->model('Exhibition_model');
        $this->load->model('Art_model');
    }
    
    public function index() {
        $data['exhiart'] = $this->ExhibitionArt_model->get_All();
        $data['exhibitions'] = $this->Exhibition_model->get_All();
        $data['artworks'] = $this->Art_model->get_All();
        
        $this->load->view('header');
        $this->load->view('ExhibitionArt/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        $id_exhart = $this->input->post('id_exhart');
        
        $data = array(
            'fk_id_art' => $this->input->post('fk_id_art'),
            'fk_id_exh' => $this->input->post('fk_id_exh')
        );

        if(empty($id_exhart)) {
            $this->ExhibitionArt_model->insert($data);
        } else {
            $this->ExhibitionArt_model->update($id_exhart, $data);
        }

        redirect('ExhibitionArt');
    }

    public function edit($id) {
        $data['exhiartEdit'] = $this->ExhibitionArt_model->get_by_id($id);
        $data['exhiart'] = $this->ExhibitionArt_model->get_All();
        $data['exhibitions'] = $this->Exhibition_model->get_All();
        $data['artworks'] = $this->Art_model->get_All();
        
        $this->load->view('header');
        $this->load->view('ExhibitionArt/index', $data);
        $this->load->view('footer');
    }

    public function delete($id) {
        $this->ExhibitionArt_model->delete($id);
        redirect('ExhibitionArt');
    }
}
?>