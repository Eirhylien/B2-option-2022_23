<?php
    require_once("User.php");
    require_once("Jeux.php");
    require_once("FDJ.php");
$script = "-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 12 jan. 2023 à 14:55
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ludotechalea`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `user_id` int(50) NOT NULL,
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `tel` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categ_fdj`
--

DROP TABLE IF EXISTS `categ_fdj`;
CREATE TABLE IF NOT EXISTS `categ_fdj` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `id_categ` int(50) NOT NULL,
  `id_fdj` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categ` (`id_categ`),
  KEY `id_fdj` (`id_fdj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fdj`
--

DROP TABLE IF EXISTS `fdj`;
CREATE TABLE IF NOT EXISTS `fdj` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `fdj_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `dispo` tinyint(1) NOT NULL,
  `etat` varchar(10) NOT NULL,
  `remarque` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fdj_id` (`fdj_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mdp` varchar(15) NOT NULL,
  `etablissement` tinyint(1) NOT NULL,
  `role` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--



--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `categ_fdj`
--
ALTER TABLE `categ_fdj`
  ADD CONSTRAINT `categ_fdj_ibfk_1` FOREIGN KEY (`id_fdj`) REFERENCES `fdj` (`id`),
  ADD CONSTRAINT `categ_fdj_ibfk_2` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `fdj`
--
ALTER TABLE `fdj`
  ADD CONSTRAINT `fdj_ibfk_1` FOREIGN KEY (`id`) REFERENCES `categ_fdj` (`id_fdj`);

--
-- Contraintes pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD CONSTRAINT `jeux_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jeux_ibfk_2` FOREIGN KEY (`fdj_id`) REFERENCES `fdj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";




    function connexion($servername, $username, $password, $dbname) {
        try {
            $db = new PDO('mysql:host='. $servername .';dbname='. $dbname .';', $username, $password);
            return $db;
        } catch (PDOException $e) {
            print "Erreur: " . $e->getMessage() . "<br/>";
            die;
        }
    }
        
    /**
     * Database
     * création de la connexion avec la base de données
     */
    class Database {
        
        /**
         * connexiondb
         * 
         * 
         *
         * @var mixed
         */
        private $connexiondb;
        
        /**
         * __construct
         *
         * @return void
         */
        public function __construct() {
            $this->connexiondb = connexion("db5011603677.hosting-data.io:3306", "dbu913389", "NsU2iLPyJ5kRM4h", "dbs9782335");
        }


        //CRUD USER
        
        /**
         * getUsers
         * permet d'avoir la liste entière des utilisateurs
         * @return listeUsersObjet
         */
        public function getUsers(){
            $sqlQuery = "SELECT * FROM `user`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();
            $listeUsersObjet=array();

            if (sizeof($resultDB) > 0) {
                foreach($resultDB as $user) {
                    $users = new User($user['id'],$user['nom'],$user['prenom'],$user['username'],$user['email'],$user['mdp'],$user['etablissement'],$user['role']);
                    array_push($listeUsersObjet,$users);
                }

                return $listeUsersObjet;
            } else {

                return "Erreur";
            }
            return "Erreur";
        }
        
        /**
         * IsExistEmail
         * renvois true ou false en fonction de si un utilisateur avec l'adresse email de l'objet user données existe
         *
         * @param  mixed $user
         * @return bool
         */
        public function IsExistEmail($user){
            $sqlQuery = "SELECT * FROM `user` where email='".$user->email."'";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();
            if (sizeof($resultDB) > 0){
                return true;
            }
            else {
                return false;
            }
            return false;
        }
                
        /**
         * getUserById
         * renvoie les données d'un utilisateur avec l'id de l'utilisateur fournit
         * @param  mixed $user
         * @return user
         */
        public function getUserById($user){
            $sqlQuery = "SELECT * FROM `jeux` WHERE user.id=" . $user->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();

            if (sizeof($resultDB) > 0) {
                $user=new User($user['id'],$user['nom'],$user['prenom'],$user['username'],$user['email'],$user['mdp'],$user['etablissement'],$user['role']);


                return $user;
            } else {

                return "Erreur";
            }
            return "Erreur";
        }
        
        /**
         * isAdmin
         * permet de savoir si un utilisateur données est admin
         * @param  mixed $user
         * @return bool
         */
        public function isAdmin($user){
            $sqlQuery = "SELECT `admin` FROM `user` WHERE user.id=" . $user->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $user = $usersStatement->fetchAll();
            if ($user['admin']==1){
                return true;
            }
            else {
                return false;
            }
            return false;

        }
                
        /**
         * insertUser
         * permet d'ajouter l'utilisateur fournit en paramètre à la base de données
         * @param  mixed $user
         * @return void
         */
        public function insertUser($user){
            $converted_res=  $user->etablissement ? 'true' : 'false';
            $sqlQuery = "INSERT INTO user (email,nom,prenom,username,mdp,etablissement,`role`) VALUES ('". $user->email ."','". $user->nom."','". $user->prenom."','". $user->username."','". $user->mdp."',". $converted_res.",".$user->role.")";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($script);
            $usersStatement->execute();
        }
                
        /**
         * updateUser
         * met a jour un utilisateur dans la base de données grâce au nouvelle donnée passé en paramètre
         * @param  mixed $user
         * @return void
         */
        public function updateUser($user){
            $sqlQuery = "UPDATE user SET `email`='".$user->email."',`nom`='".$user->nom."',`prenom`='".$user->prenom."',`username`='".$user->username."',`mdp`='".$user->mdp."',`etablissement`=".$user->etablissement." WHERE user.id=".$user->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteUser
         * permet de suprimer un utilisateur passé en paramètre de la base de données
         * @param  mixed $user
         * @return void
         */
        public function deleteUser($user){
            $sqlQuery = "DELETE FROM `user` WHERE user.id=". $user->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }






        //CRUD JEUX
        
        /**
         * getJeuxALL
         * permet d'avoir la liste entière des jeux présent dans la base de données
         * @return listeJeuxObjet
         */
        public function getJeuxALL(){
            $sqlQuery = "SELECT jeux.* FROM `jeux`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();
            $listeJeuxObjet=array();
            if (sizeof($resultDB) > 0) {
                //pour chaque jeu dans résultat
                foreach($resultDB as $jeu) {
                    $jeux = new Jeux();
                    $jeux->remarque = $jeu['remarque'];
                    $jeux->etat =  $jeu['etat'];
                    $jeux->dispo =  $jeu['dispo'];
                    $jeux->user_id =  $jeu['user_id'];
                    $jeux->fdj_id = $jeu['fdj_id'];
                    array_push($listeJeuxObjet,$jeux);
                }

                return $listeJeuxObjet;
            } else {

                return "Erreur";
            }
            return "Erreur";

        }
        
        /**
         * getJeuxByID
         * permet d'avoir tout les donées d'un jeux passé en paramètre grâce a son id
         * @param  mixed $Jeux
         * @return jeux
         */
        public function getJeuxByID($Jeux){
            $sqlQuery = "SELECT * FROM `jeux` WHERE jeux.id=".$Jeux->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $resultDB = $usersStatement->fetchAll();
            if (sizeof($resultDB) > 0) {
                //pour chaque jeu dans résultat
                foreach($resultDB as $jeu) {
                    $jeux = new Jeux();
                    $jeux->remarque = $jeu['remarque'];
                    $jeux->etat =  $jeu['etat'];
                    $jeux->dispo =  $jeu['dispo'];
                    $jeux->user_id =  $jeu['user_id'];
                    $jeux->fdj_id = $jeu['fdj_id'];
                    array_push($listeJeuxObjet,$jeux);
                }

                return $listeJeuxObjet;
            } else {

                return "Erreur";
            }
            return "Erreur";

        }


        
        /**
         * getJeuxByUser
         * permet de renvoyer la liste des jeux d'un utilisateur passé en parmètre
         * @param  mixed $user
         * @return listeJeuxObjet
         */
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
                    $jeux->fdj_id = $jeu['fdj_id'];
                    array_push($listeJeuxObjet,$jeux);
                }

                return $listeJeuxObjet;
            } else {

                return "Erreur";
            }
            return "Erreur";
        }
                
        /**
         * insertJeux
         * permet d'ajouter un jeux à un utilisateur 
         * @param  mixed $jeux
         * @param  mixed $user
         * @return void
         */
        public function insertJeux($jeux,$user){
            $fdjId= $this->getFdjIDByJeuxName($jeux);
            $sqlQuery = "INSERT INTO jeux (fdj_id,user_id,dispo,etat,remarque) VALUES ('".$fdjId."','".$user->id."',".$jeux->dispo.",'".$jeux->etat."','".$jeux->remarque."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
                
        /**
         * updateJeux
         * modifie les données d'un jeux dans la base de donées passé en paramètre
         * @param  mixed $jeux
         * @return void
         */
        public function updateJeux($jeux){
            $sqlQuery = "UPDATE jeux SET `dispo`=".$jeux->dispo.",`etat`='".$jeux->etat."',`remarque`=".$jeux->remarque." WHERE jeux.id=".$jeux->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteJeux
         * Supprime un jeux de la base de données
         * @param  mixed $jeux
         * @return void
         */
        public function deleteJeux($jeux){
            $sqlQuery = "DELETE FROM `jeux` WHERE jeux.id=".$jeux->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }





        //CRUD FDJ

        
        /**
         * getFdj
         * permet d'avoir la liste entière des fiches de jeux dans la base de données
         * @return listeFDJObjet
         */
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
            return "Erreur";
        }
        
        /**
         * getFdjByJeux
         * permet d'avoir la fiche de jeux relatives à un jeux donné en paramètre
         * @param  mixed $jeux
         * @return fdj
         */
        public function getFdjByJeux($jeux){
            $sqlQuery = "SELECT fdj.id,fdj.nom,fdp.description,fdj.date,fdj.img FROM `fdj`,`jeux` where fdj.id=".$jeux->fdj_id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }
        
        /**
         * getFdjByID
         * permet d'avoir les informations d'une fiche de jeux en fonction de son ID
         * @param  mixed $id
         * @return fdj
         */
        public function getFdjByID($id){
            $sqlQuery = "SELECT fdj.id,fdj.nom,fdp.description,fdj.date,fdj.img FROM `fdj`,`jeux` where fdj.id=".$id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }
        
        /**
         * getFdjByJeuxName
         * permet d'avoir la fiche de jeux en fonction du nom du jeux passé en paramètre
         * @param  mixed $jeux
         * @return fdj
         */
        public function getFdjByJeuxName($jeux){
            $sqlQuery = "SELECT * FROM `fdj`,`jeux` where fdj.nom=".$jeux->nom;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }
        
        /**
         * getFdjIDByJeuxName
         * permet de récupérer uniquement l'id de d'une fiche de jeux en fonction du nom du jeux donné en paramètre
         * @param  mixed $jeux
         * @return fdj
         */
        public function getFdjIDByJeuxName($jeux){
            $sqlQuery = "SELECT fdj.id FROM `fdj`,`jeux` where fdj.nom=".$jeux->fdj_id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $fdjs = $usersStatement->fetchAll();
        
            return $fdjs;
        }

                
        /**
         * insertFdj
         * permet d'ajouter une fiche de jeux dans la base de donné
         * @param  mixed $fdj
         * @return void
         */
        public function insertFdj($fdj){
            $sqlQuery = "INSERT INTO fdj (nom,`description`,`date`,img) VALUES ('".$fdj->nom."','".$fdj->description."','".$fdj->date."','".$fdj->img."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
                
        /**
         * updateFdj
         * permet de modifier les données d'une fiche de jeux passée en paramètre 
         * @param  mixed $fdj
         * @return void
         */
        public function updateFdj($fdj){
            $sqlQuery = "UPDATE fdj SET `nom`='".$fdj->nom."',`description`='".$fdj->description."',`date`='".$fdj->date."',`img`='".$fdj->img."' WHERE fdj.id=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteFdj
         * permet de supprimer de la base de donée la fiche de jeux passée en paramètre
         * @param  mixed $fdj
         * @return void
         */
        public function deleteFdj($fdj){
            $sqlQuery = "DELETE FROM `fdj` WHERE fdj.id=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
        




        //CRUD Categorie
        
        /**
         * getCategorie
         * permet d'avoir toute les catégorie présent dans la base de donnée
         * @return ListeCategorie
         */
        public function getCategorie(){
            $sqlQuery = "SELECT nom,id FROM `categorie`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $ListeCategorie = $usersStatement->fetchAll();
        
            return $ListeCategorie;
        }
                
        /**
         * getCategorieByName
         * permet de retourner une catégorie en fonction de son nom passée en paramètre
         * @param  mixed $categorie
         * @return Categorie
         */
        public function getCategorieByName($categorie){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.nom=".$categorie->nom;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
        
                
        /**
         * getCategorieByID
         * permet de récupérer les données de la catégorie en fonction de son id
         * @param  mixed $categorie
         * @return Categorie
         */
        public function getCategorieByID($categorie){
            $sqlQuery = "SELECT nom,id FROM `categorie` WHERE categorie.id=".$categorie->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Categorie = $usersStatement->fetchAll();
        
            return $Categorie;
        }
                
        /**
         * insertCategorie
         * permet d'ajouter une nouvelle catégorie à la base de données
         * @param  mixed $categorie
         * @return void
         */
        public function insertCategorie($categorie){
            $sqlQuery = "INSERT INTO `categorie` (nom) VALUES ('".$categorie->nom."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
                
        /**
         * updateCategorie
         * permet de modifier le nom d'une catégorie passée en paramètre 
         * @param  mixed $categorie
         * @return void
         */
        public function updateCategorie($categorie){
            $sqlQuery = "UPDATE `categorie` SET `nom`='".$categorie->nom."' WHERE categorie.id=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteCategorie
         * permet de supprimer de la base de donnée une catégorie passée en paramètre
         * @param  mixed $categorie
         * @return void
         */
        public function deleteCategorie($categorie){
            $sqlQuery = "DELETE FROM `categorie` WHERE categorie.id=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }









        //CRUD categ_fdj
        
        /**
         * getCategRelation
         * retourne l'entierté des relations entre les catégorie et les fiches de jeux de la base de données
         * @return ListeRelation
         */
        public function getCategRelation(){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj`";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $ListeRelation = $usersStatement->fetchAll();
        
            return $ListeRelation;
        }
                
        /**
         * getCategRelationByFDJId
         * permet d'obtenir une relation grâce à l'id d'une fiche de jeux
         * @param  mixed $fdj
         * @return relation
         */
        public function getCategRelationByFDJId($fdj){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_fdj=".$fdj->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
                
        /**
         * getCategRelationByCategId
         * permet d'obtenir une relation en fonction de l'id d'une catégorie 
         * @param  mixed $categorie
         * @return relation
         */
        public function getCategRelationByCategId($categorie){
            $sqlQuery = "SELECT id,id_categ,id_fdj FROM `categ_fdj` WHERE categ_fdj.id_categ=".$categorie->id;
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            $Relation = $usersStatement->fetchAll();
        
            return $Relation;
        }
                
        /**
         * insertRelation
         * permet d'ajouter une relation entre une catégorie et une fiche de jeux
         * @param  mixed $categorie
         * @param  mixed $fdj
         * @return void
         */
        public function insertRelation($categorie,$fdj){
            $sqlQuery = "INSERT INTO `categ_fdj` (id_categ,id_fdj) VALUES ('".$categorie->id."','".$fdj->id."')";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
            echo "<script>console.log('good');</script>";
        }
                
        /**
         * updateRelationByRelationID
         * permet de modifier une relation en fonction de l'id de la relation
         * @param  mixed $id
         * @param  mixed $categorie
         * @param  mixed $fdj
         * @return void
         */
        public function updateRelationByRelationID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='".$categorie->id."',`id_fdj`='".$fdj->id."' WHERE categ_fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * updateRelationByCategorieID
         * permet de modifier une relation en fonction de l'id de la catégorie
         * @param  mixed $id
         * @param  mixed $categorie
         * @param  mixed $fdj
         * @return void
         */
        public function updateRelationByCategorieID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_fdj`='".$fdj->id."' WHERE categ_fdj.id=$id AND categ_fdj.id_categ=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * updateRelationByFDJID
         * permet de modifier une relation en fonction de l'id de la fiche de jeux 
         * @param  mixed $id
         * @param  mixed $categorie
         * @param  mixed $fdj
         * @return void
         */
        public function updateRelationByFDJID($id,$categorie,$fdj){
            $sqlQuery = "UPDATE categ_fdj SET `id_categ`='".$categorie->id."' WHERE categ_fdj.id=$id AND categ_fdj.id_fdj=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteRelationByRelationID
         * permet de supprimer une relation en fonction de l'id de la relation
         * @param  mixed $id
         * @return void
         */
        public function deleteRelationByRelationID($id){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id=$id";
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteRelationByCategorieID
         * permet de supprimer une relation en fonction de l'id de la catégorie
         * @param  mixed $categorie
         * @return void
         */
        public function deleteRelationByCategorieID($categorie){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=".$categorie->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
                
        /**
         * deleteRelationByFDJID
         * permet de supprimer une relation en fonction de l'id de la fiche de jeux
         * @param  mixed $fdj
         * @return void
         */
        public function deleteRelationByFDJID($fdj){
            $sqlQuery = "DELETE FROM `categ_fdj` WHERE categ_fdj.id_categ=".$fdj->id;
            echo "<script>console.log('".$sqlQuery."');</script>";
            $usersStatement = $this->connexiondb->prepare($sqlQuery);
            $usersStatement->execute();
        }
    }
?>