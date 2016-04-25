<?php
 
	if( isset($_SESSION[SESSION_TOKEN]) && preg_match(REGEX_TOKEN, $_SESSION[SESSION_TOKEN]) && isset($_SESSION[SESSION_ID]) && preg_match(REGEX_ID, $_SESSION[SESSION_ID]) ){
		$_CONECT = $_USER->verifUser($_SESSION[SESSION_ID], $_SESSION[SESSION_TOKEN]);
		$_CONECT = $_USER->getInfo('conect');
	}else{
		$_CONECT = false;
	}

	if( !$_CONECT ){
		$page = 'login'; // Envoie a la page login
	}elseif (isset($_GET['page']) && !empty($_GET['page'])) {
		$page = str_replace('/', '', $_GET['page']);
	}else{
		$page = false;
	}

	$_PAGE = new Page($_DB, $page);

	require_once '../app/func/get.php';