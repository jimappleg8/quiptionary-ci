-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2022 at 10:36 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `quiptionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) UNSIGNED NOT NULL,
  `verified` varchar(1) NOT NULL,
  `source_date` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `citation` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `verified`, `source_date`, `description`, `citation`, `author`, `source`) VALUES
(1, '0', '', 'Crosbie\'s Dictionary of Puns', '', 'John S. Crosbie', ''),
(2, '0', '', 'The Dictionary of Humorous Quotations', '', 'Evan Esar', ''),
(3, '0', '1911', 'The Devil\'s Dictionary', '', 'Ambrose Bierce', 'primary'),
(4, '0', '', 'The Complete Pun Book', '', 'Art Moger', ''),
(5, '0', '1970', 'The Wit of Women', '', 'Lore and Maurice Cowen', ''),
(6, '0', '', 'Words of Women', '', 'Francine Klangsburn', ''),
(7, '0', '', 'Riddles, Joke and Other Funny Things', '', 'Bill Gerler, et al.', ''),
(8, '0', '1946', 'A Treasury of Laughter', '', 'Louis Untermeyer', ''),
(9, '0', '', 'A Dictionary of Wit, Wisdom and Satire', '', 'Herbert Prochow, et al.', ''),
(10, '0', '1914', 'The Roycroft Dictionary', '', 'Elbert Hubbard', 'primary'),
(11, '0', '', 'Process and Thought in Composition', '', 'Frank J. D\'Angelo', ''),
(12, '0', '', 'menu', '', 'unknown', ''),
(13, '0', '', 'Reader\'s Digest: Toward More Picturesque Speech', '', 'various', 'secondary'),
(14, '0', '', 'Reader\'s Digest: Quotable Quotes', '', 'various', 'secondary'),
(15, '0', '', 'Reader\'s Digest: Miscellaneous', '', 'various', 'secondary'),
(16, '0', '', 'A Child\'s Garden of Misinformation', '', 'Art Linkletter', ''),
(17, '0', '', 'Playboy Magazine', '', 'various', ''),
(18, '0', '', 'Kids Say the Darndest Things', '', 'Art Linkletter', ''),
(19, '0', '', 'Hppiness is a Warm Puppy', '', 'Charles M. Schultz', 'primary'),
(20, '0', '', 'Christmas is Together Time', '', 'Charles M. Schultz', 'primary'),
(21, '0', '', 'Security is a Thumb and a Blanket', '', 'Charles M. Schultz', 'primary'),
(22, '0', '', 'Happiness is a Dry Martini', '', 'Johnny Carson', ''),
(23, '0', '', 'The Wall Street Journal', '', 'various', ''),
(24, '0', '', 'Quote Magazine', '', 'various', 'secondary'),
(25, '0', '', 'Bartlett\'s Familiar Quotations', '', 'various', 'secondary'),
(26, '0', '', 'The Holy Bible (King James Version)', '', 'various', 'primary'),
(27, '0', '', 'The Public Speaker\'s Treasury Chest', '', 'Herbert Prochow', ''),
(28, '0', '', 'Comic Dictionary', '', 'Evan Esar', ''),
(29, '0', '', 'A New Dictionary of Thoughts', '', 'various', ''),
(30, '0', '', 'A Speaker\'s Treasury for Sunday School Teachers', '', 'Herbert Prochow', ''),
(31, '0', '', 'A Raft of Riddles', '', 'Giulio Maestro', ''),
(32, '0', '', 'Boy\'s Life Magazine, Aug. 1983', '', 'various', ''),
(33, '0', '', 'Time Magazine', '', 'various', ''),
(34, '0', '', 'B.C. comic strip', '', 'Johnny Hart', ''),
(35, '0', '', 'The Nuclear Devil\'s Dictionary', '', 'James J. Farrell', ''),
(36, '0', '', 'Dictionary of Military and Navel Quotations', '', 'various', ''),
(37, '0', '', 'Webster\'s Unafraid Dictionary', '', 'Leonard L. Levinson', ''),
(38, '0', '', 'Funky Winkerbean comic strip', '', 'Batuik', ''),
(39, '0', '', 'The World\'s Worst Jokes', '', 'Al Boliska', ''),
(40, '0', '', 'The Stein and Day Dictionary of Definitive Quotations', '', 'Michael McKenna', ''),
(41, '0', '', 'Look to Your Stars', '', 'Louise Bacholder, ed.', ''),
(42, '0', '', 'The Dictionary According to Mommy', '', 'Joyce Armor', ''),
(43, '0', '', 'Dictionary', '', 'Samuel Johnson', ''),
(44, '0', '', 'On the Universe', '', 'Heraclitus', ''),
(45, '0', '', 'The Great Thoughts', '', 'George Seldes, ed.', ''),
(46, '0', '', 'Encyclopedia of Feminism', '', 'various', ''),
(47, '0', '', 'A Book of Burlesques', '', 'H.L. Mencken', ''),
(48, '0', '', 'A Mencken Chrestomathy', '', 'H.L. Mencken', ''),
(49, '0', '', 'Predudices, Third Series', '', 'H.L. Mencken', ''),
(50, '0', '', 'A Book of Prefaces', '', 'H.L. Mencken', ''),
(51, '0', '', 'Predudices, First Series', '', 'H.L. Mencken', ''),
(52, '0', '', 'The American Language', '', 'H.L. Mencken', ''),
(53, '0', '', 'The Unofficial College Dictionary', '', 'Larry Cohen and Steve Zweig', ''),
(54, '0', '', 'The Great Society Dictionary', '', 'Edward S. Herman', ''),
(55, '0', '', 'The Left-Handed Dictionary', '', 'Leonard L. Levinson', ''),
(56, '0', '', 'Boy\'s Life Magazine, May 1983', '', 'various', ''),
(57, '0', '', 'Boy\'s Life Magazine (unknown date)', '', 'various', ''),
(58, '0', '', 'Boy\'s Life Magazine, Apr. 1983', '', 'various', ''),
(59, '0', '', 'Boy\'s Life Magazine, Jan. 1983', '', 'various', ''),
(60, '0', '', 'Boy\'s Life Magazine, Jul. 1983', '', 'various', ''),
(61, '0', '', 'Boy\'s Life Magazine, May 1982', '', 'various', ''),
(62, '0', '', 'Boy\'s Life Magazine, Mar. 1986', '', 'various', ''),
(63, '0', '', 'Boy\'s Life Magazine, Mar. 1984', '', 'various', ''),
(64, '0', '', 'Boy\'s Life Magazine, Apr. 1984', '', 'various', ''),
(65, '0', '', 'Boy\'s Life Magazine, Mar. 1981', '', 'various', ''),
(66, '0', '', 'Boy\'s Life Magazine, Apr. 1979', '', 'various', ''),
(67, '0', '', 'Boy\'s Life Magazine, May 1979', '', 'various', ''),
(68, '0', '', 'Boy\'s Life Magazine, Nov. 1979', '', 'various', ''),

;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
