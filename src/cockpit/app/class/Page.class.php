<?php
class Page {
    protected $author = 'K-lenzo';

    protected $nameProject = 'MyCMS';
    protected $versionProject = '0.2';

    protected $template;

    protected $titlePage;
    protected $filePage;
    protected $descPage;
    protected $contPage;
    protected $keyPage;

    protected $generatPage;

    protected $varPage = array();

    protected $DB = false;
    protected $page;

    protected $webPage = false;

    public function __construct($DB, $page){
        $this->DB = $DB;
        $this->page;
        $this->getPage($page);
    }

    public function getPage($page)
    {
        $this->setTemplate();

        if( $page != false ){
            $page = strip_tags( htmlspecialchars( $page ) );

            $req = $this->DB->query('SELECT * FROM cms_pages WHERE paslug = ? AND palang = ?', [$page, LANG]);
            if( $res = $req->fetchObject() ){
                $this->setPage($res);
            }else{ $page = false; }
        }

        if( $page == false ){
            $req = $this->DB->query('SELECT * FROM cms_pages WHERE paroot = 1 AND palang = ?', LANG);
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
        $req = $this->DB->query('SELECT * FROM cms_conf WHERE confslug = "conftemplatecockpit"');
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

    public function getInfo($info)
    {
        return $this->$info;
    }


    public function getWebPage($val = false)
    {
        if( !$this->webPage ){
            $pages = array();
            $req = $this->DB->query('SELECT * FROM pages');
            while( $res = $req->fetchObject() ){
                switch ($res->pastatut) {
                    case 1:
                        $res->pastatut  = 'STATUT_ACTIF';
                        $res->statColor = 'green';
                        break;
                    case 2:
                        $res->pastatut  = 'STATUT_DRAFT';
                        $res->statColor = 'purple';
                        break;
                    default:
                        $res->pastatut  = 'STATUT_INACTIF';
                        $res->statColor = 'red';
                        break;
                }

                $pages[$res->paslug] = $res;
            }
            $this->webPage = $pages;
        }

        if( $val ){
            if( isset($this->webPage[$val]) ){
                return $this->webPage[$val];
            }else{
                die(NO_PAGES);
            }
        }else{
            return $this->webPage;
        }
    }

    public function updateWebPage($arr, $slug)
    {
        $update = '';
        $sql_array = array();
        if( is_array($arr) ){
            foreach ($arr as $key => $value) {
                $update .= $key.'=:'. $key .',';
            }
            $update = trim($update, ',');

            if( $slug ){ $where = ' WHERE paslug = "'. $slug .'"'; }else{ $where = ''; }
            if( $this->DB->query('UPDATE pages SET '. $update . $where, $arr) ){ return true; }else{ return false; }
        }else{
            die(FORMAT_NOT_ACCEPT . FORMAT_ARRAY);
        }
    }

}

