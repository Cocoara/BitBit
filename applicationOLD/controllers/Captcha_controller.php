<?php defined('BASEPATH') or exit('No direct script access allowed');

class Captcha_controller  extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load the captcha helper
        $this->load->helper('captcha');
    }

    public function index()
    {
        $vals = array(
            'img_path'      => './assets/captcha/',
            'img_url'       => base_url('./assets/captcha/'),
            'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '150',
            'img_height'    => 30,
            'expiration'    => 7200,
            'word_length'   => 8,
            'font_size'     => 16,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    
            // White background and border, black text and red grid
            'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
            )
    );

    $cap = create_captcha($vals);

    $data['captcha'] = $cap['image'];

    $this->load->view('templates/header');
    $this->load->view('register/index', $data);
    $this->load->view('templates/footer');
    }

}

