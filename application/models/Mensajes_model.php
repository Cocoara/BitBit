<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mensajes_model  extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }


    public function get_mensajes_usuario($email)
    {
        $query = $this->db->query("SELECT * From mensajes where para='" . $email . "'");
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

    public function set_incidencies_by_tecnico($id_incidencia,$estado,$Fecha_entrada,$desc_averia,$uuid,$Marca,$Modelo,$Numero_serie,$Diagnostico_prev,$Telf,$tiempo_reparcion,$descripcion_gestor ){
        $data = array(
            'id_Estado' => $estado,
            'Fecha_entrada' => $Fecha_entrada,
            'desc_averia' => $desc_averia,
            'uuid' => $uuid,
            'Marca' => $Marca,
            'Modelo' => $Modelo,
            'Numero_serie' => $Numero_serie,
            'Diagnostico_prev' => $Diagnostico_prev,
            'Telf' => $Telf,
            'tiempo_reparcion' => $tiempo_reparcion,
            'descripcion_gestor' => $descripcion_gestor
        );
        $this->db->where('id_incidencia', $id_incidencia);
        return $this->db->update('incidencia', $data);


    }

    public function get_tipo_consulta(){
        $query = $this->db->query("SELECT * From temaconsulta");
        return $query->result_array();
    }

    public function set_consulta($first_name, $last_name, $phone, $email, $tipo, $mensaje, $data){
        $data = array(
            'nombre' => $first_name,
            'apellido' => $last_name,
            'telefono' => $phone,
            'correo' => $email,
            'tema' => $tipo,
            'mensaje' => $mensaje,
            'fecha' => $data
        );
        return $this->db->insert('consulta', $data);
    }
    


}

/* End of file News_model.php */