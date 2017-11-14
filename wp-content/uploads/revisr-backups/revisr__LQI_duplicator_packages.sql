
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
DROP TABLE IF EXISTS `_LQI_duplicator_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_LQI_duplicator_packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `package` mediumblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `_LQI_duplicator_packages` WRITE;
/*!40000 ALTER TABLE `_LQI_duplicator_packages` DISABLE KEYS */;
INSERT INTO `_LQI_duplicator_packages` VALUES (1,'20171102_welcometoqauber','85b84bf3559c9d126925171102142905',100,'2017-11-02 14:29:39','Alona','O:11:\"DUP_Package\":23:{s:7:\"Created\";s:19:\"2017-11-02 14:29:05\";s:7:\"Version\";s:6:\"1.2.26\";s:9:\"VersionWP\";s:5:\"4.8.3\";s:9:\"VersionDB\";s:6:\"5.6.32\";s:10:\"VersionPHP\";s:6:\"7.0.25\";s:9:\"VersionOS\";s:5:\"Linux\";s:2:\"ID\";i:1;s:4:\"Name\";s:24:\"20171102_welcometoqauber\";s:4:\"Hash\";s:32:\"85b84bf3559c9d126925171102142905\";s:8:\"NameHash\";s:57:\"20171102_welcometoqauber_85b84bf3559c9d126925171102142905\";s:4:\"Type\";i:0;s:5:\"Notes\";s:0:\"\";s:9:\"StorePath\";s:44:\"/home1/talcubat/public_html/wp-snapshots/tmp\";s:8:\"StoreURL\";s:39:\"http://www.talcubator.com/wp-snapshots/\";s:8:\"ScanFile\";s:67:\"20171102_welcometoqauber_85b84bf3559c9d126925171102142905_scan.json\";s:7:\"Runtime\";s:10:\"17.85 sec.\";s:7:\"ExeSize\";s:8:\"438.32KB\";s:7:\"ZipSize\";s:8:\"109.16MB\";s:6:\"Status\";N;s:6:\"WPUser\";s:5:\"Alona\";s:7:\"Archive\";O:11:\"DUP_Archive\":18:{s:10:\"FilterDirs\";s:0:\"\";s:11:\"FilterFiles\";s:0:\"\";s:10:\"FilterExts\";s:0:\"\";s:13:\"FilterDirsAll\";a:0:{}s:14:\"FilterFilesAll\";a:0:{}s:13:\"FilterExtsAll\";a:0:{}s:8:\"FilterOn\";i:0;s:12:\"ExportOnlyDB\";i:0;s:4:\"File\";s:69:\"20171102_welcometoqauber_85b84bf3559c9d126925171102142905_archive.zip\";s:6:\"Format\";s:3:\"ZIP\";s:7:\"PackDir\";s:27:\"/home1/talcubat/public_html\";s:4:\"Size\";i:114458441;s:4:\"Dirs\";a:0:{}s:5:\"Files\";a:0:{}s:10:\"FilterInfo\";O:23:\"DUP_Archive_Filter_Info\":8:{s:4:\"Dirs\";O:34:\"DUP_Archive_Filter_Scope_Directory\":4:{s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:5:\"Files\";O:29:\"DUP_Archive_Filter_Scope_File\":5:{s:4:\"Size\";a:0:{}s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:4:\"Exts\";O:29:\"DUP_Archive_Filter_Scope_Base\":2:{s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:9:\"UDirCount\";i:0;s:10:\"UFileCount\";i:0;s:9:\"UExtCount\";i:0;s:8:\"TreeSize\";a:0:{}s:11:\"TreeWarning\";a:0:{}}s:10:\"\0*\0Package\";r:1;s:29:\"\0DUP_Archive\0tmpFilterDirsAll\";a:0:{}s:24:\"\0DUP_Archive\0wpCorePaths\";a:6:{i:0;s:36:\"/home1/talcubat/public_html/wp-admin\";i:1;s:46:\"/home1/talcubat/public_html/wp-content/uploads\";i:2;s:48:\"/home1/talcubat/public_html/wp-content/languages\";i:3;s:46:\"/home1/talcubat/public_html/wp-content/plugins\";i:4;s:45:\"/home1/talcubat/public_html/wp-content/themes\";i:5;s:39:\"/home1/talcubat/public_html/wp-includes\";}}s:9:\"Installer\";O:13:\"DUP_Installer\":7:{s:4:\"File\";s:71:\"20171102_welcometoqauber_85b84bf3559c9d126925171102142905_installer.php\";s:4:\"Size\";i:448839;s:10:\"OptsDBHost\";s:0:\"\";s:10:\"OptsDBPort\";s:0:\"\";s:10:\"OptsDBName\";s:0:\"\";s:10:\"OptsDBUser\";s:0:\"\";s:10:\"\0*\0Package\";r:1;}s:8:\"Database\";O:12:\"DUP_Database\":13:{s:4:\"Type\";s:5:\"MySQL\";s:4:\"Size\";i:8239815;s:4:\"File\";s:70:\"20171102_welcometoqauber_85b84bf3559c9d126925171102142905_database.sql\";s:4:\"Path\";N;s:12:\"FilterTables\";s:0:\"\";s:8:\"FilterOn\";i:0;s:4:\"Name\";N;s:10:\"Compatible\";s:0:\"\";s:8:\"Comments\";s:52:\"Percona Server (GPL), Release 78.1, Revision 8bb53b6\";s:10:\"\0*\0Package\";r:1;s:25:\"\0DUP_Database\0dbStorePath\";s:115:\"/home1/talcubat/public_html/wp-snapshots/tmp/20171102_welcometoqauber_85b84bf3559c9d126925171102142905_database.sql\";s:23:\"\0DUP_Database\0EOFMarker\";s:0:\"\";s:26:\"\0DUP_Database\0networkFlush\";b:0;}}');
/*!40000 ALTER TABLE `_LQI_duplicator_packages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

