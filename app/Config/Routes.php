<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User::index');
// $routes->get('/user/(any)', 'User::TentangAkun');
// $routes->get('/user/ubahAkun/(:segment)', 'Loker::ubahAkun/$1');

$routes->get('/calon/pdf', 'Calon::pdf');
$routes->get('/calon', 'Calon::index', ['filter' => 'role:admin']);
$routes->get('/calon/(:any)', 'Calon::index', ['filter' => 'role:admin']);
// $routes->get('/calon/printpdf', 'Calon::printpdf');

// $routes->delete('/histori/(:num)', 'Histori::delete/$1');
// $routes->get('/akun/resetPW', 'Akun::resetPW/$1');
$routes->get('/akun/(:any)', 'Akun::edit/$1');
$routes->post('/akun/changepass', 'Akun::changePassword', ['as' => 'akun.changepassword']);


$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/karyawan/create', 'Karyawan::create');
$routes->get('/karyawan/(:segment)', 'Karyawan::edit/$1');
$routes->delete('/karyawan/(:num)', 'Karyawan::delete/$1');

$routes->get('/users', 'Users::index');
$routes->get('/users/create', 'Users::create');
$routes->get('/users/(:segment)', 'Users::detail/$1');
$routes->get('/users/changeRole', 'Users::changeRole/$1');
$routes->get('/users/changeActive', 'Users::changeActive/$1');
$routes->delete('/users/(:num)', 'Users::delete/$1');
// $routes->get('/users/(:segment)', 'Users::edit/$1');
// $routes->get('/users/(:segment)', 'Users::editProfile/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
