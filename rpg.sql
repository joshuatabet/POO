-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Mars 2017 à 17:16
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

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
  `hero` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `character_`
--

INSERT INTO `character_` (`id_character`, `name`, `life`, `def`, `atk`, `magic`, `speed`, `monster`, `hero`) VALUES
(3, 'Goblin', 100, 100, 100, 100, 100, 1, 0),
(5, 'AAAA', 1000, 4, 4, 4, 4, 1, 0),
(6, 'Mage', 100, 5, 5, 100, 10, 0, 1);

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
  `gold` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `chest`
--

INSERT INTO `chest` (`id_chest`, `name`, `life`, `def`, `atk`, `magic`, `speed`, `gold`) VALUES
(2, 'Arme', 0, 0, 50, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `vie` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `vitesse` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `magie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `heros`
--

INSERT INTO `heros` (`id`, `nom`, `vie`, `defense`, `vitesse`, `attaque`, `magie`) VALUES
(1, 'Guerrier', 100, 50, 50, 50, 0),
(2, 'Magicien', 100, 50, 50, 0, 50),
(3, 'Paladin', 100, 20, 50, 40, 40),
(4, 'Goblin', 30, 15, 75, 15, 0),
(5, 'Magicien noir', 50, 25, 51, 0, 25),
(6, 'Dragon', 70, 35, 25, 35, 0);

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
(12, 'test', 2, 5, '3,5', '2', 1),
(13, 'Pont Levis', 0, 0, '', '', 2),
(14, 'Montagne', 0, 0, '', '', 3);

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

CREATE TABLE `monstre` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) COLLATE utf8_bin NOT NULL,
  `vie` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `vitesse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(8, 'test', 'test', 'test', 'test@test.test', 'test', 'test', '58b9912f5a570', 1),
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
-- Index pour la table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Index pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_character` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `chest`
--
ALTER TABLE `chest`
  MODIFY `id_chest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `monstre`
--
ALTER TABLE `monstre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
