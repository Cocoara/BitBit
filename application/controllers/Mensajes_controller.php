
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_controller  extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mensajes_model');
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->library("form_validation");
		$this->load->library("ion_auth");
	}

	public function contactanosPeticion()
	{
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $phone = $this->input->post('phone');
            $email = $this->input->post('email');
            $tipo = $this->input->post('tipo');
            $mensaje = $this->input->post('mensaje');
			$data = date('Y-m-d');
	
		if ($this->mensajes_model->set_consulta($first_name,$last_name,$phone,$email,$tipo,$mensaje,$data)) {
			$this->session->set_flashdata('success', "Consulta enviada correctamente");
			redirect('');
		}
		else{
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('');
		}
	}
}
