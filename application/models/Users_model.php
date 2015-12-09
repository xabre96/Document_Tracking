<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function deleteUser($id) {
        $this->db->delete('user_account', array('user_id' => $id));
        return $this->db->delete('user_profile', array('user_id' => $id));
    }

    public function getUser($user, $pass) {
        return $this->db->get_where('user_account', array("user_name" => $user, "password" => $pass))->result();
    }

    public function getUserName($id){
        return $this->db->get_where('user_profile', array('user_id' => $id))->result();
    }

    public function getCouriers() {
        return $this->db->get('user_account')->result();
    }

    public function getCourierCredentials($id) {
        return $this->db->query('select a.user_id, a.user_name, a.user_type_id, b.first_name, b.last_name, b.middle_name, b.contact_number, b.address, b.email from user_account as a, user_profile as b where a.user_id = ' . $id . ' and a.user_id = b.user_id')->result();
    }

//    public function deleteUser($id) {
//        $this->db->delete('user_account', array('user_id' => $id));
//        return $this->db->delete('user_profile', array('user_id' => $id));
//    }

//    public function deleteUser($id) {
//        
//         return $this->db->query("DELETE FROM user_account ua, user_profile up WHERE ua.user_id = $id AND up.user_id = $id");
//    }

    public function getUserDetails() {
        $query = $this->db->query('SELECT up.user_id , ua.user_name, up.first_name, up.middle_name , up.last_name , up.contact_number, up.address, up.email FROM user_profile up, user_account ua WHERE up.user_id = ua.user_id');
        return $query->result();
    }

    public function insertUser($data) {

        $pass = hash('sha512', 123);

        $dat = array(
            "user_name" => $data['uname'],
            "password" => $pass,
            "user_type_id" => 2
        );

        $this->db->insert('user_account', $dat);

        $dat = array(
            "user_id" => $this->db->insert_id(),
            "first_name" => $data['fname'],
            "last_name" => $data['lname'],
            "middle_name" => $data['mname'],
            "contact_number" => $data['contact'],
            "address" => $data['address'],
            "email" => $data['email'],
        );

        return $this->db->insert('user_profile', $dat);
    }

    public function updateUser($data, $id) {
        $dat = array(
            "first_name" => $data['firstName'],
            "middle_name" => $data['middleName'],
            "last_name" => $data['lastName'],
            "contact_number" => $data['contact'],
            "address" => $data['address'],
            "email" => $data['email'],
        );

        return $this->db->update('user_profile', $dat, array('user_id' => $id));
    }

}

//  public function get_user($id){
	// 	return $this->db->where('user_id',$id)->get('user_details')->result();
	// }

 //  public function login($data){
 //    $query = $this->db->get_where("user_account", array("username" => $data['userName'], "password" => $data['passWord']));
 //  //  if(!$query->result()){
 //  //    return false;
 //  //  }else{
 //  //    return true;
 //  //  }
 //  return $query->result();
 //  }

 //  public function insert_users($data){
 //    // $this->load->library('encrypt');
 //    // $pass = 123;
 //    // $pass = $this->encrypt->encode($data['passWord']);

 //    $data1=array(
 //      "username"=>$data['userName'],
 //      "password"=>$data['passWord'],
 //      "user_type"=>$data['userType']
 //    );

 //    $this->db->insert('user_account',$data1);

 //    $data2=array(
 //      "user_id" => $this->db->insert_id(),
 //      "firstname"=>$data['firstName'],
 //      "lastName"=>$data['lastName'],
 //      "email"=>$data['email'],
 //      "address"=>$data['address'],
 //      "birthday"=>$data['birthday']
 //    );

 //   $confirm = $this->db->insert('user_profile',$data2);
 //     if(!$confirm){
 //       return false;
 //     }else{
 //      return true;
 //     }
 //  }
 //  public function activate_user($data, $id){
 //    $data['type'] = (int) $data['type'];
 //    $data = array("status"=>$data['type']);
 //    $confirm = $this->db->where('user_id',$id)->update('user_account',$data);
 //    if(!$confirm){
 //      return false;
 //    }else{
 //      return true;
 //    }
 //  }
 //  public function update_user($data, $id){
 //    $data1=array(
 //      "username"=>$data['userName']
 //      // "password"=>$pass,
 //      // "user_type"=>$data['userType']
 //    );
 //    $this->db->where('user_id',$id)->update('user_account',$data1);
 //    $data2=array(
 //      "firstname"=>$data['firstName'],
 //      "lastName"=>$data['lastName'],
 //      "email"=>$data['email'],
 //      "address"=>$data['address'],
 //      // "birthday"=>$data['birthday']
 //    );
	// 	$confirm = $this->db->where('user_id',$id)->update('user_profile',$data2);
 //    if(!$confirm){
 //      return false;
 //    }else{
 //     return true;
 //    }
	// }

 //  public function changePass($data, $id){
 //    $data1 = array("password"=>$data['new2']);
	// 	$confirm = $this->db->where('user_id',$id)->update('user_account',$data1);
 //    return $confirm;
	// }

 //  public function delete_user($id){
 //    $this->db->where('user_id',$id)->delete('user_profile');
	// 	$confirm = $this->db->where('user_id',$id)->delete('user_account');
 //    if(!$confirm){
 //      return false;
 //    }else{
 //     return true;
 //    }
	// }
// }
