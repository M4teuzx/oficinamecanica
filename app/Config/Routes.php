<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');

$routes->get('/users', 'User::index');
$routes->get('/user/delete/(:num)', 'User::delete/$1');
$routes->get('/user/create', 'User::create');
$routes->post('/user/store', 'User::store');
$routes->get('/user/edit/(:num)', 'User::edit/$1');

$routes->get('/pecas', 'Pecas::index');
$routes->get('/pecas/delete/(:num)', 'pecas::delete/$1');
$routes->get('/pecas/create', 'pecas::create');
$routes->post('/pecas/store', 'pecas::store');
$routes->get('/pecas/edit/(:num)', 'pecas::edit/$1');

$routes->get('/veiculos', 'veiculos::index');
$routes->get('/veiculos/delete/(:num)', 'veiculos::delete/$1');
$routes->get('/veiculos/create', 'veiculos::create');
$routes->post('/veiculos/store', 'veiculos::store');
$routes->get('/veiculos/edit/(:num)', 'veiculos::edit/$1');

$routes->get('/servicos', 'servicos::index');
$routes->get('/servicos/delete/(:num)', 'servicos::delete/$1');
$routes->get('/servicos/create', 'servicos::create');
$routes->post('/servicos/store', 'servicos::store');
$routes->get('/servicos/edit/(:num)', 'servicos::edit/$1');

$routes->get('/cliente', 'cliente::index');
$routes->get('/cliente/delete/(:num)', 'cliente::delete/$1');
$routes->get('/cliente/create', 'cliente::create');
$routes->post('/cliente/store', 'cliente::store');
$routes->get('/cliente/edit/(:num)', 'cliente::edit/$1');

$routes->get('/equipe', 'equipe::index');
$routes->get('/equipe/delete/(:num)', 'equipe::delete/$1');
$routes->get('/equipe/create', 'equipe::create');
$routes->post('/equipe/store', 'equipe::store');
$routes->get('/equipe/edit/(:num)', 'equipe::edit/$1');

$routes->get('/ordem', 'ordem::index');
$routes->get('/ordem/delete/(:num)', 'ordem::delete/$1');
$routes->get('/ordem/create', 'ordem::create');
$routes->post('/ordem/store', 'ordem::store');
$routes->get('/ordem/edit/(:num)', 'ordem::edit/$1');

$routes->get('/home', 'Home::index');
$routes->post('/login/processLogin', 'Login::processLogin');
$routes->get('/logout', 'Login::logout');


