<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Auth::login');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::validar');

$routes->get('dashboard', 'Dashboard::index');
$routes->get('alumnos', 'Alumnos::index');
$routes->get('alumnos/nuevo', 'Alumnos::nuevo');
$routes->post('alumnos/crear', 'Alumnos::crear');
$routes->get('alumnos/editar/(:num)', 'Alumnos::editar/$1');
$routes->post('alumnos/actualizar/(:num)', 'Alumnos::actualizar/$1');
$routes->post('alumnos/eliminar/(:num)', 'Alumnos::eliminar/$1');

$routes->post('logout', 'Auth::logout');