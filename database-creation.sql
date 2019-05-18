SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Halligan-Web-Development`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblContactPage`
--

CREATE TABLE `tblContactPage` (
  `pmkContactId` int(11) NOT NULL,
  `fldName` varchar(50) NOT NULL,
  `fldPhone` varchar(15) NOT NULL,
  `fldEmail` text NOT NULL,
  `fldComments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblContactPage`
--

INSERT INTO `tblContactPage` (`pmkContactId`, `fldFirstName`, `fldLastName`, `fldEmail`, `fldComments`) VALUES
(1, 'Nana', '2032652511', 'nnimako@uvm.edu', 'this is a test'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblContactPage`
--
ALTER TABLE `tblContactPage`
  ADD PRIMARY KEY (`pmkContactId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblContactPage`
--
ALTER TABLE `tblContactPage`
  MODIFY `pmkContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
