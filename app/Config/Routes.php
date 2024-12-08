<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'user\Dashboard::index');
$routes->get('Menu', 'user\Menu::index');
