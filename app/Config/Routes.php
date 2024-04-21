<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Notes::index');
$routes->get('/note/new', 'Notes::create');
$routes->post('/note/new', 'Notes::store');
$routes->post('/note/(:num)', 'Notes::update/$1');
$routes->post('/note/delete/(:num)', 'Notes::delete/$1');
$routes->get('/note/(:num)', 'Notes::view/$1');
