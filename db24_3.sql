-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-08-08 02:19:44
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db24_3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(11) UNSIGNED NOT NULL,
  `img` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `rank`, `sh`, `ani`) VALUES
(1, '03A01.jpg', '預告片1', 1, 1, 3),
(2, '03A02.jpg', '預告片2', 2, 1, 2),
(3, '03A03.jpg', '預告片3', 3, 1, 3),
(4, '03A04.jpg', '預告片4', 4, 1, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
