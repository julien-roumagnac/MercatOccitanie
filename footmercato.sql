-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 03 juin 2018 à 20:38
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `footmercato`
--

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(64) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_niveau1` int(11) NOT NULL,
  `id_niveau2` int(11) NOT NULL,
  `ville` varchar(32) NOT NULL,
  `ecusson_lien` varchar(32) DEFAULT NULL,
  `adresse` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`club_id`),
  KEY `id_niveau1` (`id_niveau1`),
  KEY `id_niveau2` (`id_niveau2`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déclencheurs `club`
--
DROP TRIGGER IF EXISTS `autoecusson`;
DELIMITER $$
CREATE TRIGGER `autoecusson` BEFORE INSERT ON `club` FOR EACH ROW SET  NEW.ecusson_lien='ecu.png'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `club_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `club` varchar(32) NOT NULL,
  PRIMARY KEY (`club_id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `joueur_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `id_poste` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `club` varchar(32) NOT NULL,
  `num_phone` int(11) NOT NULL,
  `bio` text,
  `id_user` int(11) NOT NULL,
  `ville` varchar(32) NOT NULL,
  PRIMARY KEY (`joueur_id`),
  KEY `id_poste` (`id_poste`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `niveau_id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(32) NOT NULL,
  PRIMARY KEY (`niveau_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`niveau_id`, `division`) VALUES
(1, 'R1'),
(6, 'R2'),
(7, 'R3'),
(8, 'D1'),
(9, 'D2'),
(10, 'D3');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `offres_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `id_poste` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`offres_id`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_poste` (`id_poste`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déclencheurs `offres`
--
DROP TRIGGER IF EXISTS `ajoutdateauto`;
DELIMITER $$
CREATE TRIGGER `ajoutdateauto` BEFORE INSERT ON `offres` FOR EACH ROW SET  NEW.date_creation=SYSDATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `poste_id` int(11) NOT NULL AUTO_INCREMENT,
  `poste` varchar(32) NOT NULL,
  PRIMARY KEY (`poste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`poste_id`, `poste`) VALUES
(1, 'G'),
(2, 'DC'),
(3, 'DD'),
(4, 'DG'),
(5, 'MC'),
(6, 'MDC'),
(7, 'MOC'),
(8, 'MG'),
(9, 'MD'),
(10, 'AD'),
(11, 'AG'),
(12, 'AT'),
(13, 'BU'),
(14, 'Attaquant'),
(15, 'Milieu'),
(16, 'Defenseur');

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

DROP TABLE IF EXISTS `titre`;
CREATE TABLE IF NOT EXISTS `titre` (
  `titre_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titre` varchar(32) NOT NULL,
  PRIMARY KEY (`titre_id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`titre_id`, `id_user`, `titre`) VALUES
(11, 39, ''),
(12, 42, 'Champion du monde '),
(13, 42, 'champion auvergne '),
(14, 42, 'Championt de R3 seniot'),
(15, 42, 'Championt de R3 seniot'),
(16, 45, 'Champion du monde '),
(17, 39, 'blabla');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(32) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `mail`, `mdp`, `role`) VALUES
(26, 'admivc@n', '$2y$10$GszLTOq1Jx9a6N3Lcj3Tdet6r9v02WLR/lNiL9KeY23qCNSMQGt4C', 2),
(28, 'joueur@joueur.j', '$2y$10$yNuowPonDbmUoh6RMfXM8eNkVfxvNSHizq7t2u.f.gIoEUt2FzJY.', 2),
(37, 'fxcv@gg', '$2y$10$FOzvmdl4uc5b.ux3HNfPB.TIgZJjXkRUL0Oy0zVaSXxBR8928mdNy', 1),
(38, 'joueur@offi.fr', '$2y$10$mHUS44A84NQIQat4C2gh6ukz5fPBBycbhVNKvvODmX8sBdT4q84wm', 2),
(39, 'compte@c.com', '$2y$10$dh3DGccqVezu9MR4yvLPCea0gEzvtlTOvbXQdDA0cnHOyz5mIzjFm', 2),
(40, 'a@a', '$2y$10$btpYN/kdE5an1XB6Vn1V2.i0u5uA8FsTIx3p02O379RL8ejFmjFCW', 1),
(41, 'j@j.fr', '$2y$10$w/DANPA316AczbIuggydHOk6W.3oHaO5uVsvp5gsSdM/rOxKLYP2S', 2),
(42, 'clubtest@c.com', '$2y$10$1Ukll7mdi08vH26PCKjPd.aTJgvpcBa1lP4m8UTQqT5B1OXhlXJf2', 1),
(43, 'test@test', '$2y$10$Ts7hEZaaLYFAC0tW15dDkeNPf6zKvREsG3.CE5Yb4bJj80/Nhvkz2', 1),
(44, 'test@t', '$2y$10$7cr2fUYSfVuL6t7ZyaoQW.O1umz1fD/FBYocafwtrH/j.NH1RL88C', 1),
(45, 'test@joueur', '$2y$10$0szI7JBAHohJcJR0aeIm3uykHpv7A072pW6zoW5Nv9wPPmvSKEE2a', 2);

-- --------------------------------------------------------

--
-- Structure de la table `userstokens`
--

DROP TABLE IF EXISTS `userstokens`;
CREATE TABLE IF NOT EXISTS `userstokens` (
  `token_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `token` varchar(64) NOT NULL,
  PRIMARY KEY (`token_id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `userstokens`
--

INSERT INTO `userstokens` (`token_id`, `id_user`, `token`) VALUES
(133, 39, '$2y$10$Xfc19M/bIoMwxbo2WzICBeVaCUnmYlL2LqHM01XYDPtssV/uItsta');

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lien` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `videos`
--

INSERT INTO `videos` (`video_id`, `id_lien`, `id_user`) VALUES
(6, '2MyJNGCIT74', 45),
(7, 'GmioCFZikts', 39);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`id_niveau1`) REFERENCES `niveau` (`niveau_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_ibfk_2` FOREIGN KEY (`id_niveau2`) REFERENCES `niveau` (`niveau_id`),
  ADD CONSTRAINT `club_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`poste_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joueur_ibfk_3` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`niveau_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joueur_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`niveau_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offres_ibfk_2` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`poste_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offres_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `titre`
--
ALTER TABLE `titre`
  ADD CONSTRAINT `titre_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `userstokens`
--
ALTER TABLE `userstokens`
  ADD CONSTRAINT `userstokens_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
