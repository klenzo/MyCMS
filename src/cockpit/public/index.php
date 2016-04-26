<?php
	session_start();

	$SITE_ROOT = str_replace('cockpit', 'www', $_SERVER['HTTP_HOST']);
	if( !preg_match('/^(http)/i', $SITE_ROOT) ){ $SITE_ROOT = 'http://'.$SITE_ROOT; }
	define('SITE_ROOT', $SITE_ROOT);

	$dirApp = '../app/';
	require_once $dirApp .'config/config.php';
	require_once $dirApp .'controllers/controllers.php';

	$fileControllers = $dirApp .'controllers/'. getPage('filePage') .'.controllers.php';
	if( file_exists($fileControllers) ){
		require_once $fileControllers;
	}

	$fileCore = $dirApp .'core/'. getPage('filePage') .'.php';
	if( file_exists($fileCore) ){
		require_once $fileCore;
	}

	require_once 'themes/'. getPage('template') .'/views/inc/head.php';
	require_once 'themes/'. getPage('template') .'/views/'. getPage('filePage') .'.php';
	require_once 'themes/'. getPage('template') .'/views/inc/footer.php';