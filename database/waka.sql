-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 06:04 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waka`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `admitted`
--
CREATE TABLE `admitted` (
`studentID` int(11)
,`surname` varchar(50)
,`fname` varchar(50)
,`lname` varchar(50)
,`gender` varchar(10)
,`dob` timestamp
,`age` int(5)
,`id` varchar(11)
,`phone1` varchar(15)
,`phone2` varchar(15)
,`mail` varchar(200)
,`country` varchar(200)
,`town` varchar(200)
,`status` varchar(50)
,`preadmitted` timestamp
,`admitted` timestamp
,`courseID` int(11)
,`yosID` int(11)
,`semisterID` int(11)
,`adm` varchar(50)
,`password` text
,`staffID` int(11)
,`faculty` varchar(200)
,`facultyAbbreviation` varchar(30)
,`course` varchar(200)
,`courseAbbreviation` varchar(10)
,`yos` int(11)
,`sem` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `alumni`
--
CREATE TABLE `alumni` (
`studentID` int(11)
,`surname` varchar(50)
,`fname` varchar(50)
,`lname` varchar(50)
,`gender` varchar(10)
,`dob` timestamp
,`age` int(5)
,`id` varchar(11)
,`phone1` varchar(15)
,`phone2` varchar(15)
,`mail` varchar(200)
,`country` varchar(200)
,`town` varchar(200)
,`status` varchar(50)
,`preadmitted` timestamp
,`admitted` timestamp
,`courseID` int(11)
,`yosID` int(11)
,`semisterID` int(11)
,`adm` varchar(50)
,`password` text
,`staffID` int(11)
,`faculty` varchar(200)
,`course` varchar(200)
,`yos` int(11)
,`sem` int(11)
,`completed` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `answer` varchar(10) NOT NULL,
  `marks` varchar(3) NOT NULL,
  `percentage` varchar(3) NOT NULL,
  `submitted` timestamp NULL DEFAULT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `assignedunit`
--
CREATE TABLE `assignedunit` (
`unitID` int(11)
,`code` varchar(20)
,`unit` varchar(200)
,`unitNumber` varchar(20)
,`YOS` int(11)
,`sem` int(11)
,`course` varchar(200)
,`level` varchar(200)
,`faculty` varchar(200)
,`staffID` int(11)
,`staffNo` varchar(30)
,`name` varchar(92)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `assignedunits`
--
CREATE TABLE `assignedunits` (
`assignID` int(11)
,`unitID` int(11)
,`no` varchar(20)
,`unit` varchar(200)
,`abbreviation` varchar(30)
,`yosID` int(11)
,`semisterID` int(11)
,`course` varchar(200)
,`staffID` int(11)
,`staffNo` varchar(30)
,`staff` varchar(92)
);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `marks` int(11) NOT NULL,
  `unitID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authoredbook`
--

CREATE TABLE `authoredbook` (
  `authored_book_id` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `added` timestamp NULL DEFAULT NULL,
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `ISBN` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `publisherID` int(11) DEFAULT NULL,
  `shelfID` int(11) NOT NULL,
  `added` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `card`
--
CREATE TABLE `card` (
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL,
  `no` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `abbreviation` varchar(10) NOT NULL,
  `years` int(11) DEFAULT NULL,
  `levelID` int(11) NOT NULL,
  `facultyID` int(11) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coursework`
--

CREATE TABLE `coursework` (
  `CWID` int(11) NOT NULL,
  `doc` varchar(200) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unitID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE `day` (
  `dayID` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`dayID`, `name`) VALUES
(5, 'Friday'),
(1, 'Monday'),
(6, 'Saturday'),
(7, 'Sunday'),
(4, 'Thursday'),
(2, 'Tuesday'),
(3, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) NOT NULL,
  `examNo` varchar(20) NOT NULL,
  `unitID` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time` int(11) NOT NULL,
  `no_of_quizes` int(11) NOT NULL,
  `periodID` int(11) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_login`
--

CREATE TABLE `exam_login` (
  `loginID` int(11) NOT NULL,
  `examID` int(11) DEFAULT NULL,
  `examNo` varchar(20) DEFAULT NULL,
  `studentID` varchar(20) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT NULL,
  `logoutTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `abbreviation` varchar(30) DEFAULT NULL,
  `dean` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `feeID` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `courseID` int(11) NOT NULL,
  `yosID` int(11) NOT NULL,
  `semisterID` int(11) NOT NULL,
  `periodID` int(11) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lessonID` int(11) NOT NULL,
  `unitID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `dayID` int(11) NOT NULL,
  `startPeriod` varchar(10) NOT NULL,
  `end-Period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelID` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelID`, `no`, `level`) VALUES
(1, 'CERT-01', 'Certificate'),
(2, 'DIP-01', 'Diploma'),
(3, 'A&D-01', 'Advanced Diploma'),
(4, 'B&D-01', 'Barchelors Degree'),
(5, 'M&D-01', 'Masters Degree'),
(6, 'DOC/P-01', 'Doctor/PhD');

-- --------------------------------------------------------

--
-- Stand-in structure for view `markedassignments`
--
CREATE TABLE `markedassignments` (
`submittedID` int(11)
,`studentID` int(11)
,`assignmentID` int(11)
,`assignment` varchar(200)
,`submitted` timestamp
,`marks` int(11)
,`staffID` int(11)
,`Marked` timestamp
,`fname` varchar(50)
,`lname` varchar(50)
,`surname` varchar(50)
,`gender` varchar(10)
,`adm` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `markID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `answer` varchar(10) DEFAULT NULL,
  `marks` varchar(3) NOT NULL,
  `studentID` int(11) NOT NULL,
  `time` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `preadmitted`
--
CREATE TABLE `preadmitted` (
`studentID` int(11)
,`surname` varchar(50)
,`fname` varchar(50)
,`lname` varchar(50)
,`gender` varchar(10)
,`dob` timestamp
,`age` int(5)
,`id` varchar(11)
,`phone1` varchar(15)
,`phone2` varchar(15)
,`mail` varchar(200)
,`country` varchar(200)
,`town` varchar(200)
,`status` varchar(50)
,`preadmitted` timestamp
,`admitted` timestamp
,`courseID` int(11)
,`yosID` int(11)
,`semisterID` int(11)
,`adm` varchar(50)
,`password` text
,`staffID` int(11)
,`faculty` varchar(200)
,`course` varchar(200)
,`yos` int(11)
,`sem` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `Capacity` varchar(10) DEFAULT NULL,
  `minimum` varchar(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productsupplied`
--

CREATE TABLE `productsupplied` (
  `PSID` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `Qty` varchar(50) NOT NULL,
  `Bal1` int(11) NOT NULL,
  `Bal2` int(11) NOT NULL,
  `contract` varchar(100) NOT NULL,
  `invoice` varchar(50) DEFAULT NULL,
  `delivery` varchar(50) DEFAULT NULL,
  `received` timestamp NULL DEFAULT NULL,
  `PID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_stock`
--
CREATE TABLE `product_stock` (
`PSID` int(11)
,`SID` int(11)
,`PID` int(11)
,`dateReceived` timestamp
,`Qty` varchar(50)
,`Bal1` int(11)
,`Bal2` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int(11) NOT NULL,
  `examNo` varchar(11) NOT NULL,
  `qNo` int(11) DEFAULT NULL,
  `quiz` text NOT NULL,
  `option_a` varchar(500) NOT NULL,
  `option_b` varchar(500) NOT NULL,
  `option_c` varchar(500) NOT NULL,
  `option_d` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `receipt`
--
CREATE TABLE `receipt` (
`ProductID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`PSID` int(11)
,`receiptNo` int(11)
,`price` int(11)
,`Qty` varchar(50)
,`Contract` varchar(100)
,`invoice` varchar(50)
,`delivery` varchar(50)
,`received` timestamp
,`Supplier` varchar(200)
,`Officer` varchar(61)
);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RID` int(11) NOT NULL,
  `RNO` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `QtyR` varchar(50) NOT NULL,
  `Iuse` varchar(10000) NOT NULL,
  `Designation` varchar(300) NOT NULL,
  `QtyI` varchar(50) DEFAULT NULL,
  `Bal` varchar(20) DEFAULT NULL,
  `Rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Idate` timestamp NULL DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `bar` int(11) NOT NULL,
  `pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `scores`
--
CREATE TABLE `scores` (
`examNo` varchar(20)
,`examStart` timestamp
,`deadline` timestamp
,`examTime` int(11)
,`quizes` int(11)
,`totalMarks` decimal(32,0)
,`unitNo` varchar(20)
,`unit` varchar(200)
,`abbreviation` varchar(30)
,`yos` int(11)
,`sem` int(11)
,`start` timestamp
,`end` timestamp
,`studentID` int(11)
,`student` varchar(152)
,`adm` varchar(50)
,`gender` varchar(10)
,`phone1` varchar(15)
,`mail` varchar(200)
,`marks` double
,`percentage` double(18,1)
,`timeTaken` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `semister`
--

CREATE TABLE `semister` (
  `semisterID` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semister`
--

INSERT INTO `semister` (`semisterID`, `sem`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semisterperiod`
--

CREATE TABLE `semisterperiod` (
  `periodID` int(11) NOT NULL,
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelfID` int(11) NOT NULL,
  `no` varchar(10) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `librarian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staffNo` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `id` varchar(20) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `mail1` varchar(50) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `facultyID` int(11) DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activation` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffNo`, `fname`, `lname`, `sname`, `gender`, `id`, `phone`, `phone1`, `mail`, `mail1`, `category`, `pass`, `facultyID`, `added`, `activation`) VALUES
(1, 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', '1234', '1234', '1234', 'admin@mail.com', NULL, 'Admin', '202cb962ac59075b964b07152d234b70', NULL, '2017-10-30 07:52:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffborrow`
--

CREATE TABLE `staffborrow` (
  `staffborrowID` int(11) NOT NULL,
  `borrowNo` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `dateBorrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `returnDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actualReturnDate` varchar(20) DEFAULT NULL,
  `issuingLibrarian` int(11) DEFAULT NULL,
  `receivingLibrarian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffunit`
--

CREATE TABLE `staffunit` (
  `assignID` int(11) NOT NULL,
  `unitID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `stock1`
--
CREATE TABLE `stock1` (
`PID` int(11)
,`maxpostid` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` varchar(11) DEFAULT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `country` varchar(200) NOT NULL,
  `town` varchar(200) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `preadmitted` timestamp NULL DEFAULT NULL,
  `admitted` timestamp NULL DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `yosID` int(11) DEFAULT NULL,
  `semisterID` int(11) DEFAULT NULL,
  `adm` varchar(50) DEFAULT NULL,
  `password` text,
  `activation` varchar(200) DEFAULT NULL,
  `completed` timestamp NULL DEFAULT NULL,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentborrow`
--

CREATE TABLE `studentborrow` (
  `studentborrowID` int(11) NOT NULL,
  `borrowNo` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `dateBorrowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `returnDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actualReturnDate` varchar(20) DEFAULT NULL,
  `issuingLibrarian` int(11) DEFAULT NULL,
  `receivingLibrarian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentfee`
--

CREATE TABLE `studentfee` (
  `paymentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `feeID` int(11) DEFAULT NULL,
  `amount` varchar(20) NOT NULL,
  `balance` varchar(20) NOT NULL,
  `mop` varchar(20) DEFAULT NULL,
  `dop` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `submitted`
--
CREATE TABLE `submitted` (
`submittedID` int(11)
,`studentID` int(11)
,`assignmentID` int(11)
,`assignment` varchar(200)
,`submitted` timestamp
,`marks` int(11)
,`totalMarks` int(11)
,`percentage` decimal(15,1)
,`staffID` int(11)
,`Marked` timestamp
,`fname` varchar(50)
,`lname` varchar(50)
,`surname` varchar(50)
,`gender` varchar(10)
,`adm` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `submittedassignment`
--

CREATE TABLE `submittedassignment` (
  `submittedID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `assignment` varchar(200) NOT NULL,
  `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marks` int(11) DEFAULT NULL,
  `staffID` int(11) DEFAULT NULL,
  `Marked` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contacts1` varchar(20) NOT NULL,
  `Contacts2` varchar(100) DEFAULT NULL,
  `mail` varchar(300) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `tableID` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `mondayUnit` int(10) DEFAULT NULL,
  `mondayClass` int(11) DEFAULT NULL,
  `tuesdayUnit` int(10) DEFAULT NULL,
  `tuesdayClass` int(11) DEFAULT NULL,
  `wednesdayUnit` int(10) DEFAULT NULL,
  `wednesdayClass` int(11) DEFAULT NULL,
  `thursdayUnit` int(10) DEFAULT NULL,
  `thursdayClass` int(11) DEFAULT NULL,
  `fridayUnit` int(10) DEFAULT NULL,
  `fridayClass` int(11) DEFAULT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `courseID` int(11) NOT NULL,
  `yosID` int(11) DEFAULT NULL,
  `semisterID` int(11) DEFAULT NULL,
  `periodID` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `staffID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitID` int(11) NOT NULL,
  `no` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `abbreviation` varchar(30) DEFAULT NULL,
  `yosID` int(11) DEFAULT NULL,
  `semisterID` int(11) DEFAULT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `unitdetails`
--
CREATE TABLE `unitdetails` (
`unitID` int(11)
,`no` varchar(20)
,`unit` varchar(200)
,`abbreviation` varchar(30)
,`courseID` int(11)
,`yos` int(11)
,`sem` int(11)
,`courseAcronym` varchar(10)
,`course` varchar(200)
,`facultyAcronym` varchar(30)
,`faculty` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `unmarkedassignments`
--
CREATE TABLE `unmarkedassignments` (
`submittedID` int(11)
,`studentID` int(11)
,`assignmentID` int(11)
,`assignment` varchar(200)
,`submitted` timestamp
,`marks` int(11)
,`staffID` int(11)
,`Marked` timestamp
,`fname` varchar(50)
,`lname` varchar(50)
,`surname` varchar(50)
,`gender` varchar(10)
,`adm` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewauthoredbooks`
--
CREATE TABLE `viewauthoredbooks` (
`bookID` int(11)
,`ISBN` varchar(10)
,`title` varchar(100)
,`category` varchar(100)
,`categoryID` int(11)
,`publisher` varchar(100)
,`publisherID` int(11)
,`shelf` varchar(10)
,`shelfID` int(11)
,`Author` varchar(150)
,`authorID` int(11)
,`added` timestamp
,`libralian` varchar(92)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewbooks`
--
CREATE TABLE `viewbooks` (
`bookID` int(11)
,`ISBN` varchar(10)
,`title` varchar(100)
,`category` varchar(100)
,`categoryID` int(11)
,`publisher` varchar(100)
,`publisherID` int(11)
,`shelf` varchar(10)
,`shelfID` int(11)
,`Authors` bigint(21)
,`added` timestamp
,`libralian` varchar(92)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_assignment`
--
CREATE TABLE `view_assignment` (
`assignmentID` int(11)
,`code` varchar(30)
,`title` varchar(200)
,`document` varchar(200)
,`details` text
,`uploaded` timestamp
,`startDate` timestamp
,`deadline` timestamp
,`marks` int(11)
,`YOS` int(11)
,`semister` int(11)
,`unitID` int(11)
,`unit` varchar(200)
,`courseID` int(11)
,`course` varchar(200)
,`abbreviation` varchar(10)
,`faculty` varchar(200)
,`staff` varchar(61)
,`staffNo` varchar(30)
,`staffID` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `voucher`
--
CREATE TABLE `voucher` (
`PID` int(11)
,`name` varchar(500)
,`Capacity` varchar(10)
,`Department` varchar(30)
,`RNO` int(11)
,`Officer` varchar(61)
,`IssuingOfficer` varchar(61)
,`Designation` varchar(300)
,`QtyR` varchar(50)
,`QtyI` varchar(50)
,`Iuse` varchar(10000)
,`Idate` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `yos`
--

CREATE TABLE `yos` (
  `yosID` int(11) NOT NULL,
  `yos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yos`
--

INSERT INTO `yos` (`yosID`, `yos`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Structure for view `admitted`
--
DROP TABLE IF EXISTS `admitted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admitted`  AS  select `s`.`studentID` AS `studentID`,`s`.`surname` AS `surname`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`gender` AS `gender`,`s`.`dob` AS `dob`,(year(curdate()) - year(`s`.`dob`)) AS `age`,`s`.`id` AS `id`,`s`.`phone1` AS `phone1`,`s`.`phone2` AS `phone2`,`s`.`mail` AS `mail`,`s`.`country` AS `country`,`s`.`town` AS `town`,`s`.`status` AS `status`,`s`.`preadmitted` AS `preadmitted`,`s`.`admitted` AS `admitted`,`s`.`courseID` AS `courseID`,`s`.`yosID` AS `yosID`,`s`.`semisterID` AS `semisterID`,`s`.`adm` AS `adm`,`s`.`password` AS `password`,`s`.`staffID` AS `staffID`,`f`.`name` AS `faculty`,`f`.`abbreviation` AS `facultyAbbreviation`,`c`.`name` AS `course`,`c`.`abbreviation` AS `courseAbbreviation`,`y`.`yos` AS `yos`,`sm`.`sem` AS `sem` from ((((`student` `s` left join `course` `c` on((`s`.`courseID` = `c`.`courseID`))) left join `yos` `y` on((`s`.`yosID` = `y`.`yosID`))) left join `semister` `sm` on((`s`.`semisterID` = `sm`.`semisterID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) where (`s`.`status` = 'Admitted') order by `s`.`studentID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `alumni`
--
DROP TABLE IF EXISTS `alumni`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumni`  AS  select `s`.`studentID` AS `studentID`,`s`.`surname` AS `surname`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`gender` AS `gender`,`s`.`dob` AS `dob`,(year(curdate()) - year(`s`.`dob`)) AS `age`,`s`.`id` AS `id`,`s`.`phone1` AS `phone1`,`s`.`phone2` AS `phone2`,`s`.`mail` AS `mail`,`s`.`country` AS `country`,`s`.`town` AS `town`,`s`.`status` AS `status`,`s`.`preadmitted` AS `preadmitted`,`s`.`admitted` AS `admitted`,`s`.`courseID` AS `courseID`,`s`.`yosID` AS `yosID`,`s`.`semisterID` AS `semisterID`,`s`.`adm` AS `adm`,`s`.`password` AS `password`,`s`.`staffID` AS `staffID`,`f`.`name` AS `faculty`,`c`.`name` AS `course`,`y`.`yos` AS `yos`,`sm`.`sem` AS `sem`,`s`.`completed` AS `completed` from ((((`student` `s` left join `course` `c` on((`s`.`courseID` = `c`.`courseID`))) left join `yos` `y` on((`s`.`yosID` = `y`.`yosID`))) left join `semister` `sm` on((`s`.`semisterID` = `sm`.`semisterID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) where (`s`.`status` = 'Completed') order by `s`.`studentID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `assignedunit`
--
DROP TABLE IF EXISTS `assignedunit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `assignedunit`  AS  select `u`.`unitID` AS `unitID`,`u`.`no` AS `code`,`u`.`name` AS `unit`,`u`.`no` AS `unitNumber`,`y`.`yos` AS `YOS`,`sm`.`sem` AS `sem`,`c`.`name` AS `course`,`l`.`level` AS `level`,`f`.`name` AS `faculty`,`s`.`staffID` AS `staffID`,`s`.`staffNo` AS `staffNo`,concat(`s`.`fname`,' ',`s`.`lname`,' ',`s`.`sname`) AS `name` from (((((((`staffunit` `t` left join `staff` `s` on((`t`.`staffID` = `s`.`staffID`))) left join `unit` `u` on((`t`.`unitID` = `u`.`unitID`))) left join `yos` `y` on((`u`.`yosID` = `y`.`yosID`))) left join `course` `c` on((`u`.`courseID` = `c`.`courseID`))) left join `semister` `sm` on((`u`.`semisterID` = `sm`.`semisterID`))) left join `level` `l` on((`c`.`levelID` = `l`.`levelID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `assignedunits`
--
DROP TABLE IF EXISTS `assignedunits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `assignedunits`  AS  select `a`.`assignID` AS `assignID`,`u`.`unitID` AS `unitID`,`u`.`no` AS `no`,`u`.`name` AS `unit`,`u`.`abbreviation` AS `abbreviation`,`u`.`yosID` AS `yosID`,`u`.`semisterID` AS `semisterID`,`c`.`name` AS `course`,`s`.`staffID` AS `staffID`,`s`.`staffNo` AS `staffNo`,concat(`s`.`fname`,' ',`s`.`lname`,' ',`s`.`sname`) AS `staff` from (((`staffunit` `a` left join `staff` `s` on((`a`.`staffID` = `s`.`staffID`))) left join `unit` `u` on((`a`.`unitID` = `u`.`unitID`))) left join `course` `c` on((`u`.`courseID` = `c`.`courseID`))) order by `u`.`name` ;

-- --------------------------------------------------------

--
-- Structure for view `card`
--
DROP TABLE IF EXISTS `card`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `card`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `Item`,`s`.`name` AS `Supplier`,`l`.`Qty` AS `QtyReceived`,`l`.`price` AS `price`,(`l`.`Qty` * `l`.`price`) AS `Total`,`l`.`No` AS `ReceiveNo`,`l`.`received` AS `dateReceived`,`r`.`RNO` AS `RNO`,`r`.`Rdate` AS `Rdate`,`f`.`Abbrev` AS `ROffice`,`r`.`QtyI` AS `QtyI`,(`l`.`Qty` - `r`.`QtyI`) AS `Balance` from (((((`product` `p` left join `productsupplied` `l` on((`l`.`PID` = `p`.`PID`))) left join `supplier` `s` on((`l`.`SID` = `s`.`SID`))) left join `request` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) left join `faculty` `f` on((`t`.`facultyID` = `f`.`facultyID`))) where ((`l`.`PSID` <> '') and (`r`.`QtyI` > 0)) order by `l`.`PSID`,`r`.`RID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `markedassignments`
--
DROP TABLE IF EXISTS `markedassignments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `markedassignments`  AS  select `sub`.`submittedID` AS `submittedID`,`sub`.`studentID` AS `studentID`,`sub`.`assignmentID` AS `assignmentID`,`sub`.`assignment` AS `assignment`,`sub`.`submitted` AS `submitted`,`sub`.`marks` AS `marks`,`sub`.`staffID` AS `staffID`,`sub`.`Marked` AS `Marked`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`surname` AS `surname`,`s`.`gender` AS `gender`,`s`.`adm` AS `adm` from ((`submittedassignment` `sub` left join `student` `s` on((`sub`.`studentID` = `s`.`studentID`))) left join `assignment` `a` on((`sub`.`assignmentID` = `a`.`assignmentID`))) where (`sub`.`submittedID` in (select max(`submittedassignment`.`submittedID`) from `submittedassignment` group by `submittedassignment`.`studentID`) and (`sub`.`submitted` >= `a`.`startDate`) and (`sub`.`submitted` <= `a`.`deadline`) and (`sub`.`marks` is not null)) group by `sub`.`studentID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `preadmitted`
--
DROP TABLE IF EXISTS `preadmitted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `preadmitted`  AS  select `s`.`studentID` AS `studentID`,`s`.`surname` AS `surname`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`gender` AS `gender`,`s`.`dob` AS `dob`,(year(curdate()) - year(`s`.`dob`)) AS `age`,`s`.`id` AS `id`,`s`.`phone1` AS `phone1`,`s`.`phone2` AS `phone2`,`s`.`mail` AS `mail`,`s`.`country` AS `country`,`s`.`town` AS `town`,`s`.`status` AS `status`,`s`.`preadmitted` AS `preadmitted`,`s`.`admitted` AS `admitted`,`s`.`courseID` AS `courseID`,`s`.`yosID` AS `yosID`,`s`.`semisterID` AS `semisterID`,`s`.`adm` AS `adm`,`s`.`password` AS `password`,`s`.`staffID` AS `staffID`,`f`.`name` AS `faculty`,`c`.`name` AS `course`,`y`.`yos` AS `yos`,`sm`.`sem` AS `sem` from ((((`student` `s` left join `course` `c` on((`s`.`courseID` = `c`.`courseID`))) left join `yos` `y` on((`s`.`yosID` = `y`.`yosID`))) left join `semister` `sm` on((`s`.`semisterID` = `sm`.`semisterID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) where (`s`.`status` = 'Pre-Admitted') order by `s`.`studentID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `product_stock`
--
DROP TABLE IF EXISTS `product_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_stock`  AS  select `s1`.`PSID` AS `PSID`,`s1`.`SID` AS `SID`,`s1`.`PID` AS `PID`,`s1`.`received` AS `dateReceived`,`s1`.`Qty` AS `Qty`,`s1`.`Bal1` AS `Bal1`,`s1`.`Bal2` AS `Bal2` from (`productsupplied` `s1` join `stock1` `s2` on((`s1`.`PSID` = `s2`.`maxpostid`))) ;

-- --------------------------------------------------------

--
-- Structure for view `receipt`
--
DROP TABLE IF EXISTS `receipt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `receipt`  AS  select `p`.`PID` AS `ProductID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`r`.`PSID` AS `PSID`,`r`.`No` AS `receiptNo`,`r`.`price` AS `price`,`r`.`Qty` AS `Qty`,`r`.`contract` AS `Contract`,`r`.`invoice` AS `invoice`,`r`.`delivery` AS `delivery`,`r`.`received` AS `received`,`s`.`name` AS `Supplier`,concat(`a`.`fname`,' ',`a`.`sname`) AS `Officer` from (((`product` `p` left join `productsupplied` `r` on((`r`.`PID` = `p`.`PID`))) left join `staff` `a` on((`r`.`staffID` = `a`.`staffID`))) left join `supplier` `s` on((`r`.`SID` = `s`.`SID`))) where (`r`.`PSID` > 0) ;

-- --------------------------------------------------------

--
-- Structure for view `scores`
--
DROP TABLE IF EXISTS `scores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `scores`  AS  select `e`.`examNo` AS `examNo`,`e`.`start` AS `examStart`,`e`.`deadline` AS `deadline`,`e`.`time` AS `examTime`,`e`.`no_of_quizes` AS `quizes`,sum(`q`.`marks`) AS `totalMarks`,`u`.`no` AS `unitNo`,`u`.`name` AS `unit`,`u`.`abbreviation` AS `abbreviation`,`u`.`yosID` AS `yos`,`u`.`semisterID` AS `sem`,`p`.`start` AS `start`,`p`.`end` AS `end`,`s`.`studentID` AS `studentID`,concat(`s`.`fname`,' ',`s`.`lname`,' ',coalesce(`s`.`surname`,'')) AS `student`,`s`.`adm` AS `adm`,`s`.`gender` AS `gender`,`s`.`phone1` AS `phone1`,`s`.`mail` AS `mail`,sum(`m`.`marks`) AS `marks`,round(((sum(`m`.`marks`) * 100) / sum(`q`.`marks`)),1) AS `percentage`,`m`.`time` AS `timeTaken` from (((((`marks` `m` left join `student` `s` on((`m`.`studentID` = `s`.`studentID`))) left join `quiz` `q` on((`m`.`quizID` = `q`.`quizID`))) left join `exam` `e` on((`q`.`examNo` = `e`.`examNo`))) left join `unit` `u` on((`e`.`unitID` = `u`.`unitID`))) left join `semisterperiod` `p` on((`e`.`periodID` = `p`.`periodID`))) group by `e`.`examNo`,`s`.`studentID` ;

-- --------------------------------------------------------

--
-- Structure for view `stock1`
--
DROP TABLE IF EXISTS `stock1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stock1`  AS  select `s1`.`PID` AS `PID`,max(`s1`.`PSID`) AS `maxpostid` from `productsupplied` `s1` group by `s1`.`PID` ;

-- --------------------------------------------------------

--
-- Structure for view `submitted`
--
DROP TABLE IF EXISTS `submitted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `submitted`  AS  select `sub`.`submittedID` AS `submittedID`,`sub`.`studentID` AS `studentID`,`sub`.`assignmentID` AS `assignmentID`,`sub`.`assignment` AS `assignment`,`sub`.`submitted` AS `submitted`,`sub`.`marks` AS `marks`,`a`.`marks` AS `totalMarks`,round(((`sub`.`marks` * 100) / sum(`a`.`marks`)),1) AS `percentage`,`sub`.`staffID` AS `staffID`,`sub`.`Marked` AS `Marked`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`surname` AS `surname`,`s`.`gender` AS `gender`,`s`.`adm` AS `adm` from ((`submittedassignment` `sub` left join `student` `s` on((`sub`.`studentID` = `s`.`studentID`))) left join `assignment` `a` on((`sub`.`assignmentID` = `a`.`assignmentID`))) where (`sub`.`submittedID` in (select max(`submittedassignment`.`submittedID`) from `submittedassignment` group by `submittedassignment`.`studentID`) and (`sub`.`submitted` >= `a`.`startDate`) and (`sub`.`submitted` <= `a`.`deadline`)) group by `sub`.`submittedID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `unitdetails`
--
DROP TABLE IF EXISTS `unitdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `unitdetails`  AS  select `u`.`unitID` AS `unitID`,`u`.`no` AS `no`,`u`.`name` AS `unit`,`u`.`abbreviation` AS `abbreviation`,`u`.`courseID` AS `courseID`,`y`.`yos` AS `yos`,`sm`.`sem` AS `sem`,`c`.`abbreviation` AS `courseAcronym`,`c`.`name` AS `course`,`f`.`abbreviation` AS `facultyAcronym`,`f`.`name` AS `faculty` from ((((`unit` `u` left join `yos` `y` on((`u`.`yosID` = `y`.`yosID`))) left join `semister` `sm` on((`u`.`semisterID` = `sm`.`semisterID`))) left join `course` `c` on((`u`.`courseID` = `c`.`courseID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `unmarkedassignments`
--
DROP TABLE IF EXISTS `unmarkedassignments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `unmarkedassignments`  AS  select `sub`.`submittedID` AS `submittedID`,`sub`.`studentID` AS `studentID`,`sub`.`assignmentID` AS `assignmentID`,`sub`.`assignment` AS `assignment`,`sub`.`submitted` AS `submitted`,`sub`.`marks` AS `marks`,`sub`.`staffID` AS `staffID`,`sub`.`Marked` AS `Marked`,`s`.`fname` AS `fname`,`s`.`lname` AS `lname`,`s`.`surname` AS `surname`,`s`.`gender` AS `gender`,`s`.`adm` AS `adm` from ((`submittedassignment` `sub` left join `student` `s` on((`sub`.`studentID` = `s`.`studentID`))) left join `assignment` `a` on((`sub`.`assignmentID` = `a`.`assignmentID`))) where (`sub`.`submittedID` in (select max(`submittedassignment`.`submittedID`) from `submittedassignment` group by `submittedassignment`.`studentID`) and (`sub`.`submitted` >= `a`.`startDate`) and (`sub`.`submitted` <= `a`.`deadline`) and isnull(`sub`.`marks`)) group by `sub`.`studentID` desc ;

-- --------------------------------------------------------

--
-- Structure for view `viewauthoredbooks`
--
DROP TABLE IF EXISTS `viewauthoredbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewauthoredbooks`  AS  select `b`.`bookID` AS `bookID`,`b`.`ISBN` AS `ISBN`,`b`.`title` AS `title`,`c`.`name` AS `category`,`c`.`categoryID` AS `categoryID`,`p`.`name` AS `publisher`,`p`.`publisherID` AS `publisherID`,`s`.`no` AS `shelf`,`s`.`shelfID` AS `shelfID`,`a`.`name` AS `Author`,`a`.`authorID` AS `authorID`,`b`.`added` AS `added`,concat(`st`.`fname`,' ',`st`.`lname`,' ',`st`.`sname`) AS `libralian` from ((((((`book` `b` left join `shelf` `s` on((`b`.`shelfID` = `s`.`shelfID`))) left join `category` `c` on((`b`.`categoryID` = `c`.`categoryID`))) left join `publisher` `p` on((`b`.`publisherID` = `p`.`publisherID`))) left join `staff` `st` on((`b`.`librarian` = `st`.`staffID`))) left join `authoredbook` `ab` on((`ab`.`bookID` = `b`.`bookID`))) left join `author` `a` on((`ab`.`authorID` = `a`.`authorID`))) order by `b`.`title` ;

-- --------------------------------------------------------

--
-- Structure for view `viewbooks`
--
DROP TABLE IF EXISTS `viewbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewbooks`  AS  select `b`.`bookID` AS `bookID`,`b`.`ISBN` AS `ISBN`,`b`.`title` AS `title`,`c`.`name` AS `category`,`c`.`categoryID` AS `categoryID`,`p`.`name` AS `publisher`,`p`.`publisherID` AS `publisherID`,`s`.`no` AS `shelf`,`s`.`shelfID` AS `shelfID`,count(`ab`.`authorID`) AS `Authors`,`b`.`added` AS `added`,concat(`st`.`fname`,' ',`st`.`lname`,' ',`st`.`sname`) AS `libralian` from ((((((`book` `b` left join `shelf` `s` on((`b`.`shelfID` = `s`.`shelfID`))) left join `category` `c` on((`b`.`categoryID` = `c`.`categoryID`))) left join `publisher` `p` on((`b`.`publisherID` = `p`.`publisherID`))) left join `staff` `st` on((`b`.`librarian` = `st`.`staffID`))) left join `authoredbook` `ab` on((`ab`.`bookID` = `b`.`bookID`))) left join `author` `a` on((`ab`.`authorID` = `a`.`authorID`))) group by `b`.`bookID` order by `b`.`title` ;

-- --------------------------------------------------------

--
-- Structure for view `view_assignment`
--
DROP TABLE IF EXISTS `view_assignment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_assignment`  AS  select `a`.`assignmentID` AS `assignmentID`,`a`.`code` AS `code`,`a`.`title` AS `title`,`a`.`document` AS `document`,`a`.`details` AS `details`,`a`.`uploaded` AS `uploaded`,`a`.`startDate` AS `startDate`,`a`.`deadline` AS `deadline`,`a`.`marks` AS `marks`,`y`.`yos` AS `YOS`,`sm`.`sem` AS `semister`,`u`.`unitID` AS `unitID`,`u`.`name` AS `unit`,`c`.`courseID` AS `courseID`,`c`.`name` AS `course`,`c`.`abbreviation` AS `abbreviation`,`f`.`name` AS `faculty`,concat(`s`.`fname`,' ',`s`.`lname`) AS `staff`,`s`.`staffNo` AS `staffNo`,`s`.`staffID` AS `staffID` from ((((((`assignment` `a` left join `staff` `s` on((`a`.`staffID` = `s`.`staffID`))) left join `unit` `u` on((`a`.`unitID` = `u`.`unitID`))) left join `yos` `y` on((`u`.`yosID` = `y`.`yosID`))) left join `semister` `sm` on((`u`.`semisterID` = `sm`.`semisterID`))) left join `course` `c` on((`u`.`courseID` = `c`.`courseID`))) left join `faculty` `f` on((`c`.`facultyID` = `f`.`facultyID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `voucher`
--
DROP TABLE IF EXISTS `voucher`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `voucher`  AS  select `p`.`PID` AS `PID`,`p`.`name` AS `name`,`p`.`Capacity` AS `Capacity`,`f`.`abbreviation` AS `Department`,`r`.`RNO` AS `RNO`,concat(`t`.`fname`,' ',`t`.`sname`) AS `Officer`,concat(`s`.`fname`,' ',`s`.`sname`) AS `IssuingOfficer`,`r`.`Designation` AS `Designation`,`r`.`QtyR` AS `QtyR`,`r`.`QtyI` AS `QtyI`,`r`.`Iuse` AS `Iuse`,`r`.`Idate` AS `Idate` from ((((`request` `r` left join `product` `p` on((`r`.`PID` = `p`.`PID`))) left join `staff` `t` on((`r`.`staffID` = `t`.`staffID`))) left join `faculty` `f` on((`t`.`facultyID` = `f`.`facultyID`))) left join `staff` `s` on((`r`.`pro` = `s`.`staffID`))) where (`r`.`QtyI` > 0) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `authoredbook`
--
ALTER TABLE `authoredbook`
  ADD PRIMARY KEY (`authored_book_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `coursework`
--
ALTER TABLE `coursework`
  ADD PRIMARY KEY (`CWID`),
  ADD UNIQUE KEY `doc` (`doc`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`dayID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`),
  ADD UNIQUE KEY `examNo` (`examNo`);

--
-- Indexes for table `exam_login`
--
ALTER TABLE `exam_login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`feeID`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelID`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`markID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `productsupplied`
--
ALTER TABLE `productsupplied`
  ADD PRIMARY KEY (`PSID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `semister`
--
ALTER TABLE `semister`
  ADD PRIMARY KEY (`semisterID`),
  ADD UNIQUE KEY `sem` (`sem`);

--
-- Indexes for table `semisterperiod`
--
ALTER TABLE `semisterperiod`
  ADD PRIMARY KEY (`periodID`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelfID`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `staffNo` (`staffNo`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `staffborrow`
--
ALTER TABLE `staffborrow`
  ADD PRIMARY KEY (`staffborrowID`);

--
-- Indexes for table `staffunit`
--
ALTER TABLE `staffunit`
  ADD PRIMARY KEY (`assignID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `phone1` (`phone1`);

--
-- Indexes for table `studentborrow`
--
ALTER TABLE `studentborrow`
  ADD PRIMARY KEY (`studentborrowID`);

--
-- Indexes for table `studentfee`
--
ALTER TABLE `studentfee`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `submittedassignment`
--
ALTER TABLE `submittedassignment`
  ADD PRIMARY KEY (`submittedID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SID`),
  ADD UNIQUE KEY `contacts1` (`contacts1`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`tableID`),
  ADD UNIQUE KEY `no` (`no`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitID`);

--
-- Indexes for table `yos`
--
ALTER TABLE `yos`
  ADD PRIMARY KEY (`yosID`),
  ADD UNIQUE KEY `yos` (`yos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `authoredbook`
--
ALTER TABLE `authoredbook`
  MODIFY `authored_book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `coursework`
--
ALTER TABLE `coursework`
  MODIFY `CWID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
  MODIFY `dayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exam_login`
--
ALTER TABLE `exam_login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `feeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `markID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `productsupplied`
--
ALTER TABLE `productsupplied`
  MODIFY `PSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `semister`
--
ALTER TABLE `semister`
  MODIFY `semisterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semisterperiod`
--
ALTER TABLE `semisterperiod`
  MODIFY `periodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `staffborrow`
--
ALTER TABLE `staffborrow`
  MODIFY `staffborrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staffunit`
--
ALTER TABLE `staffunit`
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `studentborrow`
--
ALTER TABLE `studentborrow`
  MODIFY `studentborrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentfee`
--
ALTER TABLE `studentfee`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `submittedassignment`
--
ALTER TABLE `submittedassignment`
  MODIFY `submittedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `yos`
--
ALTER TABLE `yos`
  MODIFY `yosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
