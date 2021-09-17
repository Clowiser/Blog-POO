<?php
// classe billetsManager : transforme les objets en requête SQL
include_once ('db.php');
class BilletsManager extends DataBase{

    // private $_bdd; // Instance de PDO.
    // public function __construct($pdo) { // la variable $pdo est dans un autre fichier - si elle était dans la fonction __construct, on ne la mettrait pas en argument de la fonction
    // $this->_bdd = $pdo;
    // }

    public function select(){ // fonction select permet d'initier tous les billets de la BDD sous la forme d'un tableau/liste
        $billets = [];
        $reqSQL='SELECT * FROM billets';
        $pdoStat = $this->bdd->query($reqSQL);
        while ($donnees = $pdoStat ->fetch(PDO::FETCH_ASSOC)){ 
            $billets[] = new billet($donnees);
        }
        return $billets;
        }
    }
?>