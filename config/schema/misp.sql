-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: misp4
-- ------------------------------------------------------
-- Server version	10.3.31-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_bin DEFAULT NULL,
  `created` datetime NOT NULL,
  `model` varchar(80) COLLATE utf8_bin NOT NULL,
  `model_id` int(11) NOT NULL,
  `action` varchar(20) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `change` text COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `org` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=322172 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `organisations`
--

DROP TABLE IF EXISTS `organisations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sector` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `uuid` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `contacts` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `local` tinyint(1) NOT NULL DEFAULT 0,
  `restricted_to_domain` text COLLATE utf8_bin DEFAULT NULL,
  `landingpage` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uuid` (`uuid`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `perm_add` tinyint(1) DEFAULT NULL,
  `perm_modify` tinyint(1) DEFAULT NULL,
  `perm_modify_org` tinyint(1) DEFAULT NULL,
  `perm_publish` tinyint(1) DEFAULT NULL,
  `perm_delegate` tinyint(1) NOT NULL DEFAULT 0,
  `perm_sync` tinyint(1) DEFAULT NULL,
  `perm_admin` tinyint(1) DEFAULT NULL,
  `perm_audit` tinyint(1) DEFAULT NULL,
  `perm_full` tinyint(1) DEFAULT NULL,
  `perm_auth` tinyint(1) NOT NULL DEFAULT 0,
  `perm_site_admin` tinyint(1) NOT NULL DEFAULT 0,
  `perm_regexp_access` tinyint(1) NOT NULL DEFAULT 0,
  `perm_tagger` tinyint(1) NOT NULL DEFAULT 0,
  `perm_template` tinyint(1) NOT NULL DEFAULT 0,
  `perm_sharing_group` tinyint(1) NOT NULL DEFAULT 0,
  `perm_tag_editor` tinyint(1) NOT NULL DEFAULT 0,
  `perm_sighting` tinyint(1) NOT NULL DEFAULT 0,
  `perm_object_template` tinyint(1) NOT NULL DEFAULT 0,
  `default_role` tinyint(1) NOT NULL DEFAULT 0,
  `memory_limit` varchar(255) COLLATE utf8_bin DEFAULT '',
  `max_execution_time` varchar(255) COLLATE utf8_bin DEFAULT '',
  `restricted_to_site_admin` tinyint(1) NOT NULL DEFAULT 0,
  `perm_publish_zmq` tinyint(1) NOT NULL DEFAULT 0,
  `perm_publish_kafka` tinyint(1) NOT NULL DEFAULT 0,
  `perm_decaying` tinyint(1) NOT NULL DEFAULT 0,
  `enforce_rate_limit` tinyint(1) NOT NULL DEFAULT 0,
  `rate_limit_count` int(11) NOT NULL DEFAULT 0,
  `perm_galaxy_editor` tinyint(1) NOT NULL DEFAULT 0,
  `perm_warninglist` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servers`
--

DROP TABLE IF EXISTS `servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `authkey` varchar(40) COLLATE utf8_bin NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `push` tinyint(1) NOT NULL,
  `pull` tinyint(1) NOT NULL,
  `push_sightings` tinyint(1) NOT NULL DEFAULT 0,
  `push_galaxy_clusters` tinyint(1) NOT NULL DEFAULT 0,
  `pull_galaxy_clusters` tinyint(1) NOT NULL DEFAULT 0,
  `lastpulledid` int(11) DEFAULT NULL,
  `lastpushedid` int(11) DEFAULT NULL,
  `organization` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `remote_organisation_id` int(11) NOT NULL,
  `publish_without_email` tinyint(1) NOT NULL DEFAULT 0,
  `unpublish_event` tinyint(1) NOT NULL DEFAULT 0,
  `self_signed` tinyint(1) NOT NULL,
  `pull_rules` text COLLATE utf8_bin NOT NULL,
  `push_rules` text COLLATE utf8_bin NOT NULL,
  `cert_file` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `client_cert_file` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `internal` tinyint(1) NOT NULL DEFAULT 0,
  `skip_proxy` tinyint(1) NOT NULL DEFAULT 0,
  `caching_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `priority` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `org_id` (`organisation_id`),
  KEY `priority` (`priority`),
  KEY `remote_org_id` (`remote_organisation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `setting` (`setting`),
  KEY `user_id` (`user_id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `server_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `autoalert` tinyint(1) NOT NULL DEFAULT 0,
  `authkey` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `invited_by` int(11) NOT NULL DEFAULT 0,
  `gpgkey` longtext COLLATE utf8_bin DEFAULT NULL,
  `certif_public` longtext COLLATE utf8_bin DEFAULT NULL,
  `nids_sid` int(15) NOT NULL DEFAULT 0,
  `termsaccepted` tinyint(1) NOT NULL DEFAULT 0,
  `newsread` int(11) unsigned DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `change_pw` tinyint(4) NOT NULL DEFAULT 0,
  `contactalert` tinyint(1) NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `expiration` datetime DEFAULT NULL,
  `current_login` int(11) DEFAULT 0,
  `last_login` int(11) DEFAULT 0,
  `force_logout` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` bigint(20) DEFAULT NULL,
  `date_modified` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `org_id` (`organisation_id`),
  KEY `server_id` (`server_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-30  8:53:22
