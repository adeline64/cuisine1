-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 12 Mai 2019 à 14:48
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `cuisine`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `telephone` varchar(20),
  `adresse` TEXT NOT NULL,
  `role` int(11) DEFAULT '0',
  `residence` int(11) DEFAULT '0' -- FK vers la table residence pour la ville
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `residence`;
CREATE TABLE `residence` (
  `id` int(11) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` TEXT NOT NULL,
  `utilisateur` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `dateheure` datetime NOT NULL,
  `nbPersonne` varchar(2) NOT NULL,
  `utilisateur` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `nom` varchar(5) NOT NULL,
  `adresse` varchar (49) NOT NULL,
  `residence` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `entree` int(11) DEFAULT '0',
  `plat` int(11) DEFAULT '0',
  `dessert` int(11) DEFAULT '0',
  `vin` int(11) DEFAULT '0',
  `boisson` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `entree`;
CREATE TABLE `entree` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` TEXT NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `plat`;
CREATE TABLE `plat` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` TEXT NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `boisson`;
CREATE TABLE `boisson` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);
--
-- Index pour la table `utilisateur`
--

ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

-- Index pour la table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`id`);

-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

  -- Index pour la table `reservation`
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);  
--

-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`); 

-- Index pour la table `entree`
--
ALTER TABLE `entree`
  ADD PRIMARY KEY (`id`);

-- Index pour la table `plats`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id`);

-- Index pour la table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

  -- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées

ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

   -- AUTO_INCREMENT pour la table `residence`
--
ALTER TABLE `residence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;  

--
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `entree`
--
ALTER TABLE `entree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

  -- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

    -- AUTO_INCREMENT pour la table `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

    -- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

