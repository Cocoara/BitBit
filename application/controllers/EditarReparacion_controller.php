<?php defined('BASEPATH') or exit('No direct script access allowed');

class EditarReparacion_controller  extends CI_Controller
{

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
		unset($_SESSION['error']);
		$this->load->view('templates/header');
		$this->load->view('pages/home');
		$this->load->view('templates/footer');
	}



	public function editar_reparacion()
	{
            $id_incidencia = $this->input->post('id_incidencia');
            $estado = $this->input->post('estado');
            $Fecha_entrada = $this->input->post('fecha_entrada');
            $desc_averia = $this->input->post('desc_averia');
            $uuid = $this->input->post('uuid');
            $Marca = $this->input->post('Marca');
            $Modelo = $this->input->post('Modelo');
            $Numero_serie = $this->input->post('Numero_serie');
            $Diagnostico_prev = $this->input->post('Diagnostico_prev');
            $Telf = $this->input->post('Telf');
            $tiempo_reparcion = $this->input->post('tiempo_reparcion');
            $descripcion_gestor = $this->input->post('descripcion_gestor');
			$canvasImage = $this->input->post('canvasImage');
	

		if ($this->incidencies_model->set_incidencies_by_tecnico($id_incidencia,$estado,$Fecha_entrada,$desc_averia,$uuid,$Marca,$Modelo,$Numero_serie,$Diagnostico_prev,$Telf,$tiempo_reparcion,$descripcion_gestor,$canvasImage )) {
			$this->session->set_flashdata('success', "Incidencia actualizada correctamente");
			redirect('');
		}
		else{
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('');
		}
	}

	public function do_upload()
	{
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('upload_form', $error);
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());

					$this->load->view('upload_success', $data);
			}
	}
}
