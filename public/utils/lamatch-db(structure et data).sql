-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 12 sep. 2021 à 17:47
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
  `ville_id` int(11) NOT NULL,
  `valeur_principale_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `type_contrat_souhaite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6AB5B471A73F0036` (`ville_id`),
  KEY `IDX_6AB5B47124DB436E` (`valeur_principale_id`),
  KEY `IDX_6AB5B47152689E22` (`type_contrat_souhaite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`id`, `email_contact`, `nom`, `prenom`, `photo`, `date_naissance`, `linkedin`, `en_recherche`, `ville_id`, `valeur_principale_id`, `age`, `type_contrat_souhaite_id`) VALUES
(1, 'jean-eudes@gmail.com', 'ROGER', 'Jean-Eudes', NULL, '2000-05-13', 'Profil LinkedIn', 1, 1, 2, 21, 3),
(4, 'hakimpierre@gmail.com', 'Pierre', 'Hakim', 'pexels-cottonbro-5083399-613d14d39ee28.jpg', '1983-08-07', 'www.linkedin.com/in/hakimpierre', 1, 4, 2, 38, 1),
(10, 'jp@gmail.com', 'Belmondo', 'Jean-Pierre', 'profil-613bba5b1f856.jpg', '1970-05-05', 'http:/linkedin', 0, 2, 3, 51, 1),
(11, 'jc@gmail.com', 'River', 'Jean-Claude', 'pexels-andrea-piacquadio-838413-613bd4e689379.jpg', '2000-08-08', 'http:/linkedin', 1, 1, 8, 21, 1),
(12, 'georgesFitz@gmail.com', 'Fitz', 'Georges', 'pexels-yogendra-singh-3748221-613cf91863d81.jpg', '2000-01-01', 'www.linkedin.com/in/georges-Fitz', 1, 1, 6, 21, 1),
(13, 'juliengivre@gmail.com', 'Givré', 'Julien', 'pexels-ron-lach-8159657-613cfbacc1290.jpg', '1995-01-01', 'www.linkedin.com/in/juliengivre', 1, 1, 6, 26, 5),
(14, 'estellefrancois@gmail.com', 'François', 'Estelle', 'pexels-murat-esibatir-4355346-613cff6d41a1d.jpg', '1980-05-02', 'www.linkedin.com/in/estellefrancois', 0, 1, 1, 41, 1),
(15, 'pierreTy@gmail.com', 'Ty', 'Pierre', 'pexels-estudio-polaroid-3116381-613d101a2a309.jpg', '1970-07-08', 'www.linkedin.com/in/pierrety', 1, 1, 10, 51, 1);

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

--
-- Déchargement des données de la table `candidat_competence`
--

INSERT INTO `candidat_competence` (`candidat_id`, `competence_id`) VALUES
(4, 4),
(4, 23),
(10, 5),
(10, 6),
(11, 7),
(11, 8),
(11, 9),
(12, 10),
(12, 11),
(13, 12),
(13, 13),
(13, 14),
(13, 15),
(14, 16),
(14, 17),
(14, 18),
(15, 19),
(15, 20),
(15, 21),
(15, 22);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_qualites_disc`
--

DROP TABLE IF EXISTS `candidat_qualites_disc`;
CREATE TABLE IF NOT EXISTS `candidat_qualites_disc` (
  `candidat_id` int(11) NOT NULL,
  `qualites_disc_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_id`,`qualites_disc_id`),
  KEY `IDX_7A988E148D0EB82` (`candidat_id`),
  KEY `IDX_7A988E14FAF04E12` (`qualites_disc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidat_qualites_disc`
--

INSERT INTO `candidat_qualites_disc` (`candidat_id`, `qualites_disc_id`) VALUES
(1, 23),
(1, 31),
(1, 32),
(4, 11),
(4, 23),
(4, 38),
(10, 15),
(10, 23),
(10, 38),
(11, 5),
(11, 8),
(11, 29),
(12, 8),
(12, 14),
(12, 31),
(12, 39),
(13, 6),
(13, 28),
(13, 29),
(13, 49),
(14, 10),
(14, 13),
(14, 20),
(14, 21),
(14, 28),
(14, 46),
(15, 20),
(15, 36),
(15, 37);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `intitule`, `domaine_id`) VALUES
(1, 'JS', 2),
(2, 'Symfony', 2),
(3, 'JS', 2),
(4, 'Symfony', 2),
(5, 'Médecine générale', 3),
(6, 'pédiatrie', 3),
(7, 'Java', 2),
(8, 'Android Studio', 2),
(9, 'PHP', 2),
(10, 'Ingénieur Twitter', 8),
(11, 'Master FaceBook', 8),
(12, 'Anglais', 6),
(13, 'Espagnol', 8),
(14, 'Russe', 8),
(15, 'Chinois', 8),
(16, 'JS', 2),
(17, 'SQL', 2),
(18, 'Java', 2),
(19, 'Chaudronnerie', 12),
(20, 'Dessin', 15),
(21, 'DAO', 15),
(22, 'PAO', 15),
(23, 'WordPress', 2);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `nom`) VALUES
(1, 'Droit'),
(2, 'Informatique'),
(3, 'Santé'),
(4, 'Général'),
(5, 'Ressources Humaines'),
(6, 'Economie'),
(7, 'Militaire'),
(8, 'Commerce-Vente'),
(9, 'Restauration'),
(10, 'Transport'),
(11, 'Communication'),
(12, 'Industrie'),
(13, 'Batiment'),
(14, 'Presse'),
(15, 'Art'),
(16, 'Sport');

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
  `type_entreprise_id` int(11) NOT NULL,
  `ville_id` int(11) NOT NULL,
  `valeur_principale_id` int(11) NOT NULL,
  `enrecherche` tinyint(1) NOT NULL,
  `type_contrat_propose_id` int(11) DEFAULT NULL,
  `experience_demande` int(11) DEFAULT NULL,
  `niveau_demande_id` int(11) DEFAULT NULL,
  `trait_de_caractere_souhaite_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D19FA60D44318DF` (`type_entreprise_id`),
  KEY `IDX_D19FA60A73F0036` (`ville_id`),
  KEY `IDX_D19FA6024DB436E` (`valeur_principale_id`),
  KEY `IDX_D19FA60264AD6B9` (`type_contrat_propose_id`),
  KEY `IDX_D19FA60D465D8D5` (`niveau_demande_id`),
  KEY `IDX_D19FA6017C07180` (`trait_de_caractere_souhaite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `logo`, `date_de_creation`, `adresse_web`, `adresse_rh`, `infos`, `effectif`, `type_entreprise_id`, `ville_id`, `valeur_principale_id`, `enrecherche`, `type_contrat_propose_id`, `experience_demande`, `niveau_demande_id`, `trait_de_caractere_souhaite_id`) VALUES
(2, 'Rubato', 'telechargement-613d169d8d35a.png', '2017-08-24', 'https://rubato.fr/', 'rh@rubato.fr', 'Une application au service des avocats\r\nRubato est une application qui permet la gestion intelligente des échéances pour cabinet d’avocats.\r\n\r\nComment ?\r\n– En traduisant les dossiers des avocats en une Séquence de tâches et de rendez-vous enchaînés\r\n– En centralisant toutes les fonctionnalités de la gestion de cabinet : agenda intelligent, tchat par dossier, to do quotidienne…', 9, 1, 1, 2, 1, 4, 2, 4, 1),
(3, 'Adelle', 'telechargement-613a6a1c1b2ce.jpg', '2021-08-30', 'http://adellegmail.com', 'adelle@gmail.com', 'zdafzefaef', 454, 3, 1, 5, 1, 5, 2, 1, 2),
(4, 'Home Sweet Home', 'pexels-rodnae-productions-8293685-613cd92212917.jpg', '2017-02-23', 'http://https:\\\\hsh.com', 'hsh.rh@hsh.com', 'Entreprise familiale qui apporte confort et bien-être dans tous les coin de votre maison.\r\nEnvironnement de travail cosy pour un maximum de d\'efficacité', 50, 2, 1, 5, 1, 1, 5, 1, 4),
(5, 'Cold Brew', 'logo-613cf34e39bf3.jpg', '2000-09-09', 'http://https:\\\\coldBrew.com', 'RHServices@coldbrew.com', 'Grand groupe dans l\'agroalimentaire, nous regroupons plusieurs domaines où nous cherchons à performer 💪', 3000, 4, 2, 8, 1, 5, 5, 4, 3),
(6, 'Mooi', 'pexels-magda-ehlers-1337380-613cfec2df3b4.jpg', '2016-06-06', 'http://https:\\\\mooi.com', 'Rh@mooi.com', 'Nous sommes dans la communication et nous cherchons à grandir aussi loin que possible... Avec vous ? 😉', 100, 3, 3, 2, 1, 4, 0, 1, 2),
(7, 'Louis Vuitton', 'pexels-anne-r-4475780-613cf6624cb35.jpg', '1854-01-01', 'http://https:\\\\LouisVuitton.com', 'RhServices@lv.com', 'Malletier à Paris depuis 1854, nous sommes leader dans notre domaine et ravis de rencontrer des personnes d\'expérience', 250, 3, 2, 8, 0, 1, 10, 6, 1),
(8, 'FitnessFirst', 'pexels-dids-1769735-613cf7f15a363.jpg', '2020-01-01', 'http://https:\\\\FitnessFirst.fr', 'Jcvd@fit.fr', 'Petite structure mais de grandes idées, nous sommes à la recherche de nouvelles têtes prêtes à muscler le game !', 20, 1, 1, 3, 1, 6, 2, 1, 1);

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

--
-- Déchargement des données de la table `entreprise_domaine`
--

INSERT INTO `entreprise_domaine` (`entreprise_id`, `domaine_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 2),
(4, 8),
(5, 2),
(5, 4),
(5, 8),
(5, 9),
(6, 2),
(6, 11),
(7, 8),
(8, 3);

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
  `candidat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_590C103520D03A` (`type_contrat_id`),
  KEY `IDX_590C103A73F0036` (`ville_id`),
  KEY `IDX_590C1034272FC9F` (`domaine_id`),
  KEY `IDX_590C1038D0EB82` (`candidat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id`, `type_contrat_id`, `nom_employeur`, `date_debut`, `date_fin`, `intitule_poste`, `description`, `ville_id`, `domaine_id`, `candidat_id`) VALUES
(1, 4, 'Hubert Avocats', '2019-09-02', '2020-09-02', 'Avocat Assistant', 'J\'ai pu assister un avocat spécialisé dans le droit des sociétés, ce qui m\'a permis de conforter mon désir de devenir avocat en droit des sociétés ❤', 1, NULL, 1),
(2, 5, 'John and Smith', '2019-04-02', '2019-07-02', 'Stage Archivage', 'De l\'archivage en masse', 1, NULL, 1),
(4, 4, 'CHU Rennes', '1995-05-06', '1998-04-25', 'Interne', 'Montée en expérience en traitant toutes sortes de cas', 3, 3, 10),
(5, 1, 'CHU Rennes', '2005-08-08', '2015-09-10', 'Pédiatre en chef', 'Responsable des urgences pédiatriques', 3, 3, 10),
(6, 1, 'Mc Donalds', '1998-02-02', '2000-03-03', 'Vendeur', 'Caissier et magasinier', 1, 9, 11),
(7, 1, 'Julien Givré', '2013-02-02', NULL, 'Autoentrepreneur', 'Autodidacte, j\'ai monté de toutes pièces ma boîtes d\'import export de véhicules de luxe', 2, 8, 13),
(8, 1, 'IBM', '2000-09-09', '2015-11-07', 'Développeuse Web', 'Commançant en tant que stagiaire, j\'ai réussi grâce à ma persévérance et mes qualités techniques à décrocher un CDI. Travail en Java, SQL et JavaScript', 2, 2, 14),
(9, 1, 'Chantier Naval de Saint Nazaire', '1986-12-16', '1994-09-25', 'Chaudronnier', 'Travail dans tous les secteurs de construction', 6, 12, 15),
(10, 1, 'DRAC', '1998-06-06', NULL, 'Dessinateur projeteur', 'Mise en page et dessin par ordinateur pour de nombreux magazines', 1, 15, 15),
(11, 1, 'Jean-Michel-Devanture.fr', '2000-12-02', '2015-02-02', 'Développeur Front', 'Mise en page de nombreux sites sous WordPress pour différents entreprises dans des domaines très différents', 5, 15, 4);

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
  `candidat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_404021BFB3E9C81` (`niveau_id`),
  KEY `IDX_404021BF4272FC9F` (`domaine_id`),
  KEY `IDX_404021BF8D0EB82` (`candidat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `niveau_id`, `intitule`, `date_debut`, `date_fin`, `etablissement`, `domaine_id`, `candidat_id`) VALUES
(1, 1, 'Baccalauréat général', '2017-09-03', '2018-09-03', 'Bourdonnière Nantes', 4, 1),
(2, 3, 'Licence Professionnelle', '2018-09-03', '2020-09-03', 'Fac de droit', 1, 1),
(14, 7, 'Doctorat médecine générale', '1990-12-20', NULL, 'Fac de médecine', 3, 10),
(15, 1, 'bac général S', '2018-09-05', '2019-07-05', 'Lycée Jean-Perrin', 2, 11),
(16, 3, 'Développeur Web et Web Mobile', '2020-09-05', '2021-02-05', 'ENI Ecole Informatique', 2, 11),
(17, 1, 'bac général L', '2017-09-06', '2018-07-07', 'Lycée de la Vilardière', 4, 12),
(18, 3, 'BTS Communication', '2018-09-09', '2020-07-07', 'Ecole de communication de Montaigne', 11, 12),
(19, 1, 'BEP Vente', '2010-02-02', '2011-02-02', 'Ecole de la rue', 8, 13),
(20, 1, 'bac général Economie', '2011-02-02', '2013-02-02', 'Lycée Clémenceau', 8, 13),
(21, 3, 'BTS Vente Internationale', '2013-02-02', '2015-05-05', 'Ecole supérieure', 8, 13),
(22, 6, 'Master d\'économie en micro-entreprise', '2015-05-05', '2017-06-06', 'Harvard', 8, 13),
(23, 1, 'bac général S', '1998-06-06', '1998-07-06', 'Lycée privé', 4, 14),
(24, 1, 'Bac Pro chaudronnier', '1985-02-02', '1986-08-06', 'Lycée Professionnel de la Herdrie', 4, 15),
(25, 3, 'BTS DAO', '1995-12-23', '1997-12-23', 'CNAM', 2, 15),
(26, 1, 'bac général S', '1992-06-02', '1994-08-06', 'Lycée de Saint-Syr', 2, 4),
(27, 3, 'Développeur Full Stack', '1999-06-15', '1999-07-15', 'OpenClassRoom', 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `matching`
--

DROP TABLE IF EXISTS `matching`;
CREATE TABLE IF NOT EXISTS `matching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matching`
--

INSERT INTO `matching` (`id`, `nombre`) VALUES
(1, 157);

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
  `nom` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_qualite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B34DEEFBB305355` (`type_qualite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `qualites_disc`
--

INSERT INTO `qualites_disc` (`id`, `nom`, `type_qualite_id`) VALUES
(1, 'Tenace', 2),
(3, 'Agressif', 2),
(4, 'Vif', 2),
(5, 'Positif', 2),
(6, 'Energique', 2),
(7, 'Efficace', 2),
(8, 'Factuel', 2),
(9, 'Fonceur', 2),
(10, 'Rapide', 2),
(11, 'Autonome', 2),
(12, 'Direct', 2),
(13, 'Franc', 2),
(14, 'Analytique', 1),
(15, 'Classique', 1),
(16, 'Logique', 1),
(17, 'Froid', 1),
(18, 'Précis', 1),
(19, 'Formel', 1),
(20, 'Indépendant', 1),
(21, 'Réservé', 1),
(22, 'Prudent', 1),
(23, 'Collectionneur', 1),
(24, 'Méticuleux', 1),
(25, 'Convivial', 3),
(26, 'Sincère', 3),
(27, 'Animé', 3),
(28, 'Expansif', 3),
(29, 'Enthousiaste', 3),
(30, 'Optimiste', 3),
(31, 'Cordial', 3),
(32, 'Démonstratif', 3),
(33, 'Tactile', 3),
(34, 'Sociable', 3),
(35, 'Fiable', 4),
(36, 'Modeste', 4),
(37, 'Patient', 4),
(38, 'Calme', 4),
(39, 'Humble', 4),
(40, 'Réfléchi', 4),
(41, 'Méthodique', 4),
(42, 'Protecteur', 4),
(43, 'Attentionné', 4),
(44, 'Doux', 4),
(45, 'Timide', 4),
(46, 'Généreux', 4),
(48, 'Positif', 3),
(49, 'Amical', 3);

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
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `type_qualite`
--

DROP TABLE IF EXISTS `type_qualite`;
CREATE TABLE IF NOT EXISTS `type_qualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_qualite`
--

INSERT INTO `type_qualite` (`id`, `nom`, `color`) VALUES
(1, 'Consciencieux', 'Bleu'),
(2, 'Dominant', 'Rouge'),
(3, 'Influent', 'Jaune'),
(4, 'Stable', 'Vert');

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
  `type` tinyint(1) DEFAULT NULL,
  `candidat_id` int(11) DEFAULT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D6498D0EB82` (`candidat_id`),
  UNIQUE KEY `UNIQ_8D93D649A4AEAFEA` (`entreprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom`, `etat`, `date_modiff`, `type`, `candidat_id`, `entreprise_id`) VALUES
(1, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$6SAIR1O1Okle7tXK3i5gf.QHvCuZ1Bilvatnv550WkCusA2wIz7wm', 'admin', 1, NULL, NULL, NULL, NULL),
(2, 'jean-eudes@gmail.com', '[\"ROLE_USER\"]', '$2y$13$sXBgVdZsbZTE9KsVfWV8zuQQAF9uRiMUbaJ29x8oAmEqyphy2aiXK', 'Jean-Eudes', 1, NULL, 1, 1, NULL),
(3, 'rh@rubato.fr', '[\"ROLE_USER\"]', '$2y$13$B91Txp.Fc6WVofCoeTHCY.9ek5wYFXEObyaHdgd8l92wcNb3IedZW', 'Rubato', 1, NULL, 0, NULL, 2),
(7, 'hakimpierre@gmail.com', '[\"ROLE_USER\"]', '$2y$13$Rva04ZWGilYXSEsZ6uGb9.FnG2QttzJjcA49f7RaxQB0Mzv8b8Dt6', 'Pierre', 1, NULL, 1, 4, NULL),
(9, 'adelle@gmail.com', '[\"\"]', '$2y$13$x0rX0pWGrap7Qypd8jpaLu7cSWkjlVhOg0sHv3A6u8I5ByKPn9oRq', 'user2', 0, '2021-09-11', 0, NULL, 3),
(13, 'jp@gmail.com', '[\"ROLE_USER\"]', '$2y$13$hAbuxelqshedLPssPIOQteS6QGRKWbi0oKQd0.VHllZgRIecYU7Bm', 'JP', 1, NULL, 1, 10, NULL),
(14, 'jc@gmail.com', '[\"ROLE_USER\"]', '$2y$13$HqDnWX5GT2qOGEMI2nJRhe6U4ZG5OAvgTd6m5kCC7/j7BZdGrUJE2', 'JC', 1, NULL, 1, 11, NULL),
(15, 'hsh@gmail.com', '[\"ROLE_USER\"]', '$2y$13$kBfogB0VtAgLUgeuNGEfyeEH65peOdBs2MJRZS5UO.wb2ud2rqsFS', 'Home Sweet Home', 1, NULL, 0, NULL, 4),
(16, 'coldBrew@gmail.com', '[\"ROLE_USER\"]', '$2y$13$EtACQ58KIK6yxiQU0VZiLOXdxXhWLBmjXLYJstLIi4maA5WdJrCYW', 'Cold Brew', 1, NULL, 0, NULL, 5),
(17, 'mooi@gmail.com', '[\"ROLE_USER\"]', '$2y$13$3UvN4RAQ4fPl.bDUMfnjPemP6s42DUyCIYqxFLm1OXY7Ltbc2ox22', 'Mooi', 1, NULL, 0, NULL, 6),
(18, 'lv@gmail.com', '[\"ROLE_USER\"]', '$2y$13$idIe0OCOeMyNLYiLLevmtOOPioi4Km3TkJendRRx.UaQWn1lZeWCK', 'Louis Vuitton', 1, NULL, 0, NULL, 7),
(19, 'fitness@gmail.com', '[\"ROLE_USER\"]', '$2y$13$XeIqQQ15xTWqFEPr/H3Fk.eUKAHb12H7VR5jj9fRP7Y6wbG0h31na', 'FitnessFirst', 1, NULL, 0, NULL, 8),
(20, 'georgesFitz@gmail.com', '[\"ROLE_USER\"]', '$2y$13$98GnOkvl0Ad9h68fDblW..CFWIeGSXAWAgIxyJbO2xgsoadShljIa', 'Georges Fitz', 1, NULL, 1, 12, NULL),
(21, 'juliengivre@gmail.com', '[\"ROLE_USER\"]', '$2y$13$kuR1p13F5nlPwhq5Lb0Tg.aYu.6ANX7pdWgcRL8UXn1jOzy.P/g0u', 'Givre', 1, NULL, 1, 13, NULL),
(22, 'estellefrancois@gmail.com', '[\"ROLE_USER\"]', '$2y$13$EY926uxov1wcLotjMO0./.XKEBbqMuyhDMoRkHsvxHCSFychKfYuO', 'estelle', 1, NULL, 1, 14, NULL),
(23, 'pierrety@gmail.com', '[\"ROLE_USER\"]', '$2y$13$JC8O7yTgcN5aIPzTcWQcxeGGeIvYPnjwMw.jtleKVHlmLShpe8W2e', 'Ty', 1, NULL, 1, 15, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id`, `region_id`, `nom`) VALUES
(1, 12, 'Nantes'),
(2, 8, 'Paris'),
(3, 3, 'Rennes'),
(4, 4, 'Orléans'),
(5, 10, 'Bordeaux'),
(6, 12, 'Saint-Nazaire'),
(7, 3, 'Brest');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `FK_6AB5B47124DB436E` FOREIGN KEY (`valeur_principale_id`) REFERENCES `valeur_principale` (`id`),
  ADD CONSTRAINT `FK_6AB5B47152689E22` FOREIGN KEY (`type_contrat_souhaite_id`) REFERENCES `type_contrat` (`id`),
  ADD CONSTRAINT `FK_6AB5B471A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `candidat_competence`
--
ALTER TABLE `candidat_competence`
  ADD CONSTRAINT `FK_CF607D615761DAB` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CF607D68D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `candidat_qualites_disc`
--
ALTER TABLE `candidat_qualites_disc`
  ADD CONSTRAINT `FK_7A988E148D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_7A988E14FAF04E12` FOREIGN KEY (`qualites_disc_id`) REFERENCES `qualites_disc` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `FK_D19FA60264AD6B9` FOREIGN KEY (`type_contrat_propose_id`) REFERENCES `type_contrat` (`id`),
  ADD CONSTRAINT `FK_D19FA60A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`),
  ADD CONSTRAINT `FK_D19FA60D44318DF` FOREIGN KEY (`type_entreprise_id`) REFERENCES `type_entreprise` (`id`),
  ADD CONSTRAINT `FK_D19FA60D465D8D5` FOREIGN KEY (`niveau_demande_id`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_D19FA60F3348854` FOREIGN KEY (`trait_de_caractere_souhaite_id`) REFERENCES `type_qualite` (`id`);

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
  ADD CONSTRAINT `FK_590C1038D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`),
  ADD CONSTRAINT `FK_590C103A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`),
  ADD CONSTRAINT `FK_404021BF8D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`),
  ADD CONSTRAINT `FK_404021BFB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `qualites_disc`
--
ALTER TABLE `qualites_disc`
  ADD CONSTRAINT `FK_9B34DEEFBB305355` FOREIGN KEY (`type_qualite_id`) REFERENCES `type_qualite` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6498D0EB82` FOREIGN KEY (`candidat_id`) REFERENCES `candidat` (`id`),
  ADD CONSTRAINT `FK_8D93D649A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

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
