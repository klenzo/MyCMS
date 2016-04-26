-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 26 Avril 2016 à 13:36
-- Version du serveur :  5.5.47-0+deb7u1-log
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
-- Structure de la table `cms_conf`
--

CREATE TABLE `cms_conf` (
  `confid` int(10) UNSIGNED NOT NULL,
  `confslug` varchar(50) NOT NULL,
  `confcontent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_conf`
--

INSERT INTO `cms_conf` (`confid`, `confslug`, `confcontent`) VALUES
(1, 'conftemplateweb', 'default'),
(2, 'conftemplatecockpit', 'default'),
(3, 'aside_pos', 'left'),
(4, 'lang_default', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_lang`
--

CREATE TABLE `cms_lang` (
  `langid` int(11) NOT NULL,
  `langcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `langname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `langdir` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_lang`
--

INSERT INTO `cms_lang` (`langid`, `langcode`, `langname`, `langdir`) VALUES
(1, 'fr', 'Francais', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `paid` int(10) UNSIGNED NOT NULL,
  `paslug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `padesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pakeys` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pacontent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `paparent` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `pastatut` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `patime` int(10) UNSIGNED NOT NULL,
  `paroot` int(11) NOT NULL DEFAULT '0',
  `paorder` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_pages`
--

INSERT INTO `cms_pages` (`paid`, `paslug`, `patitle`, `patype`, `padesc`, `pakeys`, `pacontent`, `paparent`, `pastatut`, `patime`, `paroot`, `paorder`) VALUES
(1, 'home', 'Accueil', 'home', 'Hello, it\'s my home page', 'home, page', 'Hello world !', 0, 1, 1461097120, 1, 0),
(2, 'login', 'Login', 'login', '', '', '', 0, 1, 1461270894, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cms_users`
--

CREATE TABLE `cms_users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ufname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `umail` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `upass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `upseudo` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `uavatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `utoken` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ucreat` int(11) NOT NULL,
  `utime` int(11) NOT NULL,
  `urang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_users`
--

INSERT INTO `cms_users` (`uid`, `uname`, `ufname`, `umail`, `upass`, `upseudo`, `uavatar`, `utoken`, `ucreat`, `utime`, `urang`) VALUES
(1, 'cockpit', 'mycms', 'cockpit@mycms.com', '$2y$07$$2y$07$$2y$07$27502d5ujfJIXhS7MhpnttujBvciLkKmimbznQy', 'SuperAdmin', 'admin.png', '27502d58c6e39aOoLvJVM6bAgjQg5r0ZovQKnsbiJAfYKO', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE `medias` (
  `meid` int(10) UNSIGNED NOT NULL,
  `metype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mepage` int(10) UNSIGNED NOT NULL,
  `meslug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `metime` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `paid` int(10) UNSIGNED NOT NULL,
  `paslug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `padesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pakeys` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pacontent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `paparent` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `pastatut` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `patime` int(10) UNSIGNED NOT NULL,
  `paroot` int(11) NOT NULL DEFAULT '0',
  `paorder` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cms_conf`
--
ALTER TABLE `cms_conf`
  ADD PRIMARY KEY (`confid`),
  ADD KEY `confslug` (`confslug`);

--
-- Index pour la table `cms_lang`
--
ALTER TABLE `cms_lang`
  ADD PRIMARY KEY (`langid`),
  ADD UNIQUE KEY `lang_code` (`langcode`);

--
-- Index pour la table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`paid`),
  ADD KEY `patype` (`patype`);

--
-- Index pour la table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `umail` (`umail`),
  ADD KEY `urang` (`urang`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cms_conf`
--
ALTER TABLE `cms_conf`
  MODIFY `confid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `cms_lang`
--
ALTER TABLE `cms_lang`
  MODIFY `langid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `paid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `meid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `paid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
