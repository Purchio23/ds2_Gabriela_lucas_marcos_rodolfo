-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_trabfinal_gabriela_lucas_marcos_rodolfo
CREATE DATABASE IF NOT EXISTS `db_trabfinal_gabriela_lucas_marcos_rodolfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_trabfinal_gabriela_lucas_marcos_rodolfo`;

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.categoria: ~9 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Gerente', NULL, NULL),
	(2, 'Entregador', NULL, NULL),
	(3, 'Caixa', NULL, NULL),
	(4, 'Auxiliar administrativo', NULL, NULL),
	(5, 'Lider de produção', NULL, NULL),
	(6, 'CORRIDA ', NULL, NULL),
	(7, 'SKATE', NULL, NULL),
	(8, 'BASQUETE', NULL, NULL),
	(9, 'CAMINHADA', NULL, NULL);

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.curriculo
CREATE TABLE IF NOT EXISTS `curriculo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.curriculo: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.curriculum
CREATE TABLE IF NOT EXISTS `curriculum` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.curriculum: ~5 rows (aproximadamente)
INSERT INTO `curriculum` (`id`, `nome`, `telefone`, `email`, `idade`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', '79', 'imagem/20230629144633.jpg', '2023-06-29 17:46:33', '2023-06-29 17:46:33'),
	(2, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', '79', 'imagem/20230629151639.png', '2023-06-29 18:16:39', '2023-06-29 18:16:39'),
	(3, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', '79', 'imagem/20230629151833.png', '2023-06-29 18:18:33', '2023-06-29 18:18:33'),
	(4, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', '79', NULL, '2023-07-04 18:14:19', '2023-07-04 18:14:19');

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servico1_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `servico1_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.funcionario: ~2 rows (aproximadamente)
INSERT INTO `funcionario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`, `data`) VALUES
	(1, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', 'imagem/20230629144642.jpg', '2023-06-29 17:46:42', '2023-06-29 17:46:42', 4, NULL),
	(2, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', 'imagem/20230629151911.jpg', '2023-06-29 18:19:11', '2023-06-29 18:19:11', 5, NULL);

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.leitura
CREATE TABLE IF NOT EXISTS `leitura` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data_leitura` date NOT NULL,
  `hora_leitura` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_sensor` double(8,2) NOT NULL,
  `sensor_id` bigint unsigned DEFAULT NULL,
  `mac_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leitura_sensor_id_foreign` (`sensor_id`),
  KEY `leitura_mac_id_foreign` (`mac_id`),
  CONSTRAINT `leitura_mac_id_foreign` FOREIGN KEY (`mac_id`) REFERENCES `mac` (`id`),
  CONSTRAINT `leitura_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.leitura: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.mac
CREATE TABLE IF NOT EXISTS `mac` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.mac: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_14_165129_create_usuario', 1),
	(6, '2023_04_28_175149_create_categorias_table', 1),
	(7, '2023_05_12_170844_mac', 1),
	(8, '2023_05_12_170845_sensor', 1),
	(9, '2023_05_12_170856_leitura', 1),
	(10, '2023_06_02_172652_create_servico1_table', 1),
	(11, '2023_06_04_204335_create_servico2_table', 1),
	(12, '2023_06_05_141243_create_reuniao_table', 1),
	(13, '2023_06_05_164958_create_curriculo_table', 1),
	(14, '2023_06_06_011607_create_vaga_table', 1),
	(15, '2023_06_28_152005_add_is_admin_to_users', 1);

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  `quantidade` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reuniao_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `reuniao_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.produto: ~1 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`, `quantidade`, `data`, `hora`) VALUES
	(3, 'NIKe DUNK', '40', 'nike@gmail.com', 'imagem/20230629153115.jpg', '2023-06-29 18:31:15', '2023-06-29 18:31:15', 8, NULL, NULL, NULL),
	(5, 'under armour', '90', 'lucassilvapurchio11@gmail.com', NULL, '2023-07-04 17:30:38', '2023-07-04 17:30:38', 8, NULL, '2023-07-04', '12:30:00'),
	(6, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', NULL, '2023-07-04 19:07:30', '2023-07-04 19:07:30', 6, NULL, '2023-07-07', '18:12:00');

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.sensor: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, '$2y$10$Vpao1hi9SNhluOWVcN6B1ucfk5saddvBBKVGQmYjaSTRvdWuUo4/6', NULL, '2023-06-29 17:13:28', '2023-06-29 17:13:28', 0),
	(2, 'LUCAS', 'lucassilvapurchio11@gmail.comm', NULL, '$2y$10$sbVze/2m2lD/NgyYhXo2xeqQ6BwsoqFjhWmHIAjgLg82J.MhtVD7K', NULL, '2023-06-29 17:17:41', '2023-06-29 17:17:41', 0),
	(3, 'marcos', 'marcos@gmail.com', NULL, '$2y$10$W1pB9PgkzFk6E1YkQc4vgum0jAWtOnlUTDUK7ZWK4tfhMmAB0Ucza', NULL, '2023-06-29 18:35:11', '2023-06-29 18:35:11', 0),
	(4, 'LUCAS  PURCHIO', 'lucassilvapurchio11@gmail.comx', NULL, '$2y$10$UzeiyEDtFg5cFL/O.DCEY.ec9zklnEHW9tv1W8tm449P1XuBkTace', NULL, '2023-07-04 17:09:41', '2023-07-04 18:24:22', 0);

-- Copiando estrutura para tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `usuario_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_gabriela_lucas_marcos_rodolfo.usuario: ~2 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(2, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', 'imagem/20230629152811.png', '2023-06-29 18:28:11', '2023-06-29 18:28:11', NULL),
	(4, 'LUCAS DA SILVA LUCAS PURCHIO', '49984172104', 'lucassilvapurchio11@gmail.com', NULL, '2023-07-04 18:16:13', '2023-07-04 18:16:13', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
