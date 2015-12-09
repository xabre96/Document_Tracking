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
            'rules' => 'required|alpha_dash|is_unique[user_account.user_name]'
        ),
        array(
            'field' => 'contact',
            'label' => 'Contact Number',
            'rules' => 'required|alpha_dash'
        ),
        array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'required|alpha'
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
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'sender',
            'label' => 'Sender',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'instructions',
            'label' => 'Instructions',
            'rules' => 'required|alpha_numeric_spaces'
        )
    ),
    'Users/editDocument' => array(
        array(
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'sender',
            'label' => 'Sender',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'instructions',
            'label' => 'Instructions',
            'rules' => 'required|alpha_numeric_spaces'
        )
    )
);
