-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 oct. 2024 à 06:51
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
-- Base de données : `salarie_gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `bulletins_paie`
--

CREATE TABLE `bulletins_paie` (
  `id` int NOT NULL,
  `employe_id` int DEFAULT NULL,
  `date_paie` date DEFAULT NULL,
  `salaire_brut` decimal(10,2) DEFAULT NULL,
  `cotisations` decimal(5,2) DEFAULT NULL,
  `salaire_net` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bulletins_paie`
--

INSERT INTO `bulletins_paie` (`id`, `employe_id`, `date_paie`, `salaire_brut`, `cotisations`, `salaire_net`) VALUES
(1, 1, '2024-10-04', 2500.00, 25.00, 2100.00),
(2, 1, '2024-10-04', 2400.00, 25.00, 0.00),
(4, 1, '2024-10-04', 2800.00, 25.00, 2100.00),
(5, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(6, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(7, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(8, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(9, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(10, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(11, 1, '2024-10-04', 2800.00, 25.00, 2100.00),
(12, 4, '2024-10-04', 1800.00, 25.00, 1350.00),
(14, 4, '2024-10-07', 1800.00, 25.00, 1350.00);

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id` int NOT NULL,
  `employe_id` int DEFAULT NULL,
  `type_conge` enum('conge payé','maladie','sans solde') COLLATE utf8mb4_general_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` enum('approuvé','en attente','refusé') COLLATE utf8mb4_general_ci DEFAULT 'en attente',
  `date_demande` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`id`, `employe_id`, `type_conge`, `date_debut`, `date_fin`, `statut`, `date_demande`) VALUES
(1, 4, 'conge payé', '2024-10-07', '2024-10-31', 'approuvé', '2024-10-07 10:51:21'),
(2, 1, 'maladie', '2024-10-16', '2024-10-25', 'en attente', '2024-10-07 12:13:58');

-- --------------------------------------------------------

--
-- Structure de la table `contrats`
--

CREATE TABLE `contrats` (
  `id` int NOT NULL,
  `employe_id` int DEFAULT NULL,
  `type_contrat` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `responsable` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom`, `responsable`, `icon`, `date_creation`) VALUES
(1, 'informatique', 'thierry', '', '2024-10-03 11:42:42'),
(2, 'Entretien', 'Mariam kabore', '', '2024-10-04 09:52:29'),
(3, 'hopital grenoble', 'yannis', '../../public/uploads/iconskali-linux-os-dragon-grey-6yb1clh9tv6wa0jn.jpg', '2024-10-13 22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `poste` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaire_brut` decimal(10,2) NOT NULL,
  `departement_id` int DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` text COLLATE utf8mb4_general_ci,
  `statut` enum('actif','inactif') COLLATE utf8mb4_general_ci DEFAULT 'actif',
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `contrat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `date_naissance`, `poste`, `salaire_brut`, `departement_id`, `date_embauche`, `email`, `telephone`, `adresse`, `statut`, `date_creation`, `contrat`) VALUES
(1, 'sawadogo', 'gerard', '1979-10-09', 'developpeur', 2800.00, 1, '2022-09-20', 'gerard@gmail.cpm', '0012456897', '15 rue bertelot', 'inactif', '2024-10-03 11:49:55', ''),
(4, 'Mahamadou', 'ismael', '2003-08-06', 'coursier', 1800.00, 2, '2022-08-04', 'ismael@gmail.com', '0012456897', '15 rue des olives', 'inactif', '2024-10-03 22:00:00', 'CDI');

-- --------------------------------------------------------

--
-- Structure de la table `historique_salaires`
--

CREATE TABLE `historique_salaires` (
  `id` int NOT NULL,
  `employe_id` int DEFAULT NULL,
  `salaire` decimal(10,2) NOT NULL,
  `date_changement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique_salaires`
--

INSERT INTO `historique_salaires` (`id`, `employe_id`, `salaire`, `date_changement`) VALUES
(1, 1, 2900.00, '2024-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `categorie` enum('E-commerce','Gestion-hopital','Gestion-administrative') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type_abonnement` enum('Mensuel','Annuel') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` enum('Actif','Expiré','Annulé') COLLATE utf8mb4_general_ci DEFAULT 'Actif',
  `prix` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `categorie`, `type_abonnement`, `date_debut`, `date_fin`, `statut`, `prix`) VALUES
(1, 1, 'E-commerce', 'Mensuel', '2024-10-10', '2024-11-18', 'Actif', 15000),
(2, 2, 'Gestion-hopital', 'Mensuel', '2024-10-10', '2025-02-10', 'Actif', 20000),
(3, 3, 'E-commerce', 'Annuel', '2024-10-13', '2024-10-13', 'Expiré', 15000),
(6, 4, 'Gestion-administrative', 'Mensuel', '2024-11-18', '2024-11-18', 'Actif', 25000);

-- --------------------------------------------------------

--
-- Structure de la table `subscription_keys`
--

CREATE TABLE `subscription_keys` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `subscription_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `subscription_type` enum('E-commerce','Gestion-hopital','Gestion-administrative') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subscription_keys`
--

INSERT INTO `subscription_keys` (`id`, `user_id`, `subscription_key`, `subscription_type`, `expiry_date`) VALUES
(1, 4, 'c21f6c48aae2ac92386602535a73345f', 'E-commerce', '2024-11-18');

-- --------------------------------------------------------

--
-- Structure de la table `taxes`
--

CREATE TABLE `taxes` (
  `id` int NOT NULL,
  `pays` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taux_imposition` decimal(5,2) DEFAULT NULL,
  `taux_cotisation_sociale` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statut` enum('Actif','Inactif') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `telephone`, `email`, `mot_de_passe`, `date_naissance`, `sexe`, `statut`, `created_at`) VALUES
(1, 'sawadogo', 'ismael', '0012456897', 'sa@sa.com', '$2y$10$aQeC6F/uYowU878RMP4ORufzK.c4zZNhDoWuraq3b5FyuGwIY0fGW', '1996-10-10', 'M', 'Actif', '2024-10-10 14:03:04'),
(2, 'kabore', 'setou', '0012456897', 'setou@setou.com', '$2y$10$aQeC6F/uYowU878RMP4ORufzK.c4zZNhDoWuraq3b5FyuGwIY0fGW', '1994-10-10', 'F', 'Actif', '2024-10-10 14:17:03'),
(3, 'Mercedes', 'setou', '0012456897', 'mercedes@gmail.com', '$2y$10$aQeC6F/uYowU878RMP4ORufzK.c4zZNhDoWuraq3b5FyuGwIY0fGW', '2007-08-31', 'F', 'Actif', '2024-10-13 13:48:57'),
(4, 'kabore', 'gerard', '0012456897', 'gerard@gerard.com', '$2y$10$oBKj3KTCNzzkv2mnJgizCOxH2S7FxBjPpcf0Qe6le1I7vGCWuDHmy', '1987-09-16', 'M', 'Actif', '2024-10-18 07:21:17');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `departement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `role`, `departement`) VALUES
(1, 'scar', '$2y$10$2VkePJvez4dShEPtosoElueo8Qw/pbC631HV3Pw3t/SNAKqFffJWK', 'Admin', 1),
(2, 'romuald', '$2y$10$aQeC6F/uYowU878RMP4ORufzK.c4zZNhDoWuraq3b5FyuGwIY0fGW', 'RH', 2),
(3, 'mariam', '$2y$10$GJwOA36fk1FhE0noFWA1G.E3l2lWbhH0X9REFVuuCzgDNoZAHXzrW', 'Employe', 1),
(4, 'Denise', '$2y$10$IngfOAlC.YfWhY3B1wpYl.efV7TwNPqSUzOdceukhgoapbksooPp6', 'Employe', 2),
(5, 'yannis', '$2y$10$9/FugVhvLTUlUEH/hhxcWeMk3VOZYh05Xl/.2iswM32u8XqYfIFna', 'Employe', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bulletins_paie`
--
ALTER TABLE `bulletins_paie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- Index pour la table `historique_salaires`
--
ALTER TABLE `historique_salaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `subscription_keys`
--
ALTER TABLE `subscription_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `departement` (`departement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bulletins_paie`
--
ALTER TABLE `bulletins_paie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `historique_salaires`
--
ALTER TABLE `historique_salaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `subscription_keys`
--
ALTER TABLE `subscription_keys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bulletins_paie`
--
ALTER TABLE `bulletins_paie`
  ADD CONSTRAINT `bulletins_paie_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`);

--
-- Contraintes pour la table `conges`
--
ALTER TABLE `conges`
  ADD CONSTRAINT `conges_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`);

--
-- Contraintes pour la table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`);

--
-- Contraintes pour la table `historique_salaires`
--
ALTER TABLE `historique_salaires`
  ADD CONSTRAINT `historique_salaires_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`);

--
-- Contraintes pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subscription_keys`
--
ALTER TABLE `subscription_keys`
  ADD CONSTRAINT `subscription_keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`departement`) REFERENCES `departements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
