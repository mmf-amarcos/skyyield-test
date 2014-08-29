<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercise3 extends CI_Controller {

	public function index()
	{
  	$this->load->helper(array('form', 'url'));
		$this->load->view('exercise3/index');
	}
		
}


