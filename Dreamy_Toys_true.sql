-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 04 月 03 日 13:49
-- 伺服器版本： 8.0.36-0ubuntu0.22.04.1
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `Dreamy_Toys`
--
CREATE DATABASE IF NOT EXISTS `Dreamy_Toys` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `Dreamy_Toys`;

-- --------------------------------------------------------

--
-- 資料表結構 `adm`
--

CREATE TABLE `adm` (
  `ID` int NOT NULL COMMENT '編號',
  `Username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `Password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `Email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `UID01` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UID鑰匙01',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '註冊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `ID` int NOT NULL COMMENT '編號',
  `Username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `Password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `Email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'email',
  `UID01` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'UID鑰匙01',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '註冊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`ID`, `Username`, `Password`, `Email`, `UID01`, `Created_at`) VALUES
(1, 'aaa', '123456', '', '', '2024-03-21 08:13:09'),
(2, 'owner01', '$2y$10$6vz6stMKmFvxRVCREnoiP.vA3mL85aR9IfE5msB7KNCm2ZkuBFj3S', '01@test.com', '27586cac', '2024-03-21 08:38:06'),
(4, 'owner02', '$2y$10$q9gLxFKsjNyNvkcVAd1HIuf4M7pzgbWzD0gi7DhBAT8OFzBmZziO.', '02@test.com', '', '2024-03-21 08:43:33'),
(5, 'asdfghjkl', '$2y$10$psPKUvsnlc/U9NDP.ytF9.REJrLMSH9nBdGiFWgYFfHDVA5sFS1aa', 'aaa@aaa.com', 'e04954f9', '2024-03-26 01:52:39'),
(6, 'user01', '$2y$10$0quqZ1o0qw2G4q3v806EkO3FvOrdhfV9LPaZnbIeH/bkA7LwWbafe', 'gluco0720@gmail.com', 'ba802c7f', '2024-03-26 01:52:45'),
(7, 'richie9999', '$2y$10$xdldk1NDOzUZpMy7pfw2Au.IuFJp.7O3wCuAeEamfqF.4BKPN8qHG', 'owner@test.com', '2be3a716', '2024-03-26 01:52:47'),
(8, 'owner9999', '$2y$10$uBRtslTJBW7/yt02RNkkq.gAB1vkgdjoy1G12tHAgzJSb7BGWvWvm', 'test@test.com', '2f5706bf', '2024-03-26 01:52:49'),
(9, '04030310', '$2y$10$I8pnNDAtK2GG86IlVmqDoOtM1wVxwieVwmb0NnGKozRQINVdMfmgm', '04030310@gmail.com', '695bbdac', '2024-03-26 01:52:51'),
(10, 'owner', '$2y$10$IevJ2RhTGzMbKljcQCfAg.Wo4OxDbDooZ8g43oPmV2KpXMAT5wlgu', 'test@test.com', '', '2024-03-26 01:52:52'),
(11, 'test0019', '$2y$10$ATqbM0T9QSU80ME3DRTWieTesTh20DoG4MxH8rvxPbqPvN8b/prGS', 'test0019@test.com', '5d2f2921', '2024-03-26 01:52:57'),
(12, 'cigua', '$2y$10$L.Kp/RcJlI18uWiMMjmKYeaqMFSHrKSmGXd8eT3LF56vJC94zIHRW', 'test@test.com', 'b423a7d1', '2024-03-26 01:52:58'),
(13, 'a123456789', '$2y$10$5CM5uvPQQtWCKcn6u8x2P.H04VjI8eqEVvsM.FFwZoDx9EdhtU4AS', 'a@gmail.com', '', '2024-03-26 01:53:01'),
(14, 'jackif', '$2y$10$2lKklMn8jYidlbl9Wg82V.zynDK78yOMVQS.DS5uPYmRQrn.NI2je', '123.123@tcnr.com', 'd670210e', '2024-03-26 01:53:05'),
(15, 'Hank', '$2y$10$qhGUfBHHKRnGHOR1J1dr1.dmwLdTT4HyWaaoKfQAfpbu01F4k8fzO', 'hank@gmail.com', '', '2024-03-26 01:53:08'),
(16, 'owner12', '$2y$10$Ca32TeWMOkf.hUdcy3aokeEU0htp2CNlRs96jQBgH00xjn.zam6.C', 'test12@test.com', '', '2024-03-26 01:53:09'),
(17, 'soley', '$2y$10$ZqZB/d9A792.soM58LMxgOpLaiDAmm9mABVZS6i7kYTQOjRiZOsIG', 'test@test.com', '4c18afac', '2024-03-26 01:53:10'),
(18, '111111', '$2y$10$8ZU2bTPDSaDTttrKuSxee.gl2UcQgC7cOtLPYATdKppaH6uAv00OC', 'kev@hotmail.com', '3b083453', '2024-03-26 01:53:13'),
(19, '123456', '$2y$10$hvuymaNNfR96UPVGS6JnfOatbSLQ4OO3Jdf13e2XUpjcNdLP2nFq6', '@.com', '82c99837', '2024-03-26 01:53:17'),
(20, 'WinnyAnne', '$2y$10$hMaSvoFd430M3lgeJ8W5quZs3/shVDmZ5nOxUA9ZecOZm3vwXZ9ee', 'cloud2wa@gmail.com', '537e44bf', '2024-03-26 01:54:34'),
(21, 'test26', '$2y$10$Dg4UAxMTI/er9TN7RTDNIegeHkIOPqmQGrR6aPk8OKYYJBQ7DQMmy', 'test26@gmail.com', '', '2024-03-26 01:54:54'),
(22, '12345', '$2y$10$ZZ1pL7sw5mKdZX/n6pCb8ORLpvihHrBpynF2BUlCdrKE5gSpdvcYm', '123456@test.com', '078526fc', '2024-04-02 06:34:04');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID` int NOT NULL,
  `Pname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '品名',
  `Pimage` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '圖片',
  `Ptype` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '分類',
  `Pintro` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '介紹',
  `Psize` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '尺寸',
  `Num` int DEFAULT NULL COMMENT '數量',
  `Price` int DEFAULT NULL COMMENT '價格',
  `Shelf` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '上架',
  `Created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '建立日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adm`
--
ALTER TABLE `adm`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT COMMENT '編號';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
