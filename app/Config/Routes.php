<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login');

$routes->group('', ['filter' => 'authfilter'], static function ($routes) {
    $routes->get('/dashboard', 'User::dashboard');
});