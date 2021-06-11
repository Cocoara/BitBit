<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_controller extends CI_Controller
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
     * adminUsuarios
     * Crea una tabla en grocery crud para poder administrar los usuarios sólamente si eres Admin
     * @return void
     */
    public function adminUsuarios()
    {
        if ($this->ion_auth->in_group('admin')) {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $crud->columns('id', 'ip_address', 'username', 'email', 'last_login', 'active', 'first_name', 'last_name', 'phone');
            $crud->change_field_type('password', 'password');

            $crud->callback_after_insert(array($this, 'pass_hash'));
            $crud->callback_after_update(array($this, 'pass_hash'));
            $crud->callback_before_delete(array($this, 'prevent_delete_admin'));

            $output = $crud->render();
            $this->output($output);
        } else {
            $this->session->set_flashdata('access', "¡No tienes permisos para acceder!");
            redirect('');
        }
    }
    
    /**
     * pass_hash
     * Cifrará la contraseña y la guardará en la base de datos
     * @param  mixed $post_array es la contraseña sin cifrar
     * @return void 
     */
    public function pass_hash($post_array)
    {
        $passwordHashed = $this->ion_auth_model->hash_password($post_array['password'], FALSE, FALSE);

        $this->db->set('password', $passwordHashed);
        $this->db->where('username', $post_array['username']);
        $this->db->update('users');

        return true;
    }

    
    /**
     * prevent_delete_admin
     * Evitará la eliminación del usuario Admin
     * @param  mixed $primary_key
     * @return void
     */
    public function prevent_delete_admin($primary_key)
    {
        if ($primary_key == 33) {
            return false;
        } else {
            return true;
        }
    }



    
    /**
     * user_groups
     *  Crea una tabla en grocery crud para poder administrar los usuarios
     * @return void
     */
    public function user_groups()
    {
        $crud = new grocery_CRUD();
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_relation('group_id', 'groups', 'name');
        $crud->set_table('users_groups');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * groups
     * Crea una tabla en grocery crud para poder administrar los grupos de los usuarios
     * @return void
     */
    public function groups()
    {
        $crud = new grocery_CRUD();
        $crud->columns('id', 'name', 'description');
        $crud->set_table('groups');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * incidencia
     * Crea una tabla en grocery crud para poder administrar las incidencias
     * @return void
     */
    public function incidencia()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('incidencia');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * infocontacto
     * Crea una tabla en grocery crud para poder administrar la información del contacto
     * @return void
     */
    public function infocontacto()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('infocontacto');
        $output = $crud->render();

        $this->output($output);
    }

        
    /**
     * mail
     * Crea una tabla en grocery crud para poder enviar correos (inactivo)
     * @return void
     */
    public function mail()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('mail');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * noticias
     * Crea una tabla en grocery crud para poder administrar noticias
     * @return void
     */
    public function noticias()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('noticias');
        $crud->set_relation('id_grupo', 'groups', 'name');
        $crud->set_field_upload('file_url', 'assets/uploads/files');

        $crud->callback_before_insert(array($this, 'date_callback'));
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * homeinfo
     * Crea una tabla en grocery crud para poder administrar la información de inicio
     * @return void
     */
    public function homeinfo()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('homeinfo');
        $crud->set_field_upload('image', '../../uploads/homeimages');
        $crud->columns('title', 'content');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * material
     * Crea una tabla en grocery crud para poder administrar material
     * @return void
     */
    public function material()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('material');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * tipoConsulta
     * Crea una tabla en grocery crud para poder administrar el tipo de consulta que pueden hacer los clientes antes de registrarse (parte pública)
     * @return void
     */
    public function tipoConsulta()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('temaconsulta');
        $crud->fields('tipoConsulta');
        $output = $crud->render();

        $this->output($output);
    }
    
    /**
     * consulta
     * Crea una tabla en grocery crud para poder administrar las consultas hechas por los clientes
     * @return void
     */
    public function consulta()
    {
        if ($this->ion_auth->in_group('admin')) {
            $crud = new grocery_CRUD();
            $crud->set_table('consulta');
            $output = $crud->render();

            $this->output($output);
            return;
        }
        if ($this->ion_auth->in_group('gestor')) {
            $crud = new grocery_CRUD();
            $crud->set_table('consulta');
            $crud->unset_delete();
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_clone();
            $output = $crud->render();

            $this->outputGestor($output);
            return;
        }
    }

    
    /**
     * changePassword
     * Mostrará la vista que permitirá cambiar la contraseña del usuario
     * @return void
     */
    public function changePassword()
    {

        $data['user'] = $this->ion_auth->user()->row();

        $this->load->view('templates/headerInisdeClient', $data);
        $this->load->view('pages/changePassword.php');
    }

    
    /**
     * outputGestor
     * Es la función que renderizara la vista de las tablas del Grocery CRUD del gestor
     * @param  mixed $output
     * @return void
     */
    function outputGestor($output = null)
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
    
    /**
     * output
     * La función que renderiza las tablas del Grocery CRUD
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
        $this->load->view('templates/headerInisde', $data);
        $this->load->view('templates/sidebarInside', $data);
        $this->load->view('grocery/index.php', $output);
        $this->load->view('templates/footer');
    }
    
    /**
     * date_callback
     * Devolverá la data de hoy
     * @param  mixed $post_array
     * @return void
     */
    function date_callback($post_array)
    {
        $data = date('d-m-y');

        $post_array['data'] = $data;
        return  $post_array;
    }

    // GET PUBLIC IMAGES CONTROLLERS
    
    /**
     * public_imagen
     * Descargará o mostrará el fichero con los siguientes parámetros
     * @param  mixed $id_incidencia identificador de incidencia
     * @param  mixed $nom_arxiu Nombre del archivo
     * @return void
     */
    public function public_imagen($id_incidencia, $nom_arxiu)
    {
        $this->load->helper('download');
        force_download('C:\xampp\uploads/' . $id_incidencia . '/' . $nom_arxiu, NULL, TRUE);
    }
}
