
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_controller  extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mensajes_model');
		$this->load->model('incidencies_model');
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

		if ($this->mensajes_model->set_consulta($first_name, $last_name, $phone, $email, $tipo, $mensaje, $data)) {
			$this->session->set_flashdata('success', "Consulta enviada correctamente");
			redirect('');
		} else {
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('');
		}
	}

	public function myMessages(){
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
			$user = $this->ion_auth->user()->row();
			$id = $user->id;

			$data['users'] = $this->mensajes_model->get_all_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);

			$this->load->view('templates/headerInisde', $data);
			$this->load->view('templates/sidebarInside');
			$this->load->view('Mensajeria/myMessages');
		} else if ($this->ion_auth->in_group($groupClient)) {

			$user = $this->ion_auth->user()->row();
			$id = $user->id;

			$data['users'] = $this->mensajes_model->get_admin_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
			
			$this->load->view('templates/headerInsideClient', $data);
			$this->load->view('templates/sidebarInsideClient');
			$this->load->view('Mensajeria/myMessages');
		} else if ($this->ion_auth->in_group($groupTecnico)) {

			$user = $this->ion_auth->user()->row();
			$id = $user->id;
			$data['users'] = $this->mensajes_model->get_admin_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);

			$this->load->view('templates/headerInisdeTecnico', $data);
			$this->load->view('templates/sidebarInsideTecnico');
			$this->load->view('Mensajeria/myMessages');
		} else if ($this->ion_auth->in_group($groupGestor)) {
			$user = $this->ion_auth->user()->row();
			$id = $user->id;
			$data['users'] = $this->mensajes_model->get_admin_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);

			$this->load->view('templates/headerInisdeGestor', $data);
			$this->load->view('templates/sidebarInisdeGestor');
			$this->load->view('Mensajeria/myMessages');
		}

		$this->load->view('templates/footer');
	}


	public function mensajeria()
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
			$user = $this->ion_auth->user()->row();
			$id = $user->id;

			$data['users'] = $this->mensajes_model->get_all_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);

			$this->load->view('templates/headerInisde', $data);
			$this->load->view('templates/sidebarInside');
			$this->load->view('Mensajeria/MensajeriaAdmin');
		} else if ($this->ion_auth->in_group($groupClient)) {

			$user = $this->ion_auth->user()->row();
			$id = $user->id;

			$data['users'] = $this->mensajes_model->get_admin_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
			
			$this->load->view('templates/headerInsideClient', $data);
			$this->load->view('templates/sidebarInsideClient');
			$this->load->view('Mensajeria/MensajeriaClient');
		} else if ($this->ion_auth->in_group($groupTecnico)) {

			$user = $this->ion_auth->user()->row();
			$id = $user->id;
			
			$data['users'] = $this->mensajes_model->get_all_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);


			$this->load->view('templates/headerInisdeTecnico', $data);
			$this->load->view('templates/sidebarInsideTecnico');
			$this->load->view('Mensajeria/MensajeriaAdmin');
		} else if ($this->ion_auth->in_group($groupGestor)) {
			$user = $this->ion_auth->user()->row();
			$id = $user->id;
			$data['users'] = $this->mensajes_model->get_all_users();
			$data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
			$data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
		
			$this->load->view('templates/headerInisdeGestor', $data);
			$this->load->view('templates/sidebarInisdeGestor');
			$this->load->view('Mensajeria/MensajeriaAdmin');
		}

		$this->load->view('templates/footer');
	}

	public function setMensaje()
	{
		$to = $this->input->post('to');
		$from = $this->input->post('from');
		$asunto = $this->input->post('asunto');
		$mensaje = $this->input->post('mensaje');
		$data = date('y-m-d');

		if ($this->mensajes_model->set_MensajeByClient($to, $from, $asunto, $mensaje, $data)) {
			$this->session->set_flashdata('success', "Mensaje enviado correctamente");
			redirect('mensajeriaClient');
		} else {
			$this->session->set_flashdata('error', "Hubo un error en la edición de los datos de la incidencia");
			redirect('mensajeriaClient');
		}
	}

	public function delete_mensaje($id){
			$id= $this->input->post('id');
			$this->mensajes_model->delete_mensaje_by_id($id);
			echo json_encode(array("status" => TRUE));
	}
}
