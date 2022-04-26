-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2022 at 02:08 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homebasedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbadmins`
--

CREATE TABLE `dbadmins` (
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbadmins`
--

INSERT INTO `dbadmins` (`email`, `first_name`, `last_name`, `username`, `password`) VALUES
('none1', 'new', 'account', 'Admin', 'e3afed0047b08059d0fada10f400c1e5'),
('none', 'Admin', 'Admin', 'Admin7037806282', 'be6bef2c7a57bead38826deed4077d03'),
('email', 'Jennifer', 'Werme', 'JRW', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `dbadopters`
--

CREATE TABLE `dbadopters` (
  `first_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `opt_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbadopters`
--

INSERT INTO `dbadopters` (`first_name`, `last_name`, `email`, `opt_in`) VALUES
('Ariana', 'Tran', 'atran2@mail.umw.edu', 1),
('Jane', 'Doe', 'email3@gmail.c', 1),
('John', 'Doe', 'fakeemail@gmail.c', 1),
('New', 'Adopter', 'jgamer@gmail.c', 1),
('Jennifer', 'Werme', 'jwerme@mail.umw.edu', 1),
('Mary', 'Sue', 'msue@gmail.c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dbsubmissions`
--

CREATE TABLE `dbsubmissions` (
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `pet_type` varchar(100) DEFAULT NULL,
  `description` text,
  `pet_name` varchar(100) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `dateHighlighted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbsubmissions`
--

INSERT INTO `dbsubmissions` (`email`, `first_name`, `last_name`, `pet_type`, `description`, `pet_name`, `approved`, `image`, `id`, `dateHighlighted`) VALUES
('fakeemail5', 'Jane', 'Doe', 'Cat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Butterscotch', 1, 'cat-ge27c14279_1280.jpg62393e09c4cba', 3, '2022-04-18'),
('fakegmail', 'Mary', 'Sue', 'Dog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lucy', 1, 'picture624a4e0da93b4', 4, '2022-04-18'),
('gmail4', 'John', 'Doe', 'Cat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. hi\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Nelson', 1, 'black-cat-breeds.jpg6237be8b5be83', 5, '2022-04-18'),
('none', 'Jennifer', 'Werme', 'Dog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Little Bear', 1, 'picture625e338569d2c', 74, '2022-04-18'),
('fakeemail', 'John', 'Doe', 'Cat', 'lorem ipsum', 'Kitty', 1, 'picture625e33968a600', 75, '2022-04-16'),
('none', 'J', 'W', 'Dog', 'lorem ipsum', 'Milo', 1, 'picture625e36af64d45', 76, NULL),
('none', 'Lindsey', 'S', 'Bird', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Coco', 1, 'picture625e44cfd0370', 80, NULL),
('atran2@mail.umw.edu', 'Ariana', 'Tran', 'Dog', 'A very shy bird', 'Perri', 0, 'picture62641697295a1', 81, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbadmins`
--
ALTER TABLE `dbadmins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `dbadopters`
--
ALTER TABLE `dbadopters`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `dbsubmissions`
--
ALTER TABLE `dbsubmissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbsubmissions`
--
ALTER TABLE `dbsubmissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
