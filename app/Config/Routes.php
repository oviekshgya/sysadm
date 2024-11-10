<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/store', 'Register::store');
$routes->get('/forgotPassword', 'Register::forgotPassword');