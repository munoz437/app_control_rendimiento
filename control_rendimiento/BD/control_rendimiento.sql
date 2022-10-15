--Agregando tenista
ALTER TABLE `cliente` ADD `apellidos` VARCHAR(50) NULL AFTER `usuario_id`, ADD `fecha_nacimiento` VARCHAR(50) NULL AFTER `apellidos`, ADD `altura` VARCHAR(50) NULL AFTER `fecha_nacimiento`, ADD `peso` VARCHAR(50) NULL AFTER `altura`

--Agregando ejercicio
CREATE TABLE `webapsgt_control_rendimiento`.`ejercicio` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(50) NOT NULL , `descripcion` TEXT NOT NULL , `video` VARCHAR(100) NULL , `tiempo` VARCHAR(100) NOT NULL , `id_tenista` INT(10) NOT NULL , `id_entrenador` INT(10) NOT NULL , `fecha` VARCHAR(25) NOT NULL , `comentario` VARCHAR(150) NULL , `rendimiento` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

--
CREATE TABLE `webapsgt_control_rendimiento`.`rendimiento` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `id_tenista` INT(10) NOT NULL , `ace` INT(10) NULL , `rendimiento` INT(10) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
--