<?php 

    class User {
        public $id;
        public $nom;
        public $prenom;
        public $username;
        public $email;
        public $mdp;
        public $etablissement;


        public function __construct($nom,$prenom,$username,$email,$mdp,$etablissement){
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->username=$username;
            $this->email=$email;
            $this->mdp=$mdp;
            $this->etablissement=$etablissement;
        }
    }
?>