-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.2.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table library.adminbook: ~4 rows (approximately)
INSERT INTO `adminbook` (`id`, `Title`, `Author`, `Copies`, `Borrowed`, `created_at`, `updated_at`) VALUES
	(1, 'To Kill a Mockingbird', 'Harper Lee', 100, 0, '2023-07-22 11:49:32', '2023-07-22 11:49:32'),
	(2, '1984', 'George Orwell', 100, 0, '2023-07-22 11:49:47', '2023-07-22 11:49:47'),
	(3, 'Pride and Prejudice', 'Jane Austen', 100, 0, '2023-07-22 11:50:02', '2023-07-22 11:50:02'),
	(6, 'James Curry', 'jasjs', 100, 0, '2023-07-23 05:42:58', '2023-07-23 05:42:58');

-- Dumping data for table library.failed_jobs: ~0 rows (approximately)

-- Dumping data for table library.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(11, '2014_10_12_000000_create_users_table', 1),
	(12, '2014_10_12_100000_create_password_resets_table', 1),
	(13, '2019_08_19_000000_create_failed_jobs_table', 1),
	(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(15, '2023_07_22_090725_admin_book', 1);

-- Dumping data for table library.password_resets: ~0 rows (approximately)

-- Dumping data for table library.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table library.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Booksbr`, `status`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Albert', 'admin@mail.com', '2023-07-22 11:47:05', '$2y$10$1Pabib.2F345oqx2s9Bh8.I9UzoArPm5w7CuvKd0HCBj789cqNP2i', '[]', 'Active', 1, NULL, '2023-07-22 11:46:35', '2023-07-23 06:26:30'),
	(2, 'Lebron', 'bpfnivjyqkgu@bugfoo.com', '2023-07-22 11:51:32', '$2y$10$rQAhmK1bkfPWdRuf5NK9Z.RH.uHS8limP1Dp7OryRDVXIHyeemSze', '[1,6]', 'Active', 0, 'F51rsDKC6F4bgPh1u2YPmcKGOilljMVDTjlB5JtitMBSHENQtu3FZFhhSa35', '2023-07-22 11:51:20', '2023-07-23 06:05:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
