-- MySQL dump 10.13  Distrib 5.6.17, for Linux (x86_64)
--
-- Host: localhost    Database: masco_new
-- ------------------------------------------------------
-- Server version	5.6.17

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

--
-- Table structure for table `assign_seen_student`
--

DROP TABLE IF EXISTS `assign_seen_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_seen_student` (
  `assign_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  KEY `assign_id` (`assign_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `assign_seen_student_ibfk_1` FOREIGN KEY (`assign_id`) REFERENCES `assignment` (`assign_id`),
  CONSTRAINT `assign_seen_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `notes` (`notes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_seen_student`
--

LOCK TABLES `assign_seen_student` WRITE;
/*!40000 ALTER TABLE `assign_seen_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `assign_seen_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign_student`
--

DROP TABLE IF EXISTS `assign_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign_student` (
  `assign_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `utc` int(11) DEFAULT NULL,
  `marks` float DEFAULT NULL,
  PRIMARY KEY (`assign_id`,`stu_id`),
  KEY `stu_id` (`stu_id`),
  CONSTRAINT `assign_student_ibfk_1` FOREIGN KEY (`assign_id`) REFERENCES `assignment` (`assign_id`),
  CONSTRAINT `assign_student_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign_student`
--

LOCK TABLES `assign_student` WRITE;
/*!40000 ALTER TABLE `assign_student` DISABLE KEYS */;
INSERT INTO `assign_student` VALUES (3,6,1420397402,10),(4,6,1420397465,8),(5,6,NULL,0);
/*!40000 ALTER TABLE `assign_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignment` (
  `assign_id` int(15) NOT NULL AUTO_INCREMENT,
  `tea_id` int(11) DEFAULT NULL,
  `class` smallint(6) DEFAULT NULL,
  `section` varchar(2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `txt` varchar(1000) DEFAULT NULL,
  `utc_in` int(11) DEFAULT NULL,
  `utc_valid` int(11) DEFAULT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `cat_id` (`cat_id`),
  KEY `tea_id` (`tea_id`),
  CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`tea_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (3,5,9,'A',1,'Sample Question Paper of Poetry',1420500322,1420396810),(4,5,9,'A',1,'Poetry: Cloud Assignment',1420500322,1420396810),(5,5,9,'A',1,'Julius Caesar Act III Questions',1420686489,1420396810);
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `slug` (`sub`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (6,'Botany'),(2,'Chemistry'),(1,'English'),(4,'Geography'),(5,'History'),(3,'Physics');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designation` (
  `design_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`design_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` VALUES (1,'Student'),(2,'Teacher');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tag_refer`
--

DROP TABLE IF EXISTS `forum_tag_refer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tag_refer` (
  `topic_id` int(11) NOT NULL,
  `forum_tag_id` int(11) NOT NULL,
  KEY `topic_id` (`topic_id`),
  KEY `forum_tag_id` (`forum_tag_id`),
  CONSTRAINT `forum_tag_refer_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`),
  CONSTRAINT `forum_tag_refer_ibfk_2` FOREIGN KEY (`forum_tag_id`) REFERENCES `forum_tags` (`forum_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tag_refer`
--

LOCK TABLES `forum_tag_refer` WRITE;
/*!40000 ALTER TABLE `forum_tag_refer` DISABLE KEYS */;
INSERT INTO `forum_tag_refer` VALUES (7,7),(7,8),(8,7),(8,9),(8,10);
/*!40000 ALTER TABLE `forum_tag_refer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_tags`
--

DROP TABLE IF EXISTS `forum_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_tags` (
  `forum_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_tag_name` varchar(20) NOT NULL,
  PRIMARY KEY (`forum_tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_tags`
--

LOCK TABLES `forum_tags` WRITE;
/*!40000 ALTER TABLE `forum_tags` DISABLE KEYS */;
INSERT INTO `forum_tags` VALUES (1,'PHP'),(2,'MYSQL'),(3,'Physics'),(4,'Newton'),(5,'Faraday'),(6,'Chemistry'),(7,'English'),(8,'Articles'),(9,'Figures of Speech'),(10,'Poetry');
/*!40000 ALTER TABLE `forum_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `section` varchar(1) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `links_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,1,9,'A','/#','Vision of WizIndia'),(2,1,9,'A','http://www.ncert.nic.in/ncerts/textbook/textbook.htm?iebe1=0-11','NCERT English Book'),(3,1,9,'A','http://dictionary.cambridge.org/','Online Dictionary'),(4,1,9,'A','http://idioms.thefreedictionary.com/','Idioms and Phrases'),(5,1,9,'A','http://absoluteshakespeare.com/','Shakespeare References'),(6,1,9,'A','/#','High School English Grammar & Composition by Wren & Martin'),(7,1,9,'A','/#','Origins of English Literature'),(8,1,9,'A','/#','The Road Ahead for WizIndia'),(9,1,9,'A','/#','Love and Life of Marilyn Monroe');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_msg`
--

DROP TABLE IF EXISTS `mail_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `utc` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `father` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`msg_id`),
  KEY `from_id` (`from_id`),
  KEY `thread_id` (`thread_id`),
  KEY `status` (`status`),
  CONSTRAINT `mail_msg_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `user` (`id`),
  CONSTRAINT `mail_msg_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`thread_id`),
  CONSTRAINT `mail_msg_ibfk_3` FOREIGN KEY (`status`) REFERENCES `mail_statuses` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_msg`
--

LOCK TABLES `mail_msg` WRITE;
/*!40000 ALTER TABLE `mail_msg` DISABLE KEYS */;
INSERT INTO `mail_msg` VALUES (51,3,1419075795,25,0,'this is a sample email. Please don\'t respond to this email.',4),(52,4,1419085033,26,0,'your mail is recieved. Email is working fine.',4),(53,3,1419183140,27,0,'this is a mail for demo',4),(54,3,1419583662,28,0,'hi,\nchecking incorporation of prasun design',4),(55,4,1419660287,28,54,'yes recieved',4),(56,3,1419660320,28,55,'oh good to know that',4),(57,3,1419838844,28,55,'check check',4),(58,3,1419839407,28,55,'lalallalallalalalalalallalalalalalallalalaalalalla',4),(59,4,1419849402,28,58,'hi,\nsak sako to sak lo.\n\nregards,\npopin bose roy.',4),(60,4,1419849500,28,58,'hi,\nyo yo yo yo\n \n\nregards,\npopin',4),(61,4,1419854074,28,60,'5:23 pm insert check',4),(62,4,1419854137,28,57,'5:25pm checking',4),(63,4,1419854270,28,57,'5:27 pm insert',4),(64,4,1419854583,29,0,'',4),(65,4,1419854584,30,0,'',4),(66,4,1419854585,31,0,'',4),(67,4,1419854585,32,0,'',4),(68,4,1419854585,33,0,'',4),(69,4,1419854586,34,0,'',4),(70,4,1419854586,35,0,'',4),(71,4,1419854586,36,0,'',4),(72,4,1419854632,37,0,'sample mail',4),(73,4,1419854852,38,0,'check check',4),(74,4,1419854884,39,0,'check check',4),(75,4,1419855007,40,0,'check check',4),(76,4,1419856634,28,57,'0',1),(77,4,1419856753,28,57,'0',1),(78,4,1419856828,28,58,'zzzzzzzaaaaaaaaaaaaaaaaaaazzzzzzzzzzzzzzzzzzzzzzzzz',1),(79,4,1419856864,28,78,'zzzzzzzaaaaaaaaaaaaaaaaaaazzzzzzzzzzzzzzzzzzzzzzzzz',1),(80,4,1419861323,28,63,'5:27 pm insert',4),(81,4,1419861340,28,80,'5:27 pm insert',4),(82,4,1419861865,28,58,'yo yoy yoy oyy yoy y yo yoy yoy',4),(83,4,1419864248,41,0,'',4),(84,4,1419864340,42,0,'',4),(85,4,1419864386,43,0,'ppppppppppppppp\naaaaaaaaaaaaaaaa',4),(86,4,1419864448,44,0,'vvvvvvvvvv',4),(87,4,1419864483,45,0,'last',4),(88,4,1419864538,41,83,'check check',4),(89,4,1419864760,41,88,'fafa afaggha agaha',4),(90,4,1419865042,46,0,'ggggggggggggggggggggg',4),(91,3,1420390109,47,0,'Hi,\nWelcome to WizMail !\n\nRegards,\nWizindia Team',4),(92,5,1420390538,48,0,'Hi,\nI welcome students to Wiz ClassroomE.\n\nRegards,\n',4),(93,5,1420390826,48,92,'Hi,\n\nThanks for the warm welcome.\n\nRegards,\nNischal Kumar',4);
/*!40000 ALTER TABLE `mail_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_statuses`
--

DROP TABLE IF EXISTS `mail_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_statuses` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_statuses`
--

LOCK TABLES `mail_statuses` WRITE;
/*!40000 ALTER TABLE `mail_statuses` DISABLE KEYS */;
INSERT INTO `mail_statuses` VALUES (1,'deleted'),(3,'draft'),(4,'normal'),(5,'starred');
/*!40000 ALTER TABLE `mail_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `notes_id` int(15) NOT NULL AUTO_INCREMENT,
  `tea_id` int(11) DEFAULT NULL,
  `class` smallint(6) DEFAULT NULL,
  `section` varchar(2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `txt` varchar(1000) DEFAULT NULL,
  `utc_in` int(11) DEFAULT NULL,
  `utc_valid` int(11) DEFAULT NULL,
  PRIMARY KEY (`notes_id`),
  KEY `cat_id` (`cat_id`),
  KEY `tea_id` (`tea_id`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`tea_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (4,5,9,'A',1,'Preposition Part I',1420284617,1430394617),(5,5,9,'A',1,'Village by the Sea Chapter 1 Summary',1420484617,1430394651),(6,5,9,'A',1,'Julius Caesar ACT III Paraphrase',1420584617,1430394695),(7,5,9,'A',1,'Figure of Speeches Part 1',1420684617,1430394787),(8,5,9,'A',1,'Synopsis of Tithonus',1420984617,1430394868),(9,5,9,'A',1,'Sample Question Paper of Prose',142284617,1430396034),(15,5,9,'A',1,'Sample Question Paper of Poetry',142094617,1430396750),(16,5,9,'A',1,'Wizindia: A leap into the unknown',1420396761,1430396761),(17,5,9,'A',1,'Preposition Assignment I',1420396847,1430396847);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes_seen_student`
--

DROP TABLE IF EXISTS `notes_seen_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes_seen_student` (
  `notes_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  KEY `notes_id` (`notes_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `notes_seen_student_ibfk_1` FOREIGN KEY (`notes_id`) REFERENCES `notes` (`notes_id`),
  CONSTRAINT `notes_seen_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `notes` (`notes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes_seen_student`
--

LOCK TABLES `notes_seen_student` WRITE;
/*!40000 ALTER TABLE `notes_seen_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes_seen_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `class` smallint(2) NOT NULL,
  `section` varchar(2) NOT NULL,
  `txt` varchar(500) NOT NULL,
  `utc_in` int(11) NOT NULL,
  `utc_valid` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (3,5,9,'A','This is a demo notice. Thank you for your time.',1420387686,1449763686),(4,5,9,'A','Necessity is the mother of invention.',1420387876,1450282276),(5,5,9,'A','Where there is will, there is a way.',1420388000,1451492000);
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `ques_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Distinct id of questions',
  `cat_id` int(11) DEFAULT NULL,
  `class` int(2) DEFAULT NULL,
  `ques_txt` varchar(1000) NOT NULL COMMENT 'text for the question',
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` char(1) NOT NULL COMMENT 'Correct option',
  `ques_level` int(5) NOT NULL COMMENT 'Level of the question for adaptive strategy',
  PRIMARY KEY (`ques_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (3,1,9,'Who wrote Julius Caesar?','William Shakespeare','Leo Tolstoy','P.G.Wodehouse','Wizindia','a',1),(4,1,9,'Who is the brother of Lila in the famous novel \'Village by the Sea\' by author Anita Desai?','William Shakespeare','Leo Tolstoy','Hari','Wizindia','d',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipients`
--

DROP TABLE IF EXISTS `recipients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipients` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `offset` int(1) DEFAULT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `msg_id` (`msg_id`),
  KEY `to_id` (`to_id`),
  CONSTRAINT `recipients_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `mail_msg` (`msg_id`),
  CONSTRAINT `recipients_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipients`
--

LOCK TABLES `recipients` WRITE;
/*!40000 ALTER TABLE `recipients` DISABLE KEYS */;
INSERT INTO `recipients` VALUES (38,51,4,4,1),(39,51,5,4,1),(41,52,3,4,0),(42,52,5,4,1),(44,53,4,4,1),(45,53,3,4,0),(49,55,3,4,1),(50,55,5,4,0),(51,56,5,3,0),(52,54,5,4,0),(53,57,4,4,1),(54,57,5,4,0),(55,57,3,4,1),(56,57,NULL,4,0),(57,58,4,4,1),(58,58,5,4,0),(59,58,3,4,1),(60,59,3,4,1),(61,60,3,4,1),(62,61,4,4,1),(63,61,3,4,1),(64,62,3,4,1),(65,63,3,4,1),(66,64,NULL,4,0),(67,65,NULL,4,0),(68,66,NULL,4,0),(69,67,NULL,4,0),(70,68,NULL,4,0),(71,69,NULL,4,0),(72,70,NULL,4,0),(73,71,NULL,4,0),(74,72,3,4,1),(75,72,NULL,4,0),(76,73,5,4,0),(77,73,NULL,4,0),(78,74,5,4,0),(79,74,NULL,4,0),(80,75,5,4,0),(81,75,NULL,4,0),(82,76,3,4,1),(83,77,3,4,1),(84,78,3,4,1),(85,79,5,4,0),(86,80,NULL,4,0),(87,81,5,4,0),(88,82,3,4,1),(89,83,4,4,1),(90,83,3,4,1),(91,83,NULL,4,0),(92,84,5,4,0),(93,84,NULL,4,0),(94,85,5,4,0),(95,85,NULL,4,0),(96,86,5,4,0),(97,86,NULL,4,0),(98,87,5,4,0),(99,87,NULL,4,0),(100,88,4,4,1),(101,88,4,4,1),(102,88,3,4,1),(103,89,5,4,0),(104,90,5,4,1),(105,90,NULL,4,0),(106,91,6,4,0),(107,91,NULL,4,0),(108,92,6,4,1),(109,92,3,4,0),(110,92,NULL,4,0),(111,93,5,4,0),(112,93,6,4,1),(113,93,3,4,0);
/*!40000 ALTER TABLE `recipients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `txt` varchar(10000) DEFAULT NULL,
  `utc` int(11) DEFAULT NULL,
  `offset` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply` DISABLE KEYS */;
INSERT INTO `reply` VALUES (1,8,6,'A simile is where two things are directly compared because they share a common feature. The word AS or LIKE is used to compare the two words. Eg. As cold AS a dog\'s nose A metaphor also compares two things, but it does so more directly WITHOUT using as or like. Eg. The shop was a little gold-mine.',1420404341,0),(2,8,5,'The terms metaphor and simile are slung around as if they meant exactly the same thing.\n\nA simile is a metaphor, but not all metaphors are similes.\n\nMetaphor is the broader term. In a literary sense metaphor is a rhetorical device that transfers the sense or aspects of one word to another. For example:\n\nThe moon was a ghostly galleon tossed upon cloudy seas. — “The Highwayman,” Alfred Noyes\n\nHere the moon is being compared to a sailing ship. The clouds are being compared to ocean waves. This is an apt comparison because sometimes banks of clouds shuttling past the moon cause the moon to appear to be moving and roiling clouds resemble churning water.\n\nA simile is a type of metaphor in which the comparison is made with the use of the word like or its equivalent:\n\nMy love is like a red, red rose. — Robert Burns\n\nThis simile conveys some of the attributes of a rose to a woman: ruddy complexion, velvety skin, and fragrant scent.\n\nShe sat like Patience on a Monument, smiling at Grief. — Twelfth Night William Shakespeare\n\nHere a woman is being compared to the allegorical statue on a tomb. The comparison evokes unhappiness, immobility, and gracefulness of posture and dress.\n\nSome metaphors are apt. Some are not. The conscientious writer strives to come up with fresh metaphors.',1420404378,0),(3,7,6,'No, they are the same',1420404379,0),(4,8,6,'Thank You for responses',1420404405,0);
/*!40000 ALTER TABLE `reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seen_question`
--

DROP TABLE IF EXISTS `seen_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seen_question` (
  `ques_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Users has already seen this question',
  PRIMARY KEY (`ques_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `seen_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `seen_question_ibfk_2` FOREIGN KEY (`ques_id`) REFERENCES `question` (`ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seen_question`
--

LOCK TABLES `seen_question` WRITE;
/*!40000 ALTER TABLE `seen_question` DISABLE KEYS */;
INSERT INTO `seen_question` VALUES (3,6),(4,6);
/*!40000 ALTER TABLE `seen_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `class` smallint(2) NOT NULL,
  `section` varchar(2) NOT NULL,
  `grade` float NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `interest` varchar(500) DEFAULT NULL,
  `hobies` varchar(500) DEFAULT NULL,
  `favorite_subject` varchar(500) DEFAULT NULL,
  `least_favorite_subject` varchar(500) DEFAULT NULL,
  `recognitions` varchar(500) DEFAULT NULL,
  `teacher_remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`stu_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (3,9,'A',7.53,'BE/1251/2011','coding','music, tour, adventure','DBMS','EXcept DBMC','Microsoft Certified HTML developer','tnbrrfnh'),(4,9,'B',8.09,'BE/1267/2010',NULL,NULL,NULL,NULL,NULL,NULL),(6,9,'A',9.9,'5','Reading Books','Dancing','English','Mathematics','Best student','Awesome student');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `class` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (9,1),(9,2),(9,3),(9,4),(9,5);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `tea_id` int(11) NOT NULL,
  `class` smallint(2) DEFAULT NULL,
  `section` varchar(2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  KEY `tea_id` (`tea_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`tea_id`) REFERENCES `user` (`id`),
  CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (5,9,'A',1),(5,9,'B',1),(5,9,'C',1),(5,8,'A',1);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `threads`
--

LOCK TABLES `threads` WRITE;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` VALUES (25,'sample email'),(26,'mail recieved'),(27,'test'),(28,'checking xxps'),(29,''),(30,''),(31,''),(32,''),(33,''),(34,''),(35,''),(36,''),(37,'5:33 pm'),(38,'5:37'),(39,'5:38'),(40,'5:39'),(41,'8:13'),(42,'8:15'),(43,'8:16'),(44,'8:17'),(45,'08:17'),(46,'aaaaa'),(47,'Sample WizMail'),(48,'Welcome ClassroomE');
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `class` smallint(2) NOT NULL,
  `section` varchar(2) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `utc` int(11) NOT NULL,
  `ask_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `txt` varchar(2000) DEFAULT NULL,
  `open` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `cat_id` (`cat_id`),
  KEY `ask_id` (`ask_id`),
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`ask_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic`
--

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (7,9,'Z',1,1420402061,3,'Usage of articles','I was wondering if someone could explain when and how one can use the definite article \'the\' in the context of proper nouns?',0),(8,9,'Z',1,1420403513,3,'Differences between simile and metaphor','Can someone explain the difference between simile and metaphor? It would be great if you could use the poem \'The Cloud\' as reference.',0);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `offset` smallint(6) NOT NULL,
  `slug` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `offset` (`offset`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`offset`) REFERENCES `designation` (`design_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'nischal@wizindia.org','nischal','kumar','check',1,'nischal_kumar'),(4,'popin@wizindia.org','popin','bose roy','check',1,'popin_bose'),(5,'teacher@wizindia.org','teacher','teacher','check',2,'teacher_teacher'),(6,'student@wizindia.org','student','demo','check',1,'student_demo');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wizquiz_gradebook`
--

DROP TABLE IF EXISTS `wizquiz_gradebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wizquiz_gradebook` (
  `wizquiz_grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `utc` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`wizquiz_grade_id`),
  KEY `user_id` (`user_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `wizquiz_gradebook_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `wizquiz_gradebook_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wizquiz_gradebook`
--

LOCK TABLES `wizquiz_gradebook` WRITE;
/*!40000 ALTER TABLE `wizquiz_gradebook` DISABLE KEYS */;
INSERT INTO `wizquiz_gradebook` VALUES (1,3,1419960997,3,1),(2,3,1419961098,9,1),(3,3,1420096161,3,1),(4,3,1420097202,-1,1),(5,3,1420097309,4,1),(6,3,1420281166,3,1),(7,3,1420372081,-5,1),(8,6,1420394767,-5,1),(9,6,1420397902,15,1),(10,6,1420396917,30,1),(11,6,1420396922,30,2),(12,6,1420396924,30,4),(13,6,1420387934,-4,1);
/*!40000 ALTER TABLE `wizquiz_gradebook` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-06 15:12:26
