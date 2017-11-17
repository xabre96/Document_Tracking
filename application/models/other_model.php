<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class other_model extends CI_Model {

  public function getOthers(){
    return $this->db->get('other')->result();
  }

  public function getOther($id){
    return $this->db->get_where('other', array('document_id'=>$id))->result();
  }

}