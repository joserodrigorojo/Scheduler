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

// Frontend
$routes->get('/', 'Front::index');

// Event routes 
$routes->get('events', 'Event::show');
$routes->put('events/(:num)', 'Event::update/$1');
$routes->delete('events/(:num)', 'Event::delete/$1');
$routes->options('events/(:num)', 'Event::show');
$routes->post('events', 'Event::store');


// Calendar routes
$routes->get('calendars', 'Calendar::index');
$routes->put('calendars/(:num)', 'Calendar::update/$1');
$routes->delete('calendars/(:num)', 'Calendar::delete/$1');
$routes->options('calendars/(:num)', 'Calendar::index');
$routes->post('calendars', 'Calendar::store');

// Units routes
$routes->get('units', 'Unit::index');

// Section routes
$routes->get('sections', 'Section::index');




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
