<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exercise2 extends CI_Controller {

	public function hospedaje($connection)
	{
    $this->_migrateHospedaje($connection);    
	}
	
	private function _migrateHospedaje($connection)
	{
	  //firts insert select its one to many relation
    $source_db = $this->load->database($connection, true);   
    $query = $source_db->get('apartamento');
	  foreach ($query->result_array() as $key => $row)
    {
      unset($row['idapartamento']);
      $target_db = $this->load->database('default', true);
      $target_db->insert('apartamento', $row);
    }
    echo 'Migrated ' . ($key + 1) . ' apartmento records<br>';
    
    //now the master table    
    $source_db = $this->load->database($connection, true);       
	  $query = $source_db->get('hospedaje');
	  foreach ($query->result_array() as $row)
    {
      $source_idhospedaje = $row['idhospedaje'];
      unset($row['idhospedaje']);
      $target_db = $this->load->database('default', true);
      $target_db->insert('hospedaje', $row);
      //now update relations
      $new_idhospedaje =  $target_db->insert_id();       
      $target_db->where('idhospedaje', $source_idhospedaje);
      $target_db->update('apartamento', array('idhospedaje' => $new_idhospedaje));
    }
    echo 'Migrated ' . ($key + 1) . ' hospedaje records<br>';
  }
	
}


