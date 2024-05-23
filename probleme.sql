-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : 75.119.138.111:3306
-- Généré le : jeu. 23 mai 2024 à 02:59
-- Version du serveur :  8.0.36-0ubuntu0.20.04.1
-- Version de PHP : 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `probleme`
--

CREATE TABLE `probleme` (
  `id` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `userId` int NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `probleme`
--

INSERT INTO `probleme` (`id`, `photo`, `categorie`, `description`, `statut`, `userId`, `create_date`) VALUES
(1, 'uploads/pictures/6a5aa940-45ee-4dc1-8921-79546e8e3291.jpeg', 'AZERTY', 'je suis lycoris', 'En attente', 1, '2024-05-18 00:15:25'),
(3, 'uploads/pictures/9c0f7ff2-7a5e-46df-a0e6-e1dcf7083e46441838709846004003.jpg', 'Maçonnerie', 'Quaaaaa', 'En attente', 1, '2024-05-18 05:25:13'),
(4, 'uploads/pictures/90f3a213-790b-49e5-a7f0-8f46b157fd575603118158478209412.jpg', 'Plomberie', 'je suis un fan d\'anime, help me', 'En attente', 1, '2024-05-18 05:34:54'),
(5, 'uploads/pictures/99b534c6-1f44-4b69-b6c5-835920248cef413489739290919043.jpg', 'Menuserie', 'hello', 'En attente', 1, '2024-05-18 05:50:13'),
(6, 'uploads/pictures/4e1d81a1-bc04-49a7-9005-047636e30b01411777214515517256.jpg', 'Electricité', 'saaaaaaaa', 'En attente', 5, '2024-05-18 06:27:57'),
(7, 'uploads/pictures/63b78b07-94c9-468f-a401-75cb3b3939d43854436414803616438.jpg', 'Menuserie', 'azertyuipnbxhj azertyuo', 'En attente', 5, '2024-05-18 06:35:42');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `probleme`
--
ALTER TABLE `probleme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `probleme`
--
ALTER TABLE `probleme`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
