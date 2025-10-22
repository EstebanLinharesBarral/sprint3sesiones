/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mysitedb
-- ------------------------------------------------------
-- Server version	10.11.13-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tComentarios`
--

DROP TABLE IF EXISTS `tComentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tComentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(2000) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `juego_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_IdUsuario` (`usuario_id`),
  KEY `fk_IdJuego` (`juego_id`),
  CONSTRAINT `fk_IdJuego` FOREIGN KEY (`juego_id`) REFERENCES `tJuegos` (`id`),
  CONSTRAINT `fk_IdUsuario` FOREIGN KEY (`usuario_id`) REFERENCES `tUsuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tComentarios`
--

LOCK TABLES `tComentarios` WRITE;
/*!40000 ALTER TABLE `tComentarios` DISABLE KEYS */;
INSERT INTO `tComentarios` VALUES
(1,'Una de las mejores experiencias en un juego y con un profundo mensaje',1,1,'0000-00-00'),
(2,'¿Quién pensaría que los franceses podrían hacer grandes juegos?',2,2,'0000-00-00'),
(3,'Un juegazo de puzles y exploración, todo está conectado aunque pueda no parecerlo.',3,3,'0000-00-00'),
(4,'Un juego de gestión en un mundo post apocalíptico denso y complicado.',4,4,'0000-00-00'),
(5,'Una carta de amor a juegos como Half Life, Portal y antiguas joyas de Valve mezclado con los SCPs y sistemas de Quality of Life actuales.',5,5,'0000-00-00'),
(6,'Juegazo',NULL,1,'0000-00-00'),
(7,'Nadie lo pensaría, pero ahí está',NULL,2,'0000-00-00'),
(8,'Me lo pasé ayer',NULL,5,'2025-10-13');
/*!40000 ALTER TABLE `tComentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tJuegos`
--

DROP TABLE IF EXISTS `tJuegos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tJuegos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `url_imagen` varchar(200) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `desarrolladora` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tJuegos`
--

LOCK TABLES `tJuegos` WRITE;
/*!40000 ALTER TABLE `tJuegos` DISABLE KEYS */;
INSERT INTO `tJuegos` VALUES
(1,'Outer Wilds','https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_switch_4/H2x1_NSwitch_OuterWilds_image1600w.jpg','Exploración','Mobius Digital'),
(2,'Clair Obscur: Expedition 33','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfAdO_EDIbPYYE4tsd7LoFpLUqbDHX77_ywA&s','RPG','Sandfall Interactive'),
(3,'Blue Prince','https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/1569580/header.jpg?t=1759164475','Puzzle','Dogubomb'),
(4,'Kenshi','https://shared.fastly.steamstatic.com/store_item_assets/steam/apps/233860/capsule_616x353.jpg?t=1750245202','RPG Gestión','Lo-Fi Games'),
(5,'Abiotic Factor','https://cdn.dlcompare.com/game_tetiere/upload/gameimage/file/abiotic-factor-tetiere-file-d7f82f27.jpg.webp','Survivor','Deep Field Games');
/*!40000 ALTER TABLE `tJuegos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tUsuarios`
--

DROP TABLE IF EXISTS `tUsuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tUsuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tUsuarios`
--

LOCK TABLES `tUsuarios` WRITE;
/*!40000 ALTER TABLE `tUsuarios` DISABLE KEYS */;
INSERT INTO `tUsuarios` VALUES
(1,'Esteban','CLiñares Barral','estebanliba@gmail.com','1111'),
(2,'Juan Manuel','Miguez Varela','juanmamiva@gmail.com','2222'),
(3,'Pedro','Cerredelo Prieto','pedrocp56@gmail.com','3333'),
(4,'Pablo','Sangó Rial','pablosari@gmail.com','4444'),
(5,'Yolanda','Liñares Barral','yolaliba@gmail.com','5555');
/*!40000 ALTER TABLE `tUsuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-13 10:16:47
