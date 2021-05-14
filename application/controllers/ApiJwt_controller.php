<?php 
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') or exit('No direct script access allowed');
class ApiJwt_controller extends JwtAPI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('noticies_model');
        // $this->load->library('form_validation');
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

    public function noticies_get()
    {
        $noticies = $this->noticies_model->get_noticies();
        $id = $this->get('id');

        if ($id === null) {
            if ($noticies) {
                $this->response($noticies, 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No noticies were found'
                ], 404);
            }
        } else {
            $this->response($this->noticies_model->get_noticies_by_id($id));
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

            if ($this->noticies_model->delete_noticies($this->delete('id'))){
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

            if ($this->noticies_model->editNoticies_api($this->put('id'), $this->put('date'), $this->put('title'), $this->put('subtitle'), $this->put('content'))){
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

    public function index_options() 
    {
        $this->output->set_header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        $this->output->set_header("Access-Control-Allow-Methods: GET, DELETE, OPTIONS");
        $this->output->set_header("Access-Control-Allow-Origin: *");
       
        $this->response(null, JwtAPI_Controller::HTTP_OK); // OK (200) being the HTTP response code
     }


    }
