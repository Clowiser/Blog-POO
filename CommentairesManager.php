<?php
include_once ('db.php');
class CommentairesManager extends DataBase{ 

    // private $_bdd; // Instance de PDO.
    // public function __construct($pdo){
    //     $this->_bdd = $pdo;
    // }

    public function select(){ // fonction select permet d'initier tous les billets de la BDD sous la forme d'un tableau/liste
        $commentaires = [];
        $reqSQL='SELECT * FROM commentaires'; // la requête SQL
        $pdoStat = $this->bdd->query($reqSQL); // exécution de la requête SQL
            while ($donnees = $pdoStat->fetch(PDO::FETCH_ASSOC)){ // FETC_ASSOC : affiche juste le tableau associatif + :: propriétés static de notre class
                $commentaire[] = new commentaire($donnees);
            }
            return $commentaire;
            }

    public function getCommentairesManager($id_billet){
        $listeComms = [];

        $reqSQL = "SELECT c.id, id_billet, auteur, commentaire, date_commentaire 
            FROM commentaires AS c 
            INNER JOIN billets ON billets.id = c.id_billet 
            WHERE c.id_billet = '" . $id_billet . "'
        ";

        $pdoStat = $this->bdd->query($reqSQL);
            while ($donnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)) {
                $listeComms[] = new Commentaire($donnees);
            }
            return $listeComms;
            }
    }

?>