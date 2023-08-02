-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 août 2023 à 23:05
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
  `name` varchar(100) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `image_cat` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID_CATEGORIE`, `name`, `description`, `image_cat`) VALUES
(1, 'parfums', 'lorem impsum hrii hcbruom nnfhe jbyrok, nahrois heusylo', '1690809582.jpg'),
(2, 'Makeup', 'lorem impsum seypli nuroser qeuty.', '1690810653.jpg'),
(3, 'Skin care', 'lorem impsum nalopm serihyni vardenom', '1690810939.jpg'),
(4, 'body care', 'lorem impsume nuytr verfiol qyetopm vesum ', '1690810973.jpg'),
(5, 'hair products', 'lorem pruti impsum deybi seloji qyueri azertt', '1690811100.jpg'),
(6, 'nails products', 'lorem oompaqs dehujil cdbhuesio moescrp ', '1690811865.jpg'),
(7, 'test', 'lorem impsum lorem impsum  lorem impsum  lorem impsum', '1690917232.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `ID_COMMANDE` int(11) NOT NULL,
  `DATE_DE_COMMANDE` date DEFAULT NULL,
  `STATUT` varchar(100) DEFAULT NULL,
  `MONTANT_TOTAL` decimal(10,3) DEFAULT NULL,
  `ADDRESSE_DE_LIVR` varchar(255) DEFAULT NULL,
  `METHODE_DE_PAIEMENT_` varchar(100) DEFAULT NULL,
  `ID_UTILISAT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ID_PRODUIT` int(11) NOT NULL,
  `ID_CATEGORIE` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image_p` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`ID_PRODUIT`, `ID_CATEGORIE`, `name`, `description`, `price`, `image_p`) VALUES
(0, 2, 'mascara', 'lorem impsum lorem impsum lorem impsum ', 199, '1690922419.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

CREATE TABLE `produit_commande` (
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
  `NOM` varchar(100) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `MOTDEPASSE` varchar(100) DEFAULT NULL,
  `ROLE` tinyint(4) NOT NULL DEFAULT 0,
  `TELEPHONE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID_UTILISAT`, `NOM`, `EMAIL`, `MOTDEPASSE`, `ROLE`, `TELEPHONE`) VALUES
(1, 'sara', 'sara@gmail.com', '$2y$10$v8GcGSQnlQCZEG.Wn.jI5.gyuhK6rwCbJBxr.7sjdZKdTh/jEVAlC', 0, 45678),
(2, 'new', 'new@gmail.com', '$2y$10$9RwV.E/N0jBNBCkc.KVESewR10P6RU6v0wKtH0oLrymPMiXi1uS/i', 0, 345678),
(3, 'maktabi', 'maktabi@gmail.com', '$2y$10$Bv7cUbdlAtOOiiLhoAMSaOtMXrrTXY9JqFBpvn9oumISxkDbCH6Tu', 0, 23457890),
(4, 'maktabi', 'maktabi@gmail.com', '$2y$10$enwXilWaMIomnX4n2gDX.Or8BfDYdNvQxkxxz9E365pax6PGafoOG', 0, 23457890),
(5, 'maktabi', 'maktabi@gmail.com', '$2y$10$g5OPwQpI1Nz1pDPmDe9IpuZQO2.muEoBQps7OEmS8kT4X9I8DQBRe', 0, 23457890),
(6, 'maktabi', 'maktabi@gmail.com', '$2y$10$SoGBZ6mQf3OelXiEUteYP.DYj92VwLjYEXiHPVN5TK/S3zuYG3K8m', 0, 0),
(7, 'rayhana', 'rayhana@gmail.com', '$2y$10$eWecL8Jv6SajV2XSfYQn3.Lnp32ad9w2znRSLNwSkufnIYptYE476', 0, 0),
(8, 'jannat', 'jannat@gmail.com', '$2y$10$TeJ/gmbnyWFO.oKJEd/YTOsHjbtmhAoK.B30pVBl/Em71SWNklWhq', 0, 34567890),
(9, 'meryem', 'meryem@gmail.com', '$2y$10$ac5gUkY0LEkIDEPN/oHsD.sC2MwZyBu.q7jZeFQpAosAKBAx/o8ra', 0, 0),
(10, 'saida', 'saida@gmail.com', '$2y$10$IvzZCZhYGFktpdj69XIRyedMKHw.KdjZON.g82l63HjRp3f5H3/W.', 0, 0),
(11, '', '', '$2y$10$vuh4f2u5NCXp4M/8.0Y87e11smLSYz8uZcYqkJBkL02zOyIKkNpr2', 0, 0),
(12, '', '', '$2y$10$Gk9cZvzrwxGLk8IfoHvrFu6wpXQ5jBKSoWdn7sC5EOMQvT23wvLh6', 0, 0),
(13, '', '', '$2y$10$FoLjf.iFgFY2JM4xoTRnWu1ApJutRrk8nq9q/R1jvmRhmkUU30O2i', 0, 0),
(14, 'ahmed', 'ahmed@gmail.com', '$2y$10$ryoxx27ksZHSQEIl1NuBQOIevfsGT5JKlJyRs.Ffti5pd1jnmvRyS', 0, 2345678),
(15, 'ghita', 'ghita@gmail.com', '$2y$10$nJSqbKTIgePokE3oHfqix.SZNCjfbNcVclExiuQPTvw0V5dRpc2Om', 0, 34567890),
(16, 'ana', 'ana@gmail.com', '$2y$10$R9YAvw43YRTOuvh3/U/ufOYw4iP8bz5L8cd.YokAhzqdhz0u.2Z3e', 0, 456789),
(17, 'test', 'test@gmail.com', '$2y$10$9rI0kvZK4qjRIG9PTV9hxubcxa2/IoIxmzer5IKItPMS5u45zCzGG', 0, 0),
(18, '', 'testing@gmail.com', '$2y$10$vrX/7cp4ujOnA/ip43DBDuw7Pk9MFj7CvO/BP0xoeiLHvtff3n5Cq', 0, 45678),
(19, 'a', 'a@gmail.com', '$2y$10$jGdKCuDa5maL3NVyQz2cv.kZROQj7Ij51hTvZUjo.Vx0ihLLRRP6q', 0, 456789),
(20, 'b', 'a@gmail.com', '$2y$10$5w1QuO1uYOu800i4w6Osm.YWmVZhRNf/yMB.KvU3C/CGH2.A2/zNu', 0, 56789);

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
  ADD KEY `FK_cat_produit` (`ID_CATEGORIE`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`ID_PM`),
  ADD KEY `FK_ASSOCIE_A` (`ID_COMMANDE`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_UTILISAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `FK_cat_produit` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categories` (`ID_CATEGORIE`);

--
-- Contraintes pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD CONSTRAINT `FK_ASSOCIE_A` FOREIGN KEY (`ID_COMMANDE`) REFERENCES `commandes` (`ID_COMMANDE`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`PRODUIT_ID`) REFERENCES `produits` (`ID_PRODUIT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
