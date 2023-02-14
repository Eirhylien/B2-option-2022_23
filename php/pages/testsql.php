<?php


function connexion($servername, $username, $password, $dbname) {
    try {
        $db = new PDO('mysql:host='. $servername .';dbname='. $dbname .';', $username, $password);
        return $db;
    } catch (PDOException $e) {
        print ("Erreur: " . $e->getMessage() . "<br/>");
        die;
    }
}





$connexiondb = connexion("db5011603677.hosting-data.io:3306", "dbu913389", "NsU2iLPyJ5kRM4h", "dbs9782335");



$sqlRequete = " 
-- phpMyAdmin SQL Dump
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

$requête = $connexiondb->prepare($sqlRequete);
$requête->execute();
$resultDB = $requête->fetchAll();


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

debug_to_console($resultDB);

?>