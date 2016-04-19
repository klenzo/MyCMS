<?php
	require_once('../app/config/config.php');

	require_once('../app/controllers/controllers.php');

	$fileController = '../app/controllers/'. $_PAGE->getInfo('filePage') .'.controllers.php';
	if( file_exists( $fileController ) ){
		require_once($fileController);
	}

	$fileCore = '../app/core/'. $_PAGE->getInfo('filePage') .'.core.php';
	if( file_exists( $fileCore ) ){
		require_once($fileCore);
	}

	require_once('../app/views/inc/head.php');
	require_once('../app/views/'. $_PAGE->getInfo('filePage') .'.php');
	require_once('../app/views/inc/footer.php');
