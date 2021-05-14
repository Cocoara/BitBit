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

  


    
   
}

