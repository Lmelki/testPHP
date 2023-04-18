<?php
namespace Myclass;
use PDO ;

class MyPDO{
    public $dns ;
    public $username ;
    public $mdp ;

    public function __construct($dns, $username, $mdp)
    {
      $this->dns = $dns;
      $this->username = $username;
      $this->mdp = $mdp;
    }

    public function connect(): PDO {
        return new PDO($this->dns, $this->username, $this->mdp, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ]);
    }
}