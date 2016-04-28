-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 28 Avril 2016 à 20:19
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

CREATE TABLE IF NOT EXISTS `cms_conf` (
  `confid` int(10) unsigned NOT NULL,
  `confslug` varchar(50) NOT NULL,
  `confcontent` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `cms_lang` (
  `langid` int(11) NOT NULL,
  `langcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `langname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `langdir` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_lang`
--

INSERT INTO `cms_lang` (`langid`, `langcode`, `langname`, `langdir`) VALUES
(1, 'fr', 'Francais', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `paid` int(10) unsigned NOT NULL,
  `paslug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `padesc` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pakeys` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pacontent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `paparent` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pastatut` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `patime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paroot` int(11) NOT NULL DEFAULT '0',
  `paorder` tinyint(4) DEFAULT NULL,
  `palang` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fr'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_pages`
--

INSERT INTO `cms_pages` (`paid`, `paslug`, `patitle`, `patype`, `padesc`, `pakeys`, `pacontent`, `paparent`, `pastatut`, `patime`, `paroot`, `paorder`, `palang`) VALUES
(1, 'home', 'W_PANEL', 'home', 'Hello, it''s my home page', 'home, page', 'Hello world !', 0, 1, '0000-00-00 00:00:00', 1, 0, 'fr'),
(2, 'login', 'W_LOGIN', 'login', '', '', '', 0, 1, '0000-00-00 00:00:00', 0, 1, 'fr'),
(4, 'users', 'W_USERS', 'users', '', '', '', 0, 1, '0000-00-00 00:00:00', 0, 0, 'fr'),
(5, 'pages', 'W_PAGES', 'pages', '', '', '', 0, 1, '0000-00-00 00:00:00', 0, 0, 'fr'),
(6, 'messages', 'W_MESSAGES', 'messages', '', '', '', 0, 1, '0000-00-00 00:00:00', 0, NULL, 'fr'),
(8, 'tools', 'W_TOOLS', 'tools', '', '', '', 0, 1, '2016-04-28 20:10:40', 0, NULL, 'fr'),
(9, 'addons', 'W_PLUGINS', 'addons', '', '', '', 0, 1, '2016-04-28 20:12:36', 0, NULL, 'fr'),
(10, 'settings', 'W_SETTINGS', 'settings', '', '', '', 0, 1, '2016-04-28 20:18:15', 0, NULL, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `uid` int(10) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cms_users`
--

INSERT INTO `cms_users` (`uid`, `uname`, `ufname`, `umail`, `upass`, `upseudo`, `uavatar`, `utoken`, `ucreat`, `utime`, `urang`) VALUES
(1, 'cockpit', 'mycms', 'cockpit@mycms.com', '$2y$07$$2y$07$$2y$07$27502d5ujfJIXhS7MhpnttujBvciLkKmimbznQy', 'SuperAdmin', 'admin.png', '27502d58c6e39aOoLvJVM6bAgjQg5r0ZovQKnsbiJAfYKO', 1, 0, 0);

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
  ADD KEY `patype` (`patype`),
  ADD KEY `palang` (`palang`);

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
  MODIFY `confid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `cms_lang`
--
ALTER TABLE `cms_lang`
  MODIFY `langid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `paid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
  MODIFY `meid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `paid` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD CONSTRAINT `palang_langcode` FOREIGN KEY (`palang`) REFERENCES `cms_lang` (`langcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
