
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
DROP TABLE IF EXISTS `_LQI_wfCrawlers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_LQI_wfCrawlers` (
  `IP` binary(16) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  `patternSig` binary(16) NOT NULL,
  `status` char(8) NOT NULL,
  `lastUpdate` int(10) unsigned NOT NULL,
  `PTR` varchar(255) DEFAULT '',
  PRIMARY KEY (`IP`,`patternSig`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `_LQI_wfCrawlers` WRITE;
/*!40000 ALTER TABLE `_LQI_wfCrawlers` DISABLE KEYS */;
INSERT INTO `_LQI_wfCrawlers` VALUES ('\0\0\0\0\0\0\0\0\0\0ˇˇB˘IÅ','ã¸¿ïê>çb0´oQ1åˆ','verified',1509760845,'crawl-66-249-73-129.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘IÑ','ã¸¿ïê>çb0´oQ1åˆ','verified',1509760839,'crawl-66-249-73-132.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘Iã','ã¸¿ïê>çb0´oQ1åˆ','verified',1510017124,'crawl-66-249-73-139.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘Iá','ã¸¿ïê>çb0´oQ1åˆ','verified',1509760840,'crawl-66-249-73-135.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘I‹','ã¸¿ïê>çb0´oQ1åˆ','verified',1510189310,'crawl-66-249-73-220.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘I›','ã¸¿ïê>çb0´oQ1åˆ','verified',1510182401,'crawl-66-249-73-221.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘I€','ã¸¿ïê>çb0´oQ1åˆ','verified',1510182402,'crawl-66-249-73-219.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘AŸ','ã¸¿ïê>çb0´oQ1åˆ','verified',1510189308,'crawl-66-249-65-217.googlebot.com'),('\0\0\0\0\0\0\0\0\0\0ˇˇB˘A€','ã¸¿ïê>çb0´oQ1åˆ','verified',1510189309,'crawl-66-249-65-219.googlebot.com');
/*!40000 ALTER TABLE `_LQI_wfCrawlers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

