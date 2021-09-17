<?php
class Billet{
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
        //Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet - initialisations dont l'objet a besoin avant d'être utilisé.

        public function hydrate(array $donnees){
            foreach ($donnees as $key => $value){ // parcourt la tableau de la BDD
                // On fabrique le nom du setter correspondant à l'attribut
                $setter = 'set'.ucfirst($key); // ucfirst -> première lettre majsucule de la clé du tableau associatif, ainsi il récupère la méthode setMajusculequelquechose
            // Si le setter correspondant existe :
                if (method_exists($this, $setter)) {
                // si la métode existe (si $this(sur ce qu'on travaille) et le $setter (les différents setMajuscule)
                $this->$setter($value);
                }
                }
            }
    } // AV : c'est qu'on peut ajouter des setters à l'infini dans cette méthode 




    
// Autre méthode... :
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
//         $this->date_creation=$donnees['date_creation']; // ...sauf que là, je rentre directement les données du tableau de la BDD à chaque fois, ce qui est perte de temps et doit ajouter le $this...
//     }
// }
// hydrate : par les fonctions set -> permet de changer des éléments sur la BDD sans modifier son code
?>