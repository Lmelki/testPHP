<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php require_once('header.php'); ?>
<?php use Myclass\Authentification;?>

<?php
    session_destroy();
    header('Location: index.php ');
?>