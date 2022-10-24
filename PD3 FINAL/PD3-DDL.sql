{\rtf1\ansi\ansicpg1252\cocoartf2638
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 --\
-- Database: `Nerji_Library`\
--\
CREATE DATABASE IF NOT EXISTS `Nerji_Library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;\
USE `Nerji_Library`;\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `BOOK`\
--\
\
CREATE TABLE `BOOK` (\
  `ISBN` varchar(25) NOT NULL,\
  `DOCID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `BOOK`\
--\
\
INSERT INTO `BOOK` (`ISBN`, `DOCID`) VALUES\
('1234-1', 1),\
('1234-2', 2),\
('1234-3', 3),\
('0000-1', 4),\
('0000-2', 5),\
('0000-3', 6),\
('0001-1', 7),\
('0001-2', 8),\
('0002-1', 9),\
('0002-2', 10),\
('0003-1', 11),\
('0004-1', 12),\
('0005-1', 13),\
('234553', 27),\
('123459', 28),\
('1345252', 29),\
('11245452', 31),\
('52435634', 36),\
('42624523', 44);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `BORROWS`\
--\
\
CREATE TABLE `BORROWS` (\
  `BID` int(10) NOT NULL,\
  `BORROWED_ON` datetime DEFAULT NULL,\
  `RETURNED_ON` datetime DEFAULT NULL,\
  `MEMBERID` int(10) NOT NULL,\
  `DOCID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `BORROWS`\
--\
\
INSERT INTO `BORROWS` (`BID`, `BORROWED_ON`, `RETURNED_ON`, `MEMBERID`, `DOCID`) VALUES\
(1, '2022-04-18 10:34:09', '2022-05-03 15:46:50', 1, 1),\
(3, '2022-04-18 15:34:09', NULL, 4, 3),\
(4, '2022-04-18 15:34:09', NULL, 7, 7),\
(5, '2022-02-18 15:34:09', NULL, 8, 14),\
(17, '2022-03-07 04:44:13', NULL, 1, 12),\
(19, '2020-05-06 05:52:40', '2022-05-03 06:09:56', 1, 20),\
(27, '2022-05-12 06:38:10', '2022-05-03 08:04:50', 1, 22),\
(41, '2022-05-03 06:58:36', '2022-05-03 08:02:55', 1, 17),\
(42, '2018-05-03 06:58:47', '2022-05-03 09:07:29', 1, 16),\
(52, '2022-05-03 09:42:25', '2022-05-03 15:39:19', 1, 8),\
(57, '2022-05-03 11:19:32', '2022-05-03 15:49:20', 1, 1),\
(59, '2022-05-03 23:01:56', NULL, 1, 8),\
(60, '2022-05-03 16:04:11', NULL, 1, 6),\
(61, '2022-05-03 16:04:40', NULL, 1, 6);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `BRANCH`\
--\
\
CREATE TABLE `BRANCH` (\
  `BRID` int(10) NOT NULL,\
  `BNAME` varchar(20) NOT NULL,\
  `ADDRESS` varchar(20) NOT NULL,\
  `PHNUM` int(50) NOT NULL,\
  `LIBID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `BRANCH`\
--\
\
INSERT INTO `BRANCH` (`BRID`, `BNAME`, `ADDRESS`, `PHNUM`, `LIBID`) VALUES\
(1, 'LF Branch', 'Lake Forest', 7355555, 1);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `DOCUMENT`\
--\
\
CREATE TABLE `DOCUMENT` (\
  `DOCID` int(10) NOT NULL,\
  `BRID` int(10) NOT NULL,\
  `TYPE` varchar(50) NOT NULL,\
  `TITLE` varchar(150) NOT NULL,\
  `CREATOR` varchar(250) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `DOCUMENT`\
--\
\
INSERT INTO `DOCUMENT` (`DOCID`, `BRID`, `TYPE`, `TITLE`, `CREATOR`) VALUES\
(1, 1, 'B', 'The Adventures of Huckleberry Finn', 'Mark Twain'),\
(2, 1, 'B', 'The Adventures of Huckleberry Finn', 'Mark Twain'),\
(3, 1, 'B', 'The Adventures of Huckleberry Finn', 'Mark Twain'),\
(4, 1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),\
(5, 1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),\
(6, 1, 'B', 'Bhabiswya ko Bipana', 'Prithu'),\
(7, 1, 'B', 'Harry Potter and Gula', 'Ravenclaw'),\
(8, 1, 'B', 'Harry Potter and Gula', 'Ravenclaw'),\
(9, 1, 'B', 'Fiery Tings', 'Herald Goliath'),\
(10, 1, 'B', 'Fiery Tings', 'Herald Goliath'),\
(11, 1, 'B', 'Faaaccktts of Life', 'SHECK'),\
(12, 1, 'B', 'How to be a GOZA', 'SHECK'),\
(13, 1, 'B', 'Sheckin\\' The Shyack Shcj Shck-tyle', 'SHECK'),\
(14, 1, 'J', 'Awakened Reptiles', 'Crock Dillion'),\
(15, 1, 'J', 'Hungry Reptiles', 'Crock Dillion'),\
(16, 1, 'J', 'Tire Fashion', 'Leah Ther'),\
(17, 1, 'J', 'Nailing the Pin', 'Harold Mumford'),\
(18, 1, 'J', 'The Table Over the Shed', 'Griffith'),\
(19, 1, 'J', 'Blooming Blues', 'Blufford Blue'),\
(20, 1, 'J', 'Grlling Right', 'Gordon Ramtell'),\
(21, 1, 'D', 'Sleeping Reptiles', 'Crock Dillion'),\
(22, 1, 'D', 'Wedding Escape Plans', 'Chum Lord'),\
(23, 1, 'D', 'Escape Plots After Capture', 'Chum Lord'),\
(24, 1, 'D', 'Catching a Chum', 'Law Wahd'),\
(25, 1, 'D', 'Catching a Chum Again', 'Law Wahd'),\
(27, 1, 'B', 'Chronicles of the Bash', 'SHECK'),\
(28, 1, 'B', 'When There Is No Bash', 'SHECK'),\
(29, 1, 'B', 'The Bash Comeths', 'SHECK'),\
(31, 1, 'B', 'Brothers Bash', 'SHECK'),\
(36, 1, 'B', 'Bashing In The Night', 'SHECK'),\
(44, 1, 'B', 'Day In The Life Of A Roadman', 'SHECK');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `DVD`\
--\
\
CREATE TABLE `DVD` (\
  `DVDID` int(10) NOT NULL,\
  `DOCID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `DVD`\
--\
\
INSERT INTO `DVD` (`DVDID`, `DOCID`) VALUES\
(1, 21),\
(2, 22),\
(3, 23),\
(4, 24),\
(5, 25);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `JOURNAL`\
--\
\
CREATE TABLE `JOURNAL` (\
  `JOURNALID` int(10) NOT NULL,\
  `DOCID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `JOURNAL`\
--\
\
INSERT INTO `JOURNAL` (`JOURNALID`, `DOCID`) VALUES\
(1, 14),\
(2, 15),\
(3, 16),\
(4, 17),\
(5, 18),\
(6, 19),\
(7, 20);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `LIBRARY`\
--\
\
CREATE TABLE `LIBRARY` (\
  `LIBID` int(10) NOT NULL,\
  `LNAME` varchar(20) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `LIBRARY`\
--\
\
INSERT INTO `LIBRARY` (`LIBID`, `LNAME`) VALUES\
(1, 'Lake Forest Library');\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `MEMBER`\
--\
\
CREATE TABLE `MEMBER` (\
  `MEMID` int(10) NOT NULL,\
  `NAME` varchar(20) NOT NULL,\
  `PHONE` bigint(200) NOT NULL,\
  `EMAIL` varchar(100) NOT NULL,\
  `ADDRESS` varchar(255) DEFAULT NULL,\
  `PASSWORDS` varchar(255) NOT NULL,\
  `ADMIN` tinyint(1) NOT NULL,\
  `BRID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `MEMBER`\
--\
\
INSERT INTO `MEMBER` (`MEMID`, `NAME`, `PHONE`, `EMAIL`, `ADDRESS`, `PASSWORDS`, `ADMIN`, `BRID`) VALUES\
(1, 'Animesa Puri', 2242859269, 'puria@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '12345Ab890', 0, 1),\
(2, 'Mohamed Diallo', 2242859270, 'diallom@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '12344abc90', 0, 1),\
(3, 'Sam Rogers', 2282059269, 'rogerss@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '1238egdh0', 0, 1),\
(4, 'Parker Jude', 2453459269, 'judep@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '123434f858', 0, 1),\
(5, 'Chloe Li', 2242785469, 'lic@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '172acds890', 0, 1),\
(6, 'Keano Chicalia', 9658859269, 'chicaliak@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '123abh490', 0, 1),\
(7, 'Ola Busari', 2242858849, 'busario@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '123abgs90', 0, 1),\
(8, 'Wontuma Sadiq', 2242885888, 'sadiqw@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '12dvgs790', 0, 1),\
(9, 'Ragnar Lothbrok', 2242888889, 'lothbrokr@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '196abhf890', 0, 1),\
(10, 'Grodungus Grolungus', 2245269889, 'grolungusg@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', '48583asd890', 0, 1),\
(11, 'Sugata Banerji', 6099690420, 'banerjis@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', 'bloodybeetles', 1, 1),\
(12, 'Arthur Bousquet', 8477356969, 'bousqueta@mx.lakeforest.edu', '555 N Sheridan Rd, Lake Forest, IL', 'fromagebaguette', 1, 1),\
(13, 'Boubti Shck', 2232249867, 'boubti.schk@lfc.edu', 'gozaland', 'worororororo', 0, 1);\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `PUBLISHER`\
--\
\
CREATE TABLE `PUBLISHER` (\
  `PID` int(10) NOT NULL,\
  `NAME` varchar(20) DEFAULT NULL,\
  `DOCID` int(10) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;\
\
--\
-- Dumping data for table `PUBLISHER`\
--\
\
INSERT INTO `PUBLISHER` (`PID`, `NAME`, `DOCID`) VALUES\
(1, 'Book Ltd', 1),\
(2, 'Fireball Pub', 2),\
(3, 'Toei Ltd Inc', 3),\
(4, 'Mugiwara Pub', 4),\
(5, 'Book Ltd', 5),\
(6, 'Fireball Pub', 6),\
(7, 'Toei Ltd Inc', 7),\
(8, 'Mugiwara Pub', 8),\
(9, 'Fireball Pub', 9),\
(10, 'Toei Ltd Inc', 10),\
(11, 'Mugiwara Pub', 11),\
(12, 'Book Ltd', 12),\
(13, 'Fireball Pub', 13),\
(14, 'Toei Ltd Inc', 14),\
(15, 'Mugiwara Pub', 15),\
(16, 'Book Ltd', 16),\
(17, 'Fireball Pub', 17),\
(18, 'Toei Ltd Inc', 18),\
(19, 'Mugiwara Pub', 19),\
(20, 'Fireball Pub', 20),\
(21, 'Toei Ltd Inc', 21),\
(22, 'Mugiwara Pub', 22),\
(23, 'Book Ltd', 23),\
(24, 'Fireball Pub', 24),\
(25, 'Toei Ltd Inc', 25),\
(26, 'Mugiwara Pub', 27),\
(27, 'Mugiwara Pub', 28),\
(28, 'Mugiwara Pub', 29),\
(29, 'Mugiwara Pub', 31),\
(30, 'Mugiwara Pub', 36),\
(31, 'Top Boy', 44);\
\
--\
-- Indexes for dumped tables\
--\
\
--\
-- Indexes for table `BOOK`\
--\
ALTER TABLE `BOOK`\
  ADD PRIMARY KEY (`ISBN`),\
  ADD KEY `DOCID` (`DOCID`);\
\
--\
-- Indexes for table `BORROWS`\
--\
ALTER TABLE `BORROWS`\
  ADD PRIMARY KEY (`BID`) USING BTREE,\
  ADD KEY `MEMBERID` (`MEMBERID`),\
  ADD KEY `DOCID` (`DOCID`) USING BTREE;\
\
--\
-- Indexes for table `BRANCH`\
--\
ALTER TABLE `BRANCH`\
  ADD PRIMARY KEY (`BRID`),\
  ADD KEY `LIBID` (`LIBID`);\
\
--\
-- Indexes for table `DOCUMENT`\
--\
ALTER TABLE `DOCUMENT`\
  ADD PRIMARY KEY (`DOCID`),\
  ADD KEY `BRID` (`BRID`);\
\
--\
-- Indexes for table `DVD`\
--\
ALTER TABLE `DVD`\
  ADD PRIMARY KEY (`DVDID`),\
  ADD KEY `DOCID` (`DOCID`);\
\
--\
-- Indexes for table `JOURNAL`\
--\
ALTER TABLE `JOURNAL`\
  ADD PRIMARY KEY (`JOURNALID`),\
  ADD KEY `DOCID` (`DOCID`);\
\
--\
-- Indexes for table `LIBRARY`\
--\
ALTER TABLE `LIBRARY`\
  ADD PRIMARY KEY (`LIBID`);\
\
--\
-- Indexes for table `MEMBER`\
--\
ALTER TABLE `MEMBER`\
  ADD PRIMARY KEY (`MEMID`),\
  ADD KEY `BRID` (`BRID`);\
\
--\
-- Indexes for table `PUBLISHER`\
--\
ALTER TABLE `PUBLISHER`\
  ADD PRIMARY KEY (`PID`),\
  ADD KEY `DOCID` (`DOCID`);\
\
--\
-- AUTO_INCREMENT for dumped tables\
--\
\
--\
-- AUTO_INCREMENT for table `BORROWS`\
--\
ALTER TABLE `BORROWS`\
  MODIFY `BID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;\
\
--\
-- AUTO_INCREMENT for table `BRANCH`\
--\
ALTER TABLE `BRANCH`\
  MODIFY `BRID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- AUTO_INCREMENT for table `DOCUMENT`\
--\
ALTER TABLE `DOCUMENT`\
  MODIFY `DOCID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;\
\
--\
-- AUTO_INCREMENT for table `LIBRARY`\
--\
ALTER TABLE `LIBRARY`\
  MODIFY `LIBID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;\
\
--\
-- AUTO_INCREMENT for table `MEMBER`\
--\
ALTER TABLE `MEMBER`\
  MODIFY `MEMID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;\
\
--\
-- AUTO_INCREMENT for table `PUBLISHER`\
--\
ALTER TABLE `PUBLISHER`\
  MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;\
\
--\
-- Constraints for dumped tables\
--\
\
--\
-- Constraints for table `BOOK`\
--\
ALTER TABLE `BOOK`\
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`DOCID`) REFERENCES `DOCUMENT` (`DOCID`);\
\
--\
-- Constraints for table `BORROWS`\
--\
ALTER TABLE `BORROWS`\
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`MEMBERID`) REFERENCES `MEMBER` (`MEMID`),\
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`DOCID`) REFERENCES `DOCUMENT` (`DOCID`);\
\
--\
-- Constraints for table `BRANCH`\
--\
ALTER TABLE `BRANCH`\
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`LIBID`) REFERENCES `LIBRARY` (`LIBID`);\
\
--\
-- Constraints for table `DOCUMENT`\
--\
ALTER TABLE `DOCUMENT`\
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`BRID`) REFERENCES `BRANCH` (`BRID`);\
\
--\
-- Constraints for table `DVD`\
--\
ALTER TABLE `DVD`\
  ADD CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`DOCID`) REFERENCES `DOCUMENT` (`DOCID`);\
\
--\
-- Constraints for table `JOURNAL`\
--\
ALTER TABLE `JOURNAL`\
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`DOCID`) REFERENCES `DOCUMENT` (`DOCID`);\
\
--\
-- Constraints for table `MEMBER`\
--\
ALTER TABLE `MEMBER`\
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`BRID`) REFERENCES `BRANCH` (`BRID`);\
\
--\
-- Constraints for table `PUBLISHER`\
--\
ALTER TABLE `PUBLISHER`\
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`DOCID`) REFERENCES `DOCUMENT` (`DOCID`);\
COMMIT;}