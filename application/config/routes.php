<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'user/login';
$route['login/proses'] = 'user/prosesLogin';
$route['register'] = 'user/register';
$route['register/proses'] = 'user/prosesRegister';
