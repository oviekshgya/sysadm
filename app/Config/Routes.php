<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/register', 'Register::index');
$routes->post('/users/check', 'Users::checkEmail');
$routes->post('/register/store', 'Register::store');
$routes->get('/forgotPassword', 'Register::forgotPassword');
$routes->get('/get-header-user/(:num)', 'Users::getHeaderUser/$1');