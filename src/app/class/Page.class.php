<?php
class Page {
	protected $nameProject = 'MyCMS';

	protected $titlePage;
	protected $filePage;
	protected $descPage;
	protected $contPage;

	protected $DB = false;

	public function __construct($DB, $page){
		$this->DB = $DB;
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
			$this->descPage = $res->padec;
			$this->contPage = $res->pacontent;
		}else{
			$this->errorCode = 404;
			$this->filePage = 'error';
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
	
