<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

  public function insertDocument($data){
  	date_default_timezone_set("Asia/Manila");
  	$time = date("H:i:s");
  	$date = date("Y-m-d");
  	echo $time."".$date;
  	for($x=0;$x<count($data["office"]);$x++){
	  	$dat = array(
	      "subject" => $data['subject'],
	      "sender" => $data['sender'],
	      "instructions" => $data['instructions'],
	      "compliance_type_id" => $data['compliance'],
	      "office_id" => $data['office'][$x],
	      "due_date" => $data['due_date'],
	      "time_received" => $time,
	      "date_received" => $date
	    );
	    $this->db->insert('document',$dat);
	}
  	
  }

}