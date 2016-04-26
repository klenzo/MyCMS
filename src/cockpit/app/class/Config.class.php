<?php
/**
* 
*/
class Config
{
	
	protected $DB;
	protected $confDB;
	protected $langDir = false;

	function __construct($DB)
	{
		$this->DB = $DB;

		$arr = array();
		$req = $this->DB->query('SELECT * FROM `cms_conf`');
		while( $res = $req->fetchObject() ){
			$arr[ $res->confslug ] = $res->confcontent;
			// define($res->confslug, $res->confcontent);
		}
		$this->confDB = (object) $arr;
	}

	public function get($val = false)
	{
		if( $val ){
			if( $val == 'langdir' ){
				if( !$this->langDir ){	
					$req = $this->DB->query('SELECT langdir FROM cms_lang WHERE langcode = ?', $this->confDB->lang_default);

					$res = $req->fetchObject();
					$this->langDir = $res->langdir;
				}

				return $this->langDir;
			}else{
				return $this->confDB->$val;
			}
		}else{
			return $this->confDB;
		}
	}

}