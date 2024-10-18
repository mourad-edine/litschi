-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 oct. 2024 à 12:15
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
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `avances`
--

CREATE TABLE `avances` (
  `id` int(10) NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `montant_avance` int(10) NOT NULL,
  `date_avance` date DEFAULT NULL,
  `mode_payement` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avances`
--

INSERT INTO `avances` (`id`, `fournisseur_id`, `montant_avance`, `date_avance`, `mode_payement`, `created_at`, `updated_at`) VALUES
(1, 2, 40000, '2023-02-03', 'westernits', '2024-10-18 05:10:58', '2024-10-18 05:10:58'),
(4, 3, 40000, '2023-02-03', 'westernits', '2024-10-18 05:16:16', '2024-10-18 05:16:16'),
(7, 1, 40000, '2023-02-03', 'westernits', '2024-10-18 05:19:12', '2024-10-18 05:19:12');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evenement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `quantite_commande` int(11) NOT NULL,
  `quantite_livre` int(3) DEFAULT NULL,
  `etat` varchar(8) NOT NULL,
  `date_commande` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `evenement_id`, `fournisseur_id`, `quantite_commande`, `quantite_livre`, `etat`, `date_commande`, `created_at`, `updated_at`) VALUES
(4, NULL, 2, 40, 80, 'annulé', '2024-10-16', '2024-10-16 12:03:43', '2024-10-17 10:23:17'),
(5, NULL, 2, 40, NULL, 'envoyé', '2023-04-12', '2024-10-16 12:20:32', '2024-10-16 12:20:32'),
(6, NULL, 3, 90, NULL, 'envoyé', '2023-04-12', '2024-10-16 12:21:44', '2024-10-16 12:21:44'),
(7, NULL, 3, 120, 110, 'livré', '2023-04-12', '2024-10-16 12:22:39', '2024-10-16 12:42:18'),
(8, NULL, 3, 40, 20, 'encours', '2023-04-12', '2024-10-16 13:12:22', '2024-10-17 10:33:20'),
(9, NULL, 3, 60, NULL, 'annulé', '2023-04-12', '2024-10-16 13:14:15', '2024-10-17 10:24:04'),
(10, NULL, 2, 30, NULL, 'envoyé', '2023-04-15', '2024-10-16 15:22:39', '2024-10-16 15:22:39');

-- --------------------------------------------------------

--
-- Structure de la table `dechets`
--

CREATE TABLE `dechets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_dechet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_evenement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_fournisseur` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `nom_fournisseur`, `adresse`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'jean', 'madagascar', '', '2024-10-15 02:48:07', '2024-10-15 02:48:07'),
(2, 'jerobne', 'paris', '0321354685', '2024-10-16 12:01:00', '2024-10-16 12:01:00'),
(3, 'SEb', 'maric', '0321354685', '2024-10-16 12:21:30', '2024-10-16 12:21:30');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `sous_fournisseur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `nombre_caissette` int(7) NOT NULL,
  `etat` varchar(8) NOT NULL DEFAULT 'non payé',
  `date_livraison` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `fournisseur_id`, `commande_id`, `sous_fournisseur_id`, `quantite`, `nombre_caissette`, `etat`, `date_livraison`, `created_at`, `updated_at`) VALUES
(6, 2, 4, NULL, 20, 0, 'non payé', NULL, '2024-10-16 12:04:42', '2024-10-16 12:04:42'),
(7, 2, 4, NULL, 20, 0, 'non payé', NULL, '2024-10-16 12:05:17', '2024-10-16 12:05:17'),
(9, 2, 4, NULL, 10, 0, 'payé', NULL, '2024-10-16 12:07:34', '2024-10-17 09:46:57'),
(10, 2, 4, NULL, 0, 0, 'payé', NULL, '2024-10-16 12:08:05', '2024-10-16 13:50:09'),
(11, 2, 4, NULL, 0, 0, 'non payé', NULL, '2024-10-16 12:08:18', '2024-10-16 12:08:18'),
(12, 2, 4, NULL, 40, 0, 'non payé', NULL, '2024-10-16 12:08:29', '2024-10-16 12:08:29'),
(13, 2, 4, NULL, 10, 0, 'non payé', NULL, '2024-10-16 12:09:07', '2024-10-16 12:09:07'),
(14, 3, 7, NULL, 40, 0, 'non payé', NULL, '2024-10-16 12:39:30', '2024-10-16 12:39:30'),
(15, 3, 7, NULL, 50, 0, 'payé', NULL, '2024-10-16 12:39:52', '2024-10-17 09:47:50'),
(16, 3, 7, NULL, 20, 0, 'non payé', NULL, '2024-10-16 12:41:36', '2024-10-16 12:41:36'),
(17, 3, 7, NULL, 20, 0, 'non payé', NULL, '2024-10-16 12:41:57', '2024-10-16 12:41:57'),
(18, 3, 7, NULL, 10, 0, 'non payé', NULL, '2024-10-16 12:42:18', '2024-10-16 12:42:18'),
(19, 2, 8, NULL, 20, 180, 'non payé', NULL, '2024-10-17 10:33:20', '2024-10-17 10:33:20');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `palettes`
--

CREATE TABLE `palettes` (
  `numero_palette` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `nombre_carton` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `palette_fournisseurs`
--

CREATE TABLE `palette_fournisseurs` (
  `id` int(11) NOT NULL,
  `fournisseur_id` bigint(20) NOT NULL,
  `numero_palette` int(11) NOT NULL,
  `nombre_carton` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE `payements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `montant` int(11) NOT NULL,
  `mode_payement` varchar(255) NOT NULL,
  `date_payement` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payements`
--

INSERT INTO `payements` (`id`, `livraison_id`, `montant`, `mode_payement`, `date_payement`, `created_at`, `updated_at`) VALUES
(2, 10, 500, 'mvola', NULL, '2024-10-16 13:50:09', '2024-10-16 13:50:09'),
(3, 9, 200000, 'western union', NULL, '2024-10-17 09:46:57', '2024-10-17 09:46:57'),
(4, 15, 30000, 'western union', '2023-05-12', '2024-10-17 09:47:50', '2024-10-17 09:47:50');

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
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `nom_protuit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_finis`
--

CREATE TABLE `produit_finis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_produit_fini` int(11) NOT NULL,
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

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fcdoSJsN6L7yumQlrqdgGX8q6hsddZIJyzgw8AD2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnFmbjlSRVo5c0t5alhkSjc0OEdoUk9DdEFaeTF3RVhITFhveGF5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3QvY29kL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1729069646);

-- --------------------------------------------------------

--
-- Structure de la table `sous_fournisseurs`
--

CREATE TABLE `sous_fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `nom_sous_fournisseur` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_fournisseurs`
--

INSERT INTO `sous_fournisseurs` (`id`, `fournisseur_id`, `nom_sous_fournisseur`, `adresse`, `contact`, `created_at`, `updated_at`) VALUES
(2, 2, 'hugue', 'belgique', '0656168464', '2024-10-16 16:38:57', '2024-10-16 16:38:57');

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `livraison_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `today_prix`
--

CREATE TABLE `today_prix` (
  `id` int(11) NOT NULL,
  `prix` int(10) NOT NULL,
  `date_prix` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `traiters`
--

CREATE TABLE `traiters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `dechet_id` bigint(20) UNSIGNED NOT NULL,
  `produit_fini_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD UNIQUE KEY `unique_fournisseur_id` (`fournisseur_id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_evenement_id_foreign` (`evenement_id`);

--
-- Index pour la table `dechets`
--
ALTER TABLE `dechets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factures_livraison_id_foreign` (`livraison_id`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livraisons_commande_id_foreign` (`commande_id`),
  ADD KEY `livraisons_fournisseur_id_foreign` (`fournisseur_id`),
  ADD KEY `livraisons_sous_fournisseur_id_foreign` (`sous_fournisseur_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `palette_fournisseurs`
--
ALTER TABLE `palette_fournisseurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payements_livraison_id_foreign` (`livraison_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_fournisseur_id_foreign` (`fournisseur_id`);

--
-- Index pour la table `produit_finis`
--
ALTER TABLE `produit_finis`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_livraison_id_foreign` (`livraison_id`);

--
-- Index pour la table `traiters`
--
ALTER TABLE `traiters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traiters_stock_id_foreign` (`stock_id`),
  ADD KEY `traiters_dechet_id_foreign` (`dechet_id`),
  ADD KEY `traiters_produit_fini_id_foreign` (`produit_fini_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `dechets`
--
ALTER TABLE `dechets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `palette_fournisseurs`
--
ALTER TABLE `palette_fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT pour la table `produit_finis`
--
ALTER TABLE `produit_finis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_fournisseurs`
--
ALTER TABLE `sous_fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `traiters`
--
ALTER TABLE `traiters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `avances_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `factures_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `livraisons` (`id`);

--
-- Contraintes pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD CONSTRAINT `livraisons_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livraisons_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `livraisons_sous_fournisseur_id_foreign` FOREIGN KEY (`sous_fournisseur_id`) REFERENCES `sous_fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `livraisons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`);

--
-- Contraintes pour la table `sous_fournisseurs`
--
ALTER TABLE `sous_fournisseurs`
  ADD CONSTRAINT `sous_fournisseurs_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_livraison_id_foreign` FOREIGN KEY (`livraison_id`) REFERENCES `livraisons` (`id`);

--
-- Contraintes pour la table `traiters`
--
ALTER TABLE `traiters`
  ADD CONSTRAINT `traiters_dechet_id_foreign` FOREIGN KEY (`dechet_id`) REFERENCES `dechets` (`id`),
  ADD CONSTRAINT `traiters_produit_fini_id_foreign` FOREIGN KEY (`produit_fini_id`) REFERENCES `produit_finis` (`id`),
  ADD CONSTRAINT `traiters_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
