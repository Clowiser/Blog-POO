<?php

class Commentaire{
    private int $id;
    private int $id_billet;
    private string $auteur;
    private string $commentaire;
    private string $date_commentaire; 

    public function setId($id){
        $this->id=$id;
    }

    public function setId_billet($id_billet){
        $this->id_billet=$id_billet;
    }

    public function setAuteur($auteur){
        $this->auteur=$auteur;
    }

    public function setCommentaire($commentaire){
        $this->commentaire=$commentaire;
    }

    public function setDate_commentaire($date_commentaire){
        $this->date_commentaire=$date_commentaire;
    }

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){ // lorsqu'il y a un array = une BOUCLE FOREACH array $donnes sont des données brutes (qui viennent de la BDD) mais maintenant sont brutes
        foreach($donnees as $key => $value){ // parcours le tableau asso
            $setter = 'set'.ucfirst($key); 
        if (method_exists($this, $setter)) {
            $this->$setter($value);
        }
    }
    }
}

?>