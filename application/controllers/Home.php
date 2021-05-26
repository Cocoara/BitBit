<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('incidencies_model');
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
			$this->load->view('templates/sidebarInside');
			$this->load->view('pages/AdminHome');
		}
		else if($this->ion_auth->in_group($groupClient)) {

			$user = $this->ion_auth->user()->row();
			$id= $user->id;
			$data['incidencies'] = $this->incidencies_model->get_incidencies_by_id($id);

			$this->load->view('templates/headerInsideClient', $data);
			$this->load->view('templates/sidebarInsideClient');
			$this->load->view('pages/ClientHome');
		}
		else if($this->ion_auth->in_group($groupTecnico)) {

			$user = $this->ion_auth->user()->row();
			$id= $user->id;
			$data['incidencies'] = $this->incidencies_model->get_incidencies_by_id_tecnico($id);
			$data['estados'] = $this->incidencies_model->get_estados_tecnico();
			$data['ficheros'] = $this->incidencies_model->get_ficheros();
			// $data['rutaFichero'] = $this->incidencies_model->get_rutaIncidenciesFile_by_tecnico($id);
			

			$this->load->view('templates/headerInisdeTecnico', $data);
			$this->load->view('templates/sidebarInsideTecnico');
			$this->load->view('pages/TecnicHome');
		}
		else if($this->ion_auth->in_group($groupGestor)) {
			redirect('todasLasIncidencias');
		}
	
		$this->load->view('templates/footer');
	
		
	}


	public function listado()
	{
		$data['noticies'] = $this->noticies_model->get_noticies();

		if ($this->session->userdata('user')) {
			$this->load->view('templates/headerInisde');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer');
		}
	}
}
