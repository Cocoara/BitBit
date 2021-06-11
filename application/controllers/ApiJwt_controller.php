<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');
class ApiJwt_controller extends JwtAPI_Controller
{


    public function __construct()
    {
        parent::__construct();
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        $this->load->database();
        $this->load->model('api_model');
        $this->load->helper('url');

        $config = [
            //            "iat" => time(), // AUTOMATIC value 
            //            "exp" => time() + 300, // expires 5 minutes AUTOMATIC VALUE
            "sub" => "secure.jwt.daw.local", // subject of token
            "jti" => $this->uuid->v5('secure.jwt.daw.local') // Json Token Id
        ];
        $this->init($config, 300); // configuration + auth timeout
        // $this->init($config); // configuration + auth timeout is configured from JWT config file
    }

    public function params_post()
    {
        $user = $this->post('username');
        $pass = $this->post('password');

        $this->login($user, $pass);
    }
    
    /**
     * homeinfo_get
     * Devolverá la respuesta sobre la información de inicio (pública)
     * @return void
     */
    public function homeinfo_get()
    {
        $homeinfo = $this->api_model->get_homeinfo();
        if ($homeinfo) {
            $this->response($homeinfo, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No home information available'
            ], 404);
        }
    }
    
    /**
     * temas_get
     * Devolverá la respuesta sobre los temas de las consultas
     * @return void
     */
    public function temas_get()
    {
        $temas = $this->api_model->get_temasConsulta();
        if ($temas) {
            $this->response($temas, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No hay temas que devolver'
            ], 404);
        }
    }
    
    /**
     * estadosIncidencia_get
     * Devolverá la respuesta sobre los estados de la incidencia
     * @return void
     */
    public function estadosIncidencia_get()
    {
        $estados = $this->api_model->get_estadosIncidencia();
        if ($estados) {
            $this->response($estados, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No hay estados que devolver'
            ], 404);
        }
    }
    
    /**
     * consulta_post
     *  Enviará los datos POST sobre la consulta pública 
     * @return void
     */
    public function consulta_post()
    {

        $nombre = $this->post('nombre');
        $apellido = $this->post('apellido');
        $telefono = $this->post('telefono');
        $correo = $this->post('correo');
        $tema = $this->post('tema');
        $mensaje = $this->post('mensaje');

        if ($this->api_model->set_consulta($nombre, $apellido, $telefono, $correo, $tema, $mensaje)) {
            $message = [
                'nombre' => $this->post('nombre'),
                'apellido' => $this->post('apellido'),
                'telefono' => $this->post('telefono'),
                'correo' => $this->post('correo'),
                'tema' => $this->post('tema'),
                'mensaje' => $this->post('mensaje'),
                'status' => RestController::HTTP_CREATED,
                'message' => 'Consulta añadida'
            ];
            $this->set_response($message, RestController::HTTP_CREATED); // CREATED (201) being the HTTP response code

        } else {
            $message = [
                'nombre' => $this->post('nombre'),
                'apellido' => $this->post('apellido'),
                'telefono' => $this->post('telefono'),
                'correo' => $this->post('correo'),
                'tema' => $this->post('tema'),
                'mensaje' => $this->post('mensaje'),
                'fecha' => $this->post('fecha'),
                'status' => RestController::HTTP_BAD_REQUEST,
                'message' => validation_errors()
            ];
            $this->set_response($message, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400)            
        }
    }


        
    /**
     * incidencias_get
     *  Devolverá la respuesta sobre las incidencias
     * @param  mixed $id el id de usuario asignado a cada incidencia
     * @return void
     */
    public function incidencias_get($id)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $incidencias = $this->api_model->get_incidencias_by_id($id);

            if ($incidencias) {
                $message = [
                    'incidencias' => $incidencias,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay incidencias asignadas a este id'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }
    
    /**
     * incidenciasTecnico_get
     * Devolverá la respuesta sobre las incidencias del tecnico
     * @param  mixed $id identificador del tecnico
     * @return void
     */
    public function incidenciasTecnico_get($id)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $incidencias = $this->api_model->get_incidenciasTecnico($id);

            if ($incidencias) {
                $message = [
                    'incidencias' => $incidencias,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay incidencias asignadas a este id'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }
    
    /**
     * noticiasByGroup_get
     * Devolverá las incidencias del grupo respectivo
     * @param  mixed $id es el id del grupo que queremos las noticias
     * @return void
     */
    public function noticiasByGroup_get($id)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $noticias = $this->api_model->get_noticias_by_id($id);

            if ($noticias) {
                $message = [
                    'noticias' => $noticias,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay notificaciones a esta id'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    /**
     * toMessagesAdmin_get
     *  Devolverá la respuesta de la petición a todos los nombres de usuarios Administradores para la mensajería interna
     * @return void
     */
    public function toMessagesAdmin_get()
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $tomessages = $this->api_model->get_tomessagesAdmin();

            if ($tomessages) {
                $message = [
                    'tomessages' => $tomessages,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay usuarios'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    /**
     * toMessagesAll_get
     * Devolverá la respuesta de devolver todos los usuarios, de tal manera los administradores podrán enviar mensajes internos a todos los usuarios 
     * @return void
     */
    public function toMessagesAll_get()
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $tomessages = $this->api_model->get_tomessagesAll();

            if ($tomessages) {
                $message = [
                    'tomessages' => $tomessages,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay usuarios'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    /**
     * sendMessage_post
     * Enviará el mensaje por POST al destinatario pasado por $to
     * @return void
     */
    public function sendMessage_post()
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $from = $this->post('from');
            $to = $this->post('to');
            $asunto = $this->post('asunto');
            $mensaje = $this->post('mensaje');
            $data = date('Y-m-d');

            $message = $this->api_model->set_message($from, $to, $asunto, $mensaje, $data);

            if ($message) {
                $message = [
                    'message' => true,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No se ha enviado el mensaje'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    /**
     * getMessages_get
     *  Devolverá los mensajes del identificador
     * @param  mixed $id id del usuario remitente
     * @return void
     */
    public function getMessages_get($id)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $mymessages = $this->api_model->getMessages($id);

            if ($mymessages) {
                $message = [
                    'mymessages' => $mymessages,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay mensajes disponibles'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }
    
    /**
     * opciones_get
     *  Devolverá la información para el cambio de datos privados del usuario $id
     * @param  mixed $id id del usuario
     * @return void
     */
    public function opciones_get($id)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $userInfo = $this->api_model->getUserInfo($id);

            if ($userInfo) {
                $message = [
                    'info' => $userInfo,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay informacion para este id'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }
    
    /**
     * updateOpciones_post
     *  Enviará la petición para el cambio de datos personales
     * @return void
     */
    public function updateOpciones_post()
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $id = $this->post('id');
            $username = $this->post('username');
            $lastname = $this->post('lastname');
            $phone = $this->post('phone');
            $email = $this->post('email');
            $password = $this->post('password');

            $password = $this->ion_auth_model->hash_password($password);

            $opciones = $this->api_model->set_opciones($id, $username, $lastname, $phone, $email, $password);

            if ($opciones) {
                $message = [
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No se pudo actualizar la información'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    /**
     * updateOpcionesWithout_post
     * Enviara por separado la contraseña (en caso de rellenar el campo en la vista de cambio de datos)
     * @return void
     */
    public function updateOpcionesWithout_post()
    {
        
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $id = $this->post('id');
            $username = $this->post('username');
            $lastname = $this->post('lastname');
            $phone = $this->post('phone');
            $email = $this->post('email');

            $opciones = $this->api_model->set_opcionesWithout($id, $username, $lastname, $phone, $email);

            if ($opciones) {
                $message = [
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No se ha podido cambiar la contrasña'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }


    
    /**
     * logout_post
     * Deslogueará al usuario que llame la funcion vía POST
     * @return void
     */
    public function logout_post()
    {
        $this->ion_auth->logout();
    }

    
    /**
     * incidenciaById_get
     * Devuelve la incidencia que pasemos el id
     * @param  mixed $id_incidencia identificador de la incidencia
     * @return void
     */
    public function incidenciaById_get($id_incidencia)
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $incidencia = $this->api_model->get_incidenciaById($id_incidencia);

            if ($incidencia) {
                $message = [
                    'incidencia' => $incidencia,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No hay incidencias con este id'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }
    
    /**
     * updateIncidencia_post
     *  Actualizará la incidencia con la informacion pasada por POST
     * @return void
     */
    public function updateIncidencia_post()
    {
        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $id_incidencia = $this->post('id_incidencia');
            $id_Estado = $this->post('id_Estado');
            $Fecha_entrada = $this->post('Fecha_entrada');
            $desc_averia = $this->post('desc_averia');
            $uuid = $this->post('uuid');
            $Marca = $this->post('Marca');
            $Modelo = $this->post('Modelo');
            $Numerio_serio = $this->post('Numerio_serio');
            $Diagnostico_prev = $this->post('Diagnostico_prev');
            $tiempo_reparacion = $this->post('tiempo_reparacion');
            $descripcion_gestor = $this->post('descripcion_gestor');
            $material = $this->post('material');
            $canvasImage = $this->post('canvasImage');

            $incidenciaUpdate = $this->api_model->set_UpdateIncidencia($id_incidencia, $id_Estado, $Fecha_entrada, $desc_averia, $uuid, $Marca, $Modelo, $Numerio_serio, $Diagnostico_prev, $tiempo_reparacion, $descripcion_gestor, $material, $canvasImage);

            if ($incidenciaUpdate) {
                $message = [
                    'incidenciaUpdate' => $incidenciaUpdate,
                    'status' => RestController::HTTP_OK,
                    'token' => $jwt
                ];
                $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
            } else {
                $this->response([
                    'status' => false,
                    'token' => $jwt,
                    'message' => 'No se ha podido guardar la incidencia'
                ], 404);
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => $this->token,
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    
    // OPTIONS OF API Models
    
    /**
     * Opciones de las API para evitar errores CORS Policy
     *
     * @return void
     */
    public function  updateIncidencia_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function incidenciaById_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function uupdateOpcionesWithouts_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function updateOpciones_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function opciones_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function noticiasByGroup_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function toMessagesAdmin_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function toMessagesAll_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function homeinfo_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function logout_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }


    public function consulta_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function temas_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, API_Controller::HTTP_OK);
    }

    public function index_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, DELETE, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, JwtAPI_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

    public function incidencias_options()
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        $this->output->set_header("Access-Control-Allow-Methods: GET, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");

        $this->response(null, JwtAPI_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }
}
