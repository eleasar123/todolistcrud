-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 12:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `noteId` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Body` text NOT NULL,
  `Status` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`noteId`, `Title`, `Body`, `Status`, `created_at`) VALUES
(2, 'Things to do Tonight', 'Hello World\r\n\r\nJeasjdfjflsadjf\r\nahfgskjdhgafh\r\ngnfcmkmnvmoiregjhg', 'Done', '2021-05-06 16:11:52'),
(3, 'Hello World', 'gfasfdgf', 'Done', '2021-05-07 15:54:47'),
(4, 'Do homework.', 'Code and rest. Later at night code and dinner.', 'Done', '2021-05-07 16:10:54'),
(5, 'Todo before sleep', 'Brush my teeth. Prepare the bed. Turn off the lights. Remove the top shirt. Pray and then sleep tight.', 'Not Done', '2021-05-07 16:12:50'),
(6, 'Todo tomorrow morning', 'Wake up early. Stretch my body. Pray. Eat my breakfast. Take a bath. Code and rest.', 'Not Done', '2021-05-07 16:14:21'),
(7, 'Todo tomorrow noon', 'Eat Lunch. Pray. Sleep. Code', 'Not Done', '2021-05-07 16:15:18'),
(8, 'Jurick court Marjorie', 'gfadfgfdhhhfd', 'Done', '2021-05-07 17:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `trashId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_deleted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trash`
--

INSERT INTO `trash` (`trashId`, `title`, `body`, `status`, `date_deleted`) VALUES
(2, 'malibang', '             hello World', 'Not Done', '2021-05-07 16:19:05'),
(3, 'Things to do today', 'Hello World. \r\nhello Philippines.', 'Not Done', '2021-05-07 16:19:05'),
(4, 'Hello World', 'Hi', 'Done', '2021-05-07 12:01:24'),
(5, 'Test', 'Testing', 'Done', '2021-05-07 10:04:25'),
(6, 'Another Test', 'Another test completed.', 'Done', '2021-05-07 06:05:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`trashId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `noteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trashId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
