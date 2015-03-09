
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
DROP TABLE IF EXISTS `wp_revisr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_revisr` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text,
  `event` varchar(42) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_revisr` WRITE;
/*!40000 ALTER TABLE `wp_revisr` DISABLE KEYS */;
INSERT INTO `wp_revisr` VALUES (1,'2015-03-04 04:01:12','Successfully created a new repository.','init'),(2,'2015-03-04 04:05:19','Successfully backed up the database.','backup'),(3,'2015-03-04 04:05:19','The daily backup was successful.','backup'),(4,'2015-03-04 04:10:32','Successfully backed up the database.','backup'),(5,'2015-03-04 04:10:33','Error pushing changes to the remote repository.','error'),(6,'2015-03-04 04:10:33','Committed <a href=\"http://blog.joeross.me/wp-admin/post.php?post=813&action=edit\">#4b789a9</a> to the local repository.','commit'),(7,'2015-03-04 04:10:33','Error pushing changes to the remote repository.','error'),(8,'2015-03-04 04:23:12','Successfully backed up the database.','backup'),(9,'2015-03-04 04:23:13','Error pushing changes to the remote repository.','error'),(10,'2015-03-04 04:23:29','Pulled <a href=\"http://blog.joeross.me/wp-admin/post.php?post=815&action=edit\">#3b7d889</a> from origin/master.','pull'),(11,'2015-03-04 04:23:56','Successfully imported the database. <a href=\"http://blog.joeross.me/wp-admin/admin-post.php?action=revert_db&amp;db_hash=f701d2d&amp;branch=master&amp;backup_method=tables&amp;revert_db_nonce=f9e2b06c97\">Undo</a>','import'),(12,'2015-03-04 04:24:23','Successfully pushed 7 commits to origin/master.','push'),(13,'2015-03-04 04:27:49','Successfully backed up the database.','backup'),(14,'2015-03-04 04:27:53','Successfully pushed 2 commits to origin/master.','push'),(15,'2015-03-04 04:27:53','Committed <a href=\"http://blog.joeross.me/wp-admin/post.php?post=818&action=edit\">#7d1d5f5</a> to the local repository.','commit'),(16,'2015-03-04 04:27:54','Successfully pushed 0 commits to origin/master.','push'),(17,'2015-03-04 14:20:04','Error staging files.','error'),(18,'2015-03-04 14:20:04','Error committing the changes to the local repository.','error'),(19,'2015-03-04 14:20:09','Successfully backed up the database.','backup'),(20,'2015-03-04 14:20:16','Successfully pushed 2 commits to origin/master.','push'),(21,'2015-03-04 14:20:16','Committed <a href=\"http://blog.joeross.me/wp-admin/post.php?post=819&action=edit\">#52eff85</a> to the local repository.','commit'),(22,'2015-03-04 14:20:17','Successfully pushed 0 commits to origin/master.','push'),(23,'2015-03-05 04:07:35','Successfully backed up the database.','backup'),(24,'2015-03-05 04:07:43','Successfully pushed 1 commit to origin/master.','push'),(25,'2015-03-05 04:07:43','The daily backup was successful.','backup'),(26,'2015-03-06 04:07:40','Successfully backed up the database.','backup'),(27,'2015-03-06 04:07:48','Successfully pushed 2 commits to origin/master.','push'),(28,'2015-03-06 04:07:48','The daily backup was successful.','backup'),(29,'2015-03-07 04:30:13','Successfully backed up the database.','backup'),(30,'2015-03-07 04:30:19','Successfully pushed 2 commits to origin/master.','push'),(31,'2015-03-07 04:30:19','The daily backup was successful.','backup'),(32,'2015-03-08 04:08:04','Successfully backed up the database.','backup'),(33,'2015-03-08 04:08:13','Successfully pushed 2 commits to origin/master.','push'),(34,'2015-03-08 04:08:13','The daily backup was successful.','backup');
/*!40000 ALTER TABLE `wp_revisr` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

