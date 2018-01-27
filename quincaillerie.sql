-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 jan. 2018 à 19:31
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quincaillerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenoms`, `email`, `mdp`) VALUES
(1, 'SYLLA', 'Masseni Coulibaly', 'massenicoolsylla@gmail.com', '3c31c4b82b302800e5c035225c51f6ba');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `image`, `description`, `prix`, `stock`, `id_categories`, `id_admin`) VALUES
(1, 'Pinceaux', ',.jpg', 'Pour la peinture', 500, 50, 3, 1),
(2, ' CÃ¢ble-fils', 'cables-fils-gaines.jpg', 'Pour l\'electricitÃ©', 1500, 200, 2, 1),
(3, 'Mutiprises', 'b.jpg', 'Pour l\'electricitÃ©', 2500, 15, 2, 1),
(4, 'Ampoule', 'eclairage_1.jpg', 'Eclairage', 1500, 20, 2, 1),
(5, 'Pompe', 'index.jpg', 'Pour la plomberie', 2000, 10, 1, 1),
(6, 'Perceuse', 'o.jpg', 'UtilisÃ© pour percer des trous ', 5000, 5, 4, 1),
(7, 'Pelle', 'm.jpg', 'Pelle pour nettoyer le chantier', 2000, 15, 4, 1),
(8, 'Testeur', 'tournevis-testeur-2.jpg', 'Tournevis servant Ã  tester le courant', 1000, 20, 2, 1),
(9, 'Pince', 'cable-connectique-reseaux_1.jpg', 'Pince Ã  sertir', 4500, 5, 2, 1),
(10, 'Prise', 'g.jpg', 'Electrique', 1000, 50, 2, 1),
(11, 'Scie', 'cables-fils-gainesc.jpg', 'Scie', 3000, 4, 5, 1),
(12, 'RJ45', 'A.jpg', 'Connecteur utilisÃ© pour le cÃ¢blage rÃ©seau', 150, 200, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `description`, `id_users`) VALUES
(1, 'beaux articles', 0),
(2, 'beaux articles', 0),
(3, 'Bonjour', 2),
(4, 'Je suis Masseni', 1),
(5, 'Beaux articles Ã  moindres coÃ»t, satisfaite', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `description`) VALUES
(1, 'Plomberie', 'MatÃ©riel utilisÃ© dans la plomberie'),
(2, 'ElectricitÃ©', 'CatÃ©gorie des matÃ©riaux Ã©lectriques'),
(3, 'Peinture', 'CatÃ©gorie des matÃ©riaux de peinture'),
(4, 'MaÃ§onnerie', 'Pour les materiaux de contruction'),
(5, 'Menuisierie', ' UtilisÃ© pour le bois');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `datecommande` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_articles`, `id_users`, `quantite`, `total`, `datecommande`) VALUES
(1, 2, 1, 2, 3000, '27/01/2018'),
(2, 2, 1, 2, 3000, '27/01/2018');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `contact` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `v_mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenoms`, `contact`, `email`, `mdp`, `v_mdp`) VALUES
(1, 'SYLLA', 'Masseni Coulibaly', 8226806, 'massenicoolsylla@gmail.com', '3c31c4b82b302800e5c035225c51f6ba', '3c31c4b82b302800e5c035225c51f6ba'),
(2, 'FOFANA', 'Assana', 87634458, 'fofass220@gmail.com', '8cb67fbddb9da50ff1e63623113f617c', '8cb67fbddb9da50ff1e63623113f617c'),
(3, 'DOUMBIA', 'Assita', 47075935, 'assitadoumbia9@gmail.com', '5a1d4e0c509a8073f65e07fc3bd7974f', '5a1d4e0c509a8073f65e07fc3bd7974f'),
(4, 'sali', 'sali', 2121, 'sali', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
