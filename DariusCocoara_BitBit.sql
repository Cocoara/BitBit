-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bitbit
DROP DATABASE IF EXISTS `bitbit`;
CREATE DATABASE IF NOT EXISTS `bitbit` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bitbit`;

-- Volcando estructura para tabla bitbit.consulta
DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` text DEFAULT NULL,
  `tema` int(11) DEFAULT NULL,
  `mensaje` longtext DEFAULT NULL,
  `fecha` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_consulta_temaconsulta` (`tema`),
  CONSTRAINT `FK_consulta_temaconsulta` FOREIGN KEY (`tema`) REFERENCES `temaconsulta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.consulta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.ficheros
DROP TABLE IF EXISTS `ficheros`;
CREATE TABLE IF NOT EXISTS `ficheros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_incidencia` int(11) NOT NULL,
  `id_fichero` varchar(50) DEFAULT NULL,
  `extension` varchar(50) DEFAULT NULL,
  `directoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ficheros_incidencia` (`id_incidencia`),
  CONSTRAINT `FK_ficheros_incidencia` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencia` (`id_incidencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.ficheros: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `ficheros` DISABLE KEYS */;
INSERT INTO `ficheros` (`id`, `id_incidencia`, `id_fichero`, `extension`, `directoryName`) VALUES
	(51, 106, '5240d77394cc1d7799a38311662b39c7481190ed_106.png', 'png', 'C:\\xampp\\uploads/106'),
	(52, 106, '070580a6fabebc94e530617aa7e3958bfa789157_106.txt', 'txt', 'C:\\xampp\\uploads/106'),
	(53, 106, '070580a6fabebc94e530617aa7e3958bfa789157_106.txt', 'txt', 'C:\\xampp\\uploads/106'),
	(54, 106, '5240d77394cc1d7799a38311662b39c7481190ed_106.png', 'png', 'C:\\xampp\\uploads/106'),
	(55, 106, '228d8d7892af94effd8e8ffb6766957dffd0e023_106.png', 'png', 'C:\\xampp\\uploads/106');
/*!40000 ALTER TABLE `ficheros` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.groups: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'client', 'Client'),
	(3, 'tecnico', 'Tecnico'),
	(4, 'gestor', 'Gestor');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.incidencia
DROP TABLE IF EXISTS `incidencia`;
CREATE TABLE IF NOT EXISTS `incidencia` (
  `id_incidencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) unsigned DEFAULT NULL,
  `id_Estado` int(11) DEFAULT NULL,
  `desc_averia` varchar(50) DEFAULT NULL,
  `Fecha_entrada` date DEFAULT NULL,
  `uuid` varchar(50) DEFAULT NULL,
  `Marca` varchar(50) DEFAULT NULL,
  `Modelo` varchar(50) DEFAULT NULL,
  `Numero_serie` varchar(50) DEFAULT NULL,
  `Diagnostico_prev` longtext DEFAULT NULL,
  `Telf` varchar(50) DEFAULT NULL,
  `tiempo_reparcion` varchar(50) DEFAULT NULL,
  `id_tecnico` int(10) unsigned DEFAULT NULL,
  `descripcion_gestor` longtext DEFAULT NULL,
  `canvasImage` longtext DEFAULT NULL,
  `rutaFicheros` text DEFAULT NULL,
  PRIMARY KEY (`id_incidencia`),
  KEY `id_user` (`id_user`),
  KEY `id_Estado` (`id_Estado`),
  KEY `id_tecnico` (`id_tecnico`),
  CONSTRAINT `FK_incidencia_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `id_Estado` FOREIGN KEY (`id_Estado`) REFERENCES `tipo_estado` (`id_Estado`),
  CONSTRAINT `id_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.incidencia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `incidencia` DISABLE KEYS */;
INSERT INTO `incidencia` (`id_incidencia`, `id_user`, `id_Estado`, `desc_averia`, `Fecha_entrada`, `uuid`, `Marca`, `Modelo`, `Numero_serie`, `Diagnostico_prev`, `Telf`, `tiempo_reparcion`, `id_tecnico`, `descripcion_gestor`, `canvasImage`, `rutaFicheros`) VALUES
	(106, 31, 3, 'Pantalla rota', '2021-05-27', 'b161377b251a4aa2ada3a2f4bc67d659', 'Xiaomi', 'MI 9 T ', '123456789', '<p>	Se ha roto sistema táctil</p>', '642717826', '4 dias', 29, '', 'data:image/png;base64,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', 'C:\\xampp\\uploads/106');
/*!40000 ALTER TABLE `incidencia` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.keys
DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.keys: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.login_attempts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.mensajes
DROP TABLE IF EXISTS `mensajes`;
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `de` int(10) unsigned DEFAULT NULL,
  `para` int(10) unsigned DEFAULT NULL,
  `asunto` varchar(50) DEFAULT NULL,
  `mensaje` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mensajes_users` (`de`),
  KEY `FK_mensajes_users_2` (`para`),
  CONSTRAINT `FK_mensajes_users` FOREIGN KEY (`de`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_mensajes_users_2` FOREIGN KEY (`para`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.mensajes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.noticias
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `contenido` varchar(50) DEFAULT NULL,
  `id_grupo` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  CONSTRAINT `FK_noticias_groups` FOREIGN KEY (`id_grupo`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.noticias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.noticies
DROP TABLE IF EXISTS `noticies`;
CREATE TABLE IF NOT EXISTS `noticies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.noticies: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `noticies` DISABLE KEYS */;
INSERT INTO `noticies` (`id`, `title`, `subtitle`, `content`, `data`) VALUES
	(2, 'Segona noticia', 'Subtitol segona noticia', 'Contingut segona noticia', '2021-03-01'),
	(3, 'Tercera noticia\r\n', 'Subtitol tercera noticia', 'Contingut tercera noticia', '2021-03-01');
/*!40000 ALTER TABLE `noticies` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.temaconsulta
DROP TABLE IF EXISTS `temaconsulta`;
CREATE TABLE IF NOT EXISTS `temaconsulta` (
  `id` int(10) NOT NULL,
  `tipoConsulta` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.temaconsulta: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `temaconsulta` DISABLE KEYS */;
INSERT INTO `temaconsulta` (`id`, `tipoConsulta`) VALUES
	(0, 'Garantía'),
	(1, 'Software'),
	(2, 'Hardware');
/*!40000 ALTER TABLE `temaconsulta` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.tipo_estado
DROP TABLE IF EXISTS `tipo_estado`;
CREATE TABLE IF NOT EXISTS `tipo_estado` (
  `id_Estado` int(11) NOT NULL,
  `Descrip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_Estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bitbit.tipo_estado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_estado` DISABLE KEYS */;
INSERT INTO `tipo_estado` (`id_Estado`, `Descrip`) VALUES
	(1, 'No empezado'),
	(2, 'En curso'),
	(3, 'Completado'),
	(4, 'Entregado');
/*!40000 ALTER TABLE `tipo_estado` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.tokens
DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `tokenid` varchar(36) NOT NULL,
  `subject` varchar(36) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`tokenid`,`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.users: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(28, '', 'Gestor', '$2y$10$jEihXCaGhxYXrUXSyfw2u.R33kfg5.g8qke3evbJT4TcJwwYkBKm.', 'gestor@gestor.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1622211997, 1, 'gestor', 'gestor', NULL, 611111111),
	(29, '', 'Trabajador', '$2y$10$2NvNaYNNpurimaScEtw/tuvnKoensNWS4Yd0ETYiAWfrvQiQ22PD2', 'trabajador@trabajador.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1622290648, 1, 'Trabajador', 'trabajador', NULL, 611111111),
	(31, '', 'Client', '$2y$10$62ohLVhRQ94uRigk1l0oOOZpakNjdJcU3Y.ad3tBzpibqd137/x9q', 'a@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1622290330, 1, 'Client', 'Client', NULL, 111111111),
	(33, '::1', 'Administrator', '$2y$10$ATOj2pEhxp3Na9CU88.Kg..fQh0pV19fXIX55ZjTM/8aLhAK2uy22', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1621350594, 1622225504, 1, 'Administrator', 'admin', NULL, 0),
	(43, '::1', 'gestorssss', '$2y$10$2k3PVa9WI.lhVj6fpDxH5exUqU.Bn6kiW69icI6q8I7PUWNOaidZS', 'awwwss@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1622244408, NULL, 1, 'gestorssss', 'qq', NULL, 2147483647);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla bitbit.users_groups
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bitbit.users_groups: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(16, 28, 4),
	(15, 29, 3),
	(14, 31, 2),
	(17, 33, 1),
	(19, 33, 2),
	(20, 33, 3),
	(18, 33, 4),
	(28, 43, 2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
