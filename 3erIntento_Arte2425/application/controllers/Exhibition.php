<?php
class Exhibition extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Exhibition_model');
    }
    
    public function index() {
        $data['exhibitions'] = $this->Exhibition_model->get_All();
        $this->load->view('header');
        $this->load->view('Exhibition/index', $data);
        $this->load->view('footer');
    }

    public function save() {
        $id_exh = $this->input->post('id_exh');
        
        $data = array(
            'name_exh' => $this->input->post('name_exh'),
            'description_exh' => $this->input->post('description_exh'),
            'dateini' => $this->input->post('dateini'),
            'dateend' => $this->input->post('dateend'),
            'location' => $this->input->post('location')
        );

        if(empty($id_exh)) {
            $this->Exhibition_model->insert($data);
        } else {
            $this->Exhibition_model->update($id_exh, $data);
        }

        redirect('Exhibition');
    }

    public function edit($id) {
        $data['exhibitionEdit'] = $this->Exhibition_model->get_by_id($id);
        $data['exhibitions'] = $this->Exhibition_model->get_All();
        
        $this->load->view('header');
        $this->load->view('Exhibition/index', $data);
        $this->load->view('footer');
    }

    public function delete($id) {
        $this->Exhibition_model->delete($id);
        redirect('Exhibition');
    }
}
?>