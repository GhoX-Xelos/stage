-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 07 Janvier 2026 à 14:26
-- Version du serveur :  5.6.20-log
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `niak`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `postal` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `tel`, `email`, `logo`, `adresse`, `ville`, `postal`) VALUES
(1, '06 86 71 67 75', 'niakniakkadric@gmail.com', 'public/image/logo.webp', '60 rue François 1er ', 'Paris', 75008);

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

CREATE TABLE `plante` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `espece` varchar(150) NOT NULL,
  `description` text,
  `methode` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reseaux`
--

CREATE TABLE `reseaux` (
  `id` int(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `reseaux`
--

INSERT INTO `reseaux` (`id`, `nom`, `url`) VALUES
(1, 'Niak Niak Kadrik', 'https://www.facebook.com/share/16bubANhjp/'),
(2, 'niakniakkadric', 'https://www.instagram.com/niakniakkadric/'),
(3, 'niakniakkadric', 'https://www.tiktok.com/@niakniakkadric?lang=fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reseaux`
--
ALTER TABLE `reseaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `plante`
--
ALTER TABLE `plante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reseaux`
--
ALTER TABLE `reseaux`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO plante (nom, espece, description, methode, image) VALUES
(
  'Dionée attrape-mouche',
  'Dionaea muscipula',
  'Plante carnivore emblématique qui capture les insectes grâce à ses feuilles en forme de mâchoires.',
  'Substrat composé de tourbe blonde et sable. Arrosage uniquement à l’eau de pluie ou déminéralisée. Exposition très lumineuse.',
  'public/image/dionee.webp'
),
(
  'Népenthès',
  'Nepenthes',
  'Plante tropicale carnivore produisant des urnes remplies de liquide digestif pour piéger les insectes.',
  'Culture en intérieur chaud et humide. Substrat aéré. Eau non calcaire uniquement.',
  'public/image/nepenthes.webp'
),
(
  'Sarracénie',
  'Sarracenia',
  'Plante carnivore à pièges tubulaires attirant les insectes par leur couleur et leur nectar.',
  'Plein soleil. Tourbe humide en permanence. Eau de pluie recommandée.',
  'public/image/sarracenia.webp'
),
(
  'Drosera',
  'Drosera capensis',
  'Plante carnivore couverte de poils collants capturant les insectes.',
  'Pot avec tourbe humide. Forte luminosité. Eau déminéralisée uniquement.',
  'public/image/drosera.webp'
),
(
  'Utriculaire',
  'Utricularia',
  'Plante carnivore aquatique ou terrestre capturant des micro-organismes.',
  'Milieu très humide ou aquatique. Lumière abondante.',
  'public/image/utriculaire.webp'
),
(
  'Pinguicula',
  'Pinguicula vulgaris',
  'Plante carnivore à feuilles grasses collantes, efficace contre les moucherons.',
  'Substrat léger et humide. Lumière indirecte. Eau non calcaire.',
  'public/image/pinguicula.webp'
),
(
  'Cephalotus',
  'Cephalotus follicularis',
  'Plante carnivore rare produisant de petits pièges en forme d’urnes.',
  'Substrat très drainant. Lumière intense sans excès de chaleur.',
  'public/image/cephalotus.webp'
),
(
  'Heliamphora',
  'Heliamphora nutans',
  'Plante carnivore originaire d’Amérique du Sud avec des urnes ouvertes.',
  'Température fraîche et humidité élevée. Eau déminéralisée.',
  'public/image/heliamphora.webp'
),
(
  'Darlingtonia',
  'Darlingtonia californica',
  'Plante carnivore surnommée plante cobra en raison de sa forme unique.',
  'Racines au frais. Eau froide et pure. Lumière vive.',
  'public/image/darlingtonia.webp'
),
(
  'Byblis',
  'Byblis liniflora',
  'Plante carnivore aux feuilles fines et collantes, ressemblant à une plante ornementale.',
  'Substrat sableux et humide. Pleine lumière.',
  'public/image/byblis.webp'
);

CREATE TABLE favoris (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    espece VARCHAR(100),
    methode VARCHAR(100)
);

INSERT INTO favoris (nom, description, image, espece, methode) VALUES
(
    'Dionaea muscipula',
    'Plante carnivore connue sous le nom de attrape-mouche de Vénus, elle capture les insectes avec ses feuilles pièges.',
    'dionaea.jpg',
    'Plante carnivore',
    'Piégeage'
),
(
    'Nepenthes',
    'Plante tropicale carnivore utilisant des urnes remplies de liquide pour piéger les insectes.',
    'nepenthes.jpg',
    'Plante carnivore',
    'Piège à urne'
),
(
    'Drosera',
    'Plante carnivore recouverte de poils collants qui capturent les insectes.',
    'drosera.jpg',
    'Plante carnivore',
    'Piège collant'
);
