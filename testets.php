$connex = DB::getPdo()
$req = $connex->prepare('Select .........')
$req->bindValue("tactac", $tactac)
$req->execute()
$enreg = $req->fetch(pdo::)
 if $enreg != false


$enreg = json