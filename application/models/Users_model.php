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

    public function getPassword($id){
        return $this->db->get_where('user_account', array('user_id' => $id))->result();
    }

    public function updatePassword($data, $id) {
        $dat = array(
            "password" => hash('sha512', $data['new_pass'])
        );
        return $this->db->update('user_account', $dat, array('user_id' => $id));
    }

    public function resetPass($id) {
        $dat = array(
            "password" => hash('sha512', 123)
        );
        return $this->db->update('user_account', $dat, array('user_id' => $id));
    }

    public function insertUser($data) {

        $pass = hash('sha512', 123);

        $dat = array(
            "user_name" => $data['uname'],
            "password" => $pass,
            "user_type_id" => $data['type']
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

