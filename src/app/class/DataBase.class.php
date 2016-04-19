<?php

class DataBase
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    protected $pdo = false;
    public function __construct($host = 'localhost', $dbname = 'mycms', $username = 'root', $password = '0000')
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
    public function dbConect()
    {
        try {
            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            return $this->pdo;
        } catch (Exception $e) {
            return 'Connexion échoué : ' . $e->getMessage();
        }
    }

    public function query($stat, $arg = false)
    {
        if (!$this->pdo) {
            $this->dbConect();
        }

        if ($arg) {
            if (!is_array($arg)) {
                $arg = array($arg);
            }
            $req = $this->pdo->prepare($stat);
            $req->execute($arg);
        } else {
            $req = $this->pdo->query($stat);
        }

        return $req;
    }
}
