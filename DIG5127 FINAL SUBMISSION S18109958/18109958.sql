-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 10:08 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `18109958`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actorID` int(10) NOT NULL,
  `actorFName` varchar(50) NOT NULL,
  `actorSName` varchar(50) NOT NULL,
  `actorDOB` date DEFAULT NULL,
  `actorImg` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actorID`, `actorFName`, `actorSName`, `actorDOB`, `actorImg`) VALUES
(1, 'Natalie', 'Portman', '1981-06-09', 'natalie_portman.jpg'),
(2, 'Jennifer Jason', 'Leigh', '1962-02-05', 'jennifer_jason_leigh.jpg'),
(3, 'Sam', 'Neill', '1947-09-14', 'sam_neill.jpg'),
(4, 'Julie', 'Carmen', '1954-04-04', 'julie_carmen.jpg'),
(5, 'Kurt', 'Russell', '1951-03-17', 'kurt_russell.jpg'),
(6, 'Keith', 'David', '1956-06-04', 'keith_david.jpg'),
(7, 'Elijah', 'Wood', '1981-01-28', 'elijah_wood.jpg'),
(8, 'Collin', 'Dean', '2005-01-08', 'collin_dean.jpg'),
(9, 'Benedict', 'Wong', '1971-07-03', 'benedict_wong.jpg'),
(14, 'Oscar', 'Isaac', '1979-03-09', 'MV5BMTQ2ODE2NDQ5OF5BMl5BanBnXkFtZTcwOTU3OTM1OQ@@._V1_SY1000_CR0,0,710,1000_AL_.jpg'),
(15, 'Jennifer', 'Aniston', '1969-02-11', 'JenniferAnistonHWoFFeb2012.jpg'),
(16, 'Matt', 'LeBlanc', '1967-07-25', 'X_217c5312.jpg'),
(17, 'Courteney', 'Cox', '1964-06-15', 'CourteneyCoxFeb09.jpg'),
(19, 'Matthew', 'Perry', '1969-08-19', '330px-Matthew_Perry_2013.jpg'),
(20, 'David', 'Schwimmer', '1966-11-02', '330px-David_Schwimmer_2011.jpg'),
(21, 'Lisa', 'Kudrow', '1963-07-30', '330px-Lisa_Kudrow_at_TIFF_2009.jpg'),
(22, 'Andrea', 'Anders', '1975-05-10', '304114_v9_bb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `characterID` int(10) NOT NULL,
  `characterName` varchar(50) NOT NULL,
  `actorID` int(10) NOT NULL,
  `movieID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`characterID`, `characterName`, `actorID`, `movieID`) VALUES
(1, 'Lena', 1, 1),
(2, 'Dr Ventress', 2, 1),
(3, 'John Trent', 3, 2),
(4, 'Linda Styles', 4, 2),
(5, 'MacReady', 5, 3),
(6, 'Childs', 6, 3),
(7, 'Wirt', 7, 4),
(8, 'Gregory', 8, 4),
(14, 'Lomax', 9, 1),
(15, 'Kane', 14, 1),
(16, 'Rachel Green', 15, 10),
(17, 'Joey Tribbiani', 16, 10),
(23, 'Monica Geller', 17, 10),
(25, 'Chandler Bing', 19, 10),
(26, 'Ross Geller', 20, 10),
(27, 'Phoebe Buffay', 21, 10),
(28, 'Joey Tribbiani', 16, 15),
(29, 'Alex Garret', 22, 15);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `directorID` int(10) NOT NULL,
  `directorFName` varchar(50) NOT NULL,
  `directorSName` varchar(50) NOT NULL,
  `directorDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`directorID`, `directorFName`, `directorSName`, `directorDOB`) VALUES
(1, 'Alex', 'Garland', '1970-05-26'),
(2, 'John', 'Carpenter', '1948-02-16'),
(3, 'Patrick', 'McHale', '1983-11-17'),
(4, 'David', 'Crane', '1957-08-13'),
(6, 'Shana', 'Goldberg-Meehan', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreID` int(10) NOT NULL,
  `genreName` varchar(50) NOT NULL,
  `genreDesc` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `genreName`, `genreDesc`) VALUES
(1, 'Adventure', 'Adventure films are a genre of film that typically use their action scenes to display and explore exotic locations in an energetic way.'),
(2, 'Drama', 'In film and television, drama is a genre of narrative fiction (or semi-fiction) intended to be more serious than humorous in tone.'),
(3, 'Horror', 'A horror film is a film that seeks to elicit fear for entertainment purposes.'),
(4, 'Mystery', 'A mystery film is a genre of film that revolves around the solution of a problem or a crime. It focuses on the efforts of the detective, private investigator or amateur lsleuth to solve the mysterious circumstances of an issue by means of clues, investigation, and clever deduction. '),
(5, 'Sci-Fi', 'Science fiction film (or sci-fi film) is a genre that uses speculative, fictional science-based depictions of phenomena that are not fully accepted by mainstream science, such as extraterrestrial life'),
(6, 'Thriller', 'Thriller film, also known as suspense film or suspense thriller, is a broad film genre that evokes excitement and suspense in the audience.'),
(7, 'Animation', 'Animation is a method in which pictures are manipulated to appear as moving images. In traditional animation, images are drawn or painted by hand on transparent celluloid sheets to be photographed and exhibited on film. Today, most animations are made with computer-generated imagery (CGI).'),
(8, 'Family', 'A children\'s film, or family film, is a film genre that contains children or relates to them in the context of home and family. Children\'s films are made specifically for children and not necessarily for the general audience, while family films are made for a wider appeal with a general audience in mind.'),
(9, 'Romance', 'Romance films or romance movies are romantic love stories recorded in visual media for broadcast in theaters and on TV that focus on passion, emotion, and the affectionate romantic involvement of the main characters and the journey that their love takes them through dating, courtship or marriage.'),
(10, 'Comedy', 'A comedy film is a genre of film in which the main emphasis is on humor.');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movieID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `studioID` int(10) NOT NULL,
  `directorID` int(10) NOT NULL,
  `year` int(4) NOT NULL,
  `runTime` int(10) NOT NULL,
  `score` double DEFAULT NULL,
  `plot` varchar(500) DEFAULT NULL,
  `movieImg` varchar(200) NOT NULL,
  `classification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movieID`, `name`, `studioID`, `directorID`, `year`, `runTime`, `score`, `plot`, `movieImg`, `classification`) VALUES
(1, 'Annihilation', 1, 1, 2018, 115, 7, 'A biologist signs up for a dangerous, secret expedition into a mysterious zone where the laws of nature don\'t apply. ', 'annihilation_poster.jpg', 'movie'),
(2, 'In the Mouth of Madness', 2, 2, 1994, 95, 7.2, 'An insurance investigator begins discovering that the impact a horror writer\'s books have on his fans is more than inspirational. ', 'in_the_mouth_of_madness_poster.jpg', 'movie'),
(3, 'The Thing', 3, 2, 1982, 109, 8.1, 'A research team in Antarctica is hunted by a shape-shifting alien that assumes the appearance of its victims. ', 'the_thing_poster.jpg', 'movie'),
(4, 'Over the Garden Wall', 4, 3, 2014, 10, 8.8, 'Two brothers find themselves lost in a mysterious land and try to find their way home.', 'over_the_garden_wall_poster.jpg', 'tv'),
(10, 'Friends', 5, 4, 1994, 236, 9, 'Follows the personal and professional lives of six twenty to thirty something year old friends living in Manhattan. ', 'MV5BNDVkYjU0MzctMWRmZi00NTkxLTgwZWEtOWVhYjZlYjllYmU4XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg', 'TV'),
(15, 'Joey', 5, 6, 2004, 46, 6, 'In this spin off of Friends (1994), Joey Tribbiani moves to Los Angeles to pursue his acting career. ', 'MV5BMTAxNTYzMTQyNDBeQTJeQWpwZ15BbWU3MDk3MTA3MjE@._V1_.jpg', 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movieID` int(10) NOT NULL,
  `genreID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`movieID`, `genreID`) VALUES
(2, 2),
(2, 3),
(2, 4),
(2, 6),
(3, 3),
(3, 4),
(3, 5),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 6),
(4, 7),
(4, 8),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(10, 9),
(10, 10),
(15, 9),
(15, 10),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 7),
(17, 8),
(17, 9),
(17, 10),
(16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_writer`
--

CREATE TABLE `movie_writer` (
  `movieID` int(10) NOT NULL,
  `writerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_writer`
--

INSERT INTO `movie_writer` (`movieID`, `writerID`) VALUES
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(11, 1),
(12, 1),
(13, 1),
(13, 1),
(14, 1),
(15, 1),
(1, 2),
(1, 1),
(1, 0),
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(10, 7),
(10, 8),
(10, 0),
(15, 10),
(15, 11),
(17, 1),
(17, 2),
(16, 3),
(16, 12);

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `studioID` int(10) NOT NULL,
  `studioName` varchar(50) DEFAULT NULL,
  `studioAddress` varchar(200) DEFAULT NULL,
  `yearFounded` int(11) NOT NULL,
  `founder` varchar(500) DEFAULT NULL,
  `people` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`studioID`, `studioName`, `studioAddress`, `yearFounded`, `founder`, `people`) VALUES
(1, 'Paramount Pictures', '5555 Melrose Avenue, Hollywood, California, United States', 1912, 'Adolph Zukor, William Wadsworth Hodkinson, Jesse L. Lasky', 'Jim Gianopulos, Andrew Gumpert'),
(2, 'New Line Cinema', '4000 Warner Blvd, Burbank, California\r\n, United States', 1967, 'Robert Shaye, Michael Lynne', 'Carolyn Blackwood, Richard Brener'),
(3, 'Universal Pictures', '10 Universal City Plaza, Universal City, California\r\n, United States', 1912, 'Carl Laemmle, Pat Powers, David Horsley, William Swanson, Mark Dintenfass, Charles Baumann, Robert H. Cochrane, Adam Kessel, Jules Brulatour', 'Donna Langley, Jimmy Horowitz, Jeff Shell'),
(4, 'Cartoon Network Studios', '300 N 3rd St., Burbank, California\r\n, United States', 1994, 'Hanna-Barbera', 'Mark Costa, Brian A. Miller, Jennifer Pelphrey, Rob Sorcher, Tramm Wigzell'),
(5, 'Warner Bros. Television', '4000 Warner Boulevard, Burbank, California , U.S.', 1955, 'Jack L. Warner, Harry Warner, Sam Warner, Albert Warner', 'Peter Roth, Brett A. Paul');

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `writerID` int(10) NOT NULL,
  `writerFName` varchar(50) NOT NULL,
  `writerSName` varchar(50) NOT NULL,
  `writerDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`writerID`, `writerFName`, `writerSName`, `writerDOB`) VALUES
(1, 'Alex', 'Garland', '1970-05-26'),
(2, 'Jeff', 'Vandermeer', '1968-07-07'),
(3, 'Michael', 'De Luca', '1965-08-13'),
(4, 'Bill', 'Lancaster', '1947-11-17'),
(5, 'John W.', 'Campbell', '1910-06-11'),
(6, 'Patrick', 'McHale', '1983-11-17'),
(7, 'David', 'Crane', '1957-08-13'),
(8, 'Marta', 'Kauffman', '1956-09-21'),
(10, 'Shana', 'Goldberg-Meehan', '1970-01-01'),
(11, 'Scott', 'Silveri', '1970-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actorID`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`characterID`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`directorID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieID`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`studioID`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`writerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `actorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `characterID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `directorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `studioID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `writerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
