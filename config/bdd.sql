CREATE DATABASE IF NOT EXISTS niak
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE niak;

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
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `role`, `nom`, `prenom`, `mdp`, `email`, `tel`) VALUES
(1, 'admin', 'Courtois', 'Alicia', 'azerty123', 'alicia@gmail.com', '06 06 06 06 06'),
(2, 'admin', 'Champagnac', 'William', 'azerty123', 'william@gmail.com', '07 07 07 07 07'),
(3, 'admin', 'Fassetta', 'Cédric', 'azerty123', 'niakniakkadric@gmail.com', '06 86 71 67 75'),
(4, 'admin', 'Champagnac', 'Christine', 'azerty123', 'meesty@hotmail.com', '06 15 35 89 23 '),
(5, 'client', 'Pierre', 'Pierre', 'client123', 'pierre@gmail.com', '08 08 08 08 08'),
(6, 'client ', 'Maud', 'Maud', 'client123', 'maud@gmail.com', '09 09 09 09 09 ');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;