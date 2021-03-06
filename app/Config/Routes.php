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
$routes->setDefaultController('Auth');
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


$routes->get('/', 'Auth::index');
//auth
$routes->post('check', 'Auth::check');

//auth
$routes->get('profile', 'Dashboard::index');
$routes->get('edit/(:num)', 'Dashboard::edit/$1');
$routes->put('dashboard/update/(:num)', 'Dashboard::update/$1');

$routes->get('contacts', 'Dashboard::contacts');
$routes->post('contacts/(:num)', 'Dashboard::status/$1');

$routes->get('users', 'Dashboard::users');
$routes->get('register', 'Auth::register');
$routes->post('save', 'Auth::save');
$routes->delete('users/delete/(:num)', 'Dashboard::delete/$1');

$routes->get('catalogue', 'Catalogue::catalogue');
$routes->get('catalogue/add', 'Catalogue::itemAdd');
$routes->post('catalogue/store', 'Catalogue::itemStore');
$routes->get('catalogue/itemEdit/(:num)', 'Catalogue::itemEdit/$1');
$routes->get('catalogue/itemUpdate/(:num)', 'Catalogue::itemUpdate/$1');
$routes->get('catalogue/delete/(:num)', 'Catalogue::itemDelete/$1');
$routes->get('stock', 'Catalogue::stock');

$routes->get('sales', 'Sales::sales');
$routes->get('sales/add', 'Sales::salesAdd');
$routes->post('sales/weekly_sales_report', 'Sales::weekly_report');
$routes->post('catalogue/store', 'Catalogue::itemStore');


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
