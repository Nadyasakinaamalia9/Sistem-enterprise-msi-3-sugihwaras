<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultController('Auth_siswa');
$routes->setDefaultMethod('login');
$routes->setDefaultMethod('login_siswa');
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
$routes->get('/', 'Auth::login');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');

$routes->get('guruprofil', 'ProfilController::index');

$routes->get('auth/logout', 'Auth::logout');

$routes->get('auth/register', 'Auth::register');
$routes->post('auth/proses_register', 'Auth::proses_register');



// siswa
$routes->get('/', 'Auth_siswa::login_siswa');
$routes->get('auth_siswa/login_siswa', 'Auth_siswa::login_siswa');
$routes->post('auth_siswa/proses_login', 'Auth_siswa::proses_login');
$routes->get('dashboard', 'Dashboard::index');

// $routes->group('guru', function ($routes) {
//     $routes->get('dataguru', 'Dataguru::dataguru');
//     $routes->get('datanilai', 'Datanilai::datanilai');
// });
// $routes->group('tata usaha', function ($routes) {
//     $routes->get('emis', 'Emis::emis');
//     $routes->get('spp', 'Spp::spp');
// });


$routes->get('category', 'Category::index');
$routes->get('category/create', 'Category::create');
$routes->post('category/store', 'Category::store');
$routes->get('category/edit/(:num)', 'Category::edit/$1');
$routes->post('category/update/(:num)', 'Category::update/$1');
$routes->get('category/delete/(:num)', 'Category::delete/$1');

$routes->get('product', 'Product::index');
$routes->get('product/create', 'Product::create');
$routes->post('product/store', 'Product::store');
$routes->get('product/edit/(:num)', 'Product::edit/$1');
$routes->post('product/update/(:num)', 'Product::update/$1');
$routes->get('product/delete/(:num)', 'Product::delete/$1');

$routes->get('transaction', 'Transaction::index');
$routes->get('transaction/import', 'Transaction::import');
$routes->post('transaction/proses_import', 'Transaction::proses_import');
$routes->get('transaction/export', 'Transaction::export');

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('dashboard');
$routes->setTranslateURIDashes(true);
$routes->setDefaultMethod('index');
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->post('pdf/upload', 'pembelajaran::store11');
$routes->get('Viewpembayaran', 'Viewpembayaran::index');
//fix
//show
$routes->get('viewpembayaran/show/(:any)', 'Viewpembayaran::show/$1');

// $routes->get('Viewnilai', 'Viewnilai::index');
// $routes->get('viewnilai/(:segment)', 'Viewnilai::index/$1');              
// $routes->get('viewnilai/(:segment)', 'Viewnilai::index/$1');
$routes->get('viewnilai/(:any)', 'Viewnilai::index/$1');

// $routes->get('viewpembayaran', 'Viewpembayaran::index');

// $routes->get('Viewpembayaran', 'Viewpembayaran::index');
// $routes->get('Viewpembayaran/index', 'Viewpembayaran::view');

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
$routes->get('/', 'dashboard::index');
// $route['validation/viewPdf/(:num)'] = 'validasi/validation/viewPdf/$1';
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
