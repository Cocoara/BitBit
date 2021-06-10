<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function count_noticies()
    {
        $query =  $this->db->query("SELECT * from noticies");
        return $query->num_rows();
    }


    public function get_noticias_by_id($id){
        $this->db->select('*');
        $this->db->from('noticias');
        $this->db->where('id_grupo', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_homeinfo()
    {
        $query =  $this->db->query("SELECT * from homeinfo");
        return $query->result_array();
    }

    public function get_userGroup($id)
    {
        $this->db->select('users_groups.group_id');
        $this->db->from('users_groups');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_incidencias_by_id($id){
        $query = $this->db->query("SELECT * From incidencia where id_user='" . $id . "'");
        return $query->result_array();
    }

    public function get_incidenciasTecnico($id){
        $query = $this->db->query("SELECT * From incidencia where id_tecnico='" . $id . "'");
        return $query->result_array();
    }


    public function set_consulta($nombre, $apellido,$telefono,$correo,$tema,$mensaje)
    {
        $date = date('Y-m-d');
        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'correo' => $correo,
            'tema' => $tema,
            'mensaje' => $mensaje,
            'fecha' => $date
        );

        return $this->db->insert('consulta', $data);
    }

    public function get_temasConsulta()
    {
        $query =  $this->db->query("SELECT * from temaConsulta");
        return $query->result_array();
    }


    public function get_noticies_by_id($noticia)
    {
        $query = $this->db->query("SELECT * From noticies where id='" . $noticia . "'");
        return $query->result_array();
    }

    public function get_incidencies_by_id($id)
    {
        $query = $this->db->query("SELECT * From incidencies where id_user='" . $id . "'");
        return $query->result_array();
    }


    public function get_tomessagesAdmin(){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->select('users.id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->where('group_id !=',2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tomessagesAll(){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->select('users.id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function set_noticia_api($id, $date, $title, $subtitle, $content)
    {
        $data = array(
            'id' => $id,
            'data' => $date,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content
        );

        return $this->db->insert('noticies', $data);
    }


    public function set_message($from, $to, $asunto, $mensaje, $data)
    {
        $data = array(
            'from' => $from,
            'to' => $to,
            'asunto' => $asunto,
            'mensaje' => $mensaje,
            'data' => $data
        );

        return $this->db->insert('mensajes', $data);
    }

    public function getUserInfo($id)
    {
        $query = $this->db->query("SELECT * From users where id='" . $id . "'");
        return $query->result_array();
    }

    public function set_opciones($id, $username, $lastname, $phone, $email, $password)
    {
        $data = array(
            'username' => $username,
            'last_name' => $lastname,
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function set_opcionesWithout($id, $username, $lastname, $phone, $email)
    {
        $data = array(
            'username' => $username,
            'last_name' => $lastname,
            'phone' => $phone,
            'email' => $email
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }


    public function getMessages($id)
    {
        $this->db->order_by('data', 'DESC');
        $query = $this->db->get_where('mensajes', array('to' => $id));
        return $query->result_array();
    }

    public function get_incidenciaById($id_incidencia){
        $query = $this->db->query("SELECT * From incidencia where id_incidencia='" . $id_incidencia . "'");
        return $query->result_array();
    }

    public function get_estadosIncidencia(){
        $query = $this->db->query("SELECT * From tipo_estado");
        return $query->result_array();
    }



    //    ----------------------------------------------------------------


    public function set_noticia()
    {
        $this->load->helper('url');

        $data = array(
            'id' => $this->input->post('id'),
            'data' => $this->input->post('data'),
            'title' => $this->input->post('title'),
            'subtitle' => $this->input->post('subtitle'),
            'content' => $this->input->post('content')
        );

        return $this->db->insert('noticies', $data);
    }

    public function delete_noticies($noticies)
    {
        $this->db->delete('noticies', array('id' => $noticies));
        return $this->db->affected_rows();
    }

    
    public function editNoticies($id)
    {

        $this->load->helper('url');

        $data = array(
            'data' => $this->input->post('data'),
            'title' => $this->input->post('title'),
            'subtitle' => $this->input->post('subtitle'),
            'content' => $this->input->post('content')
        );

        $this->db->where('id', $id);
        return $this->db->update('noticies', $data);
    }

    public function editNoticies_api($id, $date, $title, $subtitle, $content)
    {
        $data = array(
            'data' => $date,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content
        );

        $this->db->where('id', $id);
        return $this->db->update('noticies', $data);
    }
}

/* End of file News_model.php */