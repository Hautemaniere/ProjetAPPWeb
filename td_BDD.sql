-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 avr. 2023 à 16:42
-- Version du serveur : 10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `td_BDD`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `mot_de_passe`) VALUES
(2, 'HAUTEMANIERE', 'Edouard', 'root'),
(5, 'langlace', 'julien', 'root'),
(9, 'Lopez', 'Damiens', 'quoicoubeh'),
(10, 'Bouteille', 'Fost1', 'tetedemort'),
(17, 'HURTEL', 'Joris', 'joris'),
(18, 'Tabary', 'Hugo', 'root'),
(23, 'bilbil', 'théo', 'passoire'),
(24, 'bilbil', 'théo', 'passoire'),
(25, 'bilbil', 'théo', 'passoire'),
(26, 'bilbil', 'théo', 'passoire');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `idpcloc` int(30) NOT NULL,
  `dateheure` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `idclient`, `idpcloc`, `dateheure`) VALUES
(47, 2, 2, '2023-04-12'),
(48, 18, 1, '2023-04-05');

-- --------------------------------------------------------

--
-- Structure de la table `pcloc`
--

CREATE TABLE `pcloc` (
  `id` int(11) NOT NULL,
  `Marque` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pcloc`
--

INSERT INTO `pcloc` (`id`, `Marque`, `Model`) VALUES
(1, 'Pack', 'Bronze'),
(2, 'Pack', 'Diamant'),
(3, 'Pack', 'Obsidienne');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idclient` (`idclient`),
  ADD KEY `idpcloc` (`idpcloc`),
  ADD KEY `idpcloc_2` (`idpcloc`),
  ADD KEY `idclient_2` (`idclient`),
  ADD KEY `idclient_3` (`idclient`);

--
-- Index pour la table `pcloc`
--
ALTER TABLE `pcloc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `pcloc`
--
ALTER TABLE `pcloc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`idpcloc`) REFERENCES `pcloc` (`id`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`idclient`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
