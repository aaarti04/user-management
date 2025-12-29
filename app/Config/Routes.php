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
    $routes->get('/logout', 'User::logout');
    $routes->get('/add-user', 'User::adduser');
    $routes->post('/add-user', 'User::adduser');
    $routes->get('/list', 'User::list');
    $routes->get('/edit/(:num)', 'User::edit/$1');
    $routes->post('/update/(:num)', 'User::updateuser/$1');
    $routes->get('/delete/(:num)', 'User::deleteuser/$1');
});