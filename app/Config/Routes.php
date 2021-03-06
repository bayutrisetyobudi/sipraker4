<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->addRedirect('/', 'mahasiswa/login/');


$routes->group('mahasiswa',function($routes){
	$routes->add('login', 'Mahasiswa/Login::index');
	$routes->addRedirect('/', 'mahasiswa/dashboard/');
	$routes->add('dashboard', 'Mahasiswa/Dashboard::index');
});

$routes->group('dosen',function($routes){
	$routes->add('login','Dosen/Login::index');
	$routes->group('dosbim',function($routes){
		$routes->addRedirect('/', '/dosen/dosbim/dashboard/');
		$routes->add('dashboard', 'Dosen/Dashboard::dosbim');
		$routes->add('dashboard/mahasiswa', 'Dosen/Dashboard::mahasiswa');
		$routes->add('dashboard/bimbingan', 'Dosen/Dashboard::bimbingan');
		$routes->add('dashboard/tervalidasi', 'Dosen/Dashboard::tervalidasi');
	});
	$routes->group('kaprodi',function($routes){
		$routes->addRedirect('/', '/dosen/kaprodi/dashboard/');
		$routes->group('dashboard',function($routes){
			$routes->add('/', 'Dosen/Dashboard::kaprodi');
			$routes->add('mahasiswa', 'Dosen/Dashboard::semua_mahasiswa');
			$routes->add('dosen', 'Dosen/Dashboard::semua_dosen');
			$routes->add('pengajuan', 'Dosen/Dashboard::data_pengajuan');
			$routes->add('tervalidasi', 'Dosen/Dashboard::data_validasi');
		});
	});
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
