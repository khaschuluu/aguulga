-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: aguulga
-- ------------------------------------------------------
-- Server version	5.1.49-1ubuntu8

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `istrue` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (22,8,'тийм',1),(23,8,'үгүй',0),(24,8,'мэдэхгүй',0),(25,9,'үгүй',0),(26,9,'тийм',1),(27,9,'мэдэагүй',0),(28,10,'шим бодис',1),(29,10,'шим бус бодис',0),(30,10,'бодис',0),(31,11,'шим ба шим бус',0),(32,11,'амьд ба амьгүй',1),(33,11,'бие ба бодис',0),(34,12,'шим бодис',0),(35,12,'шим бус бодис',1),(36,12,'мэдэхгүй',0),(37,13,'Бие бүтээгдэхүүнээс тогтоно',1),(38,13,'Бие бодисоос тогтоно',0),(39,14,'Амьгүй биеийг бүрдүүлж байгаа бодис',0),(40,14,'Амьд биеийг бүрдүүлж байгаа бодис',1),(41,15,'хонь',0),(42,15,'ширээ',1),(43,15,'мод',0),(44,16,'мод',1),(45,16,'цамц',0),(46,16,'чулуу',0),(47,17,'a1 б2 в3 г4',0),(48,17,'a2 б3 в4 г1',1),(49,17,'a4 б1 в3 г2',0),(50,18,'шинж  чанар',1),(51,18,'хэлбэр дүрс',0),(52,18,'өнгө',0),(53,19,'Бодис  бүр  өөр өөр шинжтэй',1),(54,19,'Бодис   бүр    ижил  шинжтэй',0),(55,20,'1в 2а 3г 4б',1),(56,20,'1г 2а 3в 4б',0),(57,20,'1а 2б 3в 4г',0),(58,21,'4',0),(59,21,'3',1),(60,21,'2',0),(61,22,'Бодис нь байгаль царцах, урсах,хайлах  төлөв байдалд байдаг',0),(62,22,'Бодис нь байгаль дээр шингэн , хатуу, хийн төлөв байдалд  байдаг',1),(63,23,'түүхий эд',0),(64,23,'бүтээгдэхүүн',1),(65,24,'бүтээгдэхүүн',0),(66,24,'материал',1),(67,25,'1в 2а 3б',0),(68,25,'1б 2в 3а',1),(69,25,'1а 2б 3в',0),(70,26,'хайлах уурших',0),(71,26,'хөлдөх царцах',1),(72,27,'1в 2а 3б',0),(73,27,'1б 2а 3в',0),(74,27,'1б 2в 3а',1),(75,28,'Дөрвөн мянга хоёр',0),(76,28,'Дөрвөн зуун арван мянга хоёр',1),(77,28,'Дөчин нэгэн мянга хоёр',0),(78,29,'5367',0),(79,29,'500367',0),(80,29,'536007',1),(81,30,'5602',1),(82,30,'50602',0),(83,30,'56002',0),(84,31,'90070',0),(85,31,'9070',1),(86,31,'900070',0),(87,32,'7024',0),(88,32,'7040',0),(89,32,'940',1),(90,33,'<',0),(91,33,'>',1),(92,33,'=',0),(93,34,'0,1,2',1),(94,34,'0,1,2,3',0),(95,34,'1,2',0),(96,35,'5467,5470',0),(97,35,'5467,5468',0),(98,35,'5467,5469',1),(99,36,'Дөрвөн зуун таван мянга дөчин тав',1),(100,36,'Дөрвөн зуун мянга таван зуун дөчин тав',0),(101,36,'Дөчин таван мянга дөчин тав',0),(102,37,'3652',0),(103,37,'30652',0),(104,37,'300652',1),(105,38,'20902',1),(106,38,'200902',0),(107,38,'20920',0),(108,39,'700004',0),(109,39,'700040',1),(110,39,'70400',0),(111,40,'1717',0),(112,40,'1970',0),(113,40,'1870',1),(114,41,'<',0),(115,41,'>',1),(116,41,'=',0),(117,42,'8',1),(118,42,'7',0),(119,42,'6',0),(120,43,'85512,85513',0),(121,43,'86511,85514',0),(122,43,'86511,86513',1),(123,44,'45000',0),(124,44,'450100',1),(125,44,'450200',0),(126,45,'Далан найман мянга наян ес',0),(127,45,'Долоон зуун найман мянга наян ес',1),(128,45,'Долоон мянга найман зуун дөчин ес',0),(129,46,'602004',0),(130,46,'600204',0),(131,46,'620004',1),(132,47,'530062',1),(133,47,'503062',0),(134,47,'500362',0),(135,48,'100406',0),(136,48,'100046',1),(137,48,'10046',0),(138,49,'1717',0),(139,49,'1970',0),(140,49,'1870',1),(141,50,'<',0),(142,50,'>',1),(143,50,'=',0),(144,51,'8',1),(145,51,'7',0),(146,51,'6',0),(147,52,'85512,85513',0),(148,52,'86511,85514',0),(149,52,'86511,86513',1),(150,53,'45000',0),(151,53,'450100',1),(152,53,'450200',0),(153,54,'Дөрвөн мянга хоёр',0),(154,54,'Дөрвөн зуун арван мянга хоёр',1),(155,54,'Дөчин нэгэн мянга хоёр',0),(156,55,'Дөрвөн мянга хоёр',0),(157,55,'Дөрвөн зуун арван мянга хоёр',1),(158,55,'Дөчин нэгэн мянга хоёр',0),(159,56,'сек',1),(160,56,'кг',0),(161,56,'мин',0),(162,56,'Км/цаг',0),(163,57,'кг',0),(164,57,'сек',0),(165,57,'м/сек',1),(166,57,'км',0),(167,58,'Сек',0),(168,58,'м/мин',1),(169,58,'дм',0),(170,58,'Ц',0),(171,59,'3 км',0),(172,59,'7км',0),(173,59,'12км',1),(174,59,'8км',0),(175,60,'12км/цаг',0),(176,60,'5км/цаг',1),(177,60,'18км/цаг',0),(178,60,'3км/цаг',0),(179,61,'6цаг',0),(180,61,'4цаг',1),(181,61,'25цаг',0),(182,61,'15цаг',0),(183,62,'3цаг',0),(184,62,'4цаг',0),(185,62,'6цаг',0),(186,62,'5цаг',1),(187,63,'150м',0),(188,63,'350м',0),(189,63,'2100м',1),(190,63,'1200м',0),(191,64,'20м',0),(192,64,'900м',1),(193,64,'6м',0),(194,64,'16м',0),(195,65,'65м/сек',0),(196,65,'15м/сек',1),(197,65,'50м/сек',0),(198,65,'40м/сек',0);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subsubject_id` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (2,'2','2-р анги'),(3,'3','3-р анги'),(4,'4','4-р анги'),(5,'5','5-р анги');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` VALUES (1,4,'Байгаль шинжлэл','11 жилийн сургалттай ЕБС-ийн 4-р ангийн “Байгаль шинжлэл” хичээл'),(2,4,'Математик','11 жилийн сургалттай ЕБС-ийн 4-р ангийн математикийн хичээл'),(3,4,'Монгол хэл','12 жилийн сургалттай ЕБС-ийн 2-р ангийн монгол хэлний хичээл'),(11,3,'Математик','Математик');
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (8,5,'Бидний эргэн тойронд оршин байгаа бүхий л юмсыг бие гэнэ',0),(9,5,'Биеийг бүрдүүлж байгаа жижиг хэсгийг бодис гэнэ',0),(10,5,'Амьд биеийг бүрдүүлж байгаа  бодис нь -------------- юм',0),(11,5,'Биеийг -------------ба--------------бие гэж ангилна',0),(12,5,'Амьгүй биеийг бүрдүүлж байгаа бодисыг---------- гэнэ',0),(13,5,'Бие юунаас тогтох вэ?',0),(14,5,'Ямар бодисыг шим бус бодис гэдэг вэ?',0),(15,5,'--------------------бол амьгүй бие мөн',0),(16,5,'----------------------бол амьд бие мөгн',0),(17,5,'Зөв харгалцуулан холбож зур\r\nа.Цэцэг 1.материал  \r\nб.Шороо 2.амьд бие\r\nв.Талх 3.амьгүй бие  \r\nг.Даавуу 4.бүтээгдэхүүн',0),(18,5,'Бодисын ялгааг харуулж  байгаа  өвөрмөц талуудыг  бодисын ----------------------гэнэ',0),(19,5,'Бодис ямар  шинжтэй   вэ?',0),(20,5,'Бодисын шинж чанарыг харгалзуулан зур<br />\r\nа.Чулуу 1.үнэртэй<br />\r\nб.Хөвөн 2.хатуу хүнд<br />\r\nв.Будаг 3.амттай<br />\r\nг.Элсэн чихэр 4.зөөлөн хөнгөн<br />',0),(21,5,'Бодис байгаль дээр---------- төлөв байдалд байна',0),(22,5,'Бодис байгаль дээр ямар ямар төлөв байдалд байдаг вэ?',0),(23,5,'Хүний хөдөлмөрөөр бий болсон юмсыг ------- гэнэ...',0),(24,5,'Ямар нэгэн бүтээгдэхүүн хийхэд зориулан бэлдсэн зүйлийг ------------------------------- гэнэ',0),(25,5,'Зөв харгалзуулан холбо<br />\r\n1.Түүхий эд а.цамц<br />\r\n2.Материал б.ноос<br />\r\n3.Бүтээгдэхүүн в.утас<br />',0),(26,5,'Хатуу төлөв байдал нь ------------------ хэлбэр юм',0),(27,5,'Зөв харгалцуулан холбож зураарай<br />\r\n1.Тариа а.бүтээгдэхүүн<br />\r\n2.Гурил б.түүхий<br />\r\n3.Талх в.материал<br />',0),(28,6,'410002 тоог үгээр бич',0),(29,6,'Таван зуун гучин зургаан мянга долоо гэсэн тоог цифрээр бич',0),(30,6,'Мянгын ангийн 5 нэгж, нэгжийн ангийн 6 зуут 2 нэгж',0),(31,6,'Мянгын ангийн 9 нэгж , нэгжийн ангийн 7 аравт',0),(32,6,'7зуут 24 аравтаас бүтсэн тоог бич',0),(33,6,'Дараах тоог жиш. * оронд тохирох тэмдгийг тавь<br />\r\n20345*20045',0),(34,6,'Одны оронд тохирох цифрийг тавь<br />\r\n54385>54*85',0),(35,6,'5468 –ын хөрш тоог ол',0),(36,7,'405045 тоог үгээр бич',0),(37,7,'Гурван зуун мянга зургаан зуун тавин хоёр гэсэн тоог цифрээр бич',0),(38,7,'Мянгын ангийн 2 аравт, нэгжийн ангийн 9 зуут 2 нэгж',0),(39,7,'Мянгын ангийн 7 зуут, нэгжийн ангийн 4 аравт',0),(40,7,'17зуут 17 аравтаас бүтсэн тоог бич',0),(41,7,'Дараах тоог жиш. * оронд тохирох тэмдгийг тавь.<br />\r\n100305*10305',0),(42,7,'Одны оронд тохирох цифрийг тавь\r\n805006=*05006',0),(43,7,'86512–ын хөрш тоог ол',0),(44,7,'450120 тоог зуутаар тоймло',0),(45,8,'708089 тоог үгээр бич',0),(46,8,'Зургаан зуун хорин мянга дөрөв гэсэн тоог цифрээр бич',0),(47,8,'Мянгын ангийн 5 зуут 3аравт, нэгжийн ангийн 6 аравт 2 нэгж',0),(48,8,'Мянгын ангийн 1 зуут, нэгжийн ангийн 4 аравт 6 нэгж',0),(49,8,'17 зуут 17 аравтаас бүтсэн тоог бич',0),(50,8,'Дараах тоог жиш. * оронд тохирох тэмдгийг тавь.<br />\r\n100305*10305',0),(51,8,'Одны оронд тохирох цифрийг тавь<br />\r\n805006=*05006',0),(52,8,'86512–ын хөрш тоог ол',0),(53,8,'450120 тоог зуутаар тоймло',0),(54,9,'Дараах тоог үгээр бич<br />\r\n410002',0),(55,10,'Дараах тоог үгээр бич<br />\r\n410002',0),(56,11,'Хугацааг хэмжих нэгж  аль нь вэ?',0),(57,11,'Уртыг хэмжих нэгж аль нь вэ?',0),(58,11,'Хурдыг хэмжих нэгж аль нь вэ?',0),(59,11,'Цаг тутам 3 км явдаг явган хүн  4 цаг явсан бол хэдэн км газар аялсан бэ?',0),(60,11,'Аялагч 3 цагийн дотор 15 км явсан бол 1 цагт хэдэн км явсан бэ?',0),(61,11,'Цаг тутам 5км  аялдаг явган аялагч 20 км аялсан бол хэдэн цаг аялсан бэ?',0),(62,11,'Хоорондоо 50км зайтай хоёр хотын хооронд 10км/ц хурдтай дугуйчин ямар хугацаа зарцуулах вэ?',0),(63,11,'Голын урсгалын хурд 35м/мин.Тэгвэл мөчир 1 цагийн хугацаанд ямар зайд хөвөх вэ?',0),(64,11,'Салхины хурд 15м/сек байв. Цаас 1 минутанд хэдэн метр хийсэх вэ?',0),(65,11,'Салхины хурд 25м/сек, 40м/сек хурдтай хүүхэд ямар хурдтай явах вэ?',0);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (6,1,'Бие ба бодис','Бие ба бодис'),(7,2,'Хөдөлгөөний бодлого','Хөдөлгөөний бодлого'),(8,3,'Өргөлтөт ба балархай эгшиг','Өргөлтөт ба балархай эгшиг'),(9,11,'Математик','Математик'),(10,2,'Хөдөлгөөний бодлого','Хөдөлгөөний бодлого');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsubject`
--

DROP TABLE IF EXISTS `subsubject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subsubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsubject`
--

LOCK TABLES `subsubject` WRITE;
/*!40000 ALTER TABLE `subsubject` DISABLE KEYS */;
INSERT INTO `subsubject` VALUES (3,8,'Өргөлтөт ба балархай эгшиг','Өргөлтөт ба балархай эгшиг'),(4,6,'Бие ба бодис','Бие ба бодис'),(5,7,'Хөдөлгөөний бодлого','Хөдөлгөөний бодлого'),(6,9,'Математик','Матетатик'),(7,6,'Хөдөлгөөний бодлого','Хөдөлгөөний бодлого');
/*!40000 ALTER TABLE `subsubject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subsubject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (5,4,'Бие ба бодис сэдвийн тест','Бие ба бодис сэдвийн тест'),(6,6,'Тест-1','Тест-1'),(7,6,'Тест-2','Тест-2'),(8,6,'Тест-3','Тест-3'),(9,6,'Тест-4','Тест-4'),(10,6,'Тест-5','Тест-5'),(11,5,'Тест-1','Тест-1');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theory`
--

DROP TABLE IF EXISTS `theory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subsubject_id` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theory`
--

LOCK TABLES `theory` WRITE;
/*!40000 ALTER TABLE `theory` DISABLE KEYS */;
/*!40000 ALTER TABLE `theory` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-10-22  1:34:07
