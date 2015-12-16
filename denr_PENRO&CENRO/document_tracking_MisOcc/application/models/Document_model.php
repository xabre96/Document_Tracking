<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

	public function getDocumentDue($date){
		return $this->db->query("SELECT DISTINCT(a.document_id), a.subject, a.sender, a.address, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, d.document_time_id, d.time_received FROM document as a, document_date as b, document_time as d WHERE a.document_id = b.document_id and a.document_id = d.document_id and a.status_id != 0 and b.due_date = '".$date."'")->result();
	}

	public function getDocumentNum(){
		return $this->db->query("SELECT COUNT(document_id) as count from document")->result();
	}

	public function getDocumentActed(){
			return $this->db->query("SELECT DISTINCT(a.document_id), a.subject, a.sender, a.address, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, d.document_time_id, d.time_received FROM document as a, document_date as b, document_time as d WHERE a.document_id = b.document_id and a.document_id = d.document_id and a.status_id = 0")->result();
	}

	public function getDocumentDetailsActed(){
		return $this->db->query("SELECT a.document_id, c.compliance_type_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id=0")->result();
	}

	public function getDocumentDetailsDue($date){
		return $this->db->query("SELECT a.document_id, c.compliance_type_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id != 0 and b.due_date = '".$date."'")->result();
	}

	public function getDueNum($date){
		return $this->db->query("SELECT COUNT(b.document_date_id) as count from document as a, document_date as b WHERE a.document_id = b.document_id and a.status_id != 0 and b.due_date = '".$date."'")->result();
	}

	public function getActedNum(){
		return $this->db->query("SELECT COUNT(document_id) as count from document where status_id=0")->result();
	}

	public function getFollowNum($date){
		return $this->db->query("SELECT COUNT(b.document_date_id) as count from document as a, document_date as b where a.document_id = b.document_id and a.status_id != 0 and b.followUp_date='".$date."'")->result();
	}

	public function getDocumentFollow($date){
		return $this->db->query("SELECT DISTINCT(a.document_id), a.subject,  a.address, a.sender, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, d.document_time_id, d.time_received FROM document as a, document_date as b, document_time as d WHERE a.document_id = b.document_id and a.document_id = d.document_id and a.status_id != 0 and b.followUp_date = '".$date."'")->result();
	}

	public function getDocumentDetailsFollow($date){
		return $this->db->query("SELECT a.document_id, c.compliance_type_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id != 0 and  b.followUp_date = '".$date."'")->result();
	}

	public function maxId(){
		return $this->db->select_max('document_id')->get('document')->result();
	}

	public function getDocumentDate($id){
		return $this->db->get_where('document_date', array('document_id' => $id))->result();
	}

	public function getDocumentTime($id){
		return $this->db->get_where('document_time', array('document_id' => $id))->result();	
	}

  public function updateStatus($id){
  		date_default_timezone_set("Asia/Manila");
	  	$data = array(
	  		'released_date' => date("Y-m-d")
	  	);
	  	$this->db->update('document_date', $data , array('document_id' => $id));
	  	$data = array(
	  		'status_id' => 0
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
  	return $this->db->query("SELECT Distinct(a.document_id), a.subject, a.sender, a.address, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, c.time_received FROM document AS a, document_date AS b, document_time AS c WHERE a.document_id=b.document_id AND a.document_id=c.document_id")->result();
  }

  public function getDocumentDetails(){
  	return $this->db->get("document_details")->result();
  }

  public function insertDocument($data){
	$dat = array(
			  "document_id" => $data["document_id"],
		      "subject" => $data['subject'],
		      "sender" => $data['sender'],
		      "instructions" => $data['instructions'],
		      "status_id" => 1,
		      "address" => $data['senderAddress']
		    );
	$confirm = $this->db->insert('document', $dat);

	$id = $data["document_id"];

		$dat = array(
				  "document_id" => $data["document_id"],
			      "other" => $data['others']
			    );
		$confirm = $this->db->insert('other', $dat);

	$dat = array(
		      "time_received" => $data['time_received'],
		      "document_id" => $id
		    );
	$confirm = $this->db->insert('document_time', $dat);

	$dat = array(
		      "date_received" => $data['date_received'],
		      "followUp_date" => $data['follow_up'],
		      "due_date" => $data['due_date'],
		      "document_id" => $id
		    );
	$confirm = $this->db->insert('document_date',$dat);

	$dat = array(
		"compliance_type_id" => $data['compliance'],
		"document_id" => $id
	);
			
	$confirm = $this->db->insert('document_details',$dat);	
	
	return $confirm;
  }

   public function updateDocAdmin($data, $id){
  	
	$dat = array(
		      "subject" => $data['subject'],
		      "sender" => $data['sender'],
		      "address" => $data['senderAddress'],
		      "instructions" => $data['instructions']
		    );
	$confirm = $this->db->update('document', $dat, array('document_id' => $id));

	$dat = array(
		      "time_received" => $data['time_received']
		    );
	$confirm = $this->db->update('document_time', $dat, array('document_id' => $id));

	$dat = array(
		"other" => $data['others']
	);

	$confirm = $this->db->update('other', $dat, array('document_id' => $id));

	return $confirm;	
   }

   public function updateDoc($data, $id){
			$dat = array(
				"other" => $data['others']
			);

			$confirm = $this->db->update('other', $dat, array('document_id' => $id));
			
		return $confirm;
	}
}