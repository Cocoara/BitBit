<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reparaciones_controller  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library("session");
        $this->load->library('Grocery_CRUD');
        $this->load->model('users_model');
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library("form_validation");
        $this->load->library("ion_auth");
        $this->load->model('users_model');
    }


    public function index()
    {
       
    }

    // public function anadirnuevareparacion()
    // {
    //     $user = $this->ion_auth->user()->row();

    //     $uuid = $this->input->post('uuid');


    //     $this->db->select('uuid');
    //     $this->db->from('incidencia');
    //     $this->db->where('uuid', $uuid);

    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //     $this->db->set('uuid', $uuid);
    //     $this->db->where('id_client', $user->id);
    //     $this->db->insert('misreparaciones');
    //     }
    // }

    function output($output = null)
    {
        $data['user'] = $this->ion_auth->user()->row();
        $this->load->view('templates/headerInisdeClient', $data);
        $this->load->view('grocery/index.php', $output);
    }
}
