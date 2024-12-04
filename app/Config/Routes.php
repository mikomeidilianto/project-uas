<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'user\Dashboard::index');
$routes->get('Menu', 'user\Menu::index');
// $routes->get('/Home', 'Home::index');
// $routes->get('Home/Artikel', 'Home::Artikel');
// $routes->get('/Artikel', 'Home::Artikel');
// $routes->get('/Home/About', 'Home::About');
// $routes->get('/About', 'Home::About');
// $routes->get('/Sekolah', 'Sekolah::Index');
// $routes->get('/Guru', 'Sekolah::Guru');
// $routes->get('/Siswa', 'Sekolah::Siswa');

