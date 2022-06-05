-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 juin 2022 à 02:35
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `booki`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `p_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `total` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `p_id`, `user_id`, `total`) VALUES
(1, 2, 0, 0),
(2, 3, 0, 0),
(3, 2, 0, 0),
(4, 4, 0, 0),
(5, 2, 0, 0),
(6, 3, 0, 0),
(7, 4, 0, 0),
(8, 5, 0, 0),
(9, 2, 0, 0),
(10, 2, 22885555, 0),
(11, 3, 22885555, 0),
(12, 2, 22885555, 2),
(13, 3, 22885555, 2),
(14, 2, 22885555, 65),
(15, 3, 22885555, 65);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `image`, `price`) VALUES
(1, 'Best friends', 'kids', '../books/bff.jpg', 20),
(2, 'bridgerton ', 'romance', '../books/bridgerton.jpg', 30),
(3, 'othello', 'drama', '../books/othello.jpg', 35),
(4, 'Persuasion', 'romance', '../books/persuasion.jpg', 26),
(5, 'it', 'horror', '../books/it.jpg', 35),
(6, 'Elon Musk', 'biography', '../books/elon.jpg', 35),
(7, 'Pet Sematary', 'horror', '../books/pet_sematary.jpg', 28),
(8, 'Shadow and Bone', 'fiction', '../books/shadow&bone.jpg', 33),
(9, 'Steve Jobs', 'biography', '../books/steve_jobs.jpg', 28),
(10, 'Harry Potter 1', 'fiction ', '../books/harry1.jpg', 40),
(11, 'Arnold Schwarzenegge', 'biography', '../books/arnold.jpg', 30),
(12, 'Robinson Crusoé', 'adventure', '../books/robin.jpg', 25),
(13, 'Hunger Games', 'action', '../books/hg.jpg', 30);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'rania', 'ranya@gmail.com', 'rania'),
(1841989, 'fa', 'fa', 'fa'),
(22885555, 'aa', 'aa', 'aa'),
(663859004, 'aa', 'aa', 'aa'),
(2147483647, 'cc', 'cc', 'cc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
