-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 28 nov. 2022 à 17:39
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `savet1935449_2kmze3`
--

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement_apv`
--

CREATE TABLE `approvisionnement_apv` (
  `id_apv` bigint(20) UNSIGNED NOT NULL,
  `idptn_apv` bigint(20) UNSIGNED NOT NULL,
  `idusr_apv` bigint(20) UNSIGNED DEFAULT NULL,
  `quantite_apv` int(11) DEFAULT NULL,
  `montant_apv` float DEFAULT NULL,
  `telephone_apv` varchar(255) DEFAULT NULL,
  `date_livraison_apv` date NOT NULL,
  `empty1_apv` varchar(100) DEFAULT NULL,
  `empty2_apv` varchar(100) DEFAULT NULL,
  `empty3_apv` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_apv` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `approvisionnement_apv`
--

TRUNCATE TABLE `approvisionnement_apv`;
--
-- Déchargement des données de la table `approvisionnement_apv`
--

INSERT INTO `approvisionnement_apv` (`id_apv`, `idptn_apv`, `idusr_apv`, `quantite_apv`, `montant_apv`, `telephone_apv`, `date_livraison_apv`, `empty1_apv`, `empty2_apv`, `empty3_apv`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_apv`) VALUES
(1, 3, NULL, NULL, 25168500, NULL, '2022-11-19', NULL, NULL, NULL, '2022-11-21 21:12:41', '2022-11-19 16:46:22', '2022-11-21 21:12:41', 2),
(2, 3, NULL, NULL, 26371500, NULL, '2022-11-21', NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(3, 3, NULL, NULL, 8084000, NULL, '2022-11-21', NULL, NULL, NULL, NULL, '2022-11-21 23:42:54', '2022-11-21 23:42:54', 2),
(4, 3, NULL, NULL, 1260000, NULL, '2022-11-21', NULL, NULL, NULL, NULL, '2022-11-21 23:44:36', '2022-11-21 23:44:36', 2),
(5, 18, NULL, NULL, 0, NULL, '2022-11-28', '1', NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_cat`
--

CREATE TABLE `categorie_cat` (
  `id_cat` bigint(20) UNSIGNED NOT NULL,
  `idcat_cat` bigint(20) UNSIGNED DEFAULT NULL,
  `libelle_cat` varchar(255) NOT NULL,
  `empty1_cat` varchar(100) DEFAULT NULL,
  `empty2_cat` varchar(100) DEFAULT NULL,
  `empty3_cat` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_cat` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `categorie_cat`
--

TRUNCATE TABLE `categorie_cat`;
-- --------------------------------------------------------

--
-- Structure de la table `commande_cmd`
--

CREATE TABLE `commande_cmd` (
  `id_cmd` bigint(20) UNSIGNED NOT NULL,
  `idptn_cmd` bigint(20) UNSIGNED NOT NULL,
  `idusr_cmd` bigint(20) UNSIGNED DEFAULT NULL,
  `numero_cmd` varchar(100) DEFAULT NULL,
  `montant_cmd` double(21,2) DEFAULT NULL,
  `montant_payer_cmd` double(21,2) DEFAULT NULL,
  `quantite_cmd` int(11) DEFAULT NULL,
  `telephone_cmd` varchar(255) DEFAULT NULL,
  `date_livraison_cmd` date NOT NULL,
  `empty1_cmd` varchar(100) DEFAULT NULL,
  `empty2_cmd` varchar(100) DEFAULT NULL,
  `empty3_cmd` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_cmd` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `commande_cmd`
--

TRUNCATE TABLE `commande_cmd`;
--
-- Déchargement des données de la table `commande_cmd`
--

INSERT INTO `commande_cmd` (`id_cmd`, `idptn_cmd`, `idusr_cmd`, `numero_cmd`, `montant_cmd`, `montant_payer_cmd`, `quantite_cmd`, `telephone_cmd`, `date_livraison_cmd`, `empty1_cmd`, `empty2_cmd`, `empty3_cmd`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_cmd`) VALUES
(1, 7, NULL, 'REV202211-01', 937500.00, NULL, NULL, NULL, '2022-11-03', NULL, NULL, NULL, NULL, '2022-11-21 21:28:08', '2022-11-21 21:28:08', 2),
(2, 10, NULL, 'REV202211-02', 4700000.00, NULL, NULL, NULL, '2022-10-19', NULL, NULL, NULL, NULL, '2022-11-21 21:29:36', '2022-11-21 21:29:36', 2),
(3, 8, NULL, 'REV202211-03', 1175000.00, 205000.00, NULL, NULL, '2022-11-10', NULL, NULL, NULL, NULL, '2022-11-21 21:31:57', '2022-11-21 21:31:58', 2),
(4, 13, NULL, 'REV202211-04', 3196000.00, NULL, NULL, NULL, '2022-11-20', NULL, NULL, NULL, '2022-11-21 22:00:05', '2022-11-21 21:58:48', '2022-11-21 22:00:05', 2),
(5, 6, NULL, 'REV202211-05', 3480500.00, NULL, NULL, NULL, '2022-11-20', NULL, NULL, NULL, '2022-11-21 22:18:07', '2022-11-21 22:05:58', '2022-11-21 22:18:07', 2),
(6, 14, NULL, 'REV202211-06', 9624000.00, NULL, NULL, NULL, '2022-11-17', NULL, NULL, NULL, NULL, '2022-11-21 22:08:30', '2022-11-21 22:08:30', 2),
(7, 13, NULL, 'REV202211-07', 3480500.00, NULL, NULL, NULL, '2022-11-20', NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(8, 6, NULL, 'REV202211-08', 5297458.00, NULL, NULL, NULL, '2022-11-14', NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(9, 17, NULL, 'REV202211-09', 327500.00, 170000.00, NULL, NULL, '2022-07-29', NULL, NULL, NULL, NULL, '2022-11-21 23:27:09', '2022-11-21 23:27:10', 2);

-- --------------------------------------------------------

--
-- Structure de la table `depense_dep`
--

CREATE TABLE `depense_dep` (
  `id_dep` bigint(20) UNSIGNED NOT NULL,
  `motif_dep` varchar(255) NOT NULL,
  `montant_dep` double(21,2) NOT NULL,
  `date_depense_dep` datetime NOT NULL,
  `description_dep` text,
  `empty1_dep` varchar(100) DEFAULT NULL,
  `empty2_dep` varchar(100) DEFAULT NULL,
  `empty3_dep` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_dep` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `depense_dep`
--

TRUNCATE TABLE `depense_dep`;
-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `failed_jobs`
--

TRUNCATE TABLE `failed_jobs`;
-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `migrations`
--

TRUNCATE TABLE `migrations`;
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
(13, '2022_08_21_105803_create_approvisionnements_table', 1),
(14, '2022_09_16_172224_create_produit_approvisionnements_table', 1),
(15, '2022_09_16_172224_create_produit_commandes_table', 1),
(16, '2022_10_05_182141_create_partenaires_table', 2),
(17, '2022_10_30_145913_create_statut_commandes_table', 2),
(18, '2022_10_30_151128_create_versements_table', 2),
(19, '2022_08_21_105802_create_commandes_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idsmo` bigint(20) UNSIGNED DEFAULT NULL,
  `libelle` varchar(100) NOT NULL,
  `icone` varchar(100) NOT NULL,
  `lien` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `empty1` varchar(100) DEFAULT NULL,
  `empty2` varchar(100) DEFAULT NULL,
  `empty3` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `modules`
--

TRUNCATE TABLE `modules`;
--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `idsmo`, `libelle`, `icone`, `lien`, `class`, `empty1`, `empty2`, `empty3`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(1, NULL, 'Acceuil', 'icon-home4', 'dashboard.home', 'true', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 'Administration', 'icon-stack', 'adminstration', 'dashboard/administration/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 2, 'Modules', 'icon-drawer3', 'module.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 2, 'Profils', 'icon-hammer-wrench', 'profil.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 2, 'Utilisateurs', 'icon-users4', 'user.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, NULL, 'Gestion de stock', 'icon-store', 'gestion-stock', 'dashboard/gestion-stock/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 6, 'Fournisseurs', 'icon-vcard', 'fournisseur.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 6, 'Approvisionnements', 'icon-truck', 'approvisionnement.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, NULL, 'Gestion des ventes', 'icon-cart5', 'gestion-ventes', 'dashboard/gestion-ventes/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 9, 'Ventes', 'icon-wallet', 'vente.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(11, 9, 'Clients', 'icon-users4', 'client.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, NULL, 'Paramétrage', 'icon-cogs', 'parametrage', 'dashboard/parametrage/*', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 12, 'Produits', 'icon-images3', 'produit.index', 'false', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, NULL, 'Dépenses', 'icon-wallet', 'depense.index', 'true', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, NULL, 'Rapports', 'icon-magazine', 'rapport.index', 'true', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametre_par`
--

CREATE TABLE `parametre_par` (
  `id_par` bigint(20) UNSIGNED NOT NULL,
  `idtyp_par` bigint(20) UNSIGNED NOT NULL,
  `code_par` varchar(255) NOT NULL,
  `libelle_par` varchar(255) NOT NULL,
  `empty1_par` varchar(100) DEFAULT NULL,
  `empty2_par` varchar(100) DEFAULT NULL,
  `empty3_par` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_par` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `parametre_par`
--

TRUNCATE TABLE `parametre_par`;
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
-- Structure de la table `partenaire_ptn`
--

CREATE TABLE `partenaire_ptn` (
  `id_ptn` bigint(20) UNSIGNED NOT NULL,
  `idtyp_ptn` bigint(20) UNSIGNED NOT NULL,
  `libelle_ptn` varchar(255) NOT NULL,
  `telephone_ptn` varchar(255) DEFAULT NULL,
  `emplacement_ptn` varchar(255) DEFAULT NULL,
  `empty1_ptn` varchar(100) DEFAULT NULL,
  `empty2_ptn` varchar(100) DEFAULT NULL,
  `empty3_ptn` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_ptn` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `partenaire_ptn`
--

TRUNCATE TABLE `partenaire_ptn`;
--
-- Déchargement des données de la table `partenaire_ptn`
--

INSERT INTO `partenaire_ptn` (`id_ptn`, `idtyp_ptn`, `libelle_ptn`, `telephone_ptn`, `emplacement_ptn`, `empty1_ptn`, `empty2_ptn`, `empty3_ptn`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_ptn`) VALUES
(1, 1, 'REVEIL DUBAI', '+225-01-01-01-01-02', NULL, NULL, NULL, NULL, NULL, '2022-11-12 15:42:05', '2022-11-19 13:06:18', 1),
(2, 2, 'KABORE HERVE', '+225-07-98-41-16-66', NULL, NULL, NULL, NULL, '2022-11-21 21:14:16', '2022-11-12 15:52:01', '2022-11-21 21:14:16', 1),
(3, 1, 'ANCIEN STOCK', '0505359674', NULL, NULL, NULL, NULL, NULL, '2022-11-19 16:43:59', '2022-11-21 21:46:23', 2),
(4, 2, 'Jean Jagueville', '+225-07-58-88-53-37', NULL, NULL, NULL, NULL, '2022-11-21 21:14:04', '2022-11-19 16:48:36', '2022-11-21 21:14:04', 2),
(5, 2, 'Jean Jagueville', '+225-07-58-88-53-37', NULL, NULL, NULL, NULL, '2022-11-19 16:48:59', '2022-11-19 16:48:37', '2022-11-19 16:48:59', 2),
(6, 2, 'MAGASIN ADJAME', '+225-05-75-63-65-16', NULL, NULL, NULL, NULL, NULL, '2022-11-19 16:56:54', '2022-11-19 16:56:54', 2),
(7, 2, 'JEAN JAGUEVILLE', '+225-07-79-03-76-00', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:16:41', '2022-11-21 21:16:41', 2),
(8, 2, 'ZACKARYA YOPOUGON', '+225-07-58-30-93-89', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:17:34', '2022-11-21 21:17:34', 2),
(9, 2, 'ABOU ABOISSO', '+225-07-48-62-19-45', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:18:32', '2022-11-21 21:18:32', 2),
(10, 2, 'PATRON DAO GRAND LAHOU', '+225-07-77-58-05-72', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:20:51', '2022-11-21 21:20:51', 2),
(11, 2, 'ABDOUL AGBOVILLE', '+225-05-06-67-03-02', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:21:35', '2022-11-21 21:21:35', 2),
(12, 2, 'PDG SIDIKI', '+225-05-04-87-29-20', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:22:59', '2022-11-21 21:22:59', 2),
(13, 2, 'SOFIANE REVEIL', '+225-07-98-30-05-28', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:24:49', '2022-11-21 21:24:49', 2),
(14, 2, 'HERVE REVEIL', '+225-07-98-41-16-66', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:25:28', '2022-11-21 21:25:28', 2),
(15, 2, 'SOFIAN ANCIEN POINT', '+225-07-98-30-05-28', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:40:26', '2022-11-21 21:40:26', 2),
(16, 2, 'SOFIAN ET HERVE', '+225-07-98-30-05-28', NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:41:05', '2022-11-21 21:41:05', 2),
(17, 2, 'SANOGO OLYMPIA', '+225-07-07-34-26-52', NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:23:04', '2022-11-21 23:23:04', 2),
(18, 1, 'Mise à jour stock', '+225 0709186115', NULL, '1', NULL, NULL, NULL, '2022-11-28 17:10:16', '2022-11-28 17:10:16', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Structure de la table `produit_approvisionnements_pap`
--

CREATE TABLE `produit_approvisionnements_pap` (
  `id_pap` bigint(20) UNSIGNED NOT NULL,
  `idpro_pap` bigint(20) UNSIGNED NOT NULL,
  `idapv_pap` bigint(20) UNSIGNED NOT NULL,
  `quantite_pap` int(11) NOT NULL,
  `prix_pap` double(21,2) NOT NULL,
  `taille_pap` varchar(255) DEFAULT NULL,
  `couleur_pap` varchar(255) DEFAULT NULL,
  `empty1_pap` varchar(100) DEFAULT NULL,
  `empty2_pap` varchar(100) DEFAULT NULL,
  `empty3_pap` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pap` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `produit_approvisionnements_pap`
--

TRUNCATE TABLE `produit_approvisionnements_pap`;
--
-- Déchargement des données de la table `produit_approvisionnements_pap`
--

INSERT INTO `produit_approvisionnements_pap` (`id_pap`, `idpro_pap`, `idapv_pap`, `quantite_pap`, `prix_pap`, `taille_pap`, `couleur_pap`, `empty1_pap`, `empty2_pap`, `empty3_pap`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_pap`) VALUES
(1, 1, 1, 590, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 16:46:22', '2022-11-19 16:46:22', 2),
(2, 2, 1, 481, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 16:46:22', '2022-11-19 16:46:22', 2),
(3, 1, 2, 542, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(4, 2, 2, 443, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(5, 3, 2, 152, 21000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(6, 7, 2, 1, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(7, 8, 2, 1, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:37:29', '2022-11-21 23:37:29', 2),
(8, 1, 3, 344, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:42:54', '2022-11-21 23:42:54', 2),
(9, 3, 4, 60, 21000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:44:36', '2022-11-21 23:44:36', 2),
(10, 7, 5, 19, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(11, 8, 5, 15, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(12, 9, 5, 12, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(13, 2, 5, -194, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(14, 5, 5, 3, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(15, 6, 5, 43, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(16, 10, 5, 2, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(17, 11, 5, 21, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(18, 12, 5, 9, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(19, 17, 5, 10, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1),
(20, 18, 5, 4, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-28 17:23:19', '2022-11-28 17:23:19', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande_pcm`
--

CREATE TABLE `produit_commande_pcm` (
  `id_pcm` bigint(20) UNSIGNED NOT NULL,
  `idpro_pcm` bigint(20) UNSIGNED NOT NULL,
  `idcmd_pcm` bigint(20) UNSIGNED NOT NULL,
  `quantite_pcm` int(11) NOT NULL,
  `prix_pcm` double(21,2) NOT NULL,
  `taille_pcm` varchar(255) DEFAULT NULL,
  `couleur_pcm` varchar(255) DEFAULT NULL,
  `empty1_pcm` varchar(100) DEFAULT NULL,
  `empty2_pcm` varchar(100) DEFAULT NULL,
  `empty3_pcm` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pcm` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `produit_commande_pcm`
--

TRUNCATE TABLE `produit_commande_pcm`;
--
-- Déchargement des données de la table `produit_commande_pcm`
--

INSERT INTO `produit_commande_pcm` (`id_pcm`, `idpro_pcm`, `idcmd_pcm`, `quantite_pcm`, `prix_pcm`, `taille_pcm`, `couleur_pcm`, `empty1_pcm`, `empty2_pcm`, `empty3_pcm`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_pcm`) VALUES
(1, 2, 1, 30, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:28:08', '2022-11-21 21:28:08', 2),
(2, 6, 1, 15, 15500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:28:08', '2022-11-21 21:28:08', 2),
(3, 1, 2, 200, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:29:36', '2022-11-21 21:29:36', 2),
(4, 2, 3, 50, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:31:57', '2022-11-21 21:31:57', 2),
(5, 1, 4, 136, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:58:48', '2022-11-21 21:58:48', 2),
(6, 1, 5, 136, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(7, 6, 5, 7, 15500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(8, 7, 5, 2, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(9, 8, 5, 2, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(10, 9, 5, 6, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(11, 10, 5, 1, 40000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(12, 1, 6, 364, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:08:30', '2022-11-21 22:08:30', 2),
(13, 3, 6, 50, 21000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:08:30', '2022-11-21 22:08:30', 2),
(14, 7, 6, 1, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:08:30', '2022-11-21 22:08:30', 2),
(15, 1, 7, 98, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(16, 2, 7, 38, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(17, 6, 7, 7, 15500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(18, 9, 7, 6, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(19, 7, 7, 2, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(20, 8, 7, 2, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(21, 10, 7, 1, 40000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:15:08', '2022-11-21 22:15:08', 2),
(22, 2, 8, 169, 23500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(23, 6, 8, 4, 15500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(24, 5, 8, 3, 33000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(25, 3, 8, 5, 19000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(26, 7, 8, 14, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(27, 8, 8, 11, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(28, 11, 8, 21, 11998.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(29, 12, 8, 9, 24500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(30, 17, 8, 3, 28500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(31, 18, 8, 4, 25000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(32, 3, 9, 5, 13500.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:27:09', '2022-11-21 23:27:09', 2),
(33, 17, 9, 7, 20000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:27:10', '2022-11-21 23:27:10', 2),
(34, 6, 9, 10, 12000.00, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:27:10', '2022-11-21 23:27:10', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit_pro`
--

CREATE TABLE `produit_pro` (
  `id_pro` bigint(20) UNSIGNED NOT NULL,
  `idmar_pro` bigint(20) UNSIGNED DEFAULT NULL,
  `idcat_pro` bigint(20) UNSIGNED DEFAULT NULL,
  `slug_pro` varchar(255) DEFAULT NULL,
  `libelle_pro` varchar(255) NOT NULL,
  `photo_pro` varchar(255) DEFAULT NULL,
  `description_pro` longtext,
  `prix_pro` double(21,2) DEFAULT NULL,
  `reduction_pro` double(21,2) DEFAULT NULL,
  `quantite_pro` int(11) DEFAULT NULL,
  `empty1_pro` varchar(100) DEFAULT NULL,
  `empty2_pro` varchar(100) DEFAULT NULL,
  `empty3_pro` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_pro` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `produit_pro`
--

TRUNCATE TABLE `produit_pro`;
--
-- Déchargement des données de la table `produit_pro`
--

INSERT INTO `produit_pro` (`id_pro`, `idmar_pro`, `idcat_pro`, `slug_pro`, `libelle_pro`, `photo_pro`, `description_pro`, `prix_pro`, `reduction_pro`, `quantite_pro`, `empty1_pro`, `empty2_pro`, `empty3_pro`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_pro`) VALUES
(1, NULL, NULL, 'carton-1-litre', 'Reveil - carton de 1L - rouge', NULL, 'Le carton de marque réveil contenant des bouteilles de 1L de couleur rouge', NULL, NULL, 542, NULL, NULL, NULL, NULL, '2022-10-30 20:23:07', '2022-11-21 23:42:54', 1),
(2, NULL, NULL, 'carton-1-5-litre', 'Reveil - carton de 1L - jaune', NULL, 'Le carton de marque réveil contenant des bouteilles de 1L de couleur jaune', NULL, NULL, 443, NULL, NULL, NULL, NULL, '2022-10-30 20:23:07', '2022-11-28 17:23:19', 1),
(3, NULL, NULL, 'Bouteille--20L', 'Bidons de 20L', NULL, 'Bidon de contenance 20L', NULL, NULL, 152, NULL, NULL, NULL, NULL, '2022-10-30 20:23:07', '2022-11-21 23:44:36', 2),
(4, NULL, NULL, NULL, 'Reveil - carton de 1,5L - rouge', NULL, 'Le carton de marque réveil contenant des bouteilles de 1,5L de couleur rouge', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-14 17:34:05', '2022-11-14 17:34:05', 1),
(5, NULL, NULL, NULL, 'Reveil - carton de 1,5L - jaune', NULL, 'Le carton de marque réveil contenant des bouteilles de 1,5L de couleur jaune', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-14 17:35:11', '2022-11-28 17:23:19', 1),
(6, NULL, NULL, NULL, 'SS - carton 1L - bleu', NULL, 'Le carton de marque SS contenant des bouteilles de 1L de couleur bleu', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-14 17:36:22', '2022-11-28 17:23:19', 1),
(7, NULL, NULL, NULL, 'Graisse 1Kg', NULL, 'Carton de graisse', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2022-11-21 21:50:05', '2022-11-28 17:23:19', 2),
(8, NULL, NULL, NULL, 'Graisse 500G', NULL, 'Carton de graisse 500', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2022-11-21 21:50:53', '2022-11-28 17:23:19', 2),
(9, NULL, NULL, NULL, 'Huile de frein Tropicale', NULL, 'Carton Huile de frein Tropicale', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 21:52:21', '2022-11-28 17:23:19', 2),
(10, NULL, NULL, NULL, 'Carton Super Force', NULL, 'Super Force', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 21:54:33', '2022-11-28 17:23:19', 2),
(11, NULL, NULL, NULL, 'Carton de Dot 3', NULL, 'carton de dot 3', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 22:59:53', '2022-11-28 17:23:19', 2),
(12, NULL, NULL, NULL, 'Carton 1L Olympia', NULL, 'huile vidange 1L', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:01:37', '2022-11-28 17:23:19', 2),
(13, NULL, NULL, NULL, 'Carton Olympia 5L', NULL, 'Olympia 5L', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:02:29', '2022-11-21 23:02:29', 2),
(14, NULL, NULL, NULL, 'Huile de Pont 1L Olympia', NULL, 'carton huile de pont', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:03:48', '2022-11-21 23:03:48', 2),
(15, NULL, NULL, NULL, 'Carton huile de Direction 1L Olympia', NULL, 'huile de direction Olympia', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:04:48', '2022-11-21 23:04:48', 2),
(16, NULL, NULL, NULL, 'Carton Huile de Frein 1L Olympia', NULL, 'Huile de Frein Olympia', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:05:36', '2022-11-21 23:05:36', 2),
(17, NULL, NULL, NULL, 'Carton Huile Recyclée 5L', NULL, 'Huile Recyclée 5L', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:07:04', '2022-11-28 17:23:19', 2),
(18, NULL, NULL, NULL, 'Carton  Huile Recyclée 4L', NULL, 'Huile Recyclée 4L', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2022-11-21 23:07:47', '2022-11-28 17:23:19', 2);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `empty1` varchar(100) DEFAULT NULL,
  `empty2` varchar(100) DEFAULT NULL,
  `empty3` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `profils`
--

TRUNCATE TABLE `profils`;
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `profil_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `empty1` varchar(100) DEFAULT NULL,
  `empty2` varchar(100) DEFAULT NULL,
  `empty3` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `profil_modules`
--

TRUNCATE TABLE `profil_modules`;
--
-- Déchargement des données de la table `profil_modules`
--

INSERT INTO `profil_modules` (`id`, `profil_id`, `module_id`, `empty1`, `empty2`, `empty3`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 1, 6, NULL, NULL, NULL, NULL, '2022-10-30 18:00:21', '2022-10-30 18:00:21', 1),
(7, 1, 7, NULL, NULL, NULL, NULL, '2022-10-30 18:00:21', '2022-10-30 18:00:21', 1),
(8, 1, 8, NULL, NULL, NULL, NULL, '2022-10-30 20:12:17', '2022-10-30 20:12:17', 1),
(9, 1, 9, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(10, 1, 10, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(11, 1, 11, NULL, NULL, NULL, NULL, '2022-10-31 19:38:45', '2022-10-31 19:38:45', 1),
(12, 2, 1, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(13, 2, 9, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(14, 2, 10, NULL, NULL, NULL, NULL, '2022-11-12 16:02:07', '2022-11-12 16:02:07', 1),
(15, 1, 12, NULL, NULL, NULL, NULL, '2022-11-16 11:33:57', '2022-11-16 11:33:57', 1),
(16, 1, 13, NULL, NULL, NULL, NULL, '2022-11-16 11:33:57', '2022-11-16 11:33:57', 1),
(17, 2, 6, NULL, NULL, NULL, NULL, '2022-11-16 15:06:34', '2022-11-16 15:06:34', 1),
(18, 2, 7, NULL, NULL, NULL, NULL, '2022-11-16 15:06:34', '2022-11-16 15:06:34', 1),
(19, 2, 8, NULL, NULL, NULL, NULL, '2022-11-16 15:06:34', '2022-11-16 15:06:34', 1),
(20, 2, 11, NULL, NULL, NULL, NULL, '2022-11-16 15:06:35', '2022-11-16 15:06:35', 1),
(21, 2, 12, NULL, NULL, NULL, NULL, '2022-11-16 15:06:35', '2022-11-16 15:06:35', 1),
(22, 2, 13, NULL, NULL, NULL, NULL, '2022-11-16 15:06:35', '2022-11-16 15:06:35', 1),
(23, 1, 14, NULL, NULL, NULL, NULL, '2022-11-26 10:47:33', '2022-11-26 10:47:33', 1),
(24, 1, 15, NULL, NULL, NULL, '2022-11-27 12:31:04', '2022-11-26 10:47:33', '2022-11-27 12:31:04', 1),
(25, 2, 14, NULL, NULL, NULL, NULL, '2022-11-26 10:50:27', '2022-11-26 10:50:27', 1),
(26, 2, 15, NULL, NULL, NULL, NULL, '2022-11-26 10:50:27', '2022-11-26 10:50:27', 1),
(27, 1, 15, NULL, NULL, NULL, NULL, '2022-11-27 14:03:23', '2022-11-27 14:03:23', 1);

-- --------------------------------------------------------

--
-- Structure de la table `rapport_rap`
--

CREATE TABLE `rapport_rap` (
  `id_rap` bigint(20) UNSIGNED NOT NULL,
  `objet_rap` varchar(100) NOT NULL,
  `date_reunion_rap` datetime NOT NULL,
  `description_rap` text NOT NULL,
  `empty1_rap` varchar(100) DEFAULT NULL,
  `empty2_rap` varchar(100) DEFAULT NULL,
  `empty3_rap` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_rap` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `rapport_rap`
--

TRUNCATE TABLE `rapport_rap`;
-- --------------------------------------------------------

--
-- Structure de la table `statut_commande_stc`
--

CREATE TABLE `statut_commande_stc` (
  `id_stc` bigint(20) UNSIGNED NOT NULL,
  `idsta_stc` bigint(20) UNSIGNED NOT NULL,
  `idcmd_stc` bigint(20) UNSIGNED NOT NULL,
  `observation_stc` varchar(100) DEFAULT NULL,
  `empty1_stc` varchar(100) DEFAULT NULL,
  `empty2_stc` varchar(100) DEFAULT NULL,
  `empty3_stc` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_stc` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `statut_commande_stc`
--

TRUNCATE TABLE `statut_commande_stc`;
--
-- Déchargement des données de la table `statut_commande_stc`
--

INSERT INTO `statut_commande_stc` (`id_stc`, `idsta_stc`, `idcmd_stc`, `observation_stc`, `empty1_stc`, `empty2_stc`, `empty3_stc`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_stc`) VALUES
(1, 3, 1, NULL, NULL, NULL, NULL, '2022-11-21 22:16:21', '2022-11-21 21:28:08', '2022-11-21 22:16:21', 2),
(2, 3, 2, NULL, NULL, NULL, NULL, '2022-11-21 22:16:39', '2022-11-21 21:29:36', '2022-11-21 22:16:39', 2),
(3, 3, 3, NULL, NULL, NULL, NULL, '2022-11-21 21:32:34', '2022-11-21 21:31:58', '2022-11-21 21:32:34', 2),
(4, 4, 3, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:32:34', '2022-11-21 21:32:34', 2),
(5, 3, 4, NULL, NULL, NULL, NULL, NULL, '2022-11-21 21:58:48', '2022-11-21 21:58:48', 2),
(6, 3, 5, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:05:58', '2022-11-21 22:05:58', 2),
(7, 3, 6, NULL, NULL, NULL, NULL, '2022-11-21 22:09:06', '2022-11-21 22:08:30', '2022-11-21 22:09:06', 2),
(8, 4, 6, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:09:06', '2022-11-21 22:09:06', 2),
(9, 3, 7, NULL, NULL, NULL, NULL, '2022-11-21 22:16:03', '2022-11-21 22:15:08', '2022-11-21 22:16:03', 2),
(10, 4, 7, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:16:03', '2022-11-21 22:16:03', 2),
(11, 4, 1, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:16:21', '2022-11-21 22:16:21', 2),
(12, 4, 2, NULL, NULL, NULL, NULL, NULL, '2022-11-21 22:16:39', '2022-11-21 22:16:39', 2),
(13, 3, 8, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:18:37', '2022-11-21 23:18:37', 2),
(14, 3, 9, NULL, NULL, NULL, NULL, '2022-11-21 23:27:26', '2022-11-21 23:27:10', '2022-11-21 23:27:26', 2),
(15, 4, 9, NULL, NULL, NULL, NULL, NULL, '2022-11-21 23:27:26', '2022-11-21 23:27:26', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_parametre_typ`
--

CREATE TABLE `type_parametre_typ` (
  `id_typ` bigint(20) UNSIGNED NOT NULL,
  `code_typ` varchar(255) NOT NULL,
  `libelle_typ` varchar(255) NOT NULL,
  `empty1_typ` varchar(100) DEFAULT NULL,
  `empty2_typ` varchar(100) DEFAULT NULL,
  `empty3_typ` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_typ` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `type_parametre_typ`
--

TRUNCATE TABLE `type_parametre_typ`;
--
-- Déchargement des données de la table `type_parametre_typ`
--

INSERT INTO `type_parametre_typ` (`id_typ`, `code_typ`, `libelle_typ`, `empty1_typ`, `empty2_typ`, `empty3_typ`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_typ`) VALUES
(1, 'typ', 'Type de partenaire', NULL, NULL, NULL, NULL, '2022-10-30 17:11:37', '2022-10-30 17:11:38', 1),
(2, 'tys', 'type de statut', NULL, NULL, NULL, NULL, '2022-10-30 17:11:37', '2022-10-30 17:11:38', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profil_id` bigint(20) UNSIGNED NOT NULL,
  `structure_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `first_connected_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text,
  `two_factor_recovery_codes` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `profil_id`, `structure_id`, `nom`, `prenom`, `email`, `first_connected_at`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation`) VALUES
(1, 1, NULL, 'admin', 'admin', 'admin@admin.com', '2022-10-30 16:59:28', '2022-10-30 16:56:19', '$2y$10$5AkvIXPNRVwj1lfeWw9k1e2ph7JCBfm9g7GxG5TPPa/mFrmIWk43O', NULL, NULL, 'yHvCZMUM4zCii18mNTblE66cWRBSD9xJHRnT3xw2o4NStwt6SpwFBmzW6CdR', NULL, '2022-10-30 16:56:19', '2022-10-30 16:59:28', 1),
(2, 2, NULL, 'Bantango', 'Hamadou', 'hamadou.bantango@reveiloil.ci', '2022-11-19 17:05:35', NULL, '$2y$10$D9NyFOlBSB5qcuKV477HJubpzpn9/HcOFYIw3jTdLPx2E6i258BLW', NULL, NULL, NULL, NULL, '2022-11-12 16:03:28', '2022-11-19 17:05:35', 1),
(3, 2, NULL, 'Sawadogo', 'Sidiki', 'sidiki.sawadogo@reveiloil.ci', NULL, NULL, '$2y$10$68iCv8.RLb8jzbhgvGXMMekv0tMlXeT6y5BLHP0C2gA6f2dWxDali', NULL, NULL, NULL, NULL, '2022-11-16 19:40:17', '2022-11-16 19:47:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `versement_ver`
--

CREATE TABLE `versement_ver` (
  `id_ver` bigint(20) UNSIGNED NOT NULL,
  `idcmd_ver` bigint(20) UNSIGNED NOT NULL,
  `montant_ver` double(21,2) NOT NULL,
  `empty1_ver` varchar(100) DEFAULT NULL,
  `empty2_ver` varchar(100) DEFAULT NULL,
  `empty3_ver` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusrcreation_ver` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tronquer la table avant d'insérer `versement_ver`
--

TRUNCATE TABLE `versement_ver`;
--
-- Déchargement des données de la table `versement_ver`
--

INSERT INTO `versement_ver` (`id_ver`, `idcmd_ver`, `montant_ver`, `empty1_ver`, `empty2_ver`, `empty3_ver`, `deleted_at`, `created_at`, `updated_at`, `idusrcreation_ver`) VALUES
(1, 3, 205000.00, NULL, NULL, NULL, NULL, '2022-11-21 21:31:57', '2022-11-21 21:31:57', 2),
(2, 9, 170000.00, NULL, NULL, NULL, NULL, '2022-11-21 23:27:10', '2022-11-21 23:27:10', 2);

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
-- Index pour la table `categorie_cat`
--
ALTER TABLE `categorie_cat`
  ADD PRIMARY KEY (`id_cat`),
  ADD KEY `categorie_cat_idcat_cat_index` (`idcat_cat`),
  ADD KEY `categorie_cat_idusrcreation_cat_index` (`idusrcreation_cat`);

--
-- Index pour la table `commande_cmd`
--
ALTER TABLE `commande_cmd`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `commande_cmd_idptn_cmd_index` (`idptn_cmd`),
  ADD KEY `commande_cmd_idusr_cmd_index` (`idusr_cmd`),
  ADD KEY `commande_cmd_idusrcreation_cmd_index` (`idusrcreation_cmd`),
  ADD KEY `commande_cmd_numero_cmd` (`numero_cmd`);

--
-- Index pour la table `depense_dep`
--
ALTER TABLE `depense_dep`
  ADD PRIMARY KEY (`id_dep`),
  ADD KEY `depense_dep_idusrcreation_dep_index` (`idusrcreation_dep`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Index pour la table `parametre_par`
--
ALTER TABLE `parametre_par`
  ADD PRIMARY KEY (`id_par`),
  ADD KEY `parametre_par_idtyp_par_index` (`idtyp_par`),
  ADD KEY `parametre_par_code_par_index` (`code_par`),
  ADD KEY `parametre_par_idusrcreation_par_index` (`idusrcreation_par`);

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
-- Index pour la table `rapport_rap`
--
ALTER TABLE `rapport_rap`
  ADD PRIMARY KEY (`id_rap`),
  ADD KEY `rapport_rap_idusrcreation_rap_index` (`idusrcreation_rap`);

--
-- Index pour la table `statut_commande_stc`
--
ALTER TABLE `statut_commande_stc`
  ADD PRIMARY KEY (`id_stc`),
  ADD KEY `statut_commande_stc_idsta_stc_index` (`idsta_stc`),
  ADD KEY `statut_commande_stc_idcmd_stc_index` (`idcmd_stc`),
  ADD KEY `statut_commande_stc_idusrcreation_stc_index` (`idusrcreation_stc`);

--
-- Index pour la table `type_parametre_typ`
--
ALTER TABLE `type_parametre_typ`
  ADD PRIMARY KEY (`id_typ`),
  ADD KEY `type_parametre_typ_code_typ_index` (`code_typ`),
  ADD KEY `type_parametre_typ_idusrcreation_typ_index` (`idusrcreation_typ`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_profil_id_index` (`profil_id`),
  ADD KEY `users_structure_id_index` (`structure_id`),
  ADD KEY `users_idusrcreation_index` (`idusrcreation`);

--
-- Index pour la table `versement_ver`
--
ALTER TABLE `versement_ver`
  ADD PRIMARY KEY (`id_ver`),
  ADD KEY `versement_ver_idcmd_ver_index` (`idcmd_ver`),
  ADD KEY `versement_ver_idusrcreation_ver_index` (`idusrcreation_ver`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `approvisionnement_apv`
--
ALTER TABLE `approvisionnement_apv`
  MODIFY `id_apv` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorie_cat`
--
ALTER TABLE `categorie_cat`
  MODIFY `id_cat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande_cmd`
--
ALTER TABLE `commande_cmd`
  MODIFY `id_cmd` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `depense_dep`
--
ALTER TABLE `depense_dep`
  MODIFY `id_dep` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `parametre_par`
--
ALTER TABLE `parametre_par`
  MODIFY `id_par` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `partenaire_ptn`
--
ALTER TABLE `partenaire_ptn`
  MODIFY `id_ptn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `produit_approvisionnements_pap`
--
ALTER TABLE `produit_approvisionnements_pap`
  MODIFY `id_pap` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `produit_commande_pcm`
--
ALTER TABLE `produit_commande_pcm`
  MODIFY `id_pcm` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `produit_pro`
--
ALTER TABLE `produit_pro`
  MODIFY `id_pro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `profil_modules`
--
ALTER TABLE `profil_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `rapport_rap`
--
ALTER TABLE `rapport_rap`
  MODIFY `id_rap` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `statut_commande_stc`
--
ALTER TABLE `statut_commande_stc`
  MODIFY `id_stc` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `type_parametre_typ`
--
ALTER TABLE `type_parametre_typ`
  MODIFY `id_typ` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `versement_ver`
--
ALTER TABLE `versement_ver`
  MODIFY `id_ver` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
