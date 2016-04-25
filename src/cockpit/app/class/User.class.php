<?php
    /**
    * 
    */
    class User
    {
        
        protected $conect = false;
        protected $error = false;
        protected $DB;

        function __construct($DB)
        {
            $this->DB = $DB;
        }


        public function verifUser($id, $token)
        {
            $this->LoginMe($id, $token, 'token');
            return $this->conect;
        }

        public function LoginMe($identif, $word, $t = 'pass')
        {
            $error = false;
            $identif = strip_tags( $identif );
            if ( filter_var($identif, FILTER_VALIDATE_EMAIL) || filter_var($identif, FILTER_VALIDATE_IP) ) {
                $type = 'umail';
            }elseif( preg_match("/^[a-zA-Z0-9 '-]{3,50}$/i", $identif) ){
                $type = 'upseudo';
            }elseif( preg_match(REGEX_ID, $identif) && $t == 'token' ){
                $type = 'uid';
            }else{
                $error[] = identif_icorrect;
            }

            if( $t == 'pass'){
                $word = $this->CryptMyPass($word);
                $typeTwo = 'upass';
            }else{
                $typeTwo = 'utoken';
                if( !preg_match(REGEX_TOKEN, $word) ){
                    $word = '0';
                }
            }
            if( !$error ){
                $req = $this->DB->query('SELECT * FROM users WHERE '.$type.' = ? AND '.$typeTwo.' = ?', [$identif, $word]);
                if( $res = $req->fetchObject() ){ 
                    $this->conect = $res;
                    $_SESSION[SESSION_TOKEN] = $res->utoken;
                    $_SESSION[SESSION_ID] = $res->uid;
                }else{ $error = login_lost; }
            }

            $this->error = $error;
        }

        public function getInfo($info){
            return $this->$info;
        }

        static function GenereMyToken()
        {
            // PreCryPtage du Token
            $token = 'm@ii'. substr(SALT_TOKEN, rand(10,20), 5). sha1( '-'. uniqid() .'@' ) . substr(SALT_TOKEN, rand(10,20), 5) .'6mS7';

            $token = str_replace('$2y$07$', '',  crypt($token, '$2y$07$'. SALT_TOKEN));
            if( strlen($token) > 50 ){
                $token = substr($token, 0, 50);
            }elseif( strlen($token) < 30 ){
                for ($i = strlen($token) ; $i <= 30; $i++) { 
                    $token .= chr(rand(65,90));
                }
                $token = substr($token, 0, 30);
            }
            return $token;
        }

        static function CryptMyPass($pass)
        {
            $pass = substr(SALT_PASS, 5, 5). sha1( '-'. $pass .'@' ) . substr(SALT_PASS, 12, 5);
            return crypt($pass, '$2y$07$'. SALT_PASS);
        }
    }