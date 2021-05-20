<?php defined('BASEPATH') or exit('No direct script access allowed');

class NuevaReparacion_controller  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('users_model');
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->library("form_validation");
		$this->load->library("ion_auth");
    }


    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
			$this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
			return;
		}

		$data['user'] = $this->ion_auth->user()->row();
		
		
		$groupAdmin = 'admin';
		$groupClient = 'client';
		$groupTecnico = 'tecnico';
		$groupGestor = 'gestor';

		if ($this->ion_auth->in_group($groupAdmin)) {
			$this->load->view('templates/headerInisde', $data);
			$this->load->view('pages/nuevaReparacion');
		}
		else if($this->ion_auth->in_group($groupClient)) {
			$this->load->view('templates/headerInisdeClient', $data);
			$this->load->view('pages/nuevaReparacion');
		}
		else if($this->ion_auth->in_group($groupTecnico)) {
			$this->load->view('templates/headerInisdeTecnico', $data);
			$this->load->view('pages/nuevaReparacion');
		}
		else if($this->ion_auth->in_group($groupGestor)) {
			$this->load->view('templates/headerInisdeGestor', $data);
			$this->load->view('pages/nuevaReparacion');
		}
	
		$this->load->view('templates/footer');
	
    }

}
