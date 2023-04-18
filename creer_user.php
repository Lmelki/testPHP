<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php require_once('header.php'); ?>
<?php require_once('connect.php');?>

<?php use Myclass\User;?>

<?php
try {
    if (isset($_POST['username'], $_POST['mdp'],$_POST['role'])){
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];
        $role= $_POST['role'];
        //$user = new User($id, $username, $mdp, $role);
        $creer = $pdo->prepare("INSERT INTO user (username, mdp ,role) VALUES( :username, :mdp, :role) ");
        $creer->bindValue(':username', $_POST['username'] , PDO::PARAM_STR);
        $creer->bindValue(':mdp', $_POST['mdp'] , PDO::PARAM_STR);
        $creer->bindValue(':role', $_POST['role'] , PDO::PARAM_STR);
        $creer->execute();
        if ($creer->execute()) {
            echo "<script> alert('un nouvel utilisateur a été créé') </script>";
        }
    }   
    }catch (Exception $e){
        echo "Une erreur est survenue lors de l'insertion.";
    } ?>


<div class="container-fluid d-flex justify-content-center m-5 p-5">
<form method="post" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
    </div>
    <!-- <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Rôle</label>
      <input type="text" name="role" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>