-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 06:23 AM
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
-- Database: `librarymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `author_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `author_name`) VALUES
(102, 'bhagat sinh'),
(125, 'Munshi Premchand'),
(1000, 'J.K. Rowling'),
(1001, 'George Orwell'),
(1002, 'J.R.R. Tolkien'),
(1003, 'Jane Austen'),
(1004, 'Mark Twain'),
(1005, 'Ernest Hemingway'),
(1006, 'Agatha Christie'),
(1007, 'Stephen King'),
(1008, 'Leo Tolstoy'),
(1009, 'Charles Dickens'),
(2258, 'Dontno'),
(2259, 'author2');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `ID` int(11) NOT NULL,
  `bookID` int(11) DEFAULT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `booksID` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `authorID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `book_price` int(11) NOT NULL,
  `issueCount` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`booksID`, `book_name`, `authorID`, `catID`, `quantity`, `book_price`, `issueCount`) VALUES
(232, 'test', 102, 343, 3, 53, 3),
(257, 'test', 102, 343, 4, 53, 3),
(258, 'test', 102, 343, 4, 53, 3),
(260, 'test', 102, 343, 4, 53, 3),
(261, 'test', 102, 343, 4, 53, 3),
(262, 'test', 102, 343, 4, 53, 3),
(263, 'test', 102, 343, 4, 53, 3),
(264, 'test', 102, 343, 4, 53, 3),
(265, 'test', 102, 343, 4, 53, 3),
(266, 'test', 102, 343, 4, 53, 3),
(267, 'test', 102, 343, 4, 53, 3),
(268, 'test', 102, 343, 4, 53, 3),
(269, 'test', 102, 343, 4, 53, 3),
(270, 'test', 102, 343, 4, 53, 3),
(271, 'test', 102, 343, 4, 53, 3),
(276, 'test', 102, 343, 4, 53, 3),
(277, 'test', 102, 343, 4, 53, 3),
(278, 'test', 102, 343, 4, 53, 3),
(279, 'test', 102, 343, 4, 53, 3),
(280, 'test', 102, 343, 4, 53, 3),
(281, 'test', 102, 343, 4, 53, 3),
(282, 'test', 102, 343, 4, 53, 3),
(284, 'test', 102, 343, 4, 53, 3),
(285, 'test', 102, 343, 4, 53, 3),
(286, 'test', 102, 343, 4, 53, 3),
(295, 'harmit', 2258, 2010, 4, 5464, 0),
(296, 'harmit', 2259, 2018, 1, 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `cat_name`) VALUES
(343, 'autobiography'),
(2000, 'Fiction'),
(2001, 'Non-Fiction'),
(2002, 'Mystery'),
(2003, 'Science Fiction'),
(2004, 'Biography'),
(2005, 'Fantasy'),
(2006, 'History'),
(2007, 'Romance'),
(2008, 'Thriller'),
(2009, 'Self-Help'),
(2010, 'Mech'),
(2011, 'Mech'),
(2012, 'Mech'),
(2013, 'Mech'),
(2014, 'Mech'),
(2015, 'Mech'),
(2016, 'Mech'),
(2017, 'Mech'),
(2018, 'cafd');

-- --------------------------------------------------------

--
-- Table structure for table `issued_book`
--

CREATE TABLE `issued_book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `studentID` int(11) NOT NULL,
  `status` enum('issued','returned','due','requested') NOT NULL,
  `issue_date` text NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_book`
--

INSERT INTO `issued_book` (`id`, `book_id`, `book_name`, `studentID`, `status`, `issue_date`, `return_date`) VALUES
(1, 232, 'helen keller', 2, 'issued', '07-02-2025', '0000-00-00'),
(3, 243, 'test', 61, 'requested', '0000-00-00', '0000-00-00'),
(4, 257, 'test', 62, 'issued', '06-02-2025', '0000-00-00'),
(5, 258, 'test', 62, 'issued', '06-02-2025', '0000-00-00'),
(6, 262, 'test', 62, 'issued', '06-02-2025', '0000-00-00'),
(7, 259, 'test', 62, 'requested', '06-02-2025', '0000-00-00'),
(8, 268, 'test', 64, 'issued', '07-02-2025', '0000-00-00'),
(9, 232, 'test', 64, 'issued', '07-02-2025', '0000-00-00'),
(10, 265, 'test', 64, 'issued', '07-02-2025', '0000-00-00'),
(11, 267, 'test', 64, 'requested', '07-02-2025', '0000-00-00'),
(12, 232, 'test', 27, 'issued', '07-02-2025', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `email`, `password`, `mobileno`, `address`) VALUES
(27, 1, 'test', 'admin@admin.com', '1234', 3523535, 'estadsftwer'),
(64, 0, 'Harmit', 'harmit@user.com', '1234', 12345678, '32 testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `fk_catID` (`catID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`booksID`),
  ADD KEY `authorID` (`authorID`),
  ADD KEY `catID` (`catID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2260;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `booksID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019;

--
-- AUTO_INCREMENT for table `issued_book`
--
ALTER TABLE `issued_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD CONSTRAINT `bookID` FOREIGN KEY (`bookID`) REFERENCES `books` (`booksID`),
  ADD CONSTRAINT `fk_catID` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `authorID` FOREIGN KEY (`authorID`) REFERENCES `authors` (`authorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catID` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
