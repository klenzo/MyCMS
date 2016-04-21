<?php
	require_once('../app/config/config.php');
	require_once('../app/controllers/controllers.php');

	if ( $page != $_PAGE->getInfo('dirAdmin') ) {

		$_PAGE->setTemplate();

		$fileController = '../app/cockpit/controllers/'. $_PAGE->getInfo('filePage') .'.controllers.php';
		if( file_exists( $fileController ) ){
			require_once($fileController);
		}

		$fileCore = '../app/cockpit/core/'. $_PAGE->getInfo('filePage') .'.core.php';
		if( file_exists( $fileCore ) ){
			require_once($fileCore);
		}

		require_once('themes/'. $_PAGE->getInfo('template') .'/inc/head.php');
		require_once('themes/'. $_PAGE->getInfo('template') .'/'. $_PAGE->getInfo('filePage') .'.php');
		require_once('themes/'. $_PAGE->getInfo('template') .'/inc/footer.php');
	}else{

		require_once '../app/cockpit/controllers/cockpit.controllers.php';

		$fileController = '../app/cockpit/controllers/'. $_PAGE->getInfo('filePage') .'.controllers.php';
		if( file_exists( $fileController ) ){
			require_once($fileController);
		}

		$fileCore = '../app/cockpit/core/'. $_PAGE->getInfo('filePage') .'.core.php';
		if( file_exists( $fileCore ) ){
			require_once($fileCore);
		}

		require_once('../app/cockpit/views/inc/head.php');
		require_once('../app/cockpit/views/'. $_PAGE->getInfo('filePage') .'.php');
		require_once('../app/cockpit/views/inc/footer.php');
	}