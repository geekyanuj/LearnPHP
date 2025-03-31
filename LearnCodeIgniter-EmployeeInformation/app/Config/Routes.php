<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/register', 'LoginController::register');
$routes->post('/login/authenticate', 'LoginController::login');
$routes->get('/user/dashboard', 'LoginController::userdashboard');


$routes->get('/admin/dashboard', 'LoginController::admindashboard');
$routes->get('/admin/logout', 'LoginController::adminlogout');



// $routes->get('/test', 'Home::test');

