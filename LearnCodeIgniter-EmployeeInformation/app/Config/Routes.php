<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/register', 'LoginController::register');
$routes->post('/login/authenticate', 'LoginController::login');

// $routes->get('/test', 'Home::test');

