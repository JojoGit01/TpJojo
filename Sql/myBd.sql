-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 24 juil. 2020 à 20:00
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP : 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TpJojo`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8 NOT NULL,
  `motDePasse` char(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`email`, `identifiant`, `motDePasse`) VALUES
('ae@zaeza', 'eza', '$2y$10$XkGBC0V1r8AR0JO6fQRc7uH8.pttcHmgSQGQT.C0vWLA0jlFV2fVS'),
('jo@jo', 'jojo', '$2y$10$GqvGpwQp.MXPucndY.u8OuetnuU8snGaJgvBXLA54isyVGrfYXEVW'),
('jojo@or.fr', 'azer', '$2y$10$oQY3PrvAqrIRy3/eMWqiTuvF.5NUbpRmwYjUkMkO0uNBRULEZdTry');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`email`,`identifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;