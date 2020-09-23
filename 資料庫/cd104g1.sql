-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-01-07 04:54:08
-- 伺服器版本: 5.7.23
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cd104g1`
--
CREATE DATABASE IF NOT EXISTS `cd104g1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cd104g1`;

-- --------------------------------------------------------

--
-- 資料表結構 `activity_msg`
--

DROP TABLE IF EXISTS `activity_msg`;
CREATE TABLE IF NOT EXISTS `activity_msg` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '留言編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `activity_type_id` int(10) NOT NULL COMMENT '活動分類編號',
  `title` varchar(20) NOT NULL COMMENT '標題',
  `inner_text` varchar(500) NOT NULL COMMENT '內文',
  `message_datetime` datetime NOT NULL COMMENT '留言日期時間',
  PRIMARY KEY (`message_id`),
  KEY `activity_msg_FK1` (`member_id`),
  KEY `activity_msg_FK2` (`activity_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='活動留言' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `activity_msg`
--

INSERT INTO `activity_msg` (`message_id`, `member_id`, `activity_type_id`, `title`, `inner_text`, `message_datetime`) VALUES
(4, 2, 5, '', '哇喔～ 活動超級好玩的 ^_^\r\n快來和我一起玩吧～', '2019-01-04 22:20:25'),
(9, 1, 5, '', '你好好好\r\n', '2019-01-05 02:30:00'),
(13, 2, 5, '', '你好', '2019-01-05 16:40:39'),
(15, 15, 5, '', '我喜歡阿婆的懷舊活動!', '2019-01-06 19:09:32'),
(16, 16, 3, '', '  我是中央金城武', '2019-01-06 19:10:30'),
(17, 17, 3, '', '活動品質低落，要多改善', '2019-01-06 19:15:16'),
(18, 22, 3, '', '樓下下是城武本人', '2019-01-06 19:18:52'),
(19, 15, 5, '', '寂寞寂寞揪活動', '2019-01-06 19:25:09'),
(20, 25, 5, '', '好玩', '2019-01-06 20:04:42');

-- --------------------------------------------------------

--
-- 資料表結構 `activity_msg_report`
--

DROP TABLE IF EXISTS `activity_msg_report`;
CREATE TABLE IF NOT EXISTS `activity_msg_report` (
  `report_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '檢舉編號',
  `message_id` int(10) NOT NULL COMMENT '留言編號',
  `member_id` int(10) NOT NULL COMMENT '檢舉會員編號',
  `report_reason_type` char(1) NOT NULL COMMENT '檢舉原因分類',
  `report_reason` varchar(100) NOT NULL COMMENT '檢舉原因',
  `report_datetime` datetime NOT NULL COMMENT '檢舉日期時間',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '處理狀態',
  PRIMARY KEY (`report_id`),
  KEY `activity_msg_report_FK1` (`message_id`) USING BTREE,
  KEY `activity_msg_report_FK2` (`member_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COMMENT='活動留言檢舉';

--
-- 資料表的匯出資料 `activity_msg_report`
--

INSERT INTO `activity_msg_report` (`report_id`, `message_id`, `member_id`, `report_reason_type`, `report_reason`, `report_datetime`, `state`) VALUES
(115, 20, 25, '', '', '2019-01-06 20:05:03', 1),
(116, 16, 30, '', '', '2019-01-07 09:28:54', 1),
(117, 17, 31, '', '', '2019-01-07 09:28:58', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `activity_type`
--

DROP TABLE IF EXISTS `activity_type`;
CREATE TABLE IF NOT EXISTS `activity_type` (
  `activity_type_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '活動分類編號',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `description` varchar(500) NOT NULL COMMENT '介紹',
  `desc_image01_path` varchar(50) NOT NULL COMMENT '介紹圖片1路徑',
  `desc_image02_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片2路徑',
  `desc_image03_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片3路徑',
  `desc_image04_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片4路徑',
  `desc_image05_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片5路徑',
  `is_on_shelves` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架',
  PRIMARY KEY (`activity_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='活動分類' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `activity_type`
--

INSERT INTO `activity_type` (`activity_type_id`, `name`, `description`, `desc_image01_path`, `desc_image02_path`, `desc_image03_path`, `desc_image04_path`, `desc_image05_path`, `is_on_shelves`) VALUES
(1, '玩彈珠', '彈珠是用玻璃做成鑲有彩色紋路的小珠子，普遍是純色頭明的，有些則會有一些小氣泡或是嵌入各種圖案，如樹葉花瓣\r\n、彎月、數條彩線等等，彈珠很受早期小孩子的歡迎，玩法多樣，主要是以手指施力將其彈出發射。常見於生活中，不只是彈珠汽水\r\n裡面有彈珠，甚至被拿來做為彈珠超人等等遊戲的題材。', 'img/event/marbles1.jpg', 'img/event/marbles2.jpg', NULL, NULL, NULL, 0),
(2, '放風箏', '風箏是起源於中國的民間休閒活動，而最早出現的風箏是由木製成的，每逢清明時節，有著放風箏的習俗，將病痛不如意寫在風箏上，等到風箏飛上藍天，便把線剪斷，讓風送走災厄。', 'img/event/kite1.jpg', 'img/event/kite2.jpg', NULL, NULL, NULL, 0),
(3, '打陀螺', '陀螺在閩南語又被稱作干樂，陀螺的製作原料是木頭，上粗下細，最下端的尖針支撐著本體做旋轉，玩法是先用繩子在\r\n陀螺上不停地繞，繞好後先向前拋在往後拉，陀螺被拋出後在地上旋轉，還可以利用邊打陀螺的方式，使陀螺旋轉時間更長。陀螺是\r\n一種世界性的童玩，在很多不同民族或國家都可以見到它的身影。', 'img/event/roundabout1.jpg', 'img/event/roundabout2.jpg', NULL, NULL, NULL, 0),
(4, '糖葫蘆', '主要原料是用番茄或草莓在外層裹上糖衣，因形狀類似葫蘆而被稱做糖葫蘆，是許多人兒時的甜蜜回憶，口感上外層又\r\n脆又甜，而內餡則是帶有水果本身的酸味，酸甜可口。早期攤販會在廟會前或熱鬧的地方沿街叫賣，現在則是在夜市可以看到各種創\r\n新的種類。', 'img/event/tomatoes1.jpg', 'img/event/tomatoes2.jpg', NULL, NULL, NULL, 0),
(5, '彩繪燈籠', '燈籠的種類繁多，在世界各地普遍會見到，也有著不同的功用和代表的意涵，如過年點上大紅色的燈籠、元宵節猜燈謎、中秋節提燈籠、生男孩時在家中掛上燈籠(添丁)。燈籠不僅作為人們照明的工具，寺廟裡頭繪有龍圖騰的燈籠，更展現了高度的藝術性。', 'img/event/lantern1.jpg', 'img/event/lantern2.jpg', NULL, NULL, NULL, 0),
(11, '捏麵人', '捏麵人捏麵人', 'img/event/testtest01.jpg', 'img/event/testtest01.jpg', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_type`
--

DROP TABLE IF EXISTS `coupon_type`;
CREATE TABLE IF NOT EXISTS `coupon_type` (
  `coupon_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '折價券編號',
  `amount` int(5) NOT NULL DEFAULT '0' COMMENT '折價券金額',
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=utf8 COMMENT='折價券種類';

--
-- 資料表的匯出資料 `coupon_type`
--

INSERT INTO `coupon_type` (`coupon_id`, `amount`) VALUES
(50, 50),
(100, 100),
(200, 200),
(500, 500);

-- --------------------------------------------------------

--
-- 資料表結構 `customized_bag_type`
--

DROP TABLE IF EXISTS `customized_bag_type`;
CREATE TABLE IF NOT EXISTS `customized_bag_type` (
  `bag_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '包包編號',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `price` int(5) NOT NULL DEFAULT '0' COMMENT '單價',
  `image_path` varchar(50) NOT NULL COMMENT '圖片路徑',
  PRIMARY KEY (`bag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='客製化包包種類';

--
-- 資料表的匯出資料 `customized_bag_type`
--

INSERT INTO `customized_bag_type` (`bag_id`, `name`, `price`, `image_path`) VALUES
(1, 'tour_SP_1', 100, './img/custImg/images/small/tour_SP_1.png'),
(2, 'tour_SP_2', 200, './img/custImg/images/small/tour_SP_2.png'),
(3, 'tour_SP_3', 250, './img/custImg/images/small/tour_SP_3.png');

-- --------------------------------------------------------

--
-- 資料表結構 `customized_product`
--

DROP TABLE IF EXISTS `customized_product`;
CREATE TABLE IF NOT EXISTS `customized_product` (
  `product_id` int(10) NOT NULL COMMENT '客製化商品編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `bag_id` int(10) NOT NULL COMMENT '包包編號',
  `image_path` varchar(50) NOT NULL COMMENT '作品圖片路徑',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `description` varchar(100) DEFAULT NULL COMMENT '介紹',
  `bag_color` varchar(7) DEFAULT NULL COMMENT '包包顏色',
  `text` varchar(10) DEFAULT NULL COMMENT '文字',
  `text_color` varchar(7) DEFAULT NULL COMMENT '文字顏色',
  `pattern_path` varchar(50) DEFAULT NULL COMMENT '圖案路徑',
  `product_id_01` int(10) DEFAULT NULL COMMENT '包包內容商品01',
  `product_id_02` int(10) DEFAULT NULL COMMENT '包包內容商品02',
  `product_id_03` int(10) DEFAULT NULL COMMENT '包包內容商品03',
  `product_id_04` int(10) DEFAULT NULL COMMENT '包包內容商品04',
  `total_price` int(5) NOT NULL DEFAULT '0' COMMENT '作品總價',
  `is_on_shelves` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架',
  `score` int(5) NOT NULL DEFAULT '0' COMMENT '人氣值',
  KEY `customized_product_FK1` (`product_id`),
  KEY `customized_product_FK2` (`member_id`),
  KEY `customized_product_FK3` (`bag_id`),
  KEY `customized_product_FK4` (`product_id_01`),
  KEY `customized_product_FK5` (`product_id_02`),
  KEY `customized_product_FK6` (`product_id_03`),
  KEY `customized_product_FK7` (`product_id_04`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客製化商品' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `customized_product`
--

INSERT INTO `customized_product` (`product_id`, `member_id`, `bag_id`, `image_path`, `name`, `description`, `bag_color`, `text`, `text_color`, `pattern_path`, `product_id_01`, `product_id_02`, `product_id_03`, `product_id_04`, `total_price`, `is_on_shelves`, `score`) VALUES
(33, 2, 1, 'images/Apo2018-12-30_21-46-29.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 1, 0),
(34, 2, 1, 'images/Apo2019-01-01_20-07-15.png', '我是包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 340, 1, 0),
(35, 2, 1, 'images/Apo2019-01-01_20-25-09.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 1, 0),
(36, 2, 1, 'images/Apo2019-01-02_11-10-19.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(39, 2, 1, 'images/Apo2019-01-02_14-12-04.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 370, 0, 0),
(40, 5, 1, 'images/Apo2019-01-02_14-12-35.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 368, 0, 0),
(41, 2, 1, 'images/Apo2019-01-02_14-18-44.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(42, 2, 1, 'images/Apo2019-01-02_14-28-24.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, 0),
(43, 2, 1, 'images/Apo2019-01-02_14-33-29.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(44, 2, 1, 'images/Apo2019-01-02_15-53-07.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(45, 2, 1, 'images/Apo2019-01-02_16-49-08.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(46, 2, 1, 'images/Apo2019-01-03_16-03-38.png', '我', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 280, 0, 0),
(47, 2, 1, 'images/Apo2019-01-04_02-22-53.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(48, 2, 1, 'images/Apo2019-01-04_03-54-41.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 292, 0, 0),
(49, 2, 1, 'images/Apo2019-01-04_22-41-31.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(50, 2, 1, 'images/Apo2019-01-04_22-42-47.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(51, 2, 1, 'images/Apo2019-01-04_22-43-55.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(52, 2, 1, 'images/Apo2019-01-04_22-45-59.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(53, 2, 1, 'images/Apo2019-01-04_22-47-40.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 355, 0, 0),
(54, 2, 1, 'images/Apo2019-01-04_22-48-54.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(55, 2, 1, 'images/Apo2019-01-04_22-50-39.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(56, 2, 1, 'images/Apo2019-01-04_22-51-11.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(57, 2, 1, 'images/Apo2019-01-04_22-52-13.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(60, 2, 1, 'images/Apo2019-01-05_18-09-44.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 435, 0, 0),
(61, 2, 1, 'images/Apo2019-01-05_18-44-32.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 240, 0, 0),
(62, 2, 1, 'images/Apo2019-01-05_18-52-31.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 390, 0, 0),
(63, 2, 1, 'images/Apo2019-01-05_18-52-49.png', 'test1', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 298, 0, 0),
(64, 2, 1, 'images/Apo2019-01-05_19-48-28.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 340, 0, 0),
(65, 2, 1, 'images/Apo2019-01-05_19-48-28.png', 'test1', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 235, 0, 0),
(66, 2, 1, 'images/Apo2019-01-05_20-47-29.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(67, 11, 1, 'images/Apo2019-01-05_21-53-55.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 530, 0, 0),
(68, 2, 1, 'images/Apo2019-01-05_21-54-24.png', 'test1', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 291, 0, 0),
(70, 2, 1, 'images/Apo2019-01-05_23-47-16.png', '哈哈包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 235, 0, 0),
(71, 2, 1, 'images/Apo2019-01-06_01-30-07.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(72, 2, 1, 'images/Apo2019-01-06_01-31-26.png', '我', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(73, 2, 1, 'images/Apo2019-01-06_01-32-45.png', '我', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 240, 0, 0),
(74, 2, 1, 'images/Apo2019-01-06_01-33-26.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 0, 0),
(75, 2, 1, 'images/Apo2019-01-06_11-23-04.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(76, 2, 1, 'images/Apo2019-01-06_11-23-54.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(77, 2, 1, 'images/Apo2019-01-06_11-25-10.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(78, 2, 1, 'images/Apo2019-01-06_11-25-29.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(79, 2, 1, 'images/Apo2019-01-06_11-25-47.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(80, 2, 1, 'images/Apo2019-01-06_11-26-49.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(81, 2, 1, 'images/Apo2019-01-06_11-28-34.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(82, 2, 1, 'images/Apo2019-01-06_11-29-59.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, 0),
(83, 2, 1, 'images/Apo2019-01-06_11-32-25.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, 0),
(84, 2, 1, 'images/Apo2019-01-06_11-33-10.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(85, 2, 1, 'images/Apo2019-01-06_11-33-50.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, 0),
(86, 2, 1, 'images/Apo2019-01-06_11-37-11.png', '您選擇的包包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(87, 2, 1, 'images/Apo2019-01-06_12-36-29.png', '測試包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 325, 0, 0),
(90, 2, 1, 'images/Apo2019-01-06_13-34-16.png', '666', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 392, 0, 0),
(92, 2, 1, 'images/Apo2019-01-06_16-28-13.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(93, 2, 1, 'images/Apo2019-01-06_16-40-36.png', 'Amos', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 358, 0, 0),
(94, 17, 1, 'images/Apo2019-01-06_19-45-32.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 385, 0, 0),
(95, 2, 1, 'images/Apo2019-01-06_19-45-31.png', 'AMOS包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 367, 0, 0),
(97, 2, 1, 'images/Apo2019-01-06_20-39-05.png', '', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 310, 0, 0),
(98, 2, 1, 'images/Apo2019-01-06_22-46-39.png', '天才良彥', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 250, 0, 0),
(100, 27, 1, 'images/Apo2019-01-07_09-18-27.png', 'AMOS包', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 367, 0, 0),
(101, 2, 1, 'images/Apo2019-01-07_09-18-28.png', 'Amos', '我是介紹', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 398, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `favorite_goods`
--

DROP TABLE IF EXISTS `favorite_goods`;
CREATE TABLE IF NOT EXISTS `favorite_goods` (
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `product_id` int(10) NOT NULL COMMENT '商品編號',
  KEY `favorite_goods_FK1` (`member_id`),
  KEY `favorite_goods_FK2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收藏商品';

--
-- 資料表的匯出資料 `favorite_goods`
--

INSERT INTO `favorite_goods` (`member_id`, `product_id`) VALUES
(11, 29),
(2, 6),
(2, 26),
(2, 38),
(2, 37),
(27, 17),
(17, 28),
(17, 9),
(17, 10),
(2, 22),
(27, 24);

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '管理者編號',
  `account` varchar(20) NOT NULL COMMENT '帳號',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  `role` char(1) NOT NULL DEFAULT '2' COMMENT '管理者角色',
  `nickname` varchar(20) NOT NULL COMMENT '暱稱',
  `state` char(1) NOT NULL DEFAULT '1' COMMENT '管理者狀態',
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='後台管理者' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `manager`
--

INSERT INTO `manager` (`manager_id`, `account`, `password`, `role`, `nickname`, `state`) VALUES
(1, 'admin', 'admin', '1', '系統管理者', '1'),
(2, 'apo', 'apo', '2', '店長', '1'),
(3, 'hqo', 'hqo', '2', 'hao', '0'),
(4, 'zoozoo', 'zoozoo', '2', 'zoo', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '會員編號',
  `account` varchar(20) NOT NULL COMMENT '帳號',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  `name` varchar(10) DEFAULT NULL COMMENT '姓名',
  `gender` tinyint(1) DEFAULT NULL COMMENT '性別',
  `mobile_phone` char(10) DEFAULT NULL COMMENT '手機號碼',
  `address` varchar(50) DEFAULT NULL COMMENT '地址',
  `email` varchar(30) NOT NULL COMMENT '電子郵件信箱',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `image_path` varchar(50) DEFAULT NULL COMMENT '頭貼路徑',
  `state` char(1) NOT NULL DEFAULT '1' COMMENT '會員狀態',
  `reported_times` int(2) NOT NULL DEFAULT '0' COMMENT '被檢舉次數',
  PRIMARY KEY (`member_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='會員';

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`member_id`, `account`, `password`, `name`, `gender`, `mobile_phone`, `address`, `email`, `birthday`, `image_path`, `state`, `reported_times`) VALUES
(1, 'tommi', '111', '劉小華', 1, '0912-16816', '桃園市中壢區中大路168號', '001@gmail.com', '1980-11-11', 'img/head/member_no_1_headpic.jpg', '1', 0),
(2, 'peter', '222', '美女在這裡', 1, '0912168168', '桃園市中壢區中大路168號', '001@gmail.com', '1980-05-30', 'img/head/member_no_2_headpic.jpg', '1', 0),
(15, 'apple', 'apple', '蘋果', 0, '0101010101', '蘋果市', 'pineapple@mail.com', '1980-11-11', 'img/head/member_no_15_headpic.jpg', '1', 0),
(16, 'dean', 'dean', '城武', 1, '0955665566', '中央大學', 'dean@mail.com', '1992-12-11', 'img/head/member_no_16_headpic.jpg', '1', 0),
(17, 'haohao', 'haohao', '豪豪', 1, '29292929', '中央大學', 'hao@mail.com', '2000-06-13', 'img/head/member_no_17_headpic.jpg', '1', 0),
(22, 'jacky', 'jacky', 'Jacky', 1, '0960789789', '香港九龍', 'jacky@mail.com', '1959-11-11', 'img/head/member_no_22_headpic.jpg', '1', 0),
(23, 'obama', 'obama', '歐巴馬', 1, '0909090909', '美國華盛頓DC', 'obama@gmail.com', '1980-11-11', 'img/head/member_no_23_headpic.jpg', '1', 0),
(24, 'aaaa', 'aaaa', '美女', NULL, '091232123', '中央大學', 'aaa@gmail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0),
(25, 'zoozoo', 'zoozoo', '如如', NULL, '091232123', '中大路1號', 'zoo@mail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0),
(26, 'bababa', 'bababa', '尚123', NULL, '尚未321', '尚未輸入123321', 'baba@gmail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0),
(27, 'pizz', 'pizz', '我是帥哥', NULL, '0909090909', '中央大學工程二館', 'pizz@mail.com', '1980-11-11', 'img/head/member_no_27_headpic.jpg', '1', 0),
(28, 'qwer', 'qwer', 'qwer', NULL, 'qwe123124', '1234qwsf', 'qweqwr@mail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0),
(29, 'zzzz', 'zzzz', '674684', NULL, '454', '5454564', 'zzzz@mail.com', '1980-11-11', 'img/head/member_no_29_headpic.jpg', '1', 0),
(30, 'ruru', 'ruru', '尚未輸入', NULL, '尚未輸入', '尚未輸入', 'ruru@mail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0),
(31, 'orange', 'orange', '尚未輸入', NULL, '尚未輸入', '尚未輸入', 'aaa@mail.com', '1980-11-11', 'img/head/default_head.jpg', '1', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member_coupon`
--

DROP TABLE IF EXISTS `member_coupon`;
CREATE TABLE IF NOT EXISTS `member_coupon` (
  `coupon_id` int(10) NOT NULL COMMENT '折價券編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `qty` int(5) NOT NULL DEFAULT '0' COMMENT '數量',
  KEY `member_coupon_FK1` (`coupon_id`),
  KEY `member_coupon_FK2` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員折價券';

--
-- 資料表的匯出資料 `member_coupon`
--

INSERT INTO `member_coupon` (`coupon_id`, `member_id`, `qty`) VALUES
(500, 2, 1),
(500, 17, 1),
(50, 27, 1),
(50, 28, 1),
(100, 27, 1),
(200, 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `member_hold_activity`
--

DROP TABLE IF EXISTS `member_hold_activity`;
CREATE TABLE IF NOT EXISTS `member_hold_activity` (
  `activity_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '活動編號',
  `activity_type_id` int(10) NOT NULL COMMENT '活動分類編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `store_id` int(10) NOT NULL COMMENT '店鋪編號',
  `title` varchar(20) NOT NULL COMMENT '標題',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `description` varchar(500) NOT NULL COMMENT '介紹',
  `desc_image01_path` varchar(50) NOT NULL COMMENT '介紹圖片1路徑',
  `desc_image02_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片2路徑',
  `desc_image03_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片3路徑',
  `desc_image04_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片4路徑',
  `desc_image05_path` varchar(50) DEFAULT NULL COMMENT '介紹圖片5路徑',
  `hold_date` date NOT NULL COMMENT '舉辦日期',
  `charge` int(5) NOT NULL DEFAULT '0' COMMENT '費用',
  `max_people` int(2) NOT NULL COMMENT '人數限制',
  `is_on_shelves` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架',
  `registered_people` int(2) NOT NULL DEFAULT '0' COMMENT '已報名人數',
  `state` char(1) NOT NULL DEFAULT '1' COMMENT '活動狀態',
  PRIMARY KEY (`activity_id`),
  KEY `member_hold_activity_FK1` (`activity_type_id`),
  KEY `member_hold_activity_FK2` (`member_id`),
  KEY `member_hold_activity_FK3` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='會員舉辦的活動';

--
-- 資料表的匯出資料 `member_hold_activity`
--

INSERT INTO `member_hold_activity` (`activity_id`, `activity_type_id`, `member_id`, `store_id`, `title`, `name`, `description`, `desc_image01_path`, `desc_image02_path`, `desc_image03_path`, `desc_image04_path`, `desc_image05_path`, `hold_date`, `charge`, `max_people`, `is_on_shelves`, `registered_people`, `state`) VALUES
(1, 1, 1, 1, '打彈珠', '來一起打彈珠喔', '來玩喔來玩喔來玩喔來玩喔來玩喔來玩喔', 'img/event/marbles1.jpg', NULL, NULL, NULL, NULL, '2018-12-22', 0, 20, 0, 0, '1'),
(2, 1, 1, 1, '打彈珠', '彈珠王決鬥', '賭上最強決鬥者的稱號，來一決勝負吧!', 'img/event/marbles2.jpg', NULL, NULL, NULL, NULL, '2018-12-18', 0, 20, 0, 0, '1'),
(3, 2, 2, 2, '放風箏', '一起放風箏吧', '乘風破浪，實現夢想，風箏之路有你有我', 'img/event/kite1.jpg', NULL, NULL, NULL, NULL, '2019-01-01', 0, 20, 0, 0, '1'),
(4, 3, 2, 3, '打陀螺', '轉呀轉呀', '轉轉轉，旋轉跳躍我閉著眼', 'img/event/roundabout2.jpg', NULL, NULL, NULL, NULL, '2018-11-12', 0, 20, 0, 0, '1'),
(5, 4, 1, 4, '糖葫蘆', '甜而不膩', '甜蜜的好味道，酸中帶甜，好好吃', 'img/event/tomatoes1.jpg', NULL, NULL, NULL, NULL, '2018-10-15', 0, 20, 0, 0, '1'),
(6, 5, 1, 5, '彩繪燈籠', '來一起彩繪燈籠喔', '激發你的美術能力，發揮無限的想像力', 'img/event/lantern1.jpg', NULL, NULL, NULL, NULL, '2019-01-05', 0, 20, 0, 0, '1'),
(7, 5, 2, 5, '彩繪燈籠', '做個藝術家', '跳脫世俗的框架，展現你心中沉睡的靈魂吧', 'img/event/lantern2.jpg', NULL, NULL, NULL, NULL, '2018-12-25', 0, 20, 0, 0, '1'),
(8, 4, 1, 4, '糖葫蘆', '揪團來做糖葫蘆', '我超愛吃糖葫蘆，但是不會做，快來人教我教我~', 'img/event/tomatoes2.jpg', NULL, NULL, NULL, NULL, '2018-12-30', 0, 20, 0, 0, '1'),
(9, 2, 2, 2, '放風箏', '戶外活動好選擇', '放風箏感覺好悠閒，我超愛放風箏的，一起來吧!', 'img/event/kite2.jpg', NULL, NULL, NULL, NULL, '2018-10-31', 0, 20, 0, 0, '1'),
(10, 3, 2, 3, '打陀螺', '我最愛打陀螺', '不要說你不愛打陀螺，是人都愛打陀螺', 'img/event/roundabout1.jpg', NULL, NULL, NULL, NULL, '2018-10-15', 0, 20, 0, 0, '1'),
(11, 1, 2, 3, '打陀螺', '來一起打陀螺喔', '來玩喔來玩喔來玩喔來玩喔來玩喔來玩喔', 'img/event/roundabout2.jpg', NULL, NULL, NULL, NULL, '2018-09-22', 0, 20, 0, 0, '1'),
(68, 2, 16, 5, '放風箏', '追風少年團', '來一起享受追風的快感吧，不見不散!', 'img/event/kite1.jpg', NULL, NULL, NULL, NULL, '2018-06-18', 200, 20, 0, 0, '1'),
(82, 3, 16, 3, '打陀螺', '鹿港小鎮打陀螺', '來喔~相揪打陀螺，不見不散!', 'img/event/roundabout1.jpg', NULL, NULL, NULL, NULL, '2019-01-06', 200, 40, 0, 0, '1'),
(83, 2, 16, 5, '放風箏', '飛行夢想家', '我的夢想是飛行員，我要實現我的夢想', 'img/event/kite1.jpg', NULL, NULL, NULL, NULL, '2018-11-01', 200, 20, 0, 0, '1'),
(85, 2, 25, 5, '放風箏', '如如放風箏', '一起放風箏', 'img/event/kite1.jpg', NULL, NULL, NULL, NULL, '2019-01-31', 200, 20, 0, 0, '1'),
(87, 4, 27, 3, '糖葫蘆', '好吃的糖葫蘆', '我想學習做糖葫蘆，回味童年的感覺~~~', 'img/event/tomatoes1.jpg', NULL, NULL, NULL, NULL, '2019-01-10', 200, 40, 0, 0, '1'),
(88, 3, 2, 3, '打陀螺', '打陀螺好好玩', '一起打陀螺', 'img/event/roundabout1.jpg', NULL, NULL, NULL, NULL, '2019-01-19', 200, 40, 0, 0, '1');

-- --------------------------------------------------------

--
-- 資料表結構 `member_join_activity`
--

DROP TABLE IF EXISTS `member_join_activity`;
CREATE TABLE IF NOT EXISTS `member_join_activity` (
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `activity_id` int(10) NOT NULL COMMENT '活動編號',
  `register_date` date NOT NULL COMMENT '報名日期',
  `state` char(1) NOT NULL DEFAULT '1' COMMENT '報名狀態',
  KEY `member_join_activity_FK1` (`member_id`),
  KEY `member_join_activity_FK2` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='會員報名的活動';

--
-- 資料表的匯出資料 `member_join_activity`
--

INSERT INTO `member_join_activity` (`member_id`, `activity_id`, `register_date`, `state`) VALUES
(27, 87, '2019-01-06', '1'),
(30, 87, '2019-01-07', '1'),
(31, 85, '2019-01-07', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品編號',
  `name` varchar(10) NOT NULL COMMENT '名稱',
  `category` char(1) NOT NULL COMMENT '分類',
  `description` varchar(500) NOT NULL COMMENT '介紹',
  `price` int(5) NOT NULL DEFAULT '0' COMMENT '單價',
  `is_on_shelves` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架',
  `score` int(5) NOT NULL DEFAULT '0' COMMENT '人氣值',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`product_id`, `name`, `category`, `description`, `price`, `is_on_shelves`, `score`) VALUES
(1, '膠帶口香糖', '1', '膠帶口香糖，懷舊好味道! ', 35, 1, 6),
(2, '77乳加巧克力', '1', '77乳加巧克力，懷念的好滋味!', 105, 0, 20),
(3, '香菸糖', '1', '香菸糖是小時候拼命想長大的滋味，酸酸甜甜。', 30, 0, 3),
(4, '森永牛奶糖', '1', '森永牛奶糖，甜膩懷舊好味道!', 28, 0, 9),
(5, '仙里紅', '1', '仙楂糖，顧胃生津解渴。', 120, 0, 7),
(6, '黃心梅', '1', '古早味懷舊零嘴，微甜的麥芽糖包裹著梅子，酸甜好吃～ ', 165, 0, 7),
(7, '口紅糖', '1', '懷舊零食口紅糖，最喜歡的口紅造型棒棒糖! ', 20, 0, 8),
(8, '可樂罐糖', '1', '小小可樂罐，拿在手，甜在心!', 25, 0, 15),
(9, '棒棒糖', '1', '好吃的棒棒糖，逛街上課不能忘!', 12, 0, 152),
(10, '跳跳糖', '1', '跳跳糖，蹦跳口裡，最刺激!', 21, 0, 81),
(11, '空氣槍', '2', '蹦蹦蹦，最懷舊的互打遊戲!', 120, 0, 65),
(12, '彩虹彈力環', '2', '彩虹環，七彩最好玩!', 42, 0, 59),
(13, '劍玉', '2', '考驗耐心，小時候的好玩伴!', 120, 0, 88),
(14, '竹蜻蜓', '2', '竹蜻蜓，帶著兒時夢想上青天', 21, 0, 120),
(15, '菜脯餅', '3', '台灣古早味菜脯餅，一吃就能品嘗到那鹹甜酥脆的好滋味，讓人欲罷不能，一口接著一口停不下來！\r\n', 25, 0, 16),
(16, '點心麵', '3', '酥酥脆脆，好吃到停不下來', 20, 0, 4),
(17, '王子麵', '3', '帶著球帽的小男孩是小王子麵的招牌商標，味王公司在70年代所推出的全新產品，小包裝和壓碎就可以當成零食來吃的便利性，造就了許多人「上課偷吃王子麵」的有趣回憶。\r\n\r\n', 15, 0, 90),
(18, '玉米濃湯', '3', '玉米濃湯，懷舊好滋味!', 25, 0, 131),
(19, '滿天星', '3', '滿天星，懷舊好滋味!', 25, 0, 1),
(20, '可口奶滋', '3', '可口奶滋，懷舊好滋味!', 35, 0, 13),
(21, '鹹蔬餅', '3', '鹹蔬餅，懷舊好滋味!', 22, 0, 63),
(22, '科學麵', '3', '科學麵，越吃越聰明，吃出聰明味!', 18, 0, 72),
(23, '真魷味', '3', '真魷味，懷舊好滋味!', 20, 0, 19),
(24, '飛機餅乾', '3', '飛機餅乾，越吃越奶油，越吃越好吃!', 25, 0, 150),
(25, '彈珠汽水', '4', '彈珠汽水，懷舊好滋味!', 25, 0, 167),
(26, '多采多姿', '4', '多采多姿，懷舊好滋味!\r\n', 20, 0, 47),
(27, 'QOO', '4', 'QOO，有種果汁真好喝，喝的時候酷~ 喝完臉紅紅~\r\n', 25, 0, 59),
(28, '蘋果西打', '4', '蘋果西打，餐桌上不能缺少的一味!\r\n', 25, 0, 80),
(29, '黑松沙士', '4', '黑松沙士，一手一瓶，不放手!\r\n', 25, 0, 173),
(30, '奧利多', '4', '奧利多，懷舊好滋味!\r\n', 35, 0, 35),
(31, '維大力', '4', '維大力，義大利，it\'s good to drink!\r\n', 25, 0, 26),
(32, '冬瓜茶', '4', '冬瓜茶，真正懷舊好味道，每到夏天不能少!\r\n', 15, 0, 70),
(33, '法鬥呆呆包', '5', '愛狗狗就要領養不棄養!!', 499, 0, 20),
(34, '主子放空包', '5', '主子好無聊，快來抓癢癢', 499, 0, 25),
(35, '名人棒棒包', '5', 'We will build a wall', 499, 0, 19),
(36, '黑人問號包', '5', '????????????', 499, 0, 16),
(37, '缺女友包', '5', '沒有女朋友', 499, 0, 16),
(38, 'Skr包', '5', 'Skr! Skr!', 499, 0, 19),
(100, 'AMOS包', '5', '好吃又好玩', 367, 0, 0),
(101, 'Amos', '5', '好吃又好玩', 398, 0, 0),
(102, '水槍', '2', '水槍', 120, 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '圖片編號',
  `product_id` int(10) NOT NULL COMMENT '商品編號',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `image_path` varchar(50) NOT NULL COMMENT '圖片路徑',
  PRIMARY KEY (`image_id`),
  KEY `product_image_FK1` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='商品圖片';

--
-- 資料表的匯出資料 `product_image`
--

INSERT INTO `product_image` (`image_id`, `product_id`, `name`, `image_path`) VALUES
(1, 1, '膠帶口香糖', 'img/candy/1bubbleGum.png'),
(2, 2, '77乳加巧克力', 'img/candy/2chocolate77.png'),
(3, 3, '香菸糖', 'img/candy/3smokeCandy.png'),
(4, 4, '森永牛奶糖', 'img/candy/4milkCandy.png'),
(5, 5, '仙楂糖', 'img/candy/5plumCandy.png'),
(6, 6, '黃心梅', 'img/candy/6yellowPlum.png'),
(7, 7, '口紅糖', 'img/candy/7lipStick.png'),
(8, 8, '可樂罐糖', 'img/candy/8cokeCan.png'),
(9, 9, '棒棒糖', 'img/candy/9lollipop.png'),
(10, 10, '跳跳糖', 'img/candy/10popCandy.png'),
(11, 11, '空氣槍', 'img/toy/11airGun.png'),
(12, 12, '彩虹彈力環', 'img/toy/12rainbowElasticRing.png'),
(13, 13, '劍玉', 'img/toy/13kendama.png'),
(14, 14, '竹蜻蜓', 'img/toy/14hopter.png'),
(15, 15, '菜脯餅', 'img/cookie/15tsaiBu.png'),
(16, 16, '點心麵', 'img/cookie/16dianXin.png'),
(17, 17, '王子麵', 'img/cookie/17wangZhi.png'),
(18, 18, '玉米濃湯', 'img/cookie/18cornSoup.png'),
(19, 19, '滿天星', 'img/cookie/19luckyStars.png'),
(20, 20, '可口奶滋', 'img/cookie/20deliciousCookie.png'),
(21, 21, '鹹蔬餅', 'img/cookie/21vegie.png'),
(22, 22, '科學麵', 'img/cookie/22scienceNoodle.png'),
(23, 23, '真魷味', 'img/cookie/23squid.png'),
(24, 24, '飛機餅乾', 'img/cookie/24airplaneCookie.png'),
(25, 25, '彈珠汽水', 'img/drink/25marbleSoda.png'),
(26, 26, '多采多姿', 'img/drink/26colorful.png'),
(27, 27, 'QOO', 'img/drink/27Qoo.png'),
(28, 28, '蘋果西打', 'img/drink/28appleSoda.png'),
(29, 29, '黑松沙士', 'img/drink/29heySong.png'),
(30, 30, '奧利多', 'img/drink/30oligo.png'),
(31, 31, '維大力', 'img/drink/31vitali.png'),
(32, 32, '冬瓜茶', 'img/drink/32winterMelonTea.png'),
(33, 33, '法鬥呆呆包', 'img/cust/bag_customized1.png'),
(34, 34, '主子放空包', 'img/cust/bag_customized2.png'),
(35, 35, '名人棒棒包', 'img/cust/bag_customized3.png'),
(36, 36, '黑人問號包', 'img/cust/bag_customized4.png'),
(37, 37, '缺女友包', 'img/cust/bag_customized6.png'),
(38, 38, 'Skr包', 'img/cust/bag_customized5.png'),
(39, 58, 'sdf', 'img/candy/bg-title-02.jpg'),
(40, 59, 'adsf', 'img/candy/bubblegum.png'),
(67, 67, '', 'images/Apo2019-01-05_21-53-55.png'),
(68, 68, 'test1', 'images/Apo2019-01-05_21-54-24.png'),
(69, 69, 'test', 'img/candy/bubblegum.png'),
(70, 70, '哈哈包', 'images/Apo2019-01-05_23-47-16.png'),
(71, 71, '', 'images/Apo2019-01-06_01-30-07.png'),
(72, 72, '我', 'images/Apo2019-01-06_01-31-26.png'),
(73, 73, '我', 'images/Apo2019-01-06_01-32-45.png'),
(74, 74, '您選擇的包包', 'images/Apo2019-01-06_01-33-26.png'),
(75, 75, '您選擇的包包', 'images/Apo2019-01-06_11-23-04.png'),
(76, 76, '您選擇的包包', 'images/Apo2019-01-06_11-23-54.png'),
(77, 77, '您選擇的包包', 'images/Apo2019-01-06_11-25-10.png'),
(78, 78, '您選擇的包包', 'images/Apo2019-01-06_11-25-29.png'),
(79, 79, '您選擇的包包', 'images/Apo2019-01-06_11-25-47.png'),
(80, 80, '您選擇的包包', 'images/Apo2019-01-06_11-26-49.png'),
(81, 81, '', 'images/Apo2019-01-06_11-28-34.png'),
(82, 82, '您選擇的包包', 'images/Apo2019-01-06_11-29-59.png'),
(83, 83, '您選擇的包包', 'images/Apo2019-01-06_11-32-25.png'),
(84, 84, '您選擇的包包', 'images/Apo2019-01-06_11-33-10.png'),
(85, 85, '', 'images/Apo2019-01-06_11-33-50.png'),
(86, 86, '您選擇的包包', 'images/Apo2019-01-06_11-37-11.png'),
(87, 87, '測試包', 'images/Apo2019-01-06_12-36-29.png'),
(92, 92, '', 'images/Apo2019-01-06_16-28-13.png'),
(93, 93, 'Amos', 'images/Apo2019-01-06_16-40-36.png'),
(94, 94, '', 'images/Apo2019-01-06_19-45-32.png'),
(95, 95, 'AMOS包', 'images/Apo2019-01-06_19-45-31.png'),
(96, 96, '水槍', 'img/toy/watergun.png'),
(97, 97, '', 'images/Apo2019-01-06_20-39-05.png'),
(98, 98, '天才良彥', 'images/Apo2019-01-06_22-46-39.png'),
(100, 100, 'AMOS包', 'images/Apo2019-01-07_09-18-27.png'),
(101, 101, 'Amos', 'images/Apo2019-01-07_09-18-28.png'),
(102, 102, '水槍', 'img/toy/watergun.png');

-- --------------------------------------------------------

--
-- 資料表結構 `product_msg`
--

DROP TABLE IF EXISTS `product_msg`;
CREATE TABLE IF NOT EXISTS `product_msg` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '留言編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `product_id` int(10) NOT NULL COMMENT '商品編號',
  `title` varchar(20) NOT NULL COMMENT '標題',
  `inner_text` varchar(500) NOT NULL COMMENT '內文',
  `message_datetime` datetime NOT NULL COMMENT '留言日期時間',
  PRIMARY KEY (`message_id`),
  KEY `product_msg_FK1` (`member_id`),
  KEY `product_msg_FK2` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='商品留言';

--
-- 資料表的匯出資料 `product_msg`
--

INSERT INTO `product_msg` (`message_id`, `member_id`, `product_id`, `title`, `inner_text`, `message_datetime`) VALUES
(1, 2, 35, '', '這很可愛', '2019-01-04 21:49:24'),
(2, 2, 14, '', '哈囉', '2019-01-05 16:50:15'),
(9, 15, 5, '', '古早糖果餅乾，懷念的好味道', '2019-01-06 19:24:39'),
(10, 23, 3, '', 'This is awesome!!!', '2019-01-06 19:26:10'),
(11, 2, 34, '', '讚啦', '2019-01-06 19:51:17'),
(12, 17, 27, '', 'Qoo好好喝', '2019-01-06 19:51:26'),
(13, 27, 24, '', '飛機餅乾好好吃', '2019-01-07 09:20:53'),
(14, 2, 22, '', '我喜歡糖果餅乾', '2019-01-07 09:20:54');

-- --------------------------------------------------------

--
-- 資料表結構 `product_msg_report`
--

DROP TABLE IF EXISTS `product_msg_report`;
CREATE TABLE IF NOT EXISTS `product_msg_report` (
  `report_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '檢舉編號',
  `message_id` int(10) NOT NULL COMMENT '留言編號',
  `member_id` int(10) NOT NULL COMMENT '檢舉會員編號',
  `report_reason_type` char(1) NOT NULL COMMENT '檢舉原因分類',
  `report_reason` varchar(100) NOT NULL COMMENT '檢舉原因',
  `report_datetime` datetime NOT NULL COMMENT '檢舉日期時間',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '處理狀態',
  PRIMARY KEY (`report_id`),
  KEY `product_msg_report_FK1` (`message_id`),
  KEY `product_msg_report_FK2` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='商品留言檢舉';

--
-- 資料表的匯出資料 `product_msg_report`
--

INSERT INTO `product_msg_report` (`report_id`, `message_id`, `member_id`, `report_reason_type`, `report_reason`, `report_datetime`, `state`) VALUES
(29, 9, 2, '', '', '2019-01-06 19:51:28', 1),
(30, 12, 27, '', '', '2019-01-07 09:21:04', 1),
(31, 10, 2, '', '', '2019-01-07 09:21:07', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_order`
--

DROP TABLE IF EXISTS `product_order`;
CREATE TABLE IF NOT EXISTS `product_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '訂單編號',
  `member_id` int(10) NOT NULL COMMENT '會員編號',
  `order_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '訂購日期時間',
  `amount` int(5) NOT NULL DEFAULT '0' COMMENT '總金額',
  `payment_method` char(8) NOT NULL DEFAULT '1' COMMENT '付款方式',
  `payment_state` char(1) NOT NULL DEFAULT '0' COMMENT '付款狀態',
  `order_state` char(1) NOT NULL DEFAULT '0' COMMENT '訂單狀態',
  PRIMARY KEY (`order_id`),
  KEY `product_order_FK1` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='一般商品訂單';

--
-- 資料表的匯出資料 `product_order`
--

INSERT INTO `product_order` (`order_id`, `member_id`, `order_datetime`, `amount`, `payment_method`, `payment_state`, `order_state`) VALUES
(1, 17, '2019-01-07 08:18:15', 150, '貨到付款', '1', '0'),
(2, 17, '2019-01-07 08:18:53', 325, '銀行轉帳', '1', '0'),
(3, 17, '2019-01-07 08:26:06', 200, '超商付款', '1', '0'),
(4, 27, '2019-01-07 09:22:33', 659, '銀行轉帳', '1', '1'),
(5, 2, '2019-01-07 09:22:42', 646, '信用卡', '1', '0');

-- --------------------------------------------------------

--
-- 資料表結構 `product_order_detail`
--

DROP TABLE IF EXISTS `product_order_detail`;
CREATE TABLE IF NOT EXISTS `product_order_detail` (
  `order_id` int(10) NOT NULL COMMENT '訂單編號',
  `product_id` int(10) NOT NULL COMMENT '商品編號',
  `price` int(5) NOT NULL DEFAULT '0' COMMENT '單價',
  `qty` int(5) NOT NULL DEFAULT '0' COMMENT '數量',
  KEY `product_order_detail_FK1` (`order_id`),
  KEY `product_order_detail_FK2` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='一般商品訂單明細';

--
-- 資料表的匯出資料 `product_order_detail`
--

INSERT INTO `product_order_detail` (`order_id`, `product_id`, `price`, `qty`) VALUES
(1, 29, 25, 26),
(2, 28, 25, 1),
(2, 7, 20, 15),
(3, 29, 25, 8),
(4, 100, 367, 2),
(4, 25, 25, 1),
(5, 101, 398, 2),
(5, 3, 30, 1),
(5, 7, 20, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `qa`
--

DROP TABLE IF EXISTS `qa`;
CREATE TABLE IF NOT EXISTS `qa` (
  `qa_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Q&A編號',
  `question` varchar(50) NOT NULL COMMENT '問題',
  `answer` varchar(500) NOT NULL COMMENT '答案',
  PRIMARY KEY (`qa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='問與答';

--
-- 資料表的匯出資料 `qa`
--

INSERT INTO `qa` (`qa_id`, `question`, `answer`) VALUES
(1, '如何成為阿婆柑仔店的會員？', '如何成為阿婆柑仔店的會員？\r\n請點選首頁右上方的『登入』，並輸入所需的資訊，進行註冊手續。'),
(2, '如何變更您的密碼？', '請點選『我的帳戶』中的『變更您的個人資料』即可重新設定，密碼更改完畢後，請再重新登入。'),
(3, '忘記密碼該怎麼辦？', '請點選『會員登入』中的『忘記密碼』，並依指示進行操作，密碼更改完畢後，請再重新登入。'),
(4, '如何付款？', '貨到付款、銀行轉帳／ATM、信用卡（支援國內外Visa, Master, JCB）。'),
(5, '訂單成立後多久會收到商品？', '確認訂單後，將在7個工作天內出貨。通知出貨後1-3日會配送到指定地址。（除預購與特定商品以外）'),
(6, '如何修改配送地址？', '請與客服中心聯絡，如商品還未出貨，服務人員可協助您更改配送地址。'),
(7, '網路商店與實體店舖的價格是否相同？', '基本上價格將與實體店舖相同。'),
(8, '如何辦理退換貨？', '當您收到貨品之後，因本商城沒提供換貨服務（只有退貨服務），您可以利用退貨的方式，重新於線上訂貨，謝謝！'),
(9, '商品訂錯，可以直接換購其他商品嗎？', '受限營運機制，無法直接以退補差額方式來換購其它商品，建議可考慮採退貨後重新訂購方式。'),
(10, '收到商品有破損、瑕疵 怎麼辦？', '請在收貨3日內通知，將盡快安排更換。'),
(11, '如何計算運費?', '單筆購買金額在1500元以下，酌收運費80元;單筆1500元以上即可享有免運優惠。'),
(12, '否可送至郵局內租用信箱？', '因台灣郵局的郵政信箱僅接受郵局包裹，所以目前台灣官網沒有提供此項服務。');

-- --------------------------------------------------------

--
-- 資料表結構 `robot_words`
--

DROP TABLE IF EXISTS `robot_words`;
CREATE TABLE IF NOT EXISTS `robot_words` (
  `word_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '詞彙編號',
  `word` varchar(50) NOT NULL COMMENT '詞彙內容',
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='機器人詞庫';

--
-- 資料表的匯出資料 `robot_words`
--

INSERT INTO `robot_words` (`word_id`, `word`) VALUES
(15, '早上09:00~下午17:00'),
(16, '凡是購買客製化商品即可免費參加活動一次喔!'),
(17, '登入會員每天可以玩一次小遊戲，抽優惠禮卷喔~'),
(18, '你要的問題都可以在問與答找到'),
(19, '你可以前往客製化包包，製作你想要的包包'),
(21, '在這裡可以找到有關店鋪的相關資訊'),
(25, '不能做什麼'),
(26, '不能做什麼'),
(35, '早安早安~~~');

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '店鋪編號',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `description` varchar(100) NOT NULL COMMENT '介紹',
  `address` varchar(30) NOT NULL COMMENT '地址',
  `phone` varchar(15) NOT NULL COMMENT '電話',
  `business_hours` varchar(30) NOT NULL COMMENT '營業時間',
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='店鋪' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`store_id`, `name`, `description`, `address`, `phone`, `business_hours`) VALUES
(1, '逢甲店鋪', '一間充滿人情味的柑仔店。', '中央區中央路300號', '(04)-87654321', '0900~1700'),
(2, '北港店鋪', '這裡會不定期舉辦活動，歡迎親朋好友攜伴來參加!', '中央區中央路300號', '(05)-87654321', '0900~1700'),
(3, '鹿港店鋪', '位於在巷弄的一間柑仔店，避開了繁華 的都市與人潮，有著傳統的阿婆柑仔店。附近有鹿港小鎮與鹿港天后宮。', '中央區中央路300號', '(04)-87654321', '0900~1700'),
(4, '新港店鋪', '這裡充滿了驚奇又好玩的古玩與好吃的零嘴喔~', '中央區中央路300號', '(05)-87654321', '0900~1700'),
(5, '中央店鋪', '經營不善，惡性倒閉。', '中央區中央路300號', '(03)-87654321', '0900~1700');

-- --------------------------------------------------------

--
-- 資料表結構 `store_image`
--

DROP TABLE IF EXISTS `store_image`;
CREATE TABLE IF NOT EXISTS `store_image` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '圖片編號',
  `store_id` int(10) NOT NULL COMMENT '店鋪編號',
  `name` varchar(20) NOT NULL COMMENT '名稱',
  `image_path` varchar(50) NOT NULL COMMENT '圖片路徑',
  PRIMARY KEY (`image_id`),
  KEY `store_image_FK1` (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店鋪圖片';

-- --------------------------------------------------------

--
-- 資料表結構 `word_keyword`
--

DROP TABLE IF EXISTS `word_keyword`;
CREATE TABLE IF NOT EXISTS `word_keyword` (
  `keyword_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '關鍵字編號',
  `keyword` varchar(10) NOT NULL COMMENT '關鍵字',
  `word_id` int(10) NOT NULL COMMENT '詞彙編號',
  PRIMARY KEY (`keyword_id`),
  KEY `word_keyword_FK1` (`word_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='詞彙關鍵字' ROW_FORMAT=COMPACT;

--
-- 資料表的匯出資料 `word_keyword`
--

INSERT INTO `word_keyword` (`keyword_id`, `keyword`, `word_id`) VALUES
(1, '營業時間', 15),
(4, '活動報名', 16),
(5, '小遊戲', 17),
(6, '問與答', 18),
(7, '客製化', 19),
(8, '店鋪資訊', 21),
(11, '找到', 21),
(19, '早安', 35);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `activity_msg`
--
ALTER TABLE `activity_msg`
  ADD CONSTRAINT `activity_msg_FK1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `activity_msg_FK2` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_type` (`activity_type_id`);

--
-- 資料表的 Constraints `customized_product`
--
ALTER TABLE `customized_product`
  ADD CONSTRAINT `customized_product_FK1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `customized_product_FK2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `customized_product_FK3` FOREIGN KEY (`bag_id`) REFERENCES `customized_bag_type` (`bag_id`),
  ADD CONSTRAINT `customized_product_FK4` FOREIGN KEY (`product_id_01`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `customized_product_FK5` FOREIGN KEY (`product_id_02`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `customized_product_FK6` FOREIGN KEY (`product_id_03`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `customized_product_FK7` FOREIGN KEY (`product_id_04`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `favorite_goods`
--
ALTER TABLE `favorite_goods`
  ADD CONSTRAINT `favorite_goods_FK1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `favorite_goods_FK2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `member_coupon`
--
ALTER TABLE `member_coupon`
  ADD CONSTRAINT `member_coupon_FK1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon_type` (`coupon_id`),
  ADD CONSTRAINT `member_coupon_FK2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- 資料表的 Constraints `member_hold_activity`
--
ALTER TABLE `member_hold_activity`
  ADD CONSTRAINT `member_hold_activity_FK1` FOREIGN KEY (`activity_type_id`) REFERENCES `activity_type` (`activity_type_id`),
  ADD CONSTRAINT `member_hold_activity_FK2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `member_hold_activity_FK3` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- 資料表的 Constraints `member_join_activity`
--
ALTER TABLE `member_join_activity`
  ADD CONSTRAINT `member_join_activity_FK1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `member_join_activity_FK2` FOREIGN KEY (`activity_id`) REFERENCES `member_hold_activity` (`activity_id`);

--
-- 資料表的 Constraints `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_FK1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `product_msg`
--
ALTER TABLE `product_msg`
  ADD CONSTRAINT `product_msg_FK1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
  ADD CONSTRAINT `product_msg_FK2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `product_msg_report`
--
ALTER TABLE `product_msg_report`
  ADD CONSTRAINT `product_msg_report_FK1` FOREIGN KEY (`message_id`) REFERENCES `product_msg` (`message_id`),
  ADD CONSTRAINT `product_msg_report_FK2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- 資料表的 Constraints `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_FK1` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- 資料表的 Constraints `product_order_detail`
--
ALTER TABLE `product_order_detail`
  ADD CONSTRAINT `product_order_detail_FK1` FOREIGN KEY (`order_id`) REFERENCES `product_order` (`order_id`),
  ADD CONSTRAINT `product_order_detail_FK2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `store_image`
--
ALTER TABLE `store_image`
  ADD CONSTRAINT `store_image_FK1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`);

--
-- 資料表的 Constraints `word_keyword`
--
ALTER TABLE `word_keyword`
  ADD CONSTRAINT `word_keyword_FK1` FOREIGN KEY (`word_id`) REFERENCES `robot_words` (`word_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
