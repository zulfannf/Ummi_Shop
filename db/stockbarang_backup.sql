-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for stockbarang
CREATE DATABASE IF NOT EXISTS `stockbarang` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `stockbarang`;

-- Dumping structure for table stockbarang.keluar
CREATE TABLE IF NOT EXISTS `keluar` (
  `idkeluar` int NOT NULL AUTO_INCREMENT,
  `idkeluar_barang` int NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idkeluar`),
  KEY `fk_keluar_barang` (`idkeluar_barang`),
  CONSTRAINT `fk_keluar_barang` FOREIGN KEY (`idkeluar_barang`) REFERENCES `stock` (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table stockbarang.keluar: ~1 rows (approximately)
INSERT INTO `keluar` (`idkeluar`, `idkeluar_barang`, `penerima`, `qty`, `tanggal`) VALUES
	(2, 2, 'bagas', 50, '2025-01-28 13:50:04'),
	(3, 3, 'jaka', 50, '2025-01-28 14:05:08');

-- Dumping structure for table stockbarang.login
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_uniq` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table stockbarang.login: ~1 rows (approximately)
INSERT INTO `login` (`id`, `email`, `password`, `created_at`) VALUES
	(1, 'joko@gmail.com', '123', '2025-01-28 12:39:53');

-- Dumping structure for table stockbarang.masuk
CREATE TABLE IF NOT EXISTS `masuk` (
  `idmasuk` int NOT NULL AUTO_INCREMENT,
  `idmasuk_barang` int NOT NULL,
  `keterangan` text,
  `qty` int DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmasuk`),
  KEY `fk_masuk_barang` (`idmasuk_barang`),
  CONSTRAINT `fk_masuk_barang` FOREIGN KEY (`idmasuk_barang`) REFERENCES `stock` (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table stockbarang.masuk: ~1 rows (approximately)
INSERT INTO `masuk` (`idmasuk`, `idmasuk_barang`, `keterangan`, `qty`, `tanggal`) VALUES
	(1, 2, 'bagus', 100, '2025-01-28 13:47:33'),
	(2, 3, 'joko', 100, '2025-01-28 14:04:29');

-- Dumping structure for table stockbarang.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `idbarang` int NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(255) NOT NULL,
  `deskripsi` text,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table stockbarang.stock: ~1 rows (approximately)
INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`) VALUES
	(2, 'samsung s6', 'handphone', 62),
	(3, 'oppo ', 'handphone', 150);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
