-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 sep. 2023 à 18:44
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
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(31, 36, 11, 2, '2023-08-14 10:18:15'),
(32, 36, 12, 3, '2023-08-14 10:18:27'),
(34, 33, 7, 1, '2023-08-14 10:31:56'),
(35, 33, 9, 1, '2023-08-14 10:32:09'),
(36, 0, 2, 5, '2023-08-14 10:53:36'),
(37, 36, 2, 3, '2023-08-14 10:54:34'),
(39, 0, 0, 1, '2023-09-18 00:36:32'),
(41, 22, 2, 1, '2023-09-28 00:36:48'),
(42, 22, 14, 3, '2023-09-28 00:36:54'),
(43, 22, 0, 1, '2023-09-28 00:36:56'),
(44, 22, 12, 3, '2023-09-28 17:26:25');

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
(1, 'parfums ', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '1691522689.jpg'),
(2, 'Makeup', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '1691522711.jpg'),
(3, 'Skin care', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '1691522735.jpg'),
(4, 'body care', 'lorem impsume nuytr verfiol qyetopm vesum ', '1691522929.jpg'),
(12, 'hair products', 'lorem lorem lorem impsum lorem\r\n', '1691522767.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, 2, 'si', 'Lorem ipsum dolor sit amet, adipiscing...', 199, '1691281713.jpg'),
(2, 1, 'berbery', 'Lorem ipsum dolor sit amet, adipiscing...', 199, '1690946462.jpg'),
(7, 3, 'scrub', 'Lorem ipsum dolor sit amet, adipiscing...', 300, '1691176078.jpg'),
(8, 2, 'lipliner', 'lorem lorem lorem lorem lorem ', 90, '1691278869.jpg'),
(9, 4, 'body wash', 'lorem lorem lorem lorem \r\n\r\n', 500, '1691281121.jpg'),
(10, 4, 'cream', 'lorem lorrem lorem ', 122, '1691283959.jpg'),
(11, 1, 'parfum', 'lorem lorem lorem lorem ', 600, '1691281826.jpg'),
(12, 3, 'hydrate ', 'lorem lorem lorem lorem ', 300, '1691281534.jpg'),
(13, 1, 'yara', 'lorem lorem lorem lorem \r\n', 288, '1691281608.jpg'),
(14, 1, 'amirat el arab', 'lorem lorem lorem lorem \r\n', 300, '1691281672.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `PRODUIT_ID` int(11) NOT NULL,
  `QUANTITE_EN_STOCK` int(11) DEFAULT NULL,
  `ALERTE_DE_STOCK_BAS` int(11) DEFAULT 10,
  `EMAIL_ENTREPRISE` varchar(100) DEFAULT 'maktabisara9@gmail.com',
  `is_read` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`PRODUIT_ID`, `QUANTITE_EN_STOCK`, `ALERTE_DE_STOCK_BAS`, `EMAIL_ENTREPRISE`, `is_read`) VALUES
(1, 200, 10, NULL, 1),
(2, 300, 10, 'berbery@gmail.com', 1),
(7, 100, 10, NULL, 1),
(8, 400, 10, 'maktabisara9@gmail.com', 1),
(9, 3, 10, 'maktabisara9@gmail.com', 0),
(10, 200, 10, 'maktabisara9@gmail.com', 0),
(11, 5, 10, 'maktabisara9@gmail.com', 0),
(12, 489, 10, 'maktabisara9@gmail.com', 0),
(13, 200, 10, 'maktabisara9@gmail.com', 0),
(14, 3, 10, 'maktabisara9@gmail.com', 0);

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
(1, 'sara', 'sara@gmail.com', '$2y$10$v8GcGSQnlQCZEG.Wn.jI5.gyuhK6rwCbJBxr.7sjdZKdTh/jEVAlC', 1, 45678),
(2, 'new', 'new@gmail.com', '$2y$10$9RwV.E/N0jBNBCkc.KVESewR10P6RU6v0wKtH0oLrymPMiXi1uS/i', 0, 345678),
(7, 'rayhana', 'rayhana@gmail.com', '$2y$10$eWecL8Jv6SajV2XSfYQn3.Lnp32ad9w2znRSLNwSkufnIYptYE476', 0, 0),
(8, 'jannat', 'jannat@gmail.com', '$2y$10$TeJ/gmbnyWFO.oKJEd/YTOsHjbtmhAoK.B30pVBl/Em71SWNklWhq', 0, 34567890),
(9, 'meryem', 'meryem@gmail.com', '$2y$10$ac5gUkY0LEkIDEPN/oHsD.sC2MwZyBu.q7jZeFQpAosAKBAx/o8ra', 0, 0),
(10, 'saida', 'saida@gmail.com', '$2y$10$IvzZCZhYGFktpdj69XIRyedMKHw.KdjZON.g82l63HjRp3f5H3/W.', 0, 0),
(14, 'ahmed', 'ahmed@gmail.com', '$2y$10$ryoxx27ksZHSQEIl1NuBQOIevfsGT5JKlJyRs.Ffti5pd1jnmvRyS', 0, 2345678),
(15, 'ghita', 'ghita@gmail.com', '$2y$10$nJSqbKTIgePokE3oHfqix.SZNCjfbNcVclExiuQPTvw0V5dRpc2Om', 0, 34567890),
(16, 'ana', 'ana@gmail.com', '$2y$10$R9YAvw43YRTOuvh3/U/ufOYw4iP8bz5L8cd.YokAhzqdhz0u.2Z3e', 0, 456789),
(17, 'test', 'test@gmail.com', '$2y$10$9rI0kvZK4qjRIG9PTV9hxubcxa2/IoIxmzer5IKItPMS5u45zCzGG', 0, 0),
(22, 'newuser', 'newuser@gmail.com', '$2y$10$MeoV9PL1iOrbBVAp5eR86.rjE5aaB80yZoWIrlQMjIdgKmlqbYKea', 0, 45676789),
(31, 'doaa', 'doaa@gmail.com', '$2y$10$pSJ5MjcBZR.37IWQVmb49esD1wJ5GQXXbx3TkgF26nnVhAOGHpDpy', 0, 3678908),
(33, 'badaoui', 'badaoui@gmail.com', '$2y$10$tlKxKkif/45Y9Q3RHQPfAuSR2wU4F0Ioooqrl4YDYrX.bL1JMcW4W', 0, 97654456),
(34, 'shopwise', 'shopwise@gmail.com', '$2y$10$EpeGj6DL.qxnGPhOjRQBWu62bZBZYULa07IFByhMjwvtX.AsxVwI6', 0, 34378548),
(35, 'xxx', 'xxx@gmail.com', '$2y$10$hYhdk5QQzFsECN1j9qIEYeYInZq6OT0rK0cx6cU2K00lU9z27Ylt2', 0, 456556),
(36, 'ss', 'ss@gmail.com', '$2y$10$Bt8uCvqpbBimI6YqCcSzt.fWA.eKuL6jzc8WUv6BzBMoa25Ir4CL.', 0, 98765434);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID_CATEGORIE`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ID_PRODUIT`),
  ADD KEY `FK_cat_produit` (`ID_CATEGORIE`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD KEY `FK_PRODUIT_STOCK` (`PRODUIT_ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID_UTILISAT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID_CATEGORIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `ID_PRODUIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID_UTILISAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_cat_produit` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categories` (`ID_CATEGORIE`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FK_PRODUIT_STOCK` FOREIGN KEY (`PRODUIT_ID`) REFERENCES `produits` (`ID_PRODUIT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
