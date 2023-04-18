<?php require __DIR__ . '/vendor/autoload.php'; ?>
<?php
use Myclass\MyPDO;
try {
    $dns = 'sqlite:data.db';
    $username = null;
    $mdp = null;
    $pdo = (new MyPDO($dns, $username, $mdp))->connect();

} catch(PDOException $e) {
    echo 'PDO exception thrown : '.$e->getMessage();
}

?>
