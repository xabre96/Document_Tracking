<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_controller/index";
$route['404_override'] = 'error/404';

/**
 * users_controller routes
 */
$route['login'] = 'users_controller/userLogin';
$route['logout'] = 'users_controller/logout';
$route['add-document'] = 'users_controller/addDocument';
