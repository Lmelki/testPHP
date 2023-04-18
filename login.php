<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php require_once('header.php'); ?>
<?php use Myclass\Authentification;?>

<?php
$pdo= new Authentification; 
if (isset($_POST['username'], $_POST['mdp'])){
    $user = $pdo->login($_POST['username'], $_POST['mdp']);
    if ($user){
        header('Location: accueil.php ');
    }  else {echo "<p> identifiant ou mot de passe incorrects </p>";} 
    } ?>


<div class="container-fluid d-flex justify-content-center m-5 p-5">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp"  class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>