<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::proses');
$routes ->get('/','Login::index');
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Quiz');
// $routes->setDefaultMethod('entriquiz');
// $routes->setTranslateURIDashes(false);
// $routes->set404Override();
$routes->setAutoRoute(true);

