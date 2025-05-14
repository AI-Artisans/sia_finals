/*
SQLyog Ultimate v12.2.4 (64 bit)
MySQL - 5.7.19 : Database - testdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `testdb`;

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_posted` date NOT NULL,
  `time_posted` time NOT NULL,
  `editor_name` varchar(100) NOT NULL,
  `blog_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`date_posted`,`time_posted`,`editor_name`,`blog_message`) values 
(1,'2024-10-01','08:15:00','John Doe','First blog of the month!'),
(2,'2024-10-02','09:45:00','Emily Johnson','Reflecting on the latest tech trends.'),
(3,'2024-10-03','11:20:00','Jane Smith','A deep dive into AI advancements.'),
(4,'2024-10-04','14:10:00','Mike Lee','Understanding quantum computing.'),
(5,'2024-10-05','10:05:00','Sara Connor','Top travel destinations for 2024.'),
(6,'2024-10-06','16:00:00','Tom Hardy','Best fitness routines for beginners.'),
(7,'2024-10-07','13:25:00','Amanda Black','Cooking tips for the holiday season.'),
(8,'2024-10-08','17:50:00','Nathan Drake','Hiking routes to try this autumn.'),
(9,'2024-10-09','12:00:00','Sophia White','Why learning a second language matters.'),
(10,'2024-10-10','09:15:00','Chris Brown','Exploring the future of space travel.'),
(11,'2024-10-11','11:30:00','Oliver Green','Essential coding practices for 2024.'),
(12,'2024-10-12','15:45:00','Ella Grey','Books to read before the year ends.'),
(13,'2024-10-13','18:20:00','Liam Scott','Budgeting tips for young adults.'),
(14,'2024-10-14','08:10:00','Mia Davis','Creative DIY projects for your home.'),
(15,'2024-10-15','19:05:00','William Turner','Historical events that shaped the world.'),
(16,'2024-10-16','14:55:00','Victoria Chase','The role of art in modern society.'),
(17,'2024-10-17','13:40:00','Noah Brooks','Travel hacks to save money.'),
(18,'2024-10-18','10:30:00','Chloe Bennett','Managing stress effectively.'),
(19,'2024-10-19','11:55:00','Lucas Adams','The latest in wearable technology.'),
(20,'2024-10-20','17:30:00','Hannah Wright','Cooking with seasonal ingredients.'),
(21,'2024-10-21','09:05:00','David Smith','Minimalism: Living with less.'),
(22,'2024-10-22','15:20:00','Olivia Martin','How to maintain work-life balance.'),
(23,'2024-10-23','12:45:00','Ethan Jones','Top career paths in the digital age.'),
(24,'2024-10-24','18:15:00','Isabella Brown','The benefits of meditation.'),
(25,'2024-10-25','08:50:00','Ryan Cooper','Breaking down blockchain basics.'),
(26,'2024-10-26','14:30:00','Lily Parker','Eco-friendly living made simple.'),
(27,'2024-10-27','09:35:00','Daniel Carter','The future of renewable energy.'),
(28,'2024-10-28','16:50:00','Grace Wilson','Parenting tips for the modern family.'),
(29,'2024-10-29','11:10:00','Michael Scott','Understanding leadership styles.'),
(30,'2024-10-30','13:15:00','Sophia Kim','Top movies to watch this year.'),
(31,'2024-10-31','20:00:00','Jack Nelson','Halloween traditions and tales.'),
(32,'2024-11-01','08:30:00','Emily Clark','November wellness tips.'),
(33,'2024-11-02','14:45:00','James Hall','Photography tricks for beginners.'),
(34,'2024-11-03','10:20:00','Sarah Lee','Easy recipes for the weekend.'),
(35,'2024-11-04','19:35:00','Aaron Moore','Top productivity tools to try.'),
(36,'2024-11-05','12:25:00','Zoe Foster','Fashion trends to watch out for.'),
(37,'2024-11-06','15:55:00','Henry Stone','Exploring the world of esports.'),
(38,'2024-11-07','09:50:00','Mila Fox','The best habits for morning success.'),
(39,'2024-11-08','17:05:00','Liam Brown','Sustainable fashion on a budget.'),
(40,'2024-11-09','11:40:00','Chloe Hall','Essential tips for healthy skin.'),
(41,'2024-11-10','13:50:00','Evan Reed','Must-visit places in Europe.'),
(42,'2024-11-11','08:15:00','Isabella Cruz','Understanding cryptocurrency risks.'),
(43,'2024-11-12','19:10:00','Oscar Knight','An overview of deep-sea exploration.'),
(44,'2024-11-13','10:45:00','Harper King','Creating a perfect home office.'),
(45,'2024-11-14','16:20:00','Aria Lane','Best gardening tips for the season.'),
(46,'2024-11-15','12:00:00','Nate Evans','The science of sleep explained.'),
(47,'2024-11-16','18:30:00','Clara Monroe','Tips for effective public speaking.'),
(48,'2024-11-17','08:50:00','Samuel Woods','Exploring underrated music genres.'),
(49,'2024-11-18','14:05:00','Mia Harper','Benefits of journaling daily.'),
(50,'2024-11-19','11:15:00','Jason Oliver','Maintaining good posture at work.'),
(51,'2024-11-20','09:35:00','Lucas White','Delicious vegan recipes to try.'),
(52,'2024-11-21','17:25:00','Elena Adams','Mindfulness activities for children.'),
(53,'2024-11-22','13:55:00','George King','Exploring the evolution of dance.'),
(54,'2024-11-23','15:10:00','Diana Snow','How to set and achieve goals.'),
(55,'2024-11-24','10:25:00','Alex Bennett','Understanding photography lighting.'),
(56,'2024-11-25','16:50:00','Ruby Lake','Top 10 holiday movies of all time.'),
(57,'2024-11-26','12:40:00','Mason Clark','Tips for online shopping safety.'),
(58,'2024-11-27','19:20:00','Sophie Ford','Holiday decorating ideas.'),
(59,'2024-11-28','08:10:00','John Hale','A look into cultural holiday customs.'),
(60,'2024-11-29','14:30:00','Liam Grey','The power of gratitude journaling.'),
(61,'2024-11-30','10:15:00','Emma Scott','Preparing for New Year celebrations.'),
(62,'2024-12-01','11:55:00','Noah Wright','Simple ways to stay active in winter.'),
(63,'2024-12-02','15:35:00','Mia Fox','Holiday gift ideas for everyone.'),
(64,'2024-12-03','13:00:00','Ben Carter','Winter fashion essentials.'),
(65,'2024-12-04','09:45:00','Ava Collins','How to plan a winter getaway.'),
(66,'2024-12-05','18:15:00','Ethan Brooks','Top tech gadgets to gift this year.'),
(67,'2024-12-06','08:50:00','Olivia Lee','De-stressing before the holidays.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
