
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
DROP TABLE IF EXISTS `wp_gf_fontlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_gf_fontlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `variant` varchar(255) NOT NULL,
  `subsets` varchar(255) NOT NULL,
  `used_in_posts` int(11) NOT NULL DEFAULT '0',
  `in_trash` int(11) NOT NULL DEFAULT '0',
  `total_used` int(11) NOT NULL DEFAULT '0',
  `gfont` int(11) NOT NULL DEFAULT '1',
  `installed` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ix_gfl_installed` (`installed`),
  KEY `ix_gfl_gf` (`gfont`),
  KEY `ix_gfl_uip` (`used_in_posts`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_gf_fontlist` WRITE;
/*!40000 ALTER TABLE `wp_gf_fontlist` DISABLE KEYS */;
INSERT INTO `wp_gf_fontlist` VALUES (1,'Open Sans','regular','latin,greek-ext,cyrillic,cyrillic-ext,vietnamese,latin-ext,devanagari,greek',0,0,0,1,1),(2,'Open Sans Condensed','regular','latin,greek-ext,cyrillic,cyrillic-ext,vietnamese,latin-ext,greek',0,0,0,1,1),(3,'Source Code Pro','regular','latin,latin-ext',0,0,0,1,1),(4,'Source Serif Pro','regular','latin,latin-ext',0,0,0,1,1),(5,'Source Sans Pro','regular','latin,vietnamese,latin-ext',0,0,0,1,1);
/*!40000 ALTER TABLE `wp_gf_fontlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

