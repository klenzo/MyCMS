<?php
	if (isset($_GET['page']) && !empty($_GET['page'])) {
		$page = str_replace('/', '', $_GET['page']);
	}else{
		// A changer pour la page par défaut, false utilise la page par défaut dans la BDD
		$page = false;
	}

	$_PAGE = new Page($_DB, $page);
	require_once '../app/func/get.php';