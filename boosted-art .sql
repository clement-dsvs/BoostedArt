-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 09 jan. 2021 à 14:35
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
  `bio` text,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_rank` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
