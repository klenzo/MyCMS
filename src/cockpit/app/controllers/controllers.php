<?php
	
	// xcnjrf = Token  -- lwxfe = id
	if( isset($_SESSION['xcnjrf']) && preg_match('/^[a-zA-Z0-9]{30,50}$/i', $_SESSION['xcnjrf']) && isset($_SESSION['lwxfe']) && preg_match('/^[0-9]+$/', $_SESSION['lwxfe']) ){

		$_USER = new User($_SESSION['lwxfe'], $_SESSION['xcnjrf'], $_DB);
	}else{
		$page = 'login';
	}

	if (isset($_GET['page']) && !empty($_GET['page']) || !isset($page)) {
		$page = str_replace('/', '', $_GET['page']);
	}else{
		// A changer pour la page par défaut, false utilise la page par défaut dans la BDD
		$page = 'login';
	}

	$_PAGE = new Page($_DB, $page);

	require_once '../app/func/get.php';