-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2017 at 06:10 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dissemination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(1, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2014-03-12 15:49:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE IF NOT EXISTS `advice` (
  `id_advice` int(11) NOT NULL AUTO_INCREMENT,
  `advice_name` varchar(100) NOT NULL,
  `advice_des` varchar(100) NOT NULL,
  PRIMARY KEY (`id_advice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `advice`
--

INSERT INTO `advice` (`id_advice`, `advice_name`, `advice_des`) VALUES
(1, 'Food Security Tips', 'food advisory'),
(3, 'Hunger forecast', 'food advisory'),
(4, 'Food storage tips', 'food advisory'),
(5, 'Planting Advice', 'agriculture advisory'),
(6, 'Harvesting Advice', 'agriculture advisory'),
(7, 'Pests and Diseases', 'agriculture advisory'),
(8, 'health Advice', 'health Advice'),
(9, 'water Advice', 'water Advice');

-- --------------------------------------------------------

--
-- Table structure for table `advisory`
--

CREATE TABLE IF NOT EXISTS `advisory` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(30) NOT NULL,
  `subRegion` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `advice` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `audio` varchar(100) NOT NULL,
  `TS` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `advisory`
--

INSERT INTO `advisory` (`record_id`, `region`, `subRegion`, `type`, `advice`, `message`, `audio`, `TS`) VALUES
(2, '3', 'Eastern', 'text', '7', 'Spray during afternoons<br>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIASUNWPB_mp3.mp3', '2017-08-07 17:39:21'),
(6, '3', 'Southern', 'text', '1', 'Use the available water for\r\nlivestock, irrigation and domestic\r\nuse sparingly;\r\n<br>Farmers should mulch their\r\ngardens to conserve moisture\r\navailable in the soil;\r\n<br>Pasture preservation (hay, silage\r\nfor livestock);\r\n<br>Encourage farmers to store enough\r\nfood for household use especially\r\ncereals;\r\n<br>Planting of leafy vegetables and\r\ndrip irrigation should be\r\nencouraged;\r\n<br/> Use of proper post-harvest\r\nhandling practices to avoid yield\r\nlosses e.g. use of super bags,\r\nmetallic silos, maize cribs, Cacoons,\r\ntarpaulins, drying racks;\r\n<br> Early land preparation (towards\r\nend of JJA season) to allow for\r\ntimely planting for SOND;\r\n<br>Observe soil and water\r\nconservation practices such as\r\nmulching to reduce soil moisture;\r\n Supplementary irrigation to sustain\r\ncrop growth.', 'food_agric/wave2.mp3', '2017-08-07 17:39:21'),
(7, '6', 'North Eastern', 'text', '3', 'Irrigation would be more better<br>Use irregular light rains for early land preparation and securing inputs like seed, fertilizer, chemicals.<br>Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).<br>Enhance rain water harvesting (in-situ, roof, surface-run-off) for usage when the rains start is encouraged.<br>Observe good soil and water conservation practices.<br><br>', 'food_agric/india-national-anthem.mp3', '2017-08-07 17:39:21'),
(9, '7', 'North Western', 'text', '9', '.<br>Rainfall harvesting is encouraged.<br/>Water source protection and management should be strengthened for water security.<br/>Protect and conserve the water infrastructure in the areas like already established dams and valley tanks.<br/>Encourage tree planting along riverbanks and Clearance of water pathways to avoid silting.<br/>', 'food_agric/india-national-anthem3.mp3', '2017-08-07 17:39:21'),
(15, '5', 'Central', 'text', '5', 'These will help<br>Use irregular light rains for early land preparation and securing inputs like seed, fertilizer, chemicals.<br/>Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).<br/>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIATWOAT_mp3.mp3', '2017-08-07 17:39:21'),
(16, '6', 'Western', 'text', '8', '.<br/>Carrying out community health education is encouraged.<br/>Stocking of drugs against respiratory diseases is encouraged.<br/>Vaccination against meningitis is encouraged.<br/>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIATIDWPB_mp3.mp3', '2017-08-07 17:39:21'),
(17, '5', 'Southern', 'text', '9', '.<br/>Committees should ensure effective utilization of available water resources.<br/>Farmers who practiced water harvesting and use it sparingly.<br/>Rainfall harvesting is encouraged.<br/>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIAHWRWPB_mp3.mp3', '2017-08-07 17:39:22'),
(18, '3', 'Northern', 'text', '1', 'uuytr<br/>Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).<br/>Enhance rain water harvesting (in-situ, roof, surface-run-off) for usage when the rains start is encouraged.<br/>Encourage good soil and water conservation practices e.g. terraces, stone bunds, trenches, grass bunds, mulching to control soil erosion and boost soil moisture retention; and Drip irrigation where possible is encouraged.<br/>', 'food_agric/wave.mp3', '2017-08-07 17:39:22'),
(19, '6', 'Western', 'text', '8', 'hey u<br/>Carrying out community health education is encouraged.<br/>Stocking of drugs against respiratory diseases is encouraged.<br/>', 'food_agric/no image uploaded', '2017-08-07 17:39:22'),
(21, '4', 'North Eastern', 'text', '4', '.<br/>Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).<br/>Enhance rain water harvesting (in-situ, roof, surface-run-off) for usage when the rains start is encouraged.<br/>Encourage good soil and water conservation practices e.g. terraces, stone bunds, trenches, grass bunds, mulching to control soil erosion and boost soil moisture retention; and Drip irrigation where possible is encouraged.<br/>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIATIDHST_mp3.mp3', '2017-08-07 17:39:22'),
(22, '5', 'Southern', 'text', '4', 'h.<br/>Use irregular light rains for early land preparation and securing inputs like seed, fertilizer, chemicals.<br/> Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).<br/><br>', 'food_agric/https---www_weather_gov-media-mfl-nwr-MIATWOAT_mp31.mp3', '2017-08-07 17:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `issuetime` timestamp NULL DEFAULT NULL,
  `alertscol` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`region_id`),
  KEY `fk_alerts_region1_idx` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerts`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `img`) VALUES
(1, 'heavy rain', 'img/rain.PNG'),
(2, 'light thunder showers', 'img/thunderstorm.PNG'),
(3, 'sunny intervals', 'img/sunny.PNG'),
(4, 'showers', 'img/showers.ico'),
(5, 'sunny', 'img/image1s0.jpg'),
(6, 'cloudy', 'img/img-thing.jpg'),
(7, 'flood', 'img/floudimages.jpg'),
(8, 'light rain', 'img/H.PNG'),
(9, 'heavy thunder', 'img/lightthunder.ico');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(5) NOT NULL,
  `contact_group_id` int(5) NOT NULL DEFAULT '0',
  `contact_name` varchar(250) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`contact_id`),
  UNIQUE KEY `contact_number` (`contact_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_group_id`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `contact_date`, `contact_status`) VALUES
(0, 1, 'Ashirag', '0700231437', 'asher@sd.com', 'kampala', '2017-08-04 07:36:28', '1'),
(32, 1, 'sreekanth', '+918106665577', 'balusreekanth@gmail.com', 'hyd1', '2017-02-07 10:59:40', '0'),
(33, 2, 'Optus', '9999', '0939938838@k.com', 'muk', '2017-08-07 12:41:22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`ward_id`,`category_id`),
  KEY `fk_Customer_ward1_idx` (`ward_id`),
  KEY `fk_Customer_category1_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daemons`
--


-- --------------------------------------------------------

--
-- Table structure for table `daily_forecast`
--

CREATE TABLE IF NOT EXISTS `daily_forecast` (
  `id` double NOT NULL AUTO_INCREMENT,
  `max_temp` double DEFAULT NULL,
  `min_temp` double DEFAULT NULL,
  `sunrise` varchar(45) DEFAULT NULL,
  `sunset` varchar(45) DEFAULT NULL,
  `wind` int(11) DEFAULT NULL,
  `weather` text,
  `advisory` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `region` int(10) NOT NULL,
  `season_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`season_id`),
  KEY `fk_daily_forecast_season1_idx` (`season_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `daily_forecast`
--

INSERT INTO `daily_forecast` (`id`, `max_temp`, `min_temp`, `sunrise`, `sunset`, `wind`, `weather`, `advisory`, `date`, `time`, `region`, `season_id`, `cat_id`) VALUES
(8, 55, 12, 'East', 'West', 200, 'Very cold', 'Jackets', '2017-07-29', 'Morning', 3, 1, 1),
(9, 27, 12, 'Eastern Region', 'Western Region', 100, 'The weather is too too cold', 'Carry jackets', '2017-07-29', 'Morning', 4, 2, 1),
(10, 27, 20, 'west', 'West', 100, 'jjjjjfgf\r\nffjhfhgfghhgg\r\nfjfhgjhfgjfhgjf\r\nffjgjfhgjhjfhgg\r\nfgkjfkgfhgfhjfg\r\ngkkhfhgjhjhjg\r\ngkjjhjghjhjggfgfggf', 'My thought', '2017-07-21', 'Morning', 4, 2, 1),
(11, 100, 50, 'East', 'east', 200, 'massive rains', 'Umbrellas', '2017-07-27', '00:00:00', 4, 1, 2),
(12, 55, 20, 'west', 'West', 300, 'uuuuu', 'My thought', '2017-07-29', 'Morning', 5, 1, 4),
(13, 33, 20, 'west', 'West', 200, 'uuirorpep', 'My thought', '2017-07-30', '00:00:00', 5, 1, 1),
(14, 55, 20, 'East', 'east', 90, 'there', 'Jackets', '2017-07-29', 'Morning', 7, 2, 1),
(15, 33, 12, 'Eastern.....', 'Western', 300, 'fffffffff', 'Umbrellas', '2017-07-20', 'Afternoon', 5, 1, 3),
(16, 55, 12, 'west', 'West', 300, 'small rains', 'Umbrellas', '2017-07-21', 'Morning', 5, 2, 2),
(18, 97, 30, 'west', 'east', 12, 'what is that comme', 'keep iin', '2017-07-22', 'Morning', 3, 1, 1),
(19, 23, 24, '5:00am', '6:50pm', 20, 'small rains and sunshine through out', 'move with your drinking water bottles', '2017-07-21', 'Morning', 3, 1, 3),
(20, 97, 30, 'west', 'east', 12, 'jfhfdhhgdhfjhfdjhgjfghh\r\nskdjfhdjhfdjfh', 'the coming ten days are going to be rainy', '2017-07-21', 'Afternoon', 3, 1, 4),
(21, 97, 30, 'east', 'west', 12, 'cloudy', 'the coming ten days are going to be rainy', '2017-07-29', 'Morning', 6, 4, 3),
(22, 23, 24, '5', '7', 43, 'hchghgfhdgfhdgfhdfhdf vchch\r\nkjvjhjfhjhfgjshj', 'hhfhghhdjjdhhdh', '2017-07-19', 'Afternoon', 4, 1, 2),
(23, 97, 30, '45', '11:22', 12, 'sheshehshehshehs\r\nsjgfgfgfhgdhf\r\ndfkdjfkdhfhdg', 'keep outkeep out keep out keep out keep out', '2017-07-20', 'Afternoon', 3, 1, 2),
(24, 30, 20, '6:00am', '7:00pm', 50, 'it will be a little rainy and sunny all day', 'move in light clothes', '2017-07-31', 'Morning', 7, 4, 3),
(25, 52, 45, '6:00am', '7:00pm', 60, 'cloudy', 'move with jacket', '2017-08-01', 'Morning', 3, 4, 6),
(26, 55, 45, '6:00am', '7:00pm', 65, 'windy', 'move with jacket', '2017-08-01', 'Morning', 4, 4, 4),
(27, 56, 47, '6:00am', '7:00pm', 70, 'heavy rains', 'the coming ten days are going to be rainy', '2017-08-01', 'Morning', 5, 4, 2),
(28, 58, 48, '6:00am', '7:00pm', 75, 'sunny', 'move in light clothes', '2017-08-01', 'Morning', 6, 4, 5),
(29, 60, 55, '6:00am', '7:00pm', 90, 'some showers', 'move with an umbrella', '2017-08-01', 'Morning', 7, 4, 4),
(30, 29, 24, '11:30am', '3:30pm', 100, 'will be cold', 'move with jacket', '2017-08-02', 'Morning', 3, 1, 1),
(31, 30, 28, '11:30am', '5:00pm', 70, 'sunny and rainy', 'move with a jacket', '2017-08-03', 'Morning', 3, 4, 4),
(32, 57, 45, '6:00am', '7:00pm', 65, 'sunny', 'move in light clothes', '2017-08-03', 'Morning', 7, 4, 5),
(33, 29, 24, '5:00am', '6:50pm', 55, 'cloudy', 'Jackets coats', '2017-08-03', 'Morning', 5, 4, 6),
(34, 60, 50, '5:00am', '6:50pm', 43, 'small rains', 'move with your umbrellas', '2017-08-03', 'Morning', 4, 4, 8),
(35, 40, 39, '5:00am', '6:50pm', 43, 'Rain', 'move with your umbrellas', '2017-08-03', 'Morning', 6, 4, 2),
(36, 60, 45, '6:00am', '5:00pm', 90, 'keep out.', 'move with a jacket', '2017-08-04', 'Morning', 3, 1, 2),
(37, 60, 50, '6:00am', '7:00pm', 95, 'a little rainy', 'move with a jacket', '2017-08-04', 'Morning', 4, 2, 8),
(38, 70, 60, '6:00am', '7:00pm', 90, 'sunny', 'move in light clothes', '2017-08-04', 'Morning', 6, 2, 5),
(39, 50, 45, '6:00am', '7:00pm', 95, 'cloudy windy', 'move with an umbrella', '2017-08-04', 'Morning', 5, 2, 6),
(40, 67, 55, '6:00am', '7:00pm', 60, 'some how rainy', 'move with an umbrella', '2017-08-04', 'Morning', 7, 2, 1),
(41, 45, 23, '6:30am', '6:50pm', 80, 'wil be sunny', 'move with light clothes', '2017-08-06', 'Morning', 3, 2, 3),
(42, 50, 45, '6:00am', '7:00pm', 90, 'keep out', 'move in light clothes', '2017-08-06', 'Morning', 4, 2, 8),
(43, 60, 57, '6:30am', '6:50pm', 70, 'move out', 'move with light clothes', '2017-08-06', 'Morning', 5, 2, 3),
(44, 40, 35, '6:30am', '6:50pm', 90, 'will be rainy', 'move with an umbrella', '2017-08-06', 'Morning', 6, 2, 7),
(45, 55, 49, '6:30am', '7:00pm', 90, 'just cold', 'move with jacket', '2017-08-06', 'Morning', 7, 2, 6),
(46, 60, 55, '6:00am', '6:50pm', 90, 'move out', 'move in light clothes', '2017-08-07', 'Morning', 4, 2, 8),
(47, 23, 20, '6:30am', '7:00pm', 100, 'coldy..l', 'move with a jacket', '2017-08-08', 'Morning', 3, 2, 8),
(48, 34, 30, '6:30am', '7:00pm', 100, 'windy', 'move with sweater', '2017-08-08', 'Morning', 4, 2, 4),
(49, 50, 40, '6:30am', '7:00pm', 120, 'sunny', 'move with light clothes', '2017-08-08', 'Morning', 5, 2, 3),
(50, 45, 40, '6:40am', '7:10pm', 90, 'sunny', 'move with light clothes', '2017-08-08', 'Morning', 7, 2, 5),
(51, 30, 28, '6:40am', '6:20pm', 150, 'rainy', 'move with an umbrella', '2017-08-08', 'Morning', 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_forecast_has_region`
--

CREATE TABLE IF NOT EXISTS `daily_forecast_has_region` (
  `daily_forecast_id` double NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`daily_forecast_id`,`region_id`),
  KEY `fk_daily_forecast_has_region_region1_idx` (`region_id`),
  KEY `fk_daily_forecast_has_region_daily_forecast1_idx` (`daily_forecast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_forecast_has_region`
--


-- --------------------------------------------------------

--
-- Table structure for table `decadal`
--

CREATE TABLE IF NOT EXISTS `decadal` (
  `decadal_id` int(11) NOT NULL AUTO_INCREMENT,
  `advisory` varchar(255) NOT NULL,
  `region` int(10) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `graph` varchar(100) NOT NULL,
  `audio` varchar(100) NOT NULL,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`decadal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `decadal`
--

INSERT INTO `decadal` (`decadal_id`, `advisory`, `region`, `date_from`, `date_to`, `graph`, `audio`, `issuetime`) VALUES
(6, 'thoughts..kill', 7, '2017-07-03', '2017-07-11', 'uploads_decadal/seasonalimages1.jpeg', 'uploads_decadal/https---www_weather_gov-media-mfl-nwr-MIASUNWPB_mp3.mp3', '2017-08-02 21:05:28'),
(11, 'Alot of rains are expected so it would be better to plant early', 5, '2017-07-12', '2017-07-22', 'uploads_decadal/seaimages.jpeg', 'uploads_decadal/https---www_weather_gov-media-mfl-nwr-MIASUNWPB_mp31.mp3', '2017-08-03 14:28:50'),
(13, 'should plant early..k', 6, '2017-07-20', '2017-07-17', 'uploads_decadal/seasonalimages.jpeg', 'uploads_decadal/https---www_weather_gov-media-mfl-nwr-MIAHWRBLG_mp3.mp3', '2017-08-03 14:49:12'),
(26, 'The highest amount of rainfall received was 117mm at Lira Agromet Station followed by 94.2mm and\r\n90.0mm at Kaliro and Bulugeni rainfall stations respectively.  true', 7, '2017-08-03', '2017-08-13', 'uploads_decadal/image1s.jpeg', 'uploads_decadal/https---www_weather_gov-media-mfl-nwr-MIASUNWPB_mp3.mp3', '2017-08-06 17:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`region_id`),
  KEY `fk_district_region1_idx` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--


-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `advisory` text NOT NULL,
  `region` varchar(25) NOT NULL,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`record_id`, `names`, `advisory`, `region`) VALUES
(1, 'Mary Nsabagwa', ' since the birds are flying from.......', '3'),
(2, 'Julian Sansa', ' Since dnfbhfdhdghfgdhfdgfgdhf', '3'),
(3, 'jbhhf', ' nbhghhf', '5'),
(4, 'ainefjjfj', ' nnncnnncnd', '3');

-- --------------------------------------------------------

--
-- Table structure for table `forecast`
--

CREATE TABLE IF NOT EXISTS `forecast` (
  `id` binary(16) NOT NULL,
  `forecast_type_id` int(11) NOT NULL,
  `forecast_code_id` int(11) NOT NULL,
  `descriptin` text,
  `advisory` varchar(300) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `season_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`forecast_type_id`,`forecast_code_id`,`season_id`),
  KEY `fk_forecast_forecast_type1_idx` (`forecast_type_id`),
  KEY `fk_forecast_forecast_code1_idx` (`forecast_code_id`),
  KEY `fk_forecast_season1_idx` (`season_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast`
--


-- --------------------------------------------------------

--
-- Table structure for table `forecast_code`
--

CREATE TABLE IF NOT EXISTS `forecast_code` (
  `id` int(11) NOT NULL,
  `abbreviation` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `translation` varchar(45) DEFAULT NULL COMMENT 'This table is used to store the forecast codes... in the abbreviation column.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast_code`
--


-- --------------------------------------------------------

--
-- Table structure for table `forecast_has_region`
--

CREATE TABLE IF NOT EXISTS `forecast_has_region` (
  `forecast_id` binary(16) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`forecast_id`,`region_id`),
  KEY `fk_forecast_has_region_region1_idx` (`region_id`),
  KEY `fk_forecast_has_region_forecast1_idx` (`forecast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast_has_region`
--


-- --------------------------------------------------------

--
-- Table structure for table `forecast_type`
--

CREATE TABLE IF NOT EXISTS `forecast_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forecast_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groups_id` int(5) NOT NULL AUTO_INCREMENT,
  `groups_name` varchar(250) NOT NULL,
  `groups_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`groups_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groups_id`, `groups_name`, `groups_date`) VALUES
(1, 'GroupA', '2017-02-07 10:58:13'),
(2, 'GroupB', '2017-02-07 10:58:14'),
(3, 'GroupC', '2017-02-07 10:58:15'),
(4, 'GroupD', '2017-02-07 10:59:12'),
(5, 'GROUPE', '2017-08-04 10:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `newComing` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--


--
-- Triggers `inbox`
--
DROP TRIGGER IF EXISTS `inbox_timestamp`;
DELIMITER //
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox`
 FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `inbox_check`;
DELIMITER //
CREATE TRIGGER `inbox_check` AFTER INSERT ON `inbox`
 FOR EACH ROW BEGIN



IF NEW.TextDecoded = (SELECT settings_optoutmsg from settings) THEN 

   UPDATE contacts SET contact_status = '0' WHERE contact_number = NEW.SenderNumber;

END IF;



END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `log` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `descrpition` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `descrpition`) VALUES
(0, 'Dekadal forecast', '/index.php/Decadal_forecast/create', 'ddd', 1, 1, 'forecast'),
(1, 'Weather Forecast', '/index.php/Daily_forecast/displayDaily', 'fa fa-cloud', 1, 0, 'one'),
(2, 'Daily Forecast', 'index.php/Daily_forecast/create', 'use', 1, 1, 'forecast'),
(3, 'Advisory', '/index.php/Daily_forecast/displayDaily', 'fa fa-tripadvisor', 1, 0, '0'),
(5, 'CREATE FOOD ADVISORY', 'index.php/Advisory/create', 'gjjj', 1, 3, 'food'),
(6, 'CREATE AGRICULTURAL ADVISORY', '/index.php/Advisory/create1', 'gjgj', 1, 3, 'agriculture'),
(7, 'Daily Forecast', '/index.php/Daily_forecast/create2', 'jjg', 1, 14, 'one'),
(8, 'Seasonal_Forecast', 'index.php/Season/create', 'gjgj', 1, 1, 'forecast'),
(9, 'Seasonal_Forecast', 'index.php/season/index', 'gjgj', 1, 14, 'one'),
(10, 'VIEW ADVISORY', '/index.php/Advisory/index', 'gjgj', 1, 3, 'one'),
(11, 'Harvesting Advice', '/disemination_tz/Daily_forecast/index', 'ddd', 1, 4, '0'),
(13, 'Dekadal Forecast', '/index.php/Decadal_forecast/create1', 'jjg', 1, 14, 'one'),
(14, 'Tables', '/index.php/Daily_forecast/displayDaily', 'fa fa-table', 1, 0, 'one'),
(15, 'Forecast Advice', '/index.php/user_feedback/index', 'ion-android-mail', 1, 0, 'one'),
(16, 'forecast graphs', '/index.php/graph/index', 'ion-arrow-graph-up-right', 1, 0, 'one'),
(17, 'create health advisory', '/index.php/Advisory/create2', 'jj', 1, 3, 'health'),
(18, 'create water advisory', '/index.php/Advisory/create3', 'ff', 1, 3, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `SendBefore`, `SendAfter`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `Class`, `TextDecoded`, `ID`, `MultiPart`, `RelativeValidity`, `SenderID`, `SendingTimeOut`, `DeliveryReport`, `CreatorID`) VALUES
('2017-02-07 11:00:37', '2017-02-07 11:00:37', '2017-02-07 11:00:37', '23:59:59', '00:00:00', NULL, '8888', 'Default_No_Compression', '', -1, '1', 9, 'false', -1, NULL, '2017-02-07 11:00:37', 'default', 'Program'),
('2017-02-06 14:14:22', '2017-02-06 14:14:22', '2017-02-06 14:14:22', '23:59:59', '00:00:00', NULL, '9999', 'Default_No_Compression', '', -1, 'STOP', 8, 'false', -1, NULL, '2017-02-06 14:14:22', 'default', 'Program'),
('2017-02-06 14:13:39', '2017-02-06 14:13:39', '2017-02-06 14:13:39', '23:59:59', '00:00:00', NULL, '8888', 'Default_No_Compression', '', -1, '1', 7, 'false', -1, NULL, '2017-02-06 14:13:39', 'default', 'Program'),
('2017-08-04 10:24:40', '2017-08-04 10:24:40', '2017-08-04 10:24:40', '23:59:59', '00:00:00', NULL, '8888', 'Default_No_Compression', '', -1, '1', 0, 'false', -1, NULL, '2017-08-04 10:24:40', 'default', 'Program'),
('2017-08-04 10:24:47', '2017-08-04 10:24:47', '2017-08-04 10:24:47', '23:59:59', '00:00:00', NULL, '8888', 'Default_No_Compression', '', -1, '1', 0, 'false', -1, NULL, '2017-08-04 10:24:47', 'default', 'Program'),
('2017-08-07 15:52:41', '2017-08-07 15:52:41', '2017-08-07 15:52:41', '23:59:59', '00:00:00', NULL, '8888', 'Default_No_Compression', '', -1, '1', 0, 'false', -1, NULL, '2017-08-07 15:52:41', 'default', 'Program');

--
-- Triggers `outbox`
--
DROP TRIGGER IF EXISTS `outbox_timestamp`;
DELIMITER //
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbox_multipart`
--


-- --------------------------------------------------------

--
-- Table structure for table `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pbk`
--


-- --------------------------------------------------------

--
-- Table structure for table `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pbk_groups`
--


-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--


--
-- Triggers `phones`
--
DROP TRIGGER IF EXISTS `phones_timestamp`;
DELIMITER //
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `possible_advisories`
--

CREATE TABLE IF NOT EXISTS `possible_advisories` (
  `pos` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) NOT NULL,
  `advise` text NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`pos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `possible_advisories`
--

INSERT INTO `possible_advisories` (`pos`, `cat`, `advise`, `state`) VALUES
(1, 'agric', 'Use irregular light rains for early land preparation and securing inputs like seed, fertilizer, chemicals.', 'normal'),
(2, 'agric', 'Timely planting of improved varieties such as Beans (NABE 15-23 series), maize (Longe 5, 7H, 10H-11H).', 'normal'),
(3, 'agric', 'Enhance rain water harvesting (in-situ, roof, surface-run-off) for usage when the rains start is encouraged.', 'normal'),
(4, 'agric', 'Encourage good soil and water conservation practices e.g. terraces, stone bunds, trenches, grass bunds, mulching to control soil erosion and boost soil moisture retention; and Drip irrigation where possible is encouraged.', 'normal'),
(5, 'agric', 'Encourage pasture preservation/making hay.', 'normal'),
(6, 'agric', 'Carryout good agronomic practices for crops such as proper spacing, proper use of fertilizer.', 'normal'),
(7, 'agric', 'Diversify for example intercropping and mixed cropping; Maize/beans, maize-cowpea, maize-soybean.', 'normal'),
(8, 'agric', 'Carryout low-cost irrigation systems like small-scale drip irrigation e.g. use of plastic bottles filled with water.', 'normal'),
(9, 'agric', 'Encourage the usage of improved post-harvest technologies e.g. super bags, metallic silos, cocoons.', 'normal'),
(10, 'agric', 'Pasture preservation (making hay and silage) and use available water sparingly.', 'normal'),
(11, 'agric', 'Encourage farmers to store enough food for household use especially cereals.', 'normal'),
(12, 'agric', 'Farmers should mulch their gardens to conserve moisture available in the soil.', 'normal'),
(13, 'agric', 'Planting of leafy vegetables and drip irrigation should be encouraged.', 'normal'),
(14, 'agric', 'Supplementary irrigation to sustain crop growth.', 'normal'),
(16, 'agric', 'Observe soil and water conservation practices such as mulching to reduce soil moisture.', 'normal'),
(17, 'agric', 'Observe good soil and water conservation practices.', 'above'),
(18, 'agric', 'Dig water trenches and drainage channels to minimize flash floods and water logging.', 'above'),
(19, 'agric', 'Encourage proper agronomic practices such as timely weeding and harvesting.', 'above'),
(20, 'agric', 'Encourage proper food storage.', 'above'),
(21, 'agric', 'Encourage improved high yielding varieties ie cereals, soya, sorghum.', 'above'),
(22, 'agric', 'Avoid planting in areas prone to water logging.', 'above'),
(23, 'agric', 'Backyard/homestead gardening of vegetables such as nakati, dodo, egg-plants, etc.', 'above'),
(24, 'agric', 'Establishment of water harvesting structures at household and communal level.', 'above'),
(25, 'agric', 'Soil and water conservation practices e.g. trenches, grass bunds, mulching to enhance soil moisture retention and control erosion.', 'above'),
(26, 'agric', 'Enhance good agronomic practices (proper spacing, fertilizer use, weeding).', 'above'),
(27, 'agric', 'Livestock farmers are advised to plant livestock fodders at the onset of the rains.', 'above'),
(28, 'agric', 'Enhance surveillance of crop gardens for pests and diseases and timely control (crop rotation MSV, Root Rot, disease resistant varieties like NABE15-23, Longe10H-11H, 7H).', 'above'),
(29, 'agric', 'Encourage tree planting including agro-forestry and fruit trees).', 'above'),
(30, 'agric', 'Guard against tick-borne diseases and worms.', 'above'),
(31, 'agric', 'Improved post-harvest handling practices e.g. super bags.', 'above'),
(32, 'health', 'Carrying out community health education is encouraged.', 'normal'),
(33, 'health', 'Stocking of drugs against respiratory diseases is encouraged.', 'normal'),
(34, 'health', 'Vaccination against meningitis is encouraged.', 'normal'),
(35, 'health', 'Good personal hygiene and sanitation practices are encouraged.', 'normal'),
(36, 'health', 'Drinking a lot of clean boiled water to avoid dehydration.', 'normal'),
(37, 'health', 'Carrying out community health education is encouraged.', 'above'),
(38, 'health', 'The Ministry of Health and the district local government should Intensify disease surveillance.', 'above'),
(39, 'health', 'Stocking of drugs for water borne diseases.', 'above'),
(40, 'health', 'Good personal hygiene and sanitation practices should be encouraged.', 'above'),
(41, 'health', 'Increased disease surveillance due to expected upsurges of epidemics related to rainy season such as malaria, cholera, bilharzia and typhoid, also increase in lower respiratory diseases e.g. asthma due to humid conditions and allergies from some flowering plants are expected.', 'above'),
(42, 'water', 'Committees should ensure effective utilization of available water resources.', 'normal'),
(43, 'water', 'Farmers who practiced water harvesting and use it sparingly.', 'normal'),
(46, 'water', 'Rainfall harvesting is encouraged.', 'normal'),
(47, 'water', 'Water source protection and management should be strengthened for water security.', 'normal'),
(48, 'water', 'Protect and conserve the water infrastructure in the areas like already established dams and valley tanks.', 'normal'),
(49, 'water', 'Soil and water conservation should be encouraged like mulching.', 'normal'),
(50, 'water', 'Other energy sources like solar, biogas and wind energy should be exploited for example Biogas fuel using energy saving stoves.', 'normal'),
(51, 'water', 'There is a likelihood of accidents arising from settlements water catchment areas especially flood plains.', 'normal'),
(53, 'water', 'Encourage tree planting along riverbanks and Clearance of water pathways to avoid silting.', 'above'),
(54, 'water', 'Encourage proper agronomic practices such as timely weeding and harvesting.', 'above'),
(56, 'water', 'Plans for optimization of power generation and distribution should be enhanced due to the expected increased discharge of seasonal rain water into the water bodies', 'above'),
(57, 'water', 'Setting up and protection of vegetated/forested buffer zones around water sources to guard against water pollution should be encouraged and communities should avoid consumption of contaminated water', 'above'),
(58, 'water', 'Avoid catchment degradation practices e.g. bush burning and vegetation clearing as these have a direct impact on the quantity and quality of water resources', 'above'),
(59, 'water', 'Establishment of water harvesting structures at household and communal level', 'above'),
(60, 'water', 'Soil and water conservation practices e.g. trenches, grass bunds, mulching to enhance soil moisture retention and control erosion', 'above'),
(61, 'water', 'Enhance good agronomic practices (proper spacing, fertilizer use, weeding)', 'above'),
(62, 'water', 'Livestock farmers are advised to plant livestock fodders at the onset of the rains', 'above'),
(63, 'water', 'Enhance surveillance of crop gardens for pests and diseases and timely control (crop rotation MSV, Root Rot, disease resistant varieties like NABE15-23, Longe10H-11H, 7H)', 'above'),
(64, 'water', 'Plans for optimization of power generation and distribution should be enhanced due to the expected increased discharge of seasonal rain water into the water bodies', 'above'),
(65, 'water', 'Control water pollution to ensure that the available water is not polluted. E.g. controlled release of waste water into streams and rivers', 'above'),
(66, 'water', 'Setting up and protection of buffer zones around water sources to guard against water pollution should be encouraged and communities should avoid consumption of contaminated water', 'above'),
(67, 'water', 'More cases of electricity pole and wire breakdowns are expected due to wet soils and strong winds. Transformers also might be at stake.', 'above'),
(68, 'water', 'Human activities in steep slope areas should be regulated to avoid flooding in downstream areas', 'above');

-- --------------------------------------------------------

--
-- Table structure for table `possible_impacts`
--

CREATE TABLE IF NOT EXISTS `possible_impacts` (
  `ps` int(11) NOT NULL AUTO_INCREMENT,
  `impact` text NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`ps`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `possible_impacts`
--

INSERT INTO `possible_impacts` (`ps`, `impact`, `state`) VALUES
(1, 'Water stress for some crops like bananas and tea', 'normal'),
(2, 'Shortage of pasture and water for livestock', 'normal'),
(3, 'Increased incidences of livestock and crop pests and diseases.', 'normal'),
(4, 'Increased availability of water for production.', 'above'),
(5, 'Soil erosion from surface runoff.', 'above'),
(6, 'Silting of dams, valley tanks, fishponds and other water harvesting structures due to erosion..', 'above'),
(9, 'In general, farmers are advised to make use of the seasonal rains by optimizing crop yield through appropriate land-use management.', 'above'),
(10, 'Farmers are also encouraged to plant enough food for both domestic use and sale to emerging markets in the neighboring countries.', 'above'),
(11, 'Harvested food from this season should be dried or else sold off because of limited drying conditions associated with the rains and no sunshine. Those with modern driers will benefit most as they will sell at better prices when food starts decreasing.', 'above');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `zone_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`zone_id`),
  KEY `fk_region_zone1_idx` (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `zone_id`) VALUES
(3, 'L. Victoria Basin', 1),
(4, 'Central', 2),
(5, 'Western', 1),
(6, 'Eastern', 2),
(7, 'Northern', 1);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL,
  `season_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `season_name`) VALUES
(1, 'MARCH TO MAY'),
(2, 'JUNE TO AUGUST'),
(4, 'SEPTEMBER TO NOVEMBER'),
(5, 'DECEMBER TO FEBRUARY');

-- --------------------------------------------------------

--
-- Table structure for table `seasonal_forecast`
--

CREATE TABLE IF NOT EXISTS `seasonal_forecast` (
  `sea_id` int(11) NOT NULL AUTO_INCREMENT,
  `region` int(11) NOT NULL,
  `subRegion` varchar(100) NOT NULL,
  `season` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `impact` text NOT NULL,
  `graph` varchar(100) NOT NULL,
  `audio` varchar(100) NOT NULL,
  `issuetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `seasonal_forecast`
--

INSERT INTO `seasonal_forecast` (`sea_id`, `region`, `subRegion`, `season`, `description`, `impact`, `graph`, `audio`, `issuetime`) VALUES
(4, 3, 'North Eastern', 'JUNE TO AUGUST', 'The seasonal rains being experienced over this region are on a decline although they are expected to\r\ncontinue up to early June when the dry conditions are expected to set in up to mid-August.\r\nThereafter, occasional outbreaks of showers are expected to occur', 'Water stress for some crops like\r\nbananas and tea.<br/>\r\nShortage of pasture and water for\r\nlivestock.<br/>\r\nIncreased incidences of livestock\r\nand crop pests and diseases.<br/><br/>Harvested food from this season should be dried or else sold off because of limited drying conditions associated with the rains and no sunshine. Those with modern driers will benefit most as they will sell at better prices when food starts decreasing.<br/>', 'uploads/seasonal_climate_outlook_2017_1_20170412_17709126172.png', 'uploads/https---www_weather_gov-media-mfl-nwr-MIAHWRWPB_mp3.mp3', '2017-08-03 17:02:31'),
(10, 5, 'South Eastern', 'MARCH TO MAY', 'dry and some rains', '.<br/><br/>Shortage of pasture and water for livestock<br/>Farmers are also encouraged to plant enough food for both domestic use and sale to emerging markets in the neighboring countries.<br/>Harvested food from this season should be dried or else sold off because of limited drying conditions associated with the rains and no sunshine. Those with modern driers will benefit most as they will sell at better prices when food starts decreasing.<br/>', 'uploads/seasoimages1.jpeg', 'uploads/https---www_weather_gov-media-mfl-nwr-MIATIDWPB_mp3.mp3', '2017-08-03 16:53:30'),
(11, 3, 'Northern', 'MARCH TO MAY', 'rainy conditions will be needed.....', '.<br/><br/>Increased availability of water for production.<br/>Soil erosion from surface runoff.<br/>In general, farmers are advised to make use of the seasonal rains by optimizing crop yield through appropriate land-use management.<br/>', 'uploads/seasonimages1.png', 'uploads/https---www_weather_gov-media-mfl-nwr-MIACWFOUT_mp3.mp3', '2017-08-03 16:51:10'),
(13, 4, 'Western', 'JUNE TO AUGUST', 'Currently this region is experiencing dry conditions. Onset of seasonal rains is expected around late September with the peak occurring around late October. Cessation of the rains is expected around early December. In general, there is a high chance of this region receiving near normal to below normal rains over this forecast period.', 'silting<br><br>Water stress for some crops like bananas and tea<br/>Shortage of pasture and water for livestock<br/>Increased incidences of livestock and crop pests and diseases.<br/>', 'uploads/seosimages.jpeg', 'uploads/india-national-anthem3.mp3', '2017-08-01 11:38:02'),
(14, 7, 'Central', 'MARCH TO MAY', 'The region is experiencing its major rainy season with isolated showers and thunderstorm in several parts. However, some parts have been experiencing dry spells. The current moderate seasonal rains are expected to continue up to early October when the peak of the seasonal rains is expected to set in. The rains are expected thereafter to decline with cessation around late November to early December. Overall, near normal rains are expected over this region.', 'For the areas that have high chances of receiving near normal rains, means that the total rainfall expected will range between 75% to 125% of the long term mean (LTM) of the base period of 1981-2010. This range of rainfall is expected to adequately support the normal socio-economic activities for the various areas in those areas.<br>Soil erosion from surface runoff.<br/>In general, farmers are advised to make use of the seasonal rains by optimizing crop yield through appropriate land-use management.<br/>Farmers are also encouraged to plant enough food for both domestic use and sale to emerging markets in the neighboring countries.<br/>Harvested food from this season should be dried or else sold off because of limited drying conditions associated with the rains and no sunshine. Those with modern driers will benefit most as they will sell at better prices when food starts decreasing.<br/>', 'uploads/seasonimages.png', 'uploads/wave8.mp3', '2017-08-01 11:43:17'),
(15, 4, 'Western', 'JUNE TO AUGUST', 'Currently this region is experiencing dry conditions. Onset of seasonal rains is expected around late September with the peak occurring around late October. Cessation of the rains is expected around early December. In general, there is a high chance of this region receiving near normal to below normal rains over this forecast period.', 'shortage of pasture<br>Water stress for some crops like bananas and tea<br/>Increased incidences of livestock and crop pests and diseases.<br/>', 'uploads/image1s.jpeg', 'uploads/https---www_weather_gov-media-mfl-nwr-MIATIDHST_mp3.mp3', '2017-08-03 10:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sentitems`
--


--
-- Triggers `sentitems`
--
DROP TRIGGER IF EXISTS `sentitems_timestamp`;
DELIMITER //
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(5) NOT NULL,
  `settings_ussdcode` varchar(250) NOT NULL,
  `settings_option` varchar(250) NOT NULL,
  `settings_optoutmsg` varchar(250) NOT NULL,
  `settings_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_ussdcode`, `settings_option`, `settings_optoutmsg`, `settings_date`) VALUES
(1, '8888', '1', 'STOP', '2017-02-03 11:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `format` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `usertype`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1500184653, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(3, '127.0.0.1', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'ad@admin.com', NULL, NULL, NULL, NULL, 1268889823, 1499712104, 1, 'min', 'strator', 'wimea', '0'),
(4, '127.0.0.1', 'Kato', 'e1aa538d29017debe540309cd6f42d03', NULL, 'kato@ka.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'forecast', NULL),
(5, '127.0.0.1', 'kintu', '928d7d3e530050f34fce9f1b2e2bf2ad', NULL, 'kintu@ki.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'agriculture', NULL),
(6, '127.0.0.1', 'shillat', '4edf13dc807e9e220abff28412150be0', NULL, 'shillat@sh.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'food', NULL),
(7, '127.0.0.1', 'josephine', 'bf1c2f751f3286030a13fd2fef560069', NULL, 'josephine@jo.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'water', NULL),
(8, '127.0.0.1', 'josh', 'f94adcc3ddda04a8f34928d862f404b4', NULL, 'josh@jo.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'water', NULL),
(9, '127.0.0.1', 'marion', '279261d9a6cac3b888b2355479f2bf71', NULL, 'marion@ma.com', NULL, NULL, NULL, NULL, 20170806, NULL, NULL, NULL, NULL, 'health', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE IF NOT EXISTS `ward` (
  `id` int(11) NOT NULL,
  `ward_name` varchar(45) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`district_id`),
  KEY `fk_ward_district1_idx` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--


-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE IF NOT EXISTS `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone_name`) VALUES
(1, 'Five'),
(2, 'Six');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `fk_alerts_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_Customer_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Customer_ward1` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `daily_forecast`
--
ALTER TABLE `daily_forecast`
  ADD CONSTRAINT `fk_daily_forecast_season1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `daily_forecast_has_region`
--
ALTER TABLE `daily_forecast_has_region`
  ADD CONSTRAINT `fk_daily_forecast_has_region_daily_forecast1` FOREIGN KEY (`daily_forecast_id`) REFERENCES `daily_forecast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_daily_forecast_has_region_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_district_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forecast`
--
ALTER TABLE `forecast`
  ADD CONSTRAINT `fk_forecast_forecast_code1` FOREIGN KEY (`forecast_code_id`) REFERENCES `forecast_code` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forecast_forecast_type1` FOREIGN KEY (`forecast_type_id`) REFERENCES `forecast_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forecast_season1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forecast_has_region`
--
ALTER TABLE `forecast_has_region`
  ADD CONSTRAINT `fk_forecast_has_region_forecast1` FOREIGN KEY (`forecast_id`) REFERENCES `forecast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forecast_has_region_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `fk_region_zone1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `fk_ward_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
