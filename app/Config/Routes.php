<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Shop::index');
$routes->get('show_product', 'Shop::show_product/$1');
$routes->get('cart/index', 'Cart::index');
$routes->get('cart/insert', 'Cart::insert');
$routes->get('cart/clear', 'Cart::clear');
$routes->get('cart/updateAmount(:segment)', 'Cart::upDateAmount/$1');
$routes->get('category', 'Category::index/$1');
$routes->get('/', 'Admin::index');
//$routes->get('adminlogin', 'Admin::adminlogin');
$routes->get('methods/index', 'Methods::index');
$routes->get('admin/updateCategory', 'AdminCat::updateCategory');
$routes->get('admin/updateCat/(:segment)', 'AdminCat::updateCat/$1');
$routes->get('admin/deleteCat/(:segment)', 'AdminCat::deleteCat/$1');
$routes->get('admin/insertCat/(:segment)', 'AdminCat::insertCat/$1');

$routes->get('admin', 'Admin::index');
$routes->get('admin/updateAmount_view(:segment)', 'Admin::updateAm/$1');

$routes->get('shop/AllReviews_view(:segment)', 'Shop::showReview/$1');

$routes->get('login', 'Login::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
