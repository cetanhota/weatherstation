-- MySQL dump 10.13  Distrib 8.0.25, for macos11 (x86_64)
--
-- Host: 192.168.1.61    Database: weather
-- ------------------------------------------------------
-- Server version	8.0.34-26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `basement`
--

DROP TABLE IF EXISTS `basement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `basement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` int NOT NULL,
  `hum` int NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2755 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bmp`
--

DROP TABLE IF EXISTS `bmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bmp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pa` int NOT NULL,
  `inhg` decimal(5,2) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=614409 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bmp_rt`
--

DROP TABLE IF EXISTS `bmp_rt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bmp_rt` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pa` int NOT NULL,
  `inhg` decimal(5,2) NOT NULL,
  `ts` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1200 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cloud`
--

DROP TABLE IF EXISTS `cloud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cloud` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` float NOT NULL,
  `hum` int NOT NULL,
  `dew` float NOT NULL DEFAULT '0',
  `hif` float NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `dht`
--

DROP TABLE IF EXISTS `dht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dht` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` int NOT NULL,
  `hum` int NOT NULL,
  `dew` int NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=210271 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ground_tmp`
--

DROP TABLE IF EXISTS `ground_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ground_tmp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` float NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11973 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hello_sensor`
--

DROP TABLE IF EXISTS `hello_sensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hello_sensor` (
  `num` int NOT NULL AUTO_INCREMENT,
  `message` char(40) DEFAULT NULL,
  `sensor_num` int DEFAULT NULL,
  `value` float DEFAULT NULL,
  `recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history` (
  `mxtemp` float,
  `mntemp` float,
  `mxhum` int,
  `mnhum` int,
  `mxdew` float DEFAULT NULL,
  `mndew` float DEFAULT NULL,
  `dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `history_bmp`
--

DROP TABLE IF EXISTS `history_bmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_bmp` (
  `mxbmp` decimal(5,2),
  `dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mthlyavg`
--

DROP TABLE IF EXISTS `mthlyavg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mthlyavg` (
  `id` int NOT NULL DEFAULT '0',
  `mnth` int NOT NULL,
  `yr` int NOT NULL,
  `avgtmp` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `percona`
--

DROP TABLE IF EXISTS `percona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `percona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` float NOT NULL,
  `hum` int NOT NULL,
  `dew` float NOT NULL DEFAULT '0',
  `hif` float NOT NULL DEFAULT '0',
  `prs` float NOT NULL DEFAULT '0',
  `uv` int NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=292363 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` int NOT NULL,
  `hum` int NOT NULL,
  `dew` int NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148753 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `testing`
--

DROP TABLE IF EXISTS `testing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tmp` int NOT NULL,
  `hum` int NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `v_dewpoint_history`
--

DROP TABLE IF EXISTS `v_dewpoint_history`;
/*!50001 DROP VIEW IF EXISTS `v_dewpoint_history`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_dewpoint_history` AS SELECT 
 1 AS `High`,
 1 AS `Low`,
 1 AS `Date`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_history`
--

DROP TABLE IF EXISTS `v_history`;
/*!50001 DROP VIEW IF EXISTS `v_history`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_history` AS SELECT 
 1 AS `High`,
 1 AS `Low`,
 1 AS `Date`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_humidity_history`
--

DROP TABLE IF EXISTS `v_humidity_history`;
/*!50001 DROP VIEW IF EXISTS `v_humidity_history`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_humidity_history` AS SELECT 
 1 AS `High`,
 1 AS `Low`,
 1 AS `Date`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'weather'
--

--
-- Dumping routines for database 'weather'
--

--
-- Final view structure for view `v_dewpoint_history`
--

/*!50001 DROP VIEW IF EXISTS `v_dewpoint_history`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pi`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_dewpoint_history` AS select `history`.`mxdew` AS `High`,`history`.`mndew` AS `Low`,`history`.`dt` AS `Date` from `history` order by `history`.`dt` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_history`
--

/*!50001 DROP VIEW IF EXISTS `v_history`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pi`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_history` AS select `history`.`mxtemp` AS `High`,`history`.`mntemp` AS `Low`,`history`.`dt` AS `Date` from `history` order by `history`.`dt` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_humidity_history`
--

/*!50001 DROP VIEW IF EXISTS `v_humidity_history`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`pi`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_humidity_history` AS select `history`.`mxhum` AS `High`,`history`.`mnhum` AS `Low`,`history`.`dt` AS `Date` from `history` order by `history`.`dt` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-04  7:51:52
