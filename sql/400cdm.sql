-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 12 avr. 2022 à 18:31
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `400cdm`
--
CREATE DATABASE IF NOT EXISTS `400cdm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `400cdm`;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonce` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `type_annonce` varchar(25) NOT NULL,
  `type_de_cdm` varchar(25) NOT NULL,
  `titre` varchar(35) NOT NULL,
  `description` text NOT NULL,
  `code_postal` int(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `categorie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `id_membre`, `type_annonce`, `type_de_cdm`, `titre`, `description`, `code_postal`, `ville`, `adresse`, `photo`, `categorie`) VALUES
(35, 8, 'Services', 'Demande', 'Patrick', 'Test', 92600, 'Asnieres', '10 Rue Picquart', 'photos/patrick2.png', 'Bricolage'),
(39, 8, 'Prêts', 'Offre', 'Visseuse électrique', 'Mets à disposition une visseuse deviseuse électrique et rechargeable', 75012, 'Paris', 'Place des Antilles', 'photos/cadrage_01.jpg', 'Bricolage'),
(43, 11, 'Offre', 'Services', 'Aide informatique', 'Soutenance samedi', 75012, 'Paris', 'Place des Antilles', 'photos/camionnette.jpg', ''),
(58, 21, 'Biens', 'Demande', 'je donne des sous', 'je fais dons', 92150, 'asnieres', 'picquart', 'photos/charte1.png', 'Coup de main'),
(59, 0, '', 'Offre', 'Test sans var prenom', 'azazazza', 0, 'azazaz', 'azzaz', 'photos/charte6.png', 'Informatique'),
(60, 8, 'Services', 'Offre', 'Test', 'entrainement', 0, 'azaza', 'azazaz', 'photos/charte6.png', 'Sport'),
(62, 23, 'Prêts', 'Offre', 'Test requete', 'test requete', 92600, 'asnieres', 'picquart', '', 'Bricolage');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `objet` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `objet`, `nom`, `prenom`, `mail`, `message`) VALUES
(1, 'Test Objet', 'Monteiro', 'Sleyter', 'sleytermonteiro92@protonmail.com', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC'),
(2, '5', '', '', 'fgfggggggggggggggg', 'fgggggggggggggggggg'),
(3, '4', '', '', 'sleytermonteiro92@protonmail.com', 'Coucou test'),
(4, '4', '', '', 'sleytermonteiro92@protonmail.com', 'TEST'),
(5, '5', '', '', 'sleyter@gmail.com', 'TEST MSG'),
(11, 'AIde', '', '', '', ''),
(12, 'AIde', '', '', 'sleytermonteiro92@protonmail.com', 'J\'aimerai déposer une annonce');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `civilite` enum('Mr','Mme') NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0 COMMENT '0 = client\r\n1 = admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `prenom`, `nom`, `civilite`, `pseudo`, `mail`, `adresse`, `code_postal`, `ville`, `mobile`, `mdp`, `statut`) VALUES
(8, 'Sleyter', 'Monteiro', 'Mr', 'sleyter92k', 'sleytermonteiro92@protonmail.com', '10 Rue Picquart', 92600, 'Asnières-sur-Seine', 699746092, '$2y$10$IyZx6Wy1WkXarJTDz5w6GO1dodzlrFuMoIq9SCYXQfUcFjlQQgMQy', 1),
(11, 'Vince', 'GLAD', 'Mr', 'LAW-GEEK', 'gl4d1@mail.gwad', '1 rue machin', 97100, 'Gosier', 707070707, '$2y$10$CkOwUuZQRGE/2fOYBBpu6uSgNjA5GjrgxhU/E/6lVEHIHXjksybsS', 1),
(12, 'User', 'Number1', 'Mr', 'Tee-T', 'email@email.gwada', '1 rue machin', 97100, 'pap', 707070707, '$2y$10$bw5ptMmrnjEooafJD0eRQeOhWCOgw0W0oK6o/kcc38ppojSJszIEC', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
