<?php

$config = array(
    'Users/addCourier' => array(
        array(
            'field' => 'lname',
            'label' => 'Last Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'fname',
            'label' => 'First Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'mname',
            'label' => 'Middle Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'uname',
            'label' => 'User Name',
            'rules' => 'required|is_unique[user_account.user_name]'
        ),
        array(
            'field' => 'contact',
            'label' => 'Contact Number',
            'rules' => 'required'
        ),
        array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        )
    ),
    'Users/addDocument' => array(
        array(
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'required'
        ),
        array(
            'field' => 'sender',
            'label' => 'Sender',
            'rules' => 'required'
        ),
        array(
            'field' => 'instructions',
            'label' => 'Instructions',
            'rules' => 'required'
        )
    ),
    'Users/editDocument' => array(
        array(
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'required'
        ),
        array(
            'field' => 'sender',
            'label' => 'Sender',
            'rules' => 'required'
        ),
        array(
            'field' => 'instructions',
            'label' => 'Instructions',
            'rules' => 'required'
        )
    ),
    'Users/changePass' => array(
      array(
            'field' => 'old_pass',
            'label' => 'Old Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new_pass',
            'label' => 'New Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new_pass2',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[new_pass]'
        )  
    )
);
