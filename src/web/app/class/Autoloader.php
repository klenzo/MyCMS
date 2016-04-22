<?php
	spl_autoload_register(function ($class) {
		global $dirApp;
	    require_once $dirApp .'class/' . $class . '.class.php';
	});