<?php
// obj : 

// connexion BDD 
// try{
    $bdd = new PDO('mysql:host=localhost;dbname=billet;charset=utf8', 'JessiRig', 'evolPHP2+'); // Cette partie te permet de tester ta connexion à ta base de données.
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // éviter les erreurs
    echo 'Connexion réussie'; // moyen de vérifier que la connexion à la BDD est ok
    // $reponse = $bdd->query("SELECT contenu FROM billets"); // meilleur moyen pour vérifier la connexion à la BDD
    // var_dump($donnees = $reponse->fetchall(PDO::FETCH_ASSOC)); //fetch = 'aller chercher'

// }
// catch(PDOException $e){
//     echo $e->getMessage();
// }

// include/require les pages 
function requireClass($classe){
    require $classe .'.php';
}
spl_autoload_register('requireClass'); 


// instance pour la class Billet
$listeBillet = new BilletsManager($bdd);

$billets=$listeBillet->select();
foreach($billets as $billet){
    var_dump($billet);
}

// instance pour la class commentaire
$listeCommentaire = new CommentairesManager($bdd);

$commentaires=$listeCommentaire->select();
foreach($commentaires as $commentaire){
    var_dump($commentaire);
}



/* 1 - Class Billet avec connexion à la BDD
// $reponse = $bdd->query('SELECT * FROM billets');
// $retour = $reponse->fetch();
// $welcome = new Billets($retour);
// var_dump($welcome);
*/
?>