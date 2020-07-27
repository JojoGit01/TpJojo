-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 27 juil. 2020 à 21:36
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
-- Structure de la table `carteRestaurant`
--

CREATE TABLE `carteRestaurant` (
  `numRestaurant` int(11) NOT NULL,
  `nameRestaurant` varchar(500) NOT NULL,
  `nameMenu` varchar(500) NOT NULL,
  `composition` text NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carteRestaurant`
--

INSERT INTO `carteRestaurant` (`numRestaurant`, `nameRestaurant`, `nameMenu`, `composition`, `price`) VALUES
(1, 'Monsieur Albert', 'Menu Double', 'Double cheese + saucisse XXL 150g', 15.9),
(1, 'Monsieur Albert', 'Menu Enfant', 'HOT-DOG KETCHUP MAYO + CHIPS + SODA', 8.5),
(1, 'Monsieur Albert', 'Menu Simple', 'HOT-DOG, Accompagnement, Boisson', 12.9);

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

-- --------------------------------------------------------

--
-- Structure de la table `otherRestaurant`
--

CREATE TABLE `otherRestaurant` (
  `numRestaurant` int(11) NOT NULL,
  `nameRestaurant` varchar(500) NOT NULL,
  `nameO` varchar(500) NOT NULL,
  `optionOther` enum('entrée','plat','desert','boisson') NOT NULL,
  `composition` text DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `otherRestaurant`
--

INSERT INTO `otherRestaurant` (`numRestaurant`, `nameRestaurant`, `nameO`, `optionOther`, `composition`, `price`) VALUES
(1, 'Monsieur Albert', 'Monsieur Barack', 'plat', 'Pain classique, saucisse au choix, mature cheddar, ketchup & moutarde', 6.9),
(1, 'Monsieur Albert', 'Monsieur Ernesto', 'plat', 'Pain sésame, saucisse au choix, mature cheddar, guacamole & jalapenos', 6.9),
(1, 'Monsieur Albert', 'Monsieur Silvio', 'plat', 'Pain classique, saucisse au choix, mozzarella fraîche, tomates cerises, roquette & basilic frais', 6.9),
(1, 'Monsieur Albert', 'Muffins', 'desert', 'Cacao fourré & choco noisette', 3),
(1, 'Monsieur Albert', 'Frites fraiches', 'entrée', NULL, 3.5),
(1, 'Monsieur Albert', 'Nachos', 'entrée', 'Cheddar & guacamole', 4),
(1, 'Monsieur Albert', 'La P\'tite salade', 'entrée', 'Roquette du pays, tomates cerises & huile d\'olive', 2.9),
(1, 'Monsieur Albert', 'Le moelleux', 'desert', 'Moelleux chocolat', 3),
(1, 'Monsieur Albert', 'Donuts', 'desert', 'Chocolate Gravity', 3.5);

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE `restaurants` (
  `numRestaurant` int(11) NOT NULL,
  `nameRestaurant` varchar(500) NOT NULL,
  `image` text DEFAULT NULL,
  `avis` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `restaurants`
--

INSERT INTO `restaurants` (`numRestaurant`, `nameRestaurant`, `image`, `avis`) VALUES
(1, 'Monsieur Albert', 'Img/ImageRestaurants/Albert-place-massena.jpg', 5),
(2, 'The Cheese Steak City', 'Img/ImageRestaurants/theCheeseSteakCity.jpg', 5),
(3, 'NOT DOG', 'Img/ImageRestaurants/not-dog.jpg', 5),
(4, 'Le Québec', 'Img/ImageRestaurants/leQuebec.jpg', 5),
(5, 'Attimi', 'Img/ImageRestaurants/attimi.jpg', 5),
(6, 'La Pizza Cresci', 'Img/ImageRestaurants/LaPizzaCresci.png', 5),
(7, 'McDonald\'s', 'Img/ImageRestaurants/McDonald.JPG', 5),
(8, 'Burger King', 'Img/ImageRestaurants/burger-king.jpg', 5),
(9, 'Planet Sushi', 'Img/ImageRestaurants/planetSuhsi.webp', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carteRestaurant`
--
ALTER TABLE `carteRestaurant`
  ADD PRIMARY KEY (`nameMenu`),
  ADD KEY `numRestaurant` (`numRestaurant`,`nameRestaurant`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`email`,`identifiant`);

--
-- Index pour la table `otherRestaurant`
--
ALTER TABLE `otherRestaurant`
  ADD KEY `numRestaurant` (`numRestaurant`,`nameRestaurant`);

--
-- Index pour la table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`numRestaurant`,`nameRestaurant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `numRestaurant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carteRestaurant`
--
ALTER TABLE `carteRestaurant`
  ADD CONSTRAINT `carteRestaurant_ibfk_1` FOREIGN KEY (`numRestaurant`,`nameRestaurant`) REFERENCES `restaurants` (`numRestaurant`, `nameRestaurant`);

--
-- Contraintes pour la table `otherRestaurant`
--
ALTER TABLE `otherRestaurant`
  ADD CONSTRAINT `otherRestaurant_ibfk_1` FOREIGN KEY (`numRestaurant`,`nameRestaurant`) REFERENCES `restaurants` (`numRestaurant`, `nameRestaurant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;