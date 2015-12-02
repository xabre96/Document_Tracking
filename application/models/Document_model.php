<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

  public function updateStatus($id){
  		date_default_timezone_set("Asia/Manila");
	  	$data = array(
	  		'released_date' => date("Y-m-d")
	  	);
	  	$this->db->update('document_date', $data , array('document_id' => $id));
	  	$data = array(
	  		'status' => 0
	  	);
	  	return $this->db->update('document', $data , array('document_id' => $id));	
  }

  public function getDocument($id){
  	return $this->db->query("SELECT * FROM document as a, document_date as b WHERE a.document_id = ".$id." and b.document_id = ".$id)->result();
  }

  public function getDocumentDetail($id){
  	return $this->db->query("SELECT * FROM document_details WHERE document_id = ".$id)->result();
  }

  public function getDocuments(){
  	$limit = $this->db->query("SELECT COUNT(document_id) as a from document");
  	foreach ($limit->result() as $key => $value) {
  		$limit = $value->a;
  	}
  	return $this->db->query("SELECT Distinct(a.document_id), a.subject, a.sender, a.instructions, a.status, b.date_received, b.followUp_date, b.due_date, b.released_date, c.time_received FROM document AS a, document_date AS b, document_time AS c WHERE a.document_id=b.document_id AND a.document_id=c.document_id")->result();
  }

  public function getOffices(){
  	return $this->db->query("SELECT a.document_id, a.office_id, b.office FROM document_details as a, offices as b WHERE a.office_id = b.office_id")->result();
  }

  public function getDocumentDetails(){
  	return $this->db->get("document_details")->result();
  }

  public function insertDocument($data){
  	date_default_timezone_set("Asia/Manila");
  	$time = date("H:i:sa");
  	$date = date("Y-m-d");
 
	$dat = array(
		      "subject" => $data['subject'],
		      "sender" => $data['sender'],
		      "instructions" => $data['instructions'],
		      "others" => $data['others'],
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

  public function updateDocument($data, $id){
  	$ids = $this->db->query("SELECT document_details_id FROM document_details WHERE document_id = ".$id)->result();
  	$x = 0;
  	foreach ($ids as $key => $value) {
  		$ix[$x] = $value->document_details_id;
  		$x++;
  	}
  	
	$dat = array(
		      "subject" => $data['subject'],
		      "sender" => $data['sender'],
		      "others" => $data['others'],
		      "instructions" => $data['instructions']
		    );
	$confirm = $this->db->update('document', $dat, array('document_id' => $id));

	if(count($ix) == count($data["office"])){
		for ($i=0; $i < count($ix) ; $i++) { 
  			$dat = array(
			      "office_id" => $data['office'][$i]
			);
			$confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));	
  		}
		return $confirm;	
	}else if(count($ix) > count($data["office"])){
		var_dump($data["office"]);
		$str = implode(', ', $data["office"]);
		// $ids = $this->db->query("SELECT office_id FROM document_details WHERE document_id = ".$id)->result();
		// var_dump($data);
		// $str = implode(', ', array_map(function($c) {return $c->office;}, $data["office"]));
  		// $where = "document_id=".$id." and office_id not in ($str)";
    //     $this->db->where($where);
        $query = $this->db->query("DELETE FROM `document_details` WHERE document_id = $id and office_id not IN ($str)");

        return $query;
	}else{
		for ($i=0; $i < count($ix) ; $i++) { 
  			$dat = array(
			      "office_id" => $data['office'][$i]
			);
			$confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));	
  		}

  		$var = $this->db->query("SELECT compliance_type_id FROM document_details WHERE document_id = ".$id." LIMIT 1")->result();

  		foreach ($var as $key => $value) {
  			$com = $value->compliance_type_id;
  		}

  		for($x=$i;$x<count($data["office"]);$x++){	
	  			$dat = array(
			      "compliance_type_id" => $com,
			      "office_id" => $data['office'][$x],
			      "document_id" => $id
			);
			
			$confirm = $this->db->insert('document_details',$dat);	
			return $confirm;
	}
	}
  }

  public function deleteDocument($id){
  	$this->db->delete('document_time', array('document_id' => $id));
  	$this->db->delete('document_details', array('document_id' => $id));
  	$this->db->delete('document_date', array('document_id' => $id));
  	return $this->db->delete('document', array('document_id' => $id));
  }
}