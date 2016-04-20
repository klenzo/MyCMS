<?php
class Page {
	protected $author = 'K-lenzo';
	
	protected $nameProject = 'MyCMS';
	protected $versionProject = '0.2';

	protected $template = 'Katyou';

	protected $titlePage;
	protected $filePage;
	protected $descPage;
	protected $contPage;
	protected $keyPage;

	protected $generatPage;

	protected $DB = false;

	public function __construct($DB, $page){
		$this->DB = $DB;
		$this->setTemplate();
		$this->getPage($page);
	}

	public function getPage($page)
	{
		if( $page != false ){
			$page = strip_tags( htmlspecialchars( $page ) );

			$req = $this->DB->query('SELECT * FROM pages WHERE paslug = ?', $page);
			if( $res = $req->fetchObject() ){
				$this->setPage($res);
			}else{ $page = false; }
		}

		if( $page == false ){
			$req = $this->DB->query('SELECT * FROM pages WHERE paroot = 1');
			if( $res = $req->fetchObject() ){
				$this->setPage($res);
			}else{
				$this->setPage();
			}
		}
	}

	public function setPage($res = false)
	{
		if( $res ) {
			$this->titlePage = $res->patitle;
			$this->filePage = $res->patype;
			$this->descPage = $res->padesc;
			$this->keyPage = $res->pakeys;
			$this->contPage = $res->pacontent;
			$this->generator = $this->nameProject .' ('. $this->versionProject .')';
		}else{
			$this->errorCode = 404;
			$this->filePage = 'error';
		}
	}

	public function setTemplate()
	{
		$req = $this->DB->query('SELECT * FROM cms_conf WHERE confslug = "conftemplate"');
		if( $res = $req->fetchObject() ){
			$this->template = $res->confcontent;
		}
	}

	public function modifyClass($arr)
	{
		if( !is_array($arr) ){ array( $arr ); }
		foreach ($arr as $key => $value) {
			$this->$key = $value;
		}
	}

	public function getInfo($info){
		return $this->$info;
	}
}

