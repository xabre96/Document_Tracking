<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offices_model extends CI_Model {

  public function getOffices(){
    return $this->db->get('offices')->result();
  }

}