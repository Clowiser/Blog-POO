<?php

class Billets{
    private int $id;
    private string $titre;
    private string $contenu;
    private string $date_creation;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate($donnees){
        $this->id=$donnees['id'];
        $this->titre=$donnees['titre'];
        $this->contenu=$donnees['contenu'];
        $this->date_creation=$donnees['date_creation'];

    }
}
?>