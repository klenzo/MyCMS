<?php
	function get_head($arr, $aff = 0)
	{
		global $_PAGE;

		if(!is_array($arr)){$arr = array($arr);}

		$code = '';
		foreach ($arr as $key => $value) {

			switch ($value) {
				case 'keyPage':
					$name = 'keywords';
					break;
				case 'generator':
					$name = 'generator';
					break;
				case 'author':
					$name = 'author';
					break;
				
				default:
					$name = 'description';
					break;
			}

			if(!empty( $_PAGE->getInfo($value) )){
				$code .= '<meta name="'. $name .'" content="'. $_PAGE->getInfo($value) .'">';
			}
		}

		$aff = (bool) $aff;
		if( $aff ){ return $code; }else{ echo $code; }
	}

	function getPage($val)
	{
		global $_PAGE;
		return $_PAGE->getInfo($val);
	}

	function getWebPage($val = false)
	{
		global $_PAGE;
		return $_PAGE->getWebPage($val);
	}

	function getConfig($val ) 
	{
		global $_CONFIG;
		return $_CONFIG->get($val);
	}

	function getCSS($arr = false)
	{		
		$theme = getPage('template');

		$dirname = 'themes/'. $theme .'/assets/css/';
		$dir = opendir($dirname) or die('Erreur de listage : le répertoire '. $dirname .' n\'existe pas');
		$files = array(); // on déclare le tableau contenant le nom des fichiers
		$result = '';

		while($element = readdir($dir)) {
			if($element != '.' && $element != '..') {
				$file = explode('.', $element);
				$ext = end($file);
				if (isset( $ext ) && in_array( $ext , array('css', 'less', 'CSS', 'LESS'))) {
					if( count($file) >= 3 ){
						$file2 = array_pop($file);
					}else{
						$file2 = $file;
					}
			     	
			     	$files[] = implode('.', $file2 );
				}
			}
		}

		closedir($dir);

		sort($files);// pour le tri croissant, rsort() pour le tri décroissant
		foreach ($files as $key => $value) {
			$result .= '<link rel="stylesheet" href="/'. $dirname.$value .'">';
		}

		return $result;
	}

	function getJS($arr = false, $aff = 0)
	{		
		$result = '';
		$theme = getPage('template');
		if( !$arr ){
			$dirname = 'themes/'. $theme .'/assets/js/';
			$dir = opendir($dirname) or die('Erreur de listage : le répertoire '. $dirname .' n\'existe pas');
			$files = array(); // on déclare le tableau contenant le nom des fichiers
			while($element = readdir($dir)) {
				if($element != '.' && $element != '..') {
					$file = explode('.', $element);
					$ext = end($file);
					if (isset( $ext ) && in_array( $ext , array('js', 'JS'))) {
						if( count($file) >= 3 ){
							$file2 = array_pop($file);
						}else{
							$file2 = $file;
						}
				     	
				     	$files[] = implode('.', $file2 );
					}
				}
			}
			closedir($dir);

			sort($files);// pour le tri croissant, rsort() pour le tri décroissant
			foreach ($files as $key => $value) {
				$result .= '<script src="/'. $dirname.$value .'"></script>';
			}
		}else{
			if( !is_array($arr) ){ $arr = array($arr); }
			foreach ($arr as $key => $value) {
				$result .= '<script src="/themes/'. $theme .'/assets/'. $value .'"></script>';
			}
		}

		if( $aff == 0 ){return $result;}else{ echo $result; }
	}

	function getTypePage($patye = '', $class = '')
	{
		$theme = getConfig('conftemplateweb');

		$dirname = WEB_DIR_ROOT .'public/themes/'. $theme .'/views/';
		$dir = @opendir($dirname) or die('Erreur de listage : le répertoire '. $dirname .' n\'existe pas');
		$files = array(); // on déclare le tableau contenant le nom des fichiers
		while($element = readdir($dir)) {
			if($element != '.' && $element != '..') {
				$file = explode('.', $element);
				$ext = end($file);
				if (isset( $ext ) && in_array( $ext , array('php', 'PHP'))) {
			     	$files[] = str_replace('.'.$ext, '', implode('.', $file));
				}
			}
		}
		closedir($dir);

		sort($files);// pour le tri croissant, rsort() pour le tri décroissant
		return $files;
	}

	function getNotif($txt, $statut)
	{
		return '<p class="notif notif-'. $statut .'">'. $txt .'</p>';
	}