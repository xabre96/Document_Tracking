<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_offices_model extends CI_Model {

  public function getSubOffices(){
    return $this->db->get('sub_offices')->result();
  }

}