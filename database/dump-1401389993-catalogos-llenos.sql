-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ddhhdb
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.2

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades`
--

LOCK TABLES `autoridades` WRITE;
/*!40000 ALTER TABLE `autoridades` DISABLE KEYS */;
INSERT INTO `autoridades` VALUES (1,'Patrulla Fronteriza'),(2,'Policía'),(3,'Grupo Beta'),(4,'Agente del instituto nacional de migración'),(5,'El Ejército'),(6,'Marina'),(7,'Migración'),(8,'Policía Federal'),(9,'Policía Municipal'),(10,'Otro actor / Coyote'),(11,'Otro actor / Mafia'),(12,'Policía preventiva');
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
INSERT INTO `autoridades2denuncias` VALUES (1,1),(2,2),(4,3),(2,3),(2,4),(2,5),(2,6),(2,7);
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
INSERT INTO `autoridades_responables2denuncias` VALUES (8,2),(2,3),(9,4),(9,5),(8,6),(9,7);
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
  `id_lugar_denuncia` int(11) DEFAULT NULL,
  `id_tipo_queja` int(11) DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL,
  `motivo_migracion` varchar(255) DEFAULT NULL,
  `viaja_solo` tinyint(1) DEFAULT NULL,
  `con_quien_viaja` varchar(255) NOT NULL DEFAULT 'No aplica',
  `deportado` tinyint(1) DEFAULT NULL,
  `momento_deportado` varchar(255) DEFAULT NULL,
  `separacion_familiar` tinyint(1) DEFAULT NULL,
  `familiar_separado` varchar(255) NOT NULL DEFAULT 'No aplica',
  `situacion_familiar` varchar(255) NOT NULL DEFAULT 'No aplica',
  `acto_siguiente` varchar(255) DEFAULT NULL,
  `dano_autoridad` tinyint(1) DEFAULT NULL,
  `id_autoridad_dano` int(11) DEFAULT NULL,
  `coyote_guia` tinyint(1) DEFAULT NULL,
  `tiempo_contrato_coyote` varchar(255) DEFAULT NULL,
  `monto_coyote` varchar(255) DEFAULT NULL,
  `conocimineto_punto_fronterizo` tinyint(1) DEFAULT NULL,
  `nombre_punto_fronterizo` varchar(255) NOT NULL DEFAULT 'No aplica',
  `lugar_de_usa` varchar(255) NOT NULL DEFAULT 'No aplica',
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
  `algun_nombre_responsables` varchar(255) NOT NULL DEFAULT 'No aplica',
  `apodos_responsables` varchar(255) NOT NULL DEFAULT 'No aplica',
  `color_uniforme_responsables` varchar(255) NOT NULL DEFAULT 'No aplica',
  `insignias_responsables` varchar(255) NOT NULL DEFAULT 'No aplica',
  `responsables_abordo_vehiculos_responsables` varchar(15) DEFAULT 'No Aplica',
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
  `carcteristicas_ficias_policia_responsable` varchar(255) NOT NULL DEFAULT 'No aplica',
  `notas_seguimiento` varchar(255) DEFAULT NULL,
  `documento3_seguimiento` varchar(255) DEFAULT NULL,
  `documento4_seguimiento` varchar(255) DEFAULT NULL,
  `documento5_seguimiento` varchar(255) DEFAULT NULL,
  `documento6_seguimiento` varchar(255) DEFAULT NULL,
  `documento7_seguimiento` varchar(255) DEFAULT NULL,
  `documento8_seguimiento` varchar(255) DEFAULT NULL,
  `documento9_seguimiento` varchar(255) DEFAULT NULL,
  `documento10_seguimiento` varchar(255) DEFAULT NULL,
  `uniformado_responsables` varchar(15) DEFAULT 'No Aplica',
  PRIMARY KEY (`id_denuncia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncias`
--

LOCK TABLES `denuncias` WRITE;
/*!40000 ALTER TABLE `denuncias` DISABLE KEYS */;
INSERT INTO `denuncias` VALUES (1,'Q-05-14','2014-02-16 12:00:00',1,1,1,'Falta de trabajo',2,'',1,NULL,1,'amigo','','Regresar a mi comunidad',1,10,1,NULL,'6000 dolares',1,'Sonoita','','2014-02-06 12:00:00',NULL,'Sonora',26,1,'Desierto','Cansancio',NULL,2,3,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(2,'Q-01-14','2014-02-28 00:00:00',2,2,NULL,'Falta de trabajo',NULL,'',1,'Al cruzar la frontera',2,'','','regresar a mi comunidad',1,8,NULL,NULL,NULL,NULL,'','','2014-02-26 09:00:00',NULL,'Agua Prieta',26,1,'carretera','retén',NULL,11,1,'Torreón','Naco, Sonora',NULL,'4','','azul marino','',NULL,8,NULL,NULL,'<div>\n	Mi nombre es Juan Manuel Gonz&aacute;lez S&aacute;nchez, ven&iacute;amos en el autob&uacute;s An&aacute;huac y se detuvo en un ret&eacute;n que tiene un cuartito con una virgen y ah&iacute; se subieron los polic&iacute;as, una mujer nos dijo que baj&aacute;ramos para chequear y nos metieron al cuartito donde est&aacute; la virgen y adentro estaba un polic&iacute;a gordito y chaparro, era el que nos dec&iacute;a que d&oacute;nde tra&iacute;amos el dinero, y yo saqu&eacute; 1200 pesos y me dijo que cu&aacute;nto le iba a dejar, que si quinientos, yo le dije que los quer&iacute;a para un hotel y &eacute;l dijo que le dejara 200 y a otros diez que ven&iacute;an les hizo lo mismo. Eran una mujer, el gordito y otros dos, uno de ellos tra&iacute;a una van guinda y la ten&iacute;a estacionada a un lado del cuarto donde estaba la virgen, despu&eacute;s que nos chequearon nos dejaron ir, esto fue el d&iacute;a mi&eacute;rcoles 26 de febrero a las 9:15 de la noche. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>\n<div>\n	&nbsp;</div>\n','200 pesos',2,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(3,'Q-02-14','2014-02-11 12:00:00',1,1,1,'falta de trabajo',1,'',2,NULL,NULL,'','','esperar en esta ciudad',1,2,NULL,NULL,NULL,NULL,'','','2014-01-12 11:00:00',NULL,'Hermosillo',26,1,'A lado de la estación del ferrocarril','verme sucio',NULL,NULL,4,NULL,NULL,'3','','','','',NULL,9,NULL,NULL,NULL,NULL,NULL,'Canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(4,'Q-04-14','2014-02-14 12:00:00',1,2,1,'falta de trabajo ',2,'Amigos',2,NULL,2,'','','intentar cruzar otra vez',1,2,NULL,NULL,NULL,NULL,'','','2014-02-04 12:00:00',NULL,'Celaya',11,1,'a bordo del tren ','Hacer parada en la estación',NULL,2,4,NULL,NULL,'1','','','','',NULL,9,1,NULL,NULL,NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(5,'Q-06-14','2014-02-26 12:00:00',1,1,1,'falta de trabajo',1,'',2,NULL,NULL,'','','esperar en esta ciudad',1,2,2,NULL,NULL,NULL,'','','2014-02-23 05:00:00',NULL,'Benjamín Gil',26,1,'calle','bajar a comer',NULL,NULL,4,NULL,NULL,'4','','','','',NULL,9,1,NULL,'<div>\n	Yo estaba sentado en la estaci&oacute;n. Lleg&oacute; uno y me orden&oacute; subir a la Patrulla. Yo me negu&eacute; a subir. Me agarr&oacute; a patadas y me subi&oacute; y me llevaron a Benjam&iacute;n Gil. Me tuvieron encerrado hasta a otro d&iacute;a. Cuando me detuvieron me quitaron $ 100.00</div>\n<div>\n	&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(6,'Q-07-14','2014-02-27 12:00:00',1,2,9,'falta de trabajo',2,'sobrino',1,'Al cruzar la frontera',1,'sobrino','si','intentar cruzar otra vez',1,8,1,NULL,NULL,1,'Naco','','2014-01-15 06:00:00',NULL,'Casas Grandes',8,1,'retén ','revisión',NULL,1,1,NULL,NULL,'varios','','','','',NULL,7,NULL,NULL,'<div>\n	en&iacute;amos en el bus. Subieron y nos bajaron a todos so pretexto de revisi&oacute;n. Iban de uno en uno a una especie de capilla- ten-ia imagen y veladoras-chica como para 4 personas. Me dijeron que sacara todo de las bolsas y uno abri&oacute; mi cartera, sac&oacute; todos los billetes, luego hizo como que me revisaba la cintura con los billetes en la mano. Otro polic&iacute;a le jal&oacute; los billetes y los guard&oacute;. M&aacute;s o menos era $ 1 400.00 Me robaron 800.00.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(7,'Q-08-14','2014-02-28 12:00:00',1,2,2,'falta de trabajo',NULL,'',1,'Al cruzar la frontera',2,'','','regresar a mi comunidad',1,12,NULL,NULL,NULL,NULL,'','','2014-02-25 12:00:00',NULL,'Santa Cruz',26,1,'Calle','Caminando',NULL,5,10,NULL,NULL,'3','','','azul','',NULL,9,1,NULL,'<div>\n	Nos bajamos del autob&uacute;s para ir caminando a Santa Cruz. La polic&iacute;a, antes de llegar a Santa Cruz nos agarraron- &eacute;ramos cinco- nos encerraron toda la noche y en la ma&ntilde;ana nos subieron a un camioncito y nos mandaron a Nogales. Esa noche nos hab&iacute;an dicho que sac&aacute;ramos todo lo que tra&iacute;amos y nos robaron. A m&iacute; mil pesos, a otro tambi&eacute;n mil y a otro 20000. Papeles de identificaci&oacute;n y credenciales nos las regresaron pero el dinero no.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `derechos`
--

LOCK TABLES `derechos` WRITE;
/*!40000 ALTER TABLE `derechos` DISABLE KEYS */;
INSERT INTO `derechos` VALUES (1,'Derecho a la Libertad Personal'),(2,'Derecho a la integridad personal'),(3,'Derecho al debido proceso legal'),(4,'Derechos patrimoniales'),(5,'Derecho al trabajo'),(6,'Derecho a la vida');
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
INSERT INTO `derechos_violados2denuncias` VALUES (2,1),(4,1),(1,2),(4,2),(1,3),(2,4),(2,5),(1,5),(4,6),(1,7),(4,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etados_casos`
--

LOCK TABLES `etados_casos` WRITE;
/*!40000 ALTER TABLE `etados_casos` DISABLE KEYS */;
INSERT INTO `etados_casos` VALUES (1,'Trámite'),(2,'Cerrado por desistimiento estan en transito'),(3,'Cerrado por desistimiento por temor a represalias'),(4,'Cerrado por canalización a una instancia');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_denuncia`
--

LOCK TABLES `lugares_denuncia` WRITE;
/*!40000 ALTER TABLE `lugares_denuncia` DISABLE KEYS */;
INSERT INTO `lugares_denuncia` VALUES (1,'Nogales, Sonora'),(2,'Agua Prieta, Sonora'),(3,'Altar, Sonora');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrantes`
--

LOCK TABLES `migrantes` WRITE;
/*!40000 ALTER TABLE `migrantes` DISABLE KEYS */;
INSERT INTO `migrantes` VALUES (1,'Jonatan Morales',1,2,'Tijuana',1,21,NULL,'Chofer','1','Primaria',2,NULL,NULL),(2,'Juan Manuel González Sánchez',1,32,'Noria de Ángeles',1,34,NULL,'campesino','2','primaria',2,NULL,NULL),(3,'Ricardo Martínez',1,30,'Pánuco',1,35,NULL,'campesino','2','primaria',2,NULL,NULL),(4,'José Hernández Velázquez',3,NULL,NULL,1,52,NULL,'comerciante','2','primaria',2,NULL,NULL),(5,'Hector Mejía',3,NULL,NULL,1,44,NULL,'comerciante','2','primaria',2,NULL,NULL),(7,'Kader Orellana Flores',3,NULL,NULL,1,26,NULL,'comerciante','2','primaria',2,NULL,NULL),(8,'Guillermo',1,14,'Tuxpan',1,43,NULL,'empledo','2','preparatoria',2,NULL,NULL),(9,'Apolinar Pacheco Reyes',1,11,'León',1,40,NULL,'campesino ','2','primaria',NULL,NULL,NULL);
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
INSERT INTO `migrantes2denuncias` VALUES (1,1),(2,2),(3,3),(5,4),(4,4),(7,5),(8,6),(9,7);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,'México'),(2,'Estados Unidos'),(3,'Honduras'),(4,'Guatemala'),(5,'El Salvador');
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
INSERT INTO `paquetes2denuncias` VALUES (3,1),(1,1),(4,1),(2,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_quejas`
--

LOCK TABLES `tipos_quejas` WRITE;
/*!40000 ALTER TABLE `tipos_quejas` DISABLE KEYS */;
INSERT INTO `tipos_quejas` VALUES (1,'Indivudual'),(2,'Grupal'),(3,'Comunitaria');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportes`
--

LOCK TABLES `transportes` WRITE;
/*!40000 ALTER TABLE `transportes` DISABLE KEYS */;
INSERT INTO `transportes` VALUES (1,'Autobús de la Central'),(2,'Autobús de turismo'),(3,'Taxi'),(4,'Tren'),(5,'Camion'),(6,'Otro'),(7,'Vehículos oficiales'),(8,'Vehículos particulares'),(9,'Patrulla'),(10,'A pie');
/*!40000 ALTER TABLE `transportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_organization` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `pwd` varchar(45) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(45) NOT NULL DEFAULT 'normal',
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,1,'peromaty@yahoo.com.mx','Maty','Perez','113ccfaca0989846116d91abe9d20dc8','peromaty@yahoo.com.mx','admin','2014-05-28 16:26:46'),(2,1,1,'carlos@fundar.org.mx','Carlos Hugo','Gonzalez Castell','113ccfaca0989846116d91abe9d20dc8','carlos@fundar.org.mx','admin','2014-05-28 16:27:24'),(3,1,1,'silvia@fundar.org.mx','Silvia','Ruiz','113ccfaca0989846116d91abe9d20dc8','silvia@fundar.org.mx','admin','2014-05-28 16:43:35'),(4,2,1,'rimahr2001@yahoo.com','Ricardo Machuca','Iniciativa Kino para la Frontera','e75046f641dedb2bf476b3b76535db96','rimahr2001@yahoo.com','nomrmal','2014-05-29 18:57:54'),(5,3,1,'p.delangel@pdib.org','Perla del Ángel','Centro de Recursos para Migrantes','faed97a25e7cc27472ba902a9ff1148e','p.delangel@pdib.org','nomrmal','2014-05-29 18:58:05'),(6,4,1,'ccamyn_altar@hotmail.com','Denisse López','Centro Comunitario de Atención al Migrante y ','ac632469b5be45670aae567d1c844604','ccamyn_altar@hotmail.com','nomrmal','2014-05-29 18:58:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violacion_derechos`
--

LOCK TABLES `violacion_derechos` WRITE;
/*!40000 ALTER TABLE `violacion_derechos` DISABLE KEYS */;
INSERT INTO `violacion_derechos` VALUES (1,1,'Detención ilegal y/o arbitraria'),(2,1,'Omisión de poner inmediatamente a disposición de la autoridad competente a la persona'),(5,1,'Restricción al libre tránsito'),(6,3,'Falta de una defensa adecuada'),(7,3,'Falta de protección consular'),(8,3,'Falta de seguimiento a casos de abusos'),(9,2,'Tortura'),(10,2,'Tratos crueles Inhumanos y degradantes'),(11,2,'Amenazas'),(12,1,'Desaparición forzada'),(13,2,'Incomunicación'),(14,1,'Secuestro'),(15,2,'Trata de personas'),(16,4,'Multa indebida'),(17,4,'Multa excesiva'),(18,4,'Robo'),(19,4,'Daños'),(20,4,'Extorsión'),(21,5,'Despido injustificado'),(22,5,'Riesgo de trabajo'),(23,5,'Falta de herramientas técnicas'),(24,5,'Falta de equipamiento'),(25,5,'Salario digno, justo y equitativo'),(26,6,'Ejecución extrajudicial'),(27,3,'Falta de investigación a casos de abuso'),(28,5,'Trato discriminatorio');
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
INSERT INTO `violacion_derechos2denuncias` VALUES (19,1),(10,1),(20,2),(5,2),(1,3),(5,3),(11,4),(5,4),(1,5),(5,5),(18,5),(10,5),(18,6),(1,7),(5,7),(18,7);
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

-- Dump completed on 2014-05-29 18:59:53