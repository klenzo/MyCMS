<?php
	session_start();

	// Définit le fuseau horaire par défaut à utiliser.
	date_default_timezone_set('Europe/Paris');

	$SITE_ROOT = str_replace('cockpit', 'www', $_SERVER['HTTP_HOST']);
	if( !preg_match('/^(http)/i', $SITE_ROOT) ){ $SITE_ROOT = 'http://'.$SITE_ROOT; }
	
	define('SITE_ROOT', $SITE_ROOT);
	define('WEB_DIR_ROOT', '../../web/');
	define('DIR_APP', '../app/');

	require_once DIR_APP .'config/config.php';
	require_once DIR_APP .'controllers/controllers.php';

	$fileControllers = DIR_APP .'controllers/'. getPage('filePage') .'.controllers.php';
	if( file_exists($fileControllers) ){
		require_once $fileControllers;
	}

	$fileCore = DIR_APP .'core/'. getPage('filePage') .'.core.php';
	if( file_exists($fileCore) ){
		require_once $fileCore;
	}

	require_once 'themes/'. getPage('template') .'/views/inc/head.php';
	require_once 'themes/'. getPage('template') .'/views/'. getPage('filePage') .'.php';
	require_once 'themes/'. getPage('template') .'/views/inc/footer.php';