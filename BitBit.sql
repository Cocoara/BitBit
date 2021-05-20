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
INSERT INTO `incidencia` (`id_incidencia`, `id_user`, `id_Estado`, `desc_averia`, `Fecha_entrada`, `uuid`, `Marca`, `Modelo`, `Numero_serie`, `Diagnostico_prev`, `Telf`, `tiempo_reparcion`, `id_tecnico`, `descripcion_gestor`) VALUES
	(80, 31, 2, 'Pantalla rota', '2021-05-19', '2360f5c035bb4bc5b3e294b36f705088', 'Xiaomi', 'MI 9 T ', '1', '<p>	1</p>', '1', '1', 29, '<p>	a</p>');
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

-- Volcando datos para la tabla bitbit.login_attempts: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
	(44, '::1', 'cliente', 1621438836);
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

-- Volcando datos para la tabla bitbit.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(28, '', 'Gestor', '$2y$10$jEihXCaGhxYXrUXSyfw2u.R33kfg5.g8qke3evbJT4TcJwwYkBKm.', 'gestor@gestor.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1621447369, 1, 'gestor', 'gestor', NULL, 611111111),
	(29, '', 'Trabajador', '$2y$10$2NvNaYNNpurimaScEtw/tuvnKoensNWS4Yd0ETYiAWfrvQiQ22PD2', 'trabajador@trabajador.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1621447555, 1, 'Trabajador', 'trabajador', NULL, 611111111),
	(31, '', 'Client', '$2y$10$62ohLVhRQ94uRigk1l0oOOZpakNjdJcU3Y.ad3tBzpibqd137/x9q', 'a@a.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1621447571, 1, 'Client', 'Client', NULL, 111111111),
	(33, '::1', 'Administrator', '$2y$10$ATOj2pEhxp3Na9CU88.Kg..fQh0pV19fXIX55ZjTM/8aLhAK2uy22', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1621350594, 1621438908, 1, 'Administrator', 'admin', NULL, 0);
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

-- Volcando datos para la tabla bitbit.users_groups: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(16, 28, 4),
	(15, 29, 3),
	(14, 31, 2),
	(17, 33, 1),
	(19, 33, 2),
	(20, 33, 3),
	(18, 33, 4);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
