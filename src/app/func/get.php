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