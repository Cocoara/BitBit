<?php defined('BASEPATH') or exit('No direct script access allowed');

class Client_Controller  extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mensajes_model');
        $this->load->model('incidencies_model');
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
    }

    public function generateForUuid()
    {

        if (!$this->ion_auth->logged_in()) {
            $this->load->view('templates/header');
            $this->load->view('pages/home');
            $this->load->view('templates/footer');
            return;
        } else {
            
			$user = $this->ion_auth->user()->row();
			$id= $user->id;
            $data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
            $data['user'] = $this->ion_auth->user()->row();
            $this->load->view('templates/headerInsideClient', $data);
            $this->load->view('templates/sidebarInsideClient');
            $this->load->view('pages/generateForUuid');
            $this->load->view('templates/footer');
        }
    }

    public function fichaUUID()
    {

        if (!$this->ion_auth->logged_in()) {
            $this->load->view('templates/header');
            $this->load->view('pages/home');
            $this->load->view('templates/footer');
            return;
        } else {
            $uuid = $this->input->post('uuid');
            $this->load->library('Pdf');
            if ($this->incidencies_model->get_incidencias_by_uuid($uuid)) {
                $id_incidencia = $this->incidencies_model->get_incidencias_by_uuid($uuid);
                $data['ficheros'] = $this->incidencies_model->get_ficheros_by_incidencia($id_incidencia[0]['id_incidencia']);
                /* INNER JOIN QUERYIES*/ 
                $data['incidencia'] = $this->incidencies_model->get_nombre_tecnicos_incidencia($id_incidencia[0]['id_incidencia']); 
                $data['incidenciaEsatdo'] = $this->incidencies_model->get_estado_incidencia($id_incidencia[0]['id_incidencia']); 
                $data['incidenciaCliente'] = $this->incidencies_model->get_cliente_incidencia($id_incidencia[0]['id_incidencia']); 
                $this->load->view('pdf/uuid', $data);
            } else {
                $data['user'] = $this->ion_auth->user()->row();
                $this->session->set_flashdata('error', "Error, revisa que el UUID sea correcto");
                $this->load->view('templates/headerInsideClient', $data);
                $this->load->view('templates/sidebarInsideClient');
                $this->load->view('pages/generateForUuid');
                $this->load->view('templates/footer');
            }
        }
    }
}
