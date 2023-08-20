-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para network_eyngel
CREATE DATABASE IF NOT EXISTS `network_eyngel` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `network_eyngel`;

-- Volcando estructura para tabla network_eyngel.anuncios
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_descripcion` longtext NOT NULL,
  `a_estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.ip_bloqueo
CREATE TABLE IF NOT EXISTS `ip_bloqueo` (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_numero` varchar(255) NOT NULL,
  `ip_fecha_bloqueo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.movies
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `duracion` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.muro_users
CREATE TABLE IF NOT EXISTS `muro_users` (
  `mure_id` int(11) NOT NULL AUTO_INCREMENT,
  `mure_id_users` int(11) NOT NULL,
  `mure_id_users_publicando` int(11) NOT NULL,
  `mure_text` longtext NOT NULL,
  `mure_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`mure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_nombre` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.persistent_sessions
CREATE TABLE IF NOT EXISTS `persistent_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(250) NOT NULL DEFAULT '',
  `expiration_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `FK_persistent_sessions_users` (`user_id`),
  CONSTRAINT `FK_persistent_sessions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.post_action
CREATE TABLE IF NOT EXISTS `post_action` (
  `poac_id` int(11) NOT NULL AUTO_INCREMENT,
  `poac_id_user` int(11) NOT NULL,
  `poac_id_post` int(11) DEFAULT NULL,
  `poac_action` enum('like','comment','follow') NOT NULL,
  `poac_id_user_vistando` int(11) DEFAULT NULL,
  `poac_timestamp` timestamp NULL DEFAULT NULL,
  `poac_check` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`poac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.post_comment
CREATE TABLE IF NOT EXISTS `post_comment` (
  `poc_id` int(11) NOT NULL AUTO_INCREMENT,
  `poc_id_post` int(11) NOT NULL DEFAULT 0,
  `poc_id_user` int(11) NOT NULL DEFAULT 0,
  `poc_comment` text NOT NULL,
  `poc_timestamp` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`poc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.post_user
CREATE TABLE IF NOT EXISTS `post_user` (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `pu_id_user` int(11) NOT NULL DEFAULT 0,
  `pu_descripcion` longtext DEFAULT NULL,
  `pu_file` text DEFAULT NULL,
  `pu_extension` text DEFAULT NULL,
  `pu_timestamp` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.post_user_files
CREATE TABLE IF NOT EXISTS `post_user_files` (
  `puf_id` int(11) NOT NULL AUTO_INCREMENT,
  `puf_id_post` int(11) NOT NULL,
  `puf_file` text NOT NULL,
  `puf_extension` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`puf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.seguidores
CREATE TABLE IF NOT EXISTS `seguidores` (
  `seguido_id_users` int(11) NOT NULL,
  `seguidor_id_users` int(11) NOT NULL,
  `seguidor_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.tokens_count
CREATE TABLE IF NOT EXISTS `tokens_count` (
  `toc_id` int(11) NOT NULL AUTO_INCREMENT,
  `toc_post_video` int(11) NOT NULL,
  `toc_id_user` int(11) NOT NULL,
  `toc_id_por_video` double DEFAULT 0,
  `toc_fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`toc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.t_empresa
CREATE TABLE IF NOT EXISTS `t_empresa` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_nombre` varchar(200) DEFAULT NULL,
  `t_eslogan` varchar(200) DEFAULT NULL,
  `t_descripcion` text DEFAULT NULL,
  `t_direccion` varchar(150) DEFAULT NULL,
  `t_telefono` varchar(11) DEFAULT NULL,
  `t_correo` varchar(100) DEFAULT NULL,
  `t_img_logo` varchar(255) DEFAULT NULL,
  `t_enlace` varchar(255) DEFAULT NULL,
  `t_id_pais` int(11) DEFAULT NULL,
  `t_estado` int(11) DEFAULT NULL,
  `t_id_user_create` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`t_id`),
  KEY `FK_t_empresa_pais` (`t_id_pais`),
  KEY `FK_t_empresa_users` (`t_id_user_create`),
  CONSTRAINT `FK_t_empresa_pais` FOREIGN KEY (`t_id_pais`) REFERENCES `pais` (`pa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_t_empresa_users` FOREIGN KEY (`t_id_user_create`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.t_productos
CREATE TABLE IF NOT EXISTS `t_productos` (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tp_id_empresa` int(11) NOT NULL DEFAULT 0,
  `tp_nombre` text NOT NULL,
  `tp_descripcion` text NOT NULL,
  `tp_precio` double NOT NULL DEFAULT 0,
  `tp_enlace_producto` text DEFAULT NULL,
  `tp_imagen` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`tp_id`) USING BTREE,
  KEY `FK_t_producto_t_empresa` (`tp_id_empresa`),
  CONSTRAINT `FK_t_producto_t_empresa` FOREIGN KEY (`tp_id_empresa`) REFERENCES `t_empresa` (`t_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_nombre` varchar(255) NOT NULL,
  `u_apellido` varchar(255) NOT NULL,
  `u_nombre_usuario` varchar(255) DEFAULT NULL,
  `u_descripcion_perfil` varchar(250) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `u_sexo` varchar(50) NOT NULL,
  `u_ciudad_residencia` varchar(100) DEFAULT NULL,
  `u_fecha_nacimiento` date DEFAULT NULL,
  `u_tokens` double NOT NULL,
  `u_role` int(11) NOT NULL DEFAULT 0,
  `u_profesion` text DEFAULT NULL,
  `u_estado` int(11) NOT NULL DEFAULT 1,
  `u_session_id` text DEFAULT NULL,
  `u_ultima_conexion` timestamp NULL DEFAULT NULL,
  `u_img_profile` text DEFAULT NULL,
  `u_term_con` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `confirmed` int(11) DEFAULT 0,
  `confirmation_code` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_users_estado` (`u_estado`),
  CONSTRAINT `FK_users_estado` FOREIGN KEY (`u_estado`) REFERENCES `estado` (`est_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla network_eyngel.users_verify_count
CREATE TABLE IF NOT EXISTS `users_verify_count` (
  `uvc_id` int(11) NOT NULL AUTO_INCREMENT,
  `uvc_id_users` int(11) NOT NULL,
  `uvc_file_pay` text NOT NULL,
  `uv_pay_status` int(11) DEFAULT 0,
  `uvc_file_video` text DEFAULT NULL,
  `uvc_status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`uvc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
