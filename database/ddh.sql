SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ddhhdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ddhhdb` ;

-- -----------------------------------------------------
-- Table `ddhhdb`.`migrantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`migrantes` (
  `id_migrante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `id_pais` INT NULL,
  `id_estado` INT NULL,
  `municipio` VARCHAR(255) NULL,
  `id_genero` INT NULL,
  `edad` INT NULL,
  `fecha_nacimiento` TIMESTAMP NULL,
  `ocupacion` VARCHAR(255) NULL,
  `id_estado_civil` VARCHAR(45) NULL,
  `escolaridad` VARCHAR(255) NULL,
  `pueblo_indigena` TINYINT(1) NULL DEFAULT false,
  `nombre_pueblo_indigena` VARCHAR(255) NULL,
  `espanol` TINYINT(1) NULL DEFAULT true,
  PRIMARY KEY (`id_migrante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`etados_casos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`etados_casos` (
  `id_estado_caso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_estado_caso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`denuncias` (
  `id_denuncia` INT NOT NULL AUTO_INCREMENT,
  `numero_queja` VARCHAR(255) NULL,
  `fecha_creada` TIMESTAMP NOT NULL DEFAULT now(),
  `id_lugar_denuncia` VARCHAR(255) NULL,
  `id_tipo_queja` INT NULL,
  `intentos` INT NULL,
  `motivo_migracion` VARCHAR(255) NULL,
  `viaja_solo` TINYINT(1) NULL,
  `con_quien_viaja` VARCHAR(255) NULL,
  `deportado` TINYINT(1) NULL,
  `momento_deportado` VARCHAR(255) NULL,
  `separacion_familiar` TINYINT(1) NULL,
  `familiar_separado` VARCHAR(255) NULL,
  `situacion_familiar` VARCHAR(255) NULL,
  `acto_siguiente` VARCHAR(255) NULL,
  `dano_autoridad` TINYINT(1) NULL,
  `id_autoridad_dano` INT NULL,
  `coyote_guia` TINYINT(1) NULL,
  `tiempo_contrato_coyote` VARCHAR(255) NULL,
  `monto_coyote` VARCHAR(255) NULL,
  `conocimineto_punto_fronterizo` TINYINT(1) NULL,
  `nombre_punto_fronterizo` VARCHAR(255) NULL,
  `lugar_de_usa` VARCHAR(255) NULL,
  `fecha_injusticia` TIMESTAMP NULL,
  `hora_injusticia` VARCHAR(255) NULL,
  `municipio_injusticia` VARCHAR(255) NULL,
  `id_estado_injusticia` INT NULL,
  `id_pais_injusticia` INT NULL,
  `espacio_fisico_injusticia` VARCHAR(255) NULL,
  `detonante_injusticia` VARCHAR(255) NULL,
  `migrantes_injusticia` TINYINT(1) NULL,
  `numero_migrantes_injusticia` INT NULL,
  `id_transporte_viaje_injusticia` INT NULL,
  `lugar_abordaje_transporte` VARCHAR(255) NULL,
  `destino_transporte` VARCHAR(255) NULL,
  `numero_oficiales_responsables` VARCHAR(255) NULL,
  `algun_nombre_responsables` VARCHAR(255) NULL,
  `apodos_responsables` VARCHAR(255) NULL,
  `color_uniforme_responsables` VARCHAR(255) NULL,
  `insignias_responsables` VARCHAR(255) NULL,
  `responsables_abordo_vehiculos_responsables` TINYINT(1) NULL,
  `id_tipo_transporte_responsables` INT NULL,
  `numero_vehiculos_responsables` INT NULL,
  `placas_vehiculos_responsables` VARCHAR(45) NULL,
  `descripcion_evento` TEXT NULL,
  `monto_extorsion` VARCHAR(255) NULL,
  `id_estado_caso` INT NULL,
  `estado_seguimiento` VARCHAR(255) NULL,
  `nombre_persona_atendio_seguimiento` VARCHAR(255) NULL,
  `descripcion_seguimiento` VARCHAR(255) NULL,
  `telefono_seguimiento` VARCHAR(45) NULL,
  `documento1_seguimiento` VARCHAR(255) NULL,
  `documento2_seguimiento` VARCHAR(255) NULL,
  PRIMARY KEY (`id_denuncia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`estados` (
  `id_estado` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_estado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`lugares_denuncia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`lugares_denuncia` (
  `id_lugar_denuncia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_lugar_denuncia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`tipos_quejas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`tipos_quejas` (
  `id_tipo_queja` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_tipo_queja`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`paises` (
  `id_pais` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_pais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`generos` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`estado_civil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`estado_civil` (
  `id_estado_civil` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_estado_civil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`migrantes2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`migrantes2denuncias` (
  `id_migrante` INT NOT NULL,
  `id_denuncia` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`autoridades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`autoridades` (
  `id_autoridad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id_autoridad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`autoridades2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`autoridades2denuncias` (
  `id_autoridad` INT NOT NULL,
  `id_denuncia` INT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`paquete_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`paquete_pago` (
  `id_paquete` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_paquete`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`paquetes2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`paquetes2denuncias` (
  `id_paquete` INT NOT NULL,
  `id_denuncia` INT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`transportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`transportes` (
  `id_transporte` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id_transporte`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`autoridades_responables2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`autoridades_responables2denuncias` (
  `id_autoridad` INT NOT NULL,
  `id_denuncia` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`derechos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`derechos` (
  `id_derecho` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_derecho`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`violacion_derechos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`violacion_derechos` (
  `id_violacion` INT NOT NULL AUTO_INCREMENT,
  `id_derecho` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_violacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`derechos_violados2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`derechos_violados2denuncias` (
  `id_derecho` INT NOT NULL,
  `id_denuncia` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ddhhdb`.`violacion_derechos2denuncias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ddhhdb`.`violacion_derechos2denuncias` (
  `id_violacion` INT NOT NULL,
  `id_denuncia` INT NOT NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
