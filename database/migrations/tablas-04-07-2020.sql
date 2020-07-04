-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ferreteria
CREATE DATABASE IF NOT EXISTS `ferreteria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ferreteria`;

-- Volcando estructura para tabla ferreteria.ti_cat_providers
CREATE TABLE IF NOT EXISTS `ti_cat_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exterior_num` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_num` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colony` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locatily` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catalogo de provedores';

-- Volcando datos para la tabla ferreteria.ti_cat_providers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ti_cat_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ti_cat_providers` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria.ti_cat_warehouses
CREATE TABLE IF NOT EXISTS `ti_cat_warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `ceated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Almacenes';

-- Volcando datos para la tabla ferreteria.ti_cat_warehouses: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ti_cat_warehouses` DISABLE KEYS */;
/*!40000 ALTER TABLE `ti_cat_warehouses` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria.ti_products
CREATE TABLE IF NOT EXISTS `ti_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` double(14,4) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` double(14,4) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `observations` longtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(2) DEFAULT NULL,
  `crated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='List Products ';

-- Volcando datos para la tabla ferreteria.ti_products: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ti_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `ti_products` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria.ti_products_providers
CREATE TABLE IF NOT EXISTS `ti_products_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_provider_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Productos relacion de providers';

-- Volcando datos para la tabla ferreteria.ti_products_providers: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ti_products_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `ti_products_providers` ENABLE KEYS */;

-- Volcando estructura para tabla ferreteria.ti_products_warehouses
CREATE TABLE IF NOT EXISTS `ti_products_warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_warehouse_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `stock` double(14,4) DEFAULT '0.0000',
  `active` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Products and warehouses';

-- Volcando datos para la tabla ferreteria.ti_products_warehouses: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ti_products_warehouses` DISABLE KEYS */;
/*!40000 ALTER TABLE `ti_products_warehouses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
