<?php
	session_start();
	
	function myAutoloader($class) {
		require_once('../app/class/' . ucfirst($class) . '.class.php');
	}
	spl_autoload_register('myAutoloader');
	$_DB = new DataBase();

	require_once('functions.php');
