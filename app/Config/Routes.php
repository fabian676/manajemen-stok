<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->post('/barang/simpan', 'Barang::simpan');
$routes->get('barang/edit', 'Barang::edit');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->get('/barang/hapus/(:num)', 'Barang::hapus/$1');
$routes->get('/', 'Home::index'); // Home sebagai halaman utama
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/kategori', 'Kategori::index');
$routes->get('/stok/riwayat', 'Stok::riwayat');
$routes->get('kategori', 'Kategori::index');
$routes->post('kategori/simpan', 'Kategori::simpan');
$routes->get('kategori/hapus/(:num)', 'Kategori::hapus/$1');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update', 'Kategori::update');




