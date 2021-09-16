<?php
// Manager (ou Entity Manager) => Design Patterns (façon d'organiser) 

class CommentairesManager{ // interaction avec BDD

    private $_bdd; // Instance de PDO.
    
    public function __construct($pdo) {
    $this->_bdd = $pdo;
    }

    public function select(){ // fonction select permet d'initier tous les billets de la BDD sous la forme d'un tableau/liste
        $commentaires = [];
        $reqSQL='SELECT * FROM commentaires';
        $pdoStat = $this->_bdd->query($reqSQL);
        while ($donnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)){
            $commentaire[] = new commentaires($donnees);
        }
        return $commentaire;
        }

    public function getCommentairesManager($id_billet){
        $listeComms = [];

        $reqSQL = "SELECT c.id, titre, contenu 
            FROM commentaires  AS c 
            INNER JOIN billets ON billets.id = c.id_billet
            WHERE c.id = '" . $id_billet . "'
        ";

        $pdoStat = $this->_bdd->query($reqSQL);
        while ($donnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)) {
            $listeComms[] = new commentaires($donnees);
        }
        return $listeComms;
        }
    }

?>