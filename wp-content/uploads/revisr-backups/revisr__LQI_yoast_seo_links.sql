
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
DROP TABLE IF EXISTS `_LQI_yoast_seo_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_LQI_yoast_seo_links` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `target_post_id` bigint(20) unsigned NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_direction` (`post_id`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=433 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `_LQI_yoast_seo_links` WRITE;
/*!40000 ALTER TABLE `_LQI_yoast_seo_links` DISABLE KEYS */;
INSERT INTO `_LQI_yoast_seo_links` VALUES (1,'#',281,0,'internal'),(2,'#',281,0,'internal'),(3,'#',281,0,'internal'),(4,'#',281,0,'internal'),(5,'#',281,0,'internal'),(6,'#',281,0,'internal'),(7,'#',281,0,'internal'),(8,'#',281,0,'internal'),(9,'#',281,0,'internal'),(10,'#',281,0,'internal'),(11,'#',281,0,'internal'),(12,'#',281,0,'internal'),(13,'#',281,0,'internal'),(14,'#',281,0,'internal'),(15,'#',281,0,'internal'),(16,'#',281,0,'internal'),(17,'#',2364,0,'internal'),(18,'#',2364,0,'internal'),(19,'#',2364,0,'internal'),(20,'#',2364,0,'internal'),(21,'#',2364,0,'internal'),(22,'#',2364,0,'internal'),(23,'#',2364,0,'internal'),(24,'#',2364,0,'internal'),(25,'#',2364,0,'internal'),(26,'#',2364,0,'internal'),(27,'#',2364,0,'internal'),(28,'#',2364,0,'internal'),(29,'#',2364,0,'internal'),(30,'#',2364,0,'internal'),(31,'#',2364,0,'internal'),(32,'#',2364,0,'internal'),(33,'#',2473,0,'internal'),(149,'',2488,0,'internal'),(148,'',2488,0,'internal'),(147,'',2488,0,'internal'),(37,'',2240,0,'internal'),(38,'',2240,0,'internal'),(40,'http://www.talcubator.com/welcome-qauber-blog/',2553,2530,'internal'),(414,'http://training.qauber.com/curriculum/',3140,0,'external'),(412,'http://qauber.com/',3127,0,'external'),(413,'http://training.qauber.com/curriculum/',3144,0,'external'),(432,'http://talcubator.com/training/#train-3',2873,0,'external'),(409,'',2879,0,'internal'),(408,'',2879,0,'internal'),(407,'',2879,0,'internal'),(150,'',2488,0,'internal'),(431,'http://talcubator.com/training/#train-2',2873,0,'external'),(430,'http://talcubator.com/training/#train-1',2873,0,'external'),(390,'',2714,0,'internal');
/*!40000 ALTER TABLE `_LQI_yoast_seo_links` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

