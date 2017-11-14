
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `b2s_user_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b2s_user_contact` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `blog_user_id` int(11) NOT NULL,
  `name_mandant` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name_presse` varchar(100) NOT NULL,
  `anrede_presse` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Frau,1=Herr 2=keine Angabe',
  `vorname_presse` varchar(50) NOT NULL,
  `nachname_presse` varchar(50) NOT NULL,
  `strasse_presse` varchar(100) NOT NULL,
  `nummer_presse` varchar(5) NOT NULL DEFAULT '',
  `plz_presse` varchar(10) NOT NULL,
  `ort_presse` varchar(75) NOT NULL,
  `land_presse` varchar(3) NOT NULL DEFAULT 'DE',
  `email_presse` varchar(75) NOT NULL,
  `telefon_presse` varchar(30) NOT NULL,
  `fax_presse` varchar(30) NOT NULL,
  `url_presse` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_user_id` (`blog_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `b2s_user_contact` WRITE;
/*!40000 ALTER TABLE `b2s_user_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `b2s_user_contact` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

