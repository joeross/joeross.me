
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
DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','Joseph J. Ross, Esq.'),(2,1,'first_name','Joseph'),(3,1,'last_name','Ross'),(4,1,'description','I\'m a lawyer, writer and geek currently working as a judicial law clerk. I write about privacy, national security, intellectual property, LGBTQ and many, many other legal topics.'),(5,1,'rich_editing','false'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(11,1,'wp_user_level','10'),(12,1,'dismissed_wp_pointers','wp360_locks,wp390_widgets,wp410_dfw'),(13,1,'show_welcome_panel','0'),(14,1,'session_tokens','a:5:{s:64:\"5d294b93fef6ab5426ad2692f05fefdd5401cf674330b0f32cea38a56ace94f4\";a:4:{s:10:\"expiration\";i:1426179183;s:2:\"ip\";s:12:\"209.50.135.2\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36\";s:5:\"login\";i:1424969583;}s:64:\"f52353955db58dc61a3f4b49a1563f466e003b362da0c31e4c0bd763065652f5\";a:4:{s:10:\"expiration\";i:1426181292;s:2:\"ip\";s:12:\"209.50.135.2\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36\";s:5:\"login\";i:1424971692;}s:64:\"846d9e2bd589a5a0be212dcbbb67669b5f9e087109b9feb3a4a3f6de92ae1f04\";a:4:{s:10:\"expiration\";i:1426213956;s:2:\"ip\";s:12:\"72.86.141.53\";s:2:\"ua\";s:118:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/600.3.18 (KHTML, like Gecko) Version/8.0.3 Safari/600.3.18\";s:5:\"login\";i:1425004356;}s:64:\"a97320105de67bb9b6884dabb205e2f8342d94604c76be69137ae28f8c54ecc2\";a:4:{s:10:\"expiration\";i:1426619138;s:2:\"ip\";s:12:\"209.50.135.2\";s:2:\"ua\";s:109:\"Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36\";s:5:\"login\";i:1425409538;}s:64:\"365f6d64f958d25d70a6357896d7c214abb86b68ee6922ede222736c0c0e432d\";a:4:{s:10:\"expiration\";i:1426649546;s:2:\"ip\";s:13:\"72.86.136.239\";s:2:\"ua\";s:120:\"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.74 Safari/537.36\";s:5:\"login\";i:1425439946;}}'),(15,1,'wp_dashboard_quick_press_last_post_id','840'),(16,1,'wp_user-settings','editor=html&posts_list_mode=list&dfw_width=700'),(17,1,'wp_user-settings-time','1425066630'),(18,1,'edit_post_per_page','100'),(19,1,'AtD_options',''),(20,1,'AtD_check_when',''),(21,1,'AtD_guess_lang',''),(22,1,'AtD_ignored_phrases',''),(23,1,'managenav-menuscolumnshidden','a:4:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),(24,1,'metaboxhidden_nav-menus','a:3:{i:0;s:8:\"add-post\";i:1;s:12:\"add-post_tag\";i:2;s:15:\"add-post_format\";}'),(25,1,'nav_menu_recently_edited','1531'),(26,1,'_yoast_wpseo_profile_updated','1425440667'),(27,1,'wpseo_title','About Joseph J. Ross, Esq.'),(28,1,'wpseo_metadesc','Joseph J. Ross, Esq. is a lawyer, writer and geek.'),(29,1,'wpseo_metakey',''),(30,1,'wpseo_excludeauthorsitemap',''),(31,1,'amt_twitter_author_username','joeross'),(32,1,'amt_twitter_publisher_username',''),(33,1,'amt_facebook_author_profile_url','http://facebook.com/joeross14'),(34,1,'amt_facebook_publisher_profile_url',''),(35,1,'amt_googleplus_author_profile_url','http://google.com/+joeross'),(36,1,'amt_googleplus_publisher_profile_url',''),(37,1,'googleplus','http://google.com/+joeross'),(38,1,'twitter','joeross'),(39,1,'facebook','http://facebook.com/joeross14');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

