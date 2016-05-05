<?php
	require_once DIR_APP .'class/Autoloader.php';
	Autoloader::register(); 

	// Définition des constante SALT
	define('SALT_TOKEN', '$2y$07$27502d58c6e39ab396beaOajbOItcymJO/0Qzc/sw3R4YJ.Di6kua');
	define('SALT_PASS', '$2y$07$$2y$07$27502d58c6e39aOf5Txx4yYQRCWDP8SRPGJJ1RLp3GpIvW');

	// Definition des noms de session
	define('SESSION_TOKEN', 'xcnjrf');
		// Regex pour le token
		define('REGEX_TOKEN', '/^[a-zA-Z0-9]{30,50}$/i');
	define('SESSION_ID', 'lwxfe');
		// Regex pour l'id
		define('REGEX_ID', '/^[0-9]+$/');

	$_DB = new DataBase();
	$_CONFIG = new Config($_DB);
	
	require_once DIR_APP .'lang/'. $_CONFIG->get('langdir') .'/global.php';

	$_USER = new User($_DB);

	require_once('functions.php');