
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coolasia`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_site`
--

CREATE TABLE IF NOT EXISTS `t_site` (
  `site_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `site_address` varchar(200) NOT NULL,
  `site_lat` decimal(15,6) NOT NULL DEFAULT '0.000000',
  `site_lng` decimal(15,6) NOT NULL DEFAULT '0.000000',
  `sub_dept` enum('FO') NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t_site`
--

INSERT INTO `t_site` (`site_id`, `site_name`, `site_address`, `site_lat`, `site_lng`, `sub_dept`) VALUES
(1, 'Mega Indah Cargo', '1779 Geylang Bahru, Singapore 339706', '1.315648', '103.870265', 'FO'),
(2, 'Citylights', '82 Jellicoe Rd, Singapur 208741', '1.310663', '103.861183', 'FO'),
(3, 'Mountbatten Centre', '231 Mountbatten Rd, Singapur 397999', '1.309496', '103.880635', 'FO'),
(4, 'Katong Park Towers', '114A Arthur Road, Singapur 439826', '1.299751', '103.889200', 'FO'),
(5, 'Le Crescendo', '233 Paya Lebar Rd, Singapur 409044', '1.325322', '103.886937', 'FO'),
(6, 'First East Centre', '10 Kaki Bukit Road 2, Singapur 417868', '1.345024', '103.893432', 'FO');

-- --------------------------------------------------------

--
-- Table structure for table `t_tracking`
--

CREATE TABLE IF NOT EXISTS `t_tracking` (
  `tracking_id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_datetime` datetime NOT NULL,
  `site_id` smallint(6) NOT NULL,
  `worker_id` smallint(6) NOT NULL,
  PRIMARY KEY (`tracking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `t_tracking`
--

INSERT INTO `t_tracking` (`tracking_id`, `tracking_datetime`, `site_id`, `worker_id`) VALUES
(1, '2017-01-16 01:16:00', 3, 2),
(2, '2017-01-16 04:16:00', 1, 7),
(3, '2017-01-16 07:32:00', 3, 8),
(4, '2017-01-17 09:54:00', 2, 4),
(5, '2017-01-17 12:40:00', 6, 1),
(6, '2017-01-18 08:17:00', 3, 10),
(7, '2017-01-19 14:30:00', 4, 2),
(8, '2017-01-19 15:07:00', 3, 9),
(9, '2017-01-19 15:22:00', 4, 3),
(10, '2017-01-19 19:40:00', 2, 3),
(11, '2017-01-20 06:54:00', 1, 9),
(12, '2017-01-20 11:23:00', 5, 5),
(13, '2017-01-20 11:43:00', 3, 6),
(14, '2017-01-20 13:15:00', 1, 8),
(15, '2017-01-20 15:40:00', 2, 4),
(16, '2017-01-20 18:33:00', 1, 7),
(17, '2017-01-21 16:13:00', 5, 1),
(18, '2017-01-22 11:54:00', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `t_worker`
--

CREATE TABLE IF NOT EXISTS `t_worker` (
  `worker_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `worker_ic_no` varchar(20) NOT NULL DEFAULT '0',
  `worker_name` varchar(50) DEFAULT NULL,
  `worker_dob` date NOT NULL,
  `worker_email` varchar(100) NOT NULL,
  `worker_phone` varchar(20) DEFAULT NULL,
  `worker_address` varchar(200) NOT NULL,
  `worker_salary` decimal(15,2) NOT NULL DEFAULT '0.00',
  `sub_dept` enum('FO') NOT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `t_worker`
--

INSERT INTO `t_worker` (`worker_id`, `worker_ic_no`, `worker_name`, `worker_dob`, `worker_email`, `worker_phone`, `worker_address`, `worker_salary`, `sub_dept`) VALUES
(1, 'R9166933A', 'Ricky Konopelski', '1959-03-14', 'jett.greenfelder@hodkiewicz.org', '+65 6377 6717', '38 Jalan Stehr Way SINGAPORE 245273', '150.00', 'FO'),
(2, 'E9910375B1', 'Emery Lowe Jr.', '1950-11-25', 'zkilback@yahoo.com', '+656763 3029', 'Blk 657E O''Keefe Park Road SINGAPORE 138654', '100.00', 'FO'),
(3, 'F6161648P', 'Fernando Zemlak', '1923-12-07', 'mckenzie.alysha@muller.com', '+65 6048 6948', '08 Fritsch Walk Quay SINGAPORE 769683', '112.00', 'FO'),
(4, 'A4395788X', 'Austyn Torp', '1987-06-15', 'brandt78@fadel.com', '+65 66311518', '110 Jalan Douglas Avenue SINGAPORE 212305', '98.00', 'FO'),
(5, 'B9016887D', 'Branson Rath', '1989-03-21', 'shawn95@gmail.com', '+65 6518 2039', '20 Grant Place Park SINGAPORE 408223', '12.00', 'FO'),
(6, 'E7109245C', 'Elian Marquardt', '1988-04-14', 'wisozk.lucius@zemlak.com', '+65 6790 3355', '285 Hills Link Bridge SINGAPORE 747725', '20.00', 'FO'),
(7, 'RT1977447Z', 'Reymundo Hahn', '1950-06-03', 'whayes@hotmail.com', '+65 9344 9656', '53 Walsh Place Way SINGAPORE 676614', '26.00', 'FO'),
(8, 'DS4305041I', 'Dustin Leffler', '1989-04-16', 'margot03@osinski.com', '+65 6541 9783', '368 Moore Park Bridge SINGAPORE 760604', '33.00', 'FO'),
(9, 'LS6335744H', 'Lawrence Cole', '1937-11-28', 'kovacek.craig@heaney.net', '+65 6872 2644', '761 Christiansen Road Drive SINGAPORE 669545', '64.00', 'FO'),
(10, 'CS4313957F', 'Carlos Balistreri', '1950-01-13', 'santiago.mcglynn@yahoo.com', '+65 6438 0295', '63 Windler Hill Way SINGAPORE 976162', '49.00', 'FO'),
(11, 'KS9909889I', 'Kris Jakubowski', '1998-02-25', 'schaden.georgiana@hotmail.com', '+65 8183 8815', '57 Rogahn Walk Drive SINGAPORE 980660', '23.00', 'FO'),
(12, 'RS6564852J', 'Ramiro Wilderman', '1992-01-26', 'volkman.wilfrid@corwin.com', '+65 6426 3666', '19 Daniel Crescent Place SINGAPORE 693958', '18.00', 'FO');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
