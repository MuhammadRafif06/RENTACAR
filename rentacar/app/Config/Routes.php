<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// AUTH
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->post('/process-login', 'Auth::processLogin');
$routes->post('/process-register', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');

// USER
$routes->get('cars/(:num)', 'Home::detail/$1');
$routes->post('cars/book/(:num)', 'Home::book/$1');
$routes->get('user/dashboard', 'User\Dashboard::index', ['filter' => 'auth']);

// ADMIN
$routes->group('admin', ['filter' => 'admin'], function ($routes) {

    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('cars', 'Admin\Car::index');   
    $routes->get('cars/create', 'Admin\Car::create');
    $routes->post('cars/store', 'Admin\Car::store');
    $routes->get('cars/edit/(:num)', 'Admin\Car::edit/$1');
    $routes->post('cars/update/(:num)', 'Admin\Car::update/$1');
    $routes->post('cars/delete/(:num)', 'Admin\Car::delete/$1');
});

    $routes->get('history', 'Home::history', ['filter' => 'auth']);

// API
$routes->group('api', function($routes) {

    $routes->get('cars', 'Api::cars');
    $routes->get('cars/(:num)', 'Api::car/$1');

    $routes->post('bookings', 'Api::createBooking');
    $routes->get('bookings', 'Api::bookings');

    $routes->get('payments', 'Api::payments'); // optional
});