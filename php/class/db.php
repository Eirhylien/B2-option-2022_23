<?php

    function connexion($servername, $username, $password, $dbname) {
        try {
            $db = new PDO('mysql:host='. $servername .';dbname='. $dbname .';charset=utf8', $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Erreur: " . $e->getMessage() . "<br/>";
            die;
        }
    }
    
    class Database {

        private $connexiondb;

        public function __construct() {
            $this->connexiondb = connexion("127.0.0.1", "youenn", "56QwXpdmU=", "ludotechalea");
        }



        //CRUD USER

        public function getUsers(){
            $sqlQuery = "SELECT * FROM `user`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $users = $usersStatement->fetchAll();
        
            return $users;
        }
        
        public function getUsersById($id){
            $sqlQuery = "SELECT * FROM `user` WHERE user.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $user = $usersStatement->fetchAll();
        
            return $user;
        }

        public function isAdmin($id){
            $sqlQuery = "SELECT `admin` FROM `user` WHERE user.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $user = $usersStatement->fetchAll();
            if ($user['admin']){
                return true;
            }
            else {
                return false;
            }

        }
        
        public function insertUser($user){
            $sqlQuery = "INSERT INTO user (email,nom,prenom,username,mdp,etablissement) VALUES ('$user->email','$user->nom','$user->prenom','$user->username','$user->mdp',$user->etablissement)";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateUser($id,$user){
            $sqlQuery = "UPDATE user SET `email`='$user->email',`nom`='$user->nom',`prenom`='$user->prenom',`username`='$user->username',`mdp`='$user->mdp',`etablissement`=$user->etablissement WHERE user.id=$id ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteUser($id){
            $sqlQuery = "DELETE FROM `user` WHERE user.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }






        //CRUD JEUX



        public function getJeuxByUser($user){
            $sqlQuery = "SELECT id,dispo,etat,remarque FROM `jeux`,`user` WHERE user.id=$user";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $jeux = $usersStatement->fetchAll();
        
            return $jeux;
        }
        
        public function insertJeux($user,$nom,$etat,$dispo,$remarque){
            $ListeFDJs = $this->getFdj();
            foreach ($ListeFDJs as $ListeFDJ) {
                if ($ListeFDJ['nom']==$nom){
                    $fdjId=$ListeFDJ['id'];
                }
            }
            $sqlQuery = "INSERT INTO jeux (fdj_id,user_id,dispo,etat,remarque) VALUES ('$fdjId','$user',$dispo,'$etat','$remarque')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateJeux($id,$dispo,$etat,$remarque){
            $sqlQuery = "UPDATE jeux SET `dispo`=$dispo,`etat`='$etat',`remarque`=$remarque WHERE jeux.id=$id ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteJeux($id){
            $sqlQuery = "DELETE FROM `jeux` WHERE jeux.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }





        //CRUD FDJ


        public function getFdj(){
            $sqlQuery = "SELECT id,nom,`description`,`date`,`img` FROM `fdj`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }
        
        public function insertFdj($nom,$description,$date,$img){
            $sqlQuery = "INSERT INTO fdj (nom,`description`,`date`,img) VALUES ('$nom','$description','$date','$img')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateFdj($id,$nom,$description,$date,$img){
            $sqlQuery = "UPDATE fdj SET `nom`=$nom,`description`='$description',`date`='$date',`img`='$img' WHERE fdj.id=$id ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteFdj($id){
            $sqlQuery = "DELETE FROM `fdj` WHERE fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        




        //CRUD Categorie

        public function getCategorie(){
            $sqlQuery = "SELECT nom,id FROM `categorie`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $ListeCategorie = $usersStatement->fetchAll();
        
            return $ListeCategorie;
        }
        
        public function getCategorieByName($nom){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.nom=$nom";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
        
        public function getCategorieByID($id){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
        
        public function insertCategorie($nom){
            $sqlQuery = "INSERT INTO `categorie` (nom) VALUES ('$nom')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateCategorie($id,$nom){
            $sqlQuery = "UPDATE `categorie` SET `nom`='$nom' WHERE categorie.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteCategorie($id){
            $sqlQuery = "DELETE FROM `categorie` WHERE categorie.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }









        //CRUD categ_fdj

        public function getCategRelation(){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $ListeRelation = $usersStatement->fetchAll();
        
            return $ListeRelation;
        }
        
        public function getCategRelationByFDJId($idFdj){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_fdj=$idFdj";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
        
        public function getCategRelationByCategId($idCateg){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_categ=$idCateg";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
        
        public function insertRelation($idCateg,$idFDJ){
            $sqlQuery = "INSERT INTO `categ_fdj` (id_categ,id_fdj) VALUES ('$idCateg','$idFDJ')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateRelationByRelationID($id,$idCateg,$idFDJ){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='$idCateg',`id_fdj`='$idFDJ' WHERE categ_fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateRelationByCategorieID($id,$idCateg,$idFDJ){
            $sqlQuery = "UPDATE categ_fdj SET `id_fdj`='$idFDJ' WHERE categ_fdj.id=$id AND categ_fdj.id_categ=$idCateg";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateRelationByFDJID($id,$idCateg,$idFDJ){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='$idCateg' WHERE categ_fdj.id=$id AND categ_fdj.id_fdj=$idFDJ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteRelationByRelationID($id){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteRelationByCategorieID($idCateg){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=$idCateg";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteRelationByFDJID($idFDJ){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=$idFDJ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }






        //CRUD ADHERENT


        public function getListeAdherentByUser($user){
            $sqlQuery = "SELECT nom,premon,mail,tel FROM `adherent`,`user` WHERE user.id=$user";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $ListeAdherent = $usersStatement->fetchAll();
        
            return $ListeAdherent;
        }
        
        public function getAdherentByName($id){
            $sqlQuery = "SELECT nom,premon,mail,tel FROM `adherent` WHERE adherent.id=$id";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Adherent = $usersStatement->fetchAll();
        
            return $Adherent;
        }
        
        public function insertAdherent($user,$nom,$prenom,$mail,$tel){
            $sqlQuery = "INSERT INTO `adherent` (user_id,nom,prenom,mail,tel) VALUES ('$user','$nom','$prenom','$mail','$tel')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateAdherent($user,$id,$nom,$prenom,$mail,$tel){
            $sqlQuery = "UPDATE adherent SET `nom`='$nom',`etat`='$prenom',`mail`='$mail',`tel`='$tel'  WHERE adherent.id=$id AND adherent.user_id=$user ";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteAdherent($id){
            $sqlQuery = "DELETE FROM `adherent` WHERE adherent.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
    }
?>