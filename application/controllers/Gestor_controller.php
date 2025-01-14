<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gestor_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library("session");
        $this->load->library('Grocery_CRUD');
        $this->load->model('users_model');
        $this->load->model('mensajes_model');
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library("form_validation");
        $this->load->library("ion_auth");
        $this->load->model('users_model');
    }
    
    /**
     * todasLasIncidencias
     * Mostrará la tabla Grocery CRUD de la parte del Gestor
     * @return void
     */
    public function todasLasIncidencias()
    {
        if ($this->ion_auth->in_group('gestor')) {
            $crud = new grocery_CRUD();
            $crud->set_table('incidencia');
            $crud->callback_before_insert(array($this,'uuid_callback'));
        
            
            $crud->set_relation('id_user', 'users', 'username');
            // $crud->join('users');
            // $crud->set_relation('id_tecnico', 'users_groups', 'user_id', array('group_id' => '3'));
            $crud->set_relation('id_tecnico', 'users', 'username');
        
            // $crud->set_relation_n_n('id_tecnico','users_groups', 'users','user_id','user_id','username');
            
            $crud->required_fields('id_user');
            $crud->field_type('uuid', 'invisible');
            $crud->field_type('id_Estado', 'invisible');
            $crud->columns('id_incidencia', 'id_user', 'id_Estado', 'desc_averia', 'Fecha_entrada', 'Diagnostico_prev');
            $crud->add_fields('id_user','desc_averia','id_Estado','Fecha_entrada','Marca','Modelo','Numero_serie','Diagnostico_prev','Telf','tiempo_reparcion','uuid');
            $crud->edit_fields('id_tecnico','descripcion_gestor');


            
            $output = $crud->render();
            $this->output($output);
        } else {
            $this->session->set_flashdata('access', "¡No tienes permisos para acceder!");
            redirect('');
        }
    }

    
    /**
     * changePassword
     * Cambio de contraseña de la parte gestor
     * @return void
     */
    public function changePassword()
    {
        $data['user'] = $this->ion_auth->user()->row();

        $this->load->view('templates/headerInisdeGestor', $data);
        $this->load->view('templates/sidebarInisdeGestor', $data);
        $this->load->view('pages/changePassword.php');
        $this->load->view('templates/footer');
    }

    
    /**
     * uuid_callback
     * Generará un UUID para asignarlo en las nuevas incidencias
     * @param  mixed $post_array
     * @return void
     */
    function uuid_callback($post_array)
    {   
        $this->load->library('uuid');

        $id = $this->uuid->v4();
        $id = str_replace('-', '', $id);
        $estado = 1;

        $post_array['uuid'] = $id;
        $post_array['id_Estado']= $estado;
        return  $post_array;
        
    }
    
    /**
     * output
     * Salida de las vistas de la librería Grocery CRUD
     * @param  mixed $output
     * @return void
     */
    function output($output = null)
    {
        $user = $this->ion_auth->user()->row();
        $id = $user->id;

        $data['users'] = $this->mensajes_model->get_all_users();
        $data['mensajes'] = $this->mensajes_model->get_mensajes_by_user_id($id);
        $data['badgeMail'] = $this->mensajes_model->get_cout_of_messages($id);
        $data['user'] = $this->ion_auth->user()->row();
        $this->load->view('templates/headerInisdeGestor', $data);
        $this->load->view('templates/sidebarInisdeGestor', $data);
        $this->load->view('grocery/index.php', $output);
        $this->load->view('templates/footer');
    }
}
