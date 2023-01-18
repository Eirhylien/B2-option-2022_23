<?php
    require_once("./class/User.php");
    require_once("./class/Jeux.php");
    require_once("./class/FDJ.php");

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
            $resultDB = $usersStatement->fetchAll();
            $listeUsersObjet=array();

            if (sizeof($resultDB) > 0) {
                foreach($resultDB as $user) {
                    $users = new User();
                    $users->id = $user['id'];
                    $users->nom = $user['nom'];
                    $users->prenom = $user['prenom'];
                    $users->username = $user['username'];
                    $users->email = $user['email'];
                    $users->mdp = $user['mdp'];
                    $users->etablissement = $user['etablissement'];
                    array_push($listeUsersObjet,$users);
                }

                return $listeUsersObjet;
            } else {

                return "Erreur";
            }
        }
        
        public function getUsersById($user){
            $sqlQuery = "SELECT * FROM `user` WHERE user.id=" . $user->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();

            if (sizeof($resultDB) > 0) {
                $user->nom = $resultDB[0]['nom'];
                $user->prenom = $resultDB[0]['prenom'];
                $user->username = $resultDB[0]['username'];
                $user->email = $resultDB[0]['email'];
                $user->mdp = $resultDB[0]['mdp'];
                $user->etablissement = $resultDB[0]['etablissement'];

                return $user;
            } else {

                return "Erreur";
            }
        }

        public function getJeux($jeux){
            $sqlQuery = "SELECT * FROM `user` WHERE user.id=" . $jeux->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();

            if (sizeof($resultDB) > 0) {
                $jeux->id = $resultDB[0]['id'];
                $jeux->fdj_id = $resultDB[0]['fdj_id'];
                $jeux->user_id = $resultDB[0]['user_id'];
                $jeux->dispo = $resultDB[0]['dispo'];
                $jeux->etat = $resultDB[0]['etat'];
                $jeux->remarque = $resultDB[0]['remarque'];

                return $jeux;
            } else {

                return "Erreur";
            }
        }

        public function isAdmin($user){
            $sqlQuery = "SELECT `admin` FROM `user` WHERE user.id=" . $user->id;
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
            $sqlQuery = "INSERT INTO user (email,nom,prenom,username,mdp,etablissement) VALUES ('". $user->email ."','". $user->nom."','". $user->prenom."','". $user->username."','". $user->mdp."',". $user->etablissement.")";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateUser($user){
            $sqlQuery = "UPDATE user SET `email`='".$user->email."',`nom`='".$user->nom."',`prenom`='".$user->prenom."',`username`='".$user->username."',`mdp`='".$user->mdp."',`etablissement`=".$user->etablissement." WHERE user.id=".$user->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteUser($user){
            $sqlQuery = "DELETE FROM `user` WHERE user.id=". $user->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }






        //CRUD JEUX



        public function getJeuxByUser($user){
            $sqlQuery = "SELECT jeux.id,jeux.dispo,jeux.etat,jeux.remarque,jeux.user_id,jeux.fdj_id FROM `jeux`,`user` WHERE jeux.user_id=".$user->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();


            $listeJeuxObjet=array();

            //vérif taille résultat
            if (sizeof($resultDB) > 0) {
                //pour chaque jeu dans résultat
                foreach($resultDB as $jeu) {
                    $jeux = new Jeux();
                    $jeux->remarque = $jeu['remarque'];
                    $jeux->etat =  $jeu['etat'];
                    $jeux->dispo =  $jeu['dispo'];
                    $jeux->user_id =  $jeu['user_id'];
                    array_push($listeJeuxObjet,$jeux);
                }

                return $listeJeuxObjet;
            } else {

                return "Erreur";
            }
        }
        
        public function insertJeux($jeux,$user){
            $fdjId= $this->getFdjIDByJeuxName($jeux);
            $sqlQuery = "INSERT INTO jeux (fdj_id,user_id,dispo,etat,remarque) VALUES ('".$fdjId."','".$user->id."',".$jeux->dispo.",'".$jeux->etat."','".$jeux->remarque."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateJeux($jeux){
            $sqlQuery = "UPDATE jeux SET `dispo`=".$jeux->dispo.",`etat`='".$jeux->etat."',`remarque`=".$jeux->remarque." WHERE jeux.id=".$jeux->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteJeux($jeux){
            $sqlQuery = "DELETE FROM `jeux` WHERE jeux.id=".$jeux->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }





        //CRUD FDJ


        public function getFdj(){
            $sqlQuery = "SELECT `id`,`nom`,`description`,`date`,`img` FROM `fdj`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();
            $listeFDJObjet=array();

            if (sizeof($resultDB) > 0) {
                foreach($resultDB as $fdj) {
                    $fdjs = new FDJ();
                    $fdjs->id = $fdj['id'];
                    $fdjs->nom = $fdj['nom'];
                    $fdjs->description = $fdj['description'];
                    $fdjs->date = $fdj['date'];
                    $fdjs->img = $fdj['img'];
                    $fdjs->categories = $fdj['categories'];
                    array_push($listeFDJObjet,$fdjs);
                }

                return $listeFDJObjet;
            } else {

                return "Erreur";
            }
        }

        public function getFdjByJeux($jeux){
            $sqlQuery = "SELECT fdj.id,fdj.nom,fdp.description,fdj.date,fdj.img FROM `fdj`,`jeux` where fdj.id=".$jeux->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }

        public function getFdjIdByJeuxName($jeux){
            $sqlQuery = "SELECT fdj.id FROM `fdj`,`jeux` where fdj.nom=".$jeux->nom;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }

        
        public function insertFdj($fdj){
            $sqlQuery = "INSERT INTO fdj (nom,`description`,`date`,img) VALUES ('".$fdj->nom."','".$fdj->description."','".$fdj->date."','".$fdj->img."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateFdj($fdj){
            $sqlQuery = "UPDATE fdj SET `nom`='".$fdj->nom."',`description`='".$fdj->description."',`date`='".$fdj->date."',`img`='".$fdj->img."' WHERE fdj.id=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteFdj($fdj){
            $sqlQuery = "DELETE FROM `fdj` WHERE fdj.id=".$fdj->id;
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
        
        public function getCategorieByName($categorie){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.nom=".$categorie->nom;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
        
        public function getCategorieByID($categorie){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.id=".$categorie->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
        
        public function insertCategorie($categorie){
            $sqlQuery = "INSERT INTO `categorie` (nom) VALUES ('".$categorie->nom."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateCategorie($categorie){
            $sqlQuery = "UPDATE `categorie` SET `nom`='".$categorie->nom."' WHERE categorie.id=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteCategorie($categorie){
            $sqlQuery = "DELETE FROM `categorie` WHERE categorie.id=".$categorie->id;
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
        
        public function getCategRelationByFDJId($fdj){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_fdj=".$fdj->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
        
        public function getCategRelationByCategId($categorie){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_categ=".$categorie->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
        
        public function insertRelation($categorie,$fdj){
            $sqlQuery = "INSERT INTO `categ_fdj` (id_categ,id_fdj) VALUES ('".$categorie->id."','".$fdj->id."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
        
        public function updateRelationByRelationID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='".$categorie->id."',`id_fdj`='".$fdj->id."' WHERE categ_fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateRelationByCategorieID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_fdj`='".$fdj->id."' WHERE categ_fdj.id=$id AND categ_fdj.id_categ=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function updateRelationByFDJID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='".$categorie->id."' WHERE categ_fdj.id=$id AND categ_fdj.id_fdj=".$fdj->id;
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
        
        public function deleteRelationByCategorieID($categorie){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        
        public function deleteRelationByFDJID($fdj){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
    }
?>