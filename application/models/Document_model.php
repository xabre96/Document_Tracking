<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

  public function insertDocument($data){
  	date_default_timezone_set("Asia/Manila");
  	$time = date("H:i:s");
  	$date = date("Y-m-d");
 //  	$maxid = 0;
	// $row = $this->db->query('SELECT MAX(document_id) AS maxid FROM document')->row();
	// if ($row) {
 //    	 $maxid = $row->maxid; 
	// }
	$dat = array(
		      "subject" => $data['subject'],
		      "sender" => $data['sender'],
		      "instructions" => $data['instructions'],
		      "status" => 1
		    );
	$confirm = $this->db->insert('document', $dat);

	$id = $this->db->insert_id();

	$dat = array(
		      "time_received" => $time,
		      "document_id" => $id
		    );
	$confirm = $this->db->insert('document_time', $dat);

	$dat = array(
		      "date_received" => $date,
		      "due_date" => $data['due_date'],
		      "document_id" => $id
		    );
	$confirm = $this->db->insert('document_date',$dat);

  	for($x=0;$x<count($data["office"]);$x++){
		$dat = array(
		      "compliance_type_id" => $data['compliance'],
		      "office_id" => $data['office'][$x],
		      "document_id" => $id
		);
		$confirm = $this->db->insert('document_details',$dat);
	}
	return $confirm;
  }

}