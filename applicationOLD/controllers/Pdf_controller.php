<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pdf_controller  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('noticies_model');
        $this->load->helper('url_helper');
        $this->load->library("session");
        $this->load->library('Pdf');
    }


    public function index($noticia)
    {
            $data['noticia'] = $this->noticies_model->get_noticies_by_id($noticia);
            $this->load->view('pdf/index', $data);

    }

}
