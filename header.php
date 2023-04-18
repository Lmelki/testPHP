<?php session_start(); ?>
<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php use Myclass\Authentification;?>

<?php
$utilisateur = (new Authentification)->isConnect();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
<?php if ($utilisateur) : ?>
    <a class="navbar-brand" href="creer_user.php">Creer Utilisateur</a>
    <p>Bonjour <?php echo $utilisateur->username; ?></p>
    <a class="navbar-brand" href="logout.php">Se déconnecter</a>
    <?php else : ?>
    <a class="navbar-brand" href="login.php">Se connecter</a>  
<?php endif; ?>
 
  </div>
</nav>
