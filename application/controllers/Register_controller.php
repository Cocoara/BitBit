<?php defined('BASEPATH') or exit('No direct script access allowed');

class Register_controller  extends CI_Controller
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
		unset($_SESSION['error']);
		$this->load->view('templates/header');
		$this->load->view('register/index');
		$this->load->view('templates/footer');
	}



	public function create_user()
	{
		$this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');


		if ($this->form_validation->run() === TRUE) {
			$username = $this->input->post('username');
			if ($this->users_model->check_if_user_exists($username) >= 1) {
				$this->session->set_flashdata('error', "Este usuario ya existe");
				$this->load->view('templates/header');
				$this->load->view('register/index');
				$this->load->view('templates/footer');
			}
			$password = $this->input->post('password');
			$email = strtolower($this->input->post('email'));

			$additional_data = array(
				'first_name' => $this->input->post('username'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone')
			);
			$group = array('2');
		}

		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
			$this->load->view('templates/header');
			$this->load->view('login/index');
			$this->load->view('templates/footer');
		} else {
			$this->session->set_flashdata('error', "Revisa las credenciales, recuerda que la contraseña debe contener mas de 8 carácteres");
			$this->load->view('templates/header');
			$this->load->view('register/index');
			$this->load->view('templates/footer');
		}










		// $this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		// $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		// $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		// $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		// $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		// $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');


		// if ($this->form_validation->run() === TRUE) {
		// 	$email = strtolower($this->input->post('email'));
		// 	$username = $this->input->post('username');
		// 	$password = $this->input->post('password');

		// 	$additional_data = [
		// 		'first_name' => $this->input->post('username'),
		// 		'last_name' => $this->input->post('last_name'),
		// 		'phone' => $this->input->post('phone')
		// 	];
		// 	$group = array('3');

		// 	if ($this->users_model->check_if_user_exists($email) >= 1) {
		// 		$this->session->set_flashdata('error', "Este usuario ya existe");
		// 		$this->load->view('templates/header');
		// 		$this->load->view('register/index');
		// 		$this->load->view('templates/footer');
		// 	}
		// }


		// if ($this->form_validation->run() === TRUE && $this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
		// 	$this->load->view('templates/header');
		// 	$this->load->view('login/index');
		// 	$this->load->view('templates/footer');
		// } else {
		// 	$this->session->set_flashdata('error', "Revisa las credenciales, recuerda que la contraseña debe contener mas de 8 carácteres");
		// 	$this->load->view('templates/header');
		// 	$this->load->view('register/index');
		// 	$this->load->view('templates/footer');
		// }
	}

	// $this->form_validation->set_rules('username', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
	// 	$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
	// 	$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
	// 	$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
	// 	$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
	// 	$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');


	// 	if ($this->form_validation->run() === TRUE) {
	// 		$email = strtolower($this->input->post('email'));
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');

	// 		$additional_data = [
	// 			'first_name' => $this->input->post('username'),
	// 			'last_name' => $this->input->post('last_name'),
	// 			'phone' => $this->input->post('phone')
	// 		];
	// 		$group = array('3');
	// 	}

	// 	if ($this->form_validation->run() === TRUE && $this->ion_auth->register($username, $password, $email, $additional_data, $group)) {

	// 		$this->load->view('templates/header');
	// 		$this->load->view('login/index');
	// 		$this->load->view('templates/footer');
	// 	}
	// 	else{
	// 		$this->session->set_flashdata('error', "Revisa las credenciales, recuerda que la contraseña debe contener mas de 8 carácteres");
	// 		$this->load->view('templates/header');
	// 		$this->load->view('register/index');
	// 		$this->load->view('templates/footer');
	// 	}
}
