-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 jan. 2024 à 12:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wiki`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `create_at`, `edit_at`) VALUES
(35, 'GGGGG', '2024-01-12 10:39:25', NULL),
(36, 'yy', '2024-01-12 10:39:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(6, 'test5'),
(7, 'sdssdssdds'),
(8, 'sdsdsdsdsds<d'),
(9, 'aaaaa');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` enum('author','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'Mouhcine', 'Essafi', 'mouhcine@gmail.com', '$2y$10$M6vbTfTX4mt6cnvR.qt3SOHtjVpwlFW8ELQFazTsTM3.Hd.sbl76C', 'author'),
(2, 'Mouhcine', 'Essafi', 'user2@gmail.com', '$2y$10$tPlXnpG4I/EJIHooHLga5e/9lqucU2bQkx9gSx/IADiE/HRG8CtMa', 'author'),
(3, 'Mouhcine', 'Essafi', 'user3@gmail.com', '$2y$10$lHtpvkr2lap5OV/cw8.WB.kSJfic4xR9BZtRVeDngttgtjoz/s7Vq', 'author'),
(4, 'naoufal', 'nl', 'nl@gmail.com', '$2y$10$25l/77PWPaGDIBEQK1PyaOnwjfbxJDg2QU0geNUqKybR441Wrka.u', 'author');

-- --------------------------------------------------------

--
-- Structure de la table `wikis`
--

CREATE TABLE `wikis` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `edit_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('published','archived') NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wikis`
--

INSERT INTO `wikis` (`id`, `title`, `content`, `create_at`, `edit_at`, `status`, `id_user`, `id_category`, `img`) VALUES
(2, 'hhhhhhhhhhhh', 'hhhhhhhhhhhhhh', '2024-01-12 15:13:19', NULL, 'published', 1, 35, 'logo.png'),
(3, 'hhhhhhhhhhhh', 'hhhhhhhhhhhhhh', '2024-01-12 15:15:38', NULL, 'published', 1, 35, 'logo.png'),
(4, 'hhhhhhhhhhhh', 'hhhhhhhhhhhhhh', '2024-01-12 15:16:45', NULL, 'published', 1, 35, 'logo.png'),
(5, 'test2', 'HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', '2024-01-12 21:00:03', '2024-01-12 21:00:03', 'published', 1, 36, 'wallpaperflare.com_wallpaper.jpg'),
(6, 'aaaaaaaaaa', 'aaaaaaaaaaaa', '2024-01-13 12:42:24', '2024-01-13 12:42:24', 'published', 1, 35, 'wallpaperflare.com_wallpaper.jpg'),
(7, 'aaaaaaaaaa', 'aaaaaaaaaaaa', '2024-01-13 12:59:22', '2024-01-13 12:59:22', 'published', 1, 35, 'wallpaperflare.com_wallpaper.jpg'),
(8, 'test4', 'hhhhhhhhhh', '2024-01-13 12:59:54', '2024-01-13 12:59:54', 'published', 1, 36, 'logo.png'),
(9, 'aaaa', 'aaaaaaaaaaa', '2024-01-13 13:14:22', '2024-01-13 13:14:22', 'published', 1, 36, 'logo.png'),
(10, 'test89', 'aaaaaaa', '2024-01-13 13:18:06', '2024-01-13 13:18:06', 'published', 1, 36, 'logo.png'),
(11, 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzzzz', '2024-01-13 13:32:09', '2024-01-13 13:32:09', 'published', 1, 35, 'logo.png'),
(12, 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzzzz', '2024-01-13 13:34:33', '2024-01-13 13:34:33', 'published', 1, 35, 'logo.png'),
(13, 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzzzz', '2024-01-13 13:36:09', '2024-01-13 13:36:09', 'published', 1, 35, 'logo.png'),
(14, 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzzzz', '2024-01-13 16:22:54', '2024-01-13 16:22:54', 'published', 1, 35, 'logo.png');

-- --------------------------------------------------------

--
-- Structure de la table `wikis_tags`
--

CREATE TABLE `wikis_tags` (
  `id_wiki` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `wikis_tags`
--

INSERT INTO `wikis_tags` (`id_wiki`, `id_tag`) VALUES
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 9),
(11, 7),
(12, 7),
(13, 7),
(14, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_1` (`id_user`),
  ADD KEY `FK_2` (`id_category`);

--
-- Index pour la table `wikis_tags`
--
ALTER TABLE `wikis_tags`
  ADD KEY `FK_1` (`id_wiki`),
  ADD KEY `FK_2` (`id_tag`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `wikis`
--
ALTER TABLE `wikis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `wikis`
--
ALTER TABLE `wikis`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `wikis_tags`
--
ALTER TABLE `wikis_tags`
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`id_wiki`) REFERENCES `wikis` (`id`),
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
