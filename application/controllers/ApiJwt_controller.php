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

    public function temas_get()
    {
        $temas = $this->api_model->get_temasConsulta();
        if ($temas) {
            $this->response($temas, 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No home information available'
            ], 404);
        }
    }

    public function consulta_post()
    {

        $nombre = $this->post('nombre');
        $apellido = $this->post('apellido');
        $telefono = $this->post('telefono');
        $correo = $this->post('correo');
        $tema = $this->post('tema');
        $mensaje = $this->post('mensaje');
        // $this->api_model->set_consulta($nombre,$apellido,$telefono,$correo,$tema,$mensaje);

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

    public function noticias_get()
    {

        $this->output->set_header("Access-Control-Allow-Origin: *");
        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            $noticies = $this->api_model->get_noticias();
            
                if ($noticies) {
                    $message = [
                        'noticies' => $noticies,
                        'status' => RestController::HTTP_OK,
                        'token' => $jwt
                    ];
                    $this->response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code
                } else {
                    $this->response([
                        'status' => false,
                        'message' => 'No home information available'
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

    public function noticies_post()
    {

        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            if ($this->noticies_model->set_noticia_api($this->post('id'), $this->post('date'), $this->post('title'), $this->post('subtitle'), $this->post('content'))) {
                $message = [
                    'id' => $this->post('id'),
                    'title' => $this->post('title'),
                    'subtitle' => $this->post('subtitle'),
                    'date' => $this->post('date'),
                    'content' => $this->post('content'),
                    'status' => RestController::HTTP_CREATED,
                    'message' => 'Noticia afegida',
                    'token' => $jwt
                ];
                $this->set_response($message, RestController::HTTP_CREATED); // CREATED (201) being the HTTP response code

            } else {
                $message = [
                    'id' => $this->post('id'),
                    'title' => $this->post('title'),
                    'subtitle' => $this->post('subtitle'),
                    'date' => $this->post('date'),
                    'content' => $this->post('content'),
                    'status' => RestController::HTTP_BAD_REQUEST,
                    'message' => validation_errors()
                ];
                $this->set_response($message, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400)            
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => "",
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    public function noticies_delete()
    {

        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            if ($this->noticies_model->delete_noticies($this->delete('id'))) {
                $message = [
                    'id' => $this->delete('id'),
                    'status' => RestController::HTTP_CREATED,
                    'message' => 'Noticia eliminada',
                    'token' => $jwt
                ];
                $this->set_response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code

            } else {
                $message = [
                    'id' => $this->delete('id'),
                    'status' => RestController::HTTP_NOT_MODIFIED,
                    'message' => validation_errors()
                ];
                $this->set_response($message, RestController::HTTP_NOT_MODIFIED); // BAD_REQUEST (400)            
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => "",
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

    public function noticies_put()
    {

        if ($this->auth_request()) {

            $jwt = $this->renewJWT();

            if ($this->noticies_model->editNoticies_api($this->put('id'), $this->put('date'), $this->put('title'), $this->put('subtitle'), $this->put('content'))) {
                $message = [
                    'id' => $this->put('id'),
                    'title' => $this->put('title'),
                    'subtitle' => $this->put('subtitle'),
                    'date' => $this->put('date'),
                    'content' => $this->put('content'),
                    'status' => RestController::HTTP_CREATED,
                    'message' => 'Noticia modificada',
                    'token' => $jwt
                ];
                $this->set_response($message, RestController::HTTP_OK); // CREATED (201) being the HTTP response code

            } else {
                $message = [
                    'id' => $this->put('id'),
                    'title' => $this->put('title'),
                    'subtitle' => $this->put('subtitle'),
                    'date' => $this->put('date'),
                    'content' => $this->put('content'),
                    'status' => RestController::HTTP_NOT_MODIFIED,
                    'message' => validation_errors()
                ];
                $this->set_response($message, RestController::HTTP_NOT_MODIFIED); // BAD_REQUEST (400)            
            }
        } else {
            $message = [
                'status' => $this->auth_code,
                'token' => "",
                'message' => 'Bad auth information. ' . $this->error_message
            ];
            $this->set_response($message, $this->auth_code); // 400 / 401 / 419 / 500
        }
    }

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
                    'message' => 'No home information available'
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
                    'message' => 'No notification information available'
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
                    'message' => 'No notification information available'
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
                    'message' => 'No notification information available'
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
                    'message' => 'No notification information available'
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
                    'message' => 'No notification information available'
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

    public function updateOpciones_post()
    {
        // var_dump("das");die();
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
                    'message' => 'No notification information available'
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


    public function updateOpcionesWithout_post()
    {
        // var_dump("das");die();
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
                    'message' => 'No notification information available'
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



    public function logout_post()
    {
        $this->ion_auth->logout();
    }

    // OPTIONS OF API Models

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
