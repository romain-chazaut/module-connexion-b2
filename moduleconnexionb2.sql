-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 15 sep. 2023 à 07:19
-- Version du serveur : 8.0.32
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexionb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `firstname`, `lastname`, `password`, `role`) VALUES
(2, 'admiN1337$', 'admiN1337$', 'admiN1337$', '$2y$10$Cr2AwjQJx9.UkUf9beJaaO414rIsNbcQDmCJ2lN764M5ltcmA0lUu', 'admin'),
(4, 'hihi', 'hi', 'Chazaut', '$2y$10$xyd0wHAt7dXCPhhbs4lEL.tWL/ckDvucF4NoqUlPTedCx31XR82uO', 'user'),
(5, 'jiji', 'jiji', 'Romain', '$2y$10$V5rm3X.xccHhcVMH58JCb.lCgH15OkQkWHpbDQ3PfoQp/mXb4RPr2', 'user'),
(7, 'ke', 'keke', 'keke', '$2y$10$JATEMbUqFmLFuaUg5CW1fu5NsZABduCC68tTRcJbOVv0FtFSSYCuy', 'user'),
(8, 'ke', 'keke', 'keke', '$2y$10$l4gIv0wzEP/TXqAZ4ZgdheH5mBxMuhPHEi0qd2YCnn6ThRZauhn1i', 'user'),
(9, 'fifi', 'Romain', 'Romain', '$2y$10$0bph5CKkG/qDPjIl/GpKhe97N1nEC77NH2no/jUQXjY0EzUk2j/Yq', 'user'),
(10, 'fifi', 'Romain', 'Romain', '$2y$10$erSzksbfMjKBJiKiU7SzT.EZZO4F5F/3wrAGqdkPeC5aupqMH/1u6', 'user'),
(11, 'fifi', 'Romain', 'Romain', '$2y$10$RCxWAT9KuGt5UH8bMEj7i.g.Qc3ZGDEWvBoVIWsHL0LwP1zOsEMF6', 'user'),
(13, 'gigi', 'gigi', 'gig', '$2y$10$7lP78BjThRNsN3qcCVnyEuhPFU8t4OElawgdRQSbfboAaOVQtyk8i', 'user'),
(14, 'kiki', 'kiki', 'kiki', '$2y$10$9PR5DVf9EvOjUYQsNiMDR.VWdOLU67q4F3xi3aQ4RZt.Cly7Vt8uu', 'user'),
(15, 'coco', 'coco', 'coco', '$2y$10$u02CoiQJOFfCwsQfiJfUn.CBBr8n2bsNQu0wsgminmwVJDTf3qAYm', 'user'),
(16, 'romai', 'romain', 'romain', '$2y$10$qfvGBSh9JhllbCsrTRmyquA4PAT72B8fsvsImUa.6wGAkvOqC9Va2', 'user'),
(17, 'Roro', 'HELLo', 'Chazaut', '$2y$10$CBtS3qKnjIpnLhbN.Vxr5unwhfgKRa7VrH0COttATmjFRJiPFeBTm', 'user'),
(18, 'hell', 'hello', 'hello', '$2y$10$dwvKkr6dNa2ncvTUeTwvTeELxc82B7Cres81S.uQiMq0WilnTuBzO', 'user'),
(19, 'huhu', 'huhu', 'huhu', '$2y$10$SqeCGa2dvX5p9OgQUqU1E.AW1OpMJ54yz/CC9FDiYIjkbgwGDIetu', 'user'),
(20, 'popo', 'Romain', 'Chazaut', '$2y$10$cq16xfUF5JWh8A.S...Iv.7VWPc5NOvEuSHnYNvi1VsCuv3pCYiDe', 'user'),
(21, 'vivi', 'vivi', 'vivi', '$2y$10$6yx73Bwjs2mkZfFCAejKoeTLRuFBPmF0UiFTGxvVtUU6X.7WICWUi', 'user'),
(23, 'kekeke', 'kekeke', 'Romain', '$2y$10$HbCDCEfhW6Zx/StGd.AP..Rz4cKCmOa2VxSz89ZZs.SB1FAewdQtS', 'user'),
(24, 'Clarouch', 'Clarisse', 'Rolletos', '$2y$10$ZV.8NAQvuKcjqnsWQ/bHLOnTjrPM5uCEdHYC5mgL2V6ZxVli1dsEa', 'user'),
(25, 'lolo', 'lolo', 'lolo', '$2y$10$2JE6X71bkkbqOMTF9TZMOufYiR193CWn.adxlZkM.tyjROKWjtGeC', 'user'),
(26, 'fofo', 'fofo', 'fofo', '$2y$10$BwRoKhAP3hLnrnpJiKKt5eACDR5RUMRUwUJ1BMppW/aYgl/HACQC.', 'user'),
(27, 'gogogo', 'gogogo', 'gogogo', '$2y$10$MWlEn7u662N.eqySMbVoPuWH77DJa0pcgVoC3.xYGGAumHJ9eLpPq', 'user'),
(28, 'Clarisse', 'Clarisse', 'Clarisse', '$2y$10$VCwgii9.KnIb/GrJ.bnDQuWODt93IJJ7Rqb3XWTCu24rGxoA/0HPK', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
