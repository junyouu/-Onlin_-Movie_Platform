-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 04:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'staff', 'staff'),
(2, 'staff2', 'staff2');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `user_id`) VALUES
(1, 6),
(2, 7),
(3, 8),
(4, 9),
(5, 10),
(6, 11),
(7, 12),
(8, 13),
(9, 14),
(10, 15),
(11, 16),
(12, 17),
(13, 18),
(14, 19),
(15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `history_movie`
--

CREATE TABLE `history_movie` (
  `history_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_movie`
--

INSERT INTO `history_movie` (`history_id`, `movie_id`, `timestamp`) VALUES
(1, 9, '2024-04-13 11:13:46'),
(1, 12, '2024-04-10 19:39:12'),
(1, 15, '2024-04-09 13:24:47'),
(1, 16, '2024-04-10 19:40:36'),
(1, 17, '2024-04-10 19:38:43'),
(1, 18, '2024-04-10 12:59:02'),
(1, 32, '2024-04-12 07:29:53'),
(1, 33, '2024-04-12 07:31:47'),
(1, 37, '2024-04-11 13:42:13'),
(1, 39, '2024-04-13 11:13:29'),
(1, 43, '2024-04-12 10:17:13'),
(4, 33, '2024-04-11 08:39:28'),
(5, 43, '2024-04-11 10:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `login_id` int(11) NOT NULL,
  `login_name` varchar(20) NOT NULL,
  `login_password` varchar(16) NOT NULL,
  `subscription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`login_id`, `login_name`, `login_password`, `subscription`) VALUES
(1, 'junyou', 'junyou1234', 'individual'),
(4, 'junyou2', 'junyou2', 'individual'),
(5, 'kids', 'kids', 'individual'),
(7, 'testing', 'testing', 'individual'),
(8, 'family', 'family', 'family'),
(9, 'pls', 'pls', 'individual'),
(10, 'try', 'try', 'individual'),
(11, 'marcus', 'marcus', ''),
(12, 'marcus', 'marcus', ''),
(13, 'marcus', 'marcus', ''),
(14, 'marcus', 'marcus', ''),
(15, 'marcus', 'marcus', ''),
(16, 'marcus', 'marcus', 'individual'),
(20, 'romance', 'romance', 'individual'),
(21, 'science', 'science', 'individual'),
(22, 'tryyy', 'tryyy', 'individual'),
(23, 'debug', 'debug', 'individual'),
(24, 'debug2', 'debug2', 'individual'),
(25, 'debug 3', 'debug3', 'individual'),
(29, 'tryyyy', 'try', 'individual'),
(30, 'debug4', 'debug4', 'family'),
(31, 'debug5', 'debug5', 'family'),
(32, 'junyou1234', 'junyou1234', 'family'),
(33, 'password', 'password', 'family');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `genre` varchar(30) NOT NULL,
  `info` text NOT NULL,
  `date` date NOT NULL,
  `length` varchar(10) NOT NULL,
  `poster_url` text NOT NULL,
  `image_url` text NOT NULL,
  `movie_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `genre`, `info`, `date`, `length`, `poster_url`, `image_url`, `movie_url`) VALUES
(6, 'Finding Nemo', 'For Kids', 'After his son is captured in the Great Barrier Reef and taken to Sydney, a timid clownfish sets out on a journey to bring him home.', '2003-05-18', '1h 40m', 'IMG-6613ae3037cd75.16632881.jpg', 'IMG-6613ae3037ec69.73163540.jpg', 'VID-6613ae30380325.39560848.mp4'),
(7, 'Zootopia', 'For Kids ', 'In a city of anthropomorphic animals, a rookie bunny cop and a cynical con artist fox must work together to uncover a conspiracy.', '2016-03-03', '1h 48m', 'IMG-6613af85c1d406.90279368.jpeg', 'IMG-6613af85c1f7d8.10151987.jpg', 'VID-6613af85c20c84.57676462.mp4'),
(9, 'Ratatouille', 'For Kids ', 'A rat who can cook makes an unusual alliance with a young kitchen worker at a famous Paris restaurant.', '2007-06-28', '1h 51m', 'IMG-6613b35fec9a85.43726894.jpeg', 'IMG-6613b35fecbd74.93932078.jpg', 'VID-6613b35fecdc60.65619332.mp4'),
(10, 'Toy Story 3', 'For Kids ', 'The toys are mistakenly delivered to a day-care center instead of the attic right before Andy leaves for college, and it is up to Woody to convince the other toys that they were not abandoned and to return home.', '2010-06-17', '1h 43m', 'IMG-6613b45bb2ce09.59438760.jpg', 'IMG-6613b45bb2eef4.38065433.jpg', 'VID-6613b45bb30b63.45858493.mp4'),
(12, 'Kung Fu Panda 4', 'For Kids ', 'After Po is tapped to become the Spiritual Leader of the Valley of Peace, he needs to find and train a new Dragon Warrior, while a wicked sorceress plans to re-summon all the master villains whom Po has vanquished to the spirit realm.', '2024-03-08', '1h 34m', 'IMG-6613b5b4ad80c5.21153400.jpg', 'IMG-6613b5b4ada8b2.58174988.jpg', 'VID-6613b5b4adc716.70215545.mp4'),
(15, 'Chicken Run', 'For Kids ', 'Having pulled off an escape from Tweedy farm, Ginger has found a peaceful island sanctuary for the whole flock. But back on the mainland the whole of chicken-kind faces a new threat, and Ginger and her team decide to break in.', '2023-12-08', '1h 41m', 'IMG-6613b8a4d75d34.07012849.jpg', 'IMG-6613b8a4d77cb4.75867282.jpg', 'VID-6613b8a4d79555.47678671.mp4'),
(16, 'Mummies', 'For Kids ', 'It follows three mummies as they end up in present-day London and embark on a journey in search of an old ring belonging to the Royal Family, stolen by the ambitious archaeologist Lord Carnaby.', '2023-02-24', '1h 28m', 'IMG-6613b9ee1278a8.83425150.jpg', 'IMG-6613b9ee129655.72050329.jpg', 'VID-6613b9ee12aa03.68319803.mp4'),
(17, 'The Super Mario Bros. Movie', 'For Kids ', 'A plumber named Mario travels through an underground labyrinth with his brother Luigi, trying to save a captured princess.', '2023-04-20', '1h 32m', 'IMG-6613bb08dce420.50363996.jpg', 'IMG-6613bb08dd06c5.39721612.jpg', 'VID-6613bb08dd1e47.27758863.mp4'),
(18, 'The Magician Elephant', 'For Kids ', 'An orphaned boy is told by a fortune teller that an elephant will help him find his lost sister.', '2023-03-10', '1h 43m', 'IMG-6613bbcb9c71a5.65652812.jpg', 'IMG-6613bbcb9c9255.19690189.webp', 'VID-6613bbcb9ca7d8.85434820.mp4'),
(19, 'How to Train Your Dragon', 'For Kids ', 'When Hiccup discovers Toothless is not the only Night Fury, he must seek the Hidden World, a secret Dragon Utopia before a hired tyrant named Grimmel finds it first.', '2019-01-31', '1h 44m', 'IMG-66164bcd9d7ff8.85398627.jpg', 'IMG-66164bcd9e0529.19232606.jpg', 'VID-66164bcd9e6d25.69349148.mp4'),
(21, 'Flipped', 'Romance ', 'Bryce and Juli first meet as children, with Juli having a crush on Bryce, and as they mature, it appears their bond may blossom in something more.', '2010-08-06', '1h 30m', 'IMG-6617963a86a9e8.14683009.jpg', 'IMG-6617963a871ae2.57472174.jpg', 'VID-6617963a875483.86202582.mp4'),
(23, 'Through My Window', 'Romance ', 'Raquel longtime crush on her next-door neighbor turns into something more when he starts developing feelings for her, despite his family objections.', '2022-02-04', '1h 56m', 'IMG-66179aa7388808.78335786.jpg', 'IMG-66179aa738cc05.09715092.jpg', 'VID-66179aa7391222.50739811.mp4'),
(31, 'About Time', 'Romance', 'At the age of 21, Tim discovers he can travel in time and change what happens and has happened in his own life. His decision to make his world a better place by getting a girlfriend turns out not to be as easy as you might think.', '2013-08-08', '2h 3m', 'IMG-66179be53b0229.18021579.jpg', 'IMG-66179e5a123193.96435793.jpg', 'VID-66179be53bcb00.57656228.mp4'),
(32, 'Five Feet Apart', 'Romance ', 'A pair of teenagers with cystic fibrosis meet in a hospital and fall in love, though their disease means they must avoid close physical contact.', '2019-03-15', '1h 57m', 'IMG-66179ce77e8a94.13316708.jpg', 'IMG-66179ce77ed464.53448282.jpg', 'VID-66179ce77f19a8.71083437.mp4'),
(33, 'I Belonged to You', 'Romance', 'A recently dumped radio host finds a new perspective on love when a young intern begins to work with him on his show.', '2016-09-29', '1h 52m', 'IMG-6617a0c34508b7.31820280.jpg', 'IMG-6617a0c345c164.31575338.jpg', 'VID-6618e34f44b952.18338559.mp4'),
(34, 'Aquaman and the Lost Kingdom', 'Superhero ', 'Black Manta seeks revenge on Aquaman for his father death. Wielding the Black Trident power, he becomes a formidable foe. To defend Atlantis, Aquaman forges an alliance with his imprisoned brother. They must protect the kingdom.', '2023-12-20', '1h 55m', 'IMG-6617a3d0751a08.70579899.jpg', 'IMG-6617a3d075e372.41982133.jpg', 'VID-6617a3d0763bd0.63975582.mp4'),
(35, 'Avengers: Endgame', 'Superhero ', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', '2019-04-24', '3h 2m', 'IMG-6617a5722c2e63.81428909.jpg', 'IMG-6617a5722c9528.60190755.jpg', 'VID-6617a5722cd305.39852176.mp4'),
(36, 'Doctor Strange', 'Superhero ', 'While on a journey of physical and spiritual healing, a brilliant neurosurgeon is drawn into the world of the mystic arts.', '2016-10-27', '1h 55m', 'IMG-6617a6ed5e4515.05441705.jpg', 'IMG-6617a6ed5f25e8.72584692.jpg', 'VID-6617a6ed5f9ea7.46237468.mp4'),
(37, 'Iron Man 3', 'Superhero ', 'When Tony Stark world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', '2013-04-26', '2h 10m', 'IMG-6617a97dcf8b67.95830663.jpg', 'IMG-6617a97dd02766.29944111.jpg', 'VID-6617a97dd0ae45.21016693.mp4'),
(38, 'Thor: Ragnarok', 'Superhero ', 'Imprisoned on the planet Sakaar, Thor must race against time to return to Asgard and stop Ragnarök, the destruction of his world, at the hands of the powerful and ruthless villain Hela.', '2017-11-03', '2h 10m', 'IMG-6617aa9e2baa47.12487037.jpg', 'IMG-6617aa9e2c1162.11881927.avif', 'VID-6617aa9e2c7d34.75285384.mp4'),
(39, 'I Miss You', 'Romance', ' The pair fall in love and date, but marriage seems impossible when they come from such different worlds. Bai Xiao Yu fears he will lose Jin Jin once again like before.', '2024-03-08', '1h 52m', 'IMG-6617b0f9895cb6.47865472.jpg', 'IMG-6617b064195ab3.96880563.jpg', 'VID-6617b06419e380.42564579.mp4'),
(40, 'Interstellar', 'Science Fiction ', 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', '2014-11-06', '2h 49m', 'IMG-6617b49df2e072.37397991.jpg', 'IMG-6617b49df396c0.19875807.webp', 'VID-6617b49e008334.69345974.mp4'),
(41, 'Ready Player One', 'Science Fiction ', 'When the creator of a virtual reality called the OASIS dies, he makes a posthumous challenge to all OASIS users to find his Easter Egg, which will give the finder his fortune and control of his world.', '2018-03-29', '2h 20m', 'IMG-6617b71bec4548.35516331.jpg', 'IMG-6617b71bed27a5.11425543.jpg', 'VID-6617b71bedb954.80852931.mp4'),
(42, 'Inception', 'Science Fiction ', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', '2010-07-15', '2h 28m', 'IMG-6617b8bb14afa7.89813231.jpg', 'IMG-6617b8bb14f040.32810593.jpg', 'VID-6617b8bb154146.10809140.mp4'),
(43, 'Dune: Part Two', 'Science Fiction ', 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.', '2024-02-29', '2h 46m', 'IMG-6617b9a375ee92.31304471.jpg', 'IMG-6617b9a3764a60.48313446.webp', 'VID-6617b9a376bbf4.51059183.mp4'),
(46, 'Godzilla x Kong: The New Empire', 'Science Fiction ', 'Two ancient titans, Godzilla and Kong, clash in an epic battle as humans unravel their intertwined origins and connection to Skull Island mysteries.', '2024-03-28', '1h 55m', 'IMG-6617c093594604.29212196.jpg', 'IMG-6617c093599a07.37444277.avif', 'VID-6617c09359cce2.11245488.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_star` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_star`, `user_id`, `movie_id`) VALUES
(1, 5, 1, 9),
(6, 1, 1, 17),
(7, 3, 1, 12),
(8, 2, 1, 12),
(9, 3, 1, 12),
(10, 3, 1, 12),
(11, 3, 1, 12),
(12, 4, 1, 12),
(13, 2, 1, 12),
(14, 3, 1, 12),
(15, 3, 1, 12),
(16, 1, 1, 12),
(17, 4, 6, 12),
(18, 4, 6, 9),
(19, 5, 6, 39),
(20, 5, 12, 9),
(21, 3, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `movie_id`, `user_id`, `review_text`) VALUES
(1, 6, 1, 'good movie'),
(2, 6, 1, 'i like it\r\n'),
(3, 6, 1, 'good video'),
(4, 6, 1, 'good video'),
(5, 6, 1, ''),
(6, 6, 1, 'good video'),
(7, 6, 1, 'good video'),
(10, 6, 1, 'what dafak'),
(11, 6, 1, 'good video'),
(12, 12, 1, 'good video'),
(13, 12, 6, 'good video'),
(14, 6, 5, 'brilliant'),
(15, 39, 6, 'love it');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `profile_name` varchar(20) NOT NULL,
  `profile_password` varchar(16) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_phone_num` text NOT NULL,
  `user_email` text NOT NULL,
  `user_preferences` varchar(30) DEFAULT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `profile_name`, `profile_password`, `user_age`, `user_phone_num`, `user_email`, `user_preferences`, `login_id`) VALUES
(1, 'junyou', 'junyou1234', 18, '01999999', 'junyou041129@gmail.com', 'For Kids', 1),
(4, 'junyou2', 'junyou2', 18, '01999999', 'junyou041129@gmail.com', 'Science Fiction', 4),
(5, 'kids', 'kids', 11, '01999999', 'junyou041129@gmail.com', 'For Kids', 5),
(6, 'testing', 'testing', 18, '01999999', 'junyou041129@gmail.com', 'Superhero', 7),
(7, 'family', 'family', 18, '01999999', 'junyou041129@gmail.com', 'Superhero', 8),
(8, 'pls', 'pls', 18, '01999999', 'junyou041129@gmail.com', 'Science Fiction', 9),
(9, 'romance', 'romance', 18, '01999999', 'junyou041129@gmail.com', 'Romance', 20),
(10, 'science', 'science', 18, '01999999', 'junyou041129@gmail.com', 'Science Fiction', 21),
(11, 'tryyy', 'tryyy', 18, '01999999', 'junyou041129@gmail.com', 'Superhero', 22),
(12, 'debug', 'debug', 11, '01999999', 'junyou041129@gmail.com', 'For Kids', 23),
(13, 'debug2', 'debug2', 18, '01999999', 'junyou041129@gmail.com', 'Romance', 24),
(14, 'debug 3', 'debug3', 18, '01999999', 'junyou041129@gmail.com', 'Science Fiction', 25),
(15, 'tryyyy', 'try', 12, '0199396826', 'junyou041129@gmail.com', 'For Kids', 29),
(16, 'debug4', '123456', 18, '0199396826', 'junyou041129@gmail.com', 'Romance', 30),
(17, 'junyou profile', '', 18, '0199396826', 'junyou041129@gmail.com', 'Romance', 32),
(18, 'junyou2', '', 18, '0199396826', 'junyou041129@gmail.com', 'Romance', 8),
(19, 'password', '', 18, '0199396826', 'junyou041129@gmail.com', 'Romance', 33),
(20, 'password2', '123456', 18, '0199396826', 'junyou041129@gmail.com', 'Romance', 33);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchlist_id`, `user_id`) VALUES
(1, 6),
(2, 7),
(3, 8),
(4, 9),
(5, 10),
(6, 11),
(7, 12),
(8, 13),
(9, 14),
(10, 15),
(11, 16),
(12, 17),
(13, 18),
(14, 19),
(15, 20);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist_movie`
--

CREATE TABLE `watchlist_movie` (
  `watchlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist_movie`
--

INSERT INTO `watchlist_movie` (`watchlist_id`, `movie_id`, `timestamp`) VALUES
(1, 9, '2024-04-09 12:46:16'),
(1, 12, '2024-04-08 20:07:51'),
(1, 15, '2024-04-09 08:23:14'),
(1, 17, '2024-04-08 20:07:21'),
(1, 18, '2024-04-09 08:23:46'),
(1, 33, '2024-04-12 19:11:16'),
(1, 34, '2024-04-11 13:48:57'),
(1, 39, '2024-04-12 19:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `history_movie`
--
ALTER TABLE `history_movie`
  ADD PRIMARY KEY (`history_id`,`movie_id`),
  ADD KEY `history_movie_ibfk_2` (`movie_id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_ibfk_1` (`movie_id`),
  ADD KEY `review_ibfk_2` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchlist_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `watchlist_movie`
--
ALTER TABLE `watchlist_movie`
  ADD PRIMARY KEY (`watchlist_id`,`movie_id`),
  ADD KEY `watchlist_movie_ibfk_1` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_credentials`
--
ALTER TABLE `login_credentials`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`user_id`);

--
-- Constraints for table `history_movie`
--
ALTER TABLE `history_movie`
  ADD CONSTRAINT `history_movie_ibfk_1` FOREIGN KEY (`history_id`) REFERENCES `history` (`history_id`),
  ADD CONSTRAINT `history_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`user_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login_credentials` (`login_id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`user_id`);

--
-- Constraints for table `watchlist_movie`
--
ALTER TABLE `watchlist_movie`
  ADD CONSTRAINT `watchlist_movie_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watchlist_movie_ibfk_2` FOREIGN KEY (`watchlist_id`) REFERENCES `watchlist` (`watchlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
