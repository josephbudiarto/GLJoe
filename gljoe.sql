-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 05:46 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gljoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status_acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `transaksi_id`, `item`, `quantity`, `description`, `status_acc`) VALUES
(1, 7, 'Spaghetti Carbonara', 0, '', 1),
(2, 7, 'Fettuccine Alfredo', 0, '', 1),
(3, 7, 'Meatlover', 0, '', 1),
(4, 8, 'Chicken Wings', 0, '', 1),
(5, 8, 'Garlic Bread', 0, '', 1),
(6, 8, 'Coca Cola', 0, '', 1),
(7, 8, 'Lasagna', 0, '', 1),
(8, 8, 'Spaghetti Carbonara', 0, '', 1),
(9, 8, 'Fettuccine Alfredo', 0, '', 1),
(10, 8, 'Meatlover', 0, '', 1),
(11, 9, 'Tuna Melt', 0, '', 1),
(12, 9, 'Super Supreme', 0, '', 1),
(13, 9, 'Garlic Bread', 0, '', 1),
(14, 10, 'Cheese Burger', 0, '', 1),
(15, 11, 'Spaghetti Carbonara', 0, '', 1),
(16, 11, 'Fettuccine Alfredo', 0, '', 1),
(17, 12, 'Garlic Bread', 0, '', 1),
(18, 12, 'Chicken Wings', 0, '', 1),
(19, 13, 'Garlic Bread', 0, '', 1),
(20, 13, 'Chicken Wings', 0, '', 1),
(23, 17, 'Spaghetti Carbonara', 0, '', 1),
(24, 17, 'Super Supreme', 0, 'M', 1),
(25, 18, 'Meatlover', 0, 'M', 1),
(26, 18, 'GL JOE Special', 0, 'L', 1),
(27, 18, 'Coca Cola', 0, '', 1),
(28, 18, 'Orange Juice', 0, '', 1),
(29, 18, 'Iced Tea', 0, '', 1),
(32, 26, 'Pizza Custom', 0, 'L# A[tomato mushroom saussage bacil GLJoe Special ] B[mushroom GLJoe Special ] C[mushroom Cheesy Bites ] D[tomato mushroom GLJoe Special ] ', 1),
(33, 27, 'Spaghetti Carbonara', 3, '# ', 1),
(34, 27, 'Fettuccine Alfredo', 1, '# ', 1),
(35, 28, 'Super Supreme', 1, 'L# ', 1),
(36, 29, 'Pizza Custom', 1, 'M# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(37, 29, 'Pizza Custom', 0, 'M# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(38, 29, 'Pizza Custom', 0, 'M# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(39, 29, 'Pizza Custom', 1, 'L# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(40, 29, 'Pizza Custom', 0, 'L# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(41, 29, 'Pizza Custom', 0, 'L# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(42, 30, 'Pizza Custom', 1, 'L# A[mushroom Cheesy Bites GLJoe Special ] B[saussage bacil Cheesy Bites ] C[tomato Cheesy Bites GLJoe Special ] D[tomato mushroom saussage bacil GLJoe Special ] ', 0),
(43, 32, 'Pizza Custom', 1, 'M# A[bacil Cheesy Bites ] B[] C[] D[] ', 1),
(44, 32, 'GL JOE Special', 1, 'M# ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `topping_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `member_id`, `date`, `time`) VALUES
(5, 1, '2016-04-30', '04:49:33'),
(6, 3, '2016-04-30', '04:50:24'),
(7, 1, '2016-04-30', '09:58:00'),
(8, 1, '2016-05-14', '12:15:07'),
(9, 1, '2016-05-14', '12:16:31'),
(10, 1, '2016-05-16', '03:56:54'),
(11, 1, '2016-05-16', '04:52:48'),
(12, 1, '2016-05-16', '04:52:58'),
(13, 1, '2016-05-16', '05:02:16'),
(14, 1, '2016-05-16', '05:03:25'),
(15, 1, '2016-05-16', '05:19:20'),
(16, 1, '2016-05-16', '05:19:49'),
(17, 1, '2016-05-20', '08:59:30'),
(18, 1, '2016-05-22', '07:46:12'),
(19, 3, '2016-05-22', '10:17:33'),
(20, 3, '2016-05-22', '10:18:12'),
(21, 1, '2016-05-22', '10:26:01'),
(22, 3, '2016-05-23', '10:15:27'),
(23, 7, '2016-05-23', '12:51:33'),
(24, 1, '2016-05-23', '04:49:47'),
(25, 1, '2016-05-26', '10:23:22'),
(26, 1, '2016-05-26', '10:25:00'),
(27, 1, '2016-05-28', '05:22:00'),
(28, 1, '2016-05-30', '07:43:51'),
(29, 1, '2016-06-08', '04:51:16'),
(30, 1, '2016-06-08', '04:54:35'),
(31, 1, '2016-06-08', '04:55:27'),
(32, 3, '2016-06-08', '04:58:44'),
(33, 3, '2016-06-08', '05:04:01'),
(34, 3, '2016-06-08', '05:05:01'),
(35, 3, '2016-06-10', '09:50:23'),
(36, 3, '2016-06-10', '09:51:03'),
(37, 2, '2016-06-10', '09:55:57'),
(38, 3, '2016-06-10', '10:25:11'),
(39, 2, '2016-06-10', '10:27:45'),
(40, 3, '2016-06-10', '10:28:06'),
(41, 1, '2016-06-10', '10:28:21'),
(42, 2, '2016-06-10', '10:48:25'),
(43, 11, '2016-06-10', '11:05:14'),
(44, 1, '2016-06-10', '11:33:06'),
(45, 1, '2016-06-10', '11:59:46'),
(46, 1, '2016-06-10', '03:22:07'),
(47, 1, '2016-06-10', '05:51:54'),
(48, 1, '2016-06-11', '01:49:31'),
(49, 1, '2016-06-11', '09:58:13'),
(50, 1, '2016-06-13', '07:19:35'),
(51, 1, '2016-06-13', '07:21:55'),
(52, 3, '2016-06-16', '09:34:02'),
(53, 3, '2016-06-16', '10:04:06'),
(54, 3, '2016-06-20', '09:04:42'),
(55, 1, '2016-06-21', '09:41:05'),
(56, 3, '2016-06-21', '11:19:41'),
(57, 1, '2016-06-21', '11:19:49'),
(58, 1, '2016-06-21', '11:45:49'),
(59, 1, '2016-06-21', '11:47:29'),
(60, 1, '2016-06-21', '12:00:02'),
(61, 1, '2016-06-21', '12:03:33'),
(62, 1, '2016-06-21', '12:04:55'),
(63, 1, '2016-06-22', '03:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `username`, `password`, `email`, `no_telp`, `alamat`) VALUES
(1, 'Joseph', 'joe', '123', 'm26414027@john.petra.ac.id', '0815170', 'sby'),
(2, 'Gloria', 'gloriastefani', '123', 'm26414020@john.petra.ac.id', '081xxx', 'tralalalalla'),
(3, 'Liliana', 'liliana', '123', 'm26414087@john.petra.ac.id', '0878xxxx', 'manggis'),
(4, 'Andre', 'stardust', '123', 'm26414004@john.petra.ac.id', '081xxxxxx', 'Stikom'),
(5, 'David', 'dewe', '123', 'm26414093@john.petra.ac.id', '08888ccxxxxx', 'WaterPlace'),
(6, 'Darian', 'darian', '123', 'm26414035@john.petra.ac.id', '081xxxxx', 'jauh'),
(7, 'Andrew', 'andrew', '123', 'andrew@google.com', '08xxxxxxx', 'dalam kota'),
(8, 'Dummy', 'dummy', '123', 'dummy@gmail.com', '0987654321', 'dummy'),
(9, 'biskuit', 'biskuit', 'biskuit', 'biskuit@email.com', '0812225555', 'lalalala'),
(10, 'apa ini', 'apaini', 'apaini', 'apaini@yahoo.com', '08776666777', 'apaaaa'),
(11, 'gajah', 'gajah', 'gajah', 'gajah@gmail.com', '08999991111', 'gajah di hutan'),
(12, 'Pizza', 'pizza', '123', 'pizza@gmail.com', '08191224', 'pizza town af'),
(13, 'Etcetera', 'etc', '123', 'etc@gmail.com', '081372', 'queceracera'),
(14, 'Kucing', 'kucing', '123', 'kucing@gmail.com', '081547', 'CAT town');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `other_id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`other_id`, `nama`, `harga`, `image`, `description`, `category`) VALUES
(1, 'Lasagna', 75000, 'lasagna.jpg', 'So good your mouth will water', 'pasta'),
(2, 'Spaghetti Carbonara', 50000, 'carbonara.jpg', 'It''s delicious and it will remind you of home.', 'pasta'),
(3, 'Fettuccine Alfredo', 55000, 'fettuccine.jpg', 'It''s a pasta dish made from fettuccine tossed with Parmesan cheese and butter', 'pasta'),
(4, 'Chicken Wings', 45000, 'chicken.jpg', 'The best chicken wings ever and its deliciousness will make everyone addicted', 'snack'),
(5, 'Garlic Bread', 30000, 'garlic.jpg', 'You can really taste the garlic; plus its toasted', 'snack'),
(6, 'Iced Tea', 10000, 'tea.jpg', 'Regular tea but with ice', 'drink'),
(7, 'Coca Cola', 15000, 'cola.jpg', 'Really nice carbonated drinks', 'drink'),
(8, 'Orange Juice', 15000, 'orange.jpg', 'Its refreshing', 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `nama`, `harga`, `image`, `description`, `detail_id`) VALUES
(1, 'Meatlover', 81000, 'meat.jpg', 'Meat Lover is a Pizza with lots of meat. There are some mushrooms and tomato and some oregano.', 0),
(2, 'Super Supreme', 75000, 'super.jpg', 'Super Supreme Pizza', 0),
(3, 'GL JOE Special', 100000, 'Pizza_HD3.jpg', 'Special recipe from GL Joe', 0),
(4, 'Tuna Melt', 85000, 'tuna.jpg', 'This pizza is for the ones who loves tuna. Tuna Melt is one of the best pizza there is which consist of tuna, corn, mayo, onion, and cheese.', 0),
(5, 'Cheese Burger', 100000, 'cheese.jpg', 'Can''t decide between a cheese burger or a pizza ? Well now we have the answer. Cheese Burger Pizza taste like both a cheese burger and a pizza. Very Delicious and recommended', 0),
(6, 'Cheese Supreme', 90000, 'plain.jpg', 'LOTS of CHEESE !!!!! Kingdom of Cheese. For the ones who love Cheese.', 0),
(15, 'Black Olives', 85000, 'olives.jpg', 'The Best Pizza Ever !!!!', 0),
(16, 'Pizza lalala', 100000, '888.png', 'lalaal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size` varchar(5) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size`, `price`) VALUES
('S', 50),
('M', 80),
('L', 100);

-- --------------------------------------------------------

--
-- Table structure for table `topping`
--

CREATE TABLE `topping` (
  `topping_id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topping`
--

INSERT INTO `topping` (`topping_id`, `nama`, `harga`, `image`, `type`) VALUES
(2, 'tomato', 1000, 'top1.png', 'topping'),
(3, 'mushroom', 2000, 'mush.png', 'topping'),
(4, 'saussage', 5000, 'sosis.png', 'topping'),
(5, 'bacil', 500, 'sayur.png', 'topping'),
(6, 'Cheesy Bites', 10000, 'crust1.png', 'crust'),
(7, 'GLJoe Special', 3000, 'sauce.png', 'sauce'),
(8, 'Mozzarella', 50000, 'moza.png', 'sauce');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `new_alamat` varchar(30) NOT NULL,
  `new_telepon` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `credit_card` varchar(15) NOT NULL,
  `total` int(11) NOT NULL,
  `status_acc` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `member_id`, `new_alamat`, `new_telepon`, `tanggal`, `credit_card`, `total`, `status_acc`) VALUES
(7, 1, 'sby', '087851', '2016-04-30', '794856321548633', 186780, 1),
(8, 1, 'sby', '087851', '2016-05-22', '794856321548633', 386100, 1),
(9, 3, 'manggis', '0878xxxx', '2016-06-10', '794856321548633', 223300, 1),
(10, 2, 'tralalalalla', '081xxx', '2016-06-10', '794856321548633', 550000, 1),
(11, 2, 'tralalalalla', '081xxx', '2016-06-10', '794856321548633', 115500, 1),
(12, 2, 'tralalalalla', '081xxx', '2016-06-10', '794856321548633', 165000, 1),
(13, 2, 'tralalalalla', '081xxx', '2016-06-10', '794856321548633', 148500, 1),
(17, 1, 'sby', '087851', '2016-06-10', '794856321548633', 121000, 1),
(18, 1, 'sby', '087851', '2016-06-10', '794856321548633', 252780, 1),
(19, 1, 'sby', '087851', '2016-06-10', '794856321548633', 100513, 1),
(20, 1, 'sby', '087851', '2016-06-10', '794856321548633', 43588, 1),
(21, 1, 'sby', '087851', '2016-06-10', '794856321548633', 44413, 1),
(22, 1, 'sby', '087851', '2016-06-10', '794856321548633', 41663, 1),
(23, 1, 'sby', '087851', '2016-06-10', '794856321548633', 75488, 1),
(26, 1, 'sby', '087851', '2016-06-10', '794856321548633', 51975, 1),
(27, 1, 'sby', '087851', '2016-06-11', '794856321548633', 225500, 1),
(28, 1, 'sby', '087851', '2016-06-11', '794856321548633', 82500, 1),
(29, 1, 'sby', '087851', '2016-06-13', '794856321548633', 90200, 0),
(30, 1, 'sby', '087851', '2016-06-13', '794856321548633', 94600, 0),
(31, 3, 'manggis', '0878xxxx', '2016-06-16', '8474651928374', 168300, 0),
(32, 3, 'manggis', '0878xxxx', '2016-06-16', '794856321548633', 161150, 1),
(33, 1, 'sby', '087851', '2016-06-21', '794856321548633', 471625, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`other_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indexes for table `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`topping_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `topping`
--
ALTER TABLE `topping`
  MODIFY `topping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
