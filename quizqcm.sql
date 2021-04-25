-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 25 avr. 2021 à 13:52
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quizqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mark` double(15,2) NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_fk_2064595` (`student_id`),
  KEY `question_fk_2064596` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `mark`, `answer`, `answer2`, `answer3`, `answer4`, `created_at`, `updated_at`, `deleted_at`, `student_id`, `question_id`) VALUES
(1, 0.00, NULL, 'test2', 'test3', NULL, '2021-03-19 20:00:13', '2021-03-19 20:00:13', NULL, 3, 9),
(2, 0.00, 'test1', NULL, NULL, NULL, '2021-03-19 20:00:13', '2021-03-19 20:00:13', NULL, 3, 8),
(3, 2.00, NULL, 'test2', 'test3', NULL, '2021-03-19 20:05:09', '2021-03-19 20:05:09', NULL, 3, 11),
(4, 0.00, 'test2', NULL, NULL, NULL, '2021-03-19 20:05:09', '2021-03-19 20:05:09', NULL, 3, 12),
(5, 1.00, 'abc', NULL, NULL, NULL, '2021-03-19 20:05:09', '2021-03-19 20:05:09', NULL, 3, 13);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mbisd', '2021-02-07 20:05:12', '2021-02-07 20:05:12', NULL),
(2, 'mbisd2', '2021-03-01 21:09:05', '2021-03-01 21:09:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_08_25_000001_create_permissions_table', 1),
(10, '2020_08_25_000002_create_roles_table', 1),
(11, '2020_08_25_000005_create_quizzes_table', 1),
(12, '2020_08_25_000006_create_questions_table', 1),
(13, '2020_08_25_000008_create_answers_table', 1),
(14, '2020_08_25_000009_create_permission_role_pivot_table', 1),
(15, '2020_08_25_000010_create_role_user_pivot_table', 1),
(16, '2020_08_25_000011_add_relationship_fields_to_quizzes_table', 1),
(17, '2020_08_25_000012_add_relationship_fields_to_questions_table', 1),
(18, '2020_08_25_000013_add_relationship_fields_to_answers_table', 1),
(19, '2020_08_27_000009_create_classes_table', 1),
(20, '2020_09_05_000010_add_relationship_fields_to_users_table', 1),
(21, '2021_01_29_131433_add_classe_id_to_quizzes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', 'accès à la gestion des utilisateurs', NULL, NULL, NULL),
(2, 'permission_create', 'créer permission ', NULL, NULL, NULL),
(3, 'permission_edit', 'modifier permission', NULL, NULL, NULL),
(4, 'permission_show', 'afficher permission', NULL, NULL, NULL),
(5, 'permission_delete', 'supprimer permission', NULL, NULL, NULL),
(6, 'permission_access', 'accès permission', NULL, NULL, NULL),
(7, 'role_create', 'créer role', NULL, NULL, NULL),
(8, 'role_edit', 'modifier role', NULL, NULL, NULL),
(9, 'role_show', 'afficher role', NULL, NULL, NULL),
(10, 'role_delete', 'supprimer role', NULL, NULL, NULL),
(11, 'role_access', 'accès role', NULL, NULL, NULL),
(12, 'user_create', 'créer utilisateur', NULL, NULL, NULL),
(13, 'user_edit', 'modifier utilisateur', NULL, NULL, NULL),
(14, 'user_show', 'afficher utilisateur', NULL, NULL, NULL),
(15, 'user_delete', 'supprimer utilisateur', NULL, NULL, NULL),
(16, 'user_access', 'accès utilisateur', NULL, NULL, NULL),
(17, 'teacher_create', 'créer enseignant ', NULL, NULL, NULL),
(18, 'teacher_edit', 'modifier enseignant', NULL, NULL, NULL),
(19, 'teacher_show', 'afficher enseignant', NULL, NULL, NULL),
(20, 'teacher_delete', 'supprimer enseignant', NULL, NULL, NULL),
(21, 'teacher_access', 'accès enseignant', NULL, NULL, NULL),
(22, 'quiz_create', 'créer quiz', NULL, NULL, NULL),
(23, 'quiz_edit', 'modifier quiz', NULL, NULL, NULL),
(24, 'quiz_show', 'afficher quiz', NULL, NULL, NULL),
(25, 'quiz_delete', 'supprimer quiz', NULL, NULL, NULL),
(26, 'quiz_access', 'accès quiz', NULL, NULL, NULL),
(27, 'question_create', 'créer question', NULL, NULL, NULL),
(28, 'question_edit', 'modifier question', NULL, NULL, NULL),
(29, 'question_show', 'afficher question', NULL, NULL, NULL),
(30, 'question_delete', 'supprimer question', NULL, NULL, NULL),
(31, 'question_access', 'accès question', NULL, NULL, NULL),
(32, 'student_create', 'créer étudiant', NULL, NULL, NULL),
(33, 'student_edit', 'modifier étudiant', NULL, NULL, NULL),
(34, 'student_show', 'afficher étudiant', NULL, NULL, NULL),
(35, 'student_delete', 'supprimer étudiant', NULL, NULL, NULL),
(36, 'student_access', 'accès étudiant', NULL, NULL, NULL),
(37, 'answer_create', 'créer réponse', NULL, NULL, NULL),
(38, 'answer_edit', 'modifier réponse', NULL, NULL, NULL),
(39, 'answer_show', 'afficher réponse', NULL, NULL, NULL),
(40, 'answer_delete', 'supprimer réponse', NULL, NULL, NULL),
(41, 'answer_access', 'accès réponse', NULL, NULL, NULL),
(42, 'classe_create', 'créer classe', NULL, NULL, NULL),
(43, 'classe_edit', 'modifier classe', NULL, NULL, NULL),
(44, 'classe_show', 'afficher classe', NULL, NULL, NULL),
(45, 'classe_delete', 'supprimer classe', NULL, NULL, NULL),
(46, 'classe_access', 'accès classe', NULL, NULL, NULL),
(47, 'profile_password_edit', 'modification du mot de passe du profil', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  KEY `role_id_fk_2064013` (`role_id`),
  KEY `permission_id_fk_2064013` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(3, 24),
(3, 26),
(3, 36),
(3, 37),
(3, 39),
(3, 40),
(3, 41),
(3, 47);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `explain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` double(8,2) DEFAULT NULL,
  `mark` double(15,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_fk_2064594` (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `description`, `a_option`, `b_option`, `c_option`, `d_option`, `correct_answer`, `explain`, `correct_answer_2`, `time`, `mark`, `type`, `created_at`, `updated_at`, `deleted_at`, `quiz_id`) VALUES
(10, 'cette page d’authentification, l’admin peut se connecter pour accéder a la page d’accueil', NULL, NULL, NULL, NULL, 'fghjk', NULL, '', 2.50, 1.00, 'qtext', '2021-03-19 19:57:09', '2021-03-19 19:57:09', NULL, 1),
(11, 'cette page d’authentification, l’admin peut se connecter pour accéder a la\r\npage d’accueil', 'test1', 'test2', 'test3', 'test4', 'test3', NULL, '', 1.48, 2.00, 'mult', '2021-03-19 20:01:52', '2021-03-19 20:01:52', NULL, 4),
(14, 'fhgjk', 'hj', 'test2', 'pp', 'uu', 'hj', NULL, '', 1.67, 1.00, 'simple', '2021-03-21 21:27:59', '2021-03-21 21:27:59', NULL, 4),
(12, 'cette page d’authentification, l’admin peut se connecter pour accéder a lapage d’accueil', 'test1', 'test2', 'test3', 'test4', 'test1', NULL, '', 2.28, 1.00, 'simple', '2021-03-19 20:02:25', '2021-03-19 20:02:25', NULL, 4),
(9, 'cette page d’authentification, l’admin peut se connecter pour accéder a lapage d’accueil', 'test1', 'test2', 'test3', 'test4', 'test4', NULL, '', 1.50, 1.00, 'mult', '2021-03-19 19:53:10', '2021-03-19 19:53:10', NULL, 1),
(13, 'cette page d’authentification, l’admin peut se connecter pour accéder a la page d’accueil', NULL, NULL, NULL, NULL, 'abc', NULL, '', 2.97, 1.00, 'qtext', '2021-03-19 20:03:08', '2021-03-19 20:03:08', NULL, 4),
(8, 'Avec cette page d’authentification, l’admin peut se connecter pour accéder a la page d’accueil', 'test1', 'test2', 'test3', 'test4', 'test4', NULL, NULL, 1.50, 1.00, 'simple', '2021-03-19 19:32:27', '2021-03-19 19:51:34', NULL, 1),
(15, 'dfghbjnk,l', 'test1', 'ii', 'pp', 'uu', 'test1', NULL, '', 1.07, 1.00, 'simple', '2021-03-22 20:21:44', '2021-03-22 20:21:44', NULL, 2),
(16, 'fgbhjnk,', 'hj', 'ii', 'test3', 'uu', 'uu', NULL, '', 2.50, 1.00, 'mult', '2021-03-22 20:23:12', '2021-03-22 20:23:12', NULL, 4),
(17, 'qsdfcghyjukl;m:ù', NULL, NULL, NULL, NULL, 'fghjk', NULL, '', 2.42, 1.00, 'qtext', '2021-03-22 20:23:49', '2021-03-22 20:23:49', NULL, 4),
(18, 'fgvhbjnk,l;m:', 'test1', 'test2', 'test3', 'test4', 'test4', NULL, '', 2.67, 1.00, 'mult', '2021-03-23 19:27:25', '2021-03-23 19:27:25', NULL, 5),
(19, 'fgvbhjnk,l;:', 'test1', 'test2', 'test3', 'test4', 'test1', NULL, '', 1.50, 2.00, 'simple', '2021-03-23 19:29:12', '2021-03-23 19:29:12', NULL, 5),
(20, 'dfcgvhbjnk,l;mfcgvhbjnk,;:fghjk', NULL, NULL, NULL, NULL, 'abc', NULL, NULL, 2.50, 2.00, 'qtext', '2021-03-23 19:30:02', '2021-03-23 20:18:51', NULL, 5),
(21, 'fgvhbjnk,l', NULL, NULL, NULL, NULL, 'test4', NULL, '', 0.00, 2.00, 'qtext', '2021-03-23 20:55:32', '2021-03-23 21:01:59', '2021-03-23 21:01:59', 5),
(22, 'test test test', NULL, NULL, NULL, NULL, 'test4', NULL, '', 0.00, 1.00, 'qtext', '2021-03-23 20:57:36', '2021-03-23 21:01:49', '2021-03-23 21:01:49', 5),
(23, 'coco', NULL, NULL, NULL, NULL, 'hgj', NULL, '', 0.00, 2.00, 'qtext', '2021-03-23 20:58:09', '2021-03-23 21:01:34', '2021-03-23 21:01:34', 5),
(24, 'testtttttttttttttttttttttttttttttttt', NULL, NULL, NULL, NULL, 'hgj', NULL, '', 0.00, 1.00, 'qtext', '2021-03-23 21:02:20', '2021-03-23 21:07:25', '2021-03-23 21:07:25', 5),
(25, 'fcgvbhjnk,l;:!salmaaaaaaaaaaaaaaaaaa', NULL, NULL, NULL, NULL, 'test4', NULL, '', 0.00, 1.00, 'qtext', '2021-03-23 21:02:54', '2021-03-23 21:07:09', '2021-03-23 21:07:09', 5),
(26, 'testsalma', NULL, NULL, NULL, NULL, 'test4', NULL, '', 2.68, 1.00, 'qtext', '2021-03-23 21:07:51', '2021-03-23 21:10:43', '2021-03-23 21:10:43', 5),
(27, 'dfgvhbjnk,;aMINA', NULL, NULL, NULL, NULL, 'hgj', NULL, NULL, 1.00, 1.00, 'qtext', '2021-03-23 21:10:31', '2021-03-23 21:12:53', NULL, 5),
(28, 'salma', NULL, NULL, NULL, NULL, 'test4', NULL, '', 1.88, 2.00, 'qtext', '2021-03-23 21:11:05', '2021-03-23 21:11:05', NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_qst` int(11) NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_classe_id_foreign` (`classe_id`),
  KEY `teacher_fk_2064593` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `module`, `nb_qst`, `classe_id`, `time`, `created_at`, `updated_at`, `deleted_at`, `teacher_id`) VALUES
(1, 'php', 'php', 5, 1, NULL, '2021-02-07 20:06:19', '2021-03-18 21:53:28', NULL, 2),
(3, 'fvj', 'testm', 4, 1, '22:45:23', '2021-03-19 12:13:38', '2021-03-19 12:13:38', NULL, 4),
(4, 'java', 'java', 4, 1, '02:00:09', '2021-03-19 12:50:27', '2021-03-19 12:50:27', NULL, 4),
(5, 'test', 'testm', 6, 2, NULL, '2021-03-23 19:21:39', '2021-03-23 19:21:39', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL),
(3, 'student', '2021-02-07 20:04:44', '2021-02-07 20:04:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  KEY `user_id_fk_2064022` (`user_id`),
  KEY `role_id_fk_2064022` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2),
(6, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `classe_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classe_fk_2128776` (`classe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `cin`, `created_at`, `updated_at`, `deleted_at`, `classe_id`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$dtY1zzVib43nbOV8Lcnq9.F2n/Hp87P3KhXg.NXjbzVLomxM8PlDG', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'badir', 'badir@gmail.com', NULL, '$2y$10$wId9wreoeIf2QAf5qzb2hOMXc2FQFOXCaYHbuKg6JCTi6IltdPk3m', NULL, NULL, '2021-02-07 20:02:29', '2021-02-07 20:02:29', NULL, NULL),
(3, 'salma sekhra', 'sekhrasalma1997@gmail.com', NULL, '$2y$10$LfxHiOvolbiWSjzjclDfCO6mjBwphFpy5s3.ADYHsCfnegSD9maGC', NULL, 'cn28312', '2021-02-07 20:05:32', '2021-03-01 20:23:16', NULL, 1),
(4, 'badir2', 'badir2@gmail.com', NULL, '$2y$10$GzekPu1rXoEd5edWeUu.cetnKjkQI8jnY1uu9119XloWWYmkMGuYW', NULL, NULL, '2021-02-07 20:17:54', '2021-02-07 20:17:54', NULL, NULL),
(5, 'amina', 'amina@gmail.com', NULL, '$2y$10$/hYsFce9Ss1JccaUjYV4geLZZvjf4GaGc4h.c5p48AqOyF7Sts5Vq', NULL, 'fvdh23', '2021-03-01 22:42:20', '2021-03-01 22:42:20', NULL, 2),
(6, 'salma1sekhra', 'sekhra1salma1997@gmail.com', NULL, '$2y$10$K15OUZqG4gQlCTfJsnl8XuEQ7YFkgsyz.a20a9KJlTlEq556GRtR6', NULL, 'hsdbvmksdjb', '2021-03-22 21:41:20', '2021-03-22 21:41:20', NULL, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
