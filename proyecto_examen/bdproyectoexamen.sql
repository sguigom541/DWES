-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: proyectoexamen
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
-- Current Database: `proyectoexamen`
--

CREATE DATABASE IF NOT EXISTS `sggproyectoexamen`; /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sggproyectoexamen`;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `dni` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) NOT NULL,
  `fechaNac` date NOT NULL,
  `fotoUsuario` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES ('05902926E','2081','Inmaculada','Jimenez','Jaen','1999-03-16',''),('21326979E','nWo9et7jep7u','Jacinto','Ochando','Fresneda','1988-02-13',''),('27855841N','wxKa9QamL3eH','Nahuel','Martin','Villamonte','1995-03-22',''),('34634068R','kZSxVjsEGvTm','Manuel','Valenzuela','Lopez','1985-06-20',''),('50650500S','1hKCOydZ844Y','Dario','Cruz','Perez','1993-02-15',''),('50663077B','d5XSEe945g3n','Francisco','Martinez','Perez','1990-03-20',''),('58388030T','eaCkQmpUgHG8','Marcos','Lopez','Fernandez','1997-02-15',''),('77369541W','YwS95V5CjejR','Sergio','Guil','Gomez','1996-06-21',''),('85972027M','zEw9WFDLmNPp','Laura','Jimenez','Gutierrez','1996-05-20',''),('93859332N','AM6PTGZjFc24','Maria','Fernandez','Martinez','1989-04-19','');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_realiza_examen`
--

DROP TABLE IF EXISTS `alumno_realiza_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_realiza_examen` (
  `dni` varchar(20) NOT NULL,
  `codExamen` varchar(20) NOT NULL,
  `fechaHoraComienzo` datetime NOT NULL,
  `fechaHoraFin` datetime DEFAULT NULL,
  `respuesta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`dni`,`codExamen`),
  KEY `fk_ALUMNO_has_EXAMEN_EXAMEN1_idx` (`codExamen`),
  KEY `fk_ALUMNO_has_EXAMEN_ALUMNO1_idx` (`dni`),
  CONSTRAINT `fk_ALUMNO_has_EXAMEN_ALUMNO1` FOREIGN KEY (`dni`) REFERENCES `alumno` (`dni`),
  CONSTRAINT `fk_ALUMNO_has_EXAMEN_EXAMEN1` FOREIGN KEY (`codExamen`) REFERENCES `examen` (`codExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_realiza_examen`
--

LOCK TABLES `alumno_realiza_examen` WRITE;
/*!40000 ALTER TABLE `alumno_realiza_examen` DISABLE KEYS */;
INSERT INTO `alumno_realiza_examen` VALUES ('05902926E','examT2','2020-11-20 03:14:57','2020-11-20 03:18:05','BBDC ');
/*!40000 ALTER TABLE `alumno_realiza_examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examen` (
  `codExamen` varchar(20) NOT NULL,
  `fechaHoraComienzo` datetime NOT NULL,
  `fechaHoraFin` datetime NOT NULL,
  `duracion` time NOT NULL,
  PRIMARY KEY (`codExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES ('examT1','2020-11-20 11:00:00','2020-11-21 23:57:00','00:45:00'),('examT2','2020-11-19 22:00:00','2020-11-22 10:30:00','00:30:00'),('examT3','2020-11-14 20:20:00','2020-11-14 22:00:00','00:30:00');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen_tiene_pregunta`
--

DROP TABLE IF EXISTS `examen_tiene_pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examen_tiene_pregunta` (
  `codExamen` varchar(20) NOT NULL,
  `codPregunta` varchar(20) NOT NULL,
  `ordenPregunta` int NOT NULL,
  PRIMARY KEY (`codExamen`,`codPregunta`),
  KEY `fk_EXAMEN_has_PREGUNTA_PREGUNTA1_idx` (`codPregunta`) /*!80000 INVISIBLE */,
  KEY `fk_EXAMEN_has_PREGUNTA_EXAMEN1_idx` (`codExamen`),
  CONSTRAINT `fk_EXAMEN_has_PREGUNTA_EXAMEN1` FOREIGN KEY (`codExamen`) REFERENCES `examen` (`codExamen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_EXAMEN_has_PREGUNTA_PREGUNTA1` FOREIGN KEY (`codPregunta`) REFERENCES `pregunta` (`codPregunta`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen_tiene_pregunta`
--

LOCK TABLES `examen_tiene_pregunta` WRITE;
/*!40000 ALTER TABLE `examen_tiene_pregunta` DISABLE KEYS */;
INSERT INTO `examen_tiene_pregunta` VALUES ('examT1','1INF',1),('examT1','2INF',2),('examT1','3INF',3),('examT1','4INF',4),('examT1','5INF',5),('examT2','3INF',1),('examT2','4INF',2),('examT2','7INF',3),('examT2','8INF',4),('examT2','9INF',5),('examT3','2INF',4),('examT3','4INF',5),('examT3','5INF',1),('examT3','6INF',2),('examT3','7INF',3);
/*!40000 ALTER TABLE `examen_tiene_pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pregunta` (
  `codPregunta` varchar(20) NOT NULL,
  `enunciado` varchar(500) NOT NULL,
  `respuesta1` varchar(100) NOT NULL,
  `respuesta2` varchar(100) NOT NULL,
  `respuesta3` varchar(100) NOT NULL,
  `respuesta4` varchar(100) NOT NULL,
  `respuestaCorrecta` varchar(100) NOT NULL,
  PRIMARY KEY (`codPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES ('10INF','El sistema de archivos NTFS lo podemos encontrar en sistemas operativos tales como:','A. Windows NT, Windows 7 y Windows 10.','B. Windows XP, Windows 7 y Windows Vista.','C. Windows XP, Windows 7 y Windows 2008.','D. Windows NT, Windows 7 y Windows 2008.','A'),('11INF','Aunque son posibles tamaños mayores, el máximo recomendado en la práctica para cada volumen NTFS es de:','A. 16 TB','B. 2 PB','C. 4 GB','D. 2 TB','D'),('12INF','Podemos definir el término software como:','A. El conjunto de dispositivos físicos que forman un sistema operativo.','B. El conjunto de dispositivos lógicos que forman un sistema informático.','C. El conjunto de dispositivos lógicos que forman un sistema operativo.','D. El conjunto de dispositivos físicos que forman un sistema informático.','B'),('13INF','Son aplicaciones de software libre:','A. Writer de OpenOffice, SnagIt, Apache, BitChe y VirtualBox.','B. Writer de OpenOffice, Firefox, Apache, BitChe y VirtualBox.','C. Writer de OpenOffice, Firefox, Apache, VMware Workstation y VirtualBox.','D. Writer de OpenOffice, Firefox, UltraISO, BitChe y VirtualBox.','B'),('14INF','Los siguientes son sistemas operativos:','A. Windows 2.0, Linux, Symbian y OS X.','B. Windows 2000, Linux, MSDOS y OS IX.','C. Windows 2012, Linux, Android y OS X.','D. Windows 10, Linux, Android y OS IX.','D'),('15INF','La información contenida en un soporte puede ser accedida...','A. de forma secuencial y directa.','B. de forma secuencial e indirecta.','C. de forma directa e indirecta.','D. de forma secuencial y transversal.','A'),('16INF','Las carpetas compartidas del invitado:','A. No tienen por qué estar compartidas en el host.','B. Dejan de estar accesibles por el host.','C. Sólo pueden montarse para lectura.','D. Deben estar previamente compartidas en el host.','A'),('17INF','En una máquina virtual puedo añadir hasta...','A. 32 dispositivos IDE en 8 controladoras IDE.','B. 16 dispositivos IDE en 4 controladoras IDE.','C. 8 dispositivos IDE en 2 controladoras IDE.','D. 4 dispositivos IDE en 1 controladora IDE.','D'),('18INF','Al importar un servicio virtualizado en VirtualBox:','A. Estamos valorando una máquina virtual creada en otro sistema informático','B. Estamos recibiendo una máquina virtual creada en otro sistema informático.','C. Estamos copiando una máquina virtual creada en otro sistema informático.','D. Estamos configurando una máquina virtual creada en otro sistema informático.','B'),('19INF','En una conexión a redes de tipo bridged:','A. La máquina virtual tiene su propia MAC y la misma puerta de enlace que el host.','B. La máquina virtual tiene su propia IP y diferente puerta de enlace que el anfitrión.','C. La máquina virtual tiene su propia IP y la misma puerta de enlace que el anfitrión.','D. La máquina virtual comparte IP con el host y la misma puerta de enlace que el anfitrión.','C'),('1INF','Una imagen ISO es...','A. un archivo donde se almacena una copia exacta de un sistema de ficheros.de ficheros.','B. un disco donde se almacena una copia exacta de un sistema de ficheros.','C. un disco donde se almacena una copia comprimida de un sistema de ficheros.','D. un archivo donde se almacena una copia comprimida de un sistema de ficheros.','A'),('20INF','Una controladora SATA en VirtualBox:','A. Permite añadir hasta 6 dispositivos de almacenamiento.','B. Permite añadir cuantos dispositivos de almacenamiento necesitemos.','C. Permite añadir hasta 4 dispositivos de almacenamiento.','D. Permite añadir hasta 8 dispositivos de almacenamiento.','B'),('2INF','Los diferentes compresores de archivos...','A. utilizan algoritmos de comprensión destructivos con imágenes y no destructivos con textos','B. utilizan algoritmos de comprensión poco destructivos.','C. utilizan algoritmos de comprensión no destructivos.','D. utilizan algoritmos de comprensión mínimamente destructivos.','A'),('3INF','Las siguientes son aplicaciones para capturar pantallas:','A. SnagIt, GreenShot, Recortes y AutoPlay.','B. SnagIt, GreenShot, Recortes y Camtasia.','C. SnagIt, GreenShot, Recortes y Atube Catcher.','D. SnagIt, Take-a-Photo, Recortes y Camtasia.','B'),('4INF','Un archivo de imagen ISO comprime el contenido original en un...','A. 0%','B. 25%','C. 50%','D. 75%','B'),('5INF','¿Cuál es la alternativa, de pago, al códec XviD?','A. XvidD Lite','B. MP4viD','C. DivX','D. XviD Pro','C'),('6INF','Los principales tipos de copia de seguridad son:','A. Completa, Integral y Diaria.','B. Completa, Integral y Diferencial.','C. Máxima, Mínima y Diferencial.','D. Inicial, diaria y semanal.','B'),('7INF','Un sistema operativo ocupa la capa...','A. más próxima al software del sistema operativo.','B. más próxima al software del sistema informático.','C. más próxima al hardware del sistema operativo.','D. más próxima al hardware del sistema informático.','D'),('8INF','Al instalar un nuevo driver...','A. añadimos una aplicación por debajo de la capa del sistema operativo.','B. añadimos una aplicación por encima de la capa del sistema operativo.','C. añadimos una aplicación a la capa de sistema operativo.','D. nos quedamos tan a gusto.','B'),('9INF','¿El software libre es gratuito?','A. La libertad siempre tiene un precio, por lo tanto, el software libre no es gratuito.','B. Por supuesto. La palabra libre lo dice bien claro.','C. Si es libre es gratuito porque el autor así lo ha estimado oportuno.','D. Es libre su código, pero no tiene por qué ser gratuita su adquisición.','D');
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-20  3:25:26
