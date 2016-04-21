<?php
	session_start();

	function myAutoloader($class, $parent = '') {
		require_once('../app/class/' . $parent . $class . '.class.php');
	}
	spl_autoload_register('myAutoloader');
	$_DB = new DataBase();

	require_once('functions.php');
