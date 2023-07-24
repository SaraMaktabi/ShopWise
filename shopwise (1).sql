-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juil. 2023 à 15:32
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shopwise`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID_CATEGORIE` int(11) NOT NULL,
  `NOM_CAT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_UTILISAT` int(11) NOT NULL,
  `DATE_DE_COMMANDE` date DEFAULT NULL,
  `STATUT` varchar(100) DEFAULT NULL,
  `MONTANT_TOTAL` decimal(10,3) DEFAULT NULL,
  `ADDRESSE_DE_LIVR` varchar(255) DEFAULT NULL,
  `METHODE_DE_PAIEMENT_` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID_PRODUIT` int(11) NOT NULL,
  `ID_CATEGORIE` int(11) NOT NULL,
  `NOM_P` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(500) DEFAULT NULL,
  `PRIX` float DEFAULT NULL,
  `IMAGE` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

CREATE TABLE `produit_commande` (
  `ID_PRODUIT` int(11) NOT NULL,
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_PM` int(11) NOT NULL,
  `QUANTITE` int(11) DEFAULT NULL,
  `PRIX_UNITAIRE` decimal(10,3) DEFAULT NULL,
  `MONTANT_TOTAL` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `PRODUIT_ID` int(11) NOT NULL,
  `QUANTITE_EN_STOCK` int(11) DEFAULT NULL,
  `ALERTE_DE_STOCK_BAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID_UTILISAT` int(11) NOT NULL,
  `NOM` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `MOTDEPASSE` varchar(100) DEFAULT NULL,
  `ROLE` varchar(100) DEFAULT 'client',
  `ADRESSE` varchar(255) DEFAULT NULL,
  `TELEPHONE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_UTILISAT`, `NOM`, `EMAIL`, `MOTDEPASSE`, `ROLE`, `ADRESSE`, `TELEPHONE`) VALUES
(0, 'saramak', 'Saramaktabi99@gmail.com', '$2y$10$9yW7CkD0yV1JU8Q7geGn3ezor55HdFUCe4N0i/lj9jiN5MHD25LEm', 'user', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CATEGORIE`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`ID_COMMANDE`),
  ADD KEY `FK_EFFECTUE` (`ID_UTILISAT`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID_PRODUIT`),
  ADD KEY `FK_CATEGORISE_PAR` (`ID_CATEGORIE`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`ID_PM`),
  ADD KEY `FK_ASSOCIE_A` (`ID_COMMANDE`),
  ADD KEY `FK_RELATIF_A` (`ID_PRODUIT`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`PRODUIT_ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_UTILISAT`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_EFFECTUE` FOREIGN KEY (`ID_UTILISAT`) REFERENCES `utilisateurs` (`ID_UTILISAT`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_CATEGORISE_PAR` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categories` (`ID_CATEGORIE`);

--
-- Contraintes pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD CONSTRAINT `FK_ASSOCIE_A` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commandes` (`ID_COMMANDE`),
  ADD CONSTRAINT `FK_RELATIF_A` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `produits` (`ID_PRODUIT`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`PRODUIT_ID`) REFERENCES `produits` (`ID_PRODUIT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
