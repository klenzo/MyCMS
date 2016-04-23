<?php
    /**
    * 
    */
    class User
    {
        
        protected $logged = false;
        protected $conect = false;
        protected $DB;

        function __construct($id, $token, $DB)
        {
            $this->verifUser($id, $token);
            $this->DB = $DB;
        }


        public function verifUser($id, $token)
        {
            return $this->logged;
        }

        public function getInfo($info){
            return $this->$info;
        }

        public function getConect()
        {
            return $this->conect;
        }
    }