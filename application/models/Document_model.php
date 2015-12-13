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
		return $this->db->query("SELECT a.document_id, c.compliance_type_id, c.office_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id=0")->result();
	}

	public function getDocumentDetailsDue($date){
		return $this->db->query("SELECT a.document_id, c.compliance_type_id, c.office_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id != 0 and b.due_date = '".$date."'")->result();
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
		return $this->db->query("SELECT a.document_id, c.compliance_type_id, c.office_id FROM document as a, document_date as b, document_details as c WHERE a.document_id = b.document_id and a.document_id = c.document_id and a.status_id != 0 and  b.followUp_date = '".$date."'")->result();
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
  	// $limit = $this->db->query("SELECT COUNT(document_id) as a from document");
  	// foreach ($limit->result() as $key => $value) {
  	// 	$limit = $value->a;
  	// }
  	// return $this->db->query("SELECT Distinct(a.document_id), a.subject, a.sender, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, c.time_received FROM document AS a, document_date AS b, document_time AS c WHERE a.document_id=b.document_id AND a.document_id=c.document_id  ORDER BY document_id DESC")->result();
  	return $this->db->query("SELECT Distinct(a.document_id), a.subject, a.sender, a.address, a.instructions, a.status_id, b.date_received, b.followUp_date, b.due_date, b.released_date, c.time_received FROM document AS a, document_date AS b, document_time AS c WHERE a.document_id=b.document_id AND a.document_id=c.document_id")->result();
  }

  public function getOffices(){
  	return $this->db->query("SELECT a.document_id, a.office_id, b.office FROM document_details as a, offices as b WHERE a.office_id = b.office_id")->result();
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
	$ops = 0;
	for($x=0;$x<count($data["office"]);$x++){
			     if($data['office'][$x]==13){
			     	$ops = 1;
			     	break;
			     }
	}

	if($data["others"]!=null && $ops==1){
		$dat = array(
				  "document_id" => $data["document_id"],
			      "other" => $data['others']
			    );
		$confirm = $this->db->insert('other', $dat);
	}

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

   public function updateDocAdmin($data, $id){
   		$ids = $this->db->query("SELECT document_details_id FROM document_details WHERE document_id = ".$id)->result();
  	$x = 0;

  	foreach ($ids as $key => $value) {
  		$ix[$x] = $value->document_details_id;
  		$x++;
  	}
  	
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
		      "date_received" => $data['date_received'],
		      "due_date" => $data['due_date'],
		      "followUp_date" => $data['follow_up']
		    );
	$confirm = $this->db->update('document_date', $dat, array('document_id' => $id));

	if(count($ix) == count($data["office"])){
		$other = $this->db->get_where('other', array('document_id' => $id))->result();
		for ($i=0; $i < count($ix) ; $i++) { 
  			
  			$dat = array(
  				  "compliance_type_id" => $data['compliance'],
			      "office_id" => $data['office'][$i]
			);
			
			$confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));

			if($data['office'][$i]==13){			
				if($other==null){
					$dat = array(
				  		"document_id" => $id,
			      		"other" => $data['others']
			    	);
					$confirm = $this->db->insert('other', $dat);	
				}else{
					$dat = array(
				      	"other" => $data['others']
				    );
					$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				}
			}
			// else{
			// 	if($other==null){	
			// 	}else{
			// 		$judgement = FALSE;
			// 		for ($i=0; $i < count($data["office"]) ; $i++) { 
			// 			if($data["office"][$i]==13){
			// 				$judgement = FALSE;
			// 				break;
			// 			}
			// 		}
			// 		if($i==count($data["office"])){
			// 			if($judgement==TRUE){
			// 				$confirm = $this->db->delete('other', array('document_id' => $id));
			// 			}
			// 		}
			// 	}
			// }	
  		}
		return $confirm;	
	}
	else if(count($data["office"]) < count($ix)){
		$str = implode(', ', $data["office"]);
        $query = $this->db->query("DELETE FROM `document_details` WHERE document_id = $id and office_id not IN ($str)");
        for ($i=0; $i < count($data['office']) ; $i++) {
	        if($data['office'][$i]==13){
	        	$dat = array(
				      	"other" => $data['others']
				);
				$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				break;
			}
		}
		// if ($i==count($data['office'])) {
		// 	$other = $this->db->get_where('other', array('document_id' => $id))->result();
		// 	if($other==null){

		// 	}else{		
		// 		$confirm = $this->db->delete('other', array('document_id' => $id));	
		// 	}
		// }
        return $query;
	}
	else{
		$other = $this->db->get_where('other', array('document_id' => $id))->result();
		for ($i=0; $i < count($ix) ; $i++) { 
  			$dat = array(
  				  "compliance_type_id" => $data['compliance'],
			      "office_id" => $data['office'][$i]
			);
			$confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));	
  			if($data['office'][$i]==13){
				if($other==null){
					$dat = array(
					  "document_id" => $id,
				      "other" => $data['others']
				    );
					$confirm = $this->db->insert('other', $dat);
				}else{
					$dat = array(
				      "other" => $data['others']
				    );
					$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				}
			}
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

			if($data['office'][$x]==13){
				if($other==null){
					$dat = array(
					  "document_id" => $id,
				      "other" => $data['others']
				    );
					$confirm = $this->db->insert('other', $dat);
				}else{
					$dat = array(
				      "other" => $data['others']
				    );
					$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				}
			}
		}
			return $confirm;
	}
   }

   public function updateDoc($data, $id){
   	var_dump($data);
	$x = 0;
	$y = 0;
	$other = $this->db->get_where('other', array('document_id' => $id))->result();
	$ids = $this->db->query("SELECT compliance_type_id, document_details_id FROM document_details WHERE document_id = ".$id)->result();
	$sids = $this->db->query("SELECT office_id FROM document_details WHERE document_id = ".$id)->result();
	foreach ($ids as $key => $value) {
  		$ix[$x] = $value->document_details_id;
  		$type_id = $value->compliance_type_id;
  		$x++;
  	}
  	foreach ($sids as $key => $value) {
  		$iy[$y] = $value->office_id;
  		$y++;
  	}
	if(count($ix) == count($data["office"])){

		$type_id = 0;
		for ($i=0; $i < count($ix); $i++) { 
					$dat = array(
				      "office_id" => $data['office'][$i]
					);
				 $confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));
				
				if($data['office'][$i]==13){
					$dat = array(
						"other" => $data['others']
					);
					$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				}
		}
		return $confirm;
	}
	else{
		$ids = $this->db->query("SELECT document_details_id FROM document_details WHERE document_id = ".$id)->result();
		$var = $this->db->query("SELECT compliance_type_id FROM document_details WHERE document_id = ".$id." LIMIT 1")->result();
		
		foreach ($ids as $key => $value) {
	  		$ix[$x] = $value->document_details_id;
	  		$x++;
  		}	

		foreach ($var as $key => $value) {
  			$com = $value->compliance_type_id;
  		}

  		$ot =  count($data["office"])-1;

  		for ($i=0; $i < count($ids) ; $i++) {
  			$dat = array(
			      "office_id" => $data['office'][$i]
			);
			$confirm = $this->db->update('document_details', $dat, array('document_details_id' => $ix[$i]));	
		}

  		for($x=$i;$x<count($data["office"]);$x++){	
	  			$dat = array(
			      "compliance_type_id" => $com,
			      "office_id" => $data['office'][$x],
			      "document_id" => $id
			);
			
			$confirm = $this->db->insert('document_details',$dat);	

		if($data['office'][$x]==13){
				if($other==null){
					$dat = array(
					  "document_id" => $id,
				      "other" => $data['others']
				    );
					$confirm = $this->db->insert('other', $dat);
				}else{
					$dat = array(
				      "other" => $data['others']
				    );
					$confirm = $this->db->update('other', $dat, array('document_id' => $id));
				}
			}
		}
			return $confirm;
	}

  }

  // public function deleteDocument($id){
  // 	$this->db->delete('document_time', array('document_id' => $id));
  // 	$this->db->delete('document_details', array('document_id' => $id));
  // 	$this->db->delete('document_date', array('document_id' => $id));
  // 	$this->db->delete('other', array('document_id' => $id));
  // 	return $this->db->delete('document', array('document_id' => $id));
  // }
}