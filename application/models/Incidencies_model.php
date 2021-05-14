<?php defined('BASEPATH') or exit('No direct script access allowed');

class Incidencies_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function get_incidencies_by_id($id)
    {
        $query = $this->db->query("SELECT * From incidencia where id_user='" . $id . "'");
        return $query->result_array();
    }

    public function get_incidencies_by_id_tecnico($id)
    {
        $query = $this->db->query("SELECT * From incidencia where id_tecnico='" . $id . "'");
        return $query->result_array();
    }

    public function get_estados_tecnico()
    {
        $query = $this->db->query("SELECT * From tipo_estado");
        return $query->result_array();
    }



    // public function set_noticia_api($id, $date, $title, $subtitle, $content)
    // {
    //     $data = array(
    //         'id' => $id,
    //         'data' => $date,
    //         'title' => $title,
    //         'subtitle' => $subtitle,
    //         'content' => $content
    //     );

    //     return $this->db->insert('noticies', $data);
    // }


    // public function set_noticia()
    // {
    //     $this->load->helper('url');

    //     $data = array(
    //         'id' => $this->input->post('id'),
    //         'data' => $this->input->post('data'),
    //         'title' => $this->input->post('title'),
    //         'subtitle' => $this->input->post('subtitle'),
    //         'content' => $this->input->post('content')
    //     );

    //     return $this->db->insert('noticies', $data);
    // }

    // public function delete_noticies($noticies)
    // {
    //     $this->db->delete('noticies', array('id' => $noticies));
    //     return $this->db->affected_rows();
    // }


    // public function editNoticies($id)
    // {

    //     $this->load->helper('url');

    //     $data = array(
    //         'data' => $this->input->post('data'),
    //         'title' => $this->input->post('title'),
    //         'subtitle' => $this->input->post('subtitle'),
    //         'content' => $this->input->post('content')
    //     );

    //     $this->db->where('id', $id);
    //     return $this->db->update('noticies', $data);
    // }

    // public function editNoticies_api($id, $date, $title, $subtitle, $content)
    // {
    //     $data = array(
    //         'data' => $date,
    //         'title' => $title,
    //         'subtitle' => $subtitle,
    //         'content' => $content
    //     );

    //     $this->db->where('id', $id);
    //     return $this->db->update('noticies', $data);
    // }
}

/* End of file News_model.php */