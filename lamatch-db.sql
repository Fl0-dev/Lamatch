-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 août 2021 à 22:43
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lamatch-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `linkedin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_recherche` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ville_id` int(11) NOT NULL,
  `liste_de_qualites_disc_id` int(11) NOT NULL,
  `valeur_principale_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6AB5B47125C7FD40` (`liste_de_qualites_disc_id`),
  UNIQUE KEY `UNIQ_6AB5B471A76ED395` (`user_id`),
  KEY `IDX_6AB5B471A73F0036` (`ville_id`),
  KEY `IDX_6AB5B47124DB436E` (`valeur_principale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_competence`
--

DROP TABLE IF EXISTS `candidat_competence`;
CREATE TABLE IF NOT EXISTS `candidat_competence` (
  `candidat_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_id`,`competence_id`),
  KEY `IDX_CF607D68D0EB82` (`candidat_id`),
  KEY `IDX_CF607D615761DAB` (`competence_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_formation`
--

DROP TABLE IF EXISTS `candidat_formation`;
CREATE TABLE IF NOT EXISTS `candidat_formation` (
  `candidat_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_id`,`formation_id`),
  KEY `IDX_B00F34FD8D0EB82` (`candidat_id`),
  KEY `IDX_B00F34FD5200282E` (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaine_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94D4687F4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_de_creation` date DEFAULT NULL,
  `adresse_web` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_rh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `infos` longtext COLLATE utf8mb4_unicode_ci,
  `effectif` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_entreprise_id` int(11) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `valeur_principale_id` int(11) NOT NULL,
  `enrecherche` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D19FA60A76ED395` (`user_id`),
  KEY `IDX_D19FA60D44318DF` (`type_entreprise_id`),
  KEY `IDX_D19FA60A73F0036` (`ville_id`),
  KEY `IDX_D19FA6024DB436E` (`valeur_principale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_domaine`
--

DROP TABLE IF EXISTS `entreprise_domaine`;
CREATE TABLE IF NOT EXISTS `entreprise_domaine` (
  `entreprise_id` int(11) NOT NULL,
  `domaine_id` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_id`,`domaine_id`),
  KEY `IDX_C04BB97FA4AEAFEA` (`entreprise_id`),
  KEY `IDX_C04BB97F4272FC9F` (`domaine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_contrat_id` int(11) NOT NULL,
  `nom_employeur` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `intitule_poste` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `ville_id` int(11) NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_590C103520D03A` (`type_contrat_id`),
  KEY `IDX_590C103A73F0036` (`ville_id`),
  KEY `IDX_590C1034272FC9F` (`domaine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `niveau_id` int(11) DEFAULT NULL,
  `intitule` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `etablissement` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFB3E9C81` (`niveau_id`),
  KEY `IDX_404021BF4272FC9F` (`domaine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle`) VALUES
(1, '<=Bac'),
(3, 'Bac+2'),
(4, 'Bac+3'),
(6, 'Bac+5'),
(7, 'Bac+8');

-- --------------------------------------------------------

--
-- Structure de la table `qualites_disc`
--

DROP TABLE IF EXISTS `qualites_disc`;
CREATE TABLE IF NOT EXISTS `qualites_disc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualites_disc_qualite_c`
--

DROP TABLE IF EXISTS `qualites_disc_qualite_c`;
CREATE TABLE IF NOT EXISTS `qualites_disc_qualite_c` (
  `qualites_disc_id` int(11) NOT NULL,
  `qualite_c_id` int(11) NOT NULL,
  PRIMARY KEY (`qualites_disc_id`,`qualite_c_id`),
  KEY `IDX_DB959CF2FAF04E12` (`qualites_disc_id`),
  KEY `IDX_DB959CF24A57252F` (`qualite_c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualites_disc_qualite_d`
--

DROP TABLE IF EXISTS `qualites_disc_qualite_d`;
CREATE TABLE IF NOT EXISTS `qualites_disc_qualite_d` (
  `qualites_disc_id` int(11) NOT NULL,
  `qualite_d_id` int(11) NOT NULL,
  PRIMARY KEY (`qualites_disc_id`,`qualite_d_id`),
  KEY `IDX_45F10951FAF04E12` (`qualites_disc_id`),
  KEY `IDX_45F10951D7801D96` (`qualite_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualites_disc_qualite_i`
--

DROP TABLE IF EXISTS `qualites_disc_qualite_i`;
CREATE TABLE IF NOT EXISTS `qualites_disc_qualite_i` (
  `qualites_disc_id` int(11) NOT NULL,
  `qualite_i_id` int(11) NOT NULL,
  PRIMARY KEY (`qualites_disc_id`,`qualite_i_id`),
  KEY `IDX_3B4075ECFAF04E12` (`qualites_disc_id`),
  KEY `IDX_3B4075EC25EAC54B` (`qualite_i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualites_disc_qualite_s`
--

DROP TABLE IF EXISTS `qualites_disc_qualite_s`;
CREATE TABLE IF NOT EXISTS `qualites_disc_qualite_s` (
  `qualites_disc_id` int(11) NOT NULL,
  `qualite_s_id` int(11) NOT NULL,
  PRIMARY KEY (`qualites_disc_id`,`qualite_s_id`),
  KEY `IDX_C6228C96FAF04E12` (`qualites_disc_id`),
  KEY `IDX_C6228C961A4E72B0` (`qualite_s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `qualite_c`
--

DROP TABLE IF EXISTS `qualite_c`;
CREATE TABLE IF NOT EXISTS `qualite_c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualite_c`
--

INSERT INTO `qualite_c` (`id`, `nom`) VALUES
(1, 'Analytique'),
(2, 'Classique'),
(3, 'Logique'),
(4, 'Froid'),
(5, 'Précis'),
(6, 'Formel'),
(7, 'Indépendant'),
(8, 'Réservé'),
(9, 'Réfléchi'),
(10, 'Prudent'),
(11, 'Collectionneur'),
(12, 'Méticuleux');

-- --------------------------------------------------------

--
-- Structure de la table `qualite_d`
--

DROP TABLE IF EXISTS `qualite_d`;
CREATE TABLE IF NOT EXISTS `qualite_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualite_d`
--

INSERT INTO `qualite_d` (`id`, `nom`) VALUES
(1, 'Tenace'),
(2, 'Agressif'),
(3, 'Vif'),
(4, 'Positif'),
(5, 'Energique'),
(6, 'Efficace'),
(7, 'Factuel'),
(8, 'Fonceur'),
(9, 'Rapide'),
(10, 'Autonome'),
(11, 'Direct'),
(12, 'Franc');

-- --------------------------------------------------------

--
-- Structure de la table `qualite_i`
--

DROP TABLE IF EXISTS `qualite_i`;
CREATE TABLE IF NOT EXISTS `qualite_i` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualite_i`
--

INSERT INTO `qualite_i` (`id`, `nom`) VALUES
(1, 'Convivial'),
(2, 'Sincère'),
(3, 'Energique'),
(4, 'Positif'),
(5, 'Amical'),
(6, 'Expansif'),
(7, 'Enthousiaste'),
(8, 'Optimiste'),
(9, 'Cordial'),
(10, 'Démonstratif'),
(11, 'Tactile'),
(12, 'Sociable');

-- --------------------------------------------------------

--
-- Structure de la table `qualite_s`
--

DROP TABLE IF EXISTS `qualite_s`;
CREATE TABLE IF NOT EXISTS `qualite_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualite_s`
--

INSERT INTO `qualite_s` (`id`, `nom`) VALUES
(1, 'Fiable'),
(2, 'Modeste'),
(3, 'Patient'),
(4, 'Calme'),
(5, 'Humble'),
(6, 'Réfléchi'),
(7, 'Méthodique'),
(8, 'Protecteur'),
(9, 'Attentionné'),
(10, 'Doux'),
(11, 'Timide'),
(12, 'Généreux');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `nom`) VALUES
(1, 'Auvergne-Rhône-Alpes'),
(2, 'Bourgogne-Franche-Comté'),
(3, 'Bretagne'),
(4, 'Centre-Val de Loire'),
(5, 'Corse'),
(6, 'Grand Est'),
(7, 'Hauts-de-France'),
(8, 'Île-de-France'),
(9, 'Normandie'),
(10, 'Nouvelle-Aquitaine'),
(11, 'Occitanie'),
(12, 'Pays de la Loire'),
(13, 'Provence-Alpes-Côte d\'Azur'),
(14, 'Guadeloupe'),
(15, 'Guyane'),
(16, 'Martinique'),
(17, 'La Réunion'),
(18, 'Mayotte');

-- --------------------------------------------------------

--
-- Structure de la table `type_contrat`
--

DROP TABLE IF EXISTS `type_contrat`;
CREATE TABLE IF NOT EXISTS `type_contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_contrat`
--

INSERT INTO `type_contrat` (`id`, `intitule`) VALUES
(1, 'CDI'),
(2, 'CDD'),
(3, 'Intérim'),
(4, 'Alternance'),
(5, 'Stage'),
(6, 'Bénévolat');

-- --------------------------------------------------------

--
-- Structure de la table `type_entreprise`
--

DROP TABLE IF EXISTS `type_entreprise`;
CREATE TABLE IF NOT EXISTS `type_entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_entreprise`
--

INSERT INTO `type_entreprise` (`id`, `intitule`) VALUES
(1, 'Micro Entreprise'),
(2, 'PME : Petite et Moyenne Entreprise'),
(3, 'ETI : Entreprise de Taille Intermédiaire'),
(4, 'GE : Grande Entreprise');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `date_modiff` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `valeur_principale`
--

DROP TABLE IF EXISTS `valeur_principale`;
CREATE TABLE IF NOT EXISTS `valeur_principale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `valeur_principale`
--

INSERT INTO `valeur_principale` (`id`, `nom`) VALUES
(1, 'Travail en équipe'),
(2, 'Evolution de carrière'),
(3, 'Faciliter l\'intégration'),
(4, 'Rémunération juste'),
(5, 'Flexibilité des horaires'),
(6, 'Ambiance de travail'),
(7, 'Tutorat'),
(8, 'Culture d\'entreprise'),
(9, 'Equilibre pro/privé'),
(10, 'Environnement de qualité');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43C3D9C398260155` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `region_id`, `nom`) VALUES
(1, 12, 'Nantes'),
(2, 8, 'Paris'),
(3, 3, 'Rennes'),
(4, 4, 'Orléans'),
(5, 10, 'Bordeaux');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_6AB5B47124DB436E` FOREIGN KEY (`valeur_principale_id`) REFERENCES `valeur_principale` (`id`),
  ADD CONSTRAINT `FK_6AB5B47125C7FD40` FOREIGN KEY (`liste_de_qualites_disc_id`) REFERENCES `qualites_disc` (`id`),
  ADD CONSTRAINT `FK_6AB5B471A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_6AB5B471A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `candidat_competence`
--
ALTER TABLE `candidat_competence`
  ADD CONSTRAINT `FK_CF607D615761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CF607D68D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `candidat_formation`
--
ALTER TABLE `candidat_formation`
  ADD CONSTRAINT `FK_B00F34FD5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B00F34FD8D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
  ADD CONSTRAINT `FK_94D4687F4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `FK_D19FA6024DB436E` FOREIGN KEY (`valeur_principale_id`) REFERENCES `valeur_principale` (`id`),
  ADD CONSTRAINT `FK_D19FA60A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_D19FA60A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D19FA60D44318DF` FOREIGN KEY (`type_entreprise_id`) REFERENCES `type_entreprise` (`id`);

--
-- Contraintes pour la table `entreprise_domaine`
--
ALTER TABLE `entreprise_domaine`
  ADD CONSTRAINT `FK_C04BB97F4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C04BB97FA4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `FK_590C1034272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`),
  ADD CONSTRAINT `FK_590C103520D03A` FOREIGN KEY (`type_contrat_id`) REFERENCES `type_contrat` (`id`),
  ADD CONSTRAINT `FK_590C103A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`),
  ADD CONSTRAINT `FK_404021BFB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `qualites_disc_qualite_c`
--
ALTER TABLE `qualites_disc_qualite_c`
  ADD CONSTRAINT `FK_DB959CF24A57252F` FOREIGN KEY (`qualite_c_id`) REFERENCES `qualite_c` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DB959CF2FAF04E12` FOREIGN KEY (`qualites_disc_id`) REFERENCES `qualites_disc` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `qualites_disc_qualite_d`
--
ALTER TABLE `qualites_disc_qualite_d`
  ADD CONSTRAINT `FK_45F10951D7801D96` FOREIGN KEY (`qualite_d_id`) REFERENCES `qualite_d` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_45F10951FAF04E12` FOREIGN KEY (`qualites_disc_id`) REFERENCES `qualites_disc` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `qualites_disc_qualite_i`
--
ALTER TABLE `qualites_disc_qualite_i`
  ADD CONSTRAINT `FK_3B4075EC25EAC54B` FOREIGN KEY (`qualite_i_id`) REFERENCES `qualite_i` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3B4075ECFAF04E12` FOREIGN KEY (`qualites_disc_id`) REFERENCES `qualites_disc` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `qualites_disc_qualite_s`
--
ALTER TABLE `qualites_disc_qualite_s`
  ADD CONSTRAINT `FK_C6228C961A4E72B0` FOREIGN KEY (`qualite_s_id`) REFERENCES `qualite_s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C6228C96FAF04E12` FOREIGN KEY (`qualites_disc_id`) REFERENCES `qualites_disc` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `FK_43C3D9C398260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
