-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2018 at 04:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `salt`, `role_id`, `name`, `deleted`) VALUES
(1, 'emmwee', 'e392ee36f99a43a073fdb3907fdb90521530afb128bf6605361242fe2e42ab9a3431355c6eef0040b40a72db1593663f9ae635e527c8becbc3eb352fc31b3627', 136416, 1, 'Emmanual', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `username`, `password`, `salt`, `role_id`, `name`, `email`, `contact`, `deleted`) VALUES
(1, 'emmclient', '57d3a3f4f2d6e1626fd27b31abe06ea0e85d985944964845b2b63401ecd04846eef983142329e6560f4bca489c7196fd5ba0b6f9732c7058acad82eaf2125636', 254486, 5, 'Emmanual', 'emmanual@cysoft.co', '0149151084', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `type` enum('USER','CLIENT','ADMIN') CHARACTER SET utf8 NOT NULL,
  `target` varchar(256) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `created_by`, `created_date`, `deleted`) VALUES
(2, 'Project Purity', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et nibh rutrum, facilisis nibh vitae, facilisis felis. In tincidunt eleifend sapien, eu sollicitudin massa mollis in. Praesent commodo lacus eget egestas egestas. Etiam id aliquet lorem. Nulla viverra erat at turpis congue, ac molestie nunc pretium. Etiam a urna odio. Phasellus tincidunt, libero non condimentum ultricies, eros nisi fermentum ipsum, in consectetur eros orci porta magna. Maecenas tristique eu risus a semper. Morbi commodo dictum mollis. Donec egestas et orci a feugiat. Aenean vel erat id mi sollicitudin lobortis id ac neque.\r\n\r\nNullam lobortis diam at erat placerat interdum. Fusce ex magna, suscipit eget tempor venenatis, ultrices nec metus. Proin aliquet fringilla ipsum, quis pulvinar magna fermentum sed. Maecenas ullamcorper lorem id dui accumsan, nec rutrum libero feugiat. Sed vestibulum viverra fermentum. Nullam non pharetra odio, non condimentum dui. Maecenas at rutrum mauris. Proin risus elit, sagittis vitae viverra eu, sodales a nibh. Donec porta, orci nec dapibus sagittis, libero risus tempor ante, non faucibus nisi magna nec enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec justo tortor, pharetra et facilisis sed, congue quis enim.\r\n\r\nNunc mauris risus, dignissim a ultricies tempus, fringilla non diam. Integer euismod arcu nunc, eget mattis magna venenatis ac. Curabitur consectetur, urna in auctor fermentum, tortor dolor sodales massa, vitae finibus dolor mi quis nulla. In molestie feugiat iaculis. Integer dolor odio, vehicula eget aliquet eu, tincidunt vel nunc. Phasellus urna enim, iaculis ut urna fermentum, finibus semper tortor. Vestibulum scelerisque nisl in facilisis auctor. Etiam nec urna eu tellus eleifend consectetur nec ac eros. Donec nibh lectus, malesuada sit amet blandit non, aliquet a felis. Pellentesque sed tincidunt ligula. Nunc vitae volutpat neque. Nulla molestie erat tortor, quis interdum lorem vulputate non. Donec aliquet ligula leo, in ultricies ex iaculis sit amet. Quisque sed ligula turpis.\r\n\r\nAliquam commodo, sem vel consectetur congue, neque ipsum consectetur sapien, non suscipit nisl nisi quis nunc. Cras gravida ex vel metus gravida, ac finibus tortor gravida. Aliquam eros elit, luctus eget varius sed, pellentesque aliquam tortor. Pellentesque rutrum lorem lectus. Maecenas efficitur risus non egestas fermentum. Sed leo dui, gravida sit amet sapien sed, scelerisque tempor lorem. Ut sit amet metus non ipsum scelerisque fringilla eget non ipsum. Praesent fermentum sapien convallis urna ultrices pretium. Nulla facilisi.\r\n\r\nPraesent elementum imperdiet sem vel facilisis. In varius ipsum non nisi bibendum pellentesque. Suspendisse tempor semper sollicitudin. Nunc et felis ligula. Etiam fringilla massa et lectus volutpat facilisis. In id ex turpis. Curabitur convallis eros id elit malesuada gravida. Etiam purus est, congue et nunc sed, sagittis ultricies ligula. In elementum, sem sed luctus iaculis, libero libero blandit nunc, et efficitur ante ipsum id enim. Ut vitae neque at leo posuere mattis in eget libero. Nam imperdiet urna feugiat, ultrices lorem eu, volutpat lacus. Suspendisse potenti. Aenean et erat congue, scelerisque sapien vel, fringilla dui. Suspendisse turpis sem, tristique vitae viverra in, iaculis eget enim. Curabitur dapibus non enim a vulputate. Praesent vulputate, sem nec facilisis tincidunt, lorem metus auctor felis, at bibendum tellus lacus quis lacus.', 1, '2018-06-06 13:51:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_event`
--

CREATE TABLE `project_event` (
  `project_event_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `address` longtext CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `project_event`
--

INSERT INTO `project_event` (`project_event_id`, `project_id`, `name`, `description`, `address`, `created_by`, `created_date`, `deleted`) VALUES
(1, 2, 'Event Purity', 'Nulla ut lacus sed arcu rutrum vestibulum. Nulla ut finibus justo. Nulla varius fermentum ante et elementum. Nullam sit amet dui risus. Fusce vel gravida ante. Nulla nec venenatis erat, quis mollis tellus. Vivamus consectetur purus augue, quis cursus quam interdum ut. Etiam eget nunc ligula. Pellentesque ante elit, lobortis non felis sit amet, pharetra tempus justo. Aenean diam leo, dignissim vel auctor nec, lobortis eu eros. Curabitur placerat metus sapien, in tristique augue molestie nec. Pellentesque porta odio imperdiet dui semper, non porta neque finibus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin auctor tincidunt volutpat. Mauris lacinia, libero non eleifend gravida, augue tortor posuere erat, ut rutrum ex lorem lobortis ipsum. Duis at fermentum purus. Fusce varius neque non tellus finibus gravida. Duis elementum turpis quis nibh ullamcorper malesuada. Maecenas convallis eros eu mollis ultricies. Phasellus volutpat vel nisi non luctus. Phasellus a vehicula nulla. Nulla tristique lacinia erat at pretium. Suspendisse finibus posuere ligula vel vehicula. Cras sed arcu tincidunt, sollicitudin turpis ut, aliquet dui. Phasellus congue fringilla augue sed dignissim. Quisque a urna dolor. Curabitur vitae purus mi. Etiam imperdiet vel est id ullamcorper. Integer dignissim semper eros, varius tempus velit tempus a.', 1, '2018-06-06 14:33:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_event_date`
--

CREATE TABLE `project_event_date` (
  `project_event_date_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project_image`
--

CREATE TABLE `project_image` (
  `project_image_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project_report`
--

CREATE TABLE `project_report` (
  `project_report_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `project_report_status_id` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project_report_status`
--

CREATE TABLE `project_report_status` (
  `project_report_status_id` int(11) NOT NULL,
  `status` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(256) CHARACTER SET utf8 NOT NULL,
  `type` enum('USER','CLIENT','ADMIN') COLLATE utf8_bin NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `type`, `level`) VALUES
(1, 'Superadmin', 'ADMIN', 1),
(2, 'Admin', 'ADMIN', 2),
(3, 'Supervisor', 'USER', 1),
(4, 'User', 'USER', 2),
(5, 'Superclient', 'CLIENT', 1),
(6, 'Client', 'CLIENT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `role_access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `create_control` tinyint(1) NOT NULL DEFAULT '0',
  `read_control` tinyint(1) NOT NULL DEFAULT '0',
  `update_control` tinyint(1) NOT NULL DEFAULT '0',
  `delete_control` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `salt` int(8) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(256) CHARACTER SET utf8 NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `salt`, `role_id`, `name`, `email`, `contact`, `deleted`) VALUES
(2, 'emmuser', 'ecd127f4a48feae2e58c19785e9b76030848fe792074724e08313872891c5243ee2a53a402674516f35e9cb7b9bb8edb9d91f6bdfa8a9ca82ca27b579916cfda', 896057, 3, 'Emmanual', 'emmanual@cysoft.co', '0149151084', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `target_id` (`target_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `project_event`
--
ALTER TABLE `project_event`
  ADD PRIMARY KEY (`project_event_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_event_date`
--
ALTER TABLE `project_event_date`
  ADD PRIMARY KEY (`project_event_date_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `project_image`
--
ALTER TABLE `project_image`
  ADD PRIMARY KEY (`project_image_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_report`
--
ALTER TABLE `project_report`
  ADD PRIMARY KEY (`project_report_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_report_status_id` (`project_report_status_id`);

--
-- Indexes for table `project_report_status`
--
ALTER TABLE `project_report_status`
  ADD PRIMARY KEY (`project_report_status_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`role_access_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_event`
--
ALTER TABLE `project_event`
  MODIFY `project_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_event_date`
--
ALTER TABLE `project_event_date`
  MODIFY `project_event_date_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_image`
--
ALTER TABLE `project_image`
  MODIFY `project_image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report`
--
ALTER TABLE `project_report`
  MODIFY `project_report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_report_status`
--
ALTER TABLE `project_report_status`
  MODIFY `project_report_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `role_access_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_event`
--
ALTER TABLE `project_event`
  ADD CONSTRAINT `project_event_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_event_date`
--
ALTER TABLE `project_event_date`
  ADD CONSTRAINT `project_event_date_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `project_event` (`project_event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_image`
--
ALTER TABLE `project_image`
  ADD CONSTRAINT `project_image_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_report`
--
ALTER TABLE `project_report`
  ADD CONSTRAINT `project_report_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_report_ibfk_2` FOREIGN KEY (`project_report_status_id`) REFERENCES `project_report_status` (`project_report_status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_access`
--
ALTER TABLE `role_access`
  ADD CONSTRAINT `role_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_access_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
