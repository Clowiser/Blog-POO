<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link href="style.css" rel="stylesheet"> 
</head>
<body>

<?php
// connexion à la BDD 
// try{
    $bdd = new PDO('mysql:host=localhost;dbname=billet;charset=utf8', 'JessiRig', 'evolPHP2+'); // Cette partie te permet de tester ta connexion à ta base de données.
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // éviter les erreurs
    echo 'Connexion réussie'; // moyen de vérifier que la connexion à la BDD est ok sinon le message ne s'afficherait pas
    // $reponse = $bdd->query("SELECT contenu FROM billets"); // meilleur moyen pour vérifier la connexion à la BDD
    // var_dump($donnees = $reponse->fetchall(PDO::FETCH_ASSOC)); //fetch = 'aller chercher'

// }
// catch(PDOException $e){
//     echo $e->getMessage();
// }

// include/require les pages via la spl_autoload_register
function requireClass($classe){
    require_once $classe .'.php';
}
spl_autoload_register('requireClass'); 
// include ('Affichage.php'); // on inclut les usages


// instance pour la class Billet
$billetsManager=new BilletsManager($bdd);

$billets=$billetsManager->select();
foreach($billets as $billet){
    // var_dump($billet);
}

// instance pour la class commentaire
$commentairesManager=new CommentairesManager($bdd); // BIEN NOMMER son instance d'objet !!  

$commentaires=$commentairesManager->select();
foreach($commentaires as $commentaire){
    // var_dump($commentaire);
}

var_dump($commentairesManager->getCommentairesManager(1));

// echo $commentairesManager->;


/* 1 - Class Billet avec connexion à la BDD
// $reponse = $bdd->query('SELECT * FROM billets');
// $retour = $reponse->fetch();
// $welcome = new Billets($retour);
// var_dump($welcome);
*/
?>

</body>
</html>