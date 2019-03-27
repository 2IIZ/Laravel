-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2019 at 03:02 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_visites`
--

-- --------------------------------------------------------

--
-- Table structure for table `practiciens`
--

DROP TABLE IF EXISTS `practiciens`;
CREATE TABLE IF NOT EXISTS `practiciens` (
  `matricule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notoriete` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplome` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coefficien_prescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_origine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `derniere_visite` timestamp NULL DEFAULT NULL,
  `nouvelle_visite` timestamp NULL DEFAULT NULL,
  `date_embauche` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `practiciens_matricule_index` (`matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practiciens`
--

INSERT INTO `practiciens` (`matricule`, `name`, `telephone`, `mail`, `notoriete`, `specialite`, `diplome`, `coefficien_prescription`, `ville_origine`, `ville`, `adresse`, `derniere_visite`, `nouvelle_visite`, `date_embauche`, `created_at`, `updated_at`) VALUES
('GKE83F93', 'Charles Grutte', '093915938', 'Grutte@hotmail.fr', 'ok', 'Doc', 'Nope', NULL, '-', '-', '5203 Rue de Tierry', NULL, '2019-03-29 10:30:00', NULL, NULL, NULL),
('JEIFJ3148FE', 'Franóis le Belge', '338501024', 'fran@gmail.com', 'ok', 'Découpeur de tête', 'non', NULL, '-', '-', '6 Rue de la Découpe', '2019-03-20 09:00:00', '2019-03-30 14:00:00', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
