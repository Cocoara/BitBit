<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function get_mensajes_by_user_id($id)
    {
        $query = $this->db->get_where('mensajes', array('to' => $id));
        return $query->result_array();
    }

    
    public function get_cout_of_messages($id)
    {
        $query = $this->db->get_where('mensajes', array('to' => $id));
        return $query->num_rows();
    }



    public function get_admin_users(){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->select('users.id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $this->db->where('group_id !=',2);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_users(){
        $this->db->distinct();
        $this->db->select('username');
        $this->db->select('users.id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users_groups.user_id = users.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function set_MensajeByClient($to,$from, $asunto, $mensaje,$data){
        $data = array(
            'to' => $to,
            'from' => $from,
            'asunto' => $asunto,
            'mensaje' => $mensaje,
            'data' => $data
        );
        return $this->db->insert('mensajes', $data);
    }
    
    public function delete_mensaje_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mensajes');
    }

}

/* End of file News_model.php */