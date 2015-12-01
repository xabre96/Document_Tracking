<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model','users');
		$this->load->model('Offices_model','offices');
		$this->load->model('Compliance_model','compliance');
		$this->load->model('Document_model','document');
	}

	public function index(){
		if($this->session->userdata('logged_in')==TRUE){
			if($this->session->userdata('user_type')==1){
				redirect('Users/adminDashboard');
			}else{
				redirect('Users/courierDashboard');
			}
		}else{
			$this->load->view('index');
		}
	}

	public function user_login(){
		$data = $this->input->post();
		if($data['username']==null || $data['password']==null){
			echo 'please enter the required fields.';
		}
		else{
			$data['password'] = hash('sha512', $data['password']);
			$data2 = $this->users->getUser($data['username'], $data['password']);
			if(!$data2){
				echo "Username and Password are incorrect.";
			}
			else{
				foreach ($data2 as $key => $value) {
					$user_id = $value->user_id;
					$user = $value->user_name;
					$pass = $value->password;
					$type = $value->user_type_id;
				}
				if($type==1){
					$credentials = array(
						'user_id' => $user_id,
						'user_name' => $user,
						'logged_in' => TRUE,
						'user_type' => $type
					);
					$this->session->set_userdata($credentials);
					redirect('Users/adminDashboard');
				}else{
					$credentials = array(
						'user_id' => $user_id,
						'user_name' => $user,
						'logged_in' => TRUE,
						'user_type' => $type
					);
					$this->session->set_userdata($credentials);
					redirect('Users/courierDashboard');
				}
			}
		}
	}

	public function adminDashboard(){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				$couriers = $this->users->getCouriers();
				$documents = $this->document->getDocuments();
				$details = $this->document->getDocumentDetails();
				$office = $this->document->getOffices();
				$this->load->view('admin-dashboard', array('office' => $office, 'couriers' => $couriers, 'documents' => $documents, 'details' => $details));
			}
		}
	}

	public function courierDashboard(){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==1){
				redirect('Users/adminDashboard');
			}else{
				$this->load->view('courier-dashboard');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata();
		session_destroy();
		redirect('Users/index');
	}

	public function addCourierForm(){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				$this->load->view('register-courier');
			}
		}	
	}

	public function editCourierForm($id){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				$data = $this->users->getCourierCredentials($id);
				$this->load->view('edit-courier', array('data' => $data, 'id' => $id));
			}
		}	
	}

	public function addCourier(){
		$data = $this->input->post();

 		if ($this->form_validation->run() == FALSE){
        	$this->load->view('register-courier');
        }else{
        	$confirm = $this->users->insertUser($data);
			if(!$confirm){
				echo "Courier registration failed.";
			}else{
				echo "Courier successfully registered.";
			}
        }
	}

	public function editCourier($id){
		$data = $this->input->post();

 		if ($this->form_validation->run() == FALSE){
        	$this->load->view('edit-courier');
        }else{
        	$confirm = $this->users->updateUser($data, $id);
			if(!$confirm){
				echo "Courier credentials update failed.";
			}else{
				echo "Courier successfully updated.";
			}
        }
	}

	public function deleteCourier($id){
		$confirm = $this->users->deleteUser($id);
			if(!$confirm){
				echo "Courier credentials deletion failed.";
			}else{
				echo "Courier successfully deleted.";
			}
	}

	public function complianceForm(){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				$data = $this->offices->getOffices();
				$data2 = $this->compliance->getCompliance();
				$this->load->view('compliance-form', array('data' => $data, 'data2' => $data2));
			}
		}	
	}

	public function updateComplianceForm($id){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				$data2 = $this->document->getDocument();
				$this->load->view('compliance-form', array('data' => $data));
			}
		}	
	}

	public function deleteComplianceForm($id){
		if($this->session->userdata('logged_in')==null){
			redirect('Users/index');
		}else{
			if($this->session->userdata('user_type')==2){
				redirect('Users/courierDashboard');
			}else{
				echo $id;
			}
		}	
	}

	public function addDocument(){
		$data = $this->input->post();
		// var_dump($data);
 		// if ($this->form_validation->run() == FALSE){
   //      	redirect('Users/complianceForm');
   //      }else{
        	$confirm = $this->document->insertDocument($data);
			if(!$confirm){
				echo "Monitoring failed.";
			}else{
				echo "Monitoring started successfully.";
			}
        // }
	}

	public function updateStatus($id){
		$confirm = $this->document->updateStatus($id);
			if(!$confirm){
				echo "Status Update failed.";
			}else{
				echo "Status Updated successfully.";
				redirect('Users/adminDashboard');
			}
	}

}
