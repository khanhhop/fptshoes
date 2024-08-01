-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2024 at 09:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id_baiviet` int NOT NULL,
  `id_kh` int NOT NULL,
  `id_binhluan` int NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bien_the`
--

CREATE TABLE `bien_the` (
  `id_bienthe` int NOT NULL,
  `ten_bienthe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binhluan` int NOT NULL,
  `id_kh` int NOT NULL,
  `id_sp` int NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_dm` int NOT NULL,
  `ten_dm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id_dm`, `ten_dm`, `trang_thai`) VALUES
(1, 'Tennis', 1),
(2, 'Golf', 1),
(3, 'Gym', 1),
(4, 'Skateboarding', 1),
(5, 'Football', 1),
(6, 'Running', 1),
(7, 'Basketball', 1),
(8, 'Jordan', 1),
(9, 'Lifestyle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `id_sp` int UNSIGNED NOT NULL,
  `gia` double NOT NULL,
  `qty` tinyint NOT NULL,
  `total` double NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `order_id`, `id_sp`, `gia`, `qty`, `total`, `create_at`, `update_at`) VALUES
(1, 4, 8, 3239000, 3, 9717000, '2024-07-26 16:25:06', '2024-07-26 16:25:06'),
(2, 5, 2, 5589000, 3, 16767000, '2024-07-26 16:28:48', '2024-07-26 16:28:48'),
(3, 6, 10, 1609000, 3, 4827000, '2024-07-27 04:14:11', '2024-07-27 04:14:11'),
(4, 7, 10, 1609000, 2, 3218000, '2024-07-27 09:21:35', '2024-07-27 09:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` bigint UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Processing','Confirmed','Shipping','Delivered','Cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Processing',
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `firstname`, `lastname`, `address`, `phone`, `email`, `status`, `create_at`, `update_at`) VALUES
(1, '$firstname', '$lastname', '$address', '$phone', '$email', 'Processing', '2024-07-26 16:21:42', '2024-07-26 16:21:42'),
(2, 'bui duc', 'dat', '19 402 dinh thon My Dinh', '0845260515', 'ken936643@gmail.com', 'Processing', '2024-07-26 16:23:17', '2024-07-26 16:23:17'),
(3, 'bui duc', 'dat', '19 402 dinh thon My Dinh', '0845260515', 'ken936643@gmail.com', 'Processing', '2024-07-26 16:24:36', '2024-07-26 16:24:36'),
(4, 'bui duc', 'dat', '19 402 dinh thon My Dinh', '0845260515', 'ken936643@gmail.com', 'Processing', '2024-07-26 16:25:06', '2024-07-26 16:25:06'),
(5, 'nguyen phuong', 'nam', '19 402 dinh thon My Dinh', '0912695728', 'darbui180504@gmail.com', 'Processing', '2024-07-26 16:28:48', '2024-07-26 16:28:48'),
(6, 'tran hong', 'truong', '19 402 dinh thon My Dinh', '0845260515', 'ken936643@gmail.com', 'Processing', '2024-07-27 04:14:11', '2024-07-27 04:14:11'),
(7, 'Jon', 'Doe', '1600 Amphitheatre Parkway', '6019521325', 'test@example.us', 'Processing', '2024-07-27 09:21:35', '2024-07-27 09:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_kh` int NOT NULL,
  `id_vaitro` int DEFAULT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_dang_nhap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id_kh`, `id_vaitro`, `ho_ten`, `sdt`, `dia_chi`, `email`, `ten_dang_nhap`, `mat_khau`, `trang_thai`) VALUES
(1, 2, 'Bùi Đức Đạt', '0845260515', '10 ngõ 402 đình thôn mĩ đình', 'ken936643@gmail.com', 'datbui', 'datbui1805', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lien_he`
--

CREATE TABLE `lien_he` (
  `id_lienhe` int NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_gg`
--

CREATE TABLE `ma_gg` (
  `id_magg` int NOT NULL,
  `ma` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int NOT NULL,
  `id_dm` int NOT NULL,
  `anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_lieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong_da_ban` int NOT NULL,
  `id_bienthe` int NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1',
  `kich_co` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `id_dm`, `anh`, `ten_sp`, `gia`, `mo_ta`, `chat_lieu`, `so_luong_da_ban`, `id_bienthe`, `trang_thai`, `kich_co`) VALUES
(1, 1, 'product/tennis/M+ZOOM+GP+CHALLENGE+PRO+HC.png;product/tennis/M+ZOOM+GP+CHALLENGE+PRO+HC (4).png;product/tennis/M+ZOOM+GP+CHALLENGE+PRO+HC (3).png;product/tennis/M+ZOOM+GP+CHALLENGE+PRO+HC (2).png;product/tennis/M+ZOOM+GP+CHALLENGE+PRO+HC (1).png', 'Nike GP Challenge Pro', 2105349, 'Game. Steady. Match. Come out on the winning side in the all-new GP Challenge Pro. Designed for baseline back-and-forth bolts and dashes to the net, it has the speed and stability needed to help your game go the distance.', 'da', 2, 2, 1, 39),
(2, 2, 'product/golf/AIR+ZM+INFNTY+TR+NXT+NRGW+P24.png;product/golf/AIR+ZM+INFNTY+TR+NXT+NRGW+P24(4).png;product/golf/AIR+ZM+INFNTY+TR+NXT+NRGW+P24(3).png;product/golf/AIR+ZM+INFNTY+TR+NXT+NRGW+P24(2).png;product/golf/AIR+ZM+INFNTY+TR+NXT+NRGW+P24(1).png', 'Nike Air Zoom Infinity Tour NRG', 5589000, 'There\'s just something about the crack of an old-school wood club or the smell of a fresh pour after 18 holes. This special-edition Infinity Tour has barrel-aged bourbon browns and smoked streaks of razor-sharp oranges that nod to Kentucky. A wood-grain graphic on the Swoosh logo and a tree-trunk-inspired outsole highlight a design rooted in tradition and timber. And you still get the updates from the previous Infinity Tour: increased overall volume, added energy transfer through your swing and traction in key areas to help reduce slipping.', 'da', 3, 1, 1, 40),
(3, 3, 'product/gym/NIKE+METCON+9+AMP.jpg;product/gym/NIKE+METCON+9+AMP.png;product/gym/NIKE+METCON+9+AMP (1).jpg;product/&gym/NIKE+METCON+9+AMP (2).jpg;product/&gym/NIKE+METCON+9+AMP (3).jpg', 'Nike Metcon 9 AMP', 4109000, 'Whatever your \"why\" is for working out, the Metcon 9 makes it all worth it. We improved on the 8 with a larger Hyperlift plate and added rubber rope wrap. Sworn by some of the greatest athletes in the world, intended for lifters, cross-trainers and go-getters, and still the gold standard that delivers day after day.\r\n\r\n', 'da', 4, 2, 1, 39),
(4, 4, 'product/skate/NIKE+SB+ZOOM+POGO+PLUS+PRM.png;product/skate/NIKE+SB+ZOOM+POGO+PLUS+PRM (1).png;product/skate/NIKE+SB+ZOOM+POGO+PLUS+PRM (2).png;product/skate/NIKE+SB+ZOOM+POGO+PLUS+PRM (3).png;product/skate/NIKE+SB+ZOOM+POGO+PLUS+PRM (4).png', 'Nike SB Zoom Pogo Plus Premium', 2649000, 'The Zoom Pogo delivers a serious boost to any skate session. With a broken-in fit straight out of the box and mixed materials that age to perfection, they bring comfort you have to feel to believe. Oh, and the raised taping increases control for the perfect flick, while Zoom Air cushioning delivers the ultimate boardfeel.', 'da', 5, 1, 1, 40),
(5, 5, 'product/football/LEGEND+10+ELITE+FG.png;product/football/LEGEND+10+ELITE+FG (1).png;product/football/LEGEND+10+ELITE+FG (2).png;product/football/LEGEND+10+ELITE+FG (3).png;product/football/LEGEND+10+ELITE+FG (4).png', 'Nike Tiempo Legend 10 Elite', 6739000, 'Even Legends find ways to evolve. The latest iteration of this Elite boot has all-new FlyTouch Plus engineered leather. Softer than natural leather, it contours to your foot and works with All Conditions Control (a grippy texture even in wet weather) so you can dictate the pace of your game. Lighter and sleeker than any other Tiempo to date, the Legend 10 is for any position on the pitch, whether you\'re sending a pinpoint pass through the defence or tracking back to stop a break-away.', 'vai', 6, 2, 1, 40),
(6, 6, 'product/running/AIR+ZOOM+PEGASUS+41+FP.png;product/running/AIR+ZOOM+PEGASUS+41+FP (1).png;product/running/AIR+ZOOM+PEGASUS+41+FP (2).png;product/running/AIR+ZOOM+PEGASUS+41+FP (3).png;product/running/AIR+ZOOM+PEGASUS+41+FP.jpg', 'Nike Pegasus 41 Blueprint', 3829000, 'Responsive cushioning in the Pegasus provides an energised ride for everyday road running. Experience lighter-weight energy return with dual Air Zoom units and a ReactX foam midsole. Plus, improved engineered mesh on the upper decreases weight and increases breathability.', 'vai', 7, 2, 1, 39),
(7, 7, 'product/basketball/G.T.+HUSTLE+3+FP+EP.jpg;product/basketball/G.T.+HUSTLE+3+FP+EP.png;product/basketball/G.T.+HUSTLE+3+FP+EP (1).jpg;product/basketball/G.T.+HUSTLE+3+FP+EP (1).png;product/basketball/G.T.+HUSTLE+3+FP+EP (2).png', 'Nike G.T. Hustle 3 Blueprint EP', 5589000, 'The G.T. Hustle 3 can help you thrive at crunch time. Engineered to the exact specifications of championship athletes, double-stacked Air Zoom cushioning provides bouncy horsepower. It helps save you energy over the course of the game. It\'s designed for those who want to outlast their opponent and stay fresh through to the final buzzer. Who\'s got next? You do. With its extra-durable rubber outsole, this version gives you traction for outdoor courts.', 'da', 8, 2, 1, 40),
(8, 8, 'product/jordan/AIR+JORDAN+1+LOW.jpg;product/jordan/AIR+JORDAN+1+LOW.png;product/jordan/AIR+JORDAN+1+LOW (1).png;product/jordan/AIR+JORDAN+1+LOW (2).png;product/jordan/AIR+JORDAN+1+LOW (3).png', 'Air Jordan 1 Low', 3239000, 'Inspired by the original that debuted in 1985, the Air Jordan 1 Low offers a clean, classic look that\'s familiar yet always fresh. With an iconic design that pairs perfectly with any \'fit, these kicks ensure you\'ll always be on point.', 'da', 9, 2, 1, 39),
(9, 9, 'product/lifestyle/blazer-mid-77-vintage-shoes-dNWPTj.png;product/lifestyle/BLAZER+MID+\'77+VNTG (1).png;product/lifestyle/BLAZER+MID+\'77+VNTG (2).png;product/lifestyle/BLAZER+MID+\'77+VNTG (3).png;product/lifestyle/BLAZER+MID+\'77+VNTG.png', 'Nike Blazer Mid \'77 Vintage', 2929000, 'In the \'70s, Nike was the new shoe on the block. So new in fact, we were still breaking into the basketball scene and testing prototypes on the feet of our local team. Of course, the design improved over the years, but the name stuck. The Nike Blazer Mid \'77 Vintage—classic since the beginning.', 'da', 1, 1, 1, 40),
(10, 9, 'product/lifestyle/NIKE+COURT+ROYALE+2.png;product/lifestyle/NIKE+COURT+ROYALE+2 (1).png;product/lifestyle/NIKE+COURT+ROYALE+2 (2).png;product/lifestyle/NIKE+COURT+ROYALE+2 (3).png;product/lifestyle/NIKE+COURT+ROYALE+2 (4).png', 'Nike Court Royale 2 Low', 1609000, 'A flash from the past, the Nike Court Royale 2 features the same design that has rocked the streets since the late \'70s. Leather on the upper looks crisp and is easy to wear, while the large retro Swoosh design adds throwback appeal. To top it off, the modernised herringbone sole puts a twist on the classic look.\r\n\r\n', 'da', 10, 2, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id_vaitro` int NOT NULL,
  `ten_vaitro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vai_tro`
--

INSERT INTO `vai_tro` (`id_vaitro`, `ten_vaitro`, `trang_thai`) VALUES
(1, 'Admin', 1),
(2, 'Khách hàng', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Indexes for table `bien_the`
--
ALTER TABLE `bien_the`
  ADD PRIMARY KEY (`id_bienthe`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binhluan`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Indexes for table `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Indexes for table `ma_gg`
--
ALTER TABLE `ma_gg`
  ADD PRIMARY KEY (`id_magg`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id_vaitro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id_baiviet` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bien_the`
--
ALTER TABLE `bien_the`
  MODIFY `id_bienthe` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binhluan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id_dm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_kh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id_lienhe` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_gg`
--
ALTER TABLE `ma_gg`
  MODIFY `id_magg` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vai_tro`
--
ALTER TABLE `vai_tro`
  MODIFY `id_vaitro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
