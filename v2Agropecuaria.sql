-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: appAgropecuaria
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `Actividad_agro`
--

DROP TABLE IF EXISTS `Actividad_agro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Actividad_agro` (
  `id_actividad_agro` int(11) NOT NULL AUTO_INCREMENT,
  `actividadAgro_nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_actividad_agro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Actividad_agro`
--

LOCK TABLES `Actividad_agro` WRITE;
/*!40000 ALTER TABLE `Actividad_agro` DISABLE KEYS */;
INSERT INTO `Actividad_agro` VALUES (1,'Pecuaria'),(2,'Agricola'),(3,'Ambiental'),(4,'ninguna');
/*!40000 ALTER TABLE `Actividad_agro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agricultor`
--

DROP TABLE IF EXISTS `agricultor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agricultor` (
  `idAgricultor` int(11) NOT NULL AUTO_INCREMENT,
  `PersonasAcargo` int(11) DEFAULT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idAgricultor`),
  KEY `idPersona` (`idPersona`),
  KEY `idPersona_2` (`idPersona`),
  CONSTRAINT `fk_Agricultor_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agricultor`
--

LOCK TABLES `agricultor` WRITE;
/*!40000 ALTER TABLE `agricultor` DISABLE KEYS */;
INSERT INTO `agricultor` VALUES (1,5,2),(2,21,3),(3,4,4),(4,4,5);
/*!40000 ALTER TABLE `agricultor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animales`
--

DROP TABLE IF EXISTS `animales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animales` (
  `idAnimales` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `raza` varchar(45) DEFAULT NULL,
  `nombre_vacunas` varchar(45) DEFAULT NULL,
  `cantidad_animales` int(11) DEFAULT NULL,
  `informacion` varchar(400) DEFAULT NULL,
  `idFinca` int(11) NOT NULL,
  PRIMARY KEY (`idAnimales`),
  KEY `idFinca` (`idFinca`),
  CONSTRAINT `fk_Animales_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animales`
--

LOCK TABLES `animales` WRITE;
/*!40000 ALTER TABLE `animales` DISABLE KEYS */;
/*!40000 ALTER TABLE `animales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_productiva`
--

DROP TABLE IF EXISTS `clase_productiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_productiva` (
  `id_clase_pro` int(11) NOT NULL AUTO_INCREMENT,
  `clase_nombre` varchar(30) NOT NULL,
  `id_actividad_agro` int(11) NOT NULL,
  PRIMARY KEY (`id_clase_pro`),
  KEY `clase_actividadagro` (`id_actividad_agro`),
  CONSTRAINT `clase_actividadagro` FOREIGN KEY (`id_actividad_agro`) REFERENCES `Actividad_agro` (`id_actividad_agro`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_productiva`
--

LOCK TABLES `clase_productiva` WRITE;
/*!40000 ALTER TABLE `clase_productiva` DISABLE KEYS */;
INSERT INTO `clase_productiva` VALUES (1,'Ganaderia',1),(2,'Caballar',1),(3,'Especies Menores',1),(4,'Agricola',2),(5,'Biogas',3),(6,'Mineria de Subsistencia',3),(7,'Educacion Ambiental',3),(8,'Reforestacion',3),(9,'Produccion de Plantulas',3),(15,'ninguna',4);
/*!40000 ALTER TABLE `clase_productiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corregimiento`
--

DROP TABLE IF EXISTS `corregimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corregimiento` (
  `idCorregimiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_corregimiento` varchar(45) DEFAULT NULL,
  `idMunicipio` int(11) NOT NULL,
  PRIMARY KEY (`idCorregimiento`),
  KEY `Municipio_idMunicipio` (`idMunicipio`),
  CONSTRAINT `corregAndMunicipio` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corregimiento`
--

LOCK TABLES `corregimiento` WRITE;
/*!40000 ALTER TABLE `corregimiento` DISABLE KEYS */;
INSERT INTO `corregimiento` VALUES (1,'Patía ',1),(2,'La Florida',1),(3,'Méndez ',1),(4,'El Estrecho',1),(5,'galindez',1),(6,'El puro ',1),(7,'Angulo ',1),(8,'Las tallas',1),(9,'Pan de azucar',1),(10,'santacruz',1),(11,'El placer',1),(12,'Santa rosa baja ',1),(13,'La mesa',1),(14,'Quebrada oscura',1),(15,'Bello horizonte',1),(16,'brisas',1),(17,'Don alonso',1),(18,'La fonda',1),(19,'El hoyo',1),(20,'Piedra sentada',1),(21,'sachamates',1),(22,'guayabal',1),(23,'versalles',1),(24,'El bordo ',1);
/*!40000 ALTER TABLE `corregimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `nombre_department` varchar(30) NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,1,'CAUCA');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finca`
--

DROP TABLE IF EXISTS `finca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finca` (
  `idFinca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_finca` varchar(45) DEFAULT NULL,
  `hectareas` float NOT NULL,
  `ab_agua` bit(1) NOT NULL,
  `e_electrica` bit(1) NOT NULL,
  `e_alternativas` bit(1) NOT NULL,
  `s_sanitario` bit(1) NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `registrador` int(11) DEFAULT NULL,
  `R_idPersona` int(11) NOT NULL,
  `id_linea_pro1` int(11) NOT NULL,
  `id_linea_pro2` int(11) NOT NULL,
  `id_linea_pro3` int(11) NOT NULL,
  `idAgricultor` int(11) NOT NULL,
  `id_Vereda` int(11) NOT NULL,
  PRIMARY KEY (`idFinca`),
  KEY `idAgricultor` (`idAgricultor`),
  KEY `id_Vereda` (`id_Vereda`),
  KEY `linea_pro_pro1` (`id_linea_pro1`),
  KEY `linea_prop_pro2` (`id_linea_pro2`),
  KEY `linea_pro_pro3` (`id_linea_pro3`),
  CONSTRAINT `finca_ibfk_1` FOREIGN KEY (`id_Vereda`) REFERENCES `vereda` (`id_vereda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Finca_Agricultor1` FOREIGN KEY (`idAgricultor`) REFERENCES `agricultor` (`idAgricultor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `linea_pro_pro1` FOREIGN KEY (`id_linea_pro1`) REFERENCES `linea_productiva` (`id_linea_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `linea_pro_pro3` FOREIGN KEY (`id_linea_pro3`) REFERENCES `linea_productiva` (`id_linea_pro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `linea_prop_pro2` FOREIGN KEY (`id_linea_pro2`) REFERENCES `linea_productiva` (`id_linea_pro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finca`
--

LOCK TABLES `finca` WRITE;
/*!40000 ALTER TABLE `finca` DISABLE KEYS */;
INSERT INTO `finca` VALUES (1,'el cementerio',24,'\0','','\0','',1.56585,-77.1121,'2021-05-05 22:19:44',1060806072,1,1,46,46,1,22),(2,'la floresta',13,'\0','\0','\0','\0',2.95912,-76.5524,'2021-05-05 22:19:41',1060806072,1,1,46,46,2,56),(3,'las piedras',4,'\0','\0','\0','\0',2.61287,-76.561,'2021-04-27 05:00:00',1060806072,1,28,46,46,4,24),(4,'los naranjos',2,'','','','',2.70593,-77.5618,'2021-05-06 05:00:00',NULL,1,25,24,46,4,31);
/*!40000 ALTER TABLE `finca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `idImagenes` int(11) NOT NULL AUTO_INCREMENT,
  `foto` mediumblob DEFAULT NULL,
  `idvisitas_fincas` int(11) NOT NULL,
  PRIMARY KEY (`idImagenes`),
  KEY `fk_Imagenes_visitas_fincas1` (`idvisitas_fincas`),
  CONSTRAINT `fk_Imagenes_visitas_fincas1` FOREIGN KEY (`idvisitas_fincas`) REFERENCES `visitas_fincas` (`idvisitas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linea_productiva`
--

DROP TABLE IF EXISTS `linea_productiva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linea_productiva` (
  `id_linea_pro` int(11) NOT NULL AUTO_INCREMENT,
  `linea_nombre` varchar(30) NOT NULL,
  `id_clase_pro` int(11) NOT NULL,
  PRIMARY KEY (`id_linea_pro`),
  KEY `linea_clasePro` (`id_clase_pro`),
  CONSTRAINT `linea_clasePro` FOREIGN KEY (`id_clase_pro`) REFERENCES `clase_productiva` (`id_clase_pro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linea_productiva`
--

LOCK TABLES `linea_productiva` WRITE;
/*!40000 ALTER TABLE `linea_productiva` DISABLE KEYS */;
INSERT INTO `linea_productiva` VALUES (1,'GANADERIA DOBLE PROPÓSITO',1),(2,'GANADERIA BUFALOS',1),(3,'CABALLO',2),(4,'MULAS',2),(5,'ASNOS',2),(6,'OVINOS Y CAPRINOS',3),(7,'PORCICULTURA',3),(8,'PISCICULTURA',3),(9,'CONEJOS',3),(10,'CUYES',3),(11,'POLLOS',3),(12,'GALLINAS',3),(13,'CODORNIZ',3),(14,'APICULTURA',3),(15,'CAÑA',4),(16,'LIMON TAHITI',4),(17,'LIMON PAJARITO',4),(18,'NARANJA',4),(19,'MANDARINA',4),(20,'CAFÉ',4),(21,'CACAO',4),(22,'LULO',4),(23,'AGUACATE',4),(24,'MANGO',4),(25,'GUANABANA',4),(26,'MARACUYA',4),(27,'PAPAYA',4),(28,'MELON',4),(29,'SANDIA',4),(30,'ZAPALLO',4),(31,'TOMATE DE ARBOL',4),(32,'MANI',4),(33,'PLATANO',4),(34,'BANANO',4),(35,'YUCA',4),(36,'MAIZ',4),(37,'TOMATE DE COCINA',4),(38,'CILANTRO',4),(39,'CEBOLLA',4),(40,'FRIJOL',4),(41,'BIOGAS',5),(42,'MINERIA DE SUBSISTENCIA',6),(43,'EDUCACION AMBIENTAL',7),(44,'REFORESTACION',8),(45,'PRODUCCION DE PLANTULAS',9),(46,'ninguna',15);
/*!40000 ALTER TABLE `linea_productiva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mncp` varchar(45) DEFAULT NULL,
  `id_departamento` int(11) NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `id_departamento` (`id_departamento`),
  CONSTRAINT `municipioANDdepartamento` FOREIGN KEY (`id_departamento`) REFERENCES `municipio` (`idMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Patia',1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(45) DEFAULT NULL,
  `segundo_nombre` varchar(45) DEFAULT NULL,
  `primer_apellido` varchar(45) DEFAULT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `tipo_identificacion` varchar(45) DEFAULT NULL,
  `num_identificacion` varchar(45) DEFAULT NULL,
  `sexo` char(45) DEFAULT NULL,
  `etnia` varchar(30) NOT NULL,
  `discapacidad` varchar(30) DEFAULT NULL,
  `fecha_ncm` date DEFAULT NULL,
  `nivel_escolaridad` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `fk_Persona_Usuario1` (`idUsuario`) USING BTREE,
  KEY `idUsuario` (`idUsuario`),
  KEY `idUsuario_2` (`idUsuario`),
  CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'julian','andres','calambas','ordonez','null','1060806070','M','Negro','no','1997-10-26','profesional','3135877553','julian971026@gmail.com','undefined','2021-05-10 03:03:51',1),(2,'jose','eddier','angulo','gomez','cedula_ciudadania','4735066','M','Ninguna',NULL,'1960-06-07','ninguna','3217628253','','undefined','2021-05-03 22:50:57',2),(3,'oscar','marino','angulo','','cedula_ciudadania','10516473','M','Indigena',NULL,'1943-12-24','primaria','3177942039','marino@gmail.com','undefined','2021-05-04 00:09:41',3),(4,'rosario','','flor','','cedula_ciudadania','75309876','F','Indigena',NULL,'1988-02-28','primaria','3214653421','','undefined','2021-05-05 20:53:17',4),(5,'ana','jimena','villaquiran','','cedula_ciudadania','75321453','F','Indigena',NULL,'1990-01-31','primaria','3135877553','','undefined','2021-05-05 21:03:39',5),(6,'daniel','fernando','caldono','perez','cedula_ciudadania','1043576943','M','Afrodescendiente',NULL,'2005-11-08','profesional','3214532365','daniel32p@gmail.com','undefined','2021-05-08 20:31:10',6);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantaciones`
--

DROP TABLE IF EXISTS `plantaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantaciones` (
  `idPlantaciones` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `vegetales_cantidad` int(11) DEFAULT NULL,
  `informacion` varchar(45) DEFAULT NULL,
  `idFinca` int(11) NOT NULL,
  PRIMARY KEY (`idPlantaciones`),
  KEY `fk_Plantaciones_Finca1` (`idFinca`),
  CONSTRAINT `fk_Plantaciones_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantaciones`
--

LOCK TABLES `plantaciones` WRITE;
/*!40000 ALTER TABLE `plantaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `plantaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'administrador'),(2,'tecnico'),(3,'agricultor');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnicos`
--

DROP TABLE IF EXISTS `tecnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnicos` (
  `idTecnico` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_estudio` varchar(45) DEFAULT NULL,
  `idPersona` int(11) NOT NULL,
  PRIMARY KEY (`idTecnico`),
  KEY `idPersona` (`idPersona`),
  CONSTRAINT `fk_Supervisor_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnicos`
--

LOCK TABLES `tecnicos` WRITE;
/*!40000 ALTER TABLE `tecnicos` DISABLE KEYS */;
INSERT INTO `tecnicos` VALUES (1,'ciencias de la computacion',1),(2,'ingenieria agropecuaria',6);
/*!40000 ALTER TABLE `tecnicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(100) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idRol` (`idRol`),
  KEY `idRol_2` (`idRol`),
  KEY `idRol_3` (`idRol`),
  CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'$2y$10$HqLu7UayfuqSQcfQfbDdieAwBjuA9ovXoD00kGr0sy/rP7nsjhYIe','tasks','ACTIVO',1),(2,'$2y$10$wnVz6f.n6Z8d8WV2jmVGaOoqPvaJVqk59Mrj7.Tuq/rG1NMMkA782','4735066','ACTIVO',3),(3,'53a3c6be2357c93bb61af2cdc909a121','10516473','ACTIVO',3),(4,'$2y$10$L4KjMZoqKPgyJfQG/4TdquX3WoTh8m3vwyq2OhiS9Cva4S5KUop7u','75309876','ACTIVO',3),(5,'$2y$10$IQFojs6UUrsbD2a52vCXI.amrr3BW6qtRK8OTiNVW2HhlNGjwyzFa','75321453','ACTIVO',3),(6,'$2y$10$Zpd7T28KU9P5gZFvrpZIVukxZJvShWxOZQNSUBnY6UT/.56ndxk4a','daniel12','ACTIVO',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vereda`
--

DROP TABLE IF EXISTS `vereda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vereda` (
  `id_vereda` int(11) NOT NULL AUTO_INCREMENT,
  `nombreVereda` varchar(30) NOT NULL,
  `corregimiento_id` int(11) NOT NULL,
  PRIMARY KEY (`id_vereda`),
  KEY `corregimiento_id` (`corregimiento_id`),
  CONSTRAINT `veredaANDcorregimiento` FOREIGN KEY (`corregimiento_id`) REFERENCES `corregimiento` (`idCorregimiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vereda`
--

LOCK TABLES `vereda` WRITE;
/*!40000 ALTER TABLE `vereda` DISABLE KEYS */;
INSERT INTO `vereda` VALUES (1,'Patia',1),(2,'El Carmelito',1),(3,'San Pedro',1),(4,'Potrerillo',1),(5,'Miraflores',1),(6,'Piedra de Moler',1),(7,'La Ventica',1),(8,'La Florida',2),(9,'Chondural',2),(10,'Méndez',3),(11,'Aguas Frías',3),(12,'El Tuno',3),(13,'El Pendal',3),(14,'Las Chulas',3),(15,'Guadualito',3),(16,'El Estrecho',4),(17,'El Cabuyo',4),(18,'La Marcela',4),(19,'La Manguita',4),(20,'Los Cajones',4),(21,'Galindez',5),(22,'Palo verde',5),(23,'El puro',6),(24,'El juncal',6),(25,'Manga falsa',6),(26,'La chorrera',6),(27,'Angulo',7),(28,'El rincón',7),(29,'Las tallas',8),(30,'Pan de azúcar',9),(31,'Puerto rico',9),(32,'Santacruz',10),(33,'El pedregal',10),(34,'El jardín',10),(35,'La esperanza',10),(36,'Las palmas',10),(37,'La despensa',10),(38,'El placer',11),(39,'El mirador',11),(40,'Floraria',11),(41,'San vicente',11),(42,'Betania',11),(43,'Alto bonito',11),(44,'Santa rosa baja',12),(45,'Alto rio sajandi',12),(46,'Santa rosa alta',12),(47,'El cucho',12),(48,'Tamboral',12),(49,'El porvenir',12),(50,'Remolino',12),(51,'La paramilla',12),(52,'Yarumal',12),(53,'La mesa',13),(54,'El cilindro',13),(55,'El crucero',13),(56,'La floresta',13),(57,'La colorada',13),(58,'Quebrada oscura',14),(59,'El limonar',14),(60,'La planada',14),(61,'Villa nueva',14),(62,'El trébol',14),(63,'Bello horizonte',15),(64,'El convenio',15),(65,'Brisas',16),(66,'Altamira',16),(67,'Guaico',16),(68,'Buena vista',16),(69,'La cristalina',16),(70,'Hueco lindo',16),(71,'Las perlas',16),(72,'Belen',16),(73,'Don Alonso',17),(74,'El hatico',17),(75,'El zarzal',17),(76,'Tuya es Colombia',17),(77,'La fonda',18),(78,'Alto bonito',18),(79,'Sajandi',18),(80,'Peña roja',18),(81,'El hoyo',19),(82,'Quintero',19),(83,'Saladito',19),(84,'El pedrero',19),(85,'Piedra sentada',20),(86,'La laguna',20),(87,'La paulina',20),(88,'Reyes',20),(89,'Corrales',20),(90,'Sachamates',21),(91,'Tabloncito',21),(92,'Guayabal',22),(93,'Guasimo',22),(94,'Versalles',23),(95,'El guanabano',23),(96,'El arbolito',24),(97,'La teja',24),(98,'Palomocho',24),(99,'Piedra rica',24),(100,'Chupadero',24),(101,'Guasimal',24),(102,'El estanquillo',24),(103,'Plan bonito',24);
/*!40000 ALTER TABLE `vereda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitas_fincas`
--

DROP TABLE IF EXISTS `visitas_fincas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitas_fincas` (
  `idvisitas` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `objetivoVisita` varchar(500) NOT NULL,
  `sistemasProduccion` varchar(500) NOT NULL,
  `situacionEncontrada` varchar(500) NOT NULL,
  `actividadRealizada` varchar(500) NOT NULL,
  `actividadPendientes` varchar(500) NOT NULL,
  `registrador_cedula` varchar(15) DEFAULT NULL,
  `R_idPersona` int(11) NOT NULL,
  `idFinca` int(11) NOT NULL,
  PRIMARY KEY (`idvisitas`),
  KEY `fk_visitas_fincas_Finca1` (`idFinca`),
  CONSTRAINT `fk_visitas_fincas_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas_fincas`
--

LOCK TABLES `visitas_fincas` WRITE;
/*!40000 ALTER TABLE `visitas_fincas` DISABLE KEYS */;
INSERT INTO `visitas_fincas` VALUES (1,'2021-05-05','Un dato es la representación de una vari','Un dato es la representación de una variable que p','Un dato es la representación de una variable que puede ser cuantitativa o cualitativa que indica un valor que se le asigna a las cosas y se representa a través de una secuencia de símbolos, números o letras','Un dato es la representación de una variable que puede ser cuantitativa o cualitativa que indica un valor que se le asigna a las cosas y se representa a través de una secuencia de símbolos, números o letras','Un dato es la representación de una variable que puede ser cuantitativa o cualitativa que indica un valor que se le asigna a las cosas y se representa a través de una secuencia de símbolos, números o letras','1060806072',1,2),(2,'2021-03-02','The National Aeronautics and Space Admin','The National Aeronautics and Space Administration ','The National Aeronautics and Space Administration is an independent agency of the U.S. federal government responsible for the civilian space program, as well as aeronautics and space research. NASA was established in 1958, succeeding the','The National Aeronautics and Space Administration is an independent agency of the U.S. federal government responsible for the civilian space program, as well as aeronautics and space research. NASA was established in 1958, succeeding the','The National Aeronautics and Space Administration is an independent agency of the U.S. federal government responsible for the civilian space program, as well as aeronautics and space research. NASA was established in 1958, succeeding the','1060806072',1,3),(3,'2021-05-04','recoleccion de datos','en espera','Posteriormente, su música fue unas veces denunciada como decadente y reaccionaria y otras alabada como representativa','Posteriormente, su música fue unas veces denunciada como decadente y reaccionaria y otras alabada como representativa','Posteriormente, su música fue unas veces denunciada como decadente y reaccionaria y otras alabada como representativa',NULL,1,3);
/*!40000 ALTER TABLE `visitas_fincas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-10  9:02:37
