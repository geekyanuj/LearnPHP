<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/register', 'LoginController::register');
$routes->post('/login/authenticate', 'LoginController::login');


$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard/getAllEmpData', 'DashboardController::getAllEmpData');
$routes->get('/logout', 'DashboardController::logout');



// $routes->get('/test', 'Home::test');

