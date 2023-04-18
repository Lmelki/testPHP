<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php require_once('header.php'); ?>
<?php require_once('connect.php');?>
<?php use Myclass\Expe;?>

<?php 
$query = $pdo->query('SELECT * FROM expe');
if($query === false){
    var_dump($pdo->errorInfo());
    die();
}
$expe = $query->fetchAll(PDO::FETCH_CLASS, Expe::class);

?>

<?php foreach ($expe as $e) : ?>
<div class="card container-fluid w-75 m-5">
<a href="">
<h1>Nom : <?php echo "$e->name" ?></h1></a>
<?php echo $e->getReadTime(); ?>
</div>

<?php endforeach;?>


<?php require_once('footer.php');?>







