<?php 
// but de class mère => héritage sur les classManager 
class DataBase{

    protected $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
        $bdd = new PDO('mysql:host=localhost;dbname=billet;charset=utf8', 'JessiRig', 'evolPHP2+');
    }
}
?>