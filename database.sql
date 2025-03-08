-- MySQL dump 10.13  Distrib 9.1.0, for Win64 (x86_64)
--
-- Host: localhost    Database: essai1
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `boxeur`
--

DROP TABLE IF EXISTS `boxeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boxeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_boxeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boxeur`
--

LOCK TABLES `boxeur` WRITE;
/*!40000 ALTER TABLE `boxeur` DISABLE KEYS */;
INSERT INTO `boxeur` VALUES (1,'Boxeur 1'),(2,'Boxeur 2'),(3,'Boxeur 3'),(4,'Boxeur 4');
/*!40000 ALTER TABLE `boxeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boxeurs`
--

DROP TABLE IF EXISTS `boxeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boxeurs` (
  `id_boxeur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `categorie_poids` varchar(50) NOT NULL,
  PRIMARY KEY (`id_boxeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boxeurs`
--

LOCK TABLES `boxeurs` WRITE;
/*!40000 ALTER TABLE `boxeurs` DISABLE KEYS */;
/*!40000 ALTER TABLE `boxeurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combat_arbitre`
--

DROP TABLE IF EXISTS `combat_arbitre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `combat_arbitre` (
  `combat_id` int NOT NULL,
  `arbitre_id` int NOT NULL,
  PRIMARY KEY (`combat_id`,`arbitre_id`),
  KEY `arbitre_id` (`arbitre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combat_arbitre`
--

LOCK TABLES `combat_arbitre` WRITE;
/*!40000 ALTER TABLE `combat_arbitre` DISABLE KEYS */;
/*!40000 ALTER TABLE `combat_arbitre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combats`
--

DROP TABLE IF EXISTS `combats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `combats` (
  `id_combat` int NOT NULL AUTO_INCREMENT,
  `boxeur1_id` int NOT NULL,
  `boxeur2_id` int NOT NULL,
  `arbitre1_id` int NOT NULL,
  `arbitre2_id` int NOT NULL,
  `arbitre3_id` int NOT NULL,
  `date_combat` date NOT NULL,
  `heure_combat` time NOT NULL,
  `phase` varchar(50) NOT NULL,
  `statut` enum('À venir','En cours','Terminé') DEFAULT 'À venir',
  `vainqueur_id` int DEFAULT NULL,
  `mode_victoire` enum('KO','TKO','Decision','Abandon','Disqualification') DEFAULT NULL,
  `commentaires` text,
  PRIMARY KEY (`id_combat`),
  KEY `boxeur1_id` (`boxeur1_id`),
  KEY `boxeur2_id` (`boxeur2_id`),
  KEY `arbitre1_id` (`arbitre1_id`),
  KEY `arbitre2_id` (`arbitre2_id`),
  KEY `arbitre3_id` (`arbitre3_id`),
  KEY `vainqueur_id` (`vainqueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combats`
--

LOCK TABLES `combats` WRITE;
/*!40000 ALTER TABLE `combats` DISABLE KEYS */;
/*!40000 ALTER TABLE `combats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenements` (
  `id_evenement` int NOT NULL AUTO_INCREMENT,
  `combat_id` int DEFAULT NULL,
  `round` int DEFAULT NULL,
  `type_evenement` varchar(255) DEFAULT NULL,
  `boxeur_id` int DEFAULT NULL,
  PRIMARY KEY (`id_evenement`),
  KEY `combat_id` (`combat_id`),
  KEY `boxeur_id` (`boxeur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenements`
--

LOCK TABLES `evenements` WRITE;
/*!40000 ALTER TABLE `evenements` DISABLE KEYS */;
/*!40000 ALTER TABLE `evenements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultats`
--

DROP TABLE IF EXISTS `resultats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultats` (
  `id_resultat` int NOT NULL AUTO_INCREMENT,
  `combat_id` int NOT NULL,
  `arbitre_id` int NOT NULL,
  `vainqueur_id` int NOT NULL,
  `mode_victoire` enum('KO','TKO','Decision','Abandon','Disqualification') NOT NULL,
  `commentaires` text,
  `date_validation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_resultat`),
  KEY `combat_id` (`combat_id`),
  KEY `arbitre_id` (`arbitre_id`),
  KEY `vainqueur_id` (`vainqueur_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultats`
--

LOCK TABLES `resultats` WRITE;
/*!40000 ALTER TABLE `resultats` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ring`
--

DROP TABLE IF EXISTS `ring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ring` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_ring` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ring`
--

LOCK TABLES `ring` WRITE;
/*!40000 ALTER TABLE `ring` DISABLE KEYS */;
INSERT INTO `ring` VALUES (1,'Stade A'),(2,'Stade B'),(3,'Stade C');
/*!40000 ALTER TABLE `ring` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stade`
--

DROP TABLE IF EXISTS `stade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stade`
--

LOCK TABLES `stade` WRITE;
/*!40000 ALTER TABLE `stade` DISABLE KEYS */;
INSERT INTO `stade` VALUES (1,'Ring 1');
/*!40000 ALTER TABLE `stade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pfp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'nobara','kugisaki','ra','$2y$10$MmDfFHKlCundrBvr/bXKTu/QeLPwXl.GoRqyt.h1c41injYGpkRhK','uploads/Capture d’écran 2025-03-08 162613.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-08 21:08:02
