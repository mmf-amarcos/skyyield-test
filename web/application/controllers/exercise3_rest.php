<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Exercise3_rest extends REST_Controller
{

    //returns all get parameters
    public function index_get()
    {
        $this->response($this->get());    
    }
    
    //returns all post parameters
    public function index_post()
    {
        $this->response($this->post());    
    }

}
