-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 10 juin 2023 à 21:11
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sise-senegal`
--

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement_apv`
--

CREATE TABLE `approvisionnement_apv` (
  `id_apv` bigint UNSIGNED NOT NULL,
  `idptn_apv` bigint UNSIGNED NOT NULL,
  `idusr_apv` bigint UNSIGNED DEFAULT NULL,
  `montant_apv` double(21,2) DEFAULT NULL,
  `quantite_apv` int DEFAULT NULL,
  `telephone_apv` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_livraison_apv` date NOT NULL,
  `empty1_apv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_apv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_apv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_apv` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `arobase`
--

CREATE TABLE `arobase` (
  `id` bigint UNSIGNED NOT NULL,
  `aromatique` tinyint(1) DEFAULT NULL,
  `col1` int DEFAULT NULL,
  `colonne10` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cadre_logique_cl`
--

CREATE TABLE `cadre_logique_cl` (
  `id_cl` bigint UNSIGNED NOT NULL,
  `code_cl` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `projet_cl` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_cl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_parent_cl` bigint DEFAULT NULL,
  `id_niv_cl` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_cl` int NOT NULL DEFAULT '0',
  `cout_cl` int DEFAULT NULL,
  `idprg_cl` bigint DEFAULT NULL,
  `idprojet_cl` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cadre_logique_cl`
--

INSERT INTO `cadre_logique_cl` (`id_cl`, `code_cl`, `projet_cl`, `intitule_cl`, `id_parent_cl`, `id_niv_cl`, `created_at`, `updated_at`, `geler_cl`, `cout_cl`, `idprg_cl`, `idprojet_cl`) VALUES
(1, '01', '1', 'Mon premier objectif', NULL, 1, '2023-01-24 08:04:47', NULL, 0, 200, NULL, NULL),
(2, '001', '1', 'ccccccccc11111', NULL, 2, NULL, NULL, 1, NULL, NULL, NULL),
(3, '03', '1', 'test2', 2, 2, NULL, NULL, 0, NULL, NULL, NULL),
(5, '04', NULL, 'Objectif 2', NULL, 1, NULL, NULL, 1, 40000, NULL, NULL),
(6, '05', NULL, 'Objectif 5', NULL, 1, NULL, NULL, 1, 30000, NULL, NULL),
(7, '002', NULL, 'sssd2222', NULL, 1, NULL, NULL, 1, 223, NULL, NULL),
(8, '0032', NULL, 'dezezezezez', 2, 2, NULL, NULL, 1, NULL, NULL, NULL),
(9, '001', NULL, 'ccccccccc', 2, 2, NULL, NULL, 0, NULL, NULL, NULL),
(10, 'A1', NULL, 'Activité 1', 8, 3, NULL, NULL, 0, NULL, NULL, NULL),
(11, 'R1', NULL, 'resultat 1', 10, 4, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cadre_resultat_projet_crp`
--

CREATE TABLE `cadre_resultat_projet_crp` (
  `id_crp` bigint UNSIGNED NOT NULL,
  `projet_crp` int NOT NULL,
  `code_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `intitule_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abge_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_niv_crp` int DEFAULT NULL,
  `id_parent_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `liaison_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_resultat_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget_activite_crp` double DEFAULT NULL,
  `categorie_depense_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire_activite_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_crp` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cadre_resultat_projet_crp`
--

INSERT INTO `cadre_resultat_projet_crp` (`id_crp`, `projet_crp`, `code_crp`, `intitule_crp`, `abge_crp`, `id_niv_crp`, `id_parent_crp`, `liaison_crp`, `type_resultat_crp`, `budget_activite_crp`, `categorie_depense_crp`, `commentaire_activite_crp`, `geler_crp`, `created_at`, `updated_at`) VALUES
(1, 0, '002', 'sqsq', NULL, 1, NULL, '11', 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(2, 0, 'R1', 'ssssssss', NULL, 2, '1', NULL, 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(3, 0, '04', 'ddddddd', NULL, 1, NULL, '9', 'Opérationnel', NULL, NULL, NULL, 1, NULL, NULL),
(4, 2, '001', 'Do architecto iure s', NULL, 1, NULL, '9', 'Fonctionnel', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cadre_resultat_projet_crp1`
--

CREATE TABLE `cadre_resultat_projet_crp1` (
  `id_crp` bigint UNSIGNED NOT NULL,
  `projet_crp` int NOT NULL,
  `code_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `intitule_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abge_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_niv_crp` int DEFAULT NULL,
  `id_parent_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `liaison_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_resultat_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `budget_activite_crp` double DEFAULT NULL,
  `categorie_depense_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire_activite_crp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_crp` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cadre_resultat_projet_crp1`
--

INSERT INTO `cadre_resultat_projet_crp1` (`id_crp`, `projet_crp`, `code_crp`, `intitule_crp`, `abge_crp`, `id_niv_crp`, `id_parent_crp`, `liaison_crp`, `type_resultat_crp`, `budget_activite_crp`, `categorie_depense_crp`, `commentaire_activite_crp`, `geler_crp`, `created_at`, `updated_at`) VALUES
(1, 0, '01', 'Activeité 111', NULL, 1, NULL, '1', 'Opérationnel', NULL, NULL, NULL, 1, NULL, NULL),
(6, 0, '02', 'Activité 222', NULL, 2, '12', NULL, 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(7, 0, '03', 'Acrivité 11', NULL, 1, NULL, 'Opérationnel', 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(8, 0, '04', 'Activité 22', NULL, 2, '6', 'Opérationnel', 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(9, 0, '04', 'Activité3', NULL, 3, '6', NULL, 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(10, 0, '05', 'Activité33', NULL, 3, '6', NULL, 'Opérationnel', NULL, NULL, NULL, 0, NULL, NULL),
(11, 0, '06', 'Activité111', NULL, 1, NULL, 'Opérationnel', 'Fonctionnel', NULL, NULL, NULL, 0, NULL, NULL),
(12, 0, '002', 'ssss', NULL, 1, NULL, '1', 'Opérationnel', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_cat`
--

CREATE TABLE `categorie_cat` (
  `id_cat` bigint UNSIGNED NOT NULL,
  `idcat_cat` bigint UNSIGNED DEFAULT NULL,
  `libelle_cat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1_cat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_cat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_cat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_cat` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_depense_cat`
--

CREATE TABLE `categorie_depense_cat` (
  `id_cat` bigint UNSIGNED NOT NULL,
  `code_cat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_cat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_cat` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `montant` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `libelle`, `montant`) VALUES
(1, 'fc', 50000),
(2, 'ig', 55000);

-- --------------------------------------------------------

--
-- Structure de la table `classeur_cl`
--

CREATE TABLE `classeur_cl` (
  `id_cl` bigint UNSIGNED NOT NULL,
  `libelle_cl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `couleur_cl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `projet_cl` bigint NOT NULL,
  `enregisrer_par_cl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_cl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_cl` int NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classeur_cl`
--

INSERT INTO `classeur_cl` (`id_cl`, `libelle_cl`, `couleur_cl`, `projet_cl`, `enregisrer_par_cl`, `modifier_par_cl`, `geler_cl`, `created_at`, `updated_at`) VALUES
(1, 'test', '#592727', 2, '1', NULL, 0, '2023-04-24', '2023-04-24'),
(2, 'test1', '#877373', 2, '1', NULL, 1, '2023-04-24', '2023-06-07'),
(3, 'test3', '#376d40', 2, '1', NULL, 1, '2023-04-24', '2023-06-07'),
(4, 'test4c', '#c6d936', 2, '1', '1', 1, '2023-04-24', '2023-06-07'),
(5, 'test', '#4175c8', 2, '1', NULL, 1, '2023-04-24', '2023-04-24'),
(6, 'test9', '#781212', 2, '1', NULL, 0, '2023-06-08', '2023-06-08');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` bigint UNSIGNED NOT NULL,
  `numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `colonnes_feuilles`
--

CREATE TABLE `colonnes_feuilles` (
  `id_col` bigint UNSIGNED NOT NULL,
  `id_feuille` bigint DEFAULT NULL,
  `nom_colonne` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rang` bigint DEFAULT NULL,
  `affiche` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `champ` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `colonnes_feuilles`
--

INSERT INTO `colonnes_feuilles` (`id_col`, `id_feuille`, `nom_colonne`, `rang`, `affiche`, `created_at`, `updated_at`, `champ`) VALUES
(1, 6, 'Janna Hess', NULL, NULL, '2023-05-23 11:55:11', '2023-05-23 11:55:11', NULL),
(2, 7, 'Eleanor Stuart', NULL, NULL, '2023-05-23 11:56:21', '2023-05-23 11:56:21', NULL),
(3, 8, 'nom', NULL, NULL, '2023-05-23 12:14:00', '2023-05-23 12:14:00', NULL),
(4, 8, 'prenom', NULL, NULL, '2023-05-23 12:14:00', '2023-05-23 12:14:00', NULL),
(7, 10, 'num', NULL, NULL, '2023-05-23 14:38:07', '2023-05-23 14:38:07', 'numero'),
(8, 10, 'teleph', NULL, NULL, '2023-05-23 14:38:07', '2023-05-23 14:38:07', 'telephone'),
(9, 11, 'Lieu', NULL, NULL, '2023-05-23 14:57:37', '2023-05-23 14:57:37', 'lieu'),
(10, 11, 'Profession', NULL, NULL, '2023-05-23 14:57:37', '2023-05-23 14:57:37', 'profession'),
(13, 13, 'code', NULL, NULL, '2023-06-03 13:44:39', '2023-06-03 13:44:39', 'code'),
(15, 14, 'cercle', NULL, NULL, '2023-06-03 21:12:07', '2023-06-03 21:12:07', 'cercle'),
(16, 15, 'kk', NULL, NULL, '2023-06-03 21:38:33', '2023-06-03 21:38:33', 'kk'),
(17, 16, 'zb', NULL, NULL, '2023-06-03 23:14:14', '2023-06-03 23:14:14', 'ab'),
(18, 17, 'aro', NULL, NULL, '2023-06-03 23:21:25', '2023-06-03 23:21:25', 'aro'),
(19, 18, 'class1', NULL, NULL, '2023-06-04 00:27:03', '2023-06-04 00:27:03', 'class1'),
(20, 11, 'sexe', NULL, NULL, '2023-06-04 01:15:35', '2023-06-04 01:15:35', 'sexe'),
(21, 11, 'age', NULL, NULL, '2023-06-04 01:18:01', '2023-06-04 01:18:01', 'age'),
(22, 11, 'teint', NULL, NULL, '2023-06-04 01:18:01', '2023-06-04 01:18:01', 'teint'),
(23, 11, 'nationalité', NULL, NULL, '2023-06-05 14:25:30', '2023-06-05 14:25:30', 'nationalite'),
(24, 11, 'la taille1', NULL, NULL, '2023-06-05 18:23:23', '2023-06-07 22:27:51', 'taille'),
(25, 4, 'col6', NULL, NULL, '2023-06-07 14:50:41', '2023-06-07 14:50:41', 'colonne6'),
(26, 17, 'coll1', NULL, NULL, '2023-06-07 14:52:22', '2023-06-07 14:52:22', 'col1'),
(27, 17, 'col8', NULL, NULL, '2023-06-07 15:54:11', '2023-06-07 15:54:11', 'colonne8'),
(28, 8, 'moh', NULL, NULL, '2023-06-07 22:14:10', '2023-06-07 22:22:48', 'example1'),
(29, 8, 'klkklklklklk', NULL, NULL, '2023-06-07 22:14:10', '2023-06-07 22:24:56', 'exemple2'),
(36, 19, 'lataille6', NULL, NULL, '2023-06-08 10:14:44', '2023-06-08 11:07:40', 'exempl6'),
(37, 19, 'exe2', NULL, NULL, '2023-06-08 10:14:44', '2023-06-08 10:14:44', 'example2'),
(38, 19, 'exe3', NULL, NULL, '2023-06-08 10:14:44', '2023-06-08 10:14:44', 'example3'),
(40, 20, 'azerty1', NULL, NULL, '2023-06-08 14:11:21', '2023-06-08 14:11:21', 'az1'),
(41, 20, 'azerty2', NULL, NULL, '2023-06-08 14:11:21', '2023-06-08 14:11:21', 'az2'),
(42, 21, 'nom', NULL, NULL, '2023-06-09 12:01:15', '2023-06-09 12:01:15', 'NOM'),
(43, 21, 'prenom', NULL, NULL, '2023-06-09 12:01:15', '2023-06-09 12:01:15', 'PRENOM'),
(44, 21, 'CLASSE', NULL, NULL, '2023-06-09 12:01:15', '2023-06-10 12:59:27', 'classe'),
(45, 22, 'libelle', NULL, NULL, '2023-06-09 12:10:22', '2023-06-09 12:10:22', 'libelle'),
(46, 22, 'mont', NULL, NULL, '2023-06-09 12:10:22', '2023-06-09 12:10:22', 'montant'),
(47, 23, 'quantite', NULL, NULL, '2023-06-09 17:14:29', '2023-06-09 17:17:19', 'quantité'),
(48, 23, 'prd', NULL, NULL, '2023-06-09 17:14:29', '2023-06-09 17:14:29', 'produit');

-- --------------------------------------------------------

--
-- Structure de la table `commande_cmd`
--

CREATE TABLE `commande_cmd` (
  `id_cmd` bigint UNSIGNED NOT NULL,
  `numero_cmd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idptn_cmd` bigint UNSIGNED NOT NULL,
  `idusr_cmd` bigint UNSIGNED DEFAULT NULL,
  `montant_cmd` double(21,2) DEFAULT NULL,
  `montant_payer_cmd` double(21,2) DEFAULT NULL,
  `quantite_cmd` int DEFAULT NULL,
  `telephone_cmd` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_livraison_cmd` date NOT NULL,
  `empty1_cmd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_cmd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_cmd` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_cmd` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `convention_cvt`
--

CREATE TABLE `convention_cvt` (
  `id` bigint UNSIGNED NOT NULL,
  `code_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idpat_cvt` bigint UNSIGNED NOT NULL,
  `intitule_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reference_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `montant_cvt` double(21,2) DEFAULT NULL,
  `idprj_cvt` bigint UNSIGNED DEFAULT NULL,
  `structure_cvt` bigint UNSIGNED DEFAULT NULL,
  `date_signature_cvt` date NOT NULL,
  `champ_app_cvt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_debut_cvt` date DEFAULT NULL,
  `date_fin_cvt` date DEFAULT NULL,
  `idusrcreation_cvt` bigint UNSIGNED NOT NULL,
  `empty1_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_cvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_cvt` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `convention_cvt`
--

INSERT INTO `convention_cvt` (`id`, `code_cvt`, `idpat_cvt`, `intitule_cvt`, `reference_cvt`, `montant_cvt`, `idprj_cvt`, `structure_cvt`, `date_signature_cvt`, `champ_app_cvt`, `date_debut_cvt`, `date_fin_cvt`, `idusrcreation_cvt`, `empty1_cvt`, `empty2_cvt`, `empty3_cvt`, `created_at`, `updated_at`, `geler_cvt`) VALUES
(1, '011', 1, 'Indicateur 1', 'zz', 150000.00, NULL, NULL, '2023-02-02', 'sss', '2023-02-02', '2023-02-02', 1, NULL, NULL, NULL, '2023-02-02 17:17:14', '2023-02-08 17:23:46', 0),
(2, '3454', 2, 'Qui est ut lorem sun', 'redd12', 7600.00, NULL, NULL, '1972-09-29', 'Fugit deserunt reic', '1986-08-15', '2014-09-14', 1, NULL, NULL, NULL, '2023-02-08 17:28:30', '2023-02-08 17:28:44', 1);

-- --------------------------------------------------------

--
-- Structure de la table `convention_resultat`
--

CREATE TABLE `convention_resultat` (
  `id_cvr` bigint UNSIGNED NOT NULL,
  `code_cvr` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `convention_cvr` bigint UNSIGNED DEFAULT NULL,
  `intitule_cvr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ordre_cvr` bigint UNSIGNED DEFAULT NULL,
  `fiche_cvr` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_cvr` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `convention_resultat`
--

INSERT INTO `convention_resultat` (`id_cvr`, `code_cvr`, `convention_cvr`, `intitule_cvr`, `ordre_cvr`, `fiche_cvr`, `created_at`, `updated_at`, `geler_cvr`) VALUES
(1, '01', 1, 'Indicateur 1', NULL, NULL, '2023-02-07 11:37:34', '2023-02-08 16:19:52', 1),
(4, '002', 1, 'Indicateur 123', NULL, NULL, '2023-02-08 15:07:19', '2023-02-08 16:19:32', 0),
(5, '03', 1, 'Quasi et laudantium', NULL, NULL, '2023-02-08 16:17:17', '2023-02-08 16:17:17', 0);

-- --------------------------------------------------------

--
-- Structure de la table `departement_dep`
--

CREATE TABLE `departement_dep` (
  `id_dep` bigint UNSIGNED NOT NULL,
  `code_dep` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_dep` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abrege_dep` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_dep` bigint DEFAULT NULL,
  `idusrcreation_modif_dep` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idreg_dep` bigint UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `depense_dep`
--

CREATE TABLE `depense_dep` (
  `id_dep` bigint UNSIGNED NOT NULL,
  `motif_dep` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `montant_dep` double(21,2) NOT NULL,
  `date_depense_dep` datetime NOT NULL,
  `description_dep` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `empty1_dep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_dep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_dep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_dep` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `docs_dossier`
--

CREATE TABLE `docs_dossier` (
  `id_doss` bigint UNSIGNED NOT NULL,
  `libelle_dossier` varchar(60) DEFAULT NULL,
  `geller` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `docs_fichier`
--

CREATE TABLE `docs_fichier` (
  `id_fich` bigint UNSIGNED NOT NULL,
  `libelle_fichier` varchar(60) DEFAULT NULL,
  `geller` int DEFAULT NULL,
  `id_dossier` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `id` bigint UNSIGNED NOT NULL,
  `NOM` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRENOM` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `classe` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`id`, `NOM`, `PRENOM`, `classe`) VALUES
(1, 'mohamed', 'traore', 'fc'),
(2, 'kone', 'abdou', 'ig'),
(3, 'Toure', 'Ami', 'fc');

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint UNSIGNED NOT NULL,
  `col1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `id` bigint UNSIGNED NOT NULL,
  `col1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col4` varchar(21) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `eleveur`
--

CREATE TABLE `eleveur` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `eleveur`
--

INSERT INTO `eleveur` (`id`, `code`) VALUES
(1, 'C10');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `feuille_f`
--

CREATE TABLE `feuille_f` (
  `id_f` bigint UNSIGNED NOT NULL,
  `classeur_f` bigint NOT NULL,
  `nom_f` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `table_f` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enregisrer_par_f` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_f` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_f` int NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `feuille_f`
--

INSERT INTO `feuille_f` (`id_f`, `classeur_f`, `nom_f`, `table_f`, `enregisrer_par_f`, `modifier_par_f`, `geler_f`, `created_at`, `updated_at`) VALUES
(20, 1, 'feuilles23', 'rapport12', '1', NULL, 0, '2023-06-08', '2023-06-08'),
(2, 2, 'la liste des eleves', 'eleves', '1', NULL, 0, '2023-05-19', '2023-05-19'),
(3, 2, 'les écoles', 'ecoles', '1', NULL, 0, '2023-05-19', '2023-05-19'),
(4, 2, 'Reprehenderit odit a', 'tb_sgs', '1', NULL, 0, '2023-05-19', '2023-05-19'),
(22, 6, 'CLASSE', 'classe', '1', NULL, 0, '2023-06-09', '2023-06-09'),
(19, 1, 'feulle26', 'moh2', '1', NULL, 0, '2023-06-07', '2023-06-07'),
(21, 6, 'ECOLE', 'ecole', '1', NULL, 0, '2023-06-09', '2023-06-09'),
(10, 2, 'client', 'client', '1', NULL, 0, '2023-05-23', '2023-05-23'),
(23, 6, 'Stock', 'stock', '1', NULL, 0, '2023-06-09', '2023-06-09'),
(13, 4, 'mes clients', 'eleveura', '1', '1', 0, '2023-06-03', '2023-06-03'),
(17, 3, 'arobase', 'arobase', '1', '1', 0, '2023-06-03', '2023-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `fonction_fnct`
--

CREATE TABLE `fonction_fnct` (
  `id_fnct` bigint UNSIGNED NOT NULL,
  `nom_fnct` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_fnct` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `agence_fnct` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_fnct` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fonction_fnct`
--

INSERT INTO `fonction_fnct` (`id_fnct`, `nom_fnct`, `description_fnct`, `agence_fnct`, `created_at`, `updated_at`, `geler_fnct`) VALUES
(1, 'Reprehenderit odit a', 'Amet dolor inventor', '1', '2023-03-14 11:23:44', '2023-03-14 11:23:44', 0),
(2, 'Fonc1', 'mon pelier', '3', '2023-06-10 14:36:13', '2023-06-10 14:36:13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `indicateur_programme_iprg`
--

CREATE TABLE `indicateur_programme_iprg` (
  `id_iprg` bigint UNSIGNED NOT NULL,
  `code_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `niveau_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_cible_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valeur_cible_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `annee_reference_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valeur_reference_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referentiel_iprg` int DEFAULT NULL,
  `unite_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `source_verification_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mode_calcul_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `projet_iprg` int NOT NULL,
  `echelle_iprg` int NOT NULL DEFAULT '1',
  `enregistrer_par_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `geler_iprg` int NOT NULL DEFAULT '0',
  `niveau_cl_iprg` bigint DEFAULT NULL,
  `periodicite_calcul_iprg` bigint DEFAULT NULL,
  `donnees_sources_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `niveau_desagregation_iprg` bigint DEFAULT NULL,
  `moyen_diffusion_iprg` bigint DEFAULT NULL,
  `responsabilite_calcul_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `methode_collecte_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diffusion_iprg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `indicateur_programme_iprg`
--

INSERT INTO `indicateur_programme_iprg` (`id_iprg`, `code_iprg`, `intitule_iprg`, `niveau_iprg`, `intitule_cible_iprg`, `valeur_cible_iprg`, `annee_reference_iprg`, `valeur_reference_iprg`, `referentiel_iprg`, `unite_iprg`, `source_verification_iprg`, `mode_calcul_iprg`, `description_iprg`, `projet_iprg`, `echelle_iprg`, `enregistrer_par_iprg`, `created_at`, `updated_at`, `page_iprg`, `geler_iprg`, `niveau_cl_iprg`, `periodicite_calcul_iprg`, `donnees_sources_iprg`, `niveau_desagregation_iprg`, `moyen_diffusion_iprg`, `responsabilite_calcul_iprg`, `methode_collecte_iprg`, `diffusion_iprg`) VALUES
(1, '01', 'Evolution du score des outils d’évaluation de l’efficacité de gestion appliqués au PNA (METT, IMET', '3', '32', '23', '2023', '23', NULL, '2', 'Rapport du ministére v1', 'moyenne', NULL, 0, 1, NULL, '2023-01-25 12:44:30', '2023-01-31 17:20:14', 'non', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Vel modi aut minima', 'Dolore consequatur i', '3', 'Mollit doloremque su', 'Velit magnam volupt', 'Ut aut officia repud', 'Rem in itaque dolore', NULL, '4', 'Minim fugiat vitae', 'moyenne', NULL, 0, 1, NULL, '2023-01-25 13:30:27', '2023-02-01 11:02:11', '--Choisissez--', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '03', 'Indicateur objectif global', '5', '11zzz', '1112', '2022', '12', NULL, '1', 'test', 'somme', NULL, 0, 1, NULL, '2023-01-25 14:17:45', '2023-02-01 10:56:50', 'non', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '1000', 'Magni exercitationem', '1', 'Numquam natus obcaec', '1100', '2023', '12', NULL, '1', 'Officiis quia dolore', 'moyenne', NULL, 0, 1, NULL, '2023-03-07 08:36:11', '2023-03-07 08:36:11', 'oui', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `indicateur_projet_iprj`
--

CREATE TABLE `indicateur_projet_iprj` (
  `id_iprj` bigint UNSIGNED NOT NULL,
  `niveau_iprj` int DEFAULT NULL,
  `liaison_prg_iprj` int DEFAULT NULL,
  `code_indicateur_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unite_iprj` int DEFAULT NULL,
  `intitule_cible_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valeur_cible_iprj` double DEFAULT NULL,
  `valeur_cible_rmp_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_reference_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `annee_reference_iprj` int DEFAULT NULL,
  `valeur_reference_iprj` double DEFAULT NULL,
  `periodicite_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `source_verification_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fonction_agregat_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referentiel_iprj` int DEFAULT NULL,
  `typologie_iprj` int NOT NULL DEFAULT '1',
  `responsable_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fournisseur_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `echelle_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mode_suivi_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categorie_indicateur_iprj` int DEFAULT NULL,
  `paccueil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `projet_iprj` int NOT NULL,
  `enregistrer_par_iprj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_iprj` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `indicateur_projet_iprj`
--

INSERT INTO `indicateur_projet_iprj` (`id_iprj`, `niveau_iprj`, `liaison_prg_iprj`, `code_indicateur_iprj`, `code_iprj`, `intitule_iprj`, `unite_iprj`, `intitule_cible_iprj`, `valeur_cible_iprj`, `valeur_cible_rmp_iprj`, `intitule_reference_iprj`, `annee_reference_iprj`, `valeur_reference_iprj`, `periodicite_iprj`, `source_verification_iprj`, `fonction_agregat_iprj`, `referentiel_iprj`, `typologie_iprj`, `responsable_iprj`, `fournisseur_iprj`, `description_iprj`, `echelle_iprj`, `mode_suivi_iprj`, `categorie_indicateur_iprj`, `paccueil`, `projet_iprj`, `enregistrer_par_iprj`, `created_at`, `updated_at`, `geler_iprj`) VALUES
(1, 8, NULL, '2', '01', 'Indicateur 1', 1, 'Intitulé de la valeur cible', 21, '213', 'Intitulé de la valeur de réference', 2023, 21, 'fin', 'Rapport du ministère', 'moyenne', NULL, 1, 'Dra', 'dra', NULL, 'regionnale', 'fiche', 1, 'non', 2, NULL, '2023-01-26 14:26:06', '2023-02-01 10:54:13', 1),
(2, 11, NULL, '1', 'Id excepturi amet n', 'Error autem sunt bla', 1, 'Molestiae ipsum qui', 212, '212', 'Proident perspiciat', 2023, 212, 'fin', 'Cupiditate aut in ab', 'moyenne', NULL, 1, 'Sit consectetur et', 'Eos sint ad neque s', NULL, 'nationnale', 'fiche', 2, 'oui', 2, NULL, '2023-01-26 21:40:16', '2023-02-01 10:46:59', 1),
(3, 3, NULL, '4', '01', 'Obcaecati ut ullamco', 1, '3', 3, '3', 'Repudiandae est ea c', 2023, 2, 'annuelle', 'Similique quis do ut', 'somme', NULL, 1, 'Nam est illum rerum', 'Sed do sed provident', NULL, 'nationnale', 'direct', 1, 'oui', 2, NULL, '2023-03-15 08:29:01', '2023-03-15 08:29:01', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lana mcpherson`
--

CREATE TABLE `lana mcpherson` (
  `id` bigint UNSIGNED NOT NULL,
  `Quibusdam rerum non` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `localites_loc`
--

CREATE TABLE `localites_loc` (
  `id_localite` bigint UNSIGNED NOT NULL,
  `code_localite` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_localite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_parent_localite` bigint UNSIGNED DEFAULT NULL,
  `code_localite_national` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idniv_localite` bigint UNSIGNED DEFAULT NULL,
  `abreviation_localite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `longitude_localite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude_localite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homme_localite` int DEFAULT NULL,
  `femme_localite` int DEFAULT NULL,
  `jeune_localite` int DEFAULT NULL,
  `menage_localite` int DEFAULT NULL,
  `geler_localite` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `localites_loc`
--

INSERT INTO `localites_loc` (`id_localite`, `code_localite`, `intitule_localite`, `id_parent_localite`, `code_localite_national`, `idniv_localite`, `abreviation_localite`, `longitude_localite`, `latitude_localite`, `homme_localite`, `femme_localite`, `jeune_localite`, `menage_localite`, `geler_localite`) VALUES
(1, '01', 'Kayes', NULL, '#c7dbcc', 1, 'Kayes', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '01', 'Yelemané', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '01', 'Gory', 2, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '01', 'Fongou', 3, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '02', 'Gory', 3, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '02', 'xx', NULL, '#000000', 1, 'xx', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, '01', 'xxxxx', NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `localite_loc`
--

CREATE TABLE `localite_loc` (
  `id_loc` bigint UNSIGNED NOT NULL,
  `id_parent_localite_loc` bigint UNSIGNED DEFAULT NULL,
  `idlon_loc` bigint UNSIGNED DEFAULT NULL,
  `code_loc` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_loc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `longitude_loc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude_loc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homme_loc` int DEFAULT NULL,
  `femme_loc` int DEFAULT NULL,
  `jeune_loc` int DEFAULT NULL,
  `menage_loc` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_16_112614_create_modules_table', 1),
(6, '2021_04_16_144058_create_profils_table', 1),
(7, '2021_04_16_144421_create_profil_modules_table', 1),
(8, '2022_07_18_233552_create_categories_table', 1),
(9, '2022_07_18_234159_create_parametres_table', 1),
(10, '2022_07_18_234211_create_type_parametres_table', 1),
(11, '2022_07_19_004733_create_produits_table', 1),
(12, '2022_08_21_105802_create_commandes_table', 1),
(13, '2022_08_21_105803_create_approvisionnements_table', 1),
(14, '2022_09_16_172224_create_produit_approvisionnements_table', 1),
(15, '2022_09_16_172224_create_produit_commandes_table', 1),
(16, '2022_10_05_182141_create_partenaires_table', 1),
(17, '2022_10_30_145913_create_statut_commandes_table', 1),
(18, '2022_10_30_151128_create_versements_table', 1),
(19, '2022_11_25_154258_create_depenses_table', 1),
(20, '2022_11_25_154719_create_rapports_table', 1),
(21, '2022_12_11_211133_create_partenaire_pat_table', 1),
(22, '2022_12_11_212111_create_unite_indicateur_uid_table', 1),
(23, '2022_12_11_212502_create_programme_prg_table', 1),
(24, '2022_12_11_212654_create_projet_prj_table', 1),
(25, '2022_12_12_125333_add_column_programme', 1),
(26, '2022_12_12_173846_create_fonction_fnct_table', 1),
(27, '2022_12_12_205607_create_categorie_depense_cat_table', 1),
(28, '2022_12_12_205811_create_thematique_tmq_table', 1),
(29, '2022_12_12_205903_create_unite_indicateur_uti_table', 1),
(30, '2022_12_12_211413_create_niveau_localite_lon_table', 1),
(31, '2022_12_12_211530_create_localite_loc_table', 1),
(32, '2022_12_13_101125_add_column_iduser', 1),
(33, '2022_12_13_124357_add_column_gelerfonction', 1),
(34, '2022_12_13_125151_add_column_gelercategorie', 1),
(35, '2022_12_13_125256_add_column_gelerunite', 1),
(36, '2022_12_13_125357_add_column_gelerthematique', 1),
(37, '2022_12_13_215250_create_region_reg_table', 1),
(38, '2022_12_13_215837_create_departement_dep_table', 1),
(39, '2022_12_14_102904_create_type_partenaire_tpt_table', 1),
(40, '2022_12_14_132706_add_column_gelerpartenaire', 1),
(41, '2022_12_14_143027_create_sous_prefecture_spf_table', 1),
(42, '2022_12_14_145040_add_column_gelerprogramme', 1),
(43, '2022_12_14_145152_create_villages_vil_table', 1),
(44, '2022_12_14_145332_create_type_type_programme_tpr_table', 1),
(45, '2022_12_15_123822_add_column_village', 1),
(46, '2022_12_21_202457_add_columns_projets', 1),
(47, '2022_12_29_115437_add_fonction_to_users_table', 1),
(48, '2023_01_02_171429_create_projets_users_table', 1),
(49, '2023_01_04_111325_create_niveau_localite_nvl_table', 2),
(50, '2023_01_04_111648_create_localites_loc_table', 2),
(51, '2023_01_04_222952_add_champ_to_localites_table', 2),
(52, '2023_01_19_164502_create_categorie_localite_catloc', 3),
(53, '2023_01_19_172044_create_categorie_localite_catloc', 4),
(54, '2023_01_23_074341_add_colum_niveau_to_niveau_localite_nvl', 5),
(55, '2023_01_23_090625_create_niveau_cadre_logique_ncl', 6),
(56, '2023_01_23_090753_create_cadre_logique_cl', 6),
(57, '2023_01_23_134321_create_type_cadre_logique_tcl', 7),
(58, '2023_01_23_144944_add_colum_geler_tcl_to_type_cadre_logique_tcl', 8),
(59, '2023_01_23_212018_create_cadre_logique_cl', 9),
(60, '2023_01_24_220519_create_indicateur_cs', 10),
(61, '2023_01_25_111952_create_indicateur_programme_ip', 11),
(62, '2023_01_25_123827_create_indicateur_programme_ip', 12),
(63, '2023_01_25_124310_create_indicateur_programme_iprg', 13),
(64, '2023_01_25_161122_add_cout_cl_cadre_logique_cl', 14),
(65, '2023_01_25_204858_create_indicateur_projet_iprj', 15),
(66, '2023_01_25_205026_create_niveau_cadre_resultat_projet_ncrp', 15),
(67, '2023_01_25_205124_create_cadre_resultat_projet_crp', 15),
(68, '2023_01_25_213416_create_cadre_resultat_projet_crp', 16),
(69, '2023_01_25_214705_create_indicateur_projet_iprj', 17),
(70, '2023_01_26_084535_create_indicateur_projet_iprj', 18),
(71, '2023_01_26_123357_create_cadre_resultat_projet_crp', 19),
(72, '2023_02_01_130029_add_geler_ncl_niveau_cadre_logique_ncl', 20),
(73, '2023_02_01_130134_add_geler_ncrp_niveau_cadre_resultat_projet_ncrp', 20),
(74, '2023_02_02_113927_create_plan_analytique_pa', 21),
(75, '2023_02_02_114001_create_niveau_plan_analytique_npa', 21),
(76, '2023_02_02_150959_create_plan_analytique_pa', 22),
(77, '2023_02_02_151020_create_niveau_plan_analytique_npa', 22),
(78, '2023_02_02_151823_create_plan_analytique_pa', 23),
(79, '2023_01_30_133045_create_convention_resultat_table', 24),
(80, '2023_01_31_105229_create_type_activite_table', 24),
(81, '2023_01_31_224914_create_type_tache_activite_table', 24),
(82, '2023_02_01_120546_create_type_activite_convention_table', 24),
(83, '2023_02_01_123541_add_description_to_tasks', 24),
(84, '2023_02_02_131342_add_iduser_to_tasks', 25),
(85, '2023_02_06_101338_create_ptba', 26),
(86, '2023_02_06_162044_create_ptba', 27),
(87, '2023_02_07_084723_create_ptba_indicateur_pi', 28),
(88, '2023_02_07_084835_create_ptba_cout_pc', 28),
(89, '2023_02_07_100635_create_type_tache_tt', 28),
(90, '2023_02_07_132738_add_geler_tpa_type_activite_tpa', 29),
(91, '2023_02_07_165721_create_ptba_tache_pt', 30),
(92, '2023_02_08_153430_add_geler_tac_type_activite_convention_tac', 31),
(93, '2023_02_08_172712_add_geler_cvt_convention_cvt', 32),
(94, '2023_02_06_165357_add_idprogramme_to_cadrelogique', 33),
(95, '2023_02_10_105347_create_recommandation_rc', 33),
(96, '2023_02_10_113544_create_recommandation_rc', 34),
(97, '2023_02_12_195218_add_geler_nvl_niveau_localite_nvl', 35),
(98, '2023_02_12_195253_add_taille_nvl_niveau_localite_nvl', 35),
(99, '2023_02_12_203256_add_geler_localite_localites_loc', 36),
(100, '2023_02_13_164151_add_idprogramme_to_plan_analytique', 37),
(101, '2023_02_17_113140_add_colonne_id_programme_to_niveau_cadre_logique_ncl', 37),
(102, '2023_02_18_212816_add_geler_prj_projet_prj', 37),
(103, '2023_02_19_001153_add_geler_users', 37),
(104, '2023_02_19_001243_add_titre_users', 37),
(105, '2023_02_19_001315_add_structure_users', 37),
(106, '2023_02_19_011316_add_telephone_users', 37),
(107, '2023_02_22_131340_create_observation_ptba_op', 38),
(108, '2023_02_22_131428_create_suivi_tache_ptba_stp', 38),
(109, '2023_02_22_131533_create_suivi_indicateur_ptba_sip', 38),
(110, '2023_02_22_171650_add_lot_suivi_tache_ptba_stp', 39),
(111, '2023_02_22_171725_add_source_suivi_tache_ptba_stp', 39),
(112, '2023_02_22_194545_create_suivi_tache_ptba_stp', 40),
(113, '2023_02_23_152038_create_suivi_tache_ptba_stp', 41),
(114, '2023_02_23_153359_create_suivi_tache_ptba_stp', 42),
(115, '2023_02_23_153534_create_suivi_tache_ptba_stp', 43),
(116, '2023_03_01_105040_add_geler_sip_suivi_indicateur_ptba_sip', 44),
(117, '2023_03_01_110106_add_id_activite_sip_suivi_indicateur_ptba_sip', 45),
(118, '2023_03_07_115857_create_suivi_indicateur_pp', 46),
(119, '2023_03_01_234715_add_colonne_niveau_cl_iprg', 47),
(120, '2023_03_06_222217_add_colonne_suplementaires', 47),
(121, '2023_03_07_130654_add_colonne', 47),
(122, '2023_02_14_155259_create_recommandation_action', 48),
(123, '2023_02_20_122251_add_colonne_annee_to_programme_prg', 48),
(124, '2023_02_21_110231_add_colonne_idprojet_niveau_cadre_resultat_projet', 48),
(125, '2023_02_21_141953_add_colonne_idprojet_id_programme_niveau_plan_analytique', 48),
(126, '2023_02_28_225815_add_colonne_trimestre_ptba', 48),
(127, '2023_04_24_104039_create_classeur_cl', 49),
(128, '2023_04_24_105252_create_classeur_cl', 50),
(129, '2023_04_24_124934_create_classeur_cl', 51),
(130, '2023_04_24_125725_create_classeur_cl', 52),
(131, '2023_04_24_130055_create_classeur_cl', 53),
(132, '2023_04_24_142945_create_feuille_f', 54),
(133, '2023_04_25_105134_create_feuille_f', 55),
(134, '2023_05_20_231134_create_colonnes_feuilles_table', 56),
(135, '2023_05_23_134922_add_champ_table', 57),
(136, '2023_02_06_163308_add_idprojet_to_cadrelogique', 58);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `idsmo` bigint UNSIGNED DEFAULT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `icone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lien` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `idsmo`, `libelle`, `icone`, `lien`, `class`, `empty1`, `empty2`, `empty3`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(13, 12, 'Cadre stratégique', 'icon-store', 'cadre_logique.index', '', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, NULL, 'Cadre de résultat', 'icon-cogs', '', 'dashboard/cadre_resultat/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 6, 'Autres paramètres', 'icon-cogs', 'autres.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 6, 'Acteurs clés', 'icon-cogs', 'partenaire.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 6, 'Projets', 'icon-drawer3', 'projet.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 6, 'Programme', 'icon-store', 'programme.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 6, 'Localités', 'icon-store', 'localite.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, NULL, 'Paramétrage', 'icon-cogs', '', 'dashboard/parametrage/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 2, 'Profils', 'icon-hammer-wrench', 'profil.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 2, 'Utilisateurs', 'icon-users4', 'user.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'Administration', 'icon-stack', 'dashboard.home', 'dashboard/administration/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 2, 'Modules', 'icon-drawer3', 'module.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(1, NULL, 'Accueil', 'icon-home4', 'dashboard.home', 'true', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 12, 'Indicateurs Programmes', 'icon-drawer3', 'indicateur_cs.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, 12, 'Cadre résultat projet', 'icon-home4', 'cadre_resultat_projet.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(19, 6, 'Plan Analytique', 'icon-cogs', 'plan_analytique.index', 'false', NULL, NULL, NULL, NULL, '2023-02-02 10:39:54', '2023-02-02 10:39:54', 1),
(17, 12, 'Indicateurs Projets', 'icon-stack', 'indicateur_projet.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, NULL, 'Programmation', 'icon-cogs', 'programmation', 'dashboard/programmation/*', NULL, NULL, NULL, NULL, '2023-02-02 17:15:34', '2023-02-02 17:15:34', 1),
(21, 20, 'Conventions', 'icon-store', 'convention.index', 'false', NULL, NULL, NULL, NULL, '2023-02-02 17:16:15', '2023-02-02 17:16:15', 1),
(22, 20, 'Type Activité', 'icon-cogs', 'type_activite.index', 'false', NULL, NULL, NULL, NULL, '2023-02-03 13:53:59', '2023-02-03 13:53:59', 1),
(23, 20, 'PTBA', 'icon-stack', 'ptba.index', 'false', NULL, NULL, NULL, NULL, '2023-02-06 10:26:34', '2023-02-06 10:26:34', 1),
(24, 20, 'Récommandation', 'icon-store', 'recommandation.index', 'false', NULL, NULL, NULL, NULL, '2023-02-10 12:03:44', '2023-02-10 12:03:44', 1),
(25, NULL, 'Suivi de résultat', 'icon-home4', '', 'dashboard/suivi_resultat/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(26, 25, 'Suivi PTBA', 'icon-home4', 'suivi_ptba.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(27, 25, 'Suivi Indicateur Programme', 'icon-home4', 'suivi_indicateur_cs.index', 'fase', NULL, NULL, NULL, NULL, '2023-03-07 08:13:02', '2023-03-07 08:28:25', 1),
(28, 25, 'Suivi Indicateur Projet', 'icon-home4', 'suivi_indicateur_projet.index', 'fase', NULL, NULL, NULL, NULL, '2023-03-07 08:20:59', '2023-03-07 08:28:45', 1),
(29, NULL, 'Etats & Rapports', 'icon-home4', 'dashboard/etat_rapport/*', 'dashboard/etat_rapport/*', NULL, NULL, NULL, NULL, '2023-03-30 09:40:29', '2023-03-30 09:40:29', 1),
(30, 29, 'Etats PTBA', 'icon-home4', 'etat_ptba.index', 'false', NULL, NULL, NULL, NULL, '2023-03-30 09:46:06', '2023-03-30 09:46:06', 1),
(31, 29, 'Etats Suivi des résultats', 'icon-home4', 'etat_suivi_resultat.index', 'false', NULL, NULL, NULL, NULL, '2023-03-30 09:47:40', '2023-03-30 09:47:40', 1),
(32, 29, 'Rapport Indicateur', 'icon-home4', 'rapport_indicateur.index', 'false', NULL, NULL, NULL, NULL, '2023-03-30 09:48:48', '2023-03-30 09:48:48', 1),
(33, 25, 'Fiches Dynamiques', 'icon-home4', 'classeur.index', 'false', NULL, NULL, NULL, NULL, '2023-04-24 12:10:36', '2023-04-24 12:10:36', 1),
(34, 34, 'dossier', 'icon-stack', 'dossier.index', 'true', NULL, NULL, NULL, '2023-06-07 14:23:22', '2023-06-07 14:20:39', '2023-06-07 14:23:22', 1),
(35, NULL, 'Documentation', 'icon-stack', 'dashboard/documentation/*', 'false', NULL, NULL, NULL, NULL, '2023-06-07 14:24:43', '2023-06-07 14:24:43', 1),
(36, 35, 'dossier', 'icon-stack', 'dossier.index', 'false', NULL, NULL, NULL, NULL, '2023-06-07 14:25:29', '2023-06-07 14:25:29', 1),
(37, 35, 'Fichier', 'icon-stack', 'fichier.index', 'false', NULL, NULL, NULL, '2023-06-07 16:54:29', '2023-06-07 14:27:02', '2023-06-07 16:54:29', 1),
(38, NULL, 'Rapport_Dynamique', 'icon-store', 'rapport_dynamique', 'dashboard/rapport_dynamique/*', NULL, NULL, NULL, NULL, '2023-06-08 12:50:46', '2023-06-08 12:50:46', 1),
(39, 38, 'rapport_dynamique', 'icon-store', 'rapport_dynamique.index', 'false', NULL, NULL, NULL, NULL, '2023-06-08 12:53:05', '2023-06-08 12:53:05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `moh2`
--

CREATE TABLE `moh2` (
  `id` bigint UNSIGNED NOT NULL,
  `exempl6` int DEFAULT NULL,
  `example2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `example3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `moh2`
--

INSERT INTO `moh2` (`id`, `exempl6`, `example2`, `example3`) VALUES
(1, 7988, 'azerty', 'zertyu');

-- --------------------------------------------------------

--
-- Structure de la table `niveau_cadre_logique_ncl`
--

CREATE TABLE `niveau_cadre_logique_ncl` (
  `id_ncl` bigint UNSIGNED NOT NULL,
  `libelle_ncl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `niveau_ncl` int NOT NULL,
  `id_type_ncl` int NOT NULL,
  `geler_ncl` int NOT NULL DEFAULT '0',
  `idprg_ncl` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_cadre_logique_ncl`
--

INSERT INTO `niveau_cadre_logique_ncl` (`id_ncl`, `libelle_ncl`, `created_at`, `updated_at`, `niveau_ncl`, `id_type_ncl`, `geler_ncl`, `idprg_ncl`) VALUES
(1, 'Objectif global', '2023-01-23 14:58:47', '2023-01-23 14:58:47', 1, 1, 0, NULL),
(6, 'ZZZ', NULL, NULL, 2, 4, 1, NULL),
(7, 'sss', NULL, NULL, 3, 1, 0, NULL),
(8, 'xxx', NULL, NULL, 4, 4, 1, NULL),
(9, 'bbbb', NULL, NULL, 4, 4, 0, NULL),
(10, 'bbbbvvv', NULL, NULL, 4, 4, 1, NULL),
(11, 'bbbbvvvwwww', NULL, NULL, 4, 4, 1, NULL),
(12, 'bbbbvvvwwwwnnnn', NULL, NULL, 4, 4, 1, NULL),
(13, 'bbbbvvvwwwwnnnn', NULL, NULL, 4, 4, 1, NULL),
(14, 'bbbbvvvsqs', NULL, NULL, 4, 4, 1, NULL),
(15, 'bbbbvvvs', NULL, NULL, 4, 4, 1, NULL),
(16, 'bbbbvv2222', NULL, NULL, 4, 4, 0, NULL),
(17, 'dshjhjdszzeezezezezez', NULL, NULL, 5, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_cadre_resultat_projet_ncrp`
--

CREATE TABLE `niveau_cadre_resultat_projet_ncrp` (
  `id_ncrp` bigint UNSIGNED NOT NULL,
  `libelle_ncrp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `niveau_ncrp` int NOT NULL,
  `geler_ncrp` int NOT NULL DEFAULT '0',
  `idprj_ncrp` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_cadre_resultat_projet_ncrp`
--

INSERT INTO `niveau_cadre_resultat_projet_ncrp` (`id_ncrp`, `libelle_ncrp`, `created_at`, `updated_at`, `niveau_ncrp`, `geler_ncrp`, `idprj_ncrp`) VALUES
(1, 'test2', NULL, NULL, 1, 0, NULL),
(2, 'test2', NULL, NULL, 2, 1, NULL),
(3, 'test3', NULL, NULL, 3, 1, NULL),
(5, 'Test4', NULL, NULL, 4, 1, NULL),
(6, 'Programme de gestions', NULL, NULL, 2, 0, NULL),
(7, 'Programme de gestion', NULL, NULL, 1, 1, NULL),
(8, 'Programme de gestion', NULL, NULL, 1, 1, NULL),
(9, 'Niveau1', NULL, NULL, 3, 0, NULL),
(10, 'Niveau2', NULL, NULL, 5, 0, NULL),
(11, 'xxx', NULL, NULL, 1, 0, 2),
(12, 'wwww', NULL, NULL, 2, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_localite_lon`
--

CREATE TABLE `niveau_localite_lon` (
  `id_lon` bigint UNSIGNED NOT NULL,
  `libelle_lon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_localite_nvl`
--

CREATE TABLE `niveau_localite_nvl` (
  `id_nvl` bigint UNSIGNED NOT NULL,
  `libelle_nvl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `niveau` int DEFAULT NULL,
  `geler_nvl` int NOT NULL DEFAULT '0',
  `taille_nvl` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_localite_nvl`
--

INSERT INTO `niveau_localite_nvl` (`id_nvl`, `libelle_nvl`, `created_at`, `updated_at`, `niveau`, `geler_nvl`, `taille_nvl`) VALUES
(1, 'Région', NULL, NULL, 1, 0, 2),
(2, 'Cercle', NULL, NULL, 2, 0, 3),
(3, 'Commune', NULL, NULL, NULL, 0, NULL),
(4, 'Village', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_plan_analytique_npa`
--

CREATE TABLE `niveau_plan_analytique_npa` (
  `id_npa` bigint UNSIGNED NOT NULL,
  `libelle_npa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `niveau_npa` int NOT NULL,
  `taille_npa` int NOT NULL,
  `geler_npa` int NOT NULL DEFAULT '0',
  `idprj_npa` bigint DEFAULT NULL,
  `idprg_npa` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau_plan_analytique_npa`
--

INSERT INTO `niveau_plan_analytique_npa` (`id_npa`, `libelle_npa`, `created_at`, `updated_at`, `niveau_npa`, `taille_npa`, `geler_npa`, `idprj_npa`, `idprg_npa`) VALUES
(1, 'Programme de gestions', NULL, NULL, 1, 1, 0, NULL, NULL),
(2, 'Axe intervention', NULL, NULL, 2, 3, 0, NULL, NULL),
(3, 'Activités', NULL, NULL, 3, 53, 0, NULL, NULL),
(4, 'Sous activités', NULL, NULL, 4, 7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `observation_ptba_op`
--

CREATE TABLE `observation_ptba_op` (
  `id_op` bigint UNSIGNED NOT NULL,
  `id_ptba_op` bigint NOT NULL,
  `ugl_op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observation_op` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `executant_op` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enregisrer_par_op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_op` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `observation_ptba_op`
--

INSERT INTO `observation_ptba_op` (`id_op`, `id_ptba_op`, `ugl_op`, `observation_op`, `executant_op`, `enregisrer_par_op`, `modifier_par_op`, `geler_op`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'Test sur l\'enregistrement de l\'observation', 'Abdrahamane', '1', NULL, 1, '2023-02-22 14:58:17', '2023-02-22 16:25:13'),
(2, 4, NULL, 'sqsqsqsqsds11 11', 'sqsqsq', '1', '1', 0, '2023-02-22 18:32:48', '2023-02-22 18:40:31'),
(3, 30, NULL, 'Ut dignissimos eius', 'Dolor ut occaecat cu', '1', NULL, 0, '2023-03-01 11:12:04', '2023-03-01 11:12:04');

-- --------------------------------------------------------

--
-- Structure de la table `parametre_par`
--

CREATE TABLE `parametre_par` (
  `id_par` bigint UNSIGNED NOT NULL,
  `idtyp_par` bigint UNSIGNED NOT NULL,
  `code_par` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libelle_par` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1_par` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_par` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_par` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_par` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parametre_par`
--

INSERT INTO `parametre_par` (`id_par`, `idtyp_par`, `code_par`, `libelle_par`, `empty1_par`, `empty2_par`, `empty3_par`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_par`) VALUES
(1, 1, 'typ_frn', 'Fournisseurs', NULL, NULL, NULL, NULL, '2022-10-30 17:13:37', NULL, 1),
(2, 1, 'typ_clt', 'Clients', NULL, NULL, NULL, NULL, '2022-10-30 17:13:37', NULL, 1),
(3, 2, 'tys_attente', 'En attente', NULL, NULL, NULL, NULL, '2022-10-30 17:13:37', NULL, 1),
(4, 2, 'tys_livre', 'Livré', NULL, NULL, NULL, NULL, '2022-10-30 17:13:37', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire_pat`
--

CREATE TABLE `partenaire_pat` (
  `id_pat` bigint UNSIGNED NOT NULL,
  `code_pat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sigle_pat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `definition_pat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_pat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_pat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_pat` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_pat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_pat` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaire_pat`
--

INSERT INTO `partenaire_pat` (`id_pat`, `code_pat`, `sigle_pat`, `definition_pat`, `type_pat`, `contact_pat`, `email_pat`, `logo_pat`, `created_at`, `updated_at`, `geler_pat`) VALUES
(1, '01', 'sss', 'ssss', '[\"4\"]', '20202020', 'admin@admin.com', NULL, '2023-01-26 21:30:20', '2023-01-26 21:30:20', 0),
(2, '03', 'DR', 'Direction régionale', '[\"7\"]', '20202020', 'nabdrahamane@gmail.com', NULL, '2023-02-06 19:16:59', '2023-02-06 19:16:59', 0),
(3, '04', 'DC', 'Direction Centrale', '[\"7\"]', '20202020', 'draudemdra@gmail.com', NULL, '2023-02-06 19:17:41', '2023-02-06 19:17:41', 0);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire_ptn`
--

CREATE TABLE `partenaire_ptn` (
  `id_ptn` bigint UNSIGNED NOT NULL,
  `idtyp_ptn` bigint UNSIGNED NOT NULL,
  `libelle_ptn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone_ptn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emplacement_ptn` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty1_ptn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_ptn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_ptn` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_ptn` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plan_analytique_pa`
--

CREATE TABLE `plan_analytique_pa` (
  `id_pa` bigint UNSIGNED NOT NULL,
  `structure_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `projet_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_cor_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_niv_pa` int NOT NULL,
  `id_parent_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_personne_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `geler_pa` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programme_pa` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plan_analytique_pa`
--

INSERT INTO `plan_analytique_pa` (`id_pa`, `structure_pa`, `projet_pa`, `code_pa`, `code_cor_pa`, `intitule_pa`, `id_niv_pa`, `id_parent_pa`, `id_personne_pa`, `geler_pa`, `created_at`, `updated_at`, `programme_pa`) VALUES
(1, '0', '0', '1', NULL, 'SURVEILLANCE ET PROTECTION', 1, NULL, '0', 0, NULL, NULL, NULL),
(2, '0', '0', '2', NULL, 'URVEILLANCE ET PROTECTION 22', 1, NULL, '0', 0, NULL, NULL, NULL),
(3, '0', '0', '1.1', NULL, 'Les agressions commises … partir des villages sont en régression', 2, '1', '0', 0, NULL, NULL, NULL),
(4, '0', '0', '1.1.1', NULL, 'Encourager les auxiliaires villageois … participer aux activit‚s de surveillance', 3, '3', '0', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit_approvisionnements_pap`
--

CREATE TABLE `produit_approvisionnements_pap` (
  `id_pap` bigint UNSIGNED NOT NULL,
  `idpro_pap` bigint UNSIGNED NOT NULL,
  `idapv_pap` bigint UNSIGNED NOT NULL,
  `quantite_pap` int NOT NULL,
  `prix_pap` double(21,2) NOT NULL,
  `taille_pap` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `couleur_pap` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty1_pap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_pap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_pap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pap` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande_pcm`
--

CREATE TABLE `produit_commande_pcm` (
  `id_pcm` bigint UNSIGNED NOT NULL,
  `idpro_pcm` bigint UNSIGNED NOT NULL,
  `idcmd_pcm` bigint UNSIGNED NOT NULL,
  `quantite_pcm` int NOT NULL,
  `prix_pcm` double(21,2) NOT NULL,
  `taille_pcm` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `couleur_pcm` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty1_pcm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_pcm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_pcm` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pcm` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_pro`
--

CREATE TABLE `produit_pro` (
  `id_pro` bigint UNSIGNED NOT NULL,
  `idmar_pro` bigint UNSIGNED DEFAULT NULL,
  `idcat_pro` bigint UNSIGNED DEFAULT NULL,
  `slug_pro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `libelle_pro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_pro` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_pro` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `prix_pro` double(21,2) DEFAULT NULL,
  `reduction_pro` double(21,2) DEFAULT NULL,
  `quantite_pro` int DEFAULT NULL,
  `empty1_pro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_pro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_pro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pro` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` bigint UNSIGNED NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `commentaire` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id`, `libelle`, `commentaire`, `empty1`, `empty2`, `empty3`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(1, 'Administrateur', 'profil permettant l\'accès à tous les modules', NULL, NULL, NULL, NULL, '2022-10-30 16:56:19', '2022-10-30 16:56:19', 1),
(2, 'Gérant', 'Gérant de Reveil', NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-16 15:07:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `profil_modules`
--

CREATE TABLE `profil_modules` (
  `id` bigint UNSIGNED NOT NULL,
  `profil_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `empty1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profil_modules`
--

INSERT INTO `profil_modules` (`id`, `profil_id`, `module_id`, `empty1`, `empty2`, `empty3`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(27, 1, 15, NULL, NULL, NULL, NULL, '2022-11-27 14:03:23', '2022-11-27 14:03:23', 1),
(26, 2, 15, NULL, NULL, NULL, NULL, '2022-11-26 10:50:27', '2022-11-26 10:50:27', 1),
(25, 2, 14, NULL, NULL, NULL, NULL, '2022-11-26 10:50:27', '2022-11-26 10:50:27', 1),
(24, 1, 15, NULL, NULL, NULL, '2022-11-27 12:31:04', '2022-11-26 10:47:33', '2022-11-27 12:31:04', 1),
(23, 1, 14, NULL, NULL, NULL, NULL, '2022-11-26 10:47:33', '2022-11-26 10:47:33', 1),
(22, 2, 13, NULL, NULL, NULL, NULL, '2022-11-16 15:06:35', '2022-11-16 15:06:35', 1),
(21, 2, 12, NULL, NULL, NULL, NULL, '2022-11-16 15:06:35', '2022-11-16 15:06:35', 1),
(20, 2, 11, NULL, NULL, NULL, '2023-06-10 15:16:10', '2022-11-16 15:06:35', '2023-06-10 15:16:10', 1),
(19, 2, 8, NULL, NULL, NULL, NULL, '2022-11-16 15:06:34', '2022-11-16 15:06:34', 1),
(18, 2, 7, NULL, NULL, NULL, NULL, '2022-11-16 15:06:34', '2022-11-16 15:06:34', 1),
(17, 2, 6, NULL, NULL, NULL, '2023-06-10 15:16:10', '2022-11-16 15:06:34', '2023-06-10 15:16:10', 1),
(16, 1, 13, NULL, NULL, NULL, NULL, '2022-11-16 11:33:57', '2022-11-16 11:33:57', 1),
(15, 1, 12, NULL, NULL, NULL, NULL, '2022-11-16 11:33:57', '2022-11-16 11:33:57', 1),
(14, 2, 10, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(13, 2, 9, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(12, 2, 1, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(11, 1, 11, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(10, 1, 10, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(9, 1, 9, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(8, 1, 8, NULL, NULL, NULL, NULL, '2022-10-30 20:12:17', '2022-10-30 20:12:17', 1),
(7, 1, 7, NULL, NULL, NULL, NULL, '2022-10-30 18:00:21', '2022-10-30 18:00:21', 1),
(6, 1, 6, NULL, NULL, NULL, NULL, '2022-10-30 18:00:21', '2022-10-30 18:00:21', 1),
(5, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(28, 1, 17, NULL, NULL, NULL, NULL, '2023-01-26 14:55:58', '2023-01-26 14:55:58', 1),
(29, 1, 19, NULL, NULL, NULL, NULL, '2023-02-02 10:40:16', '2023-02-02 10:40:16', 1),
(30, 1, 20, NULL, NULL, NULL, NULL, '2023-02-02 17:16:46', '2023-02-02 17:16:46', 1),
(31, 1, 21, NULL, NULL, NULL, NULL, '2023-02-02 17:16:46', '2023-02-02 17:16:46', 1),
(32, 2, 19, NULL, NULL, NULL, NULL, '2023-02-03 13:55:11', '2023-02-03 13:55:11', 1),
(33, 2, 22, NULL, NULL, NULL, '2023-06-10 15:16:10', '2023-02-03 13:55:11', '2023-06-10 15:16:10', 1),
(34, 1, 22, NULL, NULL, NULL, NULL, '2023-02-03 13:56:43', '2023-02-03 13:56:43', 1),
(35, 1, 23, NULL, NULL, NULL, NULL, '2023-02-06 10:26:53', '2023-02-06 10:26:53', 1),
(36, 1, 24, NULL, NULL, NULL, NULL, '2023-02-10 12:04:06', '2023-02-10 12:04:06', 1),
(39, 1, 25, NULL, NULL, NULL, NULL, '2023-02-21 17:16:39', '2023-02-21 17:16:39', 1),
(40, 1, 26, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 1, 27, NULL, NULL, NULL, NULL, '2023-03-07 08:22:42', '2023-03-07 08:22:42', 1),
(42, 1, 28, NULL, NULL, NULL, NULL, '2023-03-07 08:22:42', '2023-03-07 08:22:42', 1),
(43, 1, 29, NULL, NULL, NULL, NULL, '2023-03-30 09:49:32', '2023-03-30 09:49:32', 1),
(44, 1, 30, NULL, NULL, NULL, NULL, '2023-03-30 09:49:32', '2023-03-30 09:49:32', 1),
(45, 1, 31, NULL, NULL, NULL, NULL, '2023-03-30 09:49:32', '2023-03-30 09:49:32', 1),
(46, 1, 32, NULL, NULL, NULL, NULL, '2023-03-30 09:49:32', '2023-03-30 09:49:32', 1),
(47, 1, 33, NULL, NULL, NULL, NULL, '2023-04-24 12:11:13', '2023-04-24 12:11:13', 1),
(48, 1, 35, NULL, NULL, NULL, '2023-06-10 15:22:17', '2023-06-07 14:28:54', '2023-06-10 15:22:17', 1),
(49, 1, 36, NULL, NULL, NULL, '2023-06-10 15:22:17', '2023-06-07 14:28:54', '2023-06-10 15:22:17', 1),
(50, 1, 37, NULL, NULL, NULL, '2023-06-07 16:53:57', '2023-06-07 14:28:54', '2023-06-07 16:53:57', 1),
(51, 1, 38, NULL, NULL, NULL, '2023-06-10 15:22:17', '2023-06-08 12:53:46', '2023-06-10 15:22:17', 1),
(52, 1, 39, NULL, NULL, NULL, '2023-06-10 15:22:17', '2023-06-08 12:53:46', '2023-06-10 15:22:17', 1),
(53, 1, 35, NULL, NULL, NULL, NULL, '2023-06-10 15:23:27', '2023-06-10 15:23:27', 1),
(54, 1, 36, NULL, NULL, NULL, NULL, '2023-06-10 15:23:27', '2023-06-10 15:23:27', 1),
(55, 1, 38, NULL, NULL, NULL, NULL, '2023-06-10 15:23:27', '2023-06-10 15:23:27', 1),
(56, 1, 39, NULL, NULL, NULL, NULL, '2023-06-10 15:23:27', '2023-06-10 15:23:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `programme_prg`
--

CREATE TABLE `programme_prg` (
  `id_prg` bigint UNSIGNED NOT NULL,
  `code_prg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sigle_prg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_prg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `vision_prg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `objectif_prg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `annee_debut_prg` date DEFAULT NULL,
  `annee_fin_prg` date DEFAULT NULL,
  `actif_prg` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `budget_estimatif_prg` bigint NOT NULL,
  `type_programme_prg` int NOT NULL,
  `idusrcreation_prg` bigint UNSIGNED DEFAULT NULL,
  `geler_prg` int NOT NULL DEFAULT '0',
  `date_debut_prg` bigint DEFAULT NULL,
  `date_fin_prg` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `programme_prg`
--

INSERT INTO `programme_prg` (`id_prg`, `code_prg`, `sigle_prg`, `nom_prg`, `vision_prg`, `objectif_prg`, `annee_debut_prg`, `annee_fin_prg`, `actif_prg`, `created_at`, `updated_at`, `budget_estimatif_prg`, `type_programme_prg`, `idusrcreation_prg`, `geler_prg`, `date_debut_prg`, `date_fin_prg`) VALUES
(1, '002', 'dsds', 'sdds', 'dsds', 'dsds', '2022-12-30', '2023-01-04', 0, '2022-12-14 15:16:34', '2023-02-08 15:06:39', 122, 1, NULL, 1, NULL, NULL),
(2, '0023', 'PAG-Dahlia', 'Plan d\'Aménagement et de Gestion de la Réserve naturelle de Dahliafleu', 'Conservation de la biodiversité', 'Gestion durable du RND', '2022-12-16', '2022-12-29', 0, '2022-12-14 15:24:40', '2022-12-15 09:33:44', 233, 4, NULL, 0, NULL, NULL),
(3, '00223', 'PAG BANCO', 'Plan d\'Aménagement et de gestion du Parc de Banco', 'Plan d\'Aménagement et de gestion du Parc de Banco', 'Plan d\'Aménagement et de gestion du Parc de Banco', '2022-12-16', '2022-12-29', 0, '2022-12-14 15:31:25', '2022-12-15 09:34:48', 10000, 1, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projets_users_pru`
--

CREATE TABLE `projets_users_pru` (
  `id_pru` bigint UNSIGNED NOT NULL,
  `idprj_pru` bigint UNSIGNED DEFAULT NULL,
  `user_pru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iduser_pru` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projets_users_pru`
--

INSERT INTO `projets_users_pru` (`id_pru`, `idprj_pru`, `user_pru`, `created_at`, `updated_at`, `iduser_pru`) VALUES
(1, 2, NULL, '2023-02-06 09:27:52', '2023-02-06 09:27:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet_prj`
--

CREATE TABLE `projet_prj` (
  `id_prj` bigint UNSIGNED NOT NULL,
  `code_prj` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sigle_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duree_prj` int DEFAULT NULL,
  `date_signature_prj` date DEFAULT NULL,
  `date_demarrage_prj` date DEFAULT NULL,
  `logo_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `actif_prj` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idprg_prj` bigint UNSIGNED DEFAULT NULL,
  `direction_lead_prj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `maitre_oeuvre_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_fin_prj` date DEFAULT NULL,
  `financement_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matrice_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `couverture_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `objectifs_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `type_projet_prj` int DEFAULT NULL,
  `mode_execution_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `priorite_prj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resultats_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `fichier_shape_file_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `couleur_prj` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zone_prj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thematiques` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_prj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `geler_prj` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projet_prj`
--

INSERT INTO `projet_prj` (`id_prj`, `code_prj`, `sigle_prj`, `intitule_prj`, `duree_prj`, `date_signature_prj`, `date_demarrage_prj`, `logo_prj`, `actif_prj`, `created_at`, `updated_at`, `idprg_prj`, `direction_lead_prj`, `maitre_oeuvre_prj`, `date_fin_prj`, `financement_prj`, `matrice_prj`, `couverture_prj`, `objectifs_prj`, `type_projet_prj`, `mode_execution_prj`, `priorite_prj`, `resultats_prj`, `fichier_shape_file_prj`, `couleur_prj`, `zone_prj`, `thematiques`, `description_prj`, `geler_prj`) VALUES
(1, '33', 'PNIASAN', 'PNIASAN', 3, '2023-01-19', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-03-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '001', 'Nulla saepe sint no', 'Laudantium nihil om', NULL, '2022-01-05', '2017-03-21', NULL, 0, '2023-02-06 09:24:06', '2023-02-06 09:24:06', 2, '[\"5\",\"6\"]', NULL, '2024-12-18', '[\"5\",\"6\"]', '[\"5\"]', 'Id vitae est ut tem', 'Ea quis sit quia am', 1, '<p>kjkjkjkj</p>', '[\"1\",\"4\",\"6\"]', '<p>kjkjkj</p>', NULL, '#2cb461', '[\"4\",\"5\"]', NULL, NULL, 0),
(3, '00043', 'Aliquid consequatur', 'Aut eos laboris dic', NULL, '2018-12-31', NULL, NULL, 0, '2023-03-15 12:50:46', '2023-03-15 12:57:05', 3, NULL, NULL, '2025-09-01', NULL, NULL, 'Placeat laboris lab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ptba`
--

CREATE TABLE `ptba` (
  `id_ptba` bigint UNSIGNED NOT NULL,
  `annee_ptba` int NOT NULL,
  `code_activite_ptba` bigint NOT NULL,
  `intitule_activite_ptba` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `debut_ptba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `structure_ptba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `partenaire_ptba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `projet_ptba` bigint NOT NULL,
  `zone_ptba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localite_ptba` bigint DEFAULT NULL,
  `observation_ptba` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `type_activite_ptba` bigint DEFAULT NULL,
  `enregistrer_par_ptba` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `etat_ptba` int NOT NULL DEFAULT '0',
  `geler_ptba` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trimestre1` bigint DEFAULT NULL,
  `trimestre2` bigint DEFAULT NULL,
  `trimestre3` bigint DEFAULT NULL,
  `trimestre4` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ptba`
--

INSERT INTO `ptba` (`id_ptba`, `annee_ptba`, `code_activite_ptba`, `intitule_activite_ptba`, `debut_ptba`, `structure_ptba`, `partenaire_ptba`, `projet_ptba`, `zone_ptba`, `localite_ptba`, `observation_ptba`, `type_activite_ptba`, `enregistrer_par_ptba`, `etat_ptba`, `geler_ptba`, `created_at`, `updated_at`, `trimestre1`, `trimestre2`, `trimestre3`, `trimestre4`) VALUES
(1, 2023, 1, 'Consultoria externa para a atualização do site', NULL, '\"1\"', '1', 0, 'test', 1, 'test', 1, '1', 0, 0, '2023-02-23 16:01:00', '2023-02-23 16:01:00', NULL, NULL, NULL, NULL),
(2, 2023, 3, 'Ea sequi consectetur', '\"Bike\"', '\"1\"', '2', 0, 'Ea officiis nihil an', 3, 'Velit ad elit ipsam', 3, '1', 0, 1, '2023-02-23 16:02:04', '2023-02-27 14:12:26', NULL, NULL, NULL, NULL),
(3, 2023, 1, 'Eligendi dolor itaqu', '\"Bike\"', '\"1\"', '3', 0, 'Non consequatur inci', 1, 'Assumenda necessitat', 3, '1', 0, 1, '2023-02-23 16:02:16', '2023-02-27 14:13:12', NULL, NULL, NULL, NULL),
(4, 2023, 2, 'Ea sunt eos libero', '\"Bike\"', '\"1\"', '2', 0, 'Nulla anim voluptate', 2, 'Quam quia nisi maxim', 1, '1', 0, 1, '2023-02-23 16:02:33', '2023-02-27 14:12:19', NULL, NULL, NULL, NULL),
(5, 2023, 2, 'Ea sunt eos libero', '\"Bike\"', '\"1\"', '2', 0, 'Nulla anim voluptate', 2, 'Quam quia nisi maxim', 1, '1', 0, 1, '2023-02-23 16:03:48', '2023-02-27 14:13:01', NULL, NULL, NULL, NULL),
(6, 2023, 3, 'Quia fugit sed et i', '\"Bike\"', '\"1\"', '3', 0, 'Est assumenda et ei', 3, 'Sed et quia expedita', 3, '1', 0, 1, '2023-02-23 16:07:15', '2023-02-27 14:12:44', NULL, NULL, NULL, NULL),
(7, 2023, 3, 'Et porro sed quis do', NULL, '\"1\"', '1', 0, 'Commodo ut anim face', 1, 'Est repudiandae occa', 1, '1', 0, 1, '2023-02-23 16:07:33', '2023-02-25 10:59:05', NULL, NULL, NULL, NULL),
(8, 2023, 3, 'Et porro sed quis do', NULL, '\"1\"', '1', 0, 'Commodo ut anim face', 1, 'Est repudiandae occa', 1, '1', 0, 1, '2023-02-23 16:10:48', '2023-02-27 14:12:00', NULL, NULL, NULL, NULL),
(9, 2023, 3, 'Et porro sed quis do', NULL, '\"1\"', '1', 0, 'Commodo ut anim face', 1, 'Est repudiandae occa', 1, '1', 0, 1, '2023-02-23 16:11:00', '2023-02-27 14:12:11', NULL, NULL, NULL, NULL),
(10, 2023, 3, 'Fugiat libero cupid', NULL, '\"1\"', '2', 0, 'Qui qui est maxime', 2, 'Adipisci qui cumque', 1, '1', 0, 1, '2023-02-23 16:11:33', '2023-02-27 14:12:35', NULL, NULL, NULL, NULL),
(11, 2023, 1, 'xxx', NULL, '\"1\"', '1', 0, 'ww', 1, '<ww<w', 1, '1', 0, 1, '2023-02-25 10:58:50', '2023-02-27 14:13:06', NULL, NULL, NULL, NULL),
(12, 2023, 1, 'Activité 1', '\"Bike\"', '\"1\"', '1', 0, 'sss', 1, 'sss', 1, '1', 0, 1, '2023-02-27 14:23:36', '2023-02-27 14:56:06', NULL, NULL, NULL, NULL),
(13, 2023, 1, 'Activité 2', '\"Bike\"', '\"1\"', '1', 0, 'test', 2, 'dsdsds', 1, '1', 0, 1, '2023-02-27 14:47:04', '2023-02-27 14:56:19', NULL, NULL, NULL, NULL),
(14, 2023, 1, 'Activité 22', '\"Bike\"', '\"1\"', '1', 0, 'eeee', 1, 'ezezez', 1, '1', 0, 0, '2023-02-27 14:56:44', '2023-02-27 14:56:44', NULL, NULL, NULL, NULL),
(15, 2023, 1, 'Activité 1123', NULL, '\"1\"', '1', 0, 'ezezez', 1, 'ezezez', 1, '1', 0, 1, '2023-02-27 14:59:50', '2023-02-27 15:24:31', NULL, NULL, NULL, NULL),
(16, 2023, 1, 'Activité 1123', NULL, '\"1\"', '1', 0, 'ezezez', 1, 'ezezez', 1, '1', 0, 1, '2023-02-27 15:01:25', '2023-02-27 15:02:46', NULL, NULL, NULL, NULL),
(17, 2023, 1, 'Rapidité23', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:03:05', '2023-02-27 15:25:08', NULL, NULL, NULL, NULL),
(18, 2023, 1, 'Rapidité23', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:04:47', '2023-02-27 15:25:01', NULL, NULL, NULL, NULL),
(19, 2023, 1, 'Rapidité23', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:05:37', '2023-02-27 15:24:54', NULL, NULL, NULL, NULL),
(20, 2023, 1, 'Rapidité23', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:05:41', '2023-02-27 15:24:46', NULL, NULL, NULL, NULL),
(21, 2023, 1, 'Rapidité233EEE', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:05:56', '2023-02-27 15:24:06', NULL, NULL, NULL, NULL),
(22, 2023, 1, 'Rapidité233EEE', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:06:37', '2023-02-27 15:24:15', NULL, NULL, NULL, NULL),
(23, 2023, 1, 'Rapidité233EEE', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:12:22', '2023-02-27 15:24:23', NULL, NULL, NULL, NULL),
(24, 2023, 1, 'Rapidité233EEE', NULL, '\"1\"', '1', 0, 'zezez', 1, 'ddffd', 1, '1', 0, 1, '2023-02-27 15:12:35', '2023-02-27 15:24:39', NULL, NULL, NULL, NULL),
(25, 2023, 1, 'Activité 123454', NULL, '\"1\"', '1', 0, 'klkk', 1, 'lklk', 1, '1', 0, 0, '2023-02-27 15:27:40', '2023-02-27 15:27:40', NULL, NULL, NULL, NULL),
(26, 2023, 1, 'Activité 123454', NULL, '\"1\"', '1', 0, 'klkk', 1, 'lklk', 1, '1', 0, 1, '2023-02-27 15:28:17', '2023-02-27 15:29:21', NULL, NULL, NULL, NULL),
(27, 2023, 1, 'Activité 123454', NULL, '\"1\"', '1', 0, 'klkk', 1, 'lklk', 1, '1', 0, 1, '2023-02-27 15:28:27', '2023-02-27 15:29:14', NULL, NULL, NULL, NULL),
(28, 2023, 1, 'Activité 1234545', NULL, '\"1\"', '1', 0, 'sdds', 1, 'qssqsq', 1, '1', 0, 1, '2023-02-27 15:29:59', '2023-02-27 15:31:52', NULL, NULL, NULL, NULL),
(29, 2023, 1, 'Activité 1234545', NULL, '\"1\"', '1', 0, 'sdds', 1, 'qssqsq', 1, '1', 0, 1, '2023-02-27 15:31:19', '2023-02-27 15:31:42', NULL, NULL, NULL, NULL),
(30, 2023, 1, 'Activité 1001', '\"Bike\"', '\"1\"', '1', 0, 'sqssq', 1, 'sqsqsq', 1, '1', 0, 0, '2023-02-27 15:32:51', '2023-02-27 15:32:51', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ptba_cout_pc`
--

CREATE TABLE `ptba_cout_pc` (
  `id_pc` bigint UNSIGNED NOT NULL,
  `activite_pc` bigint NOT NULL,
  `bailleur_pc` bigint NOT NULL,
  `structure_pc` bigint DEFAULT NULL,
  `montant_pc` double NOT NULL,
  `observation_pc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `enregistrer_par_pc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_pc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat_pc` int NOT NULL DEFAULT '0',
  `geler_pc` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ptba_cout_pc`
--

INSERT INTO `ptba_cout_pc` (`id_pc`, `activite_pc`, `bailleur_pc`, `structure_pc`, `montant_pc`, `observation_pc`, `enregistrer_par_pc`, `modifier_par_pc`, `etat_pc`, `geler_pc`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 1000088, NULL, '1', '1', 0, 1, '2023-02-08 10:59:47', '2023-02-08 11:16:25'),
(2, 4, 1, NULL, 100000, NULL, '1', '1', 0, 0, '2023-02-08 16:04:58', '2023-02-08 16:05:26');

-- --------------------------------------------------------

--
-- Structure de la table `ptba_indicateur_pi`
--

CREATE TABLE `ptba_indicateur_pi` (
  `id_pi` bigint UNSIGNED NOT NULL,
  `code_pi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `activite_ptba_pi` bigint NOT NULL,
  `indicateur_produit_pi` bigint NOT NULL,
  `intitule_pi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unite_pi` bigint NOT NULL,
  `valeur_cible_pi` double DEFAULT NULL,
  `enregistrer_par_pi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_pi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat_pi` int NOT NULL DEFAULT '0',
  `geler_pi` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ptba_indicateur_pi`
--

INSERT INTO `ptba_indicateur_pi` (`id_pi`, `code_pi`, `activite_ptba_pi`, `indicateur_produit_pi`, `intitule_pi`, `unite_pi`, `valeur_cible_pi`, `enregistrer_par_pi`, `modifier_par_pi`, `etat_pi`, `geler_pi`, `created_at`, `updated_at`) VALUES
(1, '010', 3, 1, 'Iste ut tenetur volu', 2, 1000, '1', '1', 0, 1, '2023-02-07 21:37:35', '2023-02-08 11:16:02'),
(2, '02', 3, 1, 'Saepe fugiat adipis', 3, 323, '1', NULL, 0, 1, '2023-02-07 21:55:36', '2023-02-07 21:55:45'),
(3, 'Similique itaque ten', 1, 1, 'Laborum elit dicta', 4, 10099, '1', '1', 0, 0, '2023-02-08 12:13:39', '2023-02-08 12:13:57'),
(4, 'Assumenda commodo qu', 4, 1, 'Exercitation deserun', 3, 1000, '1', NULL, 0, 0, '2023-02-08 15:04:56', '2023-02-08 15:04:56'),
(5, '1.1.1', 30, 1, 'Indicateur 1', 1, 10, '1', NULL, 0, 0, '2023-03-01 08:30:46', '2023-03-01 08:30:46'),
(6, '002', 30, 1, 'Indicateur 2', 2, 30, '1', NULL, 0, 0, '2023-03-01 09:22:02', '2023-03-01 09:22:02');

-- --------------------------------------------------------

--
-- Structure de la table `ptba_tache_pt`
--

CREATE TABLE `ptba_tache_pt` (
  `id_pt` bigint UNSIGNED NOT NULL,
  `code_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type_activite_pt` bigint NOT NULL,
  `proportion_pt` double(8,2) DEFAULT '0.00',
  `intitule_pt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enregistrer_par_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat_pt` int NOT NULL DEFAULT '0',
  `geler_pt` int NOT NULL DEFAULT '0',
  `periode_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code_tache_pt` bigint NOT NULL DEFAULT '0',
  `valider_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'non',
  `date_debut_pt` date DEFAULT NULL,
  `date_fin_pt` date DEFAULT NULL,
  `projet_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lot_pt` int NOT NULL DEFAULT '1',
  `observation_pt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_suivi_pt` date DEFAULT NULL,
  `responsable_pt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ptba_tache_pt`
--

INSERT INTO `ptba_tache_pt` (`id_pt`, `code_pt`, `type_activite_pt`, `proportion_pt`, `intitule_pt`, `enregistrer_par_pt`, `modifier_par_pt`, `etat_pt`, `geler_pt`, `periode_pt`, `code_tache_pt`, `valider_pt`, `date_debut_pt`, `date_fin_pt`, `projet_pt`, `lot_pt`, `observation_pt`, `date_suivi_pt`, `responsable_pt`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 10.00, 'Elaboration des TDR et ANO', '1', '1', 0, 0, '[\"1\"]', 0, 'non', '2023-02-04', '2023-03-03', NULL, 1, NULL, NULL, '2', '2023-02-23 14:52:20', '2023-02-25 10:59:46'),
(2, '2', 1, 15.00, 'Finalisation et multiplication des documents techniques', '1', NULL, 0, 0, NULL, 0, 'non', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-02-23 14:52:56', '2023-02-23 14:52:56'),
(3, '3', 1, 15.00, 'Préparation matérielle; Invitations des participants', '1', NULL, 0, 0, NULL, 0, 'non', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-02-23 14:53:24', '2023-02-23 14:53:24'),
(4, '4', 1, 50.00, 'Tenue de/ (des) Ateliers / Sessions/ Sensibilisations/ Retraites/ Simulations', '1', NULL, 0, 0, NULL, 0, 'non', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-02-23 14:53:48', '2023-02-23 14:53:48'),
(5, '5', 1, 10.00, 'Finalisation et validation du Rapport de l\'activité', '1', NULL, 0, 0, NULL, 0, 'non', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-02-23 14:54:15', '2023-02-23 14:54:15');

-- --------------------------------------------------------

--
-- Structure de la table `rapport12`
--

CREATE TABLE `rapport12` (
  `id` bigint UNSIGNED NOT NULL,
  `az1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `az2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_dynamiques`
--

CREATE TABLE `rapport_dynamiques` (
  `id_rapp` bigint UNSIGNED NOT NULL,
  `nom_rapport` varchar(255) DEFAULT NULL,
  `requette_rapport` varchar(255) DEFAULT NULL,
  `table_rapport` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `colonne_rapport` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rapport_dynamiques`
--

INSERT INTO `rapport_dynamiques` (`id_rapp`, `nom_rapport`, `requette_rapport`, `table_rapport`, `colonne_rapport`, `created_at`, `updated_at`) VALUES
(14, 'Detail', 'avg', 'rapport12, moh2', 'exempl6, example2, example3, az1, az2', '2023-06-09 13:54:27', '2023-06-09 17:10:02'),
(16, 'dossier', 'sum', 'classe, ecole, stock', 'quantité, produit, NOM, PRENOM, montant', '2023-06-09 17:18:58', '2023-06-09 21:07:23'),
(17, 'scolarité', 'count', 'classe, ecole', 'NOM, PRENOM, classe, libelle, montant', '2023-06-10 13:05:22', '2023-06-10 13:05:22');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_rap`
--

CREATE TABLE `rapport_rap` (
  `id_rap` bigint UNSIGNED NOT NULL,
  `objet_rap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_reunion_dep` datetime NOT NULL,
  `description_rap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1_rap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_rap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_rap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_rap` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recommandation_action_rma`
--

CREATE TABLE `recommandation_action_rma` (
  `id_rma` bigint UNSIGNED NOT NULL,
  `resume_rma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `intitule_rma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code_rma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_butoir_rma` date NOT NULL,
  `type_recommandation_rma` bigint NOT NULL,
  `structure_concerne_rma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_suivi_rma` date DEFAULT NULL,
  `statut_rma` bigint DEFAULT NULL,
  `text_rma` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recommandation_rc`
--

CREATE TABLE `recommandation_rc` (
  `id_rc` bigint UNSIGNED NOT NULL,
  `code_rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `intitule_rc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `reference_rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `montant_rc` double DEFAULT NULL,
  `projet_rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `partenaires_rc` bigint DEFAULT NULL,
  `region_concerne_rc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `objectif_rc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `debut_rc` date NOT NULL,
  `fin_rc` date NOT NULL,
  `enregistrer_par_rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_rc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `etat_rc` int NOT NULL DEFAULT '0',
  `geler_rc` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recommandation_rc`
--

INSERT INTO `recommandation_rc` (`id_rc`, `code_rc`, `intitule_rc`, `reference_rc`, `montant_rc`, `projet_rc`, `partenaires_rc`, `region_concerne_rc`, `objectif_rc`, `debut_rc`, `fin_rc`, `enregistrer_par_rc`, `modifier_par_rc`, `etat_rc`, `geler_rc`, `created_at`, `updated_at`) VALUES
(1, 'R1', 'Ranforcement de la capacité', NULL, NULL, '0', 2, 'Bamako', 'sssd', '2023-02-10', '2023-02-10', '1', '1', 0, 0, '2023-02-10 12:37:38', '2023-02-10 12:45:53'),
(2, 'R2', 'test 1', NULL, NULL, '0', 2, 'Kayes', 'test', '2023-02-10', '2023-02-18', '1', '1', 0, 1, '2023-02-10 15:12:22', '2023-02-10 15:12:41');

-- --------------------------------------------------------

--
-- Structure de la table `region_reg`
--

CREATE TABLE `region_reg` (
  `id_reg` bigint UNSIGNED NOT NULL,
  `code_reg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_reg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `abrege_reg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `couleur_reg` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_reg` bigint DEFAULT NULL,
  `idusrcreation_modif_reg` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_prefecture_spf`
--

CREATE TABLE `sous_prefecture_spf` (
  `id_spf` bigint UNSIGNED NOT NULL,
  `code_spf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_spf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_spf` bigint DEFAULT NULL,
  `idusrcreation_modif_spf` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iddep_spf` bigint UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statut_commande_stc`
--

CREATE TABLE `statut_commande_stc` (
  `id_stc` bigint UNSIGNED NOT NULL,
  `idsta_stc` bigint UNSIGNED NOT NULL,
  `idcmd_stc` bigint UNSIGNED NOT NULL,
  `observation_stc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty1_stc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_stc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_stc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_stc` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` bigint UNSIGNED NOT NULL,
  `quantité` int DEFAULT NULL,
  `produit` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `quantité`, `produit`) VALUES
(1, 12, 'lait');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_indicateur_pp`
--

CREATE TABLE `suivi_indicateur_pp` (
  `id_pp` bigint UNSIGNED NOT NULL,
  `id_indicateur_pp` bigint NOT NULL,
  `id_programme_pp` bigint DEFAULT NULL,
  `id_projet_pp` bigint DEFAULT NULL,
  `ugel_pp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observation_pp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `lieu_pp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `annee_pp` int NOT NULL,
  `date_suivi_pp` date NOT NULL,
  `valeur_suivi_pp` double NOT NULL,
  `enregisrer_par_pp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_pp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_pp` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suivi_indicateur_pp`
--

INSERT INTO `suivi_indicateur_pp` (`id_pp`, `id_indicateur_pp`, `id_programme_pp`, `id_projet_pp`, `ugel_pp`, `observation_pp`, `lieu_pp`, `annee_pp`, `date_suivi_pp`, `valeur_suivi_pp`, `enregisrer_par_pp`, `modifier_par_pp`, `geler_pp`, `created_at`, `updated_at`) VALUES
(1, 4, 0, NULL, '0', 'Cillum doloribus id', 'Quia sit ut culpa d', 7, '1983-04-27', 6, '1', NULL, 0, '2023-03-14 12:42:32', '2023-03-14 12:42:32'),
(2, 4, 2, NULL, '2', 'Quia sit mollitia es', 'Consectetur facilissss', 2023, '2009-06-19', 81, '1', '1', 0, '2023-03-14 13:01:22', '2023-03-15 07:19:55'),
(3, 4, 2, NULL, '2', 'Quia nihil maiores a', 'Esse est dolore sint', 2024, '1990-12-03', 7, '1', NULL, 1, '2023-03-14 13:04:10', '2023-03-15 10:35:38'),
(4, 4, 2, NULL, '0', 'Do sed distinctio V', 'Neque sed doloribus', 56, '1973-07-22', 97, '1', NULL, 1, '2023-03-14 13:06:26', '2023-03-15 07:20:21'),
(5, 3, NULL, 2, '0', 'Adipisicing earum al', 'Molestias delectus333', 2023, '2019-04-05', 600, '1', '1', 0, '2023-03-15 10:13:22', '2023-03-15 10:58:27'),
(6, 3, NULL, 2, '0', 'Sunt dolore lorem p', 'Rerum ea quae provid12', 2033, '2018-03-28', 81, '1', NULL, 1, '2023-03-15 10:35:24', '2023-03-15 11:12:21');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_indicateur_ptba_sip`
--

CREATE TABLE `suivi_indicateur_ptba_sip` (
  `id_sip` bigint UNSIGNED NOT NULL,
  `id_indicateur_sip` bigint NOT NULL,
  `ugel_sip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lieu_sip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_suivi_sip` date NOT NULL,
  `valeur_suivi_sip` double NOT NULL,
  `enregisrer_par_sip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_sip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_sip` int NOT NULL DEFAULT '0',
  `id_activite_sip` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suivi_indicateur_ptba_sip`
--

INSERT INTO `suivi_indicateur_ptba_sip` (`id_sip`, `id_indicateur_sip`, `ugel_sip`, `lieu_sip`, `date_suivi_sip`, `valeur_suivi_sip`, `enregisrer_par_sip`, `modifier_par_sip`, `created_at`, `updated_at`, `geler_sip`, `id_activite_sip`) VALUES
(1, 5, '0', 'dsdsdsds', '2023-03-01', 1, '1', NULL, '2023-03-01 11:15:56', '2023-03-01 11:56:33', 1, 30),
(2, 5, '0', 'Quia aut quibusdam e', '2021-10-06', 8, '1', NULL, '2023-03-01 11:28:10', '2023-03-01 11:28:10', 0, 30),
(3, 6, '0', 'Quis illo qui aut ne', '2011-01-12', 5, '1', NULL, '2023-03-01 12:00:40', '2023-03-01 12:00:40', 0, 30),
(4, 5, '0', 'hhhjhjhj', '2023-03-18', 2, '1', '1', '2023-03-01 13:03:38', '2023-03-01 13:03:54', 0, 30);

-- --------------------------------------------------------

--
-- Structure de la table `suivi_tache_ptba_stp`
--

CREATE TABLE `suivi_tache_ptba_stp` (
  `id_stp` bigint UNSIGNED NOT NULL,
  `id_tache_stp` bigint NOT NULL,
  `id_ptba_stp` bigint NOT NULL,
  `ugl_stp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `proportion_stp` double DEFAULT NULL,
  `valide_stp` int NOT NULL DEFAULT '0',
  `projet_stp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observation_stp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `lot_stp` bigint DEFAULT NULL,
  `date_debut_stp` date DEFAULT NULL,
  `date_fin_stp` date DEFAULT NULL,
  `responsable_stp` bigint DEFAULT NULL,
  `date_suivi_stp` date DEFAULT NULL,
  `source_stp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `enregisrer_par_stp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modifier_par_stp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `suivi_tache_ptba_stp`
--

INSERT INTO `suivi_tache_ptba_stp` (`id_stp`, `id_tache_stp`, `id_ptba_stp`, `ugl_stp`, `proportion_stp`, `valide_stp`, `projet_stp`, `observation_stp`, `lot_stp`, `date_debut_stp`, `date_fin_stp`, `responsable_stp`, `date_suivi_stp`, `source_stp`, `enregisrer_par_stp`, `modifier_par_stp`, `created_at`, `updated_at`) VALUES
(18, 5, 30, NULL, 10, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:49:15', '2023-02-27 15:49:15'),
(16, 5, 30, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:43:41', '2023-02-27 15:43:41'),
(15, 5, 30, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:32:51', '2023-02-27 15:32:51'),
(14, 4, 30, NULL, 50, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:32:51', '2023-02-27 15:32:51'),
(13, 3, 30, NULL, 15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:32:51', '2023-02-27 15:32:51'),
(12, 2, 30, NULL, 15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:32:51', '2023-02-27 15:32:51'),
(11, 1, 30, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:32:51', '2023-02-27 15:32:51'),
(17, 5, 1, NULL, 10, 1, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-02-27 15:48:09', '2023-02-27 15:48:09');

-- --------------------------------------------------------

--
-- Structure de la table `tb_feuille2`
--

CREATE TABLE `tb_feuille2` (
  `id` bigint UNSIGNED NOT NULL,
  `col1` int DEFAULT NULL,
  `col2` int DEFAULT NULL,
  `col3` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tb_sgs`
--

CREATE TABLE `tb_sgs` (
  `id` bigint UNSIGNED NOT NULL,
  `col1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `col5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `colonne6` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `thematique_tmq`
--

CREATE TABLE `thematique_tmq` (
  `id_tmq` bigint UNSIGNED NOT NULL,
  `nom_tmq` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_tmq` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo_tmq` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_tmq` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `thematique_tmq`
--

INSERT INTO `thematique_tmq` (`id_tmq`, `nom_tmq`, `description_tmq`, `photo_tmq`, `created_at`, `updated_at`, `geler_tmq`) VALUES
(1, 'ccc', 'vvvvvvvv', 'logo_6398ac55ad55d.jpg', NULL, '2023-02-22 12:36:11', 1),
(2, 'tttttt', 'gggg', NULL, '2022-12-12 22:38:19', '2022-12-13 13:10:50', 1),
(3, 'dsdsfdsdffd', 'dfdfddf', 'thematique_63998de4174cf.png', '2022-12-13 13:51:43', '2022-12-14 15:01:00', 1),
(4, 'hhjhj', 'hjhjhj', 'thematique_63998e5be036c.png', '2022-12-13 13:54:44', '2022-12-14 10:17:17', 1),
(5, 'cccc', 'xxx', NULL, '2022-12-13 14:15:47', '2022-12-13 16:11:50', 1),
(6, 'dddss', 'sssssssss', NULL, '2022-12-13 14:30:27', '2022-12-13 14:32:32', 1),
(7, 'dfgfgf', 'xxxx', NULL, '2022-12-13 14:32:54', '2022-12-14 10:17:35', 1),
(8, 'Abdrahamanesss', 'sss', NULL, '2022-12-13 14:34:22', '2022-12-13 16:11:55', 1),
(9, 'ddds', 'ccvv', NULL, '2022-12-13 14:35:51', '2022-12-14 10:17:25', 1),
(10, 'sssdd', 'gghh', '1', '2022-12-13 14:36:33', '2022-12-13 16:12:01', 1),
(11, 'rrtrrccccc', 'rererecc', NULL, '2022-12-13 14:45:00', '2022-12-13 16:11:44', 1),
(12, 'ppp', 'pppppppppppp', NULL, '2022-12-13 15:20:30', '2022-12-14 10:17:41', 1),
(13, 'sssss', 'ss', NULL, '2022-12-13 15:34:02', '2022-12-14 10:17:30', 1),
(14, 'dddqq', 'qqqdd', NULL, '2022-12-14 08:49:46', '2022-12-14 10:17:46', 1),
(15, 'Vero voluptas porro', 'Quasi perspiciatis', NULL, '2023-03-14 11:24:02', '2023-03-14 11:24:02', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_activite_convention_tac`
--

CREATE TABLE `type_activite_convention_tac` (
  `id_tac` bigint UNSIGNED NOT NULL,
  `resultat_tac` bigint DEFAULT NULL,
  `code_tac` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `intitule_tac` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_tac` bigint UNSIGNED NOT NULL,
  `date_modifie_tac` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` bigint NOT NULL,
  `geler_tac` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_activite_convention_tac`
--

INSERT INTO `type_activite_convention_tac` (`id_tac`, `resultat_tac`, `code_tac`, `intitule_tac`, `idusrcreation_tac`, `date_modifie_tac`, `created_at`, `updated_at`, `description`, `geler_tac`) VALUES
(1, 1, '010', 'Quasi et laudantium', 1, NULL, '2023-02-08 15:10:51', '2023-02-08 16:56:14', 1, 1),
(2, 1, NULL, 'tester', 1, NULL, '2023-02-08 16:33:08', '2023-02-08 16:33:08', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_activite_tpa`
--

CREATE TABLE `type_activite_tpa` (
  `id_tpa` bigint UNSIGNED NOT NULL,
  `code_tpa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `structure_tpa` bigint UNSIGNED DEFAULT NULL,
  `libelle_tpa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_tpa` bigint UNSIGNED NOT NULL,
  `date_modifie_tpa` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_tpa` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_activite_tpa`
--

INSERT INTO `type_activite_tpa` (`id_tpa`, `code_tpa`, `structure_tpa`, `libelle_tpa`, `idusrcreation_tpa`, `date_modifie_tpa`, `created_at`, `updated_at`, `geler_tpa`) VALUES
(1, '0001', NULL, 'ORGANISATION ATELIER, SESSION de FORMATION/ VALIDATION/ SENSIBILISATION/ RECYCLAGE', 1, NULL, '2023-02-23 14:50:19', '2023-02-23 14:50:19', 0),
(2, '0002', NULL, 'PRODUIRE/ PUBLIER/ DIFFUSER CATALOGUES/ TEXTES/ RAPPORTS', 1, NULL, '2023-02-23 14:50:36', '2023-02-23 14:50:36', 0),
(3, '0003', NULL, 'ENREGISTRER/ PUBLIER AU JOURNAL OFFICIEL DES TEXTES/ REGLEMENTS', 1, NULL, '2023-02-23 14:51:04', '2023-02-23 14:51:04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_cadre_logique_tcl`
--

CREATE TABLE `type_cadre_logique_tcl` (
  `id_tcl` bigint UNSIGNED NOT NULL,
  `type_tcl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_tcl` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_cadre_logique_tcl`
--

INSERT INTO `type_cadre_logique_tcl` (`id_tcl`, `type_tcl`, `created_at`, `updated_at`, `geler_tcl`) VALUES
(1, 'Impacts2', '2023-01-23 14:38:39', '2023-02-13 10:22:39', 0),
(2, 'Produit', '2023-01-23 14:40:04', '2023-02-01 13:15:51', 1),
(4, 'Effets', '2023-02-01 13:23:22', '2023-02-12 19:23:05', 0),
(5, 'Produit', '2023-02-01 13:23:31', '2023-02-01 13:30:46', 1),
(6, 'fdfffdhh', '2023-02-01 13:25:49', '2023-02-01 13:26:11', 1),
(7, 'fdfffdhh', '2023-02-01 13:30:13', '2023-02-01 13:30:35', 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_parametre_typ`
--

CREATE TABLE `type_parametre_typ` (
  `id_typ` bigint UNSIGNED NOT NULL,
  `code_typ` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libelle_typ` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `empty1_typ` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_typ` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_typ` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_typ` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_partenaire_tpt`
--

CREATE TABLE `type_partenaire_tpt` (
  `id_tpt` bigint UNSIGNED NOT NULL,
  `nom_tpt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_tpt` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_tpt` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_partenaire_tpt`
--

INSERT INTO `type_partenaire_tpt` (`id_tpt`, `nom_tpt`, `description_tpt`, `geler_tpt`, `created_at`, `updated_at`) VALUES
(1, 'ONG', 'Organisation non gouvernementale', 0, '2022-12-14 10:53:49', '2022-12-14 10:56:18'),
(2, 'Etat', 'Etat', 1, '2022-12-14 10:56:52', '2022-12-14 10:57:04'),
(3, 'sssqq', 'qqq', 1, '2022-12-14 13:04:12', '2022-12-14 15:06:06'),
(4, 'type1', 'type1', 0, '2022-12-15 10:52:21', '2022-12-15 10:52:21'),
(5, 'type2', 'type2', 0, '2022-12-15 10:52:40', '2022-12-15 10:52:40'),
(6, 'type3', 'type3', 0, '2022-12-15 10:52:52', '2022-12-15 10:52:52'),
(7, 'Structure', 'Structures', 0, '2023-02-06 19:15:36', '2023-02-06 19:15:36');

-- --------------------------------------------------------

--
-- Structure de la table `type_programme_tpr`
--

CREATE TABLE `type_programme_tpr` (
  `id_tpr` bigint UNSIGNED NOT NULL,
  `nom_tpr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_tpr` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `geler_tpr` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_programme_tpr`
--

INSERT INTO `type_programme_tpr` (`id_tpr`, `nom_tpr`, `description_tpr`, `geler_tpr`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'xxxxx', 0, '2022-12-14 14:59:09', '2022-12-14 14:59:20'),
(2, 'test2', 'wwww', 1, '2022-12-14 14:59:34', '2022-12-14 15:06:59'),
(3, 'test3', 'cccc', 1, '2022-12-14 14:59:45', '2022-12-14 15:07:53'),
(4, 'test33', 'ssss', 0, '2022-12-14 15:31:43', '2022-12-14 15:31:43'),
(5, 'xxx', NULL, 0, '2023-01-19 17:21:25', '2023-01-19 17:21:25');

-- --------------------------------------------------------

--
-- Structure de la table `type_tache_activite_tta`
--

CREATE TABLE `type_tache_activite_tta` (
  `id_tta` bigint UNSIGNED NOT NULL,
  `ordre_tta` bigint DEFAULT NULL,
  `activite_tpa` bigint UNSIGNED NOT NULL,
  `intitule_tta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proportion_tta` bigint DEFAULT NULL,
  `idusrcreation_tta` bigint UNSIGNED NOT NULL,
  `date_modifie_tta` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `unite_indicateur_uid`
--

CREATE TABLE `unite_indicateur_uid` (
  `id_uid` bigint UNSIGNED NOT NULL,
  `abrege_uid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `definition_uid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `unite_indicateur_uti`
--

CREATE TABLE `unite_indicateur_uti` (
  `id_uti` bigint UNSIGNED NOT NULL,
  `code_uti` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_uti` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `geler_uti` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `unite_indicateur_uti`
--

INSERT INTO `unite_indicateur_uti` (`id_uti`, `code_uti`, `nom_uti`, `created_at`, `updated_at`, `geler_uti`) VALUES
(1, 'cc', 'cccdddd', NULL, '2022-12-13 09:09:35', 0),
(2, 'zzz', 'dddssd1111', '2022-12-12 22:47:03', '2022-12-13 13:11:07', 0),
(3, 'ddd', 'dd', '2022-12-13 13:46:46', '2022-12-14 15:04:49', 0),
(4, 'fdgfgf', 'fdfdfd', '2022-12-13 13:47:04', '2022-12-13 13:47:11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `profil_id` bigint UNSIGNED NOT NULL,
  `structure_id` bigint UNSIGNED DEFAULT NULL,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_connected_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint UNSIGNED NOT NULL,
  `fonction_id` bigint UNSIGNED DEFAULT NULL,
  `geler` int NOT NULL DEFAULT '0',
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `profil_id`, `structure_id`, `nom`, `prenom`, `email`, `first_connected_at`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`, `fonction_id`, `geler`, `titre`, `telephone`) VALUES
(3, 2, NULL, 'Sawadogo', 'Sidiki', 'sidiki.sawadogo@reveiloil.ci', NULL, NULL, '$2y$10$68iCv8.RLb8jzbhgvGXMMekv0tMlXeT6y5BLHP0C2gA6f2dWxDali', NULL, NULL, NULL, NULL, '2022-11-16 19:40:17', '2022-11-16 19:47:13', 1, 1, 0, NULL, NULL),
(2, 2, NULL, 'Bantango', 'Hamadou', 'hamadou.bantango@reveiloil.ci', '2022-11-19 17:05:35', NULL, '$2y$10$D9NyFOlBSB5qcuKV477HJubpzpn9/HcOFYIw3jTdLPx2E6i258BLW', NULL, NULL, NULL, NULL, '2022-11-12 16:03:28', '2022-11-19 17:05:35', 1, 1, 0, NULL, NULL),
(1, 1, NULL, 'admin', 'admin', 'admin@admin.com', '2022-10-30 16:59:28', '2022-10-30 16:56:19', '$2y$10$5AkvIXPNRVwj1lfeWw9k1e2ph7JCBfm9g7GxG5TPPa/mFrmIWk43O', NULL, NULL, 'ZTPBBTxlil1F2l5Db0HpwudPQE4aKJzEuQOzOOgoaRXViXJ3JRxj5Y1sC1h9', NULL, '2022-10-30 16:56:19', '2022-10-30 16:59:28', 1, 1, 0, NULL, NULL),
(4, 2, NULL, 'KOME', 'MOHAMED', 'kome@gmail.com', NULL, NULL, '$2y$10$FRiksbe0nwacArBPx/jkIOZRgLmY3913sIstlDRxdf8FhHXBZhxNq', NULL, NULL, NULL, NULL, '2023-05-27 16:28:17', '2023-05-27 16:28:17', 1, 1, 0, NULL, NULL),
(5, 2, 2, 'salim', 'salim', 'salim@gmail.com', NULL, NULL, '$2y$10$u72U0M1yMtd.jup1jnbH6OzMkGDgRiJ8Yaj0bZ..GsS9PB7U9Wr6S', NULL, NULL, NULL, NULL, '2023-06-10 15:16:55', '2023-06-10 15:16:55', 1, 2, 0, 'Monsieur', '20202020');

-- --------------------------------------------------------

--
-- Structure de la table `versement_ver`
--

CREATE TABLE `versement_ver` (
  `id_ver` bigint UNSIGNED NOT NULL,
  `idcmd_ver` bigint UNSIGNED NOT NULL,
  `montant_ver` double(21,2) NOT NULL,
  `empty1_ver` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty2_ver` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `empty3_ver` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_ver` bigint UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villages_vil`
--

CREATE TABLE `villages_vil` (
  `id_vil` bigint UNSIGNED NOT NULL,
  `code_vil` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom_vil` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idusrcreation_vil` bigint DEFAULT NULL,
  `idusrcreation_modif_vil` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idspf_vil` bigint UNSIGNED DEFAULT NULL,
  `logitude_vil` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude_vil` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `homme_vil` int DEFAULT NULL,
  `femme_vil` int DEFAULT NULL,
  `jeune_vil` int DEFAULT NULL,
  `menage_vil` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `approvisionnement_apv`
--
ALTER TABLE `approvisionnement_apv`
  ADD PRIMARY KEY (`id_apv`),
  ADD KEY `approvisionnement_apv_idptn_apv_index` (`idptn_apv`),
  ADD KEY `approvisionnement_apv_idusr_apv_index` (`idusr_apv`),
  ADD KEY `approvisionnement_apv_idusrcreation_apv_index` (`idusrcreation_apv`);

--
-- Index pour la table `arobase`
--
ALTER TABLE `arobase`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cadre_logique_cl`
--
ALTER TABLE `cadre_logique_cl`
  ADD PRIMARY KEY (`id_cl`);

--
-- Index pour la table `cadre_resultat_projet_crp`
--
ALTER TABLE `cadre_resultat_projet_crp`
  ADD PRIMARY KEY (`id_crp`);

--
-- Index pour la table `cadre_resultat_projet_crp1`
--
ALTER TABLE `cadre_resultat_projet_crp1`
  ADD PRIMARY KEY (`id_crp`),
  ADD KEY `cadre_resultat_projet_crp_id_niv_crp_foreign` (`id_niv_crp`);

--
-- Index pour la table `categorie_cat`
--
ALTER TABLE `categorie_cat`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `categorie_cat_idcat_cat_index` (`idcat_cat`),
  ADD KEY `categorie_cat_idusrcreation_cat_index` (`idusrcreation_cat`);

--
-- Index pour la table `categorie_depense_cat`
--
ALTER TABLE `categorie_depense_cat`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `categorie_depense_cat_code_cat_unique` (`code_cat`),
  ADD KEY `categorie_depense_cat_geler_cat_index` (`geler_cat`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classeur_cl`
--
ALTER TABLE `classeur_cl`
  ADD PRIMARY KEY (`id_cl`),
  ADD KEY `classeur_cl_geler_cl_index` (`geler_cl`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colonnes_feuilles`
--
ALTER TABLE `colonnes_feuilles`
  ADD PRIMARY KEY (`id_col`);

--
-- Index pour la table `commande_cmd`
--
ALTER TABLE `commande_cmd`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `commande_cmd_numero_cmd_index` (`numero_cmd`),
  ADD KEY `commande_cmd_idptn_cmd_index` (`idptn_cmd`),
  ADD KEY `commande_cmd_idusr_cmd_index` (`idusr_cmd`),
  ADD KEY `commande_cmd_idusrcreation_cmd_index` (`idusrcreation_cmd`);

--
-- Index pour la table `convention_cvt`
--
ALTER TABLE `convention_cvt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convention_cvt_geler_cvt_index` (`geler_cvt`);

--
-- Index pour la table `convention_resultat`
--
ALTER TABLE `convention_resultat`
  ADD PRIMARY KEY (`id_cvr`),
  ADD KEY `convention_resultat_convention_cvr_foreign` (`convention_cvr`),
  ADD KEY `convention_resultat_geler_cvr_index` (`geler_cvr`);

--
-- Index pour la table `departement_dep`
--
ALTER TABLE `departement_dep`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `departement_dep_idreg_dep_foreign` (`idreg_dep`);

--
-- Index pour la table `depense_dep`
--
ALTER TABLE `depense_dep`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `depense_dep_idusrcreation_dep_index` (`idusrcreation_dep`);

--
-- Index pour la table `docs_dossier`
--
ALTER TABLE `docs_dossier`
  ADD PRIMARY KEY (`id_doss`);

--
-- Index pour la table `docs_fichier`
--
ALTER TABLE `docs_fichier`
  ADD PRIMARY KEY (`id_fich`),
  ADD KEY `fk_dossier_dcs` (`id_dossier`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleveur`
--
ALTER TABLE `eleveur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `feuille_f`
--
ALTER TABLE `feuille_f`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `feuille_f_geler_f_index` (`geler_f`);

--
-- Index pour la table `fonction_fnct`
--
ALTER TABLE `fonction_fnct`
  ADD PRIMARY KEY (`id_fnct`),
  ADD KEY `fonction_fnct_geler_fnct_index` (`geler_fnct`);

--
-- Index pour la table `indicateur_programme_iprg`
--
ALTER TABLE `indicateur_programme_iprg`
  ADD PRIMARY KEY (`id_iprg`);

--
-- Index pour la table `indicateur_projet_iprj`
--
ALTER TABLE `indicateur_projet_iprj`
  ADD PRIMARY KEY (`id_iprj`);

--
-- Index pour la table `lana mcpherson`
--
ALTER TABLE `lana mcpherson`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `localites_loc`
--
ALTER TABLE `localites_loc`
  ADD PRIMARY KEY (`id_localite`),
  ADD KEY `localites_loc_idniv_localite_foreign` (`idniv_localite`),
  ADD KEY `localites_loc_id_parent_localite_foreign` (`id_parent_localite`),
  ADD KEY `localites_loc_geler_localite_index` (`geler_localite`);

--
-- Index pour la table `localite_loc`
--
ALTER TABLE `localite_loc`
  ADD PRIMARY KEY (`id_loc`),
  ADD KEY `localite_loc_idlon_loc_foreign` (`idlon_loc`),
  ADD KEY `localite_loc_id_parent_localite_loc_foreign` (`id_parent_localite_loc`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `moh2`
--
ALTER TABLE `moh2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau_cadre_logique_ncl`
--
ALTER TABLE `niveau_cadre_logique_ncl`
  ADD PRIMARY KEY (`id_ncl`);

--
-- Index pour la table `niveau_cadre_resultat_projet_ncrp`
--
ALTER TABLE `niveau_cadre_resultat_projet_ncrp`
  ADD PRIMARY KEY (`id_ncrp`);

--
-- Index pour la table `niveau_localite_lon`
--
ALTER TABLE `niveau_localite_lon`
  ADD PRIMARY KEY (`id_lon`);

--
-- Index pour la table `niveau_localite_nvl`
--
ALTER TABLE `niveau_localite_nvl`
  ADD PRIMARY KEY (`id_nvl`),
  ADD KEY `niveau_localite_nvl_niveau_index` (`niveau`),
  ADD KEY `niveau_localite_nvl_geler_nvl_index` (`geler_nvl`),
  ADD KEY `niveau_localite_nvl_taille_nvl_index` (`taille_nvl`);

--
-- Index pour la table `niveau_plan_analytique_npa`
--
ALTER TABLE `niveau_plan_analytique_npa`
  ADD PRIMARY KEY (`id_npa`);

--
-- Index pour la table `observation_ptba_op`
--
ALTER TABLE `observation_ptba_op`
  ADD PRIMARY KEY (`id_op`);

--
-- Index pour la table `parametre_par`
--
ALTER TABLE `parametre_par`
  ADD PRIMARY KEY (`id_par`),
  ADD KEY `parametre_par_idtyp_par_index` (`idtyp_par`),
  ADD KEY `parametre_par_code_par_index` (`code_par`),
  ADD KEY `parametre_par_idusrcreation_par_index` (`idusrcreation_par`);

--
-- Index pour la table `partenaire_pat`
--
ALTER TABLE `partenaire_pat`
  ADD PRIMARY KEY (`id_pat`),
  ADD KEY `partenaire_pat_geler_pat_index` (`geler_pat`);

--
-- Index pour la table `partenaire_ptn`
--
ALTER TABLE `partenaire_ptn`
  ADD PRIMARY KEY (`id_ptn`),
  ADD KEY `partenaire_ptn_idtyp_ptn_index` (`idtyp_ptn`),
  ADD KEY `partenaire_ptn_idusrcreation_ptn_index` (`idusrcreation_ptn`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `plan_analytique_pa`
--
ALTER TABLE `plan_analytique_pa`
  ADD PRIMARY KEY (`id_pa`);

--
-- Index pour la table `produit_approvisionnements_pap`
--
ALTER TABLE `produit_approvisionnements_pap`
  ADD PRIMARY KEY (`id_pap`),
  ADD KEY `produit_approvisionnements_pap_idpro_pap_index` (`idpro_pap`),
  ADD KEY `produit_approvisionnements_pap_idapv_pap_index` (`idapv_pap`),
  ADD KEY `produit_approvisionnements_pap_idusrcreation_pap_index` (`idusrcreation_pap`);

--
-- Index pour la table `produit_commande_pcm`
--
ALTER TABLE `produit_commande_pcm`
  ADD PRIMARY KEY (`id_pcm`),
  ADD KEY `produit_commande_pcm_idpro_pcm_index` (`idpro_pcm`),
  ADD KEY `produit_commande_pcm_idcmd_pcm_index` (`idcmd_pcm`),
  ADD KEY `produit_commande_pcm_idusrcreation_pcm_index` (`idusrcreation_pcm`);

--
-- Index pour la table `produit_pro`
--
ALTER TABLE `produit_pro`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `produit_pro_idmar_pro_index` (`idmar_pro`),
  ADD KEY `produit_pro_idcat_pro_index` (`idcat_pro`),
  ADD KEY `produit_pro_slug_pro_index` (`slug_pro`),
  ADD KEY `produit_pro_idusrcreation_pro_index` (`idusrcreation_pro`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil_modules`
--
ALTER TABLE `profil_modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `programme_prg`
--
ALTER TABLE `programme_prg`
  ADD PRIMARY KEY (`id_prg`),
  ADD UNIQUE KEY `programme_prg_code_prg_unique` (`code_prg`),
  ADD KEY `programme_prg_idusrcreation_prg_index` (`idusrcreation_prg`),
  ADD KEY `programme_prg_geler_prg_index` (`geler_prg`);

--
-- Index pour la table `projets_users_pru`
--
ALTER TABLE `projets_users_pru`
  ADD PRIMARY KEY (`id_pru`),
  ADD KEY `projets_users_pru_idprj_pru_foreign` (`idprj_pru`);

--
-- Index pour la table `projet_prj`
--
ALTER TABLE `projet_prj`
  ADD PRIMARY KEY (`id_prj`),
  ADD UNIQUE KEY `projet_prj_code_prj_unique` (`code_prj`),
  ADD KEY `projet_prj_idprg_prj_foreign` (`idprg_prj`),
  ADD KEY `projet_prj_geler_prj_index` (`geler_prj`);

--
-- Index pour la table `ptba`
--
ALTER TABLE `ptba`
  ADD PRIMARY KEY (`id_ptba`);

--
-- Index pour la table `ptba_cout_pc`
--
ALTER TABLE `ptba_cout_pc`
  ADD PRIMARY KEY (`id_pc`);

--
-- Index pour la table `ptba_indicateur_pi`
--
ALTER TABLE `ptba_indicateur_pi`
  ADD PRIMARY KEY (`id_pi`);

--
-- Index pour la table `ptba_tache_pt`
--
ALTER TABLE `ptba_tache_pt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Index pour la table `rapport12`
--
ALTER TABLE `rapport12`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rapport_dynamiques`
--
ALTER TABLE `rapport_dynamiques`
  ADD PRIMARY KEY (`id_rapp`);

--
-- Index pour la table `rapport_rap`
--
ALTER TABLE `rapport_rap`
  ADD PRIMARY KEY (`id_rap`),
  ADD KEY `rapport_rap_idusrcreation_rap_index` (`idusrcreation_rap`);

--
-- Index pour la table `recommandation_action_rma`
--
ALTER TABLE `recommandation_action_rma`
  ADD PRIMARY KEY (`id_rma`);

--
-- Index pour la table `recommandation_rc`
--
ALTER TABLE `recommandation_rc`
  ADD PRIMARY KEY (`id_rc`);

--
-- Index pour la table `region_reg`
--
ALTER TABLE `region_reg`
  ADD PRIMARY KEY (`id_reg`);

--
-- Index pour la table `sous_prefecture_spf`
--
ALTER TABLE `sous_prefecture_spf`
  ADD PRIMARY KEY (`id_spf`),
  ADD KEY `sous_prefecture_spf_iddep_spf_foreign` (`iddep_spf`);

--
-- Index pour la table `statut_commande_stc`
--
ALTER TABLE `statut_commande_stc`
  ADD PRIMARY KEY (`id_stc`),
  ADD KEY `statut_commande_stc_idsta_stc_index` (`idsta_stc`),
  ADD KEY `statut_commande_stc_idcmd_stc_index` (`idcmd_stc`),
  ADD KEY `statut_commande_stc_idusrcreation_stc_index` (`idusrcreation_stc`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suivi_indicateur_pp`
--
ALTER TABLE `suivi_indicateur_pp`
  ADD PRIMARY KEY (`id_pp`),
  ADD KEY `suivi_indicateur_pp_geler_pp_index` (`geler_pp`);

--
-- Index pour la table `suivi_indicateur_ptba_sip`
--
ALTER TABLE `suivi_indicateur_ptba_sip`
  ADD PRIMARY KEY (`id_sip`),
  ADD KEY `suivi_indicateur_ptba_sip_geler_sip_index` (`geler_sip`),
  ADD KEY `suivi_indicateur_ptba_sip_id_activite_sip_index` (`id_activite_sip`);

--
-- Index pour la table `suivi_tache_ptba_stp`
--
ALTER TABLE `suivi_tache_ptba_stp`
  ADD PRIMARY KEY (`id_stp`);

--
-- Index pour la table `tb_feuille2`
--
ALTER TABLE `tb_feuille2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_sgs`
--
ALTER TABLE `tb_sgs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `thematique_tmq`
--
ALTER TABLE `thematique_tmq`
  ADD PRIMARY KEY (`id_tmq`),
  ADD KEY `thematique_tmq_geler_tmq_index` (`geler_tmq`);

--
-- Index pour la table `type_activite_convention_tac`
--
ALTER TABLE `type_activite_convention_tac`
  ADD PRIMARY KEY (`id_tac`),
  ADD KEY `type_activite_convention_tac_geler_tac_index` (`geler_tac`);

--
-- Index pour la table `type_activite_tpa`
--
ALTER TABLE `type_activite_tpa`
  ADD PRIMARY KEY (`id_tpa`),
  ADD KEY `type_activite_tpa_geler_tpa_index` (`geler_tpa`);

--
-- Index pour la table `type_cadre_logique_tcl`
--
ALTER TABLE `type_cadre_logique_tcl`
  ADD PRIMARY KEY (`id_tcl`),
  ADD KEY `type_cadre_logique_tcl_geler_tcl_index` (`geler_tcl`);

--
-- Index pour la table `type_parametre_typ`
--
ALTER TABLE `type_parametre_typ`
  ADD PRIMARY KEY (`id_typ`),
  ADD KEY `type_parametre_typ_code_typ_index` (`code_typ`),
  ADD KEY `type_parametre_typ_idusrcreation_typ_index` (`idusrcreation_typ`);

--
-- Index pour la table `type_partenaire_tpt`
--
ALTER TABLE `type_partenaire_tpt`
  ADD PRIMARY KEY (`id_tpt`);

--
-- Index pour la table `type_programme_tpr`
--
ALTER TABLE `type_programme_tpr`
  ADD PRIMARY KEY (`id_tpr`);

--
-- Index pour la table `type_tache_activite_tta`
--
ALTER TABLE `type_tache_activite_tta`
  ADD PRIMARY KEY (`id_tta`);

--
-- Index pour la table `unite_indicateur_uid`
--
ALTER TABLE `unite_indicateur_uid`
  ADD PRIMARY KEY (`id_uid`),
  ADD UNIQUE KEY `unite_indicateur_uid_abrege_uid_unique` (`abrege_uid`);

--
-- Index pour la table `unite_indicateur_uti`
--
ALTER TABLE `unite_indicateur_uti`
  ADD PRIMARY KEY (`id_uti`),
  ADD UNIQUE KEY `unite_indicateur_uti_code_uti_unique` (`code_uti`),
  ADD KEY `unite_indicateur_uti_geler_uti_index` (`geler_uti`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profil_id_index` (`profil_id`),
  ADD KEY `users_structure_id_index` (`structure_id`),
  ADD KEY `users_idusrcreation_index` (`idusrcreation`),
  ADD KEY `users_fonction_id_index` (`fonction_id`),
  ADD KEY `users_geler_index` (`geler`);

--
-- Index pour la table `versement_ver`
--
ALTER TABLE `versement_ver`
  ADD PRIMARY KEY (`id_ver`),
  ADD KEY `versement_ver_idcmd_ver_index` (`idcmd_ver`),
  ADD KEY `versement_ver_idusrcreation_ver_index` (`idusrcreation_ver`);

--
-- Index pour la table `villages_vil`
--
ALTER TABLE `villages_vil`
  ADD PRIMARY KEY (`id_vil`),
  ADD KEY `villages_vil_idspf_vil_foreign` (`idspf_vil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `approvisionnement_apv`
--
ALTER TABLE `approvisionnement_apv`
  MODIFY `id_apv` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `arobase`
--
ALTER TABLE `arobase`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cadre_logique_cl`
--
ALTER TABLE `cadre_logique_cl`
  MODIFY `id_cl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cadre_resultat_projet_crp`
--
ALTER TABLE `cadre_resultat_projet_crp`
  MODIFY `id_crp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cadre_resultat_projet_crp1`
--
ALTER TABLE `cadre_resultat_projet_crp1`
  MODIFY `id_crp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categorie_cat`
--
ALTER TABLE `categorie_cat`
  MODIFY `id_cat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie_depense_cat`
--
ALTER TABLE `categorie_depense_cat`
  MODIFY `id_cat` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classeur_cl`
--
ALTER TABLE `classeur_cl`
  MODIFY `id_cl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `colonnes_feuilles`
--
ALTER TABLE `colonnes_feuilles`
  MODIFY `id_col` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `commande_cmd`
--
ALTER TABLE `commande_cmd`
  MODIFY `id_cmd` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `convention_cvt`
--
ALTER TABLE `convention_cvt`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `convention_resultat`
--
ALTER TABLE `convention_resultat`
  MODIFY `id_cvr` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `departement_dep`
--
ALTER TABLE `departement_dep`
  MODIFY `id_dep` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `depense_dep`
--
ALTER TABLE `depense_dep`
  MODIFY `id_dep` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `docs_dossier`
--
ALTER TABLE `docs_dossier`
  MODIFY `id_doss` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `docs_fichier`
--
ALTER TABLE `docs_fichier`
  MODIFY `id_fich` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `eleveur`
--
ALTER TABLE `eleveur`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feuille_f`
--
ALTER TABLE `feuille_f`
  MODIFY `id_f` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `fonction_fnct`
--
ALTER TABLE `fonction_fnct`
  MODIFY `id_fnct` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `indicateur_programme_iprg`
--
ALTER TABLE `indicateur_programme_iprg`
  MODIFY `id_iprg` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `indicateur_projet_iprj`
--
ALTER TABLE `indicateur_projet_iprj`
  MODIFY `id_iprj` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `lana mcpherson`
--
ALTER TABLE `lana mcpherson`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `localites_loc`
--
ALTER TABLE `localites_loc`
  MODIFY `id_localite` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `localite_loc`
--
ALTER TABLE `localite_loc`
  MODIFY `id_loc` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `moh2`
--
ALTER TABLE `moh2`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `niveau_cadre_logique_ncl`
--
ALTER TABLE `niveau_cadre_logique_ncl`
  MODIFY `id_ncl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `niveau_cadre_resultat_projet_ncrp`
--
ALTER TABLE `niveau_cadre_resultat_projet_ncrp`
  MODIFY `id_ncrp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `niveau_localite_lon`
--
ALTER TABLE `niveau_localite_lon`
  MODIFY `id_lon` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau_localite_nvl`
--
ALTER TABLE `niveau_localite_nvl`
  MODIFY `id_nvl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `niveau_plan_analytique_npa`
--
ALTER TABLE `niveau_plan_analytique_npa`
  MODIFY `id_npa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `observation_ptba_op`
--
ALTER TABLE `observation_ptba_op`
  MODIFY `id_op` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `parametre_par`
--
ALTER TABLE `parametre_par`
  MODIFY `id_par` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `partenaire_pat`
--
ALTER TABLE `partenaire_pat`
  MODIFY `id_pat` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `partenaire_ptn`
--
ALTER TABLE `partenaire_ptn`
  MODIFY `id_ptn` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plan_analytique_pa`
--
ALTER TABLE `plan_analytique_pa`
  MODIFY `id_pa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit_approvisionnements_pap`
--
ALTER TABLE `produit_approvisionnements_pap`
  MODIFY `id_pap` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit_commande_pcm`
--
ALTER TABLE `produit_commande_pcm`
  MODIFY `id_pcm` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit_pro`
--
ALTER TABLE `produit_pro`
  MODIFY `id_pro` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `profil_modules`
--
ALTER TABLE `profil_modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `programme_prg`
--
ALTER TABLE `programme_prg`
  MODIFY `id_prg` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `projets_users_pru`
--
ALTER TABLE `projets_users_pru`
  MODIFY `id_pru` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `projet_prj`
--
ALTER TABLE `projet_prj`
  MODIFY `id_prj` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ptba`
--
ALTER TABLE `ptba`
  MODIFY `id_ptba` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `ptba_cout_pc`
--
ALTER TABLE `ptba_cout_pc`
  MODIFY `id_pc` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ptba_indicateur_pi`
--
ALTER TABLE `ptba_indicateur_pi`
  MODIFY `id_pi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ptba_tache_pt`
--
ALTER TABLE `ptba_tache_pt`
  MODIFY `id_pt` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rapport12`
--
ALTER TABLE `rapport12`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapport_dynamiques`
--
ALTER TABLE `rapport_dynamiques`
  MODIFY `id_rapp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `rapport_rap`
--
ALTER TABLE `rapport_rap`
  MODIFY `id_rap` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recommandation_action_rma`
--
ALTER TABLE `recommandation_action_rma`
  MODIFY `id_rma` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recommandation_rc`
--
ALTER TABLE `recommandation_rc`
  MODIFY `id_rc` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `region_reg`
--
ALTER TABLE `region_reg`
  MODIFY `id_reg` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_prefecture_spf`
--
ALTER TABLE `sous_prefecture_spf`
  MODIFY `id_spf` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statut_commande_stc`
--
ALTER TABLE `statut_commande_stc`
  MODIFY `id_stc` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `suivi_indicateur_pp`
--
ALTER TABLE `suivi_indicateur_pp`
  MODIFY `id_pp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `suivi_indicateur_ptba_sip`
--
ALTER TABLE `suivi_indicateur_ptba_sip`
  MODIFY `id_sip` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `suivi_tache_ptba_stp`
--
ALTER TABLE `suivi_tache_ptba_stp`
  MODIFY `id_stp` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `tb_feuille2`
--
ALTER TABLE `tb_feuille2`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_sgs`
--
ALTER TABLE `tb_sgs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `thematique_tmq`
--
ALTER TABLE `thematique_tmq`
  MODIFY `id_tmq` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `type_activite_convention_tac`
--
ALTER TABLE `type_activite_convention_tac`
  MODIFY `id_tac` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_activite_tpa`
--
ALTER TABLE `type_activite_tpa`
  MODIFY `id_tpa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_cadre_logique_tcl`
--
ALTER TABLE `type_cadre_logique_tcl`
  MODIFY `id_tcl` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_parametre_typ`
--
ALTER TABLE `type_parametre_typ`
  MODIFY `id_typ` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_partenaire_tpt`
--
ALTER TABLE `type_partenaire_tpt`
  MODIFY `id_tpt` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `type_programme_tpr`
--
ALTER TABLE `type_programme_tpr`
  MODIFY `id_tpr` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_tache_activite_tta`
--
ALTER TABLE `type_tache_activite_tta`
  MODIFY `id_tta` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unite_indicateur_uid`
--
ALTER TABLE `unite_indicateur_uid`
  MODIFY `id_uid` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `unite_indicateur_uti`
--
ALTER TABLE `unite_indicateur_uti`
  MODIFY `id_uti` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `versement_ver`
--
ALTER TABLE `versement_ver`
  MODIFY `id_ver` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `villages_vil`
--
ALTER TABLE `villages_vil`
  MODIFY `id_vil` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `docs_fichier`
--
ALTER TABLE `docs_fichier`
  ADD CONSTRAINT `fk_dossier_dcs` FOREIGN KEY (`id_dossier`) REFERENCES `docs_dossier` (`id_doss`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
