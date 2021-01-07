-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 07 jan. 2021 à 09:23
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boosted-art`
--
CREATE DATABASE IF NOT EXISTS `boosted-art` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boosted-art`;

-- --------------------------------------------------------

--
-- Structure de la table `bundle`
--

CREATE TABLE `bundle` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` float NOT NULL,
  `publication` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bundle`
--

INSERT INTO `bundle` (`id`, `link`, `title`, `description`, `id_user`, `price`, `publication`, `expiration`) VALUES
(1, 'ZTYEUWVB4AUXN', 'Collection Halo', 'Neuf ans après la sortie d\'Halo 4, la collection artistique est enfin disponible dans ce pack.', 2, 10, '2021-01-06 09:18:06', '2021-01-31 09:16:48'),
(2, 'MYJ3J7GWXQ9JL', 'Concept Arts Halo 2', '2004 a connu le lancement d\'Halo 2, 17 ans plus tard, l\'équipe ayant travaillé sur Halo met à disposition les Artworks du jeu.', 2, 10, '2021-01-07 10:02:06', '2021-01-07 10:02:06'),
(3, '3A6EM3W8W3ZFE', 'Thème Japon (Sakura)', 'Ce pack contient différents fond écrans et une musique relative au thème du Sakura Japonais.', 2, 10, '2021-01-07 10:02:40', '2021-01-07 10:02:40'),
(4, 'France - Paris', 'Bundle', 'Tiré sur la thématique Parisienne et sa réputation de Cité des lumières, ce pack réunit différentes musiques et photos prises dans la capitale Française.', 2, 10, '2021-01-07 10:07:14', '2021-01-07 10:07:14'),
(5, '7KJ5V759WBQZC', 'Boite des années 80', 'Si vous considérez que musicalement, c\'était mieux avant, ce pack est fait pour vous. Il réunit le plus grand titre des années 80 à l\'international ainsi qu\'une collection de fond d\'écrans pour embellir votre ordinateur.', 2, 10, '2021-01-07 10:07:45', '2021-01-07 10:07:45'),
(6, '5S3LGVY2ZDRMU', 'Starter Pack - Cyberpunk', 'Surfant sur le regain d\'intérêt pour le genre Cyberpunk, ce starter pack contient deux modèles de personnages ainsi qu\'une collection de véhicules non texturés pour lancer votre propre jeu. Il contient aussi un interface utilisable.', 2, 10, '2021-01-07 10:08:05', '2021-01-07 10:08:05'),
(7, 'MVJBSCQCHA3W2', '[Photoshop] Pinceaux', 'Ce pack contient plusieurs types de pinceaux (ou Brushes) pour Photoshop, venant avec des modèles colorés.', 2, 10, '2021-01-07 10:08:15', '2021-01-07 10:08:15'),
(8, 'WGLAYV57PHQP4', 'Pokemon Pixel/2D Items', 'Ce pack est fait pour les besoins d\'un créateur en herbe désirant créer un jeu Pokemon en 2D.\r\nIl contient notamment des modèles Pixel Art de Pokemons existants & des fiches pour un Pokédex', 2, 10, '2021-01-07 10:08:24', '2021-01-07 10:08:24'),
(9, '8HTQ9MGYPKZFS', 'Warcraft Site/Forum Templates', 'Ce pack contient trois types de templates à importer en CSS/HTML pour les besoins d\'un site ou d\'un forum basé sur World of Warcraft. Les trois types diffèrent par rapport aux extensions.', 2, 10, '2021-01-07 10:08:36', '2021-01-07 10:08:36'),
(10, 'BSEBKF87AZ7G8', 'Zombie Artworks', 'Ce pack contient différents Artworks et leurs licence pour en faire des éléments décoratifs.', 2, 10, '2021-01-07 10:08:48', '2021-01-07 10:08:48'),
(11, '8DZT8QLPKBGJS', '\"Saucisseum\"', 'Un pack Eco+ réservé à l\'élite de la charcuterie.', 2, 0.01, '2021-01-07 10:09:22', '2021-01-07 10:09:22');

-- --------------------------------------------------------

--
-- Structure de la table `commentaries`
--

CREATE TABLE `commentaries` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bundle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `id_bundle` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `id_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bundle` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `point_of_interest`
--

CREATE TABLE `point_of_interest` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `rank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rank`
--

INSERT INTO `rank` (`id`, `rank`) VALUES
(1, 'user'),
(2, 'artist');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` text,
  `id_rank` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `phone`, `password`, `creation`, `bio`, `id_rank`) VALUES
(2, 'Clement Desavis', 'clement@test.com', '0123456789', '$2y$10$lPOYcOISahIssQAR1J30t.bKt6LNRNKn2yVJwzjVpx/sTyLarrrnu', '2021-01-05 13:15:33', NULL, 1),
(3, 'Pierre', 'pierre@cailloux.com', '0123456789', '$2y$10$7z7gLrcWpgIhgVqOrCe6DudRWDbq/jWdr/sfOVkWdXKR4vErdrZ7S', '2021-01-06 08:41:08', NULL, 1);
(4, 'Francky Vincent', 'francky.vincent@hotmail.fr', '0123456789', '$2y$10$riNF.akoFscM8SWQuaTR8OQko.pYRsMvprNtjNZRsK7o.soY9RsQ6', '2021-01-07 12:17:35', 'Francky Vincent, de son vrai nom Franck Joseph Vincent, né le 18 avril 1956 à Pointe-à-Pitre, est un producteur de musique et auteur-compositeur-interprète français.\r\n\r\nInterprète de plus de 170 chansons, il est également manager de zouk, acteur et éditeur. Interprète de plusieurs tubes depuis les années 1990 (Fruit de la passion et Alice ça glisse en 1991 ou encore Tu veux mon zizi en 2004), connu pour son répertoire comique et volontiers grivois, il est l\'un des chanteurs antillais les plus célèbres en métropole où il a vendu environ 3 millions d\'albums.', 2),
(5, 'Patrick Sebastien', 'patrick.sebastien@wanadoo.fr', '0123456789', '$2y$10$rovatJb/NC39TVkZRSBTm.gtty6Pjm3l.A2Zq2Piy.zZMPI0ffRBe', '2021-01-07 12:19:47', 'Patrick Sébastien, né le 14 novembre 1953 à Brive-la-Gaillarde, est un imitateur, humoriste, acteur, réalisateur, chanteur, auteur-compositeur, poète, écrivain, producteur-animateur d\'émissions de divertissement de télévision française et ex-dirigeant de club de rugby.\r\n\r\nIl est aussi l\'auteur-interprète de chansons à thème festif ; parmi les plus célèbres, figurent les titres Le Gambadou, La Fiesta (générique de l\'émission Fiesta), Le Petit Bonhomme en mousse, C\'est chaud, Pourvu que ça dure, Les Sardines, Ah… Si tu pouvais fermer ta gueule..., Tournez les serviettes ou encore Joyeux anniversaire. ', 2),
(6, 'Yannick Noak', 'yanick.noah@live.fr', '0123456789', '$2y$10$wiufBXA/rfdnZ5RyKxLIDOZXjXrv4YlUrTgkadWyQwUrckieTxRUi', '2021-01-07 12:20:26', 'Yannick Noah, né le 18 mai 1960 à Sedan dans les Ardennes, est un joueur et capitaine de tennis, ainsi qu\'un chanteur français.\r\n\r\nIl débute dès 1991 une carrière de chanteur, à laquelle il se consacre à temps plein, avec succès, depuis 1998, avec une pause de 2015 à 2018 lorsqu\'il reprend le capitanat de l\'équipe de France de Coupe Davis et de Fed Cup. Fils du footballeur camerounais Zacharie Noah, il est le père du basketteur français Joakim Noah. ', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bundle`
--
ALTER TABLE `bundle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commentaries`
--
ALTER TABLE `commentaries`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `point_of_interest`
--
ALTER TABLE `point_of_interest`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rank` (`id_rank`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bundle`
--
ALTER TABLE `bundle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `commentaries`
--
ALTER TABLE `commentaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `point_of_interest`
--
ALTER TABLE `point_of_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bundle`
--
ALTER TABLE `bundle`
  ADD CONSTRAINT `bundle_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rank`) REFERENCES `rank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
