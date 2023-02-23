-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 05:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-07-07 04:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createdate` timestamp NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `createdate`, `updatedate`, `category`) VALUES
(17, 'Shirt', '2022-08-05 23:05:30', NULL, 'mensware'),
(18, 'Pant', '2022-08-05 23:05:36', NULL, 'mensware'),
(19, 'Shoes', '2022-08-05 23:05:43', NULL, 'mensware'),
(20, 'T-Shirt', '2022-08-05 23:05:49', NULL, 'mensware'),
(21, 'Gym Shorts', '2022-08-05 23:05:54', NULL, 'mensware'),
(22, 'Shirt', '2022-08-05 23:06:04', NULL, 'womensware'),
(30, 'Pant', '2022-08-05 23:06:58', NULL, 'kidsware'),
(31, 'Shoes', '2022-08-05 23:07:04', NULL, 'kidsware'),
(32, 'T-Shirt', '2022-08-05 23:07:11', NULL, 'kidsware'),
(33, 'One Piece', '2022-08-05 23:07:17', NULL, 'kidsware'),
(34, 'T-Shirt', '2022-08-05 23:09:44', NULL, 'womensware'),
(35, 'Pant', '2022-08-05 23:09:51', NULL, 'womensware'),
(36, 'Kurtha', '2022-08-05 23:09:57', NULL, 'womensware'),
(37, 'Sari', '2022-08-05 23:10:04', '2022-08-05 23:10:44', 'womensware'),
(38, 'Shoes', '2022-08-05 23:10:10', NULL, 'womensware'),
(39, 'One Piece', '2022-08-05 23:10:16', NULL, 'womensware'),
(40, 'Coat', '2022-08-05 23:10:24', NULL, 'womensware'),
(41, 'Skirt', '2022-08-09 13:04:14', NULL, 'kidsware'),
(42, 'Blazer', '2022-08-09 13:09:33', '2022-08-09 13:12:11', 'mensware');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_pass` varchar(255) DEFAULT NULL,
  `customer_gender` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_dob` varchar(10) NOT NULL,
  `customer_address` varchar(25) NOT NULL,
  `joindate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_gender`, `customer_phone`, `customer_dob`, `customer_address`, `joindate`) VALUES
(36, 'Rajesh Hamal', 'rajesh@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '1234567890', '1993-06-03', 'Tinkune', '2022-08-11'),
(37, 'Priyanka Shrestha', 'priyanka@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9841562398', '2002-05-31', 'Swoyambhu', '2022-08-11'),
(38, 'Sahara Dixit', 'sahara@gmail.com ', '25d55ad283aa400af464c76d713c07ad', 'Female', '9841562348', '2000-05-14', 'Matatirtha', '2022-08-01'),
(39, 'Rohan Shrestha', 'rohanshrstha@gmail.com ', '25d55ad283aa400af464c76d713c07ad', 'Male', '9803526339', '2002-05-31', 'Swoyambhu', '2022-08-11'),
(40, 'Saraswoti Roy', 'saras@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9803123456', '2000-06-12', 'Gurjudhara', '2022-08-10'),
(41, 'Mubina Mali', 'mubimali@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9841526398', '2001-05-12', 'Kalanki', '2022-08-11'),
(42, 'Kishan Ramtel', 'kishan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9852634178', '2002-07-25', 'Matatirtha', '2022-08-11'),
(43, 'John Rai', 'john@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9845781212', '2003-09-24', 'Satungal', '2022-08-10'),
(44, 'Prashika Shakya', 'prashika@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9852451236', '2000-04-27', 'Kalanki', '2022-08-11'),
(45, 'Roshan Thakuri', 'roshan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9841562145', '2000-12-12', 'Naagdhunga', '2022-08-09'),
(46, 'Ritu Shrestha', 'ritu@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9803005487', '2002-07-18', 'Naikap', '2022-08-11'),
(47, 'Manish Shrestha', 'manishshrstha@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9841226655', '1998-02-28', 'Kalimati', '2022-08-11'),
(48, 'Kristina Jarel', 'kristina@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9841001144', '2001-04-31', 'Naikap', '2022-08-11'),
(49, 'Subham Lama', 'subham@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9841112233', '2001-04-09', 'Swoyambhu', '2022-08-09'),
(51, 'Bijaya Shahi', 'bijay@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9874563245', '1995-06-16', 'Matatirtha', '2022-08-08'),
(52, 'Anna Sharma', 'anna@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9803526339', '1998-07-05', 'Solteemode', '2022-08-09'),
(53, 'Sushma Balami', 'sushmabalami@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9803785421', '2001-11-06', 'Thankot', '2022-08-11'),
(54, 'Purnima Tamang', 'purnima@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Female', '9803555555', '2001-05-30', 'Kalimati', '2022-08-08'),
(55, 'Shahan Lama', 'shahan@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9841784512', '1994-01-11', 'Ravibhawan', '2022-08-11'),
(56, 'Sagar Ghalan', 'sagar@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Male', '9841785612', '2000-12-25', 'Dursansar', '2022-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `customer_id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_msg`
--

INSERT INTO `tbl_msg` (`customer_id`, `cname`, `email`, `phone`, `message`, `PostingDate`, `status`) VALUES
(129, 'Rajesh Hamal', 'rajesh@gmail.com ', '123456789', 'Hello Supu Store,\r\nDo you have blazer in Navy blue color?', '2022-08-10 17:06:21', 'Read'),
(130, 'Nikhil Uphretti', 'nikhil@gmail.com ', '4569871236', 'How to make account?', '2022-08-10 17:08:21', 'Read'),
(131, 'Priyanka Shrestha', 'priyanka@gmail.com ', '9841562398', 'I received your product. I loved it', '2022-08-10 17:09:15', 'Read'),
(132, 'Bijaya Shahi', 'bijay@gmail.com ', '98745632145', 'They are very fast to response our orders and very secured and authentic website to use. I love it.', '2022-08-10 17:09:45', 'Read'),
(133, 'Anna Sharma', 'anna@gmail.com ', '9803526339', 'This is my third time buying ', '2022-08-10 17:20:42', 'Read'),
(134, 'Priyanka Shrestha', 'priyanka@gmail.com ', '9803123456', 'Best website to buy clothes online. I came here through my friends review and the quality is best and they provide very huge discount to the regular customer.', '2022-08-10 17:22:01', 'Read'),
(135, 'Sushma Balami', 'sushmabalami@gmail.com ', '9803785421', 'Maroon T-shirt which I ordered last friday is amazing', '2022-08-10 18:14:39', 'Read'),
(136, 'Purnima Tamang', 'purnima@gmail.com ', '9803555555', 'I love the products of this site', '2022-08-10 18:22:12', 'Read'),
(137, 'Shahan Lama', 'shahan@gmail.com ', '9841784512', 'I got the damage piece. Can I exchange this?', '2022-08-10 18:36:49', 'Read'),
(138, 'Sagar Ghalan', 'sagar@gmail.com ', '98415263', 'Do you buy products. I have many products in stock.', '2022-08-10 18:38:03', 'Read'),
(139, 'Sahara Dixit', 'sahara@gmail.com ', '98415263', 'When will that blue jeans come. Its already a month it has been out of stock.', '2022-08-10 18:41:14', 'Pending'),
(140, 'Rohan Shrestha', 'rohanshrstha@gmail.com ', '9803526339', 'Is this site sells clothing only?', '2022-08-10 18:42:47', 'Pending'),
(141, 'Saraswoti Roy', 'saras@gmail.com ', '9803123456', 'I just got my first order and I have one word WOW!!!! Love, Love, Love these cloths!! I had my doubts before I ordered because most sites plus size cloths are too small and Im usually disappointment, but not this time!!', '2022-08-10 18:44:53', 'Pending'),
(142, 'Mubina Mali', 'mubimali@gmail.com ', '9841526398', ' The shipping was also really fast only took about 2 days to get to me. Love it!! I will be back to buy more. For Sure!', '2022-08-10 18:45:24', 'Pending'),
(143, 'Kishan Ramtel', 'kishan@gmail.com ', '9852634178', 'I love these clothes!! I love the fit!!! I love the price!!! I am on my 3rd order from you!!', '2022-08-10 18:46:28', 'Pending'),
(144, 'John Rai', 'john@gmail.com ', '9845781212', 'Great service, Great clothes and FAST delivery!! ', '2022-08-10 18:47:40', 'Pending'),
(145, 'Prashika Shakya', 'prashika@gmail.com ', '9852451236', 'Very easy to use this site. Login, order, wait. Very easy, no other formalities to follow.', '2022-08-10 18:49:37', 'Pending'),
(146, 'Roshan Thakuri', 'roshan@gmail.com ', '9841562145', 'Will order again and again until my wish list is complete!! Then will add more!!', '2022-08-10 18:52:30', 'Pending'),
(147, 'Ritu Shrestha', 'ritu@gmail.com ', '9803005487', 'The processing and shipping of my order was very fast.', '2022-08-10 18:53:35', 'Pending'),
(148, 'Manish Shrestha', 'manishshrstha@gmail.com ', '9841226655', 'Super fast delivery, great material, and I am simply loving it!!! Looking forward to make my next purchase :)', '2022-08-10 18:54:16', 'Pending'),
(149, 'Kristina Jarel', 'kristina@gmail.com ', '9841001144', 'I am so happy to have found you. I am well pleased with all my purchases so far. ', '2022-08-10 18:55:03', 'Pending'),
(150, 'Subham Lama', 'subham@gmail.com ', '9841112233', 'I LOVE THE FEEL OF THE FABRIC SHIRT.', '2022-08-10 18:57:35', 'Pending'),
(151, 'Maya Khapuri', 'maya@gmail.com ', '9841785612', 'Mero naam ho maya\r\ngardinxu daya baya', '2022-08-11 06:51:26', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customername` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `productid` int(10) NOT NULL,
  `productname` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `message` varchar(100) DEFAULT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `totalcost` float NOT NULL DEFAULT 0,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customername`, `category`, `productid`, `productname`, `price`, `quantity`, `address`, `message`, `orderdate`, `totalcost`, `status`, `phone`) VALUES
(84, 'Kristina Jarel', 'womensware', 70, 'Shirt', 550, 1, 'Naikap', '', '2022-08-10 19:28:09', 620, 'Pending', '9841001144'),
(85, 'Kishan Ramtel', 'mensware', 86, 'Gym Shorts', 1400, 1, 'Matatirtha', '', '2022-08-10 19:29:41', 1470, 'Completed', '9852634178'),
(86, 'Kishan Ramtel', 'mensware', 83, 'T-Shirt', 900, 1, 'Matatirtha', '', '2022-08-10 19:29:41', 970, 'Completed', '9852634178'),
(87, 'Kishan Ramtel', 'mensware', 80, 'Shoes', 6000, 1, 'Matatirtha', '', '2022-08-10 19:29:41', 6070, 'Completed', '9852634178'),
(88, 'Rajesh Hamal', 'mensware', 89, 'Blazer', 2550, 2, 'Tinkune', 'XL haii', '2022-08-10 19:32:03', 5170, 'Pending', '1234567890'),
(89, 'John Rai', 'kidsware', 76, 'Shoes', 420, 2, 'Satungal', '', '2022-08-10 19:33:24', 910, 'Pending', '9845781212'),
(90, 'Sagar Ghalan', 'mensware', 60, 'Pant', 1400, 1, 'Dursansar', '36 waist size', '2022-08-10 19:34:07', 1470, 'Pending', '9841785612'),
(91, 'Sagar Ghalan', 'mensware', 74, 'Shoes', 3200, 1, 'Dursansar', 'Size 9', '2022-08-10 19:34:29', 3270, 'Pending', '9841785612'),
(92, 'Sushma Balami', 'womensware', 73, 'Sari', 2500, 1, 'Thankot', '29 size ko', '2022-08-10 19:36:06', 2570, 'Pending', '9803785421'),
(93, 'Bijaya Shahi', 'kidsware', 75, 'Pant', 260, 3, 'Matatirtha', '2 blue pant\r\n1 green pant\r\n', '2022-08-10 19:42:39', 850, 'Pending', '9874563245'),
(94, 'Bijaya Shahi', 'kidsware', 75, 'Pant', 260, 2, 'Matatirtha', 'Unisex half pant euta green euta blue\r\nBaby boy shoes 14 ko 4 ota', '2022-08-11 05:31:35', 590, 'Completed', '9874563245'),
(95, 'Bijaya Shahi', 'kidsware', 66, 'Shoes', 1100, 4, 'Matatirtha', 'Unisex half pant euta green euta blue\r\nBaby boy shoes 14 ko 4 ota', '2022-08-11 05:31:35', 4470, 'Completed', '9874563245'),
(96, 'Bijaya Shahi', 'womensware', 72, 'Kurtha', 850, 1, 'Matatirtha', 'Unisex half pant euta green euta blue\r\nBaby boy shoes 14 ko 4 ota', '2022-08-11 05:31:35', 920, 'Completed', '9874563245'),
(97, 'Mubina Mali', 'womensware', 81, 'coat', 3500, 1, 'Kalanki', 'Extra extra extra large', '2022-08-11 06:59:35', 3570, 'Completed', '9841526398'),
(98, 'Mubina Mali', 'mensware', 83, 'T-Shirt', 900, 2, 'Kalanki', 'Tshirt XL\r\nGym SHorts 30 size', '2022-08-11 07:01:33', 1870, 'Completed', '9841526398'),
(99, 'Mubina Mali', 'mensware', 86, 'Gym Shorts', 1400, 2, 'Kalanki', 'Tshirt XL\r\nGym SHorts 30 size', '2022-08-11 07:01:33', 2870, 'Completed', '9841526398');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `productid` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `img1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`productid`, `category`, `productname`, `title`, `description`, `price`, `img1`) VALUES
(60, 'mensware', 'Pant', 'Plain Pant', 'Available in different Sizes with Grey and Black', 1400, 'IMG-62b88efe6b0235.10194841.jpg'),
(61, 'mensware', 'Pant', 'Plain Jeans pant', 'Blue Jeans pant of different sizes', 1000, 'IMG-62b88f3773fd40.15021258.jpg'),
(62, 'mensware', 'Pant', 'Grunge Pant', 'Dark Blue Jeans Grunge Pant', 1200, 'IMG-62b88f7d24dc27.01727235.jpeg'),
(66, 'kidsware', 'Shoes', 'Baby Boy Shoes', 'Comfortable Baby Shoes Available in 12-18', 1100, 'IMG-62b8938109ea48.20402359.jpg'),
(67, 'kidsware', 'T-Shirt', 'Logo T-Shirt', 'Available with different logo', 750, 'IMG-62b8941a14a950.77504313.jpg'),
(68, 'kidsware', 'Pant', 'Baby Girl Pant', 'Pant for baby girl with flower design', 450, 'IMG-62b89444b77954.55851328.jpg'),
(69, 'womensware', 'Pant', 'Jogging Trouser', 'Available in black/white/grey with Size of L, XL, XXL, XXL', 910, 'IMG-62b894b05c6ac2.33392397.jpg'),
(70, 'womensware', 'Shirt', 'B/W Stripe Shirt', 'Black and White Stripe Shirt discount Rs. 300', 550, 'IMG-62b8975817ae72.63876748.jpg'),
(71, 'womensware', 'T-Shirt', 'Maroon T-Shirt', 'Half sleeve Maroon T-Shirt ', 450, 'IMG-62b8979caa5879.80772971.jpg'),
(72, 'womensware', 'Kurtha', 'Pink Kurtha', 'Plain pink kurtha available in different sizes', 850, 'IMG-62b897d2195df7.65280430.jpg'),
(73, 'womensware', 'Sari', 'Banarasi Sari', 'Available in different Sizes with various colors', 2500, 'IMG-62b898240adaf5.00531069.jpg'),
(74, 'mensware', 'Shoes', 'Mens Chelsea Shoes', 'Grey in color with various sizes 8-10 europeran sizes', 3200, 'IMG-62b8994708d657.86305842.jpg'),
(75, 'kidsware', 'Pant', 'Unisex Baby half pant', 'Unisex Baby half pant', 260, 'IMG-62b899a5096f86.84264824.jpg'),
(76, 'kidsware', 'Shoes', 'Baby Girl Shoes', 'Pink Baby shoes for Girl', 420, 'IMG-62b8c56b1055a6.55026328.jpg'),
(77, 'mensware', 'Shirt', 'Blue Shirt', 'Half sleeve Blue Shirt ', 380, 'IMG-62b8c6046e6702.09852750.jpg'),
(78, 'womensware', 'Kurtha', 'Red Kurtha', 'Available in different sizes', 1000, 'IMG-62bab051b31d41.87105678.jpg'),
(80, 'mensware', 'Shoes', 'Sneakers', 'comfy sneakers with high quality available in different sizes', 6000, 'IMG-62bd2d646ae278.40691979.jpg'),
(81, 'womensware', 'coat', 'pink coat', 'pink warm cozy onepiece available in different sizes', 3500, 'IMG-62bd2f639419a7.13669133.jpg'),
(82, 'kidsware', 'One Piece', 'one piece', 'comfy onepiece for baby ', 2000, 'IMG-62bd33deb4a150.64313504.jpg'),
(83, 'mensware', 'T-Shirt', 'Full Sleeve T-Shirt', 'Full Sleeve T-Shirt blue in color with attached gloves available in different sizes', 900, 'IMG-62bd483e01d5e1.93789719.jpg'),
(84, 'womensware', 'Sari', 'Blue and Pink Sari', 'Branded Blue and Pink Mixed color Siffon Sari for ladies', 20000, 'IMG-62bd4950152c19.47091385.webp'),
(86, 'mensware', 'Gym Shorts', 'Nike Shorts ', 'Black in color available in all sizes', 1400, 'IMG-62ea60ee5c3849.68145841.webp'),
(88, 'kidsware', 'Skirt', 'Skirt Small', 'Small Skirt', 290, 'IMG-62f2ac6f82b814.16563808.webp'),
(89, 'mensware', 'Blazer', 'Velvet Wine Red Blazer', 'Full Sleeves with Collered Neck and One Buttoned design', 2550, 'IMG-62f2ae82aadb86.71084847.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_name` (`customer_name`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_order_ibfk_1` (`productid`),
  ADD KEY `tbl_order_ibfk_2` (`customername`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`productid`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `tbl_products` (`productid`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customername`) REFERENCES `tbl_customer` (`customer_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
