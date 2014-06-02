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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades`
--

LOCK TABLES `autoridades` WRITE;
/*!40000 ALTER TABLE `autoridades` DISABLE KEYS */;
INSERT INTO `autoridades` VALUES (1,'Patrulla Fronteriza'),(2,'Policía'),(3,'Grupo Beta'),(4,'Agente del instituto nacional de migración'),(5,'El Ejército'),(6,'Marina'),(7,'Migración'),(8,'Policía Federal'),(9,'Policía Preventiva Municipal'),(10,'Otro actor / Coyote'),(11,'Otro actor / Mafia'),(12,'Policía preventiva'),(13,'Policía Preventiva Estatal'),(14,'Policía Investigadora Ministerial');
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
INSERT INTO `autoridades2denuncias` VALUES (1,1),(2,2),(4,3),(2,3),(2,4),(2,5),(2,6),(2,7),(5,9),(3,9),(2,9),(5,10),(3,10),(2,10),(1,11),(2,11),(4,12),(5,12),(5,13),(2,13),(2,14),(1,15),(2,16),(11,17),(1,19),(1,20),(2,20),(3,21),(1,21),(2,21),(1,22),(3,23),(2,23),(4,24),(3,24),(1,24),(2,24),(9,25),(4,26),(5,26),(3,26),(7,26),(2,26),(3,27),(1,27),(2,27),(2,28),(4,29),(5,29),(3,29),(2,29),(5,30),(3,30),(2,30),(4,31),(3,31),(1,31),(4,32),(3,32),(1,32),(2,32),(2,33),(4,34),(5,34),(3,34),(2,34),(3,35),(2,35),(4,36),(3,36),(1,36),(2,36),(4,37),(5,37),(3,37),(2,37),(2,38),(1,39),(2,39),(3,40),(1,40),(4,41),(3,41),(2,41),(1,43),(2,43),(5,44),(3,44),(2,44),(5,45),(3,45),(2,45),(2,46),(1,47),(2,47),(4,48),(5,48),(3,48),(2,48),(5,49),(3,49),(2,49),(5,50),(3,50),(2,50),(3,51),(2,51),(4,52),(5,52),(2,52),(5,53),(3,53),(2,53),(2,55),(2,56),(3,57),(1,57);
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
INSERT INTO `autoridades_responables2denuncias` VALUES (8,2),(2,3),(9,4),(9,5),(8,6),(9,7),(2,9),(5,10),(8,10),(9,11),(7,12),(11,13),(8,14),(2,15),(12,16),(11,17),(8,18),(8,19),(12,20),(12,21),(12,22),(2,24),(9,25),(8,26),(9,27),(8,28),(9,28),(9,29),(7,30),(4,31),(8,32),(2,33),(8,34),(9,34),(9,35),(8,36),(11,37),(8,40),(2,42),(8,43),(9,44),(8,45),(8,47),(9,48),(8,49),(2,50),(8,51),(4,52),(8,55),(8,56),(2,57);
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncias`
--

LOCK TABLES `denuncias` WRITE;
/*!40000 ALTER TABLE `denuncias` DISABLE KEYS */;
INSERT INTO `denuncias` VALUES (1,'Q-05-14','2014-02-16 12:00:00',1,1,1,'Falta de trabajo',2,'',1,NULL,1,'amigo','','Regresar a mi comunidad',1,10,1,NULL,'6000 dolares',1,'Sonoita','','2014-02-06 12:00:00',NULL,'Sonora',26,1,'Desierto','Cansancio',NULL,2,3,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(2,'Q-01-14','2014-02-28 00:00:00',2,2,NULL,'Falta de trabajo',NULL,'',1,'Al cruzar la frontera',2,'','','regresar a mi comunidad',1,8,NULL,NULL,NULL,NULL,'','','2014-02-26 09:00:00',NULL,'Agua Prieta',26,1,'carretera','retén',NULL,11,1,'Torreón','Naco, Sonora',NULL,'4','','azul marino','',NULL,8,NULL,NULL,'<div>\n	Mi nombre es Juan Manuel Gonz&aacute;lez S&aacute;nchez, ven&iacute;amos en el autob&uacute;s An&aacute;huac y se detuvo en un ret&eacute;n que tiene un cuartito con una virgen y ah&iacute; se subieron los polic&iacute;as, una mujer nos dijo que baj&aacute;ramos para chequear y nos metieron al cuartito donde est&aacute; la virgen y adentro estaba un polic&iacute;a gordito y chaparro, era el que nos dec&iacute;a que d&oacute;nde tra&iacute;amos el dinero, y yo saqu&eacute; 1200 pesos y me dijo que cu&aacute;nto le iba a dejar, que si quinientos, yo le dije que los quer&iacute;a para un hotel y &eacute;l dijo que le dejara 200 y a otros diez que ven&iacute;an les hizo lo mismo. Eran una mujer, el gordito y otros dos, uno de ellos tra&iacute;a una van guinda y la ten&iacute;a estacionada a un lado del cuarto donde estaba la virgen, despu&eacute;s que nos chequearon nos dejaron ir, esto fue el d&iacute;a mi&eacute;rcoles 26 de febrero a las 9:15 de la noche. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>\n<div>\n	&nbsp;</div>\n','200 pesos',2,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(3,'Q-02-14','2014-02-11 12:00:00',1,1,1,'falta de trabajo',1,'',2,NULL,NULL,'','','esperar en esta ciudad',1,2,NULL,NULL,NULL,NULL,'','','2014-01-12 11:00:00',NULL,'Hermosillo',26,1,'A lado de la estación del ferrocarril','verme sucio',NULL,NULL,4,NULL,NULL,'3','','','','',NULL,9,NULL,NULL,NULL,NULL,NULL,'Canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(4,'Q-04-14','2014-02-14 12:00:00',1,2,1,'falta de trabajo ',2,'Amigos',2,NULL,2,'','','intentar cruzar otra vez',1,2,NULL,NULL,NULL,NULL,'','','2014-02-04 12:00:00',NULL,'Celaya',11,1,'a bordo del tren ','Hacer parada en la estación',NULL,2,4,NULL,NULL,'1','','','','',NULL,9,1,NULL,NULL,NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(5,'Q-06-14','2014-02-26 12:00:00',1,1,1,'falta de trabajo',1,'',2,NULL,NULL,'','','esperar en esta ciudad',1,2,2,NULL,NULL,NULL,'','','2014-02-23 05:00:00',NULL,'Benjamín Gil',26,1,'calle','bajar a comer',NULL,NULL,4,NULL,NULL,'4','','','','',NULL,9,1,NULL,'<div>\n	Yo estaba sentado en la estaci&oacute;n. Lleg&oacute; uno y me orden&oacute; subir a la Patrulla. Yo me negu&eacute; a subir. Me agarr&oacute; a patadas y me subi&oacute; y me llevaron a Benjam&iacute;n Gil. Me tuvieron encerrado hasta a otro d&iacute;a. Cuando me detuvieron me quitaron $ 100.00</div>\n<div>\n	&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(6,'Q-07-14','2014-02-27 12:00:00',1,2,9,'falta de trabajo',2,'sobrino',1,'Al cruzar la frontera',1,'sobrino','si','intentar cruzar otra vez',1,8,1,NULL,NULL,1,'Naco','','2014-01-15 06:00:00',NULL,'Casas Grandes',8,1,'retén ','revisión',NULL,1,1,NULL,NULL,'varios','','','','',NULL,7,NULL,NULL,'<div>\n	en&iacute;amos en el bus. Subieron y nos bajaron a todos so pretexto de revisi&oacute;n. Iban de uno en uno a una especie de capilla- ten-ia imagen y veladoras-chica como para 4 personas. Me dijeron que sacara todo de las bolsas y uno abri&oacute; mi cartera, sac&oacute; todos los billetes, luego hizo como que me revisaba la cintura con los billetes en la mano. Otro polic&iacute;a le jal&oacute; los billetes y los guard&oacute;. M&aacute;s o menos era $ 1 400.00 Me robaron 800.00.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(7,'Q-08-14','2014-02-28 12:00:00',1,2,2,'falta de trabajo',NULL,'',1,'Al cruzar la frontera',2,'','','regresar a mi comunidad',1,12,NULL,NULL,NULL,NULL,'','','2014-02-25 12:00:00',NULL,'Santa Cruz',26,1,'Calle','Caminando',NULL,5,10,NULL,NULL,'3','','','azul','',NULL,9,1,NULL,'<div>\n	Nos bajamos del autob&uacute;s para ir caminando a Santa Cruz. La polic&iacute;a, antes de llegar a Santa Cruz nos agarraron- &eacute;ramos cinco- nos encerraron toda la noche y en la ma&ntilde;ana nos subieron a un camioncito y nos mandaron a Nogales. Esa noche nos hab&iacute;an dicho que sac&aacute;ramos todo lo que tra&iacute;amos y nos robaron. A m&iacute; mil pesos, a otro tambi&eacute;n mil y a otro 20000. Papeles de identificaci&oacute;n y credenciales nos las regresaron pero el dinero no.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'canalización a otra instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No Aplica'),(9,'Q-30-14','2014-03-27 00:00:00',1,2,NULL,'Falta de trabajo ',2,'',2,NULL,2,'','','Intentar cruzar otra vez ',1,2,2,NULL,NULL,NULL,'','','2014-03-19 20:00:00',NULL,'Estado de Mèxico',15,1,'En el metro',NULL,NULL,3,4,NULL,NULL,'7','no escucho ','no escucho','azul','no vio','Si',NULL,NULL,'no vio','<p>\n	Se llevaron a dos. Los custodiaba, a la Che vi, dos polic&iacute;as dentro y los 7 de la patrulla fuera. Los llevaron a ese lugar, los desnudaron totalmente y se quedaron custodi&aacute;ndolos. Como no era un local, sino &aacute;rea, se les escaparon as&iacute; desnudos y un Sr. los auxili&oacute;. El &nbsp;otro Sr. dijo que iba a poner la denuncia en su pueblo y &eacute;ste la puso en el F.M.4 pero no quiso esperar. Eran 6 meses de espera y ten&iacute;a que ir al Ministerio P. No quiso. Aqu&iacute; tambi&eacute;n lo document&oacute;. Los otros dos que dieron sus nombres en este documento, s&oacute;lo eran compa&ntilde;eros en M&eacute;xico, Lecher&iacute;a, pero ellos no fueron secuestrados porque corrieron.</p>\n','2000',2,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(10,'Q-31-14','2014-03-27 00:00:00',1,2,NULL,'Falta de Trabajo',1,'',2,NULL,2,'','','Intentar Cruzar otra vez ',1,8,2,NULL,NULL,NULL,'','','2014-03-07 15:00:00',NULL,'Palenque',7,1,'Carretera','Pararon la combi ',NULL,8,NULL,NULL,NULL,'5','no','no','Azul y Verde ','No vio','Si',7,3,'No vio','<p>\n	Ven&iacute;amos y pararon la Combi cerca de Palenque. Nos bajaron de la combi a todos y nos metieron a un cuarto. Y ah&iacute; nos registraron y nos queitaron todo el dinero que tra&iacute;amos. A m&iacute; me quitaron $ 1000.00 y $ 400 quetzales. Nos quitan la mochila y nos quitaron la ropa que tra&iacute;amos puesta con pistola en mano. Nos quitan el dinero que tra&iacute;amos en las pretinas del pantal&oacute;n y ya nos regresaron la ropa pero sin dinero. &nbsp;Unos tra&iacute;an hasta $ 5 000.00 y se los quitaron. Ottos 3000.00. Despu&eacute;s entregan la ropa y la combi ya se fue. Uno tiene que caminar. Despu&eacute;s hay que caminar para llegar a la ciudad. Nos dejan con la amenaza de que, si los denunciamos, nos van a entregar a migraci&oacute;n.</p>\n','9000',2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'no',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(11,'Q-32-14','2014-03-31 00:00:00',2,1,NULL,'Falta de Trabajo',2,'Tío ',1,'Al cruzar la frontera',1,'Tío','Fue repratriado','Regresar a mi comunidad',1,9,1,NULL,'10,000',1,'','Doglas, Florida','2014-03-30 18:34:00',NULL,'Agua Prieta',26,1,'Vía Publica','viajaban en taxi',NULL,0,3,'Elektra','CAME','3','No escucho','no escucho','Azul Marino','Policía','Si',9,2,'no vio','<p>\n	Llegu&eacute; a la Casa del Migrante y a mi t&iacute;o Exal M&eacute;ndez en ese momento le iban a enviar dinero desde los Estados Unidos, pero por la lesi&oacute;n que &eacute;l tiene no puede caminar mucho, as&iacute; que mi t&iacute;a Loli P&eacute;rez Rodr&iacute;guez envi&oacute; $4,008.00 (cuatro mil ocho pesos 00/100 m.n.) a mi nombre para que se los cobrara a mi t&iacute;o Exal M&eacute;ndez&hellip;.. Sal&iacute; de Ley y fui a la tienda Coppel, de ah&iacute; afuera llam&eacute; al taxista para que me fuera por m&iacute;, eran las 17:58 horas y me dijo que lo esperara cinco minutos; as&iacute; fue, el taxista lleg&oacute; muy r&aacute;pido. Cuando me sub&iacute; al taxi le dije que me llevara al otro Elektra, donde hab&iacute;a tomado el taxi. El taxista me llev&oacute; &nbsp;y le ped&iacute; que me esperara. En Elektra tard&eacute; como veinte minutos y cobr&eacute; $4008.00 (cuatro mil ocho pesos 00/100 m.n.) que envi&oacute; mi t&iacute;a Loli P&eacute;rez Rodr&iacute;guez. Sal&iacute; y me sub&iacute; al taxi y le dije al taxista que me llevara a la Casa del Migrante. En el camino, despu&eacute;s de pasar las v&iacute;as, sobre la calle 6, como a una cuadra y media antes de llegar a la Casa del Migrante, donde est&aacute; un tope, dos patrullas de la Polic&iacute;a Estatal pararon al taxi encendiendo las torretas, esto como a las 18:30 horas. El taxi se detuvo y se baj&oacute; un polic&iacute;a de una patrulla y otros dos, una mujer y un hombre con armas largas, de otra patrulla. Este &uacute;ltimo hombre me dijo que me sacara todo de las bolsas, saqu&eacute; mi cartera, mis compras y los tickets que tra&iacute;a, despu&eacute;s este polic&iacute;a y su compa&ntilde;era mujer detuvieron otro carro. Conmigo se qued&oacute; el primer polic&iacute;a que ven&iacute;a solo en la otra patrulla, al taxista le pidi&oacute; una identificaci&oacute;n y a m&iacute; me dijo que me bajara, yo me baj&eacute; y me empez&oacute; a preguntar que de d&oacute;nde era, que si tra&iacute;a identificaci&oacute;n, que cu&aacute;nto dinero tra&iacute;a, yo le respond&iacute; que era de Chiapas, le mostr&eacute; mi identificaci&oacute;n y le dije cu&aacute;nto tra&iacute;a, el polic&iacute;a me pregunt&oacute; que por qu&eacute; tanto dinero, yo le dije que tra&iacute;a $4,008.00 (cuatro mil ocho pesos 00/100 m.n.) que acaba de cobrar y que eran de mi t&iacute;o y yo tra&iacute;a aparte $1,900.00 (mil novecientos pesos 00/100 m.n.), incluso me pidi&oacute; el recibo de Elektra para ver que si fueran los $4,008.00 (cuatro mil ocho pesos 00/100 m.n.). Despu&eacute;s me pregunt&oacute; que a qu&eacute; me dedicaba y yo le dije que en Chiapas me dedico al mango y me dijo palabras groseras. El polic&iacute;a me dijo que me subiera a la cabina trasera de la patrulla, me sub&iacute; y &eacute;l tambi&eacute;n, se sent&oacute; a un lado y me pregunt&oacute; que cu&aacute;nto le iba a dejar, yo le dije que no era mi dinero, que era de mi t&iacute;o, entonces grit&aacute;ndome me dijo que soltara $500.00 (quinientos pesos 00/100 m.n.) sino me iba a llevar a migraci&oacute;n para que me deportaran a Chiapas, &eacute;l sac&oacute; las esposas y me quer&iacute;a esposar, entonces por miedo le di los $500.00 (quinientos pesos 00/100 m.n.), &eacute;l me dijo que los metiera en la bolsa del respaldo del asiento de enfrente y ah&iacute; los met&iacute;. Despu&eacute;s me dijo &ldquo;j&aacute;lale ya, ah&iacute; estamos bien&rdquo;, yo me baj&eacute; de la patrulla y me sub&iacute; al taxi y este me llev&oacute; a la Casa del Migrante y le pagu&eacute; $50.00 (cincuenta pesos 00/100 m.n.). Con el polic&iacute;a creo que tard&eacute; como media hora.</p>\n','500',2,NULL,'Perla Del Ángel',NULL,NULL,NULL,NULL,'No recuerda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(12,'Q-33-14','2014-03-26 00:00:00',1,2,NULL,'Violencia ',2,'Hermana',2,NULL,2,'','','Intentar Cruzar otra vez',1,7,2,NULL,NULL,NULL,'','','2014-02-28 00:00:00',NULL,'Tonalá',7,1,'Carretera','pararon el camión ',NULL,3,1,'Central',NULL,'2','No escucho','No scucho','Blanco','INM','Si',8,1,'Si traía pero no las vio ','<p>\n	Ven&iacute;amos en el bus. Lo para Migraci&oacute;n sube migraci&oacute;n y solo me bajaron a m&iacute;. Me preguntaron con qui&eacute;n andaba. Les dije que con una compa&ntilde;era y mi hermana. Las bajaron a ellas tambi&eacute;n. Me preguntaron de d&oacute;nde ven&iacute;amos, cu&aacute;ntos &eacute;ramos. Solo ven&iacute;amos los tres. Nos dijeron que nos iban a deportar para Honduras. Nos preguntaron cu&aacute;nto and&aacute;bamos. Les dije que $ 1 100.00 . Dijeron que era muy poquito. Ellos ped&iacute;an $ 1 500.00 Se subieron a la camioneta y hablaron entre ellos. Nos volvieron a preguntar que cu&aacute;nto tra&iacute;amos. Les volv&iacute; a decir la cantidad y ya dijeron que se los di&eacute;ramos, pero que no le dij&eacute;ramos a nadie porque nos iban a hacer el favor. El autob&uacute;s ya se hab&iacute;a ido y nos dejaron en una parte sola, muy s&oacute;la, zona de riesgo. Ah&iacute; nos pod&iacute;an asaltar, matar, violar a mi hermana. En ese cerro han violado a muchas mujeres. &nbsp;Esperamos como una hora y pas&oacute; otro autob&uacute;s. Seguimos el camino. Despu&eacute;s entre Arriaga, Huistepec, Wewetoca, Lecher&iacute;a volvieron a asaltar el tren, pero a nosotros no nos llegaron.</p>\n','1100',2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(13,'Q-34-14 ','2014-03-26 00:00:00',1,2,NULL,'Violencia ',1,'',2,NULL,2,'','','Intentar Cruzar otra vez ',2,11,2,NULL,NULL,NULL,'','','2014-02-07 08:00:00',NULL,'Medias Aguas ',7,1,'Estación del Tren ','Esperando el Tren',NULL,40,4,NULL,NULL,'20','no escucho ','Perro','','','Si',8,2,'No vio ','<p>\n	Esper&aacute;bamos el tren. En eso apareci&oacute; el grupo. Llegaron como amigos: Hola, c&oacute;mo est&aacute;s, qui&eacute;n es el gu&iacute;a, cu&aacute;ntos llevas? No llegaron todos a la vez, iban llegando poco a poco. Cuando ya llegaron el grupo, nos dijeron: Saben qu&eacute;, esto es un asalto, t&iacute;rense todos. Qu&iacute;tense los zapatos, dejen todo lo que traen en las mochilas y d&eacute;jenlas afuera, a ver si llev&aacute;bamos armas. Ellos fueron a ver las cosas buenas que tra&iacute;amos. Tenis y otras propiedades. Todos tirados con la cabeza hacia abajo. El dinero, nos ordenaron que lo pusi&eacute;ramos en las manos al frente y ellos fueron pasando y tomaban el dinero de la s manos. Tambi&eacute;n dijeron que si no sac&aacute;bamos el dinero y nos registraban y encontraban dinero en las bolsas, ellos nos llevaban con ellos. Todos sacamos todo. Yo saqu&eacute; mis $ 480.00 que tra&iacute;a.&nbsp;</p>\n','480 ',2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(14,'Q-35-14 ','2014-04-02 00:00:00',1,2,NULL,'Falta de Trabajo ',2,'2 amigos ',2,NULL,2,'','','Intentar Cruzar otra vez ',1,8,2,NULL,NULL,NULL,'','','2014-03-14 16:00:00',NULL,'Córdoba ',30,1,'Carretera ','Intervenciòn de la Policía Federal',NULL,2,4,'Coatzacoalco Veracuz','Córdoba Veracruz ','7','No escucho','No escucho','No vio','No vio ','Si',NULL,2,'No vio ','<p>\n	Salio de coaxacoalcos &nbsp;e iba llegando a c&oacute;rdoba. Entrando a c&oacute;rdoba &nbsp;salieron polic&iacute;as federales. Eran 2 patrullas de federales con &nbsp;varios polic&iacute;as. Ellos iban a rodear la estaci&oacute;n de tren y los llamaron. Dos polic&iacute;as se le acercaron &nbsp;les dijeron que ten&iacute;an que dar 500 cada uno, y que como no ten&iacute;an clave los ten&iacute;an que dar o los devolver&iacute;an. Uno de los dos muchachos se enojo y entonces se acercaron 7 polic&iacute;as &nbsp;a robarles &nbsp;y uno de estos le pego. Despu&eacute;s &nbsp;les sacaron 750 pesos, y era todo lo que ten&iacute;an., iban Ever con su primo. &nbsp;Despu&eacute;sles dijo que ac&aacute; era Mexico y ten&iacute;an que hacer lo que ellos quer&iacute;an.</p>\n','750',2,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(15,'Q-36-14','2014-04-03 00:00:00',3,1,NULL,'Escaces económica ',1,'',NULL,'Al cruzar la frontera',2,'','','Intentar cruzar otra vez',1,1,2,NULL,NULL,NULL,'','','2014-04-01 06:30:00',NULL,'Santa Ana ',26,1,'Autobus','Viajar en autobus',NULL,NULL,1,'Elite','Altar','3','No escucho','No scucho ','Negro','No vio ','Si',8,1,'No vio ','<p>\n	Rafael Mada Lastra intento cruzar el desierto de Arizona el cual no logro llegar a su destino y fue deportado por Nogales, Arizona; el mismo d&iacute;a tomo un autob&uacute;s de elite hacia Altar y en el tramo de la carretera de Santa Ana-Altar fue detenido el autob&uacute;s para una revisi&oacute;n en la cual se dice solo bajaron a los migrantes, para as&iacute; llevarlos a la parte de atr&aacute;s del autob&uacute;s. Rafael y dos compa&ntilde;eros m&aacute;s fueron maltratados y despojados de sus pertenencias brutalmente solo para registrar su equipaje, al no encontrarles nada les amenazaron con que ten&iacute;an que sacar todo el dinero que ten&iacute;an, a lo que ellos contestaron que no tra&iacute;an nada solo hab&iacute;an completado para el pasaje y que una organizaci&oacute;n les hab&iacute;a ayudado y los oficiales contestaron que no seguir&iacute;an su camino si no dejaban una cuota, al no tener nada los maltrataron y despojaron a Rafael de un tel&eacute;fono celular y 200 pesos que era lo &uacute;nico de valor con lo que viajaba.</p>\n','200',2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(16,'Q-37-14','2014-04-02 00:00:00',1,2,NULL,'Encontrase con familiares',1,'',1,'Vivías en USA',2,'','','Regresar a casa',1,12,2,NULL,NULL,NULL,'','','2014-03-01 19:00:00',NULL,NULL,NULL,1,NULL,'Los para la Policía por estar caminando',NULL,2,10,NULL,NULL,'4','No escucho','No escucho','','','No',NULL,NULL,NULL,'<p>\n	toribio higa caminando por el centro de Nogales a la altura de calle obregon y vasquez y la Policia les dijo que pararan. Les preguntaron que hac&iacute;an, ellos dijeron que iban para el albergue. Les pidieron documentos. Despu&eacute;s de pedirles los documentos los dejaron seguir.</p>\n',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(17,'Q-38-14','2014-04-03 00:00:00',1,2,NULL,'Falta de trabajo',2,'Con su pareja ',2,NULL,2,'','','Intentar cruzar Otra vez ',1,11,2,NULL,NULL,NULL,'','','2014-02-01 00:00:00',NULL,'Palenque',7,1,'Vía publica',NULL,NULL,2,10,NULL,NULL,'6','No escucho','No escucho ','','','No',NULL,NULL,NULL,'<p>\n	En palenque chiapas un hombre se le acerco a willmer acus&aacute;ndolo de &nbsp;gu&iacute;a y diciendo que tenia que &nbsp;pagar 300 dolares. El dijo que no era gu&iacute;a y &nbsp;la persona se alejo. Se movieron hacia un parque &nbsp;y los siguieron 6 personas. Estos individuos se hac&iacute;an pasar por la mara. &nbsp;Ellos se subieron y se escondieron en una iglesia.&nbsp;</p>\n',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(18,'Q-39-14','2014-04-06 00:00:00',1,2,NULL,'Encontrarse con Familiares ',2,'Amigos ',2,NULL,NULL,'','','Intentar Cruzar otra vez',1,8,2,NULL,NULL,NULL,'','','2014-04-02 10:00:00',NULL,'Nogales',26,1,'Vías del Tren','Viajar en Tren',NULL,6,4,'Empalme ','Nogales','2','No escucho','No escucho','Azul Obscuro','Policía Federal','No',NULL,NULL,NULL,'<p>\n	Despu&eacute;s el 3 de Abril jesus llego entre 9 y 10 am a Nogales en tren. La polic&iacute;a los bajo del tren, eran polic&iacute;as federales, a todos los migrantes les pidieron nombre y documentos. Les revisaron todas las pertenencias y uno de ellos jalo bruscamente a Jose &quot;quien solo tiene 14 anos.&quot; De ah&iacute; los registraron a todos y despu&eacute;s los dejaron salir. &nbsp;</p>\n',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(19,'Q-40-14','2014-04-07 00:00:00',3,1,NULL,'Escaces económica',1,'',NULL,'Al cruzar la frontera',2,'','','Intentar Cruzar otra vez ',1,8,1,NULL,'5000',1,'Sasabe, Sonora','Arizona','2014-04-06 06:00:00',NULL,'Santa Ana ',26,1,'carretera ','Extorsión',NULL,1,1,'Nogales','Tijuana ','2','No escucho','No esucho','Azul Marino ','No vio ','Si',8,1,'Si pero no las identificó ','<p>\n	Mois&eacute;s Rivera intento cruzar la frontera por Tecate Baja California la cual no logro cruzar ya que fue detenido por agentes de la patrulla fronteriza y despu&eacute;s deportado por la frontera de Nogales, Arizona. Ah&iacute; estuvo detenido tres D&iacute;as y despu&eacute;s lo pasaron a Nogales Sonora, no contando con nada de dinero busco ayuda en alguna organizaci&oacute;n para migrantes solo encontr&oacute; un comedor pero ah&iacute; le informaron a donde pod&iacute;a ir y como regresar a su lugar de origen. As&iacute; es como consigui&oacute; dinero solo para el autob&uacute;s, ya en el camino saliendo de Santa Ana los detuvo un ret&eacute;n donde bajaron a Mois&eacute;s y tres personas m&aacute;s que ven&iacute;an deportados; ah&iacute; &nbsp;les dijeron que para seguir su camino tendr&iacute;an que dejar una cuota de 200 pesos cada uno. Ya que ninguno contaba con nada de dinero los insultaron y amenazaron, pero los dejaron continuar su viajes</p>\n',NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(20,'Q-41-14','2014-04-07 00:00:00',3,2,NULL,'Encontrarse con familiares ',1,'',1,'Vivías en USA',NULL,'','','Intentar Cruzar otra vez ',NULL,12,2,NULL,NULL,NULL,'Sasabe','','2014-04-07 15:00:00',NULL,'Santa Ana ',26,1,'Carretera ','Extorsión ',NULL,9,1,'Nogales','Altar ','4','No esccuho','No escucho ','Blanco','No vio ','Si',8,1,'No vio ','<p>\n	Anselmo Caly intento cruzar a estados unidos por el desierto de Sasabe Sonora; camino 4 d&iacute;as y lo encontr&oacute; la patrulla fronteriza &nbsp;despu&eacute;s estuvo detenido 2 d&iacute;as y fue deportado por la ciudad de Nogales Arizona, ya deportado busco ayuda ya que no contaba con dinero para comida ni hospedaje, preguntando llego a un albergue ah&iacute; los voluntarios le ayudaron para completar su pasaje para que viajara a Altar. Ese mismo d&iacute;a tomo el autob&uacute;s el cual alrededor de las 3:00 de la tarde hizo una parada en dicho ret&eacute;n que se encuentra a pocos minutos saliendo de la ciudad de Santa Ana, subieron dos oficiales y bajaron a un total de 9 personas &uacute;nicamente migrantes, los llevaron a un costado del autob&uacute;s y ah&iacute; le oficiales en los que tambi&eacute;n se encontraban dos mujeres les explicaron que todo migrante que pasara por esta ruta ten&iacute;a que dejar una cuota de 300 pesos si quer&iacute;an seguir su camino. Anselmo solo contaba con 50 pesos que le hab&iacute;an sobrado de la compra del boleto y le dijo que solo eso e hab&iacute;a quedado a lo que los oficiales le dijeron que se los quedaban pero tambi&eacute;n lo registraron para ver si ten&iacute;a algo m&aacute;s de valor que pudiera dejar; al no encontrarle nada lo maltrataron y lo jalonearon los oficiales, a las dem&aacute;s personas si lograron robarle poco m&aacute;s de 300 pesos a cada uno, as&iacute; continuaron su camino.</p>\n','300 pesos cada uno ',2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(21,'Q-42-14 ','2014-04-11 00:00:00',1,1,NULL,'Falta de trabajo ',2,'Mujer e hija',1,'Vivías en USA',1,'Mujer e hija','','intentar cruzar otra vez',1,12,2,NULL,NULL,NULL,'','','2014-04-08 21:00:00',NULL,'Nogales',26,1,'Al Salir de Migración ','caminar',NULL,1,10,NULL,NULL,'2','No escucho ','No escucho ','Verde con negro ','Policía Estatal ','Si',7,1,'Si pero no las distinguió ','<p>\n	$ &nbsp;3 600.00 y feria, lo mismo que cambi&eacute;. Sal&iacute; de Migraci&oacute;n, reci&eacute;n deportado despu&eacute;s de estar 8 meses en SSA. Sal&iacute; con 300.00 d&oacute;lares. Los feri&eacute; en las casa de cambio que hay ah&iacute; alrededor, sal&iacute; de la casa de cambio y como a 100 mts. me agarr&oacute; el polic&iacute;a. Dijo que me miraba sospechosos, que me iba a hacer una revisi&oacute;n y que si no ten&iacute;a documentos me iba a tener que detener. Me empez&oacute; a buscar, y como me vi&oacute; el dinero, empez&oacute; a contar y dijo: Nos vas a tener que acompa&ntilde;ar y el dinero se lo ech&oacute; a la bolsa. La mujer solo me pregunt&oacute; si ten&iacute;a familiares en Nogales, le dije que no. Me subieron a la patrulla y me llevaron a la delegaci&oacute;n. Ah&iacute; me detuvieron toda la noche y un d&iacute;a. Sin comer, solo me daban agua. &nbsp;Y dijeron que me hab&iacute;an encontrado droga. Yo les dije que me entregaran el dinero, pero dijeron: aqu&iacute; no llegaste con dinero. C&oacute;mo no, les dije, el que me quit&oacute; el polic&iacute;a, pero ellos ya lo hab&iacute;an hecho perdedizo.</p>\n','3600',2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(22,'Q-43-14','2014-04-11 00:00:00',3,1,NULL,'Escaces económica',1,'',1,'Al cruzar la frontera',2,'','','Intentar cruzar otra vez ',2,NULL,1,NULL,'7000',1,'Sasabe','California','2014-04-11 06:00:00',NULL,'Santa Ana',26,1,'Carretera ','Reten',NULL,2,1,'Nogales','Altar','5','No escucho','No escucho ','Blanco','No vio ','Si',8,1,'Si pero no las identifico','<p>\n	Juan Ram&iacute;rez intento cruzar el Desierto de Arizona y no lo logro ya que fue encontrado por la patrulla fronteriza y despu&eacute;s deportado por Nogales, Sonora: ah&iacute; logro comunicarse con sus familiares en E.U para pedirles dinero para el pasaje y para volver a intentar cruzar. Ya que le entregaron el env&iacute;o de dinero tomo un autob&uacute;s hacia Altar; saliendo de Santa Ana los detuvo un ret&eacute;n el cual desconoc&iacute;an de que era ya que no contaban con insignias ni los Agentes ni los veh&iacute;culos. Ya en el ret&eacute;n bajaron solamente a las personas que ven&iacute;an deportadas y les pidieron una cuota de 500 pesos a cada uno de ellos, Juan como es Huatemalteco decidi&oacute; pagar sin ning&uacute;n problema pero el compa&ntilde;ero que ven&iacute;a sentado a su lado era de Guerrero y no tra&iacute;a para pagar su cuota en dicho reten, as&iacute; que le dijeron a Juan que el ten&iacute;a que pagar tambi&eacute;n la de su compa&ntilde;ero por que insistieron en que ven&iacute;an juntos y que eran compa&ntilde;ero, aparte que ya hab&iacute;an visto los agentes que &eacute;l contaba con &nbsp;mas dinero, y as&iacute; fue que Juan tuvo que pagarles 1200 pesos para poder continuar su camino.</p>\n','1200',2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(23,'Q-44-14','2014-04-12 00:00:00',2,2,NULL,'Falta de Trabajo ',1,'',2,NULL,NULL,'','','Regresar a mi comunidad ',1,12,1,NULL,'5000',1,'Agua Prieta','Kentucky/California','2014-04-10 18:30:00',NULL,'Agua Prieta',26,1,'Calle','Petición de Auxilio ',NULL,2,3,'calle',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,'<p>\n	Marco Antonio (MA) lleg&oacute; a Agua Prieta el s&aacute;bado 5 de abril. Leoncio Mart&iacute;nez (LM) lleg&oacute; el mi&eacute;rcoles 2 de abril a AP. &nbsp;Cuando llegaron, a ambos, en distinto tiempo, los llevaron &nbsp;a la casa de hu&eacute;spedes que est&aacute; enfrente de la central; a MA, que ven&iacute;a de Tijuana, lo esper&oacute; en la central un hombre de nombre &quot;Miguel R.&quot; y ah&iacute; le dijeron que se alistara y comprara tres litros de agua y galletas porque supuestamente iba a cruzar ese mismo s&aacute;bado por la tarde, &quot;despu&eacute;s me fue avisar que nos fu&eacute;ramos que &iacute;bamos a alcanzar al gu&iacute;a, salimos de la casa de hu&eacute;spedes, cruzamos la central y en la calle del frente iba caminando un jovencito y Miguel me dijo que ese era el gu&iacute;a, que lo siguiera y me llevar&iacute;a &nbsp;a una casa; ah&iacute; ese Miguel se qued&oacute;, yo segu&iacute; al gu&iacute;a, nunca cruc&eacute; palabra con &eacute;l, hasta por enfrente del Elektra, ah&iacute; ya estaba un taxi y nos subimos, de ah&iacute; avanzamos recto, y llegamos a la primera casa, creo que de color azul fuerte, es como de infonavit, de dos pisos, nos metimos en la casa de la planta baja, tiene de protecci&oacute;n una reja negra, ah&iacute; conoc&iacute; a Leoncio, a esa casa llegu&eacute; el s&aacute;bado y estuve hasta la madrugada del lunes, cuando nos sacaron a m&iacute; y a Leoncio, en esa casa ya estaba el tal Iv&aacute;n</p>\n',NULL,NULL,NULL,'Perla del Angel',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'Q-45-14','2014-04-12 00:00:00',1,2,NULL,'Escaces económica ',1,'',1,'Al cruzar la frontera',2,'','','Regresar a mi comunidad ',1,2,1,NULL,'3700',1,'La Mascareña','Arizona','2014-04-02 00:00:00',NULL,'Nogales',26,1,'calle','Dijeron que nos iban a revisar que nos mirabamos como ratero',NULL,2,10,NULL,NULL,'3','No escucho','No escucho ','Negro','Policía Turística ','No',NULL,NULL,NULL,'<p>\n	Ibamos los dos caminando, ven&iacute;amos de con un amigo que fue a jugar al casino. Estaba una taquer&iacute;a. Ibamos a comer unos tacos y ah&iacute;u llegaron y que nos paran. Pidieron documentos y que si no, nos iban a llevar a la c&aacute;rcel, Nos revisaron y esculcaron todo para ver si tra&iacute;amos dinero para sacarnos. A m&iacute; me quitaron la credencial y ya no nos la quer&iacute;an regresar. El muchacho con el que iba, les dijo que iba a hablar con un cu&ntilde;ado que era licenciado y que con &eacute;l se iban a entender. Le llamamos a un se&ntilde;or, que era el gu&iacute;a que nos iba a llevar. Se asustaron y nos soltaron de volada.</p>\n',NULL,2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(25,'Q-46-14','2014-04-15 00:00:00',1,2,NULL,'Encontrarse con familiares',2,'Amigos',2,NULL,2,'','','Quedarse un tiempo en Nogales',1,9,2,NULL,NULL,NULL,'','','2014-01-13 08:00:00',NULL,'Matamoros',28,1,'calle','Iban caminando ',NULL,6,10,NULL,NULL,'2','No esucucho ','No escucho','Negro ','No vio ','Si',9,1,'No vio ','<p>\n	Lo deportaron por matamoros. EL consulado los llevo a la terminal, era &nbsp; un 13 de enero como a las 8pm. El consulado los llevo a la terminal &nbsp;los dejo como a una cuadra. Iban seis migrantes. Caminando hacia la terminal los interceptaron unas camionetas eran como 14 personas armadas entre ellos hab&iacute;an polic&iacute;as uniformados. Les dijeron que se tiraran al piso y los metieron en las camionetas. De ah&iacute; los llevaron a una galera &quot;un edificio abandonado con cuartos separados&quot; se escuchaba mucha gente gritando incluyendo ni&ntilde;os. Lo tuvieron desde el 14 de enero hasta el 28 de febrero. Cada d&iacute;a entraban amenazando o matarlo. Estas personas llamaban a las familias para sacar dinero. Tambi&eacute;n vieron como para amenzar a los dem&aacute;s mataban a migrantes y dec&iacute;an que si ellos no pagaban tambi&eacute;n los matar&iacute;an. Con Jose iban 6 muchachos al momento del secuestro. El 28 de Febrero cuando la mafia ya los quer&iacute;a sacar de ah&iacute; los mandaron en una patrulla municipal la patrulla era &nbsp;numero 19 el no pudo ver mas. Ah&iacute; subieron a cuatro &nbsp;muchachos. Uno de ellos era de sinaloa Jose lu&iacute;s Aguirre, el ya iba muerto, tambi&eacute;n hab&iacute;a un hondure&ntilde;o Ernesto al cual le hab&iacute;an cortado la lengua un muchacho del D.F llamado seraf&iacute;n Aguilar y &nbsp;Jose. Salieron de la galera en una carretera de tierra despu&eacute;s pararon el carro y los tiraron cada uno en un lugar diferente. &nbsp; Iban 2 polic&iacute;as en el carro manejando. El que iba manejando no los quer&iacute;a matar, pero el otro dec&iacute;a que eran basura y que hab&iacute;a que matarlos. Uno de los dos polic&iacute;as el que los agredi&oacute; mas era gordo y &nbsp;moreno. &nbsp;Unas hermanas de un albergue guadalupano los encontraron los curaron y les consiguieron boletos para ir a Monterrey. &nbsp;Durante el secuestro Al muchacho de Sinaloa le quitaron 1500 d&oacute;lares. Le cortaron las manos los dedos los brazos y despu&eacute;s la cabeza. A Jose le quitaron 600 dd&oacute;lares. &nbsp;</p>\n',NULL,2,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(26,'Q-47-14','2014-04-16 00:00:00',1,2,NULL,'Violencia',2,'Amigos',2,NULL,2,'','','No contestó',1,NULL,2,NULL,NULL,NULL,'','','2014-05-04 17:00:00',NULL,'Palenque',7,1,'Carretera','Reten',NULL,15,NULL,'combi',NULL,'10','No escuho','No escucho ','Negro','Policía Federal','Si',9,NULL,'Si pero no las identifico','<p>\n	La primera vez, lo primero fue pedir el documento de identificaci&oacute;n. Tra&iacute;amos la de elector de Guatemala. Como no tra&iacute;amos el documento, nos dijeron que nos iban a entregar a Migraci&oacute;n, en forma brusca y con amenaza y golpes. Despu&eacute;s piden que arrojes todo el dinero que traes. Nos rompieron el pantal&oacute;n y hasta la ropa interior para buscar el dinero. Igual con las mujeres. Nos quitaron todo el dinero que tra&iacute;amos. En total hemos perdido alrededor de $ 20 000.00 porque en cada vez nos registran hasta las partes &iacute;ntimas. Volvemos a pedir y es el que nos quitan enseguida. Todo el camino lo hemos hecho as&iacute;.</p>\n','20000',2,NULL,NULL,NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(27,'Q-48-14','2014-04-16 00:00:00',2,2,NULL,'Falta de Trabajo ',2,'Con su Hijo ',1,'Al cruzar la frontera',2,'','','Regresar a mi pueblo',1,12,1,NULL,'3500',1,'Agua Prieta','Philadelphia','2014-05-11 18:30:00',NULL,'Agua Prieta',26,1,'calle','Revisión',NULL,2,10,NULL,NULL,'3','No escucho','No escucho ','3','Policía Municipal','Si',9,1,'no','<p>\n	Nosotros vivimos en Metztitl&aacute;n, Hidalgo. Salimos juntos de Pachuca, Hgo. el 20 de marzo de 2014, salimos aproximadamente a las 6:00pm en un autob&uacute;s particular que ya ven&iacute;a de otro lugar con otras personas, todas ven&iacute;amos a la frontera a cruzar a los Estados Unidos, el autob&uacute;s vendr&iacute;a repartiendo a las personas aqu&iacute; en AP, Nogales y Altar. Ven&iacute;a lleno, no s&eacute; exactamente cu&aacute;ntos. El autob&uacute;s nos cobr&oacute; 2000 pesos por cada uno. &nbsp;El autob&uacute;s entr&oacute; por Chihuahua y fue donde pasamos como cinco retenes de sicarios. En unos retenes si pidieron dinero, el chofer del cami&oacute;n en tres ocasiones nos avis&oacute; que a tal tiempo &iacute;bamos a pasar un ret&eacute;n y deb&iacute;amos prepararnos con la cuota, una fue de 50 pesos c/u y la otra de 200 pesos c/u, el chofer recog&iacute;a el dinero y cuando lleg&aacute;bamos al ret&eacute;n no sab&iacute;amos si en verdad daba el dinero. Llegamos a AP el s&aacute;bado en la madrugada, como a la 1 o 2am, nos bajamos sobre la carretera y un amigo que ven&iacute;a en el cami&oacute;n nos dio el n&uacute;mero de un taxista, este lleg&oacute; y nos dijo que que nos recomendaba el tres caminos, que el de m&aacute;s confianza. Ah&iacute; nos llev&oacute; y salimos despu&eacute;s y buscamos qui&eacute;n nos llevara para el otro lado, encontramos quienes nos cobraban 4000 o 4500 y pues ya encontramos uno que nos pasar&iacute;a por 3500 y con &eacute;l cruzamos por AP entre el km 15 y 17, el martes 25 de marzo de 2014 y ese d&iacute;a nos mantuvieron en la l&iacute;nea &nbsp;hasta el s&aacute;bado 29 de marzo de 2014, ese d&iacute;a ya cruzamos la l&iacute;nea, caminamos hasta s&aacute;bado 5 de abril de 2014 y ese d&iacute;a nos detuvo migraci&oacute;n. El domingo por la noche, como a las 9:30pm fuimos repatriados por aqu&iacute; mismo en AP. Ese d&iacute;a nos venimos a la casa del migrante. Aqu&iacute; esperamos a un sobrino m&iacute;o que hab&iacute;an detenido junto con &nbsp;nosotros y lo sacaron en Coahuila, entonces esperamos hasta &nbsp;el 11 de abril de 2014 que lleg&oacute; mi sobrino aqu&iacute; a AP. Salimos en la ma&ntilde;ana del viernes de aqu&iacute; y nos habl&oacute; mis sobrino de que estaba en un hotel y ya fuimos para all&aacute;, mi sobrino no me hab&iacute;a comentado que en el camino encontr&oacute; un se&ntilde;or que ofrec&iacute;a llevarlos al otro lado, entonces cuando llegamos al hotel, &eacute;l ya hab&iacute;a decido irse con ese se&ntilde;or, entonces el se&ntilde;or mand&oacute; a comprar sus cosas, como celular, porque se iban a ir en ese momento y este yo me regreso al parque que est&aacute; frente a la iglesia (Plaza Azueta frente a Iglesia de Guadalupe) y de ah&iacute; eran la 1:30pm y nos fuimos al Centro de Recursos para Migrantes y nos fuimos por la avenida 4 y llegamos hasta la calle primera y ah&iacute; un polic&iacute;a nos detiene cuando s&oacute;lo &iacute;bamos pasando, &eacute;l me pidi&oacute; una identificaci&oacute;n a m&iacute; (JG) y tambi&eacute;n la de mi hijo, y yo contest&eacute; que era mi hijo, a mi hijo lo orill&oacute; como a una puerta y a m&iacute; afuera de la banqueta y me pidi&oacute; que me pegara a la pared, despu&eacute;s el polic&iacute;a se dirigi&oacute; a mi hijo</p>\n<p>\n	&nbsp;</p>\n',NULL,NULL,NULL,'Perla del Angel',NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(28,'Q-49-14','2014-05-19 00:00:00',1,2,NULL,'Falta de Trabajo ',2,'Amigos ',2,NULL,NULL,'','','No contestó',1,9,2,NULL,NULL,NULL,'','','2014-03-21 12:00:00',NULL,'Palenque',7,1,'carretera ','Reten',NULL,12,NULL,'La Técnica','Palenque ','5','No escucho','No escucho ','Negro','Policía Federal','Si',9,2,'No vio ','<p>\n	Darwin iba en una combi el se monto en la t&eacute;cnica &nbsp;y saliendo a 5 minutos despu&eacute;s de la t&eacute;cnica. &nbsp;Hab&iacute;an 2 patrullas y aproximadamente 5 polic&iacute;as eran aprox las 12 del mediod&iacute;a, era el 21 de marzo. Hab&iacute;an 10 migrantes en la combi. Los pararon y los policias &nbsp;hablaron con el chofer. EL chofer &nbsp;empez&oacute; a acosarlos &nbsp;diciendo que ten&iacute;an que dar el dinero y que si no el perd&iacute;a sus 200 pesos. El conductor le saco a cada uno 300 pesos, para pagarle a los polic&iacute;as. Los polic&iacute;as ten&iacute;an uniformes negros con bandera en el brazo. Cree que eran polic&iacute;as federales.</p>\n','300 cada uno ',2,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'No vio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(29,'Q-50-14','2014-04-19 00:00:00',1,2,NULL,'Falta de Trabajo ',1,'',1,'Al cruzar la frontera',2,'','','Intentar cruzar otra vez',1,9,2,NULL,NULL,NULL,'','','2014-04-17 15:00:00',NULL,'Nogales ',26,1,'Calle','Estaban comprando ',NULL,2,10,NULL,NULL,'3','No escucho','No escucho','No contestó','No vio','Si',9,1,'No vio ','<p>\n	Est&aacute;bamos afuera del Oxo para llamar por tel&eacute;fono. Ellos llegaron, nos pidieron identificaci&oacute;n, nos dijeron que sac&aacute;ramos todo lo que tra&iacute;amos y nos hicieron que lo pusi&eacute;ramos frente al ve&iacute;culo de ellos. Nos hicieron que pusi&eacute;ramos todo lo de la mochila. Ah&iacute; saqu&eacute; $ 300.00 que tra&iacute;a. Dijeron que guard&aacute;ramos todo y nos subi&eacute;ramos a la Patrulla. Nos trajeron a la &uacute;ltima calle arriba del cementerio. Estando all&aacute;, se pararon y nos dijeron que si quer&iacute;amos ir all&aacute; al cuartel 36 horas o que si les d&aacute;bamos para la gasolina. Nosotros dijimos que no quer&iacute;amos ir a dormir encerrados y preguntamos cu&aacute;ntoo era la multa all&aacute;. Dijeron que $ 500.00 por cada uno. Yo les dije que lo &uacute;nico que tra&iacute;a es lo que hab&iacute;an visto. Los $ 300.00 .Dijeron que estaba bien, que se los di&eacute;ramos y nos dejaban ir, pero que no le dijp&eacute;ramos a nadie lo que hab&iacute;a pasado. All&iacute; nos bajaron, agarraron el dinero y se fueron y nos dejaron all&aacute; arriba.</p>\n','300',2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(30,'Q-51-14','2014-05-19 00:00:00',1,2,NULL,'Escaces económica ',1,'',2,NULL,2,'','','Intentar cruzar otra vez ',1,7,2,NULL,NULL,NULL,'','','2014-02-06 18:00:00',NULL,'Talisman',7,1,'Oficinas ','Solicitar permiso de trabajo ',NULL,1,10,NULL,NULL,'1','No recuerda','No sabe','No recuerda','No recuerda','No',NULL,NULL,NULL,'<p>\n	Fui a la Aduana a solicitar permiso de trabajo en Chiapas. Con la persona que llegu&eacute; para llenar la solicitud me quer&iacute;a cobrar 600 quetzales, cuando yo ya hab&iacute;a visto que la solicitu era gratis. Yo lo que quer&iacute;a era ingresar legalmente, como no se pudo, lo tuve que hacer en forma ilegal.</p>\n',NULL,2,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'No recuerda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(31,'Q-52-14','2014-04-21 00:00:00',1,2,NULL,'Falta de Trabajo',2,'Hermano ',1,'Al cruzar la frontera',1,'Hermano ','NO','Esperar en la ciudad ',1,7,2,NULL,NULL,NULL,'','','2014-05-19 00:00:00',NULL,'Nogales ',26,1,'oficina ','Solo traía acta de nacimiento ',NULL,2,10,NULL,NULL,'1','No sabe','No sabe','No recuerda','INM','No',NULL,NULL,NULL,'<p>\n	Llegaron deportados los dos: &eacute;l y su hermano que no tra&iacute;a credencial de elector porque a penas va a cumplir 18 a&ntilde;os. Tra&iacute;a Acta de naciemiento. Y el de Migraci&oacute;n, se aferr&oacute; en decir que no era mi hermano , cuando tenemos los mismos apellidos. Dijo que era acta falsa, y que a &eacute;l lo iba a regresar &nbsp;con Migraci&oacute;n de Estados Unidos porque dijo: &quot;me trae mala espina, este no es mexicano&quot; Y estaba viendo el acta. Dijo que era falsa.</p>\n',NULL,2,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'No recuerda ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(32,'Q-53-14','2014-04-22 00:00:00',1,2,NULL,'Falta de Trabajo ',2,'Primo',1,'Al cruzar la frontera',2,'','','Intentar Cruzar Otra Vez',1,8,1,NULL,'4000',1,'Altar Sonora ','Virginia ','2014-04-11 14:00:00',NULL,'Sonora',26,1,'Carretera','Tener apariencia de Centroamericanos ',NULL,45,1,NULL,NULL,'15','No escucho','No escucho ','Azul ','PGR','Si',7,7,'Si pero no las identifico','<p>\n	Llegamos al lugar y nos pararon. Exigieron que quer&iacute;an un recurso econ&oacute;mico para dejarnos pasar sin hacernos ninguna revisi&oacute;n. Muchos de nosotros tra&iacute;amos pocos recursos y les dijimos que no tra&iacute;amos recursos para aportar. Quer&iacute;an 250.00 por personas. Unos empezaron a darlo y como muchos no aport&aacute;bamos, empezaron a bajar a todos pidi&eacute;ndoles identificaciones, credencial con fotograf&iacute;a. A muchos mexicanos, aunque se identificaban, dec&iacute;an que eran centro-americanpos. Despu&eacute;s nos bajaron a todos y nos empezaron a meter dentro de la capilla uno por uno y nos exigieron que sac&aacute;ramos todas las pertenencias que llev&aacute;bamos en las bolsas. Despu&eacute;s d poner las pertenencias sobre la mesa, se dirig&iacute;an y tomaban nuestra cartera y tomaban el dinero que ellos quer&iacute;an. Uno de mis compa&ntilde;eros le tomaron $ 8 000.00 y lo amenazaron. Le dijeron que eran parte de la mafia y que si los deportaba, lo iban a matar. As&iacute; fueron diversos robos. A m&iacute; s&oacute;lo me tomaron 500.00 porque era lo &uacute;nico que tra&iacute;a. Tambi&eacute;n lleg&oacute; una mujer de la PGR y ella se encarg&oacute; de revisar a las mujeres, que eran como 12 mujeres. Las form&oacute; en una fila y las esculc&oacute;, toc&aacute;ndolas. Despu&eacute;s met&iacute;an de una por una en una camioneta cheroky, como azul, sin placas , las cuestionaban, a parte de llas les quitaron recursos y las agrdieron verbalmente. Ven&iacute;an tres personas de centro-am&eacute;rica. Ellos tuviron que pagar $ 10, 000.00 por cada uno para que los dejaran pasar. Como ellos quer&iacute;an pasar, lo pagaron. Porque amenazaron que iban a llamar a migraci&oacute;n si noio pagaban.</p>\n',' ',2,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(33,'Q-54-14','2014-04-22 00:00:00',1,2,NULL,'Falta de trabajo ',1,'',2,NULL,NULL,'','','No contestó',1,2,2,NULL,NULL,NULL,'','','2014-04-01 05:15:00',NULL,'Comitán ',7,1,'Carretera','Reten',NULL,2,NULL,'Combi Trinidad','Comitán ','2','No escucho','Henry','Obscuro','Judicial ','Si',7,1,'Si pero no las identifico','<p>\n	Gustavo iba entrando a Comitan, hab&iacute;a salido del pueblo de trinidad y a mitad de camino hab&iacute;a un reten. &nbsp;Iba en combi, y habian dos agentes, y una patrulla. Pararon &nbsp;se subieron &nbsp;y a Gustavo con otro hondure&ntilde;o los bajaron. El iba con una chica hondure&ntilde;a. &nbsp;Les dijeron que ten&iacute;an que &quot;mocharse&quot; con dinero, a Gustavo lo esposaron y le sacaron el dinero. &nbsp;A la mujer le buscaron dinero y despu&eacute;s se la llevaron a la patrulla. Durante ese tiempo le pidieron &quot;favores sexuales&quot; ella se neg&oacute; y empez&oacute; a llorar.</p>\n',NULL,NULL,NULL,'Natalia Serna ',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(34,'Q-54-14 ','2014-04-23 00:00:00',1,2,NULL,'Falta de trabajo ',1,'',2,NULL,2,'','','No contestó',1,8,2,NULL,NULL,NULL,'','','2014-05-23 07:01:00',NULL,'Nogales ',26,1,'Carretera','Reten',NULL,6,4,'Hermosillo','Nogales','2','No escucho','No escucho ','Negro ','Federal','Si',9,1,'No','<p>\n	El 23de Abril llegando a Nogales eran como las 7am.. Iban &nbsp;6 migrantes. &nbsp;Un polic&iacute;a armado se subi&oacute; y uno se quedo uno abajo. El cree que son federales pero podr&iacute;an ser municipal o federal, el que lo bajo llevaba la pantal&oacute;n azul oscuro camisa azul de manga larga, tenia insignia de polic&iacute;a. no hab&iacute;a patrulla. El que se subi&oacute; dijo que se tiraran &nbsp;los revisaron y los bajaron a fuerza. Los revisaron a todos y los acusaron de cargar droga. Ellos dijeron que no ten&iacute;an nada. &nbsp;</p>\n',NULL,NULL,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(35,'Q-56-14','2014-04-23 00:00:00',1,2,NULL,'Falta de Trabajo ',1,'',2,NULL,2,'','','Intentar cruzar de nuevo ',1,9,2,NULL,NULL,NULL,'','','2014-04-12 16:01:00',NULL,'Estado de México ',15,1,'Abordo de un taxi','viajar en un taxi',NULL,2,3,NULL,NULL,'3','No escucho ','No escucho ','Azul','Policía Municipal ','Si',7,1,'Si pero no las identificó','<p>\n	Ibamos los tres en el taxi a la terminal de combis para ir a Huehuetoca. El taxi lo tomamos en &nbsp;cerca del aeropuerto. El taxi pas&oacute; por donde estaba la polic&iacute;a. La polic&iacute;a se le peg&oacute; atr&aacute;s y le hizo se&ntilde;a que se parara. El taxista se par&oacute;. Le pidieron papeles. Se los entreg&oacute; y la polic&iacute;a se qued&oacute; con ellos y le dijeron que los siguiera. El taxi los sigui&oacute; y nos llevaron a un callej&oacute;n cerrado, donde no hay casas. Nos bajaron y empezaron a preguntar de d&oacute;nde ven&iacute;amos. Dijimos que de Honduras. Esperaban que de nuestra cuenta saliera que ofreci&eacute;ramos dinero. No lo hicimos. Les dijimos que no &quot;and&aacute;bamos&quot; = tra&iacute;amos. Entonces nos empezaron a registrar, hasta el pantal&oacute;n nos bajaron. Y nosotros cre&iacute;amos que s&oacute;lo buscaban drogas, pero no. Nos quitaron todo el dinero que tra&iacute;amos. Yo solo tra&iacute;a 100.00. La verdad no tra&iacute;amos dinero. Los otros no supe cu&aacute;nto, porque hab&iacute;an pedido un dinero que la familia les mand&oacute;.</p>\n',NULL,2,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(36,'Q-57-14 ','2014-04-25 00:00:00',1,2,NULL,'Quiere darle mejor vida a sus hijos ',1,'',1,'Al cruzar la frontera',1,'Compañeros ','Dos están perdidos en el desierto ','Regresar a mi comunidad ',1,8,1,NULL,'3500',1,'Agua Prieta','California ','2014-04-07 16:01:00',NULL,'No sabe ',NULL,1,'Autobús ','Reten ',NULL,40,2,NULL,NULL,NULL,'No escuho ','No escucho ','','','No',NULL,NULL,NULL,'<p>\n	Pagu&eacute; 1000.00 de cuotas. Yo no s&eacute; en qu&eacute; lugares fue, pero nos paraban, fueron 5 garitas, s&iacute; ve&iacute;a abajo los polic&iacute;as y camionetas, pero los choferes nos ped&iacute;an las cuotas. Nos dec&iacute;an que ten&iacute;amos que dar esa cooperaci&oacute;n, porque si no, se iban a subir y nos iban a bajar. Recog&iacute;an por parejo, 200.00 por persona. El autob&uacute;s es como de 40 personas. Nos ped&iacute;an el dinero, lo recog&iacute;an, se bajaban y lo entregaban, y sub&iacute;an y continu&aacute;bamos sin que subiera nadie al autob&uacute;s.</p>\n','200 cada uno ',2,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'No vio ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(37,'Q-58-14','2014-04-28 00:00:00',1,2,NULL,'Falta de trabajo ',2,'Amigos ',2,NULL,2,'','','Intentar cruzar otra vez ',1,NULL,2,NULL,NULL,NULL,'','','2014-04-24 20:01:00',NULL,'Orizava ',30,1,'Tren','Revisión ',NULL,4,4,'Coatzacualcos','Lechería','no contestó','no contestó','No contestó','no contestó','No contestó',NULL,4,NULL,NULL,'<p>\n	aprox el 20 de abril , eran aprox 8pm. Saliendo de orizaba se subieron &nbsp;unos hombres, ellos pensaron que eran guardias pues llevaban uniforme negro. &nbsp;Se montaron y les dijeron que sacaran todo mochila, zapatos, dinero. Iban 4 que estaban viajando y sufrieron el robo. Lllevaban pasamonta&ntilde;as y armados con un cuchillo. Iban de negro con una franja roja sobre la pierna, parec&iacute;an guardias del tren, llevaban tambi&eacute;n una lampara en la cabeza para ver.</p>\n',NULL,NULL,NULL,'Natalia Serna ',NULL,NULL,NULL,NULL,'No contestó',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(38,'Q-09-14','2014-02-28 00:00:00',2,2,NULL,'Falta de trabajo',NULL,'',1,'Al cruzar la frontera',NULL,'','','intentar cruzar de nuevo',1,8,NULL,NULL,NULL,1,'Naco','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Perla del Ángel',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'Q-10-14','2014-02-28 00:00:00',2,2,NULL,'Falta de trabajo',NULL,'',1,'Al cruzar la frontera',NULL,'','','Intentar cruzar otra vez',1,2,NULL,NULL,NULL,NULL,'','','2014-02-13 20:00:00',NULL,'Casa Grandes',8,1,'carretera','retén',NULL,2,1,'México, D.F.','Cananea, Sonora','2','','','','',NULL,NULL,NULL,NULL,'<div>\n	&nbsp;Ven&iacute;amos en el &oacute;mnibus chihuahuemses yo y mi primo, nos dirig&iacute;amos a Cananea, Sonora, cuando unas personas como polic&iacute;as civiles, porque no tra&iacute;an uniforme (pantal&oacute;n color hueso y camisa negra), pararon el &oacute;mnibus y empezaron a preguntar cu&aacute;l era nuestro destino y les dijimos que eran Cananea y luego pregunt&oacute; &quot;qu&eacute; van a hacer all&aacute;?&quot;, le contest&eacute; que a trabajar con mi t&iacute;o. Despu&eacute;s, nos dijo a los dos, &quot;ustedes b&aacute;jense para revisarlos&quot; y nos meti&oacute; el chavo a un cuarto y dijo que sac&aacute;ramos todo &nbsp;lo que tra&iacute;amos y lo sacamos, me dijo a m&iacute; &quot;tu ya puedes irte&quot; y se quedaron revisando a mi primo. Cuando otro hombre lleg&oacute; a donde nos revisaron, sac&oacute; al chavo y mand&oacute; a una mujer a bajarme del &oacute;mnibus y me metieron al mismo lugar donde estaba mi primo y nos pregunt&oacute; el otro se&ntilde;or que de d&oacute;nde &eacute;ramos y le dije que somos oaxaque&ntilde;os y le ense&ntilde;&eacute; mi credencial de elector y pregunt&oacute; &quot;d&oacute;nde lo sacaste?&quot; y le dije que en el centro de Oaxaca estaba un IFE y me pregunt&oacute; &quot;c&oacute;mo se llama&quot; yo le dije que no recuerdo el lugar exactamente y nos cre&iacute;a, a fuerza quer&iacute;a el lugar donde lo hab&iacute;a sacado y luego nos dijo &quot;ustedes no son mexicanos y si quiero ahorita los regreso conmigo, adem&aacute;s, traes un menor de edad&quot;, pero le dije que somos libres de andar en M&eacute;xico porque somos mexicanos y dijo &quot;a m&iacute; no me hables as&iacute;, para que sigan su camino tienen que cooperar&quot; y yo le contest&eacute; &quot;c&oacute;mo?&quot; porque no hab&iacute;a entendido, &eacute;l dijo &quot;si, tienen que ponerse a mano, me entienden o no?&quot; y le pregunt&eacute; &quot;con dinero?&quot;, &eacute;l respondi&oacute; &quot;pues si, quiero 1000 varos por cada uno&quot; y le dije que era mucho, que le doy 500 cada uno y &eacute;l dijo &quot;no, los 1000 varos cada uno o ahorita los retacho para atr&aacute;s&quot;. Pues ni modo, tuvimos que dar los 1000 pesos cada uno. Despu&eacute;s dijo &quot;de esto que no se entere nadie, ni al chofer le digan porque es mi cuate y si cuentan de esto van a valer madre&quot; y le dijimosque si y recogimos las cositas, nos fuimos y nos dijo &quot;que les vaya muy bien muy bien&quot;&acute;, as&iacute; 2 veces, como burl&aacute;ndose con una risa. No le dijimos nada al chofer y nos sentamos. &nbsp; Le hablamos -por tel&eacute;fono- al pap&aacute; de mi primo y le comentamos, mi t&iacute;o dijo que esos no son polic&iacute;as, son estafadores. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Perla del Ángel',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No'),(40,'Q-11-14','2014-03-04 00:00:00',1,2,1,'falta de trabajo',2,'Esposa y papá',1,'Al cruzar la frontera',1,'papá','no','regresar a mi comunidad',1,2,1,NULL,'no dijo',1,'Sasabé','no dijo','2014-03-04 10:00:00',NULL,'Hermosillo',26,1,'retén ','revisión',NULL,10,1,NULL,NULL,NULL,'','','negro','',NULL,9,1,NULL,'<div>\n	En el autob&uacute;s dijeron: Bajen todos, hay inspecci&oacute;n de rutina. Bajamos. Luego dijeron: Los que van a Tijuana, suban y se quedan los que van a Altar o Sono&iacute;ta. Como van a pagar a la mafia y es mucho dinero, nosotros aqu&iacute; somos la ley y nada m&aacute;s nos van a pagar $ 2oo. cada uno. Su pap&aacute; dijo: Pero por qu&eacute; ? y lo separaron y le dijeron: aqu&iacute; vas a pagar y si no, te vamos a revisar todo lo que traigas y va a ser para nosotros. Y les tuvimos que dar, porque ya a mi pap&aacute; casi lo golpeaban. A una se&ntilde;ora que tra&iacute;a ni&ntilde;os, le quitaron $ 1000.00 porque, seg&uacute;n lo que le dijeron, supon&iacute;an que era pollera.&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'Canalización a una instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(41,'Q-12-14','2014-03-08 00:00:00',1,2,2,'encontrarse con familiares',2,'amigos',2,NULL,NULL,'','','intentar cruzar otra vez',1,2,NULL,NULL,NULL,NULL,'','','2014-02-27 18:00:00',NULL,'Santa Cruz',26,1,'a las afueras de Santa Cruz',NULL,NULL,NULL,10,'Naco','Imúris','5','Alejandro','','','','Si',9,1,NULL,'<div>\n	El jueves 27 de Febrero a &nbsp;las 6pm aprox. &nbsp;Aniceto llego a Santa Cruz con la intenci&oacute;n de cruzar. Llegando a santa cruz lo intercepto una patrulla de la polic&iacute;a municipal. los llevaron a la comandancia &quot;iban 4&quot;ah&iacute; lo insultaron les pidieron sus pertenencias y les robaron el dinero a todos. Ah&iacute; permanecieron en un cuarto aislados. El comandante que se llamaba Alejandro los acusaba de ser coyotes y que no pod&iacute;an pasar por ah&iacute; pues por ah&iacute; se traficaba droga. Dec&iacute;a que si volv&iacute;an los golpear&iacute;an y que los pod&iacute;an entregar a la PGR diciendo que eran coyotes. Los montaron en un van y los mandaron hacia nogales el viernes en la ma&ntilde;ana del 28 de Feb. Ese mismo viernes volvieron a Santa Cruz y rodearon las v&iacute;as del tren para evitar la polic&iacute;a. Caminaron 7km pasaron el pueblo y se desviaron a la izquierda. Se extraviaron y amanecieron el s&aacute;bado a las afueras del pueblo. En la ma&ntilde;ana como se ve&iacute;an perdidos volvieron hacia el pueblo. Como a la 1pm se encontraron otro grupo cerca a la sierra santa cruz eran 12 persona ind&iacute;genas. Todos regresaron hacia el pueblo, los ind&iacute;genas adelante del grupo de Aniceto. Era una carretera de tierra que se estaba preparando &nbsp;para pavimentar pues hab&iacute;a maquinaria. Como a las 2pm se encontraron con una camioneta explorer a como verde oscuro con vidrios oscuro y sin placas. Salieron 4 polic&iacute;as y el comandante uniformados de azul oscuro. Salieron armados y amenazando con matarlos si no paraban. Detuvieron al grupo entero de 16 personas &nbsp;y llegaron con un &nbsp;pick up chevrolet para llev&aacute;rselos a la comandancia. &nbsp;Llegaron a la comandancia aprox a las 4:30 pm ah&iacute; empezaron a insultarlos preguntando quien era el coyote. Despu&eacute;s golpearon aun muchachos, despu&eacute;s le pegaron a 3 de los compa&ntilde;eros de Aniceto. &nbsp;Los obligaron a poner sus pertenencias en bolsas de pl&aacute;stico. Estuvieron ah&iacute; hasta las 11pm, y de ah&iacute; los trasladaron en una patrulla y los dejaron cerca a nogales. Aprox a 4km a las afueras de Nogales. Ah&iacute; les devolvieron algunas de sus pertenencias pero robaron la mayor&iacute;a de celulares y dinero. &nbsp;A Aniceto le robaron 500 pesos en la primera detenci&oacute;n y 1000 en la segunda.&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(42,'Q-13-14','2014-03-10 00:00:00',1,1,3,'económico',2,'amigos',NULL,NULL,NULL,'','','intentar cruzar otra vez',NULL,NULL,NULL,NULL,NULL,NULL,'','','2014-03-05 22:30:00',NULL,'Casa Blanca',26,1,'carretera','retén',NULL,15,1,'México, D.F.','Nogales','5','','','azul marino','',NULL,NULL,NULL,NULL,'<div>\n	Renato sali&oacute; de la ciudad de M&eacute;xico en bus. El paso chihuahua y llegando a Casa Blanca los bajaron en un reten. Sacaron a todos los hombre &nbsp;del bus los fueron llevando de a uno a uno a la capilla que se encuentra al lado de la carretera y les dijeron que sacaran su dinero y las pertenencias. Despu&eacute;s de amenazarlos los forzaron a sacar sus pertenencias. Despu&eacute;s de haberles quitado las cosas los devolvieron al bus. Esto ocurri&oacute; aprox a 5 km de casablanca. &nbsp; &nbsp;&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Natalia Serna',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(43,'Q-14-14','2014-03-10 00:00:00',2,2,1,'falta de trabajo',2,'concubina',1,'Al cruzar la frontera',1,'concubina','está detenida','esperar en esta ciudad',1,8,1,NULL,'6000 dólares',1,'Naco','Phoenix','2014-02-25 13:00:00',NULL,'Sinaloa',25,1,'carretera','retén',NULL,2,1,'México, D.F.','Tijuana','3','','','azul marino','no tenían','Si',NULL,1,NULL,'<div>\n	Sal&iacute; con mi esposa de la Central del Norte de la Ciudad de M&eacute;xico el 24 de febrero de 2014 aproximadamente a la 1:00pm, nuestro destino final fue Sonoyta, el autob&uacute;s se dirig&iacute;a a Tijuana. Al d&iacute;a siguiente, 25 de febrero, aproximadamente a la 1:00pm el autob&uacute;s se detuvo en un ret&eacute;n antes de salir de Sinaloa, se subieron 3 personas (2 hombre y 1 mujer) con taladros, revisaron atr&aacute;s del chofer, sacaron algunos tornillos. Despu&eacute;s siguieron por el pasillo preguntando algunas cosas y solicitando identificaci&oacute;n pero no a todos. Cuando llegaron al lugar donde est&aacute;bamos mi esposa y yo nos preguntaron que a d&oacute;nde &iacute;bamos, de d&oacute;nde ven&iacute;amos. Nos llevaron a los dos hasta el final del autob&uacute;s, a los dos nos revisaron, a mi un hombre y a mi esposa una mujer, pero a ella &quot;le metieron la mano hasta donde no&quot;, fue muy exagerada la revisi&oacute;n. A m&iacute; me quitaron mis zapatos y mi cartera, uno de los agentes la tom&oacute; y la abri&oacute; y pregunt&oacute; cu&aacute;nto dinero tra&iacute;a mientras la abr&iacute;a y contaba el dinero, yo le dije que tra&iacute;a como 3000 pesos. Me dijo que ten&iacute;a que darles 200 pesos por cada uno porque as&iacute; eran las cosas, &acute;&quot;as&iacute; es ahorita, tienes que dar&quot;, yo le dije que era un robo, que no le pod&iacute;a dar eso porque al llegar ten&iacute;amos que pagar hospedaje y comida, pero el agente me dijo que ten&iacute;a que darlos porque si no lo hac&iacute;a vendr&iacute;a el comandante y me quitar&iacute;a m&aacute;s. Entonces yo le dije que si quer&iacute;a le pod&iacute;a dar 250.00, al momento tem&iacute; que me quitaran todo el dinero, tem&iacute; por mi esposa, de que me quitaban todo no tendr&iacute;a para la comida. Al final, ellos aceptaron los 250 pesos diciendo &quot;ya &eacute;chalos aunque sea&quot;,creo que me dijeron que me sentara y no dijera nada y se bajaron. Abajo estaba un veh&iacute;culo pick up blanco (ni me fij&eacute; si ten&iacute;a otro color), pero no me di cuenta si era patrulla, y hab&iacute;a m&aacute;s personas aparte de las que subieron al autob&uacute;s. Nosotros cruzar&iacute;amos por Sonoyta, pero el que nos iba a llevar no se puso activo y nos cambiamos con otro que nos cruz&oacute; por Naco.</div>\n<div>\n	&nbsp;</div>\n',NULL,2,NULL,'Perla del Ángel',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(44,'Q-15-14','2014-03-11 00:00:00',1,2,2,'falta de trabajo',2,'amigos',1,'Al cruzar la frontera',2,'','','intentar cruzar otra vez',1,2,NULL,NULL,NULL,1,'Nogales','Nueva York','2014-03-23 23:00:00',NULL,'Palenque',7,1,'trayecto ','camioneta',NULL,9,NULL,NULL,NULL,'4','','','','',NULL,NULL,NULL,NULL,'<div>\n	Tomaron una comby. Les sacaron dinero y los botaron. Caminaron y se montaron en otra. La polic&iacute;a los alcanz&oacute;, y les quit&oacute;, entre todos cinco mil pesos. Tambi&eacute;n a uno los zapatos.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'Canalización a una instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(45,'Q-16-14','2014-03-13 00:00:00',1,2,2,'encontrarse con familiares',NULL,'',1,'Vivías en USA',1,'esposa e hija','está en Phoenix','intentar cruzar otra vez',1,8,NULL,NULL,NULL,NULL,'','','2014-02-27 16:00:00',NULL,'Tuxtla',30,1,'carretera','autobús',NULL,4,1,NULL,NULL,'1','si','A. Nava','azul marino ','si Policía Federal','Si',9,NULL,NULL,'<div>\n	Est&aacute;bamos en Coatzacoalcos de ah&iacute; llegamos a Acayucan, de acayucan subimos a un bus para Puerto Veracruz ( 205.00 el boleto) Como a la hora y media de camino una se&ntilde;ora ten&iacute;a problemas respiratorios , de repente se par&oacute; el bus, lleg&oacute; el Federal, bajaron a la Sra. y se la llev&oacute; al hospital. Regres&oacute;, alcanz&oacute; el bus, lo par&oacute; y mand&oacute; al chofer a que bajara uno de los 4. Me dijo el federal: Cu&aacute;ntos pollos llevas? No, oficial, yo no me dedico a eso. No utiliz&oacute; violencia ni verbal ni f&iacute;sica. Luego dijo: bueno, me das 100 d&oacute;lares por cada uno o los entrego a migraci&oacute;n. Ante eso, yo le expliqu&eacute; que no ten&iacute;amos dinero. Entonces mand&oacute; bajar a los otros tres porque &iacute;bamos de regreso a nuestro pa&iacute;s. Se bajaron los otros tres, le dijo al autob&uacute;s que se fuera y a nosotros nos subi&oacute; a la patrulla, Caminamos por el espacio de 6 cuadras. Bueno, dijo, aj&uacute;stenme 1 300.00 entre los cuatro y los dejo, pero no lo vayan a decir a nadie. Entre los 4 ajustamos los $ 1300. y nos llev&oacute; y nos baj&oacute; en Matacapan, en un lugar de carros decomisados. De ah&iacute; nos fuimos caminando y nos quedamos con una buena familia. Nos quedamos a medio camino sin nada.</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'Canalización a una instancia','Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(46,'Q-17-14','2014-03-14 00:00:00',2,1,1,'falta de trabajo ',2,'hermano',1,'Vivías en USA',1,'hermano ','está detenido ','no sabe ',1,8,1,NULL,NULL,1,'','','2014-03-07 12:00:00',NULL,NULL,10,1,'carretarea','retén ',NULL,7,1,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Perla del Ángel',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,'Q-18-14','2014-03-14 00:00:00',2,1,1,'falta de trabajo ',1,'',1,'Al cruzar la frontera',NULL,'','','esperar en esta ciudad ',1,8,NULL,NULL,NULL,NULL,'','','2014-03-01 18:00:00',NULL,'Janos',8,1,'carretera ','retén ',NULL,NULL,1,'D.F.','Agua Prieta ','5','','','azul marino ','no tenía ','Si',7,1,NULL,'<div>\n	A todos los que ven&iacute;amos en el autob&uacute;s nos bajaron para revisarnos la cartera, ellos mismos tomabana el dinero sin nuestro consentimiento y el diinero lo iban echando como &nbsp;en una cubeta. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,NULL,'Adalberto Ramos',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(48,'Q-19-14','2014-03-14 00:00:00',1,2,2,'falta de trabajo ',2,'amigos',1,'Vivías en USA',2,'','','intentar cruzar otra vez',1,4,NULL,NULL,NULL,1,'Nogales ','','2014-03-13 17:00:00',NULL,'Nogales ',26,1,'calle','caminando para tomar el camión ',NULL,2,10,NULL,NULL,'2','','','azul','no tenía ','Si',9,1,NULL,'<div>\n	Fuimos a informar a qu&eacute; hora sal&iacute;a el tren a la estaci&oacute;n. Al regresar de ah&iacute; a donde tomar&iacute;amos el cami&oacute;n, nos encontr&oacute; la Polic&iacute;a. Frenaron y nos presionaron a subirnos. Nos llevaron a un solar bald&iacute;o. Y nos dijeron que si no les d&aacute;bamos el dinero, nos iban a llevar a encerrar 36 horas y a m&iacute; me iban a llevar a migraci&oacute;n. Nos sacaron todo de la mochila y nos quitaron el dinero $ 100.00 y $ 250. 00 respectivamente. Dijeron que no nos quer&iacute;an volver a ver por ah&iacute; &nbsp;porque nos iban a cachetear. Yo dije: Qu&eacute; es prohibido caminar por la calle? Y dijeron: A m&iacute; no me interesa, yo soy la ley. Y &nbsp;ah&iacute; nos dejaron. Como nos tiraron toda la ropa, empezamos a acomodar todo de nuevo en la mochila. De ah&iacute; nos venimos caminando. Llegamos como a las 10 de la noche y nos quedamos debajo de la cruz Roja en el Beta.&nbsp;</div>\n<div>\n	&nbsp;</div>\n','100 y 250 pesos',NULL,'Canalización a una instancia','Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(49,'Q-21-14','2014-03-14 00:00:00',1,2,2,'encontrase con familiares ',2,'hijo ',1,'Al cruzar la frontera',1,'hijo','','regresar a mi comunidad ',1,2,2,NULL,NULL,NULL,'','','2014-02-26 05:00:00',NULL,'Chantalá',7,1,'carretera ','retén ',NULL,2,12,NULL,NULL,'4','','','','no tenía ','Si',11,1,NULL,'<div>\n	Ten&iacute;amos de Benem&eacute;rito y al pasar por Chantal&aacute; pararon a la combi y nos bajaron. De d&oacute;nde vienen? Preguntaron. Si no dan 200.00 de aqu&iacute; no pasan. Todos dimos los 200.00 Nos subimos y m&aacute;s adelante, en ese tramo, antes de Palenque, fueron otros 200.00 Eran cada vez $ 400.00 yo y mi hijo. Cuando ya no tuvimos dinero para los retenes, los rode&aacute;bamos a pie.</div>\n<div>\n	&nbsp;</div>\n','200 pesos',NULL,'Canalización a una instancia','Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,'Q-24-14','2014-03-23 00:00:00',1,2,7,'buscar un familiar ',NULL,'',1,'Al cruzar la frontera',2,'','','intentar cruzar otra vez',1,NULL,NULL,NULL,NULL,NULL,'','','2014-02-15 10:00:00',NULL,NULL,NULL,1,'carretera ','revisión ',NULL,6,12,NULL,NULL,'5','','','negro ','','Si',9,1,NULL,'<div>\n	800.00 Ven&iacute;amos de Guatemala a Tenocique &nbsp;en una camioneta. Encontramos la camioneta de la polic&iacute;a. Le hizo cambio de luces y par&oacute; la camioneta. Eramos6 . Nos baj&oacute; a todos. Saquen todo lo que traigan en la bolsa y p&oacute;nganlo en el asiento de la camioneta. Unos registraban las bolsas, otros a nosotros. Las mochilas y las cosas las aventaron y cerr&oacute; la puerta de la patrulla y se arrancaron con el dinero, celulares. A nosotros nos quitaron $ 8 00.00 de los dos.</div>\n<div>\n	&nbsp;</div>\n','800 pesos',NULL,'Canalización a una instancia','Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(51,'Q-25-14','2014-03-24 00:00:00',1,2,2,'violencia y falta de trabajo ',2,'cuñado',1,'Al cruzar la frontera',2,'','','intentar cruzar de nuevo ',1,8,NULL,NULL,NULL,NULL,'','','2014-03-17 13:00:00',NULL,'Celaya',11,1,'antes de llegar a la estación del tren ','parada del tren ',NULL,16,4,NULL,NULL,'6','','','azul ','','Si',7,2,NULL,'<div>\n	Ven&iacute;amos en el tren y antes de llegar a Celaya pararon el tren y se suben 6 polic&iacute;as Federales y empiezan a gritarles y ordenarles que saquen todo lo que traen en las bolsas con amenaza de bajarlos. Est&aacute;bamos acostados. Como un amigo no se quer&iacute;a levantar le dieron tres patadas y lo insultaron. Iban quitando el dinero. A uno le quitaron $ 1 500.00 a m&iacute; s&oacute;lo me quitaron $ 160.00 porque no tra&iacute;a m&aacute;s. Eramos, en la g&oacute;ndola que nosotros ven&iacute;amos ,diey y seis. Cuando nos juntamos despu&eacute;s. fue cuando cada uno dijo lo que le hab&iacute;an quitado.&nbsp;</div>\n<div>\n	&nbsp;</div>\n','160 pesos ',NULL,'Canalización a una instancia','Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(52,'Q-26-14','2014-03-23 00:00:00',1,2,1,'violencia y falta de trabajo ',2,'cuñado',2,NULL,2,'','','cruzar la frontera ',1,4,2,NULL,NULL,NULL,'','','2014-02-28 14:00:00',NULL,NULL,7,1,'carretera ','revisión ',NULL,3,12,NULL,NULL,'2','','','azul','','Si',9,1,NULL,'<div>\n	Ten&iacute;amos en una combi de pasajeros, llena, de la frontera de Guatemala a Palenque. De repente, la patrulla par&oacute; a la combi. Y como si conocieran qu&iacute;enes &eacute;ramos los hondure&ntilde;os nos bajaron, y nos dijeron que por qu&eacute; and&aacute;bamos ah&iacute;. &Eacute;ramos tres. Nos separaron y dijeron que vi&eacute;ramos c&oacute;mo and&aacute;bamos de sucias y que por eso nos hab&iacute;an bajado. Ya hab&iacute;amos pasado la arrocera. Nos amenazaron que nos iban a encerrar para echarnos a nuestro pa&iacute;s. Pedimos que por favor nos dejaron, que tanto que hab&iacute;amos luchado. Uno no quer&iacute;a soltarnos. El otro dec&iacute;a que pag&aacute;ramos. Nos ped&iacute;a $ 1 500.00 por las dos. Entonces entregamos $ 1 200.00 que tra&iacute;amos. Dec&iacute;an: Y s&oacute;lo esto? Porque ya no tra&iacute;amos m&aacute;s. Y nos fue a dejar en una parte sola para que de ah&iacute; agarr&aacute;ramos otra combi. O mejor dicho, nos preguntaron qu&eacute; nos pasaba, nos subieron a la otra combi y nos llevaron al centro.</div>\n<div>\n	&nbsp;</div>\n','1200 pesos',NULL,'Canalización a una instancia','Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(53,'Q-27-14','2014-03-25 00:00:00',1,1,1,'violencia y falta de trabajo ',1,'',2,NULL,NULL,'','','cruzar la frontera ',1,2,2,NULL,NULL,NULL,'','','2014-03-08 00:00:00',NULL,'Celaya',11,1,'donde está un aeropuerto ','parada del tren ',NULL,26,4,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Engracia Robles ',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'Q-28-14','2014-03-27 00:00:00',1,2,1,NULL,2,'primo ',1,'Al cruzar la frontera',1,'primo ','no ','regresar a mi comunidad ',NULL,NULL,2,NULL,NULL,NULL,'','','2014-03-01 00:00:00',NULL,'Caborca ',26,1,'carretera ','la mafia los detiene ',NULL,6,10,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,'<div>\n	Leonardo llego a caborca con su primo. Estaban sobre la carretera principal cuando llego una camioneta blanca chevy con placas. Habian 3 hombres que les dijeron que les daban trabajo. Se subieron y viajaron 3 horas en camioneta. Los llevaron a una casa en un rancho. No los dejaban salir. A la semana salieron y los dejaron en el desierto donde llego otra camioneta que los esperaba con droga. Con leonardo iba tambien su primo y 3 de guatemala y 3 de honduras. Eran todos jovenes. Cada uno tomo maleta con 40 kilos y empezaron a caminar. Durante el trayecto les pegaba y maltrataban y decian que no se pod&iacute;an ir pues los agarrar&iacute;an los puntos. Pasaron 3 dias y 2 noches caminando. Cuando vieron a la patrulla se entregaron.&nbsp;</div>\n<div>\n	&nbsp;</div>\n',NULL,NULL,'Canalización a una instancia',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'Q-29-14','2014-04-02 00:00:00',1,1,1,'falta de trabajo ',2,'amigos y hermano ',2,NULL,NULL,'','',NULL,1,2,2,NULL,NULL,NULL,'','','2014-03-07 06:00:00',NULL,'Palenque ',7,1,'carretera ','retén ',NULL,6,12,'Palenque ',NULL,'2','','','azuo','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(56,'Q-29-14','2014-04-02 00:00:00',1,1,1,'falta de trabajo ',2,'amigos y hermano ',2,NULL,NULL,'','',NULL,1,2,NULL,NULL,NULL,NULL,'','','2014-03-07 06:00:00',NULL,'Palenque ',7,1,'carretera ','retén ',NULL,NULL,12,'Palenque ',NULL,'2','','','azul ','si Policía Federal ','No',NULL,NULL,NULL,'<div>\n	entre la frontera (un pueblito que no recuerda el nombre) y palenque tomaron una combi. Iban sobre la v&iacute;a hacia palenque y hab&iacute;a un reten de la polic&iacute;a federal. El polic&iacute;a paro la combi y bajo a los migrantes, (pues el senor de la combi le dijo a los federales que ven&iacute;an migrantes.)</div>\n<div>\n	&nbsp;</div>\n','200 pesos',NULL,NULL,'Engracia Robles',NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si'),(57,'Q-03-14','2014-02-12 00:00:00',3,1,2,'económico ',1,'',NULL,NULL,1,'tío ','','no se ',2,NULL,NULL,NULL,NULL,NULL,'','','2014-02-08 10:00:00',NULL,'Santa Anna',26,1,'carretera ','retén ',NULL,NULL,1,'Nogales','Altar ','4','','','','','Si',8,NULL,NULL,'<p>\n	Andr&eacute;s Ruiz de 29 a&ntilde;os de edad originario de Chiapas, intento cruzar a estados unidos por el desierto de Sasabe Sonora; a los 2 d&iacute;as de haber emprendido el viaje por el desierto lo detuvieron los agente de la patrulla fronteriza y los llevaron a migraci&oacute;n en Tucson Arizona de ah&iacute; los pasaron a Nogales Arizona donde los deportaron a las 6:30 de la tarde y despu&eacute;s tomaron el y unos compa&ntilde;eros el autob&uacute;s de regreso a Altar, pasaron por el ret&eacute;n a las 10:00 de la noche: cuentan que ven&iacute;an dormidos en el autob&uacute;s cuando los despertaron y les pidieron que se bajaran solo los que ten&iacute;an aspecto a migrantes, ah&iacute; los agentes los llevaron a la parte de atr&aacute;s del autob&uacute;s y les dijeron que todos ten&iacute;an que cooperar con algo, a lo cual ellos contestaron que no porque eran de mexicanos y no hab&iacute;an ning&uacute;n delito en que viajaran y los agentes contestaron que eso no les importaba que todo migrante que pasara por sus territorios ten&iacute;an que dejar una cuota. Ellos ya no ten&iacute;an nada ya que lo hab&iacute;an gastado todo en el viaje pero entre los 3 compa&ntilde;eros lograron juntar 580 pesos y as&iacute; es como los dejaron seguir su camino.</p>\n','580',2,NULL,NULL,NULL,NULL,NULL,NULL,'complexión delgada y morenos ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Si');
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
INSERT INTO `derechos_violados2denuncias` VALUES (2,1),(4,1),(1,2),(4,2),(1,3),(2,4),(2,5),(1,5),(4,6),(1,7),(4,7),(1,9),(4,9),(1,10),(2,11),(4,11),(1,12),(4,12),(2,13),(4,13),(1,14),(4,14),(2,15),(1,15),(4,15),(1,16),(1,17),(1,18),(1,19),(4,19),(1,20),(4,20),(1,21),(1,22),(4,22),(1,24),(1,25),(1,26),(4,26),(1,27),(1,28),(4,28),(1,29),(4,30),(2,31),(1,32),(2,33),(1,33),(1,34),(1,35),(4,35),(2,36),(4,36),(4,37),(2,39),(1,39),(4,39),(2,40),(1,40),(4,40),(2,41),(1,41),(4,41),(4,42),(2,43),(4,43),(1,44),(4,44),(1,45),(4,45),(1,47),(4,47),(1,48),(4,48),(1,49),(4,49),(4,50),(2,51),(4,51),(4,52),(2,54),(1,56),(4,56),(2,57),(1,57);
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
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrantes`
--

LOCK TABLES `migrantes` WRITE;
/*!40000 ALTER TABLE `migrantes` DISABLE KEYS */;
INSERT INTO `migrantes` VALUES (1,'Jonatan Morales',1,2,'Tijuana',1,21,NULL,'Chofer','1','Primaria',2,NULL,NULL),(2,'Juan Manuel González Sánchez',1,32,'Noria de Ángeles',1,34,NULL,'campesino','2','primaria',2,NULL,NULL),(3,'Ricardo Martínez',1,30,'Pánuco',1,35,NULL,'campesino','2','primaria',2,NULL,NULL),(4,'José Hernández Velázquez',3,NULL,NULL,1,52,NULL,'comerciante','2','primaria',2,NULL,NULL),(5,'Hector Mejía',3,NULL,NULL,1,44,NULL,'comerciante','2','primaria',2,NULL,NULL),(7,'Kader Orellana Flores',3,NULL,NULL,1,26,NULL,'comerciante','2','primaria',2,NULL,NULL),(8,'Guillermo',1,14,'Tuxpan',1,43,NULL,'empledo','2','preparatoria',2,NULL,NULL),(9,'Apolinar Pacheco Reyes',1,11,'León',1,40,NULL,'campesino ','2','primaria',NULL,NULL,NULL),(11,'Miguel ángel ',3,NULL,'Puerto Cortez',NULL,29,NULL,'mecánico','4','Primamria',2,NULL,NULL),(12,'Carlos Salgado Valdez ',3,NULL,'Puerto Cortez',1,30,NULL,'Chofer','4','Primaria ',2,'No aplica',NULL),(13,'Kevin Usiel Pèrez Rodríguez',1,7,'Acacoyuca',1,19,NULL,'Campesino','1','Secundaria',2,NULL,NULL),(14,'José Vega ',3,NULL,'Yolo',1,38,NULL,'Ccampesino','4','Primaria',2,NULL,NULL),(15,'Zaul Rivas ',5,NULL,'La Unión ',1,43,NULL,'Campesino ','2','Primaria',2,'No aplica',NULL),(16,'Ever Casco ',3,NULL,'Tegucigalpa ',1,38,NULL,'No contesto',NULL,'Secundaria',2,'No aplica',NULL),(17,'Rafael Mada Lastra ',1,26,'Sonora',1,38,NULL,'Jornalero','4','Secundaria ',2,NULL,NULL),(18,'Toribio Velázquez Santos ',1,7,'Chiapas',1,37,NULL,'No contesto','1','Secundaria',2,NULL,NULL),(19,'Wilmer Alexis Montoya ',1,NULL,'Catacamas',1,27,NULL,'Marino','1','Primaria',2,NULL,NULL),(20,'Toribio Jesús López',1,6,'Tecuman',1,14,NULL,'Estudiante','1','Secundaria',2,NULL,NULL),(21,'Moisés Rivera Rodríguez',1,2,'Tijuana',1,27,NULL,'Albañil','4','Primaria',2,NULL,NULL),(22,'Anselmo Calyn Apen',4,NULL,'Huehuetenango',1,35,NULL,'Comerciante','2','Primaria ',2,NULL,NULL),(23,'Juan Armando Mendez Gonzalez',1,15,'Santiago Tolman',1,23,NULL,'Limpieza','2','Primaria',2,NULL,NULL),(24,'Juan Ramírez Martínez',4,NULL,'Huehuetenango',1,41,NULL,'Campesino ','4','Ninguna',2,NULL,NULL),(25,'Joel Barragán Mendoza',1,16,'Michoacán ',1,26,NULL,'contratista ','2','Primaria',2,NULL,NULL),(26,'José Luís Herrera Herrera',1,16,'Tocumbo',1,56,NULL,'campesino','3','Primaria',2,NULL,NULL),(27,'Noé Cante Sanit',4,NULL,'Pentec',1,36,NULL,'Campesino','4','Primaria',2,NULL,NULL),(28,'José Guadalupe Ramírez López',1,9,'Iztapalapa',1,34,NULL,'Campesino ','4','Primaria',2,NULL,NULL),(29,'Darwin Canales López',3,NULL,'San Pedro Sula',1,19,NULL,'Empleado','1','Primaria',2,NULL,NULL),(30,'Franklin Ezequiel Alvarado',3,NULL,'Cortez',1,37,NULL,'Empleado','2','Secundaria ',2,NULL,NULL),(31,'Franco Eduardo López Domínguez',1,7,'Motocintla',1,28,NULL,'Albañil','1','Primaria',2,NULL,NULL),(32,'Yeims James',1,7,'Chiapas',1,31,NULL,'Comerciante','2','Bachillerato',2,NULL,NULL),(33,'Gustavo Adolfo Molina',3,NULL,'Choluteca',1,40,NULL,'Profesor','1','Licenciatura',2,NULL,NULL),(34,'Elder Díaz',3,NULL,'El Paraíso ',1,33,NULL,'Albañil','5','Primaria',2,NULL,NULL),(35,'Elvin Emilio Vázquez',3,NULL,'Catacamos',1,25,NULL,'Campesino','1','Primaria',2,NULL,NULL),(36,'Elvin Emilio Vázquez',3,NULL,'Catacamos',1,25,NULL,'Campesino','1','Primaria',2,NULL,NULL),(37,'Claudia Perez',1,13,'Tulancingo',2,36,NULL,'Ama de Casa','4','Ninguna',2,NULL,NULL),(38,'Armando Hernandez',4,NULL,'Peten',1,28,NULL,'Campesino','1','Secundaria ',2,NULL,NULL),(39,'Leoncio Martínez',1,20,'Miahuatlán',1,19,NULL,'Albañil','1','Secundaria',2,NULL,NULL),(40,'Kevin  Argueta ',4,NULL,'Tecum ',1,19,NULL,'Pintor','1','Primaria ',2,NULL,NULL),(41,'Álvaro Julián Ochoa Vera',1,7,'Escuintla',1,19,NULL,'estudiante','1','preparatoria',NULL,NULL,NULL),(42,'Guillermo Gómez Vásques',1,20,'Zapotitlán del Río',1,22,NULL,'músico','1','primaria',NULL,NULL,NULL),(43,'Antonio Esteban Sánchez',1,12,'Atlixtac',1,25,NULL,'campesino','2','primaria',NULL,NULL,NULL),(44,'Aniceto Damián',1,16,'Jacona',1,52,NULL,'albañil',NULL,'primaria',NULL,NULL,NULL),(45,'Renato Ramírez',1,13,'Pachuca',1,42,NULL,'albañil',NULL,'primaria',NULL,NULL,NULL),(46,'Melesio Morán Peña',1,21,'Huilando',1,26,NULL,'campesino','4','bachillerato ',NULL,NULL,NULL),(47,'Cristián Goel Meléndez Rivas',3,NULL,'Colón',1,19,NULL,'albañil ','1','secundaria',NULL,NULL,NULL),(48,'Melvin Gualdemar Meza del Cid',4,NULL,NULL,1,28,NULL,'pintor','2','secundaria',NULL,NULL,NULL),(49,'Manuel de Jesús Hernández',4,NULL,NULL,1,NULL,NULL,NULL,'2','secundaria',NULL,NULL,NULL),(50,'René Flores',4,NULL,NULL,1,NULL,NULL,NULL,'2','secundaria',NULL,NULL,NULL),(51,'Marco Antonio Morales Río ',1,21,'Tulcingo',1,17,NULL,'campesino ','1','preparatoria ',NULL,NULL,NULL),(52,'Gregorio Gómez Hernández',1,17,'Cuernavaca',1,17,NULL,'Herrero','4','secundaria',NULL,NULL,NULL),(53,'Carlos Márquez',3,NULL,'Cortés',1,24,NULL,'costurero','1','secundaria',NULL,NULL,NULL),(54,'Filiberto Martínez Cruz',3,NULL,'Cortés',1,24,NULL,'costurero','1','secundaria ',NULL,NULL,NULL),(55,'Carlos Humberto Posadas',5,NULL,'San Ignacio ',1,49,NULL,'agricultor',NULL,'primaria',NULL,NULL,NULL),(56,'Carlos Emilio Flores Marte ',3,NULL,'Tegucigalpa ',1,23,NULL,'cerigrafía ','1','secundaria ',NULL,NULL,NULL),(57,'Dawin Rodríguez Alvarado ',3,NULL,NULL,1,23,NULL,'cerigrafía ','1','secundaria ',NULL,NULL,NULL),(58,'Fraklin Alexander ',3,NULL,NULL,1,29,NULL,'albañil ','4','primaria ',NULL,NULL,NULL),(59,'Lilia',3,NULL,'Yoro ',2,23,NULL,'ama de casa','1','primaria ',2,NULL,NULL),(60,'José Luis ',5,NULL,NULL,1,25,NULL,'seguridad ','1','secuendaria ',2,NULL,NULL),(61,'Leonardo García Paz',1,7,'Tapachula ',1,19,NULL,'campesino ','1','secundaria ',2,NULL,NULL),(62,'Andrés Romero Alas ',3,NULL,NULL,1,23,NULL,'empleado ','1',NULL,2,NULL,NULL),(63,'Andrés Ruiz Mendoza',1,7,'Tapachula',1,29,NULL,'jornalero','4','primaria',NULL,NULL,NULL);
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
INSERT INTO `migrantes2denuncias` VALUES (1,1),(2,2),(3,3),(5,4),(4,4),(7,5),(8,6),(9,7),(11,9),(12,10),(13,11),(14,12),(15,13),(16,14),(17,15),(18,16),(19,17),(20,18),(21,19),(22,20),(23,21),(24,22),(39,23),(25,24),(26,25),(27,26),(28,27),(29,28),(30,29),(40,30),(31,31),(32,32),(33,33),(34,34),(35,35),(37,36),(38,37),(41,38),(42,39),(43,40),(44,41),(45,42),(46,43),(47,44),(49,45),(48,45),(50,45),(51,46),(52,47),(53,48),(54,48),(55,49),(56,50),(57,50),(58,51),(59,52),(60,53),(61,54),(62,55),(62,56),(63,57);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete_pago`
--

LOCK TABLES `paquete_pago` WRITE;
/*!40000 ALTER TABLE `paquete_pago` DISABLE KEYS */;
INSERT INTO `paquete_pago` VALUES (1,'Hospedaje'),(2,'Transporte'),(3,'Alimentación'),(4,'Pago de cuotas a la mafia'),(5,'No especificó');
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
INSERT INTO `paquetes2denuncias` VALUES (3,1),(1,1),(4,1),(2,1),(4,19),(4,22),(3,24),(4,24),(3,36),(1,36),(4,36),(2,36),(1,43),(4,43);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportes`
--

LOCK TABLES `transportes` WRITE;
/*!40000 ALTER TABLE `transportes` DISABLE KEYS */;
INSERT INTO `transportes` VALUES (1,'Autobús de la Central'),(2,'Autobús de turismo'),(3,'Taxi'),(4,'Tren'),(5,'Camion'),(6,'Otro'),(7,'Vehículos oficiales'),(8,'Vehículos particulares'),(9,'Patrulla'),(10,'A pie'),(11,'Particulares'),(12,'Combi');
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
INSERT INTO `violacion_derechos2denuncias` VALUES (19,1),(10,1),(20,2),(5,2),(1,3),(5,3),(11,4),(5,4),(1,5),(5,5),(18,5),(10,5),(18,6),(1,7),(5,7),(18,7),(20,9),(14,9),(14,10),(5,11),(20,12),(5,12),(11,13),(18,13),(19,14),(5,14),(5,15),(18,15),(10,15),(5,16),(5,17),(5,18),(20,19),(5,19),(20,20),(5,20),(14,21),(20,22),(5,22),(5,24),(14,25),(5,26),(5,27),(20,28),(5,28),(1,29),(20,30),(28,31),(14,32),(1,33),(9,33),(5,34),(5,35),(18,35),(20,36),(5,36),(18,37),(11,39),(20,39),(5,39),(11,40),(20,40),(5,40),(11,41),(5,41),(18,41),(14,41),(18,42),(11,43),(20,43),(20,44),(5,44),(20,45),(5,45),(5,47),(18,47),(5,48),(18,48),(20,49),(5,49),(18,50),(11,51),(20,51),(10,51),(20,52),(11,54),(14,54),(10,54),(1,56),(18,56),(11,57),(5,57);
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

-- Dump completed on 2014-05-31 16:46:42
