<?php 

    class User {
        public $id;
        public $nom;
        public $prenom;
        public $username;
        public $email;
        public $mdp;
        public $etablissement;


        public function __construct($id,$nom,$prenom,$username,$email,$mdp,$etablissement){
            $this->id=$id;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->username=$username;
            $this->email=$email;
            $this->mdp=$mdp;
            $this->etablissement=$etablissement;
        }
        public static function getUserById($id){
            $usr = new User($id,"","","","","","");
            $db = new Database();
            $usr = $db->getUserById($usr);
            if(gettype($usr)=="object")
            {
                return $usr;
            } 
            else{
                return "Erreur";
            } 
        }
    
    }

    $test = User::getUserById(2);
 
?>