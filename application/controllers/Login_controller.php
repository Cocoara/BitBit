<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('users_model');
        $this->load->helper('url_helper');
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->library("ion_auth");
    }


    public function login()
    {

        // validate form input
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('login/index');
            $this->load->view('templates/footer');
            return;
        }


        if (!$this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {

            $this->session->set_flashdata('error', "Algo ha ido mal, revisa las credenciales");
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('login/index');
            $this->load->view('templates/footer');
            return;
        }

            redirect(base_url(''));
       




        
    }


    public function logout()
    {
        $this->ion_auth->logout();

        redirect(base_url('Home'));
    }
}
