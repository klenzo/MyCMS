<?php
	session_start();

	$dirApp = '../app/';
	require_once $dirApp .'config/config.php';

	require_once '../app/controllers/controllers.php';

	$fileControllers = '../app/controllers/'. $_PAGE->getInfo('filePage') .'.controllers.php';
	if( file_exists($fileControllers) ){
		require_once $fileControllers;
	}

	$fileCore = '../app/core/'. $_PAGE->getInfo('filePage') .'.php';
	if( file_exists($fileCore) ){
		require_once $fileCore;
	}

	require_once 'themes/'. $_PAGE->getInfo('template') .'/views/inc/head.php';
	require_once 'themes/'. $_PAGE->getInfo('template') .'/views/'. $_PAGE->getInfo('filePage') .'.php';
	require_once 'themes/'. $_PAGE->getInfo('template') .'/views/inc/footer.php';