-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Dim 05 Mars 2017 à 23:16
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `RPG`
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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `character_`
--

INSERT INTO `character_` (`id_character`, `name`, `life`, `def`, `atk`, `magic`, `speed`, `monster`, `hero`, `variation_atk`, `variation_def`, `variation_magic`, `variation_speed`) VALUES
(11, 'Magicien', 100, 50, 0, 50, 5, 0, 1, 0, 30, 30, 3),
(10, 'Guerrier', 100, 50, 50, 0, 6, 0, 1, 30, 30, 0, 1),
(12, 'Paladin', 100, 20, 40, 40, 6, 0, 1, 20, 20, 20, 1),
(13, 'Gobelin', 30, 15, 15, 0, 9, 1, 0, 5, 5, 0, 1),
(14, 'Magicien Noir', 50, 25, 0, 25, 5, 1, 0, 0, 5, 5, 1),
(15, 'Dragon', 70, 35, 35, 0, 3, 1, 0, 5, 5, 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `character_`
--
ALTER TABLE `character_`
  ADD PRIMARY KEY (`id_character`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `character_`
--
ALTER TABLE `character_`
  MODIFY `id_character` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;