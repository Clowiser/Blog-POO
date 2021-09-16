<?php
// classe billetsManager : transforme les objets en requête SQL
class BilletsManager{

    private $_bdd; // Instance de PDO.
    
    public function __construct($pdo) {
    $this->_bdd = $pdo;
    }

    public function select(){ // fonction select permet d'initier tous les billets de la BDD sous la forme d'un tableau/liste
        $billets = [];
        $reqSQL='SELECT * FROM billets';
        $pdoStat = $this->_bdd->query($reqSQL);
        while ($donnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)){ 
            $billets[] = new billets($donnees);
        }
        return $billets;
        }
    }
?>