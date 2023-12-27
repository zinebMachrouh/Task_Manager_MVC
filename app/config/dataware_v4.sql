-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 11:38 PM
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
-- Database: `dataware_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` mediumtext NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `productOwner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `date_start`, `date_end`, `description`, `status`, `productOwner`) VALUES
(1, 'dataWare', '2023-12-15', '2024-03-02', 'gfhjkl fgyuhijkop dftgyhujiko dfghujkl', 0, 7),
(4, 'Bloom', '2023-12-20', '2024-02-16', 'it\'s your time to bloom', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `priority` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `archived` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `status`, `created_at`, `priority`, `user_id`, `project_id`, `deleted`, `archived`) VALUES
(1, 'This is the first Task', 'lorem ipsum dolores', 0, '2023-12-25', 1, 15, 1, 0, 0),
(2, 'This is the second task', 'lorem ipsum dolores', 0, '2023-12-26', 1, 15, 1, 0, 0),
(3, 'Task still in progress', 'Et optio et eiusmod liquid sunt ut fuga', 3, '2023-12-27', 1, 15, 1, 0, 0),
(4, 'Quia impedit cumque', 'Mollit provident se', 0, '2023-12-27', 2, 15, 1, 1, 0),
(5, 'Quae aliquid quas et', 'Do voluptas rerum co', 1, '2023-12-27', 1, 15, 1, 0, 0),
(6, 'Assumenda odit expli', 'Dolores maxime molli', 0, '2023-12-27', 1, 15, 1, 0, 1),
(7, 'Magna illum eligend', 'Dolore cillum vel te', 3, '2023-12-27', 0, 15, 1, 0, 0),
(8, 'Sit saepe enim ducim', 'Vel dolor beatae vit', 2, '2023-12-27', 2, 15, 1, 0, 0),
(9, 'Numquam qui in volup', 'Natus facilis assume', 1, '2023-12-27', 1, 15, 1, 1, 0),
(10, 'Ipsum blanditiis te', 'Placeat nihil et qu', 0, '2023-12-27', 2, 15, 1, 0, 0),
(11, 'Officiis sunt a nec', 'Odio aut esse omnis', 0, '2023-12-27', 2, 15, 1, 0, 0),
(12, 'Voluptates adipisci ', 'Eos minim fugiat d', 0, '2023-12-27', 0, 15, 1, 0, 0),
(13, 'Incididunt sequi nis', 'Quam cumque sed in q', 1, '2023-12-27', 2, 15, 1, 0, 0),
(14, 'Voluptatem Quod lab', 'Adipisci mollitia qu', 2, '2023-12-27', 2, 15, 1, 0, 0),
(15, 'Dolores dolor volupt', 'Est sit voluptatum u', 1, '2023-12-27', 2, 15, 1, 1, 0),
(16, 'A', 'Pariatur Culpa ius', 1, '2023-12-27', 0, 15, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `description` longtext NOT NULL,
  `projectId` int(11) DEFAULT NULL,
  `scrumMaster` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `description`, `projectId`, `scrumMaster`) VALUES
(1, 'nightOwels', '2023-11-28', 'lorem ipsum', 1, NULL),
(2, 'junior high', '2023-12-03', 'retyguihjokpl ftgyhujikopl dxfcghjkl dtfghjklm', NULL, 3),
(3, 'Orlando', '2023-12-05', 'It\'s my time to shine!', NULL, 6),
(4, 'MAC', '2023-12-05', 'Be the best everyday', 4, 3),
(5, 'Basia Robles', '2023-12-11', 'Voluptatibus eaque v', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `user_id`, `team_id`) VALUES
(1, 15, 1),
(2, 15, 3),
(5, 11, 3),
(7, 14, 3),
(9, 10, 5),
(10, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `service` varchar(25) NOT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `birthdate`, `service`, `adress`, `tel`, `email`, `password`, `role`) VALUES
(1, 'adam', 'smith', '1994-01-22', 'CEO', '4, Privet drive', '0711223344', 'adam94@gmail.com', 'cGFzc3dvcmQxMjM=', 3),
(2, 'Tana', 'Oneal', NULL, 'Rhiannon Coffey', NULL, '0762384425', 'hyvyrymy@mailinator.com', 'd2lnaXd1Y28=', 0),
(3, 'Adria', 'Ferguson', NULL, 'Chaim Bowers', NULL, '0629718852', 'fatetek@mailinator.com', 'cGFoeW1lbHk=', 2),
(4, 'Linda', 'Orr', NULL, 'Cara Brown', NULL, '0728712402', 'bemu@mailinator.com', 'aG9weWt5cGE=', 0),
(6, 'Brent', 'Bradford', NULL, 'Elizabeth Deleon', NULL, '0683537068', 'beliqix@mailinator.com', 'Y3ltaW15bmU=', 2),
(7, 'Lillian', 'Zimmerman', NULL, 'Jolene Lott', NULL, '0648261466', 'giviqo@mailinator.com', 'd2Ftb25hZ2E=', 1),
(8, 'Hayley', 'Snyder', NULL, 'Zelda Kirk', NULL, '+1 (515) 353-5608', 'tyjetigu@mailinator.com', 'a3lreWxlcmU=', 1),
(9, 'Liberty', 'Roberson', NULL, 'Zephania Burke', NULL, '+1 (924) 523-5544', 'zymodydesi@mailinator.com', 'anl0eXNldmU=', 0),
(10, 'Quyn', 'Cantrell', NULL, 'Holmes Harding', NULL, '+1 (239) 821-5284', 'qohal@mailinator.com', 'bm9jYXNpeG8=', 0),
(11, 'Maile', 'Carney', NULL, 'Mari Foley', NULL, '+1 (348) 545-3307', 'ricyfily@mailinator.com', 'em93aXR5eG8=', 0),
(12, 'Wilma', 'Stephens', NULL, 'Travis Gomez', NULL, '+1 (651) 733-7252', 'bugux@mailinator.com', 'a2FodWtpbWE=', 1),
(14, 'Orlando', 'Randall', NULL, 'Portia Davidson', NULL, '+1 (205) 662-4694', 'kumew@mailinator.com', 'bGVxb21pbmE=', 0),
(15, 'Zineb', 'Machrouh', NULL, 'Full-Stack', '4, Privet Drive', '0586742569', 'zineb.m@gmail.com', 'cGFzc3dvcmQxMjM=', 0),
(16, 'Dorian', 'Rojas', NULL, 'Carson Manning', NULL, '+1 (123) 824-8515', 'zineb@gmail.com', 'cGFzc3dvcmQxMjM=', 0),
(29, 'Jade', 'Clements', NULL, 'Hilel Sweeney', NULL, '+1 (502) 893-3668', 'gobedumado@mailinator.com', 'bXl0ZXd5cmU=', 0),
(30, 'Lance', 'Nixon', NULL, 'Anne Reid', NULL, '+1 (874) 365-8744', 'micetosa@mailinator.com', 'bnVtdWxhZmE=', 0),
(32, 'Yen', 'Cross', NULL, 'Hilary Harrison', NULL, '+1 (663) 944-3122', 'hiridem@mailinator.com', 'aGl3dWhldGU=', 0),
(33, 'Merrill', 'Shelton', NULL, 'Blair Rutledge', NULL, '+1 (608) 781-8165', 'tuwowoz@mailinator.com', 'eHlxdXB1c28=', 0),
(35, 'Adrienne', 'Yang', NULL, 'Garrett Weaver', NULL, '+1 (755) 537-2486', 'zadi@mailinator.com', 'a3V2eXJvc2U=', 0),
(37, 'Hamza', 'Benzzinbi', NULL, 'Full-Stack Dev', NULL, '0722113344', 'hamza.b@gmail.com', 'cGFzc3dvcmQxMjM=', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productOwner` (`productOwner`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_task` (`user_id`),
  ADD KEY `fk_project_task` (`project_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scrumMaster` (`scrumMaster`),
  ADD KEY `fk_project` (`projectId`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `productOwner` FOREIGN KEY (`productOwner`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_project_task` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_task` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk_project` FOREIGN KEY (`projectId`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `scrumMaster` FOREIGN KEY (`scrumMaster`) REFERENCES `users` (`id`);

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
