-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 20 oct. 2024 à 13:23
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mise`
--

-- --------------------------------------------------------

--
-- Structure de la table `avances`
--

CREATE TABLE `avances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `montant_avance` int(11) DEFAULT NULL,
  `date_avance` date NOT NULL,
  `mode_payement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avances`
--

INSERT INTO `avances` (`id`, `fournisseur_id`, `montant_avance`, `date_avance`, `mode_payement`, `created_at`, `updated_at`) VALUES
(5, 2, 2000, '2023-02-02', 'mvola', NULL, NULL),
(6, 1, 20000, '2023-02-03', 'espèce', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `nom_sous_fournisseur` varchar(50) DEFAULT NULL,
  `quantite_commande` int(11) NOT NULL,
  `quantite_livre` int(11) NOT NULL DEFAULT 0,
  `montant_avance` int(11) DEFAULT NULL,
  `etat` varchar(10) NOT NULL,
  `date_commande` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `fournisseur_id`, `nom_sous_fournisseur`, `quantite_commande`, `quantite_livre`, `montant_avance`, `etat`, `date_commande`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 500, 60, 200000, 'encours', '2024-05-05', '2024-10-18 18:45:59', '2024-10-19 04:49:35'),
(2, 1, NULL, 205, 40, 200000, 'encours', '2024-05-05', '2024-10-18 18:46:13', '2024-10-20 05:53:11'),
(3, 1, NULL, 205, 120, 0, 'encours', '2024-05-06', '2024-10-19 03:10:16', '2024-10-20 03:15:12'),
(4, 1, NULL, 205, 0, 70000, 'envoyé', '2024-05-06', '2024-10-19 03:11:06', '2024-10-19 03:11:06'),
(5, 2, NULL, 205, 150, 4000, 'encours', '2024-05-06', '2024-10-19 04:51:32', '2024-10-19 17:21:38'),
(6, 2, NULL, 205, 0, 70000, 'envoyé', '2024-05-06', '2024-10-19 04:54:43', '2024-10-19 04:54:43'),
(7, 2, NULL, 205, 0, 70000, 'envoyé', '2024-05-06', '2024-10-19 04:55:50', '2024-10-19 04:55:50'),
(8, 2, 'floruios', 205, 200, 70000, 'encours', '2024-05-06', '2024-10-19 04:59:09', '2024-10-19 15:56:53'),
(9, 2, NULL, 205, 205, 70000, 'livré', '2024-05-06', '2024-10-19 04:59:35', '2024-10-19 15:29:54'),
(10, 2, NULL, 205, 0, 70000, 'envoyé', '2024-05-06', '2024-10-19 05:22:04', '2024-10-19 05:22:04'),
(11, 2, NULL, 400, 0, 200500, 'envoyé', '2024-05-06', '2024-10-19 05:23:54', '2024-10-19 05:23:54'),
(12, 1, NULL, 400, 400, NULL, 'livré', '2024-05-06', '2024-10-19 15:05:38', '2024-10-19 15:21:55'),
(13, 1, NULL, 500, 500, NULL, 'livré', '2024-05-06', '2024-10-19 15:05:48', '2024-10-19 15:10:20'),
(14, 3, NULL, 200, 0, 0, 'envoyé', '2024-10-20', '2024-10-20 04:39:31', '2024-10-20 04:39:31');

-- --------------------------------------------------------

--
-- Structure de la table `dechets`
--

CREATE TABLE `dechets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `pourcentage_dechet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dechets`
--

INSERT INTO `dechets` (`id`, `fournisseur_id`, `livraison_id`, `pourcentage_dechet`, `created_at`, `updated_at`) VALUES
(1, 2, 35, 500, '2024-10-19 15:56:40', '2024-10-19 15:56:40'),
(2, 2, 36, 500, '2024-10-19 15:56:53', '2024-10-19 15:56:53'),
(3, 2, 39, 300, '2024-10-19 17:18:24', '2024-10-19 17:18:24'),
(4, 2, 40, 800, '2024-10-19 17:21:38', '2024-10-19 17:21:38'),
(5, 1, 41, 800, '2024-10-19 17:35:37', '2024-10-19 17:35:37'),
(6, 1, 42, 800, '2024-10-20 03:15:12', '2024-10-20 03:15:12'),
(7, 1, 3, 1, '2024-10-20 07:17:43', '2024-10-20 07:17:43'),
(8, 1, 8, 1, '2024-10-20 07:19:00', '2024-10-20 07:19:00'),
(9, 1, 9, 200, '2024-10-20 07:21:26', '2024-10-20 07:21:26');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fournisseur` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom_fournisseur`, `adresse`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'nicole', 'paeis', '0321354685', '2024-10-18 18:45:38', '2024-10-18 18:45:38'),
(2, 'mario', 'francois', '0321354685', '2024-10-18 18:45:50', '2024-10-18 18:45:50'),
(3, 'pascal', 'paris premier', '0215412512', '2024-10-20 04:37:31', '2024-10-20 04:37:31'),
(4, 'mufasa', 'texas', '24525', '2024-10-20 05:01:16', '2024-10-20 05:01:16');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `nombre_caissette` int(11) NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `etat` varchar(10) DEFAULT 'non payé',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `commande_id`, `quantite`, `nombre_caissette`, `date_livraison`, `etat`, `created_at`, `updated_at`) VALUES
(1, 1, 20, 180, NULL, 'non payé', '2024-10-18 18:47:02', '2024-10-18 18:47:02'),
(2, 1, 20, 180, '2023-02-02', 'payé', '2024-10-18 18:58:38', '2024-10-20 07:16:16'),
(3, 1, 20, 180, '2023-02-02', 'payé', '2024-10-19 04:49:35', '2024-10-20 07:17:43'),
(4, 2, 20, 180, '2023-02-02', 'non payé', '2024-10-19 06:13:51', '2024-10-19 06:13:51'),
(5, 13, 300, 180, '2023-02-02', 'non payé', '2024-10-19 15:06:25', '2024-10-19 15:06:25'),
(6, 13, 500, 180, '2023-02-02', 'non payé', '2024-10-19 15:07:19', '2024-10-19 15:07:19'),
(7, 13, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:07:36', '2024-10-19 15:07:36'),
(8, 13, 200, 180, '2023-02-02', 'payé', '2024-10-19 15:08:48', '2024-10-20 07:19:00'),
(9, 13, 300, 180, '2023-02-02', 'payé', '2024-10-19 15:09:15', '2024-10-20 07:21:26'),
(10, 13, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:09:23', '2024-10-19 15:09:23'),
(11, 13, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:10:20', '2024-10-19 15:10:20'),
(12, 12, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:21:44', '2024-10-19 15:21:44'),
(13, 12, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:21:51', '2024-10-19 15:21:51'),
(14, 12, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:21:55', '2024-10-19 15:21:55'),
(15, 12, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:21:56', '2024-10-19 15:21:56'),
(16, 12, 10, 180, '2023-02-02', 'non payé', '2024-10-19 15:22:04', '2024-10-19 15:22:04'),
(17, 11, 10, 180, '2023-02-02', 'non payé', '2024-10-19 15:24:32', '2024-10-19 15:24:32'),
(18, 11, 40, 180, '2023-02-02', 'non payé', '2024-10-19 15:24:40', '2024-10-19 15:24:40'),
(19, 11, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:24:49', '2024-10-19 15:24:49'),
(20, 11, 50, 180, '2023-02-02', 'non payé', '2024-10-19 15:24:55', '2024-10-19 15:24:55'),
(21, 11, 50, 180, '2023-02-02', 'non payé', '2024-10-19 15:25:00', '2024-10-19 15:25:00'),
(22, 11, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:25:07', '2024-10-19 15:25:07'),
(23, 11, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:25:13', '2024-10-19 15:25:13'),
(24, 11, 400, 180, '2023-02-02', 'non payé', '2024-10-19 15:26:11', '2024-10-19 15:26:11'),
(25, 10, 400, 180, '2023-02-02', 'non payé', '2024-10-19 15:27:22', '2024-10-19 15:27:22'),
(26, 10, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:27:28', '2024-10-19 15:27:28'),
(27, 10, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:27:38', '2024-10-19 15:27:38'),
(28, 9, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:29:28', '2024-10-19 15:29:28'),
(29, 9, 200, 180, '2023-02-02', 'non payé', '2024-10-19 15:29:41', '2024-10-19 15:29:41'),
(30, 9, 1, 180, '2023-02-02', 'non payé', '2024-10-19 15:29:50', '2024-10-19 15:29:50'),
(31, 9, 4, 180, '2023-02-02', 'non payé', '2024-10-19 15:29:54', '2024-10-19 15:29:54'),
(32, 9, 4, 180, '2023-02-02', 'non payé', '2024-10-19 15:30:21', '2024-10-19 15:30:21'),
(33, 8, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:54:23', '2024-10-19 15:54:23'),
(34, 8, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:56:13', '2024-10-19 15:56:13'),
(35, 8, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:56:40', '2024-10-19 15:56:40'),
(36, 8, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:56:53', '2024-10-19 15:56:53'),
(37, 8, 100, 180, '2023-02-02', 'non payé', '2024-10-19 15:57:05', '2024-10-19 15:57:05'),
(38, 8, 5, 180, '2023-02-02', 'non payé', '2024-10-19 15:57:14', '2024-10-19 15:57:14'),
(39, 5, 50, 180, '2023-02-02', 'non payé', '2024-10-19 17:18:24', '2024-10-19 17:18:24'),
(40, 5, 100, 500, '2023-02-02', 'non payé', '2024-10-19 17:21:38', '2024-10-19 17:21:38'),
(41, 3, 100, 500, '2023-02-02', 'non payé', '2024-10-19 17:35:37', '2024-10-19 17:35:37'),
(42, 3, 20, 500, '2023-02-02', 'non payé', '2024-10-20 03:15:12', '2024-10-20 03:15:12'),
(43, 3, 0, 0, '2024-10-20', 'non payé', '2024-10-20 04:55:09', '2024-10-20 04:55:09'),
(44, 3, 50, 0, '2024-10-20', 'non payé', '2024-10-20 04:55:18', '2024-10-20 04:55:18'),
(45, 2, 20, 500, '2023-02-02', 'non payé', '2024-10-20 05:53:11', '2024-10-20 05:53:11');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_18_201702_create_fourniseurs_table', 1),
(5, '2024_10_18_201736_create_commandes_table', 1),
(6, '2024_10_18_201822_create_sous_fournisseurs_table', 1),
(7, '2024_10_18_201838_create_livraisons_table', 1),
(8, '2024_10_18_201920_create_payements_table', 1),
(9, '2024_10_18_201937_create_palettes_table', 1),
(10, '2024_10_18_201950_create_palette_fournisseurs_table', 1),
(11, '2024_10_18_202001_create_avances_table', 1),
(12, '2024_10_18_202040_create_today_prices_table', 1),
(13, '2024_10_18_202105_create_produits_table', 1),
(14, '2024_10_18_202124_create_dechets_table', 1),
(15, '2024_10_18_203338_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `palettes`
--

CREATE TABLE `palettes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(5) NOT NULL,
  `nombre_carton` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `palette_fournisseurs`
--

CREATE TABLE `palette_fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `palette_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `nombre_carton` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE `payements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `montant_paye` int(11) NOT NULL,
  `montant_deduise` int(10) DEFAULT NULL,
  `prix_jour` int(6) NOT NULL,
  `mode_payement` varchar(255) NOT NULL,
  `date_payement` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payements`
--

INSERT INTO `payements` (`id`, `livraison_id`, `fournisseur_id`, `montant_paye`, `montant_deduise`, `prix_jour`, `mode_payement`, `date_payement`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 600000, 8000, 400, 'mvola', '2023-02-02', '2024-10-20 07:16:16', '2024-10-20 07:16:16'),
(6, 3, 1, 600000, 8000, 400, 'mvola', '2023-02-02', '2024-10-20 07:17:43', '2024-10-20 07:17:43'),
(7, 8, 1, 600000, 8000, 400, 'mvola', '2023-02-02', '2024-10-20 07:18:59', '2024-10-20 07:18:59'),
(8, 9, 1, 180000, 8000, 1500, 'western', '2023-02-02', '2024-10-20 07:21:26', '2024-10-20 07:21:26');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_fournisseurs`
--

CREATE TABLE `sous_fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `today_prices`
--

CREATE TABLE `today_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prix` int(11) NOT NULL,
  `date_today` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `today_prices`
--

INSERT INTO `today_prices` (`id`, `prix`, `date_today`, `created_at`, `updated_at`) VALUES
(1, 200, '2024-03-03', '2024-10-19 04:23:20', '2024-10-19 04:23:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avances`
--
ALTER TABLE `avances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avances_fournisseur_id_foreign` (`fournisseur_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_fournisseur_id_foreign` (`fournisseur_id`);

--
-- Index pour la table `dechets`
--
ALTER TABLE `dechets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dechets_fournisseur_id_foreign` (`fournisseur_id`),
  ADD KEY `dechets_livraison_id_foreign` (`livraison_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livraisons_commande_id_foreign` (`commande_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `palettes`
--
ALTER TABLE `palettes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `palette_fournisseurs`
--
ALTER TABLE `palette_fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `palette_fournisseurs_fournisseur_id_foreign` (`fournisseur_id`),
  ADD KEY `palette_fournisseurs_palette_id_foreign` (`palette_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payements_livraison_id_foreign` (`livraison_id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sous_fournisseurs`
--
ALTER TABLE `sous_fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `today_prices`
--
ALTER TABLE `today_prices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avances`
--
ALTER TABLE `avances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `dechets`
--
ALTER TABLE `dechets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `palettes`
--
ALTER TABLE `palettes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `palette_fournisseurs`
--
ALTER TABLE `palette_fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_fournisseurs`
--
ALTER TABLE `sous_fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `today_prices`
--
ALTER TABLE `today_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avances`
--
ALTER TABLE `avances`
  ADD CONSTRAINT `avances_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `dechets`
--
ALTER TABLE `dechets`
  ADD CONSTRAINT `dechets_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `dechets_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `livraisons` (`id`);

--
-- Contraintes pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD CONSTRAINT `livraisons_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`);

--
-- Contraintes pour la table `palette_fournisseurs`
--
ALTER TABLE `palette_fournisseurs`
  ADD CONSTRAINT `palette_fournisseurs_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `palette_fournisseurs_palette_id_foreign` FOREIGN KEY (`palette_id`) REFERENCES `palettes` (`id`);

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `payements_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `livraisons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
