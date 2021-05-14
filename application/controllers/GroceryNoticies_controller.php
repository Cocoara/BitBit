<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GroceryNoticies_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
        $this->load->library("session");
		$this->load->library('Grocery_CRUD');
	}

	public function noticies()
    {
        $crud = new grocery_CRUD();
        $crud->set_theme('tablestrap');
		$crud->set_table('noticies');
        $output = $crud->render();
 
        $this->output($output);     
    }

	function output($output = null)
    {
        $this->load->view('grocery/index.php',$output);		
    }
}


