<?php

    function connexion($servename, $username, $password, $dbname) {
        try {
            $db = new PDO('mysql:host='. $servename .';dbname='. $dbname .';charset=utf8', $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Erreur: " . $e->getMessage() . "<br/>";
            die;
        }
    }
    
    class Database {

        private $connexiondb;

        public function __construct() {
            $this->connexiondb = connexion("localhost", "users", "x.M.9O/zAOXFQWMA", "ludotecharea");
        }

        // CRUD User
        public function getUser() {
            $sqlQuery = "SELECT * FROM User";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $users = $usersStatement->fetchAll();

            return $users;
        }

        public function getUserById($id) {
                $sqlQuery = "SELECT * FROM User WHERE User.id=$id";
                $usersStatement = $this->connexiondb->prepare($sqlQuery);
                $usersStatement->execute();
                $user = $usersStatement->fetchAll();

                return $user;
        }

        public function insertUser($user) {
            $sqlQuery = "INSERT INTO User (Nom, Prenom, Username, Email, Mdp, Etablissement) VALUES ('$user->Nom', '$user->Prenom', '$user->Username', '$user->Email', '$user->Mdp', '$user->Etablissement')";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            // return $usersStatement->fetchAll();
        }

        public function updateUser($id, $user) {
            $sqlQuery = "UPDATE User SET `Email`='$user->Email', `Nom`='$user->Nom', `Prenom`='$user->Prenom', `Username`='$user->Username', `Mdp`='$user->Mdp', `Etablissement`='$user->Etablissement' WHERE User.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }

        public function deleteUser($id) {
            $sqlQuery = "DELETE FROM User WHERE User.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }

        // CRUD Jeux
        public function getJeuxByUser($user) {
            $sqlQuery = "SELECT id, Dispo, Etat FROM Jeux, User WHERE User.id=$user";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $jeux = $usersStatement->fetchAll();

            return $jeux;
        }

        public function insertJeux($user, $nom, $etat, $dispo) {
            // FDJ
            $sqlQuery = "INSERT INTO Jeux (Fdj_id, User_id, Dispo, Etat) VALUES";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
    }
?>