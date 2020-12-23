<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'user/login';
$route['login/proses'] = 'user/prosesLogin';
$route['register'] = 'user/register';
$route['register/proses'] = 'user/prosesRegister';
$route['logout'] = 'user/logout';

// admin
$route['dashboard'] = 'dashboard';
// admin barang
$route['dashboard/barang'] = 'barang';
$route['dashboard/barang/add'] = 'barang/add';
$route['dashboard/barang/create'] = 'barang/create';
$route['dashboard/barang/edit/(:any)'] = 'barang/edit/$1';
$route['dashboard/barang/update/(:any)'] = 'barang/update/$1';
$route['dashboard/barang/delete/(:any)'] = 'barang/delete/$1';

// admin kategori
$route['dashboard/kategori'] = 'category';
$route['dashboard/kategori/add'] = 'category/add';
$route['dashboard/kategori/create'] = 'category/create';
$route['dashboard/kategori/edit/(:any)'] = 'category/edit/$1';
$route['dashboard/kategori/update/(:any)'] = 'category/update/$1';
$route['dashboard/kategori/delete/(:any)'] = 'category/delete/$1';

// admin kota
$route['dashboard/kota'] = 'kota';
$route['dashboard/kota/add'] = 'kota/add';
$route['dashboard/kota/create'] = 'kota/create';
$route['dashboard/kota/edit/(:any)'] = 'kota/edit/$1';
$route['dashboard/kota/update/(:any)'] = 'kota/update/$1';
$route['dashboard/kota/delete/(:any)'] = 'kota/delete/$1';

// admin banner
$route['dashboard/banner'] = 'banner';
$route['dashboard/banner/add'] = 'banner/add';
$route['dashboard/banner/create'] = 'banner/create';
$route['dashboard/banner/edit/(:any)'] = 'banner/edit/$1';
$route['dashboard/banner/update/(:any)'] = 'banner/update/$1';
$route['dashboard/banner/delete/(:any)'] = 'banner/delete/$1';

// home
$route['products'] = 'home/products/0';
$route['products/(:any)'] = 'home/products/$1';