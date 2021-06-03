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


    public function get_noticias()
    {
        $query =  $this->db->query("SELECT * from noticias");
        return $query->result_array();
    }

    public function get_homeinfo()
    {
        $query =  $this->db->query("SELECT * from homeinfo");
        return $query->result_array();
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