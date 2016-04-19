-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 19 Avril 2016 à 21:02
-- Version du serveur :  5.6.29-1~dotdeb+7.1
-- Version de PHP :  5.6.20-1~dotdeb+zts+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
  `meid` int(10) unsigned NOT NULL,
  `metype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mepage` int(10) unsigned NOT NULL,
  `meslug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `metime` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `paid` int(10) unsigned NOT NULL,
  `paslug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `padesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pakeys` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pacontent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `paparent` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pastatut` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `patime` int(10) unsigned NOT NULL,
  `paroot` int(11) NOT NULL DEFAULT '0',
  `paorder` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`paid`, `paslug`, `patitle`, `patype`, `padesc`, `pakeys`, `pacontent`, `paparent`, `pastatut`, `patime`, `paroot`, `paorder`) VALUES
(1, 'home', 'Accueil', 'page', 'Hello, it''s my home page', 'home, page', 'Hello world !', 0, 1, 1461097120, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ufname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `umail` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `upseudo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `urang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`meid`),
  ADD UNIQUE KEY `meslug` (`meslug`),
  ADD KEY `meToTy` (`metype`),
  ADD KEY `meToPa` (`mepage`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`paid`),
  ADD KEY `patype` (`patype`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `umail` (`umail`),
  ADD KEY `urang` (`urang`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `meid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `paid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
