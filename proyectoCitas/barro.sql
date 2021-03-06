-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: barro
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `cita`
--
CREATE DATABASE IF NOT EXISTS `barroSGG`;
USE `barroSGG`;
DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cita` (
  `codCita` int NOT NULL AUTO_INCREMENT,
  `fechaHora` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `codServicio` varchar(10) NOT NULL,
  PRIMARY KEY (`codCita`),
  KEY `fk_CITA_USUARIO1_idx` (`username`),
  KEY `fk_CITA_SERVICIO1_idx` (`codServicio`),
  CONSTRAINT `fk_CITA_SERVICIO1` FOREIGN KEY (`codServicio`) REFERENCES `servicio` (`codServicio`),
  CONSTRAINT `fk_CITA_USUARIO1` FOREIGN KEY (`username`) REFERENCES `usuario` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (1,'2020-08-11 17:00:00','cmccaguef','ne30'),(2,'2020-05-25 10:00:00','jjowle8','ne30'),(3,'2020-03-16 11:30:00','cmccaguef','he20'),(4,'2020-10-19 19:00:00','csickertg','ne30'),(5,'2020-05-17 18:30:00','hharsneph','he20'),(6,'2020-07-22 14:00:00','ksilcocks0','pm21'),(7,'2020-04-16 15:30:00','pbool5','he20'),(8,'2020-08-09 17:00:00','ksilcocks0','pj22'),(9,'2020-07-19 12:30:00','csickertg','pm21'),(10,'2020-08-09 14:00:00','tspoffordd','is24'),(11,'2020-06-11 11:00:00','bscreechj','pm21'),(12,'2019-11-06 18:30:00','msommerlin9','he20'),(13,'2020-08-19 19:30:00','msommerlin9','he20'),(14,'2020-06-03 17:00:00','tspoffordd','pm21'),(15,'2020-04-26 18:00:00','bruddiforthc','pm21'),(16,'2020-03-18 13:30:00','knacci1','pm21'),(17,'2020-03-18 12:00:00','rgauvini','is24'),(18,'2020-01-26 18:30:00','hharsneph','ne30'),(19,'2020-04-20 19:00:00','csickertg','pj22'),(20,'2019-11-22 12:00:00','msommerlin9','ne30'),(22,'2020-10-14 12:30:00','cmccaguef','pm21'),(23,'2020-10-21 14:30:00','cmccaguef','pj22');
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datosempresa`
--

DROP TABLE IF EXISTS `datosempresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datosempresa` (
  `cif` varchar(15) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `logo` varchar(50) NOT NULL,
  PRIMARY KEY (`cif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datosempresa`
--

LOCK TABLES `datosempresa` WRITE;
/*!40000 ALTER TABLE `datosempresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `datosempresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `codRol` int NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`codRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'usuario'),(2,'administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio` (
  `codServicio` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codServicio`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES ('he20','Hechizos','Los hechizos de la bruja'),('is24','Impotencia Sexual','En la cama eres malisimo'),('ne30','Negocios','Te va fatal en los negocios'),('pj22','Problemas Judiciales','Problemas con la justicia'),('pm21','Problemas Matrimoniales','Problemas con la parienta');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `correoElectronico` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `codRol` int NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `corrreoElectronico_UNIQUE` (`correoElectronico`),
  KEY `fk_USUARIO_ROL_idx` (`codRol`),
  CONSTRAINT `fk_USUARIO_ROL` FOREIGN KEY (`codRol`) REFERENCES `rol` (`codRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('barro96rt','Passw0rd1234','Barro','Ramirez','Perez','barro@barro.com','8283582582',2),('bruddiforthc','eRZBXo','Beitris','Ianilli','Ruddiforth','bruddiforthc@amazon.de','7344278475',1),('bscreechj','PPvI9LdpRWCi','Bronny','Molden','Screech','bscreechj@cloudflare.com','6112712467',1),('ckinsey3','mtwS1HJXCmgP','Chip','Fuente','Kinsey','ckinsey3@elpais.com','7944403502',1),('cmccaguef','d46rJUcyS4V','Cordula','McElmurray','McCague','cmccaguef@soup.io','2967885814',1),('csickertg','Dodj2y78v','Curtis','Mustin','Sickert','csickertg@cargocollective.com','1561317712',1),('dbaggally4','0koA5eQJbZ5x','Deidre','Middleweek','Baggally','dbaggally4@sbwire.com','3463006034',1),('ekeddle2','bYy15EyC8','Eamon','Ronnay','Keddle','ekeddle2@msn.com','3097933392',1),('fberlingb','3qnJafovQUI','Felicle','Boik','Berling','fberlingb@simplemachines.org','1559661051',1),('hharsneph','lr8g8NbIR','Hilario','Jeste','Harsnep','hharsneph@bluehost.com','2067407377',1),('ichilcotte6','chCr2L28BEQ4','Immanuel','Gumery','Chilcotte','ichilcotte6@netscape.com','6124399505',1),('jjowle8','71y1ZJmlhd','Jasper','Androck','Jowle','jjowle8@cnn.com','8518517501',1),('knacci1','WxaNPKO77fP0','Kerrie','Jzak','Nacci','knacci1@miibeian.gov.cn','6442745223',1),('ksilcocks0','UzYmnHsj','Kiley','Beinke','Silcocks','ksilcocks0@go.com','3449844325',1),('msommerlin9','85aLLX0PSh','Michal','Whitwham','Sommerlin','msommerlin9@va.gov','7684546033',1),('pacopicapiedra','1234','paco','picapiedra','perez','paco@paco.com','600345678',1),('pbool5','XIOIxEZinSNH','Pernell','Maypother','Bool','pbool5@businesswire.com','4065784730',1),('rgauvini','0Rspu4jUNZn6','Randy','Bengal','Gauvin','rgauvini@bbc.co.uk','9173503559',1),('rprangnella','ppl1ap3','Rhody','Strettle','Prangnell','rprangnella@chron.com','6634653352',1),('tlovstrome','mcawiLjOcgi','Tannie','McQuorkel','Lovstrom','tlovstrome@youtu.be','5587776908',1),('tspoffordd','fZu0reNQLSTw','Townie','Roast','Spofford','tspoffordd@jugem.jp','9569196510',1),('zlegrand7','zV1Y5ITsnS','Zena','de Voiels','Legrand','zlegrand7@whitehouse.gov','8273246644',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-30  9:09:40
