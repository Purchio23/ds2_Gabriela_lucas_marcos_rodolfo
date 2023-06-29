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


-- Copiando estrutura do banco de dados para db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo
CREATE DATABASE IF NOT EXISTS `db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo`;

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.categoria: ~0 rows (aproximadamente)
INSERT INTO `categoria` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Gerente', NULL, NULL),
	(2, 'Entregador', NULL, NULL),
	(3, 'Caixa', NULL, NULL),
	(4, 'Auxiliar administrativo', NULL, NULL),
	(5, 'Lider de produção', NULL, NULL);
  (6, 'CORRIDA ', NULL, NULL);
  (5, 'SKATE', NULL, NULL);
  (5, 'BASQUETE', NULL, NULL);
  (5, 'CAMINHADA', NULL, NULL);

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.curriculo
CREATE TABLE IF NOT EXISTS `curriculo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.curriculo: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.failed_jobs
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

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.fornecedor: ~4 rows (aproximadamente)
INSERT INTO `fornecedor` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Rosas da Maria | 18.239.079/0001-73', 'Flor Rosa', 'mariaflores.com@gmail.com', 'imagem/20230604144608.jpg', '2023-06-04 17:46:08', '2023-06-06 01:12:34'),
	(2, 'Jardinagem Azul | 72.707.591/0001-42', 'Samambaia Azul', 'jardimazul@gmail.com', NULL, '2023-06-04 17:51:45', '2023-06-06 01:14:09'),
	(3, 'Rosas da Maria Frutíferas do José | 42.683.898/0001-90', 'Laranjeira', 'frutasdojosé@gmail.com', 'imagem/20230604151656.jpg', '2023-06-04 18:16:56', '2023-06-06 01:14:15'),
	(4, 'Hortaliças Rural| 68.557.138/0001-20', 'Pitangueira', 'hortaliçasrural@gmail.com', NULL, '2023-06-04 18:21:35', '2023-06-06 01:14:38');

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.leitura
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

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.leitura: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.mac
CREATE TABLE IF NOT EXISTS `mac` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.mac: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.migrations: ~0 rows (aproximadamente)
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
	(10, '2023_04_14_165129_create_fornecedor', 2),
	(11, '2023_04_14_165129_create_produto', 2),
	(12, '2023_06_02_172652_create_servico1_table', 3),
	(13, '2023_06_02_173022_create_servico1_table', 3),
	(14, '2023_06_04_204335_create_servico2_table', 3),
	(15, '2023_06_05_141243_create_reuniao_table', 3),
	(16, '2023_06_05_164958_create_curriculo_table', 3),
	(17, '2023_06_06_011607_create_vaga_table', 3);

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.personal_access_tokens
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

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.produto: ~4 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `valor`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(2, 'Samambaia Azul', '40', 'Pteridófitas', 'imagem/20230604144532.PNG', '2023-06-04 17:45:32', '2023-06-06 01:11:31', NULL),
	(3, 'Laranjeira Roxa', '50', 'Citrus sinensis', NULL, '2023-06-04 17:52:05', '2023-06-06 01:11:44', NULL),
	(4, 'Pitangueira', '60', 'Eugenia uniflora', NULL, '2023-06-04 20:03:25', '2023-06-06 01:11:55', NULL);

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.reuniao
CREATE TABLE IF NOT EXISTS `reuniao` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reuniao_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `reuniao_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.reuniao: ~0 rows (aproximadamente)


-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.sensor: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.servico1
CREATE TABLE IF NOT EXISTS `servico1` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagem` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.servico1: ~0 rows (aproximadamente)
INSERT INTO `servico1` (`id`, `nome`, `telefone`, `email`, `imagem`, `categoria_id`, `created_at`, `updated_at`) VALUES
	(1, 'Rodolfo', '11111111653356', 'rodolfobudde1@gmail.com', 'imagem/20230625212823.png', 'aaaaaaaaaa', '2023-06-26 00:03:24', '2023-06-26 00:28:23'),
	(4, 'Rosas da Maria', '11111111', 'dolfo18pvp@gmail.com', 'imagem/20230625212752.png', 'Lançamentp', '2023-06-26 00:21:35', '2023-06-26 00:27:52'),
	(5, 'Rosas da Maria', '11111111653356', 'rodolfobudde1@gmail.com', 'imagem/20230625212553.png', 'Lançamentp', '2023-06-26 00:25:53', '2023-06-26 00:27:58');

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.users: ~3 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@admin.com', NULL, 'admin@123', NULL, '2023-06-04 17:23:30', '2023-06-04 17:23:30'),


-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.usuario
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `imagem`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(1, 'Rodolfo', '49 998174346', 'rodolfobudde1@gmail.com', 'imagem/20230604142515.PNG', '2023-06-04 17:25:16', '2023-06-06 01:09:11', NULL),
	(2, 'Marcos', '49 998234576', 'marcosambrozio@gmail.com', NULL, '2023-06-04 17:25:42', '2023-06-06 01:09:27', NULL),
	(3, 'Jackson', '49 99812371234', 'lordjack@gmail.com', NULL, '2023-06-04 17:51:10', '2023-06-06 01:09:41', NULL);

-- Copiando estrutura para tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.vaga
CREATE TABLE IF NOT EXISTS `vaga` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idade` int DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabfinal_Gabriela_Lucas_Marcos_Rodolfo.vaga: ~0 rows (aproximadamente)
INSERT INTO `vaga` (`id`, `nome`, `telefone`, `email`,`idade`, `imagem`, `updated_at`, `created_at`) VALUES

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
