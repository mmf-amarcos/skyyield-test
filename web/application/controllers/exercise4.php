<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercise4 extends CI_Controller {

	public function index($page_title = null)
	{
	  $this->load->helper(array('url'));
	  if (is_null($page_title)) {
	    $page_title = 'This is the index page';
	  }
	  $data['page_title'] = $page_title;

		$this->load->view('exercise4/index', $data);
	}
	
	public function page($page_number)
	{
		return $this->index('This is page '. $page_number);
	}	
}


