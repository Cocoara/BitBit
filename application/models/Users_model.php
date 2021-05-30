<?php defined('BASEPATH') or exit('No direct script access allowed');

class Users_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function lastRow(){
        $query =  $this->db->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
        return $query->num_rows();
    }

    public function check_if_user_exists($username){
        $query =  $this->db->query("SELECT * FROM users WHERE username ='".$username."'");
        return $query->num_rows();
    }

}

