<?php

class CommentairesManager{

    private $_bdd; // Instance de PDO.
    
    public function __construct($pdo) {
    $this->_bdd = $pdo;
    }

    public function select(){ // fonction select permet d'initier tous les billets de la BDD sous la forme d'un tableau/liste
        $commentaires = [];
        $reqSQL='SELECT * FROM commentaires';
        $pdoStat = $this->_bdd->query($reqSQL);
        while ($autresDonnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)) {
            $commentaire[] = new commentaires($autresDonnees);
        }
        return $commentaire;
        }
       
    }


?>