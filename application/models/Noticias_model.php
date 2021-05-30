<?php defined('BASEPATH') or exit('No direct script access allowed');

class Noticias_model  extends CI_Model
{

    public function get_group_id($id)
    {
        $this->db->select('group_id');
        $this->db->from('users_groups');
        $this->db->join('users', 'users_groups.user_id = users.id');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_noticies_by_group_id($id){
        $query = $this->db->query("SELECT * From noticias where id_grupo='" . $id . "'");
        return $query->result_array();
    }
}
