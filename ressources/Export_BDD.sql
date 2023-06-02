-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 juin 2023 à 09:54
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exo_beanies`
--
CREATE DATABASE IF NOT EXISTS `exo_beanies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `exo_beanies`;

-- --------------------------------------------------------

--
-- Structure de la table `beanie`
--

DROP TABLE IF EXISTS `beanie`;
CREATE TABLE IF NOT EXISTS `beanie` (
  `beanie_id` int NOT NULL AUTO_INCREMENT,
  `beanie_prix` decimal(6,2) NOT NULL,
  `beanie_description` varchar(50) NOT NULL,
  `beanie_image` varchar(50) NOT NULL,
  `beanie_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`beanie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `beanie`
--

INSERT INTO `beanie` (`beanie_id`, `beanie_prix`, `beanie_description`, `beanie_image`, `beanie_nom`) VALUES
(1, '10.00', 'Lorem ipsum dolor sit amet.', 'img/bonnet_creme.jpg', 'bonnet en laine'),
(2, '14.00', 'Lorem ipsum dolor sit amet.', 'img/bonnet_rouge.jpg', 'bonnet en laine bio'),
(3, '20.00', 'Lorem ipsum dolor sit amet.', 'img/bonnet_teal.jpg', 'bonnet en laine bio et cachemire'),
(4, '12.00', 'Lorem ipsum dolor sit amet.', 'img/bonnet_vert.jpg', 'bonnet arc-en-ciel');

-- --------------------------------------------------------

--
-- Structure de la table `beanie_matiere`
--

DROP TABLE IF EXISTS `beanie_matiere`;
CREATE TABLE IF NOT EXISTS `beanie_matiere` (
  `beanie_id` int NOT NULL,
  `matiere_id` int NOT NULL,
  PRIMARY KEY (`beanie_id`,`matiere_id`),
  KEY `Bonnet_matiere_Matiere_FK` (`matiere_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `beanie_matiere`
--

INSERT INTO `beanie_matiere` (`beanie_id`, `matiere_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `beanie_taille`
--

DROP TABLE IF EXISTS `beanie_taille`;
CREATE TABLE IF NOT EXISTS `beanie_taille` (
  `beanie_id` int NOT NULL,
  `taille_id` int NOT NULL,
  PRIMARY KEY (`beanie_id`,`taille_id`),
  KEY `Beanie_Taille_Taille_FK` (`taille_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `beanie_taille`
--

INSERT INTO `beanie_taille` (`beanie_id`, `taille_id`) VALUES
(2, 1),
(4, 1),
(3, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(1, 4),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` varchar(200) NOT NULL,
  `contact_nom` varchar(50) NOT NULL,
  `contact_sujet` varchar(50) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `matiere_id` int NOT NULL AUTO_INCREMENT,
  `matiere_nom` varchar(50) NOT NULL,
  PRIMARY KEY (`matiere_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`matiere_id`, `matiere_nom`) VALUES
(1, 'laine'),
(2, 'coton'),
(3, 'cachemire'),
(4, 'soie');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `taille_id` int NOT NULL AUTO_INCREMENT,
  `taille_nom` varchar(5) NOT NULL,
  PRIMARY KEY (`taille_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`taille_id`, `taille_nom`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `beanie_matiere`
--
ALTER TABLE `beanie_matiere`
  ADD CONSTRAINT `Bonnet_matiere_Beanie_FK` FOREIGN KEY (`beanie_id`) REFERENCES `beanie` (`beanie_id`),
  ADD CONSTRAINT `Bonnet_matiere_Matiere_FK` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`matiere_id`);

--
-- Contraintes pour la table `beanie_taille`
--
ALTER TABLE `beanie_taille`
  ADD CONSTRAINT `Beanie_Taille_Beanie_FK` FOREIGN KEY (`beanie_id`) REFERENCES `beanie` (`beanie_id`),
  ADD CONSTRAINT `Beanie_Taille_Taille_FK` FOREIGN KEY (`taille_id`) REFERENCES `taille` (`taille_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
