-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk practice_makes_perfect
CREATE DATABASE IF NOT EXISTS `practice_makes_perfect` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `practice_makes_perfect`;

-- membuang struktur untuk table practice_makes_perfect.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL,
  `deskripsi_barang` text,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `stok_barang` int NOT NULL,
  `supplier_barang` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `kode_barang` (`kode_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel practice_makes_perfect.barang: ~10 rows (lebih kurang)
INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `kategori_barang`, `deskripsi_barang`, `harga_beli`, `harga_jual`, `stok_barang`, `supplier_barang`, `tanggal_masuk`) VALUES
	(1, 'BRG001', 'Laptop Lenovo', 'Elektronik', 'Laptop untuk kebutuhan sehari-hari', 6000000, 7500000, 20, 'PT. ABC', '2024-05-01'),
	(2, 'BRG002', 'Mouse Logitech', 'Aksesoris', 'Mouse wireless', 150000, 200000, 100, 'PT. XYZ', '2024-05-02'),
	(3, 'BRG003', 'Keyboard Mechanical', 'Aksesoris', 'Keyboard mechanical untuk gaming', 800000, 1000000, 50, 'PT. DEF', '2024-05-03'),
	(4, 'BRG004', 'Monitor Samsung', 'Elektronik', 'Monitor 24 inch', 1500000, 1800000, 30, 'PT. GHI', '2024-05-04'),
	(5, 'BRG005', 'Printer Epson', 'Elektronik', 'Printer multifungsi', 1200000, 1400000, 40, 'PT. JKL', '2024-05-05'),
	(6, 'BRG006', 'Flashdisk Sandisk 32GB', 'Penyimpanan', 'Flashdisk dengan kapasitas 32GB', 100000, 125000, 200, 'PT. MNO', '2024-05-06'),
	(7, 'BRG007', 'Harddisk Eksternal WD 1TB', 'Penyimpanan', 'Harddisk eksternal dengan kapasitas 1TB', 900000, 1100000, 60, 'PT. PQR', '2024-05-07'),
	(8, 'BRG008', 'Headset Sony', 'Aksesoris', 'Headset dengan kualitas suara tinggi', 300000, 400000, 80, 'PT. STU', '2024-05-08'),
	(9, 'BRG009', 'Router TP-Link', 'Networking', 'Router wireless', 500000, 600000, 70, 'PT. VWX', '2024-05-09'),
	(10, 'BRG010', 'Kamera Canon', 'Elektronik', 'Kamera DSLR', 7000000, 8500000, 10, 'PT. YZA', '2024-05-10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
