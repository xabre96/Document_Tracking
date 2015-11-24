<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model','users');
	}

	public function index(){
		$this->load->view('index');
	}

	public function user_login(){
		$data = $this->input->post();
		if($data['username']==null || $data['password']==null){
			echo 'please enter the required fields.';
		}
		else{
			$data2 = $this->users->get_users();
			if($data['password']!=$data2[0]['password']){
				echo "Username and Password are incorrect.";
			}
			else if($data['username']!=$data2[0]['user_name']){
				echo "Username and Password are incorrect.";	
			}
			else{
				echo "Welcome";
			}
		}
	}

}
