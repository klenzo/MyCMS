<?php
class Autoloader
{	
	static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	static function autoload($class)
	{
		$class = str_replace(__NAMESPACE__, '', $class);
		$class = str_replace('\\', '/', $class);
		require_once DIR_APP .'class/' . $class . '.class.php';
	}
}