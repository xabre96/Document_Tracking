<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_controller/index";
$route['404_override'] = 'error/404';

$route['login'] = 'users_controller/userLogin';
