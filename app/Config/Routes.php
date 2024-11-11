<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index', ['filter' => 'alreadyLoggedIn']);
$routes->get('/register', 'Register::index', ['filter' => 'alreadyLoggedIn']);
$routes->post('/users/check', 'Users::checkEmail', ['filter' => 'alreadyLoggedIn']);
$routes->post('/register/store', 'Register::store', ['filter' => 'alreadyLoggedIn']);
$routes->get('/forgotPassword', 'Register::forgotPassword', ['filter' => 'alreadyLoggedIn']);
$routes->get('/get-header-user/(:num)', 'Users::getHeaderUser/$1', ['filter' => 'alreadyLoggedIn']);
$routes->post('/login', 'Users::login', ['filter' => 'alreadyLoggedIn']);
$routes->get('/logout', 'Users::logout');

$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');
});

// $routes->group('/', ['filter' => 'auth'], function($routes) {
//     $routes->get('dashboard', 'Dashboard::index');
// });