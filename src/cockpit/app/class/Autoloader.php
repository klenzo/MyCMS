<?php
class Autoloader
{	
	static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	static function autoload($class)
	{
		global $dirApp;
		$class = str_replace(__NAMESPACE__, '', $class);
		$class = str_replace('\\', '/', $class);
		require_once $dirApp .'class/' . $class . '.class.php';
	}
}