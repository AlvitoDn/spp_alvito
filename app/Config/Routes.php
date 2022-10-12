<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Home::index',['filter'=>'auth']);
$routes->get('/dashboard', 'Home::dashboard',['filter'=>'auth']);

// ROUTES FOR PETUGAS
$routes->get('/petugas','Petugas::index',['filter' => 'auth']);
$routes->get('/petugas/delete/(:segment)','Petugas::delete/$1');
$routes->add('/spetugas','Petugas::save',['filter' => 'auth']);
$routes->add('/petugas/edit/(:segment)','Petugas::edit/$1',['filter' => 'auth']);

// ROUTES FOR SISWA
$routes->get('/siswa','Siswa::index',['filter' => 'auth']);
$routes->get('/siswa/delete/(:segment)','Siswa::delete/$1',['filter' => 'auth']);
$routes->add('/ssiswa','Siswa::save',['filter' => 'auth']);
$routes->add('/siswa/edit/(:segment)','Siswa::edit/$1',['filter' => 'auth']);

// Routes for Jenis Pembayaran
$routes->get('/jenis','Jenis::index',['filter' => 'auth']);
$routes->get('/jenis/delete/(:segment)','Jenis::delete/$1',['filter' => 'auth']);
$routes->add('/sjenis','Jenis::save',['filter' => 'auth']);
$routes->add('/jenis/edit/(:segment)','Jenis::edit/$1',['filter' => 'auth']);

// Routes for Login
$routes->get('/login','Login::index');
$routes->add('plogin','Login::login');
$routes->get('/logout','Login::logout');

// Routes For Register
$routes->get('/register','Register::index');
$routes->add('/pregister','Register::save');

// Routes for Transaksi
$routes->get('/bayar','TransaksiController::index');
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
