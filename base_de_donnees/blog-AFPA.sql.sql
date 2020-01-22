-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 22 jan. 2020 à 14:32
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `titreArticle` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dateConception` date NOT NULL,
  `dateModification` date DEFAULT NULL,
  `descriptionArticle` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `texteArticle` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `idUtilisateur` int(11) DEFAULT NULL,
  `Idstatut` int(11) DEFAULT NULL,
  `Idcategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `auteur` (`idUtilisateur`),
  KEY `statut` (`Idstatut`),
  KEY `categorie` (`Idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `titreArticle`, `dateConception`, `dateModification`, `descriptionArticle`, `texteArticle`, `idUtilisateur`, `Idstatut`, `Idcategorie`) VALUES
(1, 'Tremblement de terre à Lille', '2020-01-01', NULL, 'Des Milliers de morts', 'Hier soir vers 22h00, un tremblement de terre a surgit à Lille.', 1, 1, 14),
(2, 'Un alien apperçu sur le terril de Liévin', '2019-10-21', '2020-01-21', 'Des centaines de témoins', 'Hier soir vers 22h00, un alien a été apperçu sur le terril de Liévin.', 2, 1, 18),
(3, 'Une température de -50° ressentie à Libercourt', '2020-01-03', NULL, 'Des habitants inquiets', 'Hier soir vers 22h00, une chute radicale de la température a été ressentie à Libercourt. Météo France invite la population de la ville a rester chez elle.', 2, 1, 2),
(4, 'Une ferme élève des puces à Uubigny en Urtois', '2020-01-15', NULL, 'Un éleveur heureux', 'Serge Plantin, éleveur de puces à Aubigny en Artois s\'apprête à agrandir ses locaux car son élevage prend de l\'ampleur.', 1, 2, 18),
(5, 'Un enfant de 5 ans a obtenu son BUC', '2020-01-13', NULL, 'Ses parents sont heureux pour lui', 'Incroyable, Adam, 5 ans, habitant Libercourt, a obtenu son BAC avec mention très bien. Sa maman a dit \"Maman est fier de toi mon coeur !\"', 2, 1, 2),
(6, 'Un petit singe vient d\'écrire son premier livre', '2020-01-07', NULL, 'Il a obtenu le Prix Pulitzer', 'Cacahuette, un petit oustiti a écrit son premier livre intitulé : \"OUaaa aaa aaa aaa\".', 2, 1, 3),
(7, 'Le gène de l\'immortalité enfin découvers chez l\'ho', '2020-01-21', NULL, 'Mais avec de nombreuses contraintes', 'Des scientifiques du Zimbabwe ont découvert le génôme de l\'immortalité, mais à quel prix. En effet, celui-ci entraîne une incontinance sévère ainsi qu\'une flatulence nauséabonde sans malheureusement de solution de traitement.', 1, 1, 18),
(8, 'Chuck Norris a traversé la ceinture de Kuiper en u', '2020-01-15', NULL, 'Sans effort', 'Extraordinaire, incroyable, il n\'existe aucun mot pour décrire cette exploit réalisé par notre légendaire Chuck Norris. Celui-ci a d\'ailleurs commenté : \"Il n\'y a rien d\'intéressant là-bas.\"', 2, 3, 18),
(9, 'Un hacker pirate le Vatican', '2020-01-22', NULL, 'Des millions de croyant choqués', 'Après une attaque cybernétique, le Vatican représenté par le Pape François, a décidé de contre-attaquer...', 1, 1, 18),
(10, 'Un vrai dinosaure en couveuse', '2020-01-19', NULL, 'Une catastrophe en devenir ?', 'Après l\'ère Jurassic Park et World, cette fois-ci ce n\'est plus du cinéma mais la réalité. Mais est-ce que ça va passer comme dans les films ?', 3, 3, 18);

-- --------------------------------------------------------

--
-- Structure de la table `article_media`
--

DROP TABLE IF EXISTS `article_media`;
CREATE TABLE IF NOT EXISTS `article_media` (
  `idArticleMedia` int(11) NOT NULL AUTO_INCREMENT,
  `idMedia` int(11) DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArticleMedia`),
  KEY `media` (`idMedia`),
  KEY `article` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_media`
--

INSERT INTO `article_media` (`idArticleMedia`, `idMedia`, `idArticle`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `typeCategorie` varchar(255) NOT NULL,
  `idCatParent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`),
  KEY `sousCategorie` (`idCatParent`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `typeCategorie`, `idCatParent`) VALUES
(2, 'Météo', NULL),
(3, 'France', 2),
(4, 'Allemagne', 2),
(5, 'Angleterre', 2),
(6, 'Italie', 2),
(7, 'Belgique', 2),
(8, 'Bourse', NULL),
(9, 'France', 8),
(10, 'Allemagne', 8),
(11, 'Angleterre', 8),
(12, 'Italie', 8),
(13, 'Belgique', 8),
(14, 'Hauts de France', 3),
(15, 'Aquitaine', 3),
(16, 'Provence Côte d\'azur', 3),
(17, 'Vendée', 3),
(18, 'Potin', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommentaire`),
  KEY `auteur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `texte`, `dateCreation`, `idUtilisateur`) VALUES
(1, 'Nul', '2020-01-21', 1),
(2, 'Bien', '2020-01-21', 2),
(3, 'Bof', '2020-01-21', 1),
(4, 'Terrible', '2020-01-21', 3);

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
CREATE TABLE IF NOT EXISTS `jaime` (
  `idJaime` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idArticle` int(11) DEFAULT NULL,
  `idCommentaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`idJaime`),
  KEY `auteur` (`idUtilisateur`),
  KEY `article` (`idArticle`),
  KEY `commentaire` (`idCommentaire`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jaime`
--

INSERT INTO `jaime` (`idJaime`, `idUtilisateur`, `idArticle`, `idCommentaire`) VALUES
(10, 1, 1, 2),
(11, 2, 8, 2),
(12, 3, 8, 2),
(13, 1, 5, 4),
(14, 1, 10, 1),
(15, 1, 1, 1),
(16, 2, 6, 3),
(17, 1, 1, 1),
(18, 1, 1, 2),
(19, 3, 7, 2),
(20, 1, 1, 1),
(21, 1, 1, 3),
(22, 3, 1, 4),
(23, 1, 9, 2),
(24, 1, 1, 3),
(25, 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `idMedia` int(11) NOT NULL AUTO_INCREMENT,
  `cheminMedia` varchar(255) NOT NULL,
  `dateCreationMedia` date DEFAULT NULL,
  `idTypeMedia` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMedia`),
  KEY `typeMedia` (`idTypeMedia`),
  KEY `auteur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`idMedia`, `cheminMedia`, `dateCreationMedia`, `idTypeMedia`, `idUtilisateur`) VALUES
(1, '/src/img/image1.jpg', '2020-01-21', 1, 1),
(2, '/src/img/image2.jpg', '2020-01-21', 1, 1),
(3, '/src/img/image3.jpg', '2020-01-21', 1, 1),
(4, '/src/img/image4.jpg', '2020-01-21', 1, 1),
(5, '/src/img/image5.jpg', '2020-01-21', 1, 1),
(6, '/src/img/image6.jpg', '2020-01-21', 1, 1),
(7, '/src/img/image7.jpg', '2020-01-21', 1, 1),
(8, '/src/img/image8.jpg', '2020-01-21', 1, 1),
(9, '/src/img/image9.jpg', '2020-01-21', 1, 1),
(10, '/src/img/image10.jpg', '2020-01-21', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `idStatut` int(11) NOT NULL AUTO_INCREMENT,
  `libelleStatut` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `libelleStatut`) VALUES
(1, 'Publié'),
(2, 'Brouillon'),
(3, 'Non publié');

-- --------------------------------------------------------

--
-- Structure de la table `typemedia`
--

DROP TABLE IF EXISTS `typemedia`;
CREATE TABLE IF NOT EXISTS `typemedia` (
  `idTypeMedia` int(11) NOT NULL AUTO_INCREMENT,
  `libelleType` varchar(20) NOT NULL,
  PRIMARY KEY (`idTypeMedia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typemedia`
--

INSERT INTO `typemedia` (`idTypeMedia`, `libelleType`) VALUES
(1, 'Image'),
(2, 'Video'),
(3, 'Document');

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateur`
--

DROP TABLE IF EXISTS `typeutilisateur`;
CREATE TABLE IF NOT EXISTS `typeutilisateur` (
  `idTypeUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `libelleTypeUtilisateur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`idTypeUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`idTypeUtilisateur`, `libelleTypeUtilisateur`) VALUES
(1, 'Visiteur'),
(2, 'Contributeur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudoUtilisateur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `motDePasse` varchar(20) NOT NULL,
  `idTypeUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `typeUtilisateur` (`idTypeUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudoUtilisateur`, `nom`, `prenom`, `dateNaissance`, `motDePasse`, `idTypeUtilisateur`) VALUES
(1, 'ThierryDev62', 'BROUET', 'Thierry', '1970-09-07', 'toto', 3),
(2, 'Didine', 'BROUET', 'Amandine', '1984-11-28', 'toto', 3),
(3, 'Titi', 'BROUET', 'Théo', '2002-01-22', 'trankiloubilou', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`Idstatut`) REFERENCES `statut` (`idStatut`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`Idcategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `article_media`
--
ALTER TABLE `article_media`
  ADD CONSTRAINT `article_media_ibfk_1` FOREIGN KEY (`idMedia`) REFERENCES `media` (`idMedia`),
  ADD CONSTRAINT `article_media_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`idCatParent`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `jaime`
--
ALTER TABLE `jaime`
  ADD CONSTRAINT `jaime_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `jaime_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `jaime_ibfk_3` FOREIGN KEY (`idCommentaire`) REFERENCES `commentaire` (`idCommentaire`);

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`idTypeMedia`) REFERENCES `typemedia` (`idTypeMedia`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idTypeUtilisateur`) REFERENCES `typeutilisateur` (`idTypeUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
