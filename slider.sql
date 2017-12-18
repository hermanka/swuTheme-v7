-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table wordpress.swu_slider
CREATE TABLE IF NOT EXISTS `swu_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `detail_title` varchar(100) NOT NULL,
  `detail_content` text NOT NULL,
  `more_text` varchar(50) NOT NULL DEFAULT 'Selengkapnya',
  `animation` varchar(50) NOT NULL DEFAULT 'fadeInUpBig',
  `hyperlink` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table wordpress.swu_slider: ~2 rows (approximately)
/*!40000 ALTER TABLE `swu_slider` DISABLE KEYS */;
INSERT INTO `swu_slider` (`id`, `image_url`, `detail_title`, `detail_content`, `more_text`, `animation`, `hyperlink`) VALUES
	(1, 'http://localhost/wordpress/wp-content/themes/swuv7/img/slider/korea-temple.png', 'Joint Program', 'SWU Siap menghadapi persaingan global dengan berbagai program kerjasama Dalam dan Luar Negeri.<br /><i class="fa fa-arrow-circle-o-right"></i> Double Degree<span style="margin-right:15px"></span><i class="fa fa-arrow-circle-o-right"></i> Student Exchange<br /><i class="fa fa-arrow-circle-o-right"></i> Internship Program', 'Selengkapnya', 'fadeInUp', 'http://google.com'),
	(2, 'http://localhost/wordpress/wp-content/themes/swuv7/img/slider/robot.png', 'Konsentrasi Studi', 'SWU Membuka 4 Program Studi dengan pilihan konsentrasi : <br />Robotika Industri, Mobile Computing & Networking, Sistem Informasi Akuntansi, Teknik Komputer Jaringan, Multimedia, dan Komputerisasi Akuntansi Keuangan', '', 'fadeInDown', '');
/*!40000 ALTER TABLE `swu_slider` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
