-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 05:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_wish`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `display_artist` ()  select * from artist where active='Yes' order by artist_name asc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display_director` ()  select * from director where active='Yes' order by director_name asc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display_language` ()  select * from language where active='Yes' order by language_name asc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display_movies` ()  NO SQL
select * from movies where active='Yes' order by movie_name asc$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email_id`, `fname`, `lname`, `phone_no`, `username`, `password`, `admin_photo`) VALUES
('sgkashyap@gmail.com', 'SGK', 'Kashyap', '9876543210', 'sgk', '$2y$10$m6ETSQcxuM8WSfe/TOsqPu4se2Yk4FNU35y/cRamrTW.Bn8avmS2K', '../Images/Admin/IMG-20210329-WA0006.jpg'),
('vishwanathdb2000@gmail.com', 'Vish', 'D B', '9812345670', 'vish', '$2y$10$CSqdB38kUd/pVpmbFDq/n.wr9YNwbxpPSbOUsKzJ/SS6Uo5Wjp0n6', '../Images/Admin/IMG_20210309_172837_462.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `artist_gender` varchar(10) NOT NULL,
  `artist_photo` varchar(255) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_gender`, `artist_photo`, `Active`) VALUES
(38, 'Mahesh Babu', 'Male', '../Images/Artist/mahesh_babu.jpg', 'Yes'),
(39, 'NTR Jr', 'Male', '../Images/Artist/ntr.jpg', 'Yes'),
(40, 'Pooja Hegde', 'Female', '../Images/Artist/pooja_hegde.jpg', 'Yes'),
(41, 'Yash', 'Male', '../Images/Artist/yash.jpeg', 'Yes'),
(42, 'Sri Murali', 'Male', '../Images/Artist/sri_murali.jpg', 'Yes'),
(43, 'Salman Khan', 'Male', '../Images/Artist/salman_khan.jpg', 'Yes'),
(44, 'Amir Khan', 'Male', '../Images/Artist/amir_khan.jpg', 'Yes'),
(45, 'Kareena Kapoor', 'Female', '../Images/Artist/kareena_kapoor.jpg', 'Yes'),
(46, 'Suriya', 'Male', '../Images/Artist/suriya.jpg', 'Yes'),
(47, 'Madhavan', 'Male', '../Images/Artist/madhavan.jpg', 'Yes'),
(48, 'Vijya Sethupathi', 'Male', '../Images/Artist/vijya_sethupathi.jpeg', 'Yes'),
(49, 'Robert Downey Jr', 'Male', '../Images/Artist/robert_downey_jr.jpg', 'Yes'),
(50, 'Patrick Wilson', 'Male', '../Images/Artist/patrick_wilson.jpg', 'Yes'),
(51, 'Christian Bale', 'Male', '../Images/Artist/christian_bale.jpg', 'Yes'),
(52, 'Leonardo DiCaprio', 'Male', '../Images/Artist/leonardo_dicaprio.jpg', 'Yes'),
(53, 'Vera Farmiga', 'Female', '../Images/Artist/vera_farmiga.jpg', 'Yes'),
(54, 'Gwyneth Paltrow', 'Female', '../Images/Artist/gwyneth_paltrow.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` int(255) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `director_gender` varchar(10) NOT NULL,
  `director_photo` varchar(255) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `director_name`, `director_gender`, `director_photo`, `Active`) VALUES
(13, 'Prashanth Neel', 'Male', '../Images/Director/prashanth_neel.jpg', 'Yes'),
(14, 'Christopher Nolan', 'Male', '../Images/Director/christopher_nolan.jpg', 'Yes'),
(15, 'Narthan', 'Male', '../Images/Director/narthan.jpg', 'Yes'),
(16, 'Trivikram Srinivas', 'Male', '../Images/Director/trivikram_srinivas.jpg', 'Yes'),
(17, 'Vamshi Paidipally', 'Male', '../Images/Director/vamsi_paidipally.jpg', 'Yes'),
(18, 'Kabir Khan', 'Male', '../Images/Director/kabir_khan.jpg', 'Yes'),
(19, 'Rajkumar Hirani', 'Male', '../Images/Director/Rajkumar_Hirani.jpeg', 'Yes'),
(21, 'Sudha K Prasad', 'Female', '../Images/Director/sudha_k_prasad.jpg', 'Yes'),
(22, 'Gayathri', 'Female', '../Images/Director/Gayatri.jpg', 'Yes'),
(23, 'James Wan', 'Male', '../Images/Director/james_wan.jpg', 'Yes'),
(24, 'Jon Favreau', 'Male', '../Images/Director/jon_favreau.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_admin`
-- (See below for the actual view)
--
CREATE TABLE `display_admin` (
`email_id` varchar(255)
,`fname` varchar(255)
,`lname` varchar(255)
,`phone_no` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`admin_photo` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_artist`
-- (See below for the actual view)
--
CREATE TABLE `display_artist` (
`artist_id` int(255)
,`artist_name` varchar(255)
,`artist_gender` varchar(10)
,`artist_photo` varchar(255)
,`Active` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_director`
-- (See below for the actual view)
--
CREATE TABLE `display_director` (
`director_id` int(255)
,`director_name` varchar(255)
,`director_gender` varchar(10)
,`director_photo` varchar(255)
,`Active` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_language`
-- (See below for the actual view)
--
CREATE TABLE `display_language` (
`language_id` int(255)
,`language_name` varchar(255)
,`language_photo` varchar(255)
,`Active` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_movies`
-- (See below for the actual view)
--
CREATE TABLE `display_movies` (
`movie_id` int(255)
,`movie_name` varchar(255)
,`movie_photo` varchar(255)
,`language_name` varchar(255)
,`director_name` varchar(255)
,`release_date` date
,`movie_trailer` varchar(255)
,`movie_carousel` varchar(255)
,`movie_plot` varchar(255)
,`movie_collection` float
,`imdb_rating` float
,`viewer_rating` float
,`Active` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_movie_cast`
-- (See below for the actual view)
--
CREATE TABLE `display_movie_cast` (
`artist_id` int(255)
,`artist_name` varchar(255)
,`artist_photo` varchar(255)
,`movie_id` int(255)
,`movie_name` varchar(255)
,`movie_photo` varchar(255)
,`Active` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_viewer_rating`
-- (See below for the actual view)
--
CREATE TABLE `display_viewer_rating` (
`viewer_id` varchar(255)
,`viewer_name` varchar(255)
,`movie_id` int(255)
,`movie_name` varchar(255)
,`rating` float
,`comment` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_website_rating`
-- (See below for the actual view)
--
CREATE TABLE `display_website_rating` (
`viewer_id` varchar(255)
,`viewer_name` varchar(255)
,`rating` float
,`comment` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(255) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_photo` varchar(255) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`, `language_photo`, `Active`) VALUES
(4, 'ENGLISH', '../Images/Language/The-Conjuring-2-French-Poster.jpg', 'Yes'),
(6, 'HINDI', '../Images/Language/movieposter_en.jpg', 'Yes'),
(7, 'KANNADA', '../Images/Language/a6f818b4017b7c760f8d7c28558b9354.jpg', 'Yes'),
(13, 'TELUGU', '../Images/Language/aravinda-sametha.jpg', 'Yes'),
(14, 'TAMIL', '../Images/Language/Screenshot_20210328-123112_Google.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(255) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_language_id` int(255) NOT NULL,
  `movie_director_id` int(255) NOT NULL,
  `release_date` date NOT NULL,
  `movie_trailer` varchar(255) NOT NULL,
  `movie_collection` float NOT NULL,
  `imdb_rating` float NOT NULL,
  `viewer_rating` float NOT NULL,
  `Description` varchar(255) NOT NULL,
  `movie_photo` varchar(255) NOT NULL,
  `Active` varchar(10) NOT NULL,
  `movie_plot` varchar(255) NOT NULL,
  `movie_carousel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_language_id`, `movie_director_id`, `release_date`, `movie_trailer`, `movie_collection`, `imdb_rating`, `viewer_rating`, `Description`, `movie_photo`, `Active`, `movie_plot`, `movie_carousel`) VALUES
(11, 'KGF', 7, 13, '2018-12-21', 'https://www.youtube.com/embed/qXgF-iJ_ezE', 34.06, 8.2, 8.75, 'KGF , Yash , Prashanth Neel , Kannada , Action ', '../Images/Movie/kgf.jpg', 'Yes', 'Rocky, a young man, seeks power and wealth in order to fulfil a promise to his dying mother. His quest takes him to Mumbai, where he gets involved with the notorious gold mafia.', '../Images/Carousel/kgf_home.jpg'),
(14, 'Ugramm', 7, 13, '2014-02-21', 'https://www.youtube.com/embed/f7XQSsZLjmo', 0, 8.1, 8, 'kannada , Sri murali , Prashanth Neel , Action', '../Images/Movie/ugramm.jpg', 'Yes', 'When Agastya visits Mughor, he witnesses girls being raped in front of the villagers. He fights against the thugs to stop this but becomes a target of the local mafia.', '../Images/Carousel/ugramm_home.jpg'),
(15, 'Aravinda Sametha Veera Raghava', 13, 16, '2020-03-29', 'https://www.youtube.com/embed/dNMe5oRfsCE', 22.48, 7.6, 9, 'Action , Telugu , NTR , Pooja Hegde , Emotion , Sentiment', '../Images/Movie/aravindha_sametha.jpg', 'Yes', 'A young man sets out to avenge his father\'s death but soon realises that violence is not the key to his salvation. His life changes when he meets another man, who helps him rediscover himself.', '../Images/Carousel/Aravindha_Sametha_home.jpg'),
(17, 'Mufti', 7, 15, '2018-12-11', 'https://www.youtube.com/embed/nharStnVdmg', 2.04, 7.8, 10, 'Actio , Sri Murali , Narthan , Spy , Ploice ', '../Images/Movie/mufti.jpg', 'Yes', 'Gana, a police officer, must go undercover to find and kill Bhairathi Ranagal, a crime lord. However, when he realises that Bhairathi\'s intentions are good, he needs to decide his next step.', '../Images/Carousel/mufti_home.jpg'),
(18, 'Maharshi', 13, 17, '2019-05-09', 'https://www.youtube.com/embed/ByjXIbg4hjw', 20, 7.2, 8.5, 'Telugu , Mahesh Babu , Pooja Hegde , Emotion , Inspiration , College', '../Images/Movie/maharshi_155713147430.jpg', 'Yes', 'A rich businessman returns to India to mend ways with his ex-classmate. However, when he learns about his friend\'s plight, he tries to help him and becomes a saviour for the villagers in the process.', '../Images/Carousel/maharshi_home.jpg'),
(19, 'Brindavanam', 13, 17, '2000-10-14', 'https://www.youtube.com/embed/J9ZhAtJClsE', 0, 7.1, 8.25, 'family , NTR , Vamshi Paidipally , Comedy , Telugu', '../Images/Movie/brindavanam.jpg', 'Yes', 'Indu makes her boyfriend Krishna act like her friend Bhoomi\'s lover so that her family will stop searching for a groom. However, their lives takes a turn when Bhoomi falls in love with Krishna.', '../Images/Carousel/brindavanam_home.jpg'),
(26, 'Khaleja', 13, 16, '2010-10-07', 'https://www.youtube.com/embed/AzzpSdCtxO8', 0, 7.6, 8.75, 'Adventure , Mahesh Babu , Trivikram Srinivas , Comedy , Telugu', '../Images/Movie/Khaleja.jpg', 'Yes', 'A village is hounded by an unknown disease, killing several people each month. As per a prophecy, a godsend will save the village and Siddhappa finds this supernatural potential in Raju, a cab driver.', '../Images/Carousel/Khaleja_home.jpg'),
(27, '3 Idiots', 6, 19, '2009-12-25', 'https://www.youtube.com/embed/K0eDlFX9GMc', 62.68, 8.4, 9.5, 'College , Friends , Adventure , Comedy, Hindi , Amir Khan , Rajkumar Hirani', '../Images/Movie/3_idiots.jpg', 'Yes', 'In college, Farhan and Raju form a great bond with Rancho due to his refreshing outlook. Years later, a bet gives them a chance to look for their long-lost friend whose existence seems rather elusive.', '../Images/Carousel/3_idiots_home.jpg'),
(28, 'Bajarangi Bhaijan', 6, 18, '2015-07-17', 'https://www.youtube.com/embed/1j02gw87ln0', 132.05, 8, 8, 'Drama , Hindi , Adventure , Salman Khan , Kabir Khan', '../Images/Movie/bajarangi_bhaijan.jpg', 'Yes', 'Pawan, a devotee of Lord Hanuman, finds a girl, who is speech impaired, lost in Haryana. He soon learns that she belongs to Pakistan and sets out to reunite her with her family at great personal cost.', '../Images/Carousel/bajrangi-bhaijaan_home.png'),
(29, 'Ek Tha Tiger', 6, 18, '2012-08-15', 'https://www.youtube.com/embed/SmUl0l8qBXw', 45, 5.5, 0, 'Action , Romantic ,Salman Khan , Kabir khan , Hindi , Spy', '../Images/Movie/ek_tha_tiger.jpg', 'Yes', 'A RAW agent, Tiger, is sent to Dublin to observe an Indian scientist who is suspected of sharing nuclear secrets with the ISI. He meets and falls for his caretaker Zoya, a girl with a dark secret.', '../Images/Carousel/ek_tha_tiger_home.jpg'),
(31, 'Soorarai Pottru', 14, 21, '2020-11-12', 'https://www.youtube.com/embed/dyzraT_np8w', 0, 8.6, 9, 'Drama , Biopic , Inspiration , Tamil , Suriya , Sudha K Prasad', '../Images/Movie/soorarai_pottru.jpg', 'Yes', 'Maara, a young man from a remote village, dreams of launching his own airline service. However, he must overcome several obstacles and challenges in order to be successful in his quest.', '../Images/Carousel/soorarai_pottru_home.jpg'),
(32, 'Irudhi Suttru ', 14, 21, '2016-01-29', 'https://www.youtube.com/embed/SZsb3IovkK8', 0, 7.6, 7.75, 'Inspiration , Drama ,Madhavan , Subha K Prasad , Tamil', '../Images/Movie/irudhi_suttru.jpg', 'Yes', 'Prabhu Selvaraj, a boxer, is ignored by the boxing association. He tries to accomplish his dream by training Madhi, an amateur fighter.', '../Images/Carousel/Irudhi_Sutru_home.jpg'),
(33, 'Vikram Vedha', 14, 22, '2017-07-21', 'https://www.youtube.com/embed/1sVr-uWZPjE', 8.17, 8.4, 9, 'Action , Suspense , Thriller , Drama , Spy , Madhavan ,Vijay Sethupathi , Gayathri , Tamil', '../Images/Movie/vikram_vedha.jpg', 'Yes', 'Vikram, a pragmatic policeman, and his partner Simon are on the hunt to capture Vedha. When Vedha voluntarily surrenders, he offers to tell Vikram a story, throwing Vikram\'s life into disarray.', '../Images/Carousel/vikram_vedha_home.jpg'),
(34, 'The Conjuring', 4, 23, '2013-08-02', 'https://www.youtube.com/embed/k10ETZ41q5o', 319.5, 7.5, 10, 'English , Horror , Suspense , Thriller , Patrick Wilson , James Wan', '../Images/Movie/the_conjuring_1.jpg', 'Yes', 'The Perron family moves into a farmhouse where they experience paranormal phenomena. They consult demonologists, Ed and Lorraine Warren, to help them get rid of the evil entity haunting them.', '../Images/Carousel/the_conjuring_1_home.jpg'),
(35, 'The Conjuring 2', 4, 23, '2016-06-10', 'https://www.youtube.com/embed/KyA9AtUOqRM', 320.4, 7.3, 9, 'Horror , Thriller , Suspense , James Wan , Patrick Wilson , Vera Farmiga , English', '../Images/Movie/the_conjuring_2.jpg', 'Yes', 'Peggy, a single mother of four children, seeks the help of occult investigators Ed and Lorraine Warren when she and her children witness strange, paranormal events in their house.', '../Images/Carousel/the_conjuring_2_home.jpg'),
(36, 'Inception', 4, 14, '2010-07-16', 'https://www.youtube.com/embed/8hP9D6kZseM', 838.6, 8.8, 9, 'Suspense , Adventure , Inspiration , Sci-fi , Leonardo DiCaprio , Christopher Nolan , English', '../Images/Movie/inception.jpg', 'Yes', 'Cobb steals information from his targets by entering their dreams. Saito offers to wipe clean Cobb\'s criminal history as payment for performing an inception on his sick competitor\'s son.', '../Images/Carousel/inception_home.jpg'),
(37, 'Batman Begins', 4, 14, '2005-06-17', 'https://www.youtube.com/embed/qHhHIbNuok8', 373.6, 8.2, 10, 'Action , Super Hero , Fantasy , Thriller , Christoper Nolan , Christian Bale , English', '../Images/Movie/batman_begins.jpg', 'Yes', 'After witnessing his parents\' death, Bruce learns the art of fighting to confront injustice. When he returns to Gotham as Batman, he must stop a secret society that intends to destroy the city.', '../Images/Carousel/batman-begins_home.jpg'),
(38, 'Ironman', 4, 24, '2008-05-01', 'https://www.youtube.com/embed/8ugaeA-nMTc', 585.3, 7.9, 10, 'Action , Adventure , Sci-Fi , Super Hero , Robert Downey Jr , RDJ , Jon Favreau ', '../Images/Movie/ironman_1.jpg', 'Yes', 'When Tony Stark, an industrialist, is captured, he constructs a high-tech armoured suit to escape. Once he manages to escape, he decides to use his suit to fight against evil forces to save the world.', '../Images/Carousel/ironman_1_home.jpg'),
(39, 'Ironman 2', 4, 24, '2010-05-07', 'https://www.youtube.com/embed/wKtcmiifycU', 623.9, 7, 8, 'Action , Adventure , Sci-Fi , Super Hero , Robert Downey Jr, RDJ , Jon Favreau , English , Gwyneth Paltrow', '../Images/Movie/ironman_2.jpg', 'Yes', 'Tony Stark is under pressure from various sources, including the government, to share his technology with the world. He must find a way to fight them while also tackling his other enemies.', '../Images/Carousel/ironman_2_home.jpg');

--
-- Triggers `movies`
--
DELIMITER $$
CREATE TRIGGER `default_viewer_rating` BEFORE INSERT ON `movies` FOR EACH ROW SET new.viewer_rating=0
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `movie_cast`
--

CREATE TABLE `movie_cast` (
  `artist_id` int(255) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_cast`
--

INSERT INTO `movie_cast` (`artist_id`, `movie_id`, `Active`) VALUES
(38, 18, 'Yes'),
(38, 26, 'Yes'),
(39, 15, 'Yes'),
(39, 19, 'Yes'),
(40, 15, 'Yes'),
(40, 18, 'Yes'),
(41, 11, 'Yes'),
(42, 14, 'Yes'),
(42, 17, 'Yes'),
(43, 28, 'Yes'),
(43, 29, 'Yes'),
(44, 27, 'Yes'),
(45, 27, 'Yes'),
(45, 28, 'Yes'),
(46, 31, 'Yes'),
(47, 32, 'Yes'),
(47, 33, 'Yes'),
(48, 33, 'Yes'),
(49, 38, 'Yes'),
(49, 39, 'Yes'),
(50, 34, 'Yes'),
(50, 35, 'Yes'),
(51, 37, 'Yes'),
(52, 36, 'Yes'),
(53, 34, 'Yes'),
(53, 35, 'Yes'),
(54, 38, 'Yes'),
(54, 39, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `rate_us`
--

CREATE TABLE `rate_us` (
  `viewer_id` varchar(255) NOT NULL,
  `viewer_name` varchar(255) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate_us`
--

INSERT INTO `rate_us` (`viewer_id`, `viewer_name`, `rating`, `comment`) VALUES
('champ@gmail.com', 'champ', 9.5, 'Good work'),
('vish@gmail.com', 'vish', 8.5, 'Best website to gather information about movie under one roof.');

-- --------------------------------------------------------

--
-- Table structure for table `viewer_rating`
--

CREATE TABLE `viewer_rating` (
  `viewer_id` varchar(255) NOT NULL,
  `viewer_name` varchar(255) NOT NULL,
  `movie_id` int(255) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewer_rating`
--

INSERT INTO `viewer_rating` (`viewer_id`, `viewer_name`, `movie_id`, `rating`, `comment`) VALUES
('champ@gmail.com', 'champ', 11, 8.5, 'A perfect action pack by director Prashanth Neel.'),
('champ@gmail.com', 'champ', 14, 8, 'Nice come back by Sri Murali.'),
('champ@gmail.com', 'champ', 15, 9, 'Amazing narration with outstanding performance.'),
('champ@gmail.com', 'champ', 17, 10, 'Amazing multi starer.'),
('champ@gmail.com', 'champ', 18, 8, 'Youthful inspirational'),
('champ@gmail.com', 'champ', 19, 8, 'Nice family entertainer.'),
('champ@gmail.com', 'champ', 26, 8.5, 'Amazing thought process of director.'),
('champ@gmail.com', 'champ', 27, 9, 'Best life lesson.'),
('champ@gmail.com', 'champ', 28, 8, 'Probably Salman Khan\'s best performance.'),
('champ@gmail.com', 'champ', 31, 9, 'Great performance by Surya.'),
('champ@gmail.com', 'champ', 32, 7.5, 'Nice performance by Madhavan.'),
('champ@gmail.com', 'champ', 34, 10, 'A new definition to horror movie.'),
('champ@gmail.com', 'champ', 35, 9, 'Continuing the horror series.'),
('champ@gmail.com', 'champ', 36, 9, 'Best visual effect with great performance.'),
('champ@gmail.com', 'champ', 37, 10, 'Great start for an amazing triology.'),
('champ@gmail.com', 'champ', 38, 10, 'Great things start from small instance and this movie was one of them.'),
('champ@gmail.com', 'champ', 39, 8, 'One more epic performance by RDJ.'),
('vish@gmail.com', 'vish', 11, 9, 'Great job by Rocking Star Yash.'),
('vish@gmail.com', 'vish', 15, 9, 'Great performance by entire crew.'),
('vish@gmail.com', 'vish', 17, 10, 'Superb debut by director.'),
('vish@gmail.com', 'vish', 18, 9, 'Great movie for movie lovers.'),
('vish@gmail.com', 'vish', 19, 8.5, 'Awesome movie.'),
('vish@gmail.com', 'vish', 26, 9, 'A must watch movie.'),
('vish@gmail.com', 'vish', 27, 10, 'No words to describe the movie. Just amazing.'),
('vish@gmail.com', 'vish', 28, 8, 'Nice Movie.'),
('vish@gmail.com', 'vish', 31, 9, 'This movie is just another level. Just amazing.'),
('vish@gmail.com', 'vish', 32, 8, 'Decent movie.'),
('vish@gmail.com', 'vish', 33, 9, 'Nice cat and mouse play.'),
('vish@gmail.com', 'vish', 34, 10, 'The best horror movie out there.'),
('vish@gmail.com', 'vish', 35, 9, 'Just as scary as part one.'),
('vish@gmail.com', 'vish', 36, 9.5, 'Just awesome.'),
('vish@gmail.com', 'vish', 37, 10, 'Just superb.'),
('vish@gmail.com', 'vish', 38, 10, 'Reason to be RDJ fan.'),
('vish@gmail.com', 'vish', 39, 9, 'Nice job by entire crew.');

-- --------------------------------------------------------

--
-- Structure for view `display_admin`
--
DROP TABLE IF EXISTS `display_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_admin`  AS SELECT `admin`.`email_id` AS `email_id`, `admin`.`fname` AS `fname`, `admin`.`lname` AS `lname`, `admin`.`phone_no` AS `phone_no`, `admin`.`username` AS `username`, `admin`.`password` AS `password`, `admin`.`admin_photo` AS `admin_photo` FROM `admin` ORDER BY `admin`.`fname` ASC, `admin`.`lname` ASC, `admin`.`email_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_artist`
--
DROP TABLE IF EXISTS `display_artist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_artist`  AS SELECT `artist`.`artist_id` AS `artist_id`, `artist`.`artist_name` AS `artist_name`, `artist`.`artist_gender` AS `artist_gender`, `artist`.`artist_photo` AS `artist_photo`, `artist`.`Active` AS `Active` FROM `artist` ORDER BY `artist`.`artist_name` ASC, `artist`.`artist_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_director`
--
DROP TABLE IF EXISTS `display_director`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_director`  AS SELECT `director`.`director_id` AS `director_id`, `director`.`director_name` AS `director_name`, `director`.`director_gender` AS `director_gender`, `director`.`director_photo` AS `director_photo`, `director`.`Active` AS `Active` FROM `director` ORDER BY `director`.`director_name` ASC, `director`.`director_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_language`
--
DROP TABLE IF EXISTS `display_language`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_language`  AS SELECT `language`.`language_id` AS `language_id`, `language`.`language_name` AS `language_name`, `language`.`language_photo` AS `language_photo`, `language`.`Active` AS `Active` FROM `language` ORDER BY `language`.`language_name` ASC, `language`.`language_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_movies`
--
DROP TABLE IF EXISTS `display_movies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_movies`  AS SELECT `m`.`movie_id` AS `movie_id`, `m`.`movie_name` AS `movie_name`, `m`.`movie_photo` AS `movie_photo`, `l`.`language_name` AS `language_name`, `d`.`director_name` AS `director_name`, `m`.`release_date` AS `release_date`, `m`.`movie_trailer` AS `movie_trailer`, `m`.`movie_carousel` AS `movie_carousel`, `m`.`movie_plot` AS `movie_plot`, `m`.`movie_collection` AS `movie_collection`, `m`.`imdb_rating` AS `imdb_rating`, `m`.`viewer_rating` AS `viewer_rating`, `m`.`Active` AS `Active` FROM ((`movies` `m` join `language` `l`) join `director` `d`) WHERE `m`.`movie_director_id` = `d`.`director_id` AND `m`.`movie_language_id` = `l`.`language_id` ORDER BY `m`.`movie_name` ASC, `m`.`movie_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_movie_cast`
--
DROP TABLE IF EXISTS `display_movie_cast`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_movie_cast`  AS SELECT `a`.`artist_id` AS `artist_id`, `a`.`artist_name` AS `artist_name`, `a`.`artist_photo` AS `artist_photo`, `m`.`movie_id` AS `movie_id`, `m`.`movie_name` AS `movie_name`, `m`.`movie_photo` AS `movie_photo`, `mc`.`Active` AS `Active` FROM ((`artist` `a` join `movies` `m`) join `movie_cast` `mc`) WHERE `a`.`artist_id` = `mc`.`artist_id` AND `m`.`movie_id` = `mc`.`movie_id` ORDER BY `m`.`movie_name` ASC, `a`.`artist_name` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_viewer_rating`
--
DROP TABLE IF EXISTS `display_viewer_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_viewer_rating`  AS SELECT `v`.`viewer_id` AS `viewer_id`, `v`.`viewer_name` AS `viewer_name`, `v`.`movie_id` AS `movie_id`, `m`.`movie_name` AS `movie_name`, `v`.`rating` AS `rating`, `v`.`comment` AS `comment` FROM (`viewer_rating` `v` join `movies` `m`) WHERE `v`.`movie_id` = `m`.`movie_id` ORDER BY `m`.`movie_name` ASC, `v`.`movie_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `display_website_rating`
--
DROP TABLE IF EXISTS `display_website_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_website_rating`  AS SELECT `rate_us`.`viewer_id` AS `viewer_id`, `rate_us`.`viewer_name` AS `viewer_name`, `rate_us`.`rating` AS `rating`, `rate_us`.`comment` AS `comment` FROM `rate_us` ORDER BY `rate_us`.`viewer_name` ASC, `rate_us`.`viewer_id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `movies_ibfk_1` (`movie_language_id`),
  ADD KEY `movies_ibfk_2` (`movie_director_id`);

--
-- Indexes for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD PRIMARY KEY (`artist_id`,`movie_id`),
  ADD KEY `movie_cast_ibfk_2` (`movie_id`);

--
-- Indexes for table `rate_us`
--
ALTER TABLE `rate_us`
  ADD PRIMARY KEY (`viewer_id`);

--
-- Indexes for table `viewer_rating`
--
ALTER TABLE `viewer_rating`
  ADD PRIMARY KEY (`viewer_id`,`movie_id`),
  ADD KEY `viewer_rating_ibfk_1` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `director_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`movie_language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`movie_director_id`) REFERENCES `director` (`director_id`) ON DELETE CASCADE;

--
-- Constraints for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD CONSTRAINT `movie_cast_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_cast_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movie_cast_ibfk_3` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`);

--
-- Constraints for table `viewer_rating`
--
ALTER TABLE `viewer_rating`
  ADD CONSTRAINT `viewer_rating_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
