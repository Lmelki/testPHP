<?php require_once('header.php');?>
<?php 
require_once('connect.php');
use Myclass\Expe;
?>

<?php 
$error = null;


    $id = $pdo->quote($_GET['id']);
    if (isset($_POST['name'], $_POST['content'])){
        $query = $pdo->prepare('UPDATE expe SET name=:name , content=:content WHERE id=:id');
        $query->bindValue('name', $_POST['name'] , PDO::PARAM_STR);
        $query->bindValue('content', $_POST['content'], PDO::PARAM_STR);
        $query->bindValue('id', $_GET['id'] , PDO::PARAM_INT);
        $query->execute();
        
        //$query->execute(['name' => $_POST['name'], 'content'=> $_POST['content'], 'id'=> $_GET['id']]);
        //$count = $pdo->exec($query);

    }
    $query = $pdo->prepare('SELECT * FROM expe Where id=:id');
    $query->bindValue('id', $_GET['id'] , PDO::PARAM_INT);
    $query->execute();
    if($query === false){
        var_dump($pdo->errorInfo());
        die();
    }

    $query->setFetchMode(PDO::FETCH_CLASS, Expe::class);
    $expe = $query->fetch();

?>
<?php if ($error) : ?>
<?php echo $error; ?>


<?php else : ?>
    <div class="container-fluid m-5">
<form action="" method="post">
    <div class="mb-3">
    <input type="text" name="name" class="form-control w-75" id="exampleFormControlInput1"  value="<?php echo htmlentities($expe->name);?>">
    </div>
    <div class="mb-3">
    <textarea name="content" class="form-control w-75" id="exampleFormControlTextarea1" cols="30" row="10"><?php echo htmlentities($expe->content);?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Valider et envoyer</button>
</form>
</div>
<?php endif; ?>


<?php require_once('footer.php');?>
