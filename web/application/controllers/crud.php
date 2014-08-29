<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _custom_output($output = null)
	{
		$this->load->view('crud/crud.php',$output);
	}

/*
	public function visits()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
*/
	public function index()
	{
    /*
     * Mandamos todo lo que llegue a la funcion
     * administracion().
     **/
    redirect('crud/visits');
  }	

	public function visits()
	{
		try{

			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');

			$crud->set_table('visit');
			$crud->set_subject('Visits');
			$crud->required_fields('href', 'referer', 'useragent', 'browser', 'os', 'ip', 'createdat');
			$crud->columns('href', 'referer', 'useragent', 'browser', 'os', 'ip', 'createdat');

			$output = $crud->render();
			$this->_custom_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

}
