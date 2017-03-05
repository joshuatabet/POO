-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Mars 2017 à 20:15
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rpg`
--

-- --------------------------------------------------------

--
-- Structure de la table `character_`
--

CREATE TABLE `character_` (
  `id_character` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `life` int(11) NOT NULL,
  `def` int(11) NOT NULL,
  `atk` int(11) NOT NULL,
  `magic` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `monster` tinyint(1) DEFAULT NULL,
  `hero` tinyint(1) DEFAULT NULL,
  `variation_atk` int(11) DEFAULT NULL,
  `variation_def` int(11) DEFAULT NULL,
  `variation_magic` int(11) DEFAULT NULL,
  `variation_speed` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `character_`
--

INSERT INTO `character_` (`id_character`, `name`, `life`, `def`, `atk`, `magic`, `speed`, `monster`, `hero`, `variation_atk`, `variation_def`, `variation_magic`, `variation_speed`) VALUES
(3, 'Goblin', 100, 50, 100, 100, 100, 1, 0, NULL, NULL, NULL, NULL),
(5, 'AAAA', 1000, 4, 4, 4, 4, 1, 0, NULL, NULL, NULL, NULL),
(9, 'Mage', 100, 50, 50, 50, 50, 0, 1, 20, 20, 20, 20),
(8, 'Paladin', 100, 50, 50, 50, 50, 0, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `chest`
--

CREATE TABLE `chest` (
  `id_chest` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `life` int(11) DEFAULT NULL,
  `def` int(11) DEFAULT NULL,
  `atk` int(11) DEFAULT NULL,
  `magic` int(11) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `gold` int(11) DEFAULT NULL,
  `variation_life` int(11) DEFAULT NULL,
  `variation_def` int(11) DEFAULT NULL,
  `variation_atk` int(11) DEFAULT NULL,
  `variation_magic` int(11) DEFAULT NULL,
  `variation_speed` int(11) DEFAULT NULL,
  `variation_gold` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `chest`
--

INSERT INTO `chest` (`id_chest`, `name`, `life`, `def`, `atk`, `magic`, `speed`, `gold`, `variation_life`, `variation_def`, `variation_atk`, `variation_magic`, `variation_speed`, `variation_gold`) VALUES
(2, 'Arme', 0, 0, 50, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Bouclier', 0, 50, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Potion', 50, 0, 0, 0, 0, 0, 25, 0, 0, 0, 0, 0),
(5, 'Gold', 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 50);

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `nb_chest` int(11) DEFAULT NULL,
  `nb_monster` int(11) DEFAULT NULL,
  `type_monster` text COLLATE utf8_bin,
  `type_chest` text COLLATE utf8_bin,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `level`
--

INSERT INTO `level` (`id_level`, `name`, `nb_chest`, `nb_monster`, `type_monster`, `type_chest`, `position`) VALUES
(12, 'test', 10, 0, '', '2,3,4,5', 2),
(13, 'Pont Levis', 3, 3, '3,5', '2', 3),
(14, 'Montagne', 0, 0, '', '', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `lastname` varchar(45) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(45) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `description` longtext COLLATE utf8_bin,
  `pass` text COLLATE utf8_bin NOT NULL,
  `uniqid` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `lastname`, `firstname`, `pseudo`, `email`, `description`, `pass`, `uniqid`, `admin`) VALUES
(1, 'zz', 'AAAA', 'git', 'Alex.shenouda@neuf.fr', '', 'password', '', 0),
(3, 'erer', 'qsdf', 'jojo97', 'tabet', 'igo@hotmail.fr', 'tabet', '', 0),
(5, 'ahahhaahha', 'ahaahhahaha', 'azerty', 'tabet@hotmail.fr', 'azerty', 'jsuis vraiment trop con', '', 1),
(6, 'axel', 'axel', 'igoo', 'axel@hotmail.com', 'jsuis vraiment bete', 'jsuis vraiment bete', '', NULL),
(8, 'test', 'test', 'test', 'test@test.test', 'test', 'test', '58bc6ac5c9fc6', 1),
(12, 'AAA', 'BBB', 'AAA', 'aa@aa.rer', '', 'AAA', '', 0),
(13, 'test', 'test', 'te', 'qsdfqsdfqsd@sdfgsfdg', 'sdfg', 'sdfg', '', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `character_`
--
ALTER TABLE `character_`
  ADD PRIMARY KEY (`id_character`);

--
-- Index pour la table `chest`
--
ALTER TABLE `chest`
  ADD PRIMARY KEY (`id_chest`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `character_`
--
ALTER TABLE `character_`
  MODIFY `id_character` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `chest`
--
ALTER TABLE `chest`
  MODIFY `id_chest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
