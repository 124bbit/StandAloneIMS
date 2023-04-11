<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index', ['filter' => "redirectIfLoggedIn"]);
$routes->post('/', 'Auth::doLogin');
$routes->get('/Logout', 'Auth::doLogout');
$routes->get('/Dashboard', 'Dashboard::index', ['filter' => "isLoggedIn"]);
// Barang
$routes->group("/Barang", function ($routes) {
    $routes->get("/", "Barang::index", ['filter' => "isLoggedIn"]);
    $routes->post("/", "Barang::create", ['filter' => "isLoggedIn"]);
    $routes->get("New", "Barang::new", ['filter' => "isLoggedIn"]);
    $routes->get("Detail/(:num)", "Barang::show/$1", ['filter' => "isLoggedIn"]);
    $routes->get("Edit/(:num)", "Barang::edit/$1", ['filter' => "isLoggedIn"]);
    $routes->put("Update/(:num)", "Barang::update/$1", ['filter' => "isLoggedIn"]);
    $routes->get("Delete/(:num)", "Barang::delete/$1", ['filter' => "isLoggedIn"]);
});
$routes->group("/Transaksi", function ($routes) {
    $routes->get("/", "Transaksi::index", ['filter' => "isLoggedIn"]);
    $routes->post("/", "Transaksi::create", ['filter' => "AllowTransaksi"]);
    $routes->get("New", "Transaksi::new", ['filter' =>  "AllowTransaksi"]);
    $routes->get("Detail/(:num)", "Transaksi::show/$1", ['filter' => "isLoggedIn"]);
    $routes->get("Edit/(:num)", "Transaksi::edit/$1", ['filter' =>  "AllowTransaksi"]);
    $routes->put("Update/(:num)", "Transaksi::update/$1", ['filter' => "AllowTransaksi"]);
    $routes->get("Delete/(:num)", "Transaksi::delete/$1", ['filter' => "AllowTransaksi"]);
});
$routes->group("/User", function ($routes) {
    $routes->get("/", "User::index", ['filter' => "AllowUser"]);
    $routes->post("/", "User::create", ['filter' => "AllowUser"]);
    $routes->get("New", "User::new", ['filter' =>  "AllowUser"]);
    $routes->get("ResetPassword/(:num)", "User::ResetPassword/$1", ['filter' =>  "AllowUser"]);
    $routes->get("Detail/(:num)", "User::show/$1", ['filter' => "AllowUser"]);
    $routes->get("Edit/(:num)", "User::edit/$1", ['filter' =>  "AllowUser"]);
    $routes->put("Update/(:num)", "User::update/$1", ['filter' => "AllowUser"]);
    $routes->get("Delete/(:num)", "User::delete/$1", ['filter' => "AllowUser"]);
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
