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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agricultor`
--

LOCK TABLES `agricultor` WRITE;
/*!40000 ALTER TABLE `agricultor` DISABLE KEYS */;
INSERT INTO `agricultor` VALUES (2,12,5),(3,10,6),(4,10,7),(5,12,11);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animales`
--

LOCK TABLES `animales` WRITE;
/*!40000 ALTER TABLE `animales` DISABLE KEYS */;
INSERT INTO `animales` VALUES (1,'gallinas','ponedoras','0',32,'0',8),(2,'gallinas','cariocas','no',1232,'gallinas pnedoras, de cria',10),(3,'vacas','nuevo proposito','cd12',2,'clima calido',8);
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
  `registrador` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finca`
--

LOCK TABLES `finca` WRITE;
/*!40000 ALTER TABLE `finca` DISABLE KEYS */;
INSERT INTO `finca` VALUES (1,'la cruz',1,'','\0','','',2.6063,-76.5627,'2021-03-23 02:21:24',12345678,2,46,46,4,16),(3,'villa del oeste',5,'\0','\0','\0','\0',2.6063,-76.5627,'2021-02-18 22:58:23',12345678,2,20,15,4,9),(4,'villa del sur',1,'\0','','\0','\0',2.60552,-76.561,'2021-02-27 02:39:33',12345678,12,46,46,3,9),(5,'villa',123,'','','\0','\0',2.60552,-76.561,'2021-02-27 02:41:11',12345678,2,46,46,4,3),(6,'naranjos',3,'\0','\0','','\0',2.60552,-76.561,'2021-02-27 02:40:14',12345678,2,46,46,4,9),(8,'la pinta',1,'\0','\0','\0','\0',2.62207,-76.5716,'2021-03-14 19:39:31',12345678,25,26,46,3,31),(9,'la pista',2,'','','\0','\0',2.60654,-76.5626,'2021-02-27 02:38:44',1060803819,12,46,46,3,11),(10,'vellatrix',1,'','','','\0',2.615,-76.5627,'2021-03-16 16:44:54',1060803819,32,46,46,5,28),(11,'napoles',1,'\0','\0','','',2.62207,-76.5716,'2021-03-22 22:41:05',12345678,25,26,46,3,31),(12,'vallestero',12,'','\0','','',2.62207,-76.5716,'2021-03-23 02:30:39',12345678,10,27,25,3,31),(13,'la  vega',3,'','\0','','',2.66607,-76.7164,'2021-04-05 15:38:22',12345678,28,46,46,4,13),(14,'la cruz',1,'','\0','','',2.6063,-76.5627,'2021-03-24 13:59:22',12345678,2,46,46,4,16);
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
  `discapacidad` varchar(30) NOT NULL,
  `fecha_ncm` date DEFAULT NULL,
  `nivel_escolaridad` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `fk_Persona_Usuario1` (`idUsuario`) USING BTREE,
  KEY `idUsuario` (`idUsuario`),
  KEY `idUsuario_2` (`idUsuario`),
  CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (2,'julian','andres','calambas','ordonez','cedula_ciudadania','1060806072','M','0','no','1997-10-26','profesional','3135877553','julian971026@gmail.com','','2020-12-19 16:05:54',3),(5,'fernanda','camila','rivas','sanchez','cedula_ciudadania','1070806043','F','Indigena','no','2005-11-02','bachiller','3116083063','fercha@gmail.com','','2021-01-11 14:39:25',6),(6,'rosario','','flor','','cedula_ciudadania','2323432','F','Afrocolombiano','no','1993-01-31','bachiller','312123233434','rosa@gmail.com','','2021-01-13 19:49:56',8),(7,'Cesar','Camilo','Sanchez','','cedula_ciudadania','12044734823','M','Ninguna','no','2005-12-31','bachiller','32333833','cesae@gmail.com','','2021-01-24 15:51:41',9),(8,'admin','','admin','','cedula_ciudadania','12345678','M','Mulato','no','1990-12-12','primaria','32333833','','','2021-02-21 17:59:04',1),(9,'julian','andres','vasquez','fuentes','cedula_cafetera','1060750442','M','Indigena','si','2005-12-08','primaria','3135877553','juancaor1997@gmail.com','','2021-02-19 23:33:38',10),(10,'julian','andres','calambas','ordonez','cedula_ciudadania','1060803819','M','Mulato','no','2000-10-31','profesional','3156765432','juli@outlook.com','','2021-02-21 20:54:24',11),(11,'teresa','','sanchez','','cedula_ciudadania','12213232323','F','Indigena','no','2005-05-12','primaria','3212323232','teresa@gmail.com','','2021-03-14 00:39:41',12),(12,'homero','bart','simpson','simpson','cedula','3.141592653589793238',NULL,'negro','no','1994-12-12','segundaria','3042123212','homeroSimpson@outlook.com','','2021-03-22 16:37:23',30),(13,'bastidas','bart','simpson','simpson','null','3.141592653589793238','M','Afrodescendiente','si','1994-12-12','tecnico','3042123212','homeroSimpson@outlook.com','','2021-03-22 20:11:06',28),(15,'betelgus','best','simpson','simpson','cedula','3.14159265358979','M','negro','no','1994-12-12','segundaria','3042123212','homeroSimpson@outlook.com','','2021-03-22 20:16:38',27),(16,'1212','11111','11111','1111','cedula_ciudadania','1111111111','M','Mulato','no','2005-12-14','primaria','111111111','1211@gmial.com','','2021-03-31 15:49:02',36),(17,'danilo','andres','vasquez','ordonez','cedula_ciudadania','1060700564','M','Negro','no','2005-11-06','profesional','3145435436','danilo123@outlook.com','','2021-04-07 22:29:03',37);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantaciones`
--

LOCK TABLES `plantaciones` WRITE;
/*!40000 ALTER TABLE `plantaciones` DISABLE KEYS */;
INSERT INTO `plantaciones` VALUES (1,'zanahoria','ortaliza',3223,'clima frio',8),(2,'zanahoria','ortaliza',12,'de  clima frio,  buenas practicas',10);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnicos`
--

LOCK TABLES `tecnicos` WRITE;
/*!40000 ALTER TABLE `tecnicos` DISABLE KEYS */;
INSERT INTO `tecnicos` VALUES (3,'matematicas',9),(4,'ingeniero de sistemas',10),(5,'ingeniero',9);
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'08c2972134a06141166d5cb9796ec699','admin123','ACTIVO',1),(3,'5d05faa3b041d3dad0b0cb837eb3c2a3','1060806072','ACTIVO',1),(6,'36d5ee968cb66f91161dae6711a24bf1','1070806043','ACTIVO',3),(7,'97f4cbb5c77018654bde74a10d4bdc6a','2534523','ACTIVO',3),(8,'b929f326ef7c21dacc34fa2a3046290d','2323432','ACTIVO',3),(9,'81b86f2d6fb45913e9d39796acfd9df9','12044734823','ACTIVO',3),(10,'fcea920f7412b5da7be0cf42b8c93759','ss','INACTIVO',2),(11,'08c2972134a06141166d5cb9796ec699','julian1026','ACTIVO',2),(12,'4bd82ed342d081a0d7cd1c2f61d3d171','12213232323','ACTIVO',3),(13,NULL,NULL,NULL,1),(15,'12345645','camilaOrdonez','ACTIVO',1),(16,'12345645','camilaCalambas','ACTIVO',1),(17,'12345678','house','ACTIVO',1),(18,'123456789','task','ACTIVO',2),(19,'1234','wife','ACTIVO',1),(20,'123456789','main','ACTIVO',1),(21,'122345','boy','ACTIVO',2),(22,'IloveatMyHusband','mother','ACTIVO',1),(23,'34567','funny','ACTIVO',2),(24,'rest123','jimena','ACTIVO',1),(25,'122345','1415926535','ACTIVO',2),(26,'rest123','14159265358979','ACTIVO',1),(27,'thing','1415926535897932','INACTIVO',1),(28,'705d29525f15a830d5e8478ed42305e3','blue','ACTIVO',1),(30,'81dc9bdb52d04dc20036dbd8313ed055','blue1','ACTIVO',1),(31,'827ccb0eea8a706c4c34a16891f84e7b','blue2','ACTIVO',1),(32,'827ccb0eea8a706c4c34a16891f84e7b','danger','ACTIVO',1),(33,'goku','goku','ACTIVO',2),(34,'02efe92bc3b0943b8137c4a4b47ece48','goku1','ACTIVO',2),(35,'ca3d236f573ba14aec9f5a4571263e55','danielFelipe','ACTIVO',2),(36,'e10adc3949ba59abbe56e057f20f883e','danielfelipe','ACTIVO',1),(37,'$2y$10$HqLu7UayfuqSQcfQfbDdieAwBjuA9ovXoD00kGr0sy/rP7nsjhYIe','tasks','ACTIVO',1);
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
  `registrador_cedula` varchar(15) NOT NULL,
  `idFinca` int(11) NOT NULL,
  PRIMARY KEY (`idvisitas`),
  KEY `fk_visitas_fincas_Finca1` (`idFinca`),
  CONSTRAINT `fk_visitas_fincas_Finca1` FOREIGN KEY (`idFinca`) REFERENCES `finca` (`idFinca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitas_fincas`
--

LOCK TABLES `visitas_fincas` WRITE;
/*!40000 ALTER TABLE `visitas_fincas` DISABLE KEYS */;
INSERT INTO `visitas_fincas` VALUES (6,'2021-03-29','entrega ','Este encantador formulario \n','Este encantador formulario de contacto es la mejor opción para que todos Tus sitios web agreguen un glamour especial. Este fabuloso formulario de contacto está especialmente diseñado para tu sección de contacto de tu sitio web que tiene un atractivo fondo de imagen en el que tiene contenido de','Este encantador formulario de contacto es la mejor opción para que todos Tus sitios web agreguen un glamour especial. Este fabuloso formulario de contacto está especialmente diseñado para tu sección de contacto de tu sitio web que tiene un atractivo fondo de imagen en el que tiene contenido de','Este encantador formulario de contacto es la mejor opción para que todos Tus sitios web agreguen un glamour especial. Este fabuloso formulario de contacto está especialmente diseñado para tu sección de contacto de tu sitio web que tiene un atractivo fondo de imagen en el que tiene contenido de','12345678',14);
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

-- Dump completed on 2021-04-07 21:32:41
