<?php defined('BASEPATH') or exit('No direct script access allowed');

class Noticies_controller  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('noticies_model');
        $this->load->helper('url_helper');
        $this->load->library("session");
        $this->pagination_config();
    }

    public function pagination_config()
    {
        $total_rows = $this->noticies_model->count_noticies();
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/intranetCMS';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
    }

    
    public function index()
    {
        $data['noticies'] = $this->noticies_model->get_noticies();
        $data['paginacio'] = $this->pagination->create_links();
        $data['rows']=  $this->noticies_model->count_noticies();

        $this->load->view('templates/headerInisde', $data);
        $this->load->view('noticies/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['msg'] = '';

        $this->form_validation->set_rules('title', 'Título', 'required');
        $this->form_validation->set_rules('content', 'Contenido', 'required');
        $this->form_validation->set_rules('data', 'Data', 'required');

        $this->form_validation->set_error_delimiters(' 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong><span>', '</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/headerInisde', $data);
            $this->load->view('noticies/create');
            $this->load->view('templates/footer', $data);
        } else {
            if ($this->noticies_model->set_noticia()) {
                $this->session->set_flashdata('success', "Noticia creada correctament!");
                redirect(base_url('Noticies_controller/index'));
            }
        }
    }


    public function delete($noticies)
    {
        if ($this->noticies_model->delete_noticies($noticies)) {
            $this->session->set_flashdata('successDelete', "Noticia eliminada correctament!");
            redirect(base_url('Noticies_controller/index'));
        }
    }


    public function edit()
    {
        $id = $this->uri->segment(3);
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['msg'] = '';
        $data['title'] = $_POST['title'];
        $data['subtitle'] = $_POST['subtitle'];
        $data['content'] = $_POST['content'];
        $data['data'] = $_POST['data'];
        $data['id'] = $id;

        $this->form_validation->set_rules('title', 'Título', 'required');
        $this->form_validation->set_rules('content', 'Contenido', 'required');
        $this->form_validation->set_rules('data', 'Data', 'required');

        $this->form_validation->set_error_delimiters(' 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong><span>', '</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/headerInisde', $data);
            $this->load->view('noticies/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->view('templates/headerInisde', $data);
            $this->load->view('noticies/edit', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function editNoticies($id)
    {
        if ($this->noticies_model->editNoticies($id)) {
            $this->session->set_flashdata('success', "Noticia editada correctament!");
            redirect(base_url('Noticies_controller/index'));
        }
    }

}

/* End of file News_controller.php */