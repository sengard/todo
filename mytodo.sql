-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.6-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mytodo
CREATE DATABASE IF NOT EXISTS `mytodo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mytodo`;

-- Dumping structure for table mytodo.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) unsigned NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  CONSTRAINT `FK_images_tasks` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

-- Dumping data for table mytodo.images: ~5 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `task_id`, `file`) VALUES
	(86, 156, '642d5e8b60876dea30ac854945844ce5.jpg'),
	(87, 156, '80caf03e537a2825881085e2818d6a2c.jpg'),
	(88, 156, '86bb335b32da74af2719af2b4ffc128e.jpg'),
	(89, 156, 'fb5677fa6af97123ed9e93d7b7daa729.jpg'),
	(90, 165, '9bab5929f6857f82ab87eb767e0f8fb9.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table mytodo.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 COMMENT='\r\n';

-- Dumping data for table mytodo.tasks: ~12 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `description`, `name`, `email`) VALUES
	(154, '333', '333', '333'),
	(155, '333', '333', '333'),
	(156, '333', '333', '333'),
	(157, 'rrrr', 'rrr', 'rrr'),
	(158, '333', '333', '333'),
	(159, '333', '333', '333'),
	(160, '333', '333', '333'),
	(161, '333', '333', '333'),
	(162, '333', '333', '333'),
	(163, '333', '333', '333'),
	(164, 'eee', 'eee', 'Eee'),
	(165, 'eee', 'eee', 'Eee');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Dumping structure for table mytodo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table mytodo.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
	(1, 'test1', 'yalagin@gmail.com', '$2y$10$i736BlltgU4d6sZZxbGgueK9S///jzamUZ7OSPKSR.YmxJEfHpcNi', 0),
	(2, 'test', 'yalagin@gmail.com', '$2y$10$lfu0z7yhrJdvrxhKeUgqK./Vu4V6.FPWnnkcL2n7/o6eJtz.JyBUO', 0),
	(24, 'admin', 'admin@gmail.com', '$2y$10$4/myFUps1KFASyECk41cvu/1TixTk.JndYoWUTkHDhMlHgYcBZpcm', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
