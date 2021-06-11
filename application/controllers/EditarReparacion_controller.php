<?php defined('BASEPATH') or exit('No direct script access allowed');

class EditarReparacion_controller  extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('incidencies_model');
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


	
	/**
	 * editar_reparacion
	 * Función que pasará los datos del formulario para editar la información de la incidencia
	 * @return void
	 */
	public function editar_reparacion()
	{

		if (!$this->ion_auth->logged_in()) {
			$this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
			return;
		}

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
		$material = $this->input->post('material');


		if ($this->incidencies_model->set_incidencies_by_tecnico($id_incidencia, $estado, $Fecha_entrada, $desc_averia, $uuid, $Marca, $Modelo, $Numero_serie, $Diagnostico_prev, $Telf, $tiempo_reparcion, $descripcion_gestor, $canvasImage, $material)) {
			$this->session->set_flashdata('success', "Incidencia actualizada correctamente");
			redirect('incidenciasTecnico');
		} else {
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('incidenciasTecnico');
		}
	}

	
	/**
	 * do_upload
	 * Subirá los archivos pasados por post en el campo input->"file"
	 * @return void
	 */
	public function do_upload()
	{

		if (!$this->ion_auth->logged_in()) {
			$this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
			return;
		}

		// Check form submit or not
		if ($this->input->post('upload') != NULL) {

			$data = array();

			// Count total files
			$countfiles = count($_FILES['files']['name']);

			// Looping all files
			for ($i = 0; $i < $countfiles; $i++) {

				if (!empty($_FILES['files']['name'][$i])) {

					// Define new $_FILES array - $_FILES['file']
					$_FILES['file']['name'] = $_FILES['files']['name'][$i];
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];

					$id_incidencia = $this->input->post('id_incidencia_file');

					$directoryName = 'C:\xampp\uploads/' . $id_incidencia;

					//Check if the directory already exists.
					if (!is_dir($directoryName)) {
						//Directory does not exist, so lets create it.
						mkdir($directoryName, 0755);
					}

					$filename = $_FILES['files']['name'][$i];
					// var_dump($filename);
					$filenameWithoutExt = explode(".", $filename);
					// var_dump($filenameWithoutExt);
					$extension = strtolower($filenameWithoutExt[1]);
					// var_dump($extension);
					$filenameWithId = $filenameWithoutExt[0] . $id_incidencia;
					// var_dump($filenameWithId);
					// $encryption = hash('ripemd160', $filenameWithId);
					// var_dump($encryption);

					$filenameWithIdAndHash = $filenameWithId . "." . $filenameWithoutExt[1];

					// Set preference
					$config['upload_path']          = $directoryName;
					$config['allowed_types']        = 'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp';
					$config['max_size']             = 5000;
					// $config['max_width']            = 1024;
					// $config['max_height']           = 768;
					$config['file_name'] = $filenameWithIdAndHash;

					var_dump('Name:' . $filenameWithIdAndHash);

					//Load upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {

						$this->incidencies_model->set_incidenciesFile_by_tecnico($id_incidencia, $directoryName);
						$this->incidencies_model->set_rutaIncidenciesFile($id_incidencia, $filenameWithIdAndHash, $extension, $directoryName);

						// Get data about the file
						$uploadData = $this->upload->data();
						// var_dump($uploadData);die();
						// Initialize array
						$data['filenames'][] = $filenameWithIdAndHash;
					}
				}
			}


			// load view
			$this->session->set_flashdata('success', "Archivo subido!");
			redirect('');
		} else {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error['error']);
			redirect('');
		}
	}
	
	 /**
     * imagen
     * Descargará o mostrará el fichero con los siguientes parámetros 
     * @param  mixed $id_incidencia identificador de incidencia
     * @param  mixed $nom_arxiu Nombre del archivo
     * @return void
     */
	public function imagen($id_incidencia, $nom_arxiu)
	{
		$this->load->helper('download');

		if (!$this->ion_auth->logged_in()) {
			return;
		} else {
			force_download('C:\xampp\uploads/' . $id_incidencia . '/' . $nom_arxiu, NULL, TRUE);
		}
	}
	
	/**
	 * delete_fichero
	 * Eliminará el fichero que le pasemos por la id, lo eliminará de la base de datos
	 * @param  mixed $id
	 * @return void
	 */
	public function delete_fichero($id)
	{
		$id = $this->input->post('id');
		$this->incidencies_model->delete_fichero_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
}
