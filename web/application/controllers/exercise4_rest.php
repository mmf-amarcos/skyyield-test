<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/REST_Controller.php');

class Exercise4_rest extends REST_Controller
{

    
    //returns all post parameters
    public function register_post()
    {
        $this->load->database();
        //let us get post params
        $data = $this->post();
        //adding missing params
        $data['ip'] = $this->_getRealIpAddr();
        $data['createdat'] = date('Y-m-d H:i:s');
        
        //let us check visits in last minute
        $where = $data;
        //let us remove no pertinent fields for the search
        unset($where['referer']);
        unset($where['createdat']);
        $where['TIME_TO_SEC(TIMEDIFF(NOW() , createdat )) <'] = 60;
        $query = $this->db
          ->select('count(*) as counter')
          ->from('visit')
          ->where($where)
          ->get();
        $result = $query->row_array();
        $hits_last_minute = $result['counter'];
        
        if ($hits_last_minute >= $this->config->item('max_hits_per_page_per_minute')) {
          $alert = 'Max. hits per minit reached. Visit not recorded';
        }
        else {                
          //tracking this visit
          $res = $this->db->insert('visit', $data); 
          if (!$res) {
            // if query returns null
            $msg = $this->db->_error_message();
            $num = $this->db->_error_number();

            $alert = "Error(".$num.") ".$msg;
          } 
          else {
            $alert = 'Visit tracked. ' . ($hits_last_minute + 1) . ' tracked to this page from this user in last minute' ;
          }
        }            
            
        $this->response(array('alert'=> $alert));    
    }
    
    private function _getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}
