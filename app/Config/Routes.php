<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;


//$routes->get('/', 'Home::index');

$routes->get('/', [Pages::class, 'view']);

$routes->get('/view', 'CrudController::view', ['as' => 'viewusers']);

$routes->get('/add', 'CrudController::index');

$routes->post('/save', 'CrudController::save');

$routes->post('/search', 'CrudController::search');

$routes->post('/save_edit', 'CrudController::save_edit');

$routes->get('/export', 'CrudController::export');

$routes->get('notification', 'MessageController::showSweetAlertMessages');
