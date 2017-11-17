<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compliance_model extends CI_Model {

  public function getCompliance(){
    return $this->db->get('compliance_type')->result();
  }

}