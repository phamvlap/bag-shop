-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2024 at 04:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bag_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_phone_number` varchar(10) NOT NULL,
  `content` longtext NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `liked_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `user_name`, `user_phone_number`, `content`, `id_product`, `created_at`, `liked_count`) VALUES
(2, 'lap', '0373338569', 'san pham nay oke\n', 50, '2023-11-10 16:32:30', 0),
(3, 'lap', '0373338569', 'san pham nay oke\n', 50, '2023-11-22 12:09:31', 3),
(4, 'lap', '0373338569', 'check', 50, '2023-11-22 12:09:17', 1),
(6, 'pvlap', '0373338569', 'check2', 50, '2023-11-22 12:13:20', 2),
(8, 'lap', '0373338569', 'check3', 50, '2023-11-22 12:09:26', 1),
(11, 'ddd', 'dddd', 'ddd', 50, '2023-11-22 12:09:58', 2),
(12, 'cccc', 'ccc', 'ccc', 50, '2023-11-22 12:09:41', 1),
(13, 'lap', '0373338569', 'san pham nay rat dep', 34, '2023-11-10 17:53:42', 0),
(14, 'pvlap', '0373338569', 'san pham nay chua hai long lam', 52, '2023-11-10 17:57:21', 0),
(15, 'phamlap', '0373338569', 'san pham nay con hang khong a', 39, '2023-11-10 17:59:49', 0),
(16, 'phamlap', '0373338569', 'san pham nay con hang khong a', 39, '2023-11-10 17:59:50', 0),
(17, 'pham van lap', '0373338569', 'san pham nay con hang tai Xuan Khanh khong a', 55, '2023-11-10 18:04:19', 0),
(18, 'pvlap', '0373338569', 'giao hang nhanh chong trong vong 2 ngay', 55, '2023-11-11 04:02:59', 0),
(19, 'nguyen', '0373338568', 'san pham nay rat phu hop voi sinh vien a', 55, '2023-11-11 04:12:36', 0),
(20, 'lap', '0373338561', 'san pham nay con hang tai Binh Thuy khong a', 51, '2023-11-11 04:13:30', 0),
(21, 'lap', '0373385698', 'san pham dung yeu cau minh can luon', 51, '2023-11-11 04:17:58', 0),
(22, 'pvlap', '0343335869', 'san pham nay O Mon con hang khong a', 44, '2023-11-11 04:19:49', 0),
(55, 'lap', '0373338569', 'san pham nay con hang khong ah', 55, '2023-11-11 06:22:42', 0),
(56, 'pvlap', '0373338569', 'hang moi va chua ah', 55, '2023-11-11 06:27:45', 0),
(57, 'pvlap', '0373338569', 'san pham nay rat dep', 55, '2023-11-11 06:42:54', 0),
(58, 'lap', '0373338569', 'san pham nay rat tot', 55, '2023-11-11 06:44:02', 0),
(59, 'lap', '0373338569', 'hang nhieu size ', 55, '2023-11-11 06:53:49', 0),
(60, 'pham van lap', '0373338569', 'san pham nay rat phu hop voi sinh vien', 45, '2023-11-11 08:18:51', 0),
(61, 'lap', '0373338568', 'san pham nay con hang o Xuan Khanh khong ah\n', 41, '2023-11-22 10:46:38', 2),
(62, 'lap', '0373338569', 'san pham nay rat oke\n', 54, '2023-11-12 09:18:31', 0),
(65, 'phạm văn lập', '0373338569', 'Sản phẩm này rất đẹp!!', 53, '2023-11-16 11:42:37', 0),
(66, 'lập phạm', '0373338569', 'Sản phẩm này chất liệu rất dày dặn, giao hàng nhan. Tôi rất thích.', 53, '2023-11-16 11:46:14', 0),
(67, 'lap', '0373338569', 'Sản phẩm tuyêt vời', 53, '2023-11-16 11:47:21', 0),
(68, 'lap', '0373338530', 'Thời gian giao hàng nhanh', 53, '2023-11-16 11:48:01', 0),
(69, 'lap', '0373338309', 'Giá rẻ hơn giá trị trường\n', 53, '2023-11-16 11:51:31', 0),
(71, 'lap', '0373338569', 'Sản phẩm rất xinh đẹp tuyệt vời, tôi không thể trông đợi gì hơn.', 36, '2023-11-24 07:39:04', 1),
(72, 'lap', '0373338565', 'Sản phẩm rất xinh đẹp tuyệt vời. Tôi sẽ giới thiệu cho bạn bè', 53, '2023-11-16 11:56:24', 0),
(73, 'lap', '0373338530', 'Cảm ơn shop nha chiếc cặp này rất đẹp và shop giao rất nhanh', 53, '2023-11-16 11:59:16', 0),
(74, 'nguyễn', '0373338309', 'Rất là tuyệt vời nên mua', 53, '2023-11-16 12:00:46', 0),
(75, 'lap', '0373338569', 'ba lo nay rat dep\n', 51, '2023-11-19 01:56:59', 0),
(76, 'nguyen', '0373338569', 'san pham nay rat dep', 35, '2023-11-22 12:24:24', 0),
(77, 'Nguyen', '0373338564', 'giao hang nhanh', 35, '2023-11-22 12:31:25', 1),
(78, 'Nguyen', '0373338564', 'san pham nay rat phu hop voi toi\n', 64, '2023-11-22 13:02:29', 3),
(79, 'Nguyen', '0373338564', 'xin chao shop', 64, '2023-11-22 13:01:22', 2),
(80, 'Nguyen', '0373338564', 'san pham nay rat phu hop', 64, '2023-11-22 13:02:25', 1),
(81, 'Nguyen', '0373338564', 'giao hang nhanh', 64, '2023-11-22 13:07:01', 1),
(82, 'Nguyen', '0373338564', 'xin chao shop', 64, '2023-11-22 13:06:50', 0),
(83, 'Nguyen', '0373338564', 'ync\nsan pham nay con hang o Xuan Khanh khong ah', 41, '2023-11-22 13:09:59', 0),
(84, 'Nguyen', '0373338564', 'giao hang nhanh', 38, '2023-11-23 06:59:31', 2),
(85, 'Nguyen', '0373338564', 'san pham da dang', 38, '2023-11-23 06:59:19', 0),
(86, 'Nguyen', '0373338564', 'cua hang ban re', 38, '2023-11-23 07:03:21', 1),
(87, 'lap', '0373338569', 'san pham nay dep', 40, '2023-11-23 11:22:57', 1),
(88, 'lap', '0373338569', 'san pham nay dep', 40, '2023-11-23 10:58:01', 0),
(89, 'nguyễn', '0373338569', 'san pham nay dep\n\n', 40, '2023-11-23 11:23:10', 1),
(90, 'lập phạm', '0373338569', 'san pham nay dep lam', 40, '2023-11-23 11:17:27', 1),
(91, 'nobita', '0373338564', 'sản phẩm này đẹp lắm ạ', 63, '2023-11-24 02:35:33', 1),
(92, 'Nguyen Van Tam', '0373338564', 'giao hàng nhanh', 44, '2023-11-24 06:55:02', 1),
(93, 'Nguyen Van Tam', '0373338564', 'san pham nay dep\n', 45, '2023-11-30 11:50:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `name`, `username`, `password`, `phone_number`, `gender`, `email`, `address`) VALUES
(30, 'pham van lap', 'phamlap', '$2y$10$rUdjRR45STTYR12zvfBVgevWQlhm/R8JdEd9/TO3bcN8njc5PHx.2', '0373338569', '', 'lapb2105580@student.ctu.edu.vn', 'Xuân Khánh, Ninh Kiều, Cần Thơ'),
(33, 'Phạm Văn Lập', 'B2105580', '$2y$10$u7texPAgIxDA4tIqdKfxEOi.9T4FU79fxzl3VHe074q2O5umgPusG', '0373338569', '', '', NULL),
(34, 'Phạm Văn Lập', 'pvl', '$2y$10$fTUfre2ZgypxwdRV0coOee1Ht2PYvkaUO.63KIvpmCsApx1gKofVS', '0373338569', '', '', NULL),
(35, 'Phạm Văn Lập', 'pl', '$2y$10$KOJE3mqiVcgWfu18ryrI0ORfrCVc.rjNUJdxGhfH36rc8Go6Ghleu', '0373338569', '', '', NULL),
(36, 'Phạm Văn Lập', 'lp', '$2y$10$MOve4riYJRIsPdIS8zQ4b.eoTFkdZcpdSejpfq.ZVzVOOju2Susf2', '0373338569', '', '', NULL),
(37, 'Pham Van Lap', 'b2105580', '$2y$10$ACNUyi6kSEZ8EIMyYEqMQ.kf60ugT0NGzielFH.CxdbtPHXKyXLlq', '0373338569', 'male', 'phamvanlapag@gmail', 'Xuan Khanh, Ninh Kieu, Can Tho'),
(38, 'pham van lap', 'b2105580', '$2y$10$Bb78V/1xW34G7UbGD0cIqeEbAoIqOG2NAFD/EzJCubrbd0Ga56yIe', '0373338569', 'male', 'phamvanlapag@gmail.com', 'Xuan Khanh, Ninh Kieu, Can Tho'),
(39, 'Phạm Văn Lập', 'b2105580', '$2y$10$/5sdti.stPeZ3/n17O1PAe6qVptMOHsjDEF5NVwi.1yIYoEJ7fn6u', '0373338569', 'male', 'phamvanlapag@gmail.com', 'Xuân Khánh, Ninh Kiều'),
(40, 'pham van lap', 'b2105580', '$2y$10$tx6g28yaQFqw.G.k29.TWuvW7pfK6cUt3ZUR8Izzh/6gVLZgMenz2', '0373338569', '', '', NULL),
(41, 'lap', 'lap', '$2y$10$rWr09Qgk6kjQZFpzIDX7h.p4QWan53Lb3d4lcOTkXcKcE4a7QYBX.', '0373338569', '', 'phamvanlapag@gmail.com', 'Xuan Khanh, Ninh Kieu, Can Tho'),
(42, 'pham van lap', 'b2105580', '$2y$10$h29pbZx8pMjxgqZxBThDPengBhyBy.4ubNvuDUsK6ivbtw9Pazebe', '0373338569', '', '', NULL),
(43, 'plap', 'plap', '$2y$10$963TfO1BJQr.S37fAR2Lye1RaudwC8LlkFQUb5bneRfEzR.T1YRYO', '0373338569', '', '', NULL),
(44, 'pham van lap', 'b2105580', '$2y$10$ZcosFEuL1T34f.lh0tMRCOH/GLXAQgLvOFcVMYlNv6HW9EB80IS8u', '0373338569', '', '', NULL),
(45, 'pham lap', 'pvlap', '$2y$10$9GggIGU6.QJNVzQA172ahuWb4ypEOYBV4FMvPLWvcTl0Im1Ntv4Oe', '0373338509', 'male', 'lapb2105580@student.ctu.edu.vn', 'Xuân Khánh, Ninh Kiều'),
(46, 'pham lap', 'pvlap', '$2y$10$9dDVg5ts/xhdfis1HzN20.eCdU.Ek5ZPeKBAFHXsozglla8uI1wx2', '0373338569', 'male', 'me@gmail.com', 'Xuân Khánh, Ninh Kiều, Cần Thơ'),
(47, 'Nguyen Van Tam', 'nguyen', '$2y$10$0LRl/ljyP.jTSmMQCiZH1uX5RhgQ3mEglUAblQrN5ePPma0ZL/y8e', '0373338564', 'male', 'nguyen@gmail.com', 'Can Tho'),
(48, 'Lap', 'lap', '$2y$10$LlnWPbVCoIYoZEyEJEFzrOwsO9u29NvfN5ob3uKMbcliGNO4QRps2', '0373338564', '', 'lap@gmail.com', 'Can Tho'),
(49, 'Phạm Lập', 'phamlap', '$2y$10$JWz3fT3T//lPan772ZTfcOaB/xSzwPxtUIgHbuWo0/EAoDGXTy9D2', '0373338569', '', 'lapb2105580@student.ctu.edu.vn', 'Xuân Khánh, Ninh Kiều');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id_invoice`, `id_product`, `count`) VALUES
(38, 35, 1),
(38, 36, 8),
(38, 39, 5),
(38, 43, 1),
(38, 44, 4),
(38, 50, 1),
(39, 35, 1),
(40, 54, 1),
(61, 41, 1),
(61, 42, 1),
(61, 44, 1),
(62, 43, 1),
(62, 50, 1),
(63, 55, 1),
(64, 54, 5),
(65, 50, 1),
(66, 51, 3),
(66, 54, 2),
(67, 50, 1),
(67, 52, 1),
(68, 55, 1),
(69, 50, 1),
(69, 54, 1),
(70, 34, 8),
(71, 43, 5),
(71, 55, 8),
(72, 35, 1),
(72, 48, 3),
(74, 36, 1),
(76, 40, 2),
(76, 44, 1),
(77, 36, 2),
(77, 40, 2),
(78, 45, 3),
(79, 44, 1),
(80, 44, 1),
(81, 35, 2),
(82, 43, 1),
(82, 44, 1),
(84, 54, 1),
(84, 55, 3),
(85, 51, 2),
(86, 52, 1),
(87, 35, 1),
(88, 46, 1),
(89, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT curtime(),
  `status` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `method_payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id_invoice`, `created_at`, `status`, `total`, `id_customer`, `method_payment`) VALUES
(38, '2023-11-02 06:22:38', 1, 4812000, 38, 'on-site'),
(39, '2023-11-02 16:49:14', 1, 99000, 39, 'on-site'),
(40, '2023-11-02 17:24:49', 0, 109000, 39, 'on-site'),
(61, '2023-11-03 06:04:51', 1, 498000, 39, 'on-site'),
(62, '2023-11-03 08:15:37', 1, 480000, 39, 'on-site'),
(63, '2023-11-03 08:42:22', 1, 49000, 39, 'on-site'),
(64, '2023-11-03 08:43:16', 1, 545000, 39, 'on-site'),
(65, '2023-11-03 16:07:40', 0, 130000, 39, 'deposit'),
(66, '2023-11-03 16:23:59', 1, 905000, 39, 'deposit'),
(67, '2023-11-06 09:08:19', 0, 389000, 40, 'deposit'),
(68, '2023-11-06 09:08:57', 0, 49000, 40, 'on-site'),
(69, '2023-11-06 09:10:35', 0, 239000, 40, 'deposit'),
(70, '2023-11-06 09:16:05', 0, 952000, 40, 'deposit'),
(71, '2023-11-12 15:23:01', 0, 2142000, 41, 'deposit'),
(72, '2023-11-15 06:20:34', 1, 603000, 43, 'on-site'),
(73, '2023-11-16 05:02:58', 0, 870000, 44, 'deposit'),
(74, '2023-11-16 06:25:04', 0, 359000, 44, 'on-site'),
(75, '2023-11-16 06:26:10', 0, 645000, 44, 'deposit'),
(76, '2023-11-16 14:32:04', 0, 479000, 45, 'deposit'),
(77, '2023-11-16 15:49:06', 0, 918000, 46, 'deposit'),
(78, '2023-11-16 15:49:14', 0, 417000, 46, 'on-site'),
(79, '2023-11-16 15:49:53', 0, 408000, 46, 'on-site'),
(80, '2023-11-16 15:49:56', 0, 408000, 46, 'on-site'),
(81, '2023-11-17 04:41:00', 1, 198000, 47, 'deposit'),
(82, '2023-11-17 04:41:14', -1, 629000, 47, 'on-site'),
(83, '2023-11-17 04:41:27', -1, 129000, 47, 'deposit'),
(84, '2023-11-17 06:56:57', 1, 256000, 48, 'on-site'),
(85, '2023-11-17 06:57:06', 0, 458000, 48, 'deposit'),
(86, '2023-11-17 07:57:59', 0, 259000, 47, 'deposit'),
(87, '2023-11-22 04:51:22', 0, 99000, 47, 'on-site'),
(88, '2023-11-24 07:26:25', 0, 123000, 47, 'on-site'),
(89, '2023-11-24 08:55:09', 0, 139000, 49, 'deposit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describes` longtext NOT NULL,
  `images` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` int(11) NOT NULL,
  `sold_quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `describes`, `images`, `price`, `updated_at`, `type`, `sold_quantity`) VALUES
(34, 'Balo đựng laptop GUBAG kiểu dáng công sở nhỏ gọn, mang đi làm, đi học cho học sinh New', 'Balo Laptop chính hãng, đựng Laptop 13inch, 14inch, 15,6inch thoải mái, bền, chặt. Thiết kế balo thời trang, tiện lợi cho học sinh, sinh viên, người đi làm, công sở... Sản phẩm balo đựng laptop chất lượng, mức giá phổ thông, phù hợp với nhiều người, nam nữ đều có thể sử dụng.\r\n', '4fadad6b.jpeg;6fd92858.jpeg;6af16dda.jpeg', 140000, '2023-11-30 12:33:04', 4, 0),
(35, 'Balo đựng laptop FPT Balo học sinh, sinh viên giá rẻ', 'Mẫu mã thời trang hiện đại\r\n Chất vải 100% polyester trượt nước\r\n Balo có 3 ngăn. Ngăn chống sốc đựng laptop 15.6&quot; trở xuống, ngăn đựng tài liệu và ngăn nhỏ bên ngoài đựng các vật dụng cần thiết\r\n Hai túi bên hông được may vải cùng với balo nhìn rất thời trang hiện đại (thay cho mẫu túi lưới truyền thống) dùng để đựng nước hay vật dụng nhỏ\r\nSize 45 x 34 x 12cm\r\nMàu đen hạn chế được bám bẩn\r\nKhóa zip YKK bền bỉ\r\nQuai đeo rất êm vai, chắc chắn\r\nUnisex nam nữ mang đều đẹp\r\nẢnh thực tế', 'ea324fec.jpeg', 99000, '2023-11-22 04:51:22', 4, 3),
(36, 'Ba Lô Đựng Laptop Michaelmas NEW', 'Khóa Túi\r\nKhóa Zip\r\nKết cấu da\r\nDệt\r\nDa ngoài\r\nMờ\r\nTính năng\r\nNgăn đừng laptop, Ngăn đựng máy tính bảng, Cổng USB\r\nMẫu\r\nTrơn\r\nXuất xứ\r\nTrung Quốc\r\nKích thước laptop\r\n17&quot;\r\nKích cỡ túi\r\nNhỏ\r\nĐịa chỉ tổ chức chịu trách nhiệm sản xuất\r\nTrung Quốc\r\nChất liệu\r\nVải Oxford\r\nSố lượng hàng khuyến mãi\r\n188\r\nSố sản phẩm còn lại\r\n978\r\nGửi từ\r\nNước ngoài\r\n', 'fad91d82.jpeg;01b1b147.jpeg;20c0325e.jpeg', 359000, '2023-11-24 07:14:30', 4, 3),
(38, 'Túi Chống Sốc Laptop 13 inch 14 inch 15 inch HARAS TCP001', 'Túi chống sốc Laptop HARAS dành cho nhiều kích thước khác nhau như 13inch, 14 inch, 15 inch, 15.6 inch hoặc có loại dành cho macbook air, macbook pro. Sử dụng cho nhiều thương hiệu laptop khác nhau như lenovo, samsung, xiaomi, msi, dell, asus, hp, surface... . Chất liệu vải tốt, lớp đệm dày sẽ bảo vệ máy tính của bạn khỏi những va đập bên ngoài. Mức giá tốt, hàng chính hãng, chất lượng đảm bảo.', '89bfd678.jpeg;ac197612.jpeg;cc7c1818.jpeg', 49000, '2023-10-29 15:29:10', 3, 0),
(39, 'Túi Bảo Vệ Laptop. Đệm Chống Sốc Laptop các loại. Túi chống sốc chống thấm nước  MT001', 'Túi chống sốc Laptop dành cho nhiều kích thước khác nhau như 13inch, 14 inch, 15 inch, 15.6 inch hoặc có loại dành cho macbook air, macbook pro. Sử dụng cho nhiều thương hiệu laptop khác nhau như lenovo, samsung, xiaomi, msi, dell, asus, hp, surface... . Chất liệu vải tốt, lớp đệm dày sẽ bảo vệ máy tính của bạn khỏi những va đập bên ngoài. Mức giá tốt, hàng chính hãng, chất lượng cao', 'e3af9ae6.jpeg;665c1626.jpeg;6c38e0aa.jpeg', 49000, '2023-10-29 15:31:18', 3, 0),
(40, 'Túi chống sốc laptop Gubag CS02 bền đẹp, phù hợp macbook 15inch đệm dày, vải xịn', 'Khóa Túi\r\nKhóa Zip\r\nKết cấu da\r\nTrơn\r\nDa ngoài\r\nMờ\r\nMẫu\r\nTrơn\r\nChất liệu\r\nKhác, Sợi dệt\r\nKích cỡ túi\r\nKhác\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n6 tháng\r\nXuất xứ\r\nViệt Nam\r\nLoại da\r\nKhác\r\nSố lượng hàng khuyến mãi\r\n62\r\nSố sản phẩm còn lại\r\n14786\r\nGửi từ\r\nHà Nội', '04496946.jpeg;57aea374.jpeg;7c84fef8.jpeg', 100000, '2023-11-16 15:49:06', 3, 4),
(41, 'Balo Thời Trang Đi Học Đi Chơi  Nam Nữ Đơn Giản Be your style', '-Màu sắc : 3 màu ( den, xam, hong)\r\n- Không kèm gấu bông và sticker\r\n-Kích thước : 38x32x15cm\r\n-Khối lượng : 400g\r\n-Chất liệu : vải bố canvas', '169958d5.jpeg;5d7c9bee.jpeg;5f374ccd.jpeg', 70000, '2023-10-29 15:36:14', 2, 0),
(42, 'Balo Ulzzang Thời Trang Hàn Quốc Cao Cấp HARAS Thời Trang HR284', '- Kích thước 43cm x 30cm x 11cm.\r\nKích thước không quá lớn nhưng kích thước đủ để bạn chứa tất cả những vật dụng cần thiết tiện lợi khi đi du lịch, chơi thể thao, đi học, đi làm… Những ngăn nhỏ giúp bạn thỏa mái để những vật nhỏ như chìa khóa, cart, thẻ ATM…\r\n- Thiết kế hiện đại, tiện dụng\r\nThiết kế mang hơi hướng hiện đại, vừa đơn giản, vừa sang trọng. Sản phẩm chắc chắn sẽ khiến bạn trở nên tươm tất, phong cách và đẳng cấp khi đi du lịch, đi chơi thể thao hay đi học.\r\n- Chất liệu chuyên dụng cao cấp\r\nBalo HARAS được gia công bằng chất liệu vải đảm bảo độ bền chắc theo thời gian. Loại chất liệu này góp phần hạn chế tối đa tình trạng sờn cũ, phai màu sau một thời gian dài sử dụng.\r\n- Đường may tỉ mỉ, chắc chắn\r\nSản phẩm được chế tác bằng những đường may tỉ mỉ và chắc chắn, không chỉ mang đến độ bền mà còn mang đến tính thẩm mỹ, tinh tế cao. Phần dây đeo và tay xách được may bằng kỹ thuật gấp mép dây viền, vững chắc.\r\n- Phối đồ đa phong cách\r\nBalo HARAS hiện là dòng phụ kiện du lịch hot nhất hiện nay trên thị trường. Sản phẩm mang tính ứng dụng cao, có thể sử dụng trong nhiều hoàn cảnh: đi du lịch, đi học, đi chơi thể thao,… với những trang phục năng động như quần jeans, áo thun phông, áo khoác da, quần lửng kaki', '5e08ba81.jpeg;0039830b.jpeg;fa94203c.jpeg', 149000, '2023-11-19 04:21:19', 2, 0),
(43, 'Balo túi trống size S - M The North Face Base Camp Duffel', 'Size S kich thước sản phẩm  42cm x 25cm x 25cm.\r\nThể tích 21 lít\r\nTrọng lượng : 900 Gram\r\nSize M kich thước sản phẩm  53cm x 32.5cm x 32.5cm. \r\nThể tích : 51 lít\r\nTrọng lượng :1200 Gram\r\nMẫu balo du lịch đa năng vừa có thể sử dụng như balo, vừa có thể sử dụng như một mẫu túi thời trang. Thiết kế năng động, trẻ trung cùng ngăn đựng đồ lên tới 21 lít và 51 lít cất gọn đồ cho những chuyến du lịch 3 đến 5 ngày', '4b97d99a.jpeg;cb1759af.jpeg;47331c1c.jpeg', 350000, '2023-11-17 04:41:14', 1, 1),
(44, 'Balo đơn giản đựng laptop chống nước BLU05 có cổng sạc USB', 'Kết cấu da\r\nDệt\r\nDa ngoài\r\nMờ\r\nTính năng\r\nNgăn đựng máy tính bảng, Cổng USB, Ngăn đựng laptop, Chống xước, Chống nước\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n3 tháng\r\nXuất xứ\r\nTrung Quốc\r\nLoại da\r\nOxford kéo sợi\r\nMẫu\r\nHiện đại\r\nKích cỡ túi\r\n42x28x14cm\r\nKhóa Túi\r\nKhóa kéo\r\nChất liệu\r\nOxford\r\nTên tổ chức chịu trách nhiệm sản xuất\r\nEZ BALO\r\nĐịa chỉ tổ chức chịu trách nhiệm sản xuất\r\nEZ BALO\r\nKho hàng\r\n1018\r\nGửi từ\r\nHà Nội', 'baa6598a.jpeg;ce6c26ff.jpeg;47a81a08.jpeg', 279000, '2023-11-17 04:41:14', 2, 4),
(45, 'Balo Hàn Quốc cao cấp HARASHR008', 'Loại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n1 tháng\r\nXuất xứ\r\nViệt Nam\r\nChất liệu\r\nSợi tổng hợp\r\nKhóa Túi\r\nKhóa Zip\r\nTính năng\r\nNgăn đừng laptop\r\nMẫu\r\nTrơn\r\nKho hàng\r\n1077\r\nGửi từ\r\nTP. Hồ Chí Minh', '7b9a9e6c.jpeg;1376d720.jpeg;3b211acb.jpeg', 139000, '2023-11-24 08:55:09', 2, 4),
(46, 'Túi Xách Du Lịch To Đại, Đựng Quần Áo', '•	Chất liệu:  vải polyester\r\n•	Kích thước sản phẩm khoảng: 57x25x30cm\r\n•	Thích hợp đi làm, đi chơi, dạo phố, mua sắm, đặc biệt là đi du lịch, đi biển, dã ngoại.', '5faff4b2.jpeg;3b801b16.jpeg;28858d1b.jpeg', 123000, '2023-11-24 07:26:25', 1, 1),
(47, 'Túi Du Lịch Cỡ Lớn Đựng Quần Áo Balo Xách Tay Giỏ Đựng Đồ Đi Du Lịch HEIOU', 'Chống nước\r\nCó\r\nChất liệu\r\nKhác\r\nTính năng\r\nChống nước\r\nXuất xứ\r\nTrung Quốc\r\nKho hàng\r\n9826\r\nGửi từ\r\nHà Nội\r\n', '59be5066.jpeg;c6b1fd01.jpeg;8084ab8f.jpeg', 229000, '2023-10-30 07:09:27', 1, 0),
(48, 'Túi du lịch thể thao cỡ lớn chất liệu da chống nước cao cấp update', 'Chống nước\r\nCó\r\nChất liệu\r\nDa\r\nTên tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nTính năng\r\nTích hợp\r\nXuất xứ\r\nViệt Nam\r\nLoại da\r\nDa Pu\r\nHạn bảo hành\r\nKhông bảo hành\r\nKho hàng\r\n2905\r\nGửi từ\r\nHà Nội\r\n', '23b4afa2.jpeg;5810ab6c.jpeg;3334a8df.jpeg', 168000, '2023-11-15 04:46:37', 1, 0),
(49, 'Túi chống sốc bảo vệ laptop Alienware', 'Túi được làm từ chất liệu vải cao cấp chống thấm nước, kiểu dáng ôm gọn laptop. Túi được làm dày, bên trong có mút dày chống sốc cho laptop, mặt vải bên trong túi được làm bằng lớp 3D giúp bảo vệ laptop khỏi bị trầy xước. Khóa kéo 2 chiều tiện lợi, khóa kéo được làm hạn chế tối đa nước thấm vô trong túi.', 'c801c01e.jpeg;68addffe.jpeg;e7702e7d.jpeg', 180000, '2023-10-30 07:12:34', 3, 0),
(50, 'Túi chống sốc cao cấp cho laptop - Oz54', 'Thiết kế mặt ngoài bằng chất liệu cao cấp, bền chắc, chống thấm nước, dễ dàng lau chùi\r\nCác chi tiết may bằng chỉ bền, đường may tinh tế\r\nLớp đệm mút dày lót nhung mềm, chống sốc 6 chiều và chống trầy xước cho laptop\r\nKhóa kéo chắc chắn nhưng cũng rất trơn nhẹ giúp thao tác nhanh chóng và thoải mái\r\nBên ngoài có 1 túi phụ rộng rãi để đựng phụ kiện', '6e6f779a.jpeg;4ec9e27b.jpeg;9df0459c.jpeg', 130000, '2023-10-31 09:51:49', 3, 0),
(51, 'Balo chính hãng Gu Bag đựng máy tính', 'Khóa Túi\r\nKhóa Zip\r\nTính năng\r\nNgăn đừng laptop, Ngăn đựng máy tính bảng, Cổng USB\r\nMẫu\r\nTrơn\r\nXuất xứ\r\nViệt Nam\r\nChất liệu\r\nSợi tổng hợp\r\nKích cỡ túi\r\nKhác\r\nSố lượng hàng khuyến mãi\r\n12\r\nSố sản phẩm còn lại\r\n1052\r\nGửi từ\r\nHà Nội\r\n', '75b0588a.jpeg;bf85e79d.jpeg;4284aeee.jpeg', 229000, '2023-11-17 06:57:06', 4, 2),
(52, '       Chia sẻ:   Đã thích (77) Product Information Section Balo đi học nam 3 ngăn dung tích lớn vải oxford thoáng khí chống nước chống sốc có cổng usb 15.6 in balo đựng laptop', 'Loại bảo hành\r\nKhông bảo hành\r\nXuất xứ\r\nTrung Quốc\r\nDịp\r\nHằng Ngày\r\nKhóa Túi\r\nKhóa Zip\r\nTên tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nTính năng\r\nChống trộm, Khác, Ngăn đựng máy tính bảng, Cổng USB, ngăn đựng laptop\r\nKết cấu da\r\nkhác\r\nKích cỡ túi\r\n31L\r\nLoại da\r\nkhác\r\nChất liệu\r\noxford\r\nDa ngoài\r\nkhác\r\nMẫu\r\nkhác\r\nKho hàng\r\n29789\r\nGửi từ\r\nTP. Hồ Chí Minh', '3cba3884.jpeg;c152bf25.jpeg;37908603.jpeg', 259000, '2023-11-17 07:57:59', 4, 1),
(53, 'Balo Thời Trang Cao Cấp Chống Nước Đựng Laptop Tích Hợp Khóa Mật Mã Chống Trộm Sạc USB - MECPRO NATIFA', 'Mẫu\r\nTrơn\r\nDịp\r\nHằng Ngày\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n1 tháng\r\nXuất xứ\r\nĐài Loan\r\nKhóa Túi\r\nKhác\r\nChất liệu\r\nSợi tổng hợp\r\nBộ túi\r\nKhông\r\nKích cỡ túi\r\nKhác\r\nTên tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nDa ngoài\r\nMờ\r\nTính năng\r\nChống trộm, Ngăn đừng laptop, Khác, Ngăn đựng máy tính bảng, Cổng USB\r\nKho hàng\r\n34960\r\nGửi từ\r\nHà Nội', 'c5474665.jpeg;efa4a067.jpeg;e8329807.jpeg', 372000, '2023-10-30 15:04:23', 2, 0),
(54, 'Túi đựng laptop , túi chống sốc ultrabook, chống thấm, kháng nước, siêu mỏng, thời trang nhiều ngăn full màu', '- Túi chống sốc cho Laptop Utrabook,Surface\r\n\r\n- Túi chống sốc gồm 3 chất liệu tạo thành:\r\n\r\n    * Bên ngoài là Vải Nylon kháng nước nhẹ, chống trầy, chống ẩm mốc, nhám nhẹ chống trơn tuột.\r\n\r\n    *Bên trong là lớp bông êm mịn bảo vệ toàn diện cho thiết bị.\r\n\r\n    * Viền Polyester xung quanh chống trầy các cạnh máy khi vô tình va đập, đệm dày hơn ở 4 góc chống sốc tối ưu khi bị rơi tự do trong quá trình sử dụng.\r\n\r\n- Đầu khóa kéo làm từ chất liệu kim loại cao cấp được sơn phủ tĩnh điện không bị gỉ sét hay gãy khúc theo thời gian.', 'af386ecf.jpeg;90f044b0.jpeg;008f6eca.jpeg', 109000, '2023-11-17 06:56:57', 3, 1),
(55, 'Túi Chống Sốc Laptop 13 inch 14 inch 15 inch HARAS TCP001', 'Khóa Túi\r\nKhóa Zip\r\nMẫu\r\nLogo\r\nChất liệu\r\nSợi tổng hợp\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n3 tháng\r\nKích thước laptop\r\n13IN, 14IN , 15.6IN , 17IN\r\nSố lượng hàng khuyến mãi\r\n148\r\nSố sản phẩm còn lại\r\n5347\r\nGửi từ\r\nTP. Hồ Chí Minh', '5124b3e6.jpeg;09d494a8.jpeg;2898e147.jpeg', 49000, '2023-11-17 06:56:57', 3, 3),
(59, 'Balo Đi Học Đi Chơi Nam Nữ caro Thời Trang Hàn Quốc Nhiều Ngăn Tiện Dụng đựng vừa laptop 15.6inch NSP103', 'Mẫu\r\nSọc caro\r\nDịp\r\nHằng Ngày\r\nLoại bảo hành\r\nKhông bảo hành\r\nHạn bảo hành\r\nKhông bảo hành\r\nXuất xứ\r\nTrung Quốc\r\nKhóa Túi\r\nKhóa Zip\r\nChất liệu\r\nKhác\r\nBộ túi\r\nCó\r\nSố lượng hàng khuyến mãi\r\n399\r\nSố sản phẩm còn lại\r\n65982\r\nGửi từ\r\nHà Nội', '3bde0053.jpeg;e29d09dd.jpeg;d4269b4a.jpeg;cbe3ae96.jpeg', 125000, '2023-11-19 04:39:41', 2, 0),
(60, '       Chia sẻ:   Đã thích (4,4k) Product Information Section BALO Đi Học Đi Chơi Nam Nữ Thời Trang Hàn Quốc Nhiều Ngăn Tiện Dụng đựng vừa laptop 15.6inch NSP101', 'Mẫu\r\nTrơn\r\nDịp\r\nHằng Ngày\r\nLoại bảo hành\r\nKhông bảo hành\r\nHạn bảo hành\r\nKhông bảo hành\r\nXuất xứ\r\nTrung Quốc\r\nKhóa Túi\r\nKhóa Zip\r\nChất liệu\r\nKhác\r\nBộ túi\r\nCó\r\nSố lượng hàng khuyến mãi\r\n600\r\nSố sản phẩm còn lại\r\n83982\r\nGửi từ\r\nHà Nội', '1af691a7.jpeg;a6f4ae33.jpeg;a50ee736.jpeg;355dca80.jpeg', 250000, '2023-11-19 04:41:14', 2, 0),
(61, 'Balo nam nữ thời trang LAZA Grote Backpack 432 có ngăn laptop chống sốc - Thương hiệu LAZA', 'Khóa Túi\r\nKhóa Zip\r\nKết cấu da\r\nTrơn\r\nĐịa chỉ tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nDa ngoài\r\nMờ\r\nTính năng\r\nNgăn đừng laptop, Khác, Ngăn đựng máy tính bảng\r\nMẫu\r\nLogo\r\nLoại bảo hành\r\nBảo hành nhà sản xuất\r\nHạn bảo hành\r\n12 tháng\r\nXuất xứ\r\nViệt Nam\r\nChất liệu\r\nCanvas, PVC\r\nKích cỡ túi\r\nKhác\r\nTên tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nKho hàng\r\n59\r\nGửi từ', '065f5361.jpeg;6928f846.jpeg;cf658514.jpeg', 169000, '2023-11-19 04:42:49', 2, 0),
(62, 'Balo Trơn Đen Vải Dù Chống Thấm Nước Tốt, Thiết Kế Đơn Giản, Phong Cách Hàn Quốc, Thích Hợp Đi Học, Đi chơi Unisex', 'Địa chỉ tổ chức chịu trách nhiệm sản xuất\r\nĐang cập nhật\r\nLoại bảo hành\r\nBảo hành nhà sản xuất\r\nXuất xứ\r\nTrung Quốc\r\nKho hàng\r\n24902\r\nGửi từ\r\nTP. Hồ Chí Minh', 'c5bb2441.jpeg;331518af.jpeg;67f6bb7b.jpeg', 139000, '2023-11-19 04:44:17', 2, 0),
(63, 'Ba Lô Flamingo Thời Trang Trượt Nước Cao Cấp PRAZA - BLS0196', 'Thương hiệu\r\nPRAZA\r\nMẫu\r\nTrơn\r\nDịp\r\nHằng Ngày\r\nLoại bảo hành\r\nBảo hành nhà cung cấp\r\nHạn bảo hành\r\n6 tháng\r\nXuất xứ\r\nViệt Nam\r\nKhóa Túi\r\nKhóa Zip\r\nChất liệu\r\nSợi tổng hợp\r\nKết cấu da\r\nTrơn\r\nTính năng\r\nNgăn đừng laptop\r\nKho hàng\r\n414\r\nGửi từ\r\nTP. Hồ Chí Minh', '18706b9f.jpeg;69a91fff.jpeg;f2449f16.jpeg', 199000, '2023-11-19 04:45:31', 2, 0),
(64, 'Balo BAMA Essential Backpack NEW', 'Thương hiệu\r\nBAMA\r\nKết cấu da\r\nTrơn\r\nLoại da\r\nKhác\r\nDa ngoài\r\nMờ\r\nTính năng\r\nNgăn đừng laptop, Ngăn đựng máy tính bảng\r\nLoại bảo hành\r\nBảo hành nhà sản xuất\r\nXuất xứ\r\nViệt Nam\r\nKích thước laptop\r\n16&quot;\r\nChất liệu\r\nCanvas\r\nKích cỡ túi\r\nKhác\r\nKhóa Túi\r\nKhóa kéo\r\nKho hàng\r\n1493\r\nGửi từ\r\nTP. Hồ Chí Minh', 'edba6ccd.jpeg;7f962c68.jpeg;b0718bb3.jpeg;ab63357e.jpeg;83d5ee27.jpeg', 350000, '2023-11-19 06:26:41', 4, 0),
(65, 'Balo nam, Balo da nam đi học đi chơi giá rẻ sành điệu da chống nước BON2', 'Balo da nam thời trang cao cấp đi học đi chơi sành điệu da Pu chống nước ULZ0036\r\nĐặc điểm nổi bật của sản phẩm:\r\n- Kích thước Balo :  47 cm x 13 cm x 30 cm\r\n- Khối lượng sản phẩm Balo nam: 0.7kg\r\n- Chức năng như Balo Laptop và vừa laptop 15.6inch\r\n- Chất liệu da chuyên dụng cao cấp có khả năng chống thấm khi đi mưa\r\n- Thiết kế hiện đại và thời trang 	\r\n- Kiểu dáng phong cách\r\n- Đường may tỉ mỉ chắc chắn\r\n- Dễ dàng phối đồ\r\n- Bảo quản đơn giản\r\nTHÔNG TIN BẢO HÀNH :\r\n- Khi sản phẩm xảy ra hư hỏng khách hàng có thể liên hệ TIMO để bảo hành chính hãng\r\n- Thời gian bảo hành 12 tháng bằng hóa đơn mua hàng.\r\nBẢO QUẢN SẢN PHẨM :\r\n- Bạn nên giặt sản phẩm bằng nước dưới 30 độ C, không nên sử dụng chất tẩy rửa mạnh.\r\n- Tránh phơi sản phẩm dưới ánh nắng gay gắt.\r\n- Chất liệu cao cấp ít thấm nước nên bạn cần chú ý bảo vệ ba lô của mình khi đi trong thời tiết mưa gió.', '5d532ea3.jpeg;5f556ed0.jpeg;402a08cf.jpeg;28153a61.jpeg', 148000, '2023-11-24 03:26:02', 2, 0),
(66, 'Balo nam, Balo da nam đi học đi chơi giá rẻ sành điệu da chống nước BON2', 'Balo da nam thời trang cao cấp đi học đi chơi sành điệu da Pu chống nước ULZ0036\r\nĐặc điểm nổi bật của sản phẩm:\r\n- Kích thước Balo :  47 cm x 13 cm x 30 cm\r\n- Khối lượng sản phẩm Balo nam: 0.7kg\r\n- Chức năng như Balo Laptop và vừa laptop 15.6inch\r\n- Chất liệu da chuyên dụng cao cấp có khả năng chống thấm khi đi mưa\r\n- Thiết kế hiện đại và thời trang 	\r\n- Kiểu dáng phong cách\r\n- Đường may tỉ mỉ chắc chắn\r\n- Dễ dàng phối đồ\r\n- Bảo quản đơn giản\r\nTHÔNG TIN BẢO HÀNH :\r\n- Khi sản phẩm xảy ra hư hỏng khách hàng có thể liên hệ TIMO để bảo hành chính hãng\r\n- Thời gian bảo hành 12 tháng bằng hóa đơn mua hàng.\r\nBẢO QUẢN SẢN PHẨM :\r\n- Bạn nên giặt sản phẩm bằng nước dưới 30 độ C, không nên sử dụng chất tẩy rửa mạnh.\r\n- Tránh phơi sản phẩm dưới ánh nắng gay gắt.\r\n- Chất liệu cao cấp ít thấm nước nên bạn cần chú ý bảo vệ ba lô của mình khi đi trong thời tiết mưa gió.', 'b2b54f32.jpeg;40566873.jpeg;11b54975.jpeg', 100000, '2023-11-24 04:28:01', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_comment_product` (`id_product`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_invoice`,`id_product`),
  ADD UNIQUE KEY `fk_Details_Invoice` (`id_invoice`,`id_product`),
  ADD KEY `fk_Details_Product` (`id_product`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `fk_invoice_customer` (`id_customer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_Details_Bill` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Details_Product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoice_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
