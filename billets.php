<?php

// class Billets{
//     private int $id;
//     private string $titre;
//     private string $contenu;
//     private string $date_creation;

//     public function __construct(array $donnees){
//         $this->hydrate($donnees);
//     }

//     public function hydrate($donnees){
//         $this->id=$donnees['id'];
//         $this->titre=$donnees['titre'];
//         $this->contenu=$donnees['contenu'];
//         $this->date_creation=$donnees['date_creation'];
//     }
// }
// hydrate : par les fonctions set -> permet de changer des éléments sur la BDD sans modifier son code
// utiliser les set

class Billets{
    private int $id;
    private string $titre;
    private string $contenu;
    private string $date_creation;

    public function setId($id){
        $this->id=$id;
    }

    public function setTitre($titre){
        $this->titre=$titre;
    }

    public function setContenu($contenu){
        $this->contenu=$contenu;
    }

    public function setDate_creation($date_creation){
        $this->date_creation=$date_creation;
    }


    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            // On fabrique le nom du setter correspondant à l'attribut :
            $setter = 'set'.ucfirst($key);
           // Si le setter correspondant existe :
            if (method_exists($this, $setter)) {
            // On appelle le setter = $setter contient son nom !!!
            $this->$setter($value);
            }
            }
           }
    } // AV : c'est qu'on peut ajouter des setters à l'infini dans cette méthode 

    // public function hydrate($donnees){
        // $this->id=$donnees['id'];
        // $this->titre=$donnees['titre'];
        // $this->contenu=$donnees['contenu'];
        // $this->date_creation=$donnees['date_creation'];} // là, je rentre directement les données du tableau de la BDD 
?>