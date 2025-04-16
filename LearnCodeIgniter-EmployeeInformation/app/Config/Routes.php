<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/register', 'LoginController::register');
$routes->post('/login/authenticate', 'LoginController::login');


$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/logout', 'DashboardController::logout');
$routes->get('/dashboard/getAllEmpData', 'DashboardController::getAllEmpData');
$routes->post('/dashboard/addEmployee', 'DashboardController::addEmployee');
$routes->post('/dashboard/updateEmployee', 'DashboardController::updateEmployee');
$routes->post('/dashboard/deleteEmployee', 'DashboardController::deleteEmployee');


$routes->get('/dashboard/getDataOfEmpById', 'DashboardController::getDataOfEmpById');



