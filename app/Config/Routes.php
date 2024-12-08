<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'user\Dashboard::index');
$routes->get('Menu', 'user\Menu::index');
$routes->match(['get', 'post'], 'LoginController/loginAuth', 'LoginController::loginAuth');
$routes->get('/v_login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'authGuard']);
