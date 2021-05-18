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
        $this->load->helper('url_helper');
        $this->load->helper(array('form', 'url'));
        $this->load->library("form_validation");
        $this->load->library("ion_auth");
        $this->load->model('users_model');
    }

    public function adminUsuarios()
    {
        if ($this->ion_auth->in_group('admin')) {
            $crud = new grocery_CRUD();
            $crud->set_table('users');
            $crud->columns('id', 'ip_address', 'username', 'email', 'last_login', 'active', 'first_name', 'last_name', 'phone');
            $crud->change_field_type('password', 'password');

            $crud->callback_after_insert(array($this, 'pass_hash'));
            $crud->callback_after_update(array($this, 'pass_hash'));

            $output = $crud->render();
            $this->output($output);
        } else {
            $this->session->set_flashdata('access', "¡No tienes permisos para acceder!");
            redirect('');
        }
    }

    public function pass_hash($post_array)
    {
        $passwordHashed = $this->ion_auth_model->hash_password($post_array['password'], FALSE, FALSE);

        $this->db->set('password', $passwordHashed);
        $this->db->where('username', $post_array['username']);
        $this->db->update('users');

        return true;
    }





    public function user_groups()
    {
        $crud = new grocery_CRUD();
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_relation('group_id', 'groups', 'name');
        $crud->set_table('users_groups');
        $output = $crud->render();

        $this->output($output);
    }

    public function groups()
    {
        $crud = new grocery_CRUD();
        $crud->columns('id', 'name', 'description');
        $crud->set_table('groups');
        $output = $crud->render();

        $this->output($output);
    }

    public function incidencia()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('incidencia');
        $output = $crud->render();

        $this->output($output);
    }

    public function infocontacto()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('infocontacto');
        $output = $crud->render();

        $this->output($output);
    }

    public function mail()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('mail');
        $output = $crud->render();

        $this->output($output);
    }

    public function material()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('material');
        $output = $crud->render();

        $this->output($output);
    }

    public function changePassword()
    {

        $data['user'] = $this->ion_auth->user()->row();

        $this->load->view('templates/headerInisdeClient', $data);
        $this->load->view('pages/changePassword.php');
    }




    function output($output = null)
    {
        $data['user'] = $this->ion_auth->user()->row();
        $this->load->view('templates/headerInisde', $data);
        $this->load->view('templates/sidebarInside', $data );
        $this->load->view('grocery/index.php', $output);
        $this->load->view('templates/footer');
    }
}
