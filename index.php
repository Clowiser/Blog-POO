<?php
// obj : 

// connexion BDD 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=billet;charset=utf8', 'JessiRig', 'evolPHP2+');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
}
    catch(PDOException $e){
       echo $e->getMessage();
}

// include/require les pages et usages 
spl_autoload_register('requireClass'); 

function requireClass($classe){
    require $classe .'.php';
}

$listeBillet = new BilletsManager($bdd);


$billets=$listeBillet->select();
foreach($billets as $billet){
    var_dump($billet);
}



// include ('resultat.php'); 

// $reponse = $bdd->query('SELECT * FROM billets');
// $retour = $reponse->fetch();

// $welcome = new Billets($retour);
// var_dump($welcome);

?>