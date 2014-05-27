-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: ddhhdb
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autoridades`
--

DROP TABLE IF EXISTS `autoridades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoridades` (
  `id_autoridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_autoridad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades`
--

LOCK TABLES `autoridades` WRITE;
/*!40000 ALTER TABLE `autoridades` DISABLE KEYS */;
INSERT INTO `autoridades` VALUES (1,'Patrulla Fronteriza');
/*!40000 ALTER TABLE `autoridades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoridades2denuncias`
--

DROP TABLE IF EXISTS `autoridades2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoridades2denuncias` (
  `id_autoridad` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades2denuncias`
--

LOCK TABLES `autoridades2denuncias` WRITE;
/*!40000 ALTER TABLE `autoridades2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `autoridades2denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoridades_responables2denuncias`
--

DROP TABLE IF EXISTS `autoridades_responables2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoridades_responables2denuncias` (
  `id_autoridad` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades_responables2denuncias`
--

LOCK TABLES `autoridades_responables2denuncias` WRITE;
/*!40000 ALTER TABLE `autoridades_responables2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `autoridades_responables2denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncias`
--

DROP TABLE IF EXISTS `denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denuncias` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `numero_queja` varchar(255) DEFAULT NULL,
  `fecha_creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_lugar_denuncia` varchar(255) DEFAULT NULL,
  `id_tipo_queja` int(11) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `motivo_migracion` varchar(255) DEFAULT NULL,
  `viaja_solo` tinyint(1) DEFAULT NULL,
  `con_quien_viaja` varchar(255) DEFAULT NULL,
  `deportado` tinyint(1) DEFAULT NULL,
  `momento_deportado` varchar(255) DEFAULT NULL,
  `separacion_familiar` tinyint(1) DEFAULT NULL,
  `familiar_separado` varchar(255) DEFAULT NULL,
  `situacion_familiar` varchar(255) DEFAULT NULL,
  `acto_siguiente` varchar(255) DEFAULT NULL,
  `dano_autoridad` tinyint(1) DEFAULT NULL,
  `id_autoridad_dano` int(11) DEFAULT NULL,
  `coyote_guia` tinyint(1) DEFAULT NULL,
  `tiempo_contrato_coyote` varchar(255) DEFAULT NULL,
  `monto_coyote` varchar(255) DEFAULT NULL,
  `conocimineto_punto_fronterizo` tinyint(1) DEFAULT NULL,
  `nombre_punto_fronterizo` varchar(255) DEFAULT NULL,
  `lugar_de_usa` varchar(255) DEFAULT NULL,
  `fecha_injusticia` timestamp NULL DEFAULT NULL,
  `hora_injusticia` varchar(255) DEFAULT NULL,
  `municipio_injusticia` varchar(255) DEFAULT NULL,
  `id_estado_injusticia` int(11) DEFAULT NULL,
  `id_pais_injusticia` int(11) DEFAULT NULL,
  `espacio_fisico_injusticia` varchar(255) DEFAULT NULL,
  `detonante_injusticia` varchar(255) DEFAULT NULL,
  `migrantes_injusticia` tinyint(1) DEFAULT NULL,
  `numero_migrantes_injusticia` int(11) DEFAULT NULL,
  `id_transporte_viaje_injusticia` int(11) DEFAULT NULL,
  `lugar_abordaje_transporte` varchar(255) DEFAULT NULL,
  `destino_transporte` varchar(255) DEFAULT NULL,
  `numero_oficiales_responsables` varchar(255) DEFAULT NULL,
  `algun_nombre_responsables` varchar(255) DEFAULT NULL,
  `apodos_responsables` varchar(255) DEFAULT NULL,
  `color_uniforme_responsables` varchar(255) DEFAULT NULL,
  `insignias_responsables` varchar(255) DEFAULT NULL,
  `responsables_abordo_vehiculos_responsables` tinyint(1) DEFAULT NULL,
  `id_tipo_transporte_responsables` int(11) DEFAULT NULL,
  `numero_vehiculos_responsables` int(11) DEFAULT NULL,
  `placas_vehiculos_responsables` varchar(45) DEFAULT NULL,
  `descripcion_evento` text,
  `monto_extorsion` varchar(255) DEFAULT NULL,
  `id_estado_caso` int(11) DEFAULT NULL,
  `estado_seguimiento` varchar(255) DEFAULT NULL,
  `nombre_persona_atendio_seguimiento` varchar(255) DEFAULT NULL,
  `descripcion_seguimiento` varchar(255) DEFAULT NULL,
  `telefono_seguimiento` varchar(45) DEFAULT NULL,
  `documento1_seguimiento` varchar(255) DEFAULT NULL,
  `documento2_seguimiento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_denuncia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncias`
--

LOCK TABLES `denuncias` WRITE;
/*!40000 ALTER TABLE `denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `derechos`
--

DROP TABLE IF EXISTS `derechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `derechos` (
  `id_derecho` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_derecho`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `derechos`
--

LOCK TABLES `derechos` WRITE;
/*!40000 ALTER TABLE `derechos` DISABLE KEYS */;
INSERT INTO `derechos` VALUES (1,'Derecho a la Libertad Personal');
/*!40000 ALTER TABLE `derechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `derechos_violados2denuncias`
--

DROP TABLE IF EXISTS `derechos_violados2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `derechos_violados2denuncias` (
  `id_derecho` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `derechos_violados2denuncias`
--

LOCK TABLES `derechos_violados2denuncias` WRITE;
/*!40000 ALTER TABLE `derechos_violados2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `derechos_violados2denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_civil`
--

LOCK TABLES `estado_civil` WRITE;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` VALUES (1,'Soltera(o)'),(2,'Casada(o)'),(3,'Viuda(o)'),(4,'Unión libre'),(5,'Divorciada(o)'),(6,'Otro');
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Aguascalientes',1),(2,'Baja California',1),(3,'Baja California Sur',1),(4,'Campeche',1),(5,'Coahuila',1),(6,'Colima',1),(7,'Chiapas',1),(8,'Chihuahua',1),(9,'Distrito Federal',1),(10,'Durango',1),(11,'Guanajuato',1),(12,'Guerrero',1),(13,'Hidalgo',1),(14,'Jalisco',1),(15,'Edo. De México',1),(16,'Michoacán',1),(17,'Morelos',1),(18,'Nayarit',1),(19,'Nuevo León',1),(20,'Oaxaca',1),(21,'Puebla',1),(22,'Querétaro',1),(23,'Quintana Roo',1),(24,'San Luis Potosí',1),(25,'Sinaloa',1),(26,'Sonora',1),(27,'Tabasco',1),(28,'Tamaulipas',1),(29,'Tlaxcala',1),(30,'Veracruz',1),(31,'Yucatán',1),(32,'Zacatecas',1);
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etados_casos`
--

DROP TABLE IF EXISTS `etados_casos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etados_casos` (
  `id_estado_caso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estado_caso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etados_casos`
--

LOCK TABLES `etados_casos` WRITE;
/*!40000 ALTER TABLE `etados_casos` DISABLE KEYS */;
INSERT INTO `etados_casos` VALUES (1,'Trámite'),(2,'Cerrado - desistimiento ');
/*!40000 ALTER TABLE `etados_casos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Masculino'),(2,'Femenino');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares_denuncia`
--

DROP TABLE IF EXISTS `lugares_denuncia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugares_denuncia` (
  `id_lugar_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_lugar_denuncia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_denuncia`
--

LOCK TABLES `lugares_denuncia` WRITE;
/*!40000 ALTER TABLE `lugares_denuncia` DISABLE KEYS */;
INSERT INTO `lugares_denuncia` VALUES (1,'Nogales, Sonora'),(2,'Agua Prieta, Sonora');
/*!40000 ALTER TABLE `lugares_denuncia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrantes`
--

DROP TABLE IF EXISTS `migrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrantes` (
  `id_migrante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `fecha_nacimiento` timestamp NULL DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `id_estado_civil` varchar(45) DEFAULT NULL,
  `escolaridad` varchar(255) DEFAULT NULL,
  `pueblo_indigena` tinyint(1) DEFAULT '0',
  `nombre_pueblo_indigena` varchar(255) DEFAULT NULL,
  `espanol` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_migrante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrantes`
--

LOCK TABLES `migrantes` WRITE;
/*!40000 ALTER TABLE `migrantes` DISABLE KEYS */;
INSERT INTO `migrantes` VALUES (1,'Carlos Hugo',1,6,'Colima',1,26,'1988-03-07 18:00:00','Programador','1','Licenciatura',2,NULL,1);
/*!40000 ALTER TABLE `migrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrantes2denuncias`
--

DROP TABLE IF EXISTS `migrantes2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrantes2denuncias` (
  `id_migrante` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrantes2denuncias`
--

LOCK TABLES `migrantes2denuncias` WRITE;
/*!40000 ALTER TABLE `migrantes2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrantes2denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'México'),(2,'Estados Unidos');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete_pago`
--

DROP TABLE IF EXISTS `paquete_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete_pago` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_paquete`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete_pago`
--

LOCK TABLES `paquete_pago` WRITE;
/*!40000 ALTER TABLE `paquete_pago` DISABLE KEYS */;
INSERT INTO `paquete_pago` VALUES (1,'Hospedaje'),(2,'Transporte'),(3,'Alimentación'),(4,'Pago de cuotas a la mafia');
/*!40000 ALTER TABLE `paquete_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes2denuncias`
--

DROP TABLE IF EXISTS `paquetes2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquetes2denuncias` (
  `id_paquete` int(11) NOT NULL,
  `id_denuncia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes2denuncias`
--

LOCK TABLES `paquetes2denuncias` WRITE;
/*!40000 ALTER TABLE `paquetes2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquetes2denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_quejas`
--

DROP TABLE IF EXISTS `tipos_quejas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos_quejas` (
  `id_tipo_queja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_queja`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_quejas`
--

LOCK TABLES `tipos_quejas` WRITE;
/*!40000 ALTER TABLE `tipos_quejas` DISABLE KEYS */;
INSERT INTO `tipos_quejas` VALUES (1,'Indivudual'),(2,'Grupal');
/*!40000 ALTER TABLE `tipos_quejas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportes`
--

DROP TABLE IF EXISTS `transportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportes` (
  `id_transporte` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_transporte`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportes`
--

LOCK TABLES `transportes` WRITE;
/*!40000 ALTER TABLE `transportes` DISABLE KEYS */;
INSERT INTO `transportes` VALUES (1,'Autobús de la Central'),(2,'Autobús de turismo'),(3,'Taxi'),(4,'Tren'),(5,'Camion'),(6,'Otro'),(7,'Vehículos oficiales'),(8,'Vehículos particulares'),(9,'Patrulla');
/*!40000 ALTER TABLE `transportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violacion_derechos`
--

DROP TABLE IF EXISTS `violacion_derechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `violacion_derechos` (
  `id_violacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_derecho` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_violacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violacion_derechos`
--

LOCK TABLES `violacion_derechos` WRITE;
/*!40000 ALTER TABLE `violacion_derechos` DISABLE KEYS */;
INSERT INTO `violacion_derechos` VALUES (1,1,'Detención ilegal y/o arbitraria'),(2,1,'Omisión de poner inmediatamente');
/*!40000 ALTER TABLE `violacion_derechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violacion_derechos2denuncias`
--

DROP TABLE IF EXISTS `violacion_derechos2denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `violacion_derechos2denuncias` (
  `id_violacion` int(11) NOT NULL,
  `id_denuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violacion_derechos2denuncias`
--

LOCK TABLES `violacion_derechos2denuncias` WRITE;
/*!40000 ALTER TABLE `violacion_derechos2denuncias` DISABLE KEYS */;
/*!40000 ALTER TABLE `violacion_derechos2denuncias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-27 11:50:31
