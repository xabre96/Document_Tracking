<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class offices_model extends CI_Model {

  public function getOffices(){
    return $this->db->get('offices')->result();
  }

}