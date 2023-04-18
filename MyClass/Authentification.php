<?php
namespace Myclass;
use PDO;
use Myclass\User;
use Myclass\MyPDO;


class Authentification{
  public bool $isLogged;
  public $dns = 'sqlite:data.db';
  public $username = null;
  public $mdp = null;

    public function login($username, $mdp) : ?User
    {
      $connect= (new MyPDO($this->dns, null, null))->connect();
      $query = $connect->prepare("SELECT * FROM user WHERE username=:username AND mdp=:mdp" );
      $query->bindValue(':username', $username , PDO::PARAM_STR);
      $query->bindValue(':mdp', $mdp , PDO::PARAM_STR);
      $query->execute();
      $query->setFetchMode(PDO::FETCH_CLASS, User::class);
      $user = $query->fetch();
      if ($user)
      {
        $_SESSION["idUser"]= $user->id;
        return $user;
        exit();
      } else 
      {
         return null;
      }
      return null;
    }


    public function isConnect(): ?User
    {
        if (isset($_SESSION['idUser'])) {
          $unId = $_SESSION['idUser'];
          $connect= (new MyPDO($this->dns, null, null))->connect();
          $query = $connect->prepare("SELECT * FROM user WHERE id=:unId");
          $query->bindValue(':unId', $unId , PDO::PARAM_STR);
          $query->execute();
          $query->setFetchMode(PDO::FETCH_CLASS, User::class);
          $user = $query->fetch();            
          if ($user)
          {
            return $user;
            exit();
          } else 
          {
             return null;
          }  
    }
    return null;
  }

}