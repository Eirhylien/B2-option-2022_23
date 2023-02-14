-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : mar. 14 fév. 2023 à 10:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'jeux de plateau'),
(2, 'jeux de cartes'),
(3, 'jeux classique');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categ_fdj`
--

INSERT INTO `categ_fdj` (`id`, `id_categ`, `id_fdj`) VALUES
(1, 2, 5),
(2, 2, 1),
(3, 1, 7),
(4, 2, 3),
(5, 3, 6),
(6, 1, 4),
(7, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fdj`
--

INSERT INTO `fdj` (`id`, `nom`, `description`, `date`, `img`) VALUES
(1, 'Blanc-Manger Coco', 'Le principe de Blanc-manger Coco est très simple:\r\n\r\nchaque joueur reçoit 11 cartes réponses pour commencer un premier joueur (le « Question Master ») lit une carte question (texte à trou) prise dans la pioche les autres joueurs choisissent une de leurs cartes réponse et la posent face retournée sur la table le Question Master mélange les cartes réponses puis relit la carte question avec chaque carte réponse. Il choisit la meilleure selon ses propres critères', '2014-01-01', 'http://mydi.eind.fr/images/blancMangerCoco.png'),
(2, 'Uno', 'Le Uno est un jeu de cartes américain créé en 19711 par Merle Robbins et édité par Mattel. Basé sur les règles du 8 américain (qui se joue avec un jeu de cartes standard), le Uno lui applique un jeu de cartes spécifiquement dédié, ainsi que quelques règles supplémentaires.\r\nPour gagner une manche de Uno, il faut être le premier joueur à se défausser de la dernière carte de sa main. La manche s\'arrête alors (après les pioches de cartes éventuelles), et l\'on compte les points. Le jeu continue, manche par manche, jusqu\'à ce qu\'un joueur atteigne 500 points.', '1971-01-01', 'http://mydi.eind.fr/images/Uno.png'),
(3, 'Dobble', 'Le jeu comporte 55 cartes rondes, avec 8 dessins sur chacune. Chaque carte a un unique dessin commun avec n\'importe quelle autre carte du paquet. Le but du jeu est de trouver le dessin en commun entre deux cartes données, et de l\'annoncer.\r\n5 mini jeux ont été développés par la société Play Factory, chaque règle étant présentée sur une carte.', '2009-01-01', 'http://mydi.eind.fr/images/Dobble.png'),
(4, 'La Bonne Paye', 'Les joueurs jettent un dé à tour de rôle pour se déplacer sur le parcours. En fonction de la case où ils tombent, ils doivent tirer une carte, payer ou recevoir de l\'argent.\r\n\r\nChaque case est une journée du mois, et à la fin du mois, les joueurs reçoivent leur paye et doivent régler leurs factures.\r\n\r\nLe but du jeu est d\'être le joueur ayant accumulé le plus d\'argent (ou que les autres n\'en aient plus), à l\'aide de différentes méthodes.', '1974-01-01', 'http://mydi.eind.fr/images/bonnePaye.png'),
(5, 'Bataille', 'La bataille est un jeu de cartes qui se joue habituellement à deux (bien que le nombre de joueurs puisse être supérieur) qui est d\'une grande simplicité pour les débutants, puisqu\'on peut y jouer sous la conduite exclusive du hasard (bien que la manière dont sont rangés les plis peut influencer considérablement l\'issue du jeu1, pour les joueurs avancés).', '1800-01-01', 'http://mydi.eind.fr/images/Bataille.png'),
(6, 'Domino', 'Les dominos sont un jeu de société d\'origine chinoise, utilisant 28 pièces (dans le cas d\'un jeu « double-six »). On y joue généralement à deux, trois ou quatre personnes. Comme avec les cartes, il existe de nombreuses variantes de jeu. \r\n', '1760-01-01', 'http://mydi.eind.fr/images/Domino.png'),
(7, 'Destin', 'Une partie se joue de 2 à 8 joueurs. Chacun reçoit une voiture en plastique qui le représente avec sa famille au long de la partie. À chaque tour, on lance une roue composée des nombres de 1 à 10 qui fait office de dé et indique le déplacement de la voiture. Au fil du jeu, le joueur se voit faire face à tout un tas d\'événements (naissances, dettes, etc.) qui vont rythmer sa vie. Le plateau de jeu est atypique, en effet il n\'est pas plat, il contient des pièces plastiques en 3D dont une petite montagne (représentant l\'Everest) et des maisons.', '1861-01-01', 'http://mydi.eind.fr/images/Destin.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`fdj_id`, `user_id`, `id`, `dispo`, `etat`, `remarque`) VALUES
(5, 1, 1, 1, 'bon', ''),
(2, 1, 2, 0, 'bon', ''),
(5, 17, 3, 1, 'bon', ''),
(4, 17, 4, 1, 'moyen', ''),
(2, 16, 5, 0, 'mauvais', ''),
(2, 15, 6, 0, 'très bon', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `mdp` varchar(15) NOT NULL,
  `etablissement` tinyint(1) NOT NULL,
  `role` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nom`, `prenom`, `username`, `mdp`, `etablissement`, `role`) VALUES
(1, 'nouailleyouenn@gmail.com', 'Nouaille', 'Youenn', 'younll', '56QwXpdmU=', 0, 1),
(15, 'theo.marchand@my-digital-school.org', 'Marchand', 'Theo', 'theomrd', 'theomarchand', 0, 1),
(16, 'ethan.desvages@my-digital-school.org', 'Desvages', 'Ethan', 'ethandvs', 'ethandesvages', 0, 1),
(17, 'denis.bonnet@eduservices.org', 'Bonnet', 'Denis', 'denisbnt', 'denisbonnet', 0, 1);

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
  ADD CONSTRAINT `categ_fdj_ibfk_2` FOREIGN KEY (`id_categ`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `categ_fdj_ibfk_3` FOREIGN KEY (`id_fdj`) REFERENCES `fdj` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
