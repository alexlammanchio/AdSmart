-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-06-22 19:33:54
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
-- 資料庫： `adsmart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `adsmart_admin`
--

CREATE TABLE `adsmart_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adsmart_admin`
--

INSERT INTO `adsmart_admin` (`id`, `full_name`, `display_name`, `password`) VALUES
(1, 'AdSmart IT Admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 'test2', 'test2', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- 資料表結構 `adsmart_business_partner`
--

CREATE TABLE `adsmart_business_partner` (
  `shop_code` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_chinese_name` varchar(255) CHARACTER SET big5 NOT NULL,
  `company_reg_number` varchar(100) NOT NULL,
  `company_reg_address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_confirm` varchar(255) NOT NULL,
  `print_ads` tinyint(1) NOT NULL,
  `broadcast_ads` tinyint(1) NOT NULL,
  `outdoor_ads` tinyint(1) NOT NULL,
  `telemarketing_ads` tinyint(1) NOT NULL,
  `events_ads` tinyint(1) NOT NULL,
  `placement_ads` tinyint(1) NOT NULL,
  `display_ads` tinyint(1) NOT NULL,
  `search_ads` tinyint(1) NOT NULL,
  `social_ads` tinyint(1) NOT NULL,
  `video_ads` tinyint(1) NOT NULL,
  `native_ads` tinyint(1) NOT NULL,
  `influencer_ads` tinyint(1) NOT NULL,
  `poster` tinyint(1) NOT NULL,
  `sticker` tinyint(1) NOT NULL,
  `print_material` tinyint(1) NOT NULL,
  `clothes_product` tinyint(1) NOT NULL,
  `tnc` tinyint(1) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adsmart_business_partner`
--

INSERT INTO `adsmart_business_partner` (`shop_code`, `user_id`, `company_name`, `company_chinese_name`, `company_reg_number`, `company_reg_address`, `country`, `contact_number`, `email`, `image_name`, `password`, `password_confirm`, `print_ads`, `broadcast_ads`, `outdoor_ads`, `telemarketing_ads`, `events_ads`, `placement_ads`, `display_ads`, `search_ads`, `social_ads`, `video_ads`, `native_ads`, `influencer_ads`, `poster`, `sticker`, `print_material`, `clothes_product`, `tnc`, `description`) VALUES
(7, 'abccompany', 'ABC Company LTD', '你好公司1', 'ABC1234', 'Macao street 21', 'Macao', '853333444', 'abccompany123@gmail.com', 'AdSmart_Company_936.PNG', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 'Chinese Advertisement company '),
(10, 'GoodCompany', 'GoodCompany', '你好好', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'Macau', '853123666666', 'lammanchio@gmail.com', 'AdSmart_Company_177.JPG', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 1, 'Hong Kong entertainment print company. The company produces comedic videos in Chinese that can be between a few seconds to a few minutes. It has a dozen performing artists under management.'),
(50, 'adscompany', 'adscompany', 'NA', 'ads1234', 'macao', 'Macao', '853123456', 'adscompany@gmail.com', 'AdSmart_Company_220.JPG', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 'Provide print material and advertisement company													    	\r\n													    	'),
(51, 'dcompany', 'dcompany', 'NA', 'd123456', 'macao', 'China', '853123456', 'dcompany@gmail.com', 'AdSmart_Company_854.JPG', '827ccb0eea8a706c4c34a16891f84e7b', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 'Can provide food menu company													    	\r\n													    	'),
(52, 'mango', 'MANGO', 'NA', 'MANGO1234', 'macao', 'Macao', '853123456', 'manago123@gamil.com', 'AdSmart_Company_295.JPG', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 'Macao company can provide food menu design and menu printing													    	\r\n													    	'),
(53, 'alexlam12312', 'abccompany1234', '', 'asd1234', 'ajskld klasjdlkja aksjdklas', 'Australia', '5388888888', 'test213123@gmail.com', 'company', 'f190ce9ac8445d249747cab7be43f7d5', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'asd1324													    	\r\n													    	'),
(54, 'alexlam', '1', '', '1', 'ajskld klasjdlkja aksjdklas', 'Burundi', '85388888888', 'test@gmail.com', 'company', '81dc9bdb52d04dc20036dbd8313ed055', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '21312													    	\r\n												    	');

-- --------------------------------------------------------

--
-- 資料表結構 `adsmart_business_product`
--

CREATE TABLE `adsmart_business_product` (
  `id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_id` int(100) NOT NULL,
  `active` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adsmart_business_product`
--

INSERT INTO `adsmart_business_product` (`id`, `category_id`, `product_category_name`, `product_name`, `image_name`, `company_name`, `company_id`, `active`, `description`, `price`, `quantity`) VALUES
(12, 1, 'Food Menu', 'English Lunch menu template size 15cm x 30xm', 'AdSmart_business_product793.PNG', 'GoodCompany', 10, 'Yes', 'English Lunch menu template size 15cm x 30xm (per 50) \r\n\r\n', 100, 100),
(13, 1, 'Food Menu', 'Breakfast Menu template size 20cm x 30xm \r\n\r\n', 'AdSmart_business_product241.PNG', 'GoodCompany', 10, 'Yes', 'Breakfast Menu template size 20cm x 30xm (per 50) ', 200, 100),
(17, 1, 'Food Menu', 'Print Material test ', 'AdSmart_business_product364.PNG', 'abccompany', 7, 'Yes', 'Food Menu', 100, 100),
(18, 1, 'Food Menu', 'Test1', 'AdSmart_business_product733.JPG', 'GoodCompany', 10, 'Yes', 'test1234', 200, 100),
(19, 1, 'Food Menu', 'Print Menu -20cm *15cm ', 'AdSmart_business_product908.png', 'adscompany', 50, 'Yes', 'Print Menu -20cm *15cm ', 10, 100),
(20, 1, 'Food Menu', 'Food Menu 20*30 cm', 'AdSmart_business_product681.PNG', 'dcompany', 51, 'Yes', 'Food Menu 20*30 cm', 50, 500),
(21, 1, 'Food Menu', 'Food Menu 20*30 cm', 'AdSmart_business_product699.PNG', 'mango', 52, 'Yes', 'Food Menu 20*30 cm', 30, 500);

-- --------------------------------------------------------

--
-- 資料表結構 `adsmart_category`
--

CREATE TABLE `adsmart_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `advertisement_type` longtext NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adsmart_category`
--

INSERT INTO `adsmart_category` (`id`, `category_name`, `display_name`, `description`, `image_name`, `advertisement_type`, `active`) VALUES
(3, 'print_ads', 'Print Advertisement', 'Advertisements in newspapers, magazines, brochures, flyers, and other printed materials.', 'AdSmart_Category_200.png', 'traditional', 'Yes'),
(4, 'outdoor_ads', 'Outdoor Advertisement', 'Billboards, posters, banners, and signage displayed in public spaces and along roadsides.', 'AdSmart_Category_202.JPG', 'traditional', 'Yes'),
(5, 'broadcast_ads', 'Broadcast Advertisement', 'Television and radio commercials that are aired on broadcast media.', 'AdSmart_Category_14.JPG', 'traditional', 'Yes'),
(7, 'telemarketing_ads', 'Telemarketing Advertisement', 'Advertising and promotional messages delivered through phone calls.', 'AdSmart_Category_188.JPG', 'traditional', 'Yes'),
(9, 'events_ads', 'Events Advertisement', 'Brand promotion through sponsoring events, such as sports events, concerts, and conferences.', 'AdSmart_Category_713.JPG', 'traditional', 'Yes'),
(10, 'placement_ads', 'Placement Advertisement', 'Integrating products or brands into movies, TV shows, or other media content.', 'AdSmart_Category_929.JPG', 'traditional', 'Yes'),
(11, 'display_ads', 'Display Advertisement', 'Visual advertisements displayed on websites, typically in the form of banners, images, or interactive media.', 'AdSmart_Category_218.JPG', 'digital', 'Yes'),
(12, 'search_ads', 'Search Advertisement', 'Pay-per-click ads displayed on search engine results pages, such as Google Ads or Bing Ads.', 'AdSmart_Category_708.JPG', 'digital', 'Yes'),
(13, 'social_ads', 'Social Advertisement', 'Advertisements displayed on social media platforms like Facebook, Instagram, Twitter, and LinkedIn.', 'AdSmart_Category_308.JPG', 'digital', 'Yes'),
(14, 'video_ads', 'Video Advertisement', 'Advertisements shown before, during, or after online videos on platforms like YouTube or streaming services.', 'AdSmart_Category_8.JPG', 'digital', 'Yes'),
(15, 'native_ads', 'Native Advertisement', 'Ads that blend into the format and design of the website or app on which they are displayed, providing a seamless user experience.', 'AdSmart_Category_25.JPG', 'digital', 'Yes'),
(16, 'influencer_ads', 'Influencer Advertisement', 'Collaborating with social media influencers to promote products or services to their followers.', 'AdSmart_Category_524.JPG', 'digital', 'Yes');

-- --------------------------------------------------------

--
-- 資料表結構 `adsmart_customer`
--

CREATE TABLE `adsmart_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL DEFAULT 'user-3.png',
  `password_confirm` varchar(255) NOT NULL,
  `print_ads` tinyint(1) NOT NULL,
  `broadcast_ads` tinyint(1) NOT NULL,
  `outdoor_ads` tinyint(1) NOT NULL,
  `telemarketing_ads` tinyint(1) NOT NULL,
  `events_ads` tinyint(1) NOT NULL,
  `placement_ads` tinyint(1) NOT NULL,
  `display_ads` tinyint(1) NOT NULL,
  `search_ads` tinyint(1) NOT NULL,
  `social_ads` tinyint(1) NOT NULL,
  `video_ads` tinyint(1) NOT NULL,
  `native_ads` tinyint(1) NOT NULL,
  `influencer_ads` tinyint(1) NOT NULL,
  `print_material` tinyint(1) NOT NULL,
  `poster` tinyint(1) NOT NULL,
  `sticker` tinyint(1) NOT NULL,
  `clothes_product` tinyint(1) NOT NULL,
  `tnc` tinyint(1) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_country` varchar(255) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `work_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `adsmart_customer`
--

INSERT INTO `adsmart_customer` (`id`, `user_id`, `first_name`, `last_name`, `password`, `contact_number`, `country`, `email`, `image_name`, `password_confirm`, `print_ads`, `broadcast_ads`, `outdoor_ads`, `telemarketing_ads`, `events_ads`, `placement_ads`, `display_ads`, `search_ads`, `social_ads`, `video_ads`, `native_ads`, `influencer_ads`, `print_material`, `poster`, `sticker`, `clothes_product`, `tnc`, `company_name`, `company_country`, `department_name`, `staff_number`, `title`, `work_number`) VALUES
(27, 'alexlam', 'Alex', 'Lam', '827ccb0eea8a706c4c34a16891f84e7b', '66726031', 'China', 'lammanchio@gmail.com', 'AdSmart_Customer_64.png', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 'CompanyName', 'Macao', 'SA', '157777', 'Senior manager', '12345678'),
(39, 'pizza', 'NA', 'NA', '81dc9bdb52d04dc20036dbd8313ed055', '67686960', 'Andorra', 'test@gmail.com', 'AdSmart_Customer_827.PNG', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '123company', 'Macao', 'IT', '157777', 'Manager', '123456789'),
(60, 'alexlam123456', 'Lam', 'Man', '81dc9bdb52d04dc20036dbd8313ed055', '888888888', 'MAC', 'test123@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'test', 'CHN', 'IT', '157777', 'SA', '888888888'),
(61, 'aaaalexlam123456', 'aaalex', 'aalam', '81dc9bdb52d04dc20036dbd8313ed055', '2788888888', 'China', 'asdlammanchio@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(62, 'Macao123', 'ABC', 'CDF', '827ccb0eea8a706c4c34a16891f84e7b', '853123456789', 'China', 'adsmartinfo025@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Macaoabccompany', 'CHN', 'IT', '123456', 'SA', '8531234654897'),
(63, 'abcrestaurant', 'restaurant', 'owner', '81dc9bdb52d04dc20036dbd8313ed055', '853123456789', 'Macao', 'restaurant@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'abcrestaurant', 'MAC', 'F&B', 'F&B1234', 'CEO', '853888'),
(64, 'adsmart', 'alex', 'lam', '81dc9bdb52d04dc20036dbd8313ed055', '85388888888', 'China', 'lammanchio1@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(65, 'bcrestaurant', 'bcrestaurant', 'bcrestaurant', '81dc9bdb52d04dc20036dbd8313ed055', '85328555666', 'Macao', 'bcrestaurant@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(66, 'alexlam12312312', 'alex123', 'lam12312', '81dc9bdb52d04dc20036dbd8313ed055', '188888888', 'China', 'lammanchio2131231@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(67, 'alexlam123123', 'test123', 'asd', '81dc9bdb52d04dc20036dbd8313ed055', '0123456', 'Aruba', 'test213@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(68, 'alexlam0506', 'alex0506', 'lam0506', '81dc9bdb52d04dc20036dbd8313ed055', '85388888888', 'China', 'lammanchio0506@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(69, 'alexlam0507', 'alex0507', 'lam', '81dc9bdb52d04dc20036dbd8313ed055', '68388888888', 'China', 'lammanchio0507@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, '', '', '', '', '', ''),
(70, 'alexlam114', 'alex', 'lam', '81dc9bdb52d04dc20036dbd8313ed055', '85388888888', 'China', 'lammanchio123@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 'ABCCOMPANY', 'China', 'Digitial marketing', '156666', 'Manager', '123456'),
(71, 'alexlam621', 'ALEX', 'lAM', '81dc9bdb52d04dc20036dbd8313ed055', '85366726031', 'Macao', 'ALEXlam999@gmail.com', 'user-3.png', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 'test123', 'CHN', 'IT', '555555', 'Test ', '86123456789'),
(72, 'asd213', 'alex', 'lam', '1211a8bcfa00e82d5a76422207825678', '6588888888', 'Macao', 'tes1234t@gmail.com', 'user-3.png', '1211a8bcfa00e82d5a76422207825678', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', ''),
(73, 'alexlam2134', 'jklasjd', 'lam', '81dc9bdb52d04dc20036dbd8313ed055', '85388888888', 'China', 'tes1234123t@gmail.com', 'user-3.png', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `business_bank_info`
--

CREATE TABLE `business_bank_info` (
  `id` int(10) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_id` int(10) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `credit_account` int(10) NOT NULL,
  `counterparty` varchar(255) NOT NULL,
  `credit_currency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `business_bank_info`
--

INSERT INTO `business_bank_info` (`id`, `business_name`, `business_id`, `bank_name`, `credit_account`, `counterparty`, `credit_currency`) VALUES
(1, 'abccompany', 7, 'BOC', 123456789, 'abccompany Ltd.', 'HK');

-- --------------------------------------------------------

--
-- 資料表結構 `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `description`, `image_name`, `country`) VALUES
(2, 'test company', 'China entertainment company. The company produces comedic videos in Chinese that can be between a few seconds to a few minutes. It has a dozen performing artists under management.', 'AdSmart_Company_177.JPG', 'China'),
(3, 'B Company', 'ZAG are recognized for asking the right questions to unearth exactly where brands need to be. By starting with strategy, zag makes sure every campaign, social post, and line of copy is crafted with an aligned purpose, eye-catching design, and powerful cre', 'AdSmart_Company_177.JPG', 'Macao'),
(4, 'Abc company', 'CREATIVE is an experienced team of Overachievers, Creative Geniuses & Dog Lovers. They are also very effective BRAND STORYTELLERS!', 'AdSmart_Company_993.JPG', 'US'),
(5, 'GoodCompany', 'Hong Kong Advertisement Comapny that it can provide full-service advertisement service. (Sucn ac Hong Kong Bus Advertisement service)', 'AdSmart_Company_353.JPG', 'Hong Kong'),
(6, 'GoodCompany', 'Hong Kong Advertisement Comapny that it can provide full-service advertisement service. (Sucn ac Hong Kong Bus Advertisement service)', 'AdSmart_Company_693.JPG', 'Hong Kong');

-- --------------------------------------------------------

--
-- 資料表結構 `country`
--

CREATE TABLE `country` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `country`
--

INSERT INTO `country` (`countrycode`, `countryname`, `code`) VALUES
('ABW', 'Aruba', 'AW'),
('AFG', 'Afghanistan', 'AF'),
('AGO', 'Angola', 'AO'),
('AIA', 'Anguilla', 'AI'),
('ALA', 'Åland', 'AX'),
('ALB', 'Albania', 'AL'),
('AND', 'Andorra', 'AD'),
('ARE', 'United Arab Emirates', 'AE'),
('ARG', 'Argentina', 'AR'),
('ARM', 'Armenia', 'AM'),
('ASM', 'American Samoa', 'AS'),
('ATA', 'Antarctica', 'AQ'),
('ATF', 'French Southern Territories', 'TF'),
('ATG', 'Antigua and Barbuda', 'AG'),
('AUS', 'Australia', 'AU'),
('AUT', 'Austria', 'AT'),
('AZE', 'Azerbaijan', 'AZ'),
('BDI', 'Burundi', 'BI'),
('BEL', 'Belgium', 'BE'),
('BEN', 'Benin', 'BJ'),
('BES', 'Bonaire', 'BQ'),
('BFA', 'Burkina Faso', 'BF'),
('BGD', 'Bangladesh', 'BD'),
('BGR', 'Bulgaria', 'BG'),
('BHR', 'Bahrain', 'BH'),
('BHS', 'Bahamas', 'BS'),
('BIH', 'Bosnia and Herzegovina', 'BA'),
('BLM', 'Saint Barthélemy', 'BL'),
('BLR', 'Belarus', 'BY'),
('BLZ', 'Belize', 'BZ'),
('BMU', 'Bermuda', 'BM'),
('BOL', 'Bolivia', 'BO'),
('BRA', 'Brazil', 'BR'),
('BRB', 'Barbados', 'BB'),
('BRN', 'Brunei', 'BN'),
('BTN', 'Bhutan', 'BT'),
('BVT', 'Bouvet Island', 'BV'),
('BWA', 'Botswana', 'BW'),
('CAF', 'Central African Republic', 'CF'),
('CAN', 'Canada', 'CA'),
('CCK', 'Cocos [Keeling] Islands', 'CC'),
('CHE', 'Switzerland', 'CH'),
('CHL', 'Chile', 'CL'),
('CHN', 'China', 'CN'),
('CIV', 'Ivory Coast', 'CI'),
('CMR', 'Cameroon', 'CM'),
('COD', 'Democratic Republic of the Congo', 'CD'),
('COG', 'Republic of the Congo', 'CG'),
('COK', 'Cook Islands', 'CK'),
('COL', 'Colombia', 'CO'),
('COM', 'Comoros', 'KM'),
('CPV', 'Cape Verde', 'CV'),
('CRI', 'Costa Rica', 'CR'),
('CUB', 'Cuba', 'CU'),
('CUW', 'Curacao', 'CW'),
('CXR', 'Christmas Island', 'CX'),
('CYM', 'Cayman Islands', 'KY'),
('CYP', 'Cyprus', 'CY'),
('CZE', 'Czech Republic', 'CZ'),
('DEU', 'Germany', 'DE'),
('DJI', 'Djibouti', 'DJ'),
('DMA', 'Dominica', 'DM'),
('DNK', 'Denmark', 'DK'),
('DOM', 'Dominican Republic', 'DO'),
('DZA', 'Algeria', 'DZ'),
('ECU', 'Ecuador', 'EC'),
('EGY', 'Egypt', 'EG'),
('ERI', 'Eritrea', 'ER'),
('ESH', 'Western Sahara', 'EH'),
('ESP', 'Spain', 'ES'),
('EST', 'Estonia', 'EE'),
('ETH', 'Ethiopia', 'ET'),
('FIN', 'Finland', 'FI'),
('FJI', 'Fiji', 'FJ'),
('FLK', 'Falkland Islands', 'FK'),
('FRA', 'France', 'FR'),
('FRO', 'Faroe Islands', 'FO'),
('FSM', 'Micronesia', 'FM'),
('GAB', 'Gabon', 'GA'),
('GBR', 'United Kingdom', 'GB'),
('GEO', 'Georgia', 'GE'),
('GGY', 'Guernsey', 'GG'),
('GHA', 'Ghana', 'GH'),
('GIB', 'Gibraltar', 'GI'),
('GIN', 'Guinea', 'GN'),
('GLP', 'Guadeloupe', 'GP'),
('GMB', 'Gambia', 'GM'),
('GNB', 'Guinea-Bissau', 'GW'),
('GNQ', 'Equatorial Guinea', 'GQ'),
('GRC', 'Greece', 'GR'),
('GRD', 'Grenada', 'GD'),
('GRL', 'Greenland', 'GL'),
('GTM', 'Guatemala', 'GT'),
('GUF', 'French Guiana', 'GF'),
('GUM', 'Guam', 'GU'),
('GUY', 'Guyana', 'GY'),
('HKG', 'Hong Kong', 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'HM'),
('HND', 'Honduras', 'HN'),
('HRV', 'Croatia', 'HR'),
('HTI', 'Haiti', 'HT'),
('HUN', 'Hungary', 'HU'),
('IDN', 'Indonesia', 'ID'),
('IMN', 'Isle of Man', 'IM'),
('IND', 'India', 'IN'),
('IOT', 'British Indian Ocean Territory', 'IO'),
('IRL', 'Ireland', 'IE'),
('IRN', 'Iran', 'IR'),
('IRQ', 'Iraq', 'IQ'),
('ISL', 'Iceland', 'IS'),
('ISR', 'Israel', 'IL'),
('ITA', 'Italy', 'IT'),
('JAM', 'Jamaica', 'JM'),
('JEY', 'Jersey', 'JE'),
('JOR', 'Jordan', 'JO'),
('JPN', 'Japan', 'JP'),
('KAZ', 'Kazakhstan', 'KZ'),
('KEN', 'Kenya', 'KE'),
('KGZ', 'Kyrgyzstan', 'KG'),
('KHM', 'Cambodia', 'KH'),
('KIR', 'Kiribati', 'KI'),
('KNA', 'Saint Kitts and Nevis', 'KN'),
('KOR', 'South Korea', 'KR'),
('KWT', 'Kuwait', 'KW'),
('LAO', 'Laos', 'LA'),
('LBN', 'Lebanon', 'LB'),
('LBR', 'Liberia', 'LR'),
('LBY', 'Libya', 'LY'),
('LCA', 'Saint Lucia', 'LC'),
('LIE', 'Liechtenstein', 'LI'),
('LKA', 'Sri Lanka', 'LK'),
('LSO', 'Lesotho', 'LS'),
('LTU', 'Lithuania', 'LT'),
('LUX', 'Luxembourg', 'LU'),
('LVA', 'Latvia', 'LV'),
('MAC', 'Macao', 'MO'),
('MAF', 'Saint Martin', 'MF'),
('MAR', 'Morocco', 'MA'),
('MCO', 'Monaco', 'MC'),
('MDA', 'Moldova', 'MD'),
('MDG', 'Madagascar', 'MG'),
('MDV', 'Maldives', 'MV'),
('MEX', 'Mexico', 'MX'),
('MHL', 'Marshall Islands', 'MH'),
('MKD', 'Macedonia', 'MK'),
('MLI', 'Mali', 'ML'),
('MLT', 'Malta', 'MT'),
('MMR', 'Myanmar [Burma]', 'MM'),
('MNE', 'Montenegro', 'ME'),
('MNG', 'Mongolia', 'MN'),
('MNP', 'Northern Mariana Islands', 'MP'),
('MOZ', 'Mozambique', 'MZ'),
('MRT', 'Mauritania', 'MR'),
('MSR', 'Montserrat', 'MS'),
('MTQ', 'Martinique', 'MQ'),
('MUS', 'Mauritius', 'MU'),
('MWI', 'Malawi', 'MW'),
('MYS', 'Malaysia', 'MY'),
('MYT', 'Mayotte', 'YT'),
('NAM', 'Namibia', 'NA'),
('NCL', 'New Caledonia', 'NC'),
('NER', 'Niger', 'NE'),
('NFK', 'Norfolk Island', 'NF'),
('NGA', 'Nigeria', 'NG'),
('NIC', 'Nicaragua', 'NI'),
('NIU', 'Niue', 'NU'),
('NLD', 'Netherlands', 'NL'),
('NOR', 'Norway', 'NO'),
('NPL', 'Nepal', 'NP'),
('NRU', 'Nauru', 'NR'),
('NZL', 'New Zealand', 'NZ'),
('OMN', 'Oman', 'OM'),
('PAK', 'Pakistan', 'PK'),
('PAN', 'Panama', 'PA'),
('PCN', 'Pitcairn Islands', 'PN'),
('PER', 'Peru', 'PE'),
('PHL', 'Philippines', 'PH'),
('PLW', 'Palau', 'PW'),
('PNG', 'Papua New Guinea', 'PG'),
('POL', 'Poland', 'PL'),
('PRI', 'Puerto Rico', 'PR'),
('PRK', 'North Korea', 'KP'),
('PRT', 'Portugal', 'PT'),
('PRY', 'Paraguay', 'PY'),
('PSE', 'Palestine', 'PS'),
('PYF', 'French Polynesia', 'PF'),
('QAT', 'Qatar', 'QA'),
('REU', 'Réunion', 'RE'),
('ROU', 'Romania', 'RO'),
('RUS', 'Russia', 'RU'),
('RWA', 'Rwanda', 'RW'),
('SAU', 'Saudi Arabia', 'SA'),
('SDN', 'Sudan', 'SD'),
('SEN', 'Senegal', 'SN'),
('SGP', 'Singapore', 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS'),
('SHN', 'Saint Helena', 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'SJ'),
('SLB', 'Solomon Islands', 'SB'),
('SLE', 'Sierra Leone', 'SL'),
('SLV', 'El Salvador', 'SV'),
('SMR', 'San Marino', 'SM'),
('SOM', 'Somalia', 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'PM'),
('SRB', 'Serbia', 'RS'),
('SSD', 'South Sudan', 'SS'),
('STP', 'São Tomé and Príncipe', 'ST'),
('SUR', 'Suriname', 'SR'),
('SVK', 'Slovakia', 'SK'),
('SVN', 'Slovenia', 'SI'),
('SWE', 'Sweden', 'SE'),
('SWZ', 'Swaziland', 'SZ'),
('SXM', 'Sint Maarten', 'SX'),
('SYC', 'Seychelles', 'SC'),
('SYR', 'Syria', 'SY'),
('TCA', 'Turks and Caicos Islands', 'TC'),
('TCD', 'Chad', 'TD'),
('TGO', 'Togo', 'TG'),
('THA', 'Thailand', 'TH'),
('TJK', 'Tajikistan', 'TJ'),
('TKL', 'Tokelau', 'TK'),
('TKM', 'Turkmenistan', 'TM'),
('TLS', 'East Timor', 'TL'),
('TON', 'Tonga', 'TO'),
('TTO', 'Trinidad and Tobago', 'TT'),
('TUN', 'Tunisia', 'TN'),
('TUR', 'Turkey', 'TR'),
('TUV', 'Tuvalu', 'TV'),
('TWN', 'Taiwan', 'TW'),
('TZA', 'Tanzania', 'TZ'),
('UGA', 'Uganda', 'UG'),
('UKR', 'Ukraine', 'UA'),
('UMI', 'U.S. Minor Outlying Islands', 'UM'),
('URY', 'Uruguay', 'UY'),
('USA', 'United States', 'US'),
('UZB', 'Uzbekistan', 'UZ'),
('VAT', 'Vatican City', 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'VC'),
('VEN', 'Venezuela', 'VE'),
('VGB', 'British Virgin Islands', 'VG'),
('VIR', 'U.S. Virgin Islands', 'VI'),
('VNM', 'Vietnam', 'VN'),
('VUT', 'Vanuatu', 'VU'),
('WLF', 'Wallis and Futuna', 'WF'),
('WSM', 'Samoa', 'WS'),
('XKX', 'Kosovo', 'XK'),
('YEM', 'Yemen', 'YE'),
('ZAF', 'South Africa', 'ZA'),
('ZMB', 'Zambia', 'ZM'),
('ZWE', 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- 資料表結構 `country_numcode`
--

CREATE TABLE `country_numcode` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `country_numcode`
--

INSERT INTO `country_numcode` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- 資料表結構 `customer_credit_card`
--

CREATE TABLE `customer_credit_card` (
  `id` int(10) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `expiration_date` varchar(7) NOT NULL,
  `cvv` int(3) NOT NULL,
  `card_type` varchar(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `customer_credit_card`
--

INSERT INTO `customer_credit_card` (`id`, `card_number`, `expiration_date`, `cvv`, `card_type`, `customer_name`, `customer_id`) VALUES
(1, '111122223333444', '', 325, 'visa', 'alexlam', 27);

-- --------------------------------------------------------

--
-- 資料表結構 `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `cus_user_id` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_day` timestamp NOT NULL DEFAULT current_timestamp(),
  `company_user_id` varchar(255) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `bp_update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cs_update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_id` varchar(255) NOT NULL,
  `req_number` varchar(255) NOT NULL,
  `cus_contact` varchar(100) NOT NULL,
  `cus_card_name` varchar(255) NOT NULL,
  `card_number` bigint(100) NOT NULL,
  `cvv` int(3) NOT NULL,
  `card_expiry_date` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `payment`
--

INSERT INTO `payment` (`id`, `cus_user_id`, `cus_email`, `cus_address`, `item_name`, `quantity`, `price`, `total`, `created_day`, `company_user_id`, `order_status`, `bp_update_time`, `cs_update_time`, `transaction_id`, `req_number`, `cus_contact`, `cus_card_name`, `card_number`, `cvv`, `card_expiry_date`) VALUES
(21, 'alexlam', 'lammanchio@gmail.com', 'Macao', 'English Lunch menu template size 15cm x 30xm', 1, 100, '333.00', '2024-05-18 03:56:17', 'GoodCompany', '', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000001', '', '66726031', 'alexlam', 2147483647, 325, '2024-12'),
(22, 'alexlam', 'lammanchio@gmail.com', 'Macao', 'Test1', 1, 200, '333.00', '2024-05-18 03:56:17', 'GoodCompany', '', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000001', '', '66726031', 'alexlam', 2147483647, 325, '2024-12'),
(23, 'alexlam', 'lammanchio@gmail.com', 'Hong Kong', 'Print Material test ', 1, 100, '33333.00', '2024-05-18 04:04:01', 'abccompany', '', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000002', '', '66726031', 'alexlam', 2147483647, 325, '2024-12'),
(24, 'alexlam', 'lammanchio@gmail.com', 'Macao', 'Test1', 1, 200, '333.00', '2024-05-18 04:04:01', 'GoodCompany', 'prepare', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000002', '', '66726031', 'alexlam', 2147483647, 325, '2024-12'),
(26, 'pizza', 'test@gmail.com', 'Macao', 'cus_req0032', 0, 42424, '42424.00', '2024-06-02 11:30:04', 'abccompany', 'completed', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000003', 'cus_req0032', '67686960', 'Pizasdjkl', 89798798, 123, '2024-12'),
(29, 'pizza', 'test@gmail.com', 'Macao', 'CUS_REQ0033 w3124', 0, 2342, '2342.00', '2024-06-02 13:16:56', 'abccompany', 'completed', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000005', 'cus_req0033', '67686960', 'tet123', 1234124, 124, '2024-12'),
(31, 'pizza', 'test@gmail.com', 'Hong Kong', 'Print Material test ', 1, 100, '111.00', '2024-06-02 13:26:16', 'abccompany', 'completed', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000006', '', '67686960', 'PRINT MATERIAL TEST', 976546132, 123, '2024-12'),
(32, 'pizza', 'test@gmail.com', 'Macao', 'Print Material test ', 1, 100, '111.00', '2024-06-02 13:37:45', 'abccompany', 'completed', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000007', '', '67686960', 'test564', 12379465, 123, '2024-08'),
(33, 'alexlam621', 'ALEXlam999@gmail.com', 'Macao', 'Food 1234', 0, 54000, '54000.00', '2024-06-07 08:26:48', 'GoodCompany', '', '2024-06-12 17:28:22', '2024-06-12 17:28:22', 'Tran_id_000000000008', 'cus_req0040', '85366726031', 'alexlam', 1234567891234, 325, '2024-12'),
(36, 'pizza', 'test@gmail.com', 'Macao', 'cus_req0027', 0, 4567, '4567.00', '2024-06-12 11:19:40', 'abccompany', 'completed', '2024-06-12 17:59:09', '2024-06-12 17:59:14', 'Tran_id_000000000009', 'cus_req0027', '67686960', 'alexlam', 123412341341234, 123, '2024-12'),
(37, 'alexlam', 'lammanchio@gmail.com', 'Macao124', 'CUS_REQ0023', 0, 15000, '15000.00', '2024-06-18 11:53:58', 'GoodCompany', '', '2024-06-18 17:53:58', '2024-06-18 17:53:58', 'Tran_id_000000000010', 'cus_req0023', '66726031', 'alexlam', 111122223333444, 325, '2025-01'),
(38, 'pizza', 'test@gmail.com', 'Macao', 'cus_req0029', 0, 1234, '1234.00', '2024-06-18 12:58:37', 'abccompany', 'completed', '2024-06-18 19:12:38', '2024-06-18 19:15:54', 'Tran_id_000000000011', 'cus_req0029', '67686960', 'alexlam', 123456789132, 123, '2099-12'),
(39, 'pizza', 'test@gmail.com', 'Macao3123', 'CUS_REQ0031', 0, 1234, '1234.00', '2024-06-18 13:23:12', 'abccompany', 'prepare', '2024-06-19 17:17:45', '2024-06-18 19:23:12', 'Tran_id_000000000012', 'cus_req0031', '67686960', 'alexlam', 12345678913213, 212, '2024-12'),
(40, 'pizza', 'test@gmail.com', 'Macao3123', 'English Lunch menu template size 15cm x 30xm', 1, 100, '222.00', '2024-06-19 12:41:18', 'GoodCompany', '', '2024-06-19 18:41:18', '2024-06-19 18:41:18', 'Tran_id_000000000013', '', '67686960', 'alexlam', 123456132465, 123, '2024-12'),
(41, 'pizza', 'test@gmail.com', 'Macao3123', 'Print Material test ', 1, 100, '222.00', '2024-06-19 12:41:18', 'abccompany', '', '2024-06-19 18:41:18', '2024-06-19 18:41:18', 'Tran_id_000000000013', '', '67686960', 'alexlam', 123456132465, 123, '2024-12');

-- --------------------------------------------------------

--
-- 資料表結構 `product_category`
--

CREATE TABLE `product_category` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `product_name`, `category_name`, `image_name`, `active`) VALUES
(1, 1, 'print_material', 'Food Menu', 'breakfast_menu.PNG', 'Yes'),
(2, 1, 'print_material', 'Beverage Menu', 'beverage_menu.PNG', 'Yes');

-- --------------------------------------------------------

--
-- 資料表結構 `product_type`
--

CREATE TABLE `product_type` (
  `id` int(12) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_type`
--

INSERT INTO `product_type` (`id`, `product_name`, `display_name`, `description`, `product_image`, `active`) VALUES
(1, 'print_material', 'Print Material', 'Advertisements in newspapers, magazines, brochures, flyers, and other printed materials.', '', 'Yes'),
(2, 'poster', 'Poster', 'A poster is a large sheet that is placed either on a public space to promote something or on a wall as decoration.', '', 'Yes'),
(3, 'sticker', ' Sticker', 'A sticker is a type of label: a piece of printed paper, plastic, vinyl, or other material with temporary or permanent pressure sensitive adhesive on one side.', '', 'Yes'),
(4, 'clothes_product', 'Clothes Product', 'Can print advertisement on the clothes accordance to what kind of is your clothes marterial', '', 'Yes');

-- --------------------------------------------------------

--
-- 資料表結構 `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(25, 'restaurant12321@gmail.com', 'a850bc3a73016013', '$2y$10$mFe5/1vf3HAnPaZM2O0yAek37iBy5D6U3n4P38sTHi59vHWyKfaeS', '1702732621'),
(26, 'adsmartinfo025@gmail.com', 'd3156494b5f06df1', '$2y$10$8hhb/G8jCKtX7MoTfffhy.vsXJJr7b4GxcxhYHkJjblVuWNckmtMq', '1702732979'),
(29, 'abc@gmail.com', '672ae9b27cb425e7', '$2y$10$Da3nNYAFDEKOAmsciioHj.4pIwGHTiAETgU67b8pKwcu54HX2TioG', '1707731069'),
(30, 'test@gmail.com', 'd8bcfbe1c4e94389', '$2y$10$7Jm04BtIvXK9JXhqr5S0r.1Fnj4BdxnT./jIT.ahNGfH5YWkvpbCS', '1707731083');

-- --------------------------------------------------------

--
-- 資料表結構 `qoutation`
--

CREATE TABLE `qoutation` (
  `id` int(100) NOT NULL,
  `req_number` varchar(255) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category_id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `requirement` longtext NOT NULL,
  `budget` int(10) NOT NULL,
  `deadline_date` date NOT NULL,
  `company_id` int(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_reject_msg` longtext NOT NULL,
  `company_reject_time` datetime DEFAULT NULL,
  `implementation_plan` longtext NOT NULL,
  `company_price` varchar(255) NOT NULL,
  `target_date` date DEFAULT NULL,
  `create_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `company_bid_time` datetime DEFAULT NULL,
  `customer_reply` varchar(10) NOT NULL,
  `reply_date` datetime DEFAULT NULL,
  `customer_comment` longtext NOT NULL,
  `customer_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `qoutation`
--

INSERT INTO `qoutation` (`id`, `req_number`, `customer_id`, `customer_name`, `subject`, `contact_number`, `email`, `category_id`, `product_name`, `requirement`, `budget`, `deadline_date`, `company_id`, `company_name`, `company_reject_msg`, `company_reject_time`, `implementation_plan`, `company_price`, `target_date`, `create_datetime`, `company_bid_time`, `customer_reply`, `reply_date`, `customer_comment`, `customer_action`) VALUES
(39, 'cus_req0017', 27, 'alexlam', 'accept', '66726031', 'lammanchio@gmail.com', 4, '', 'accept', 2, '2024-04-30', 7, 'abccompany', '', NULL, '<p>accept 123</p>', '123', '2024-06-01', '2024-04-28 20:03:38', '2024-04-28 20:05:40', '', '2024-04-28 20:05:51', '													    	\r\nOKOKOK													    	', 'accept'),
(40, 'cus_req0018', 27, 'alexlam', 'I want to purchase one month outdoor advertisement', '66726031', 'lammanchio@gmail.com', 4, '', 'Size: 10M * 5M\r\n', 3, '2024-05-11', 7, 'ABC Company LTD', '', NULL, '<table style=\"border-collapse: collapse; width: 100.034%; height: 44.7656px;\" border=\"1\"><colgroup><col style=\"width: 49.9485%;\"><col style=\"width: 24.9743%;\"><col style=\"width: 24.9743%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3828px;\">\r\n<td style=\"height: 22.3828px;\">Product Name</td>\r\n<td>Price</td>\r\n<td style=\"height: 22.3828px;\">Remark</td>\r\n</tr>\r\n<tr style=\"height: 22.3828px;\">\r\n<td style=\"height: 22.3828px;\">Outdoor advertisement service (10M*5M)</td>\r\n<td>45000</td>\r\n<td style=\"height: 22.3828px;\">30 Days</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>This service can start on May 01 2024</p>', '45000', '2024-05-01', '2024-04-28 23:30:38', '2024-04-29 00:24:30', '', '2024-04-29 00:51:20', '<p>OK. I accept this offer</p>', 'accept'),
(42, 'cus_req0020', 27, 'alexlam', 'test123', '66726031', 'lammanchio@gmail.com', 5, '', 'test1234', 1, '2024-05-31', 0, '', '', NULL, '', '', NULL, '2024-05-10 20:11:34', NULL, '', NULL, '', ''),
(44, 'cus_req0022', 27, 'alexlam', '', '66726031', 'lammanchio@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>SIZE 20 CM * 15 CM NEED 100 PC</p>', 1, '2024-05-31', 10, 'GoodCompany', '', NULL, '<p>OPTION 1 NO COLOR 100 PC $3000</p>\r\n<p>OPTION 2 COLOR PAPER 100 PC $5000</p>', '5000', '2024-05-31', '2024-05-10 21:54:27', '2024-05-10 21:56:49', '', '2024-05-10 21:58:07', '<p>OPTION IS SO EXPENSIVE, COULD WE HAVE A DISCOUNT</p>', 'discuss'),
(45, 'cus_req0023', 27, 'alexlam', 'test 1234', '66726031', 'lammanchio@gmail.com', 4, '', 'test1234', 1, '2024-05-31', 10, 'GoodCompany123', '', NULL, '<p>test1234</p>', '1234', '2024-05-31', '2024-05-13 00:37:14', '2024-05-13 00:37:47', '', '2024-05-13 00:38:15', '<p>discuss</p>', 'discuss'),
(46, 'cus_req0024', 27, 'alexlam', '', '66726031', 'lammanchio@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>test123</p>', 1, '2024-05-25', 10, 'GoodCompany123', '', NULL, '<p>test1234</p>', '1234', '2024-05-31', '2024-05-13 00:42:14', '2024-05-13 00:42:32', '', '2024-05-13 00:42:43', '<p>test</p>', 'discuss'),
(47, 'cus_req0025', 39, 'pizza', 'TestTEST', 'HIHI', 'test@gmail.com', 4, '', 'TESTEST', 1, '2024-08-31', 0, '', '', NULL, '', '', NULL, '2024-05-26 00:23:40', NULL, '', '2024-05-26 18:21:15', '<p>discuss with vendor</p>', 'discuss'),
(49, 'cus_req0025', 39, 'pizza', 'TestTEST', 'HIHI', 'test@gmail.com', 4, '', 'TESTEST', 1, '2024-08-31', 10, 'GoodCompany123', '', NULL, '<p>test123insert</p>', '1234', '2024-06-01', '2024-05-26 01:30:50', '2024-05-26 01:30:50', '', '2024-05-26 18:21:15', '<p>accept</p>', 'accept'),
(50, 'cus_req0026', 39, 'pizza', 'test deny', 'HIHI', 'test@gmail.com', 4, '', 'deny', 1, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-05-26 18:10:29', NULL, '', '2024-05-26 18:14:53', '<p>no</p>', 'deny'),
(51, 'cus_req0026', 39, 'pizza', 'test deny', 'HIHI', 'test@gmail.com', 4, '', 'deny', 1, '2024-06-30', 10, 'GoodCompany123', '', NULL, '<p>test</p>', '1234', '2024-06-01', '2024-05-26 18:14:32', '2024-05-26 18:14:32', '', '2024-05-26 18:14:53', '<p>no</p>', 'deny'),
(60, 'cus_req0027', 39, 'pizza', 'test123', 'HIHI', 'test@gmail.com', 4, '', '1234', 1, '2024-06-29', 0, '', '', NULL, '', '', NULL, '2024-05-26 18:48:06', NULL, '', NULL, '', ''),
(61, 'cus_req0027', 39, 'pizza', 'test123', 'HIHI', 'test@gmail.com', 4, '', '1234', 1, '2024-06-29', 7, 'abccompany', '', NULL, '<p>test</p>', '5325', '2024-06-28', '2024-05-26 18:48:22', '2024-05-26 18:48:22', '', '2024-05-26 18:52:42', '<p>tst</p>', 'discuss'),
(62, 'cus_req0028', 39, 'pizza', 'testdiscussreject', 'HIHI', 'test@gmail.com', 4, '', 'testdiscussreject', 1, '2024-06-08', 0, '', '', NULL, '', '', NULL, '2024-05-26 19:16:09', NULL, '', NULL, '', ''),
(63, 'cus_req0028', 39, 'pizza', 'testdiscussreject', 'HIHI', 'test@gmail.com', 4, '', 'testdiscussreject', 1, '2024-06-08', 7, 'ABC Company LTD', '', NULL, '<p>testdiscussreject</p>', '7894', '2024-06-08', '2024-05-26 19:16:24', '2024-05-26 19:16:24', '', '2024-05-26 19:16:56', '<p>testdiscussreject</p>', 'discuss'),
(67, 'cus_req0029', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test</p>', 1, '2024-06-30', 0, 'abccompany', '', NULL, '', '', NULL, '2024-05-26 21:00:00', NULL, '', NULL, '', ''),
(68, 'cus_req0029', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test</p>', 1, '2024-06-30', 7, 'abccompany', '', NULL, '<p>test123</p>', '245', '2024-06-30', '2024-05-26 21:02:15', '2024-05-26 21:02:15', '', '2024-05-26 21:02:35', '<p>test123 accept</p>', 'accept'),
(70, 'cus_req0025', 39, 'pizza', 'TestTEST', 'HIHI', 'test@gmail.com', 4, '', 'TESTEST', 1, '2024-08-31', 7, 'abccompany', '', NULL, '<p>test subject&nbsp;</p>', '1245', '2024-06-30', '2024-05-26 23:11:14', '2024-05-26 23:11:14', '', '2024-05-27 00:12:14', '<p>test123</p>', 'discuss'),
(72, 'cus_req0030', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test1234</p>', 1, '2024-06-26', 0, 'abccompany', '', NULL, '', '', NULL, '2024-05-26 23:15:09', NULL, '', NULL, '', ''),
(73, 'cus_req0030', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test1234</p>', 1, '2024-06-26', 7, 'abccompany', '', NULL, '<p>test</p>', '5422', '2024-06-26', '2024-05-26 23:15:25', '2024-05-26 23:15:25', '', '2024-05-26 23:22:33', '<p>test Deny</p>', 'deny'),
(74, 'cus_req0031', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test accept</p>', 1, '2024-06-08', 0, 'abccompany', '', NULL, '', '', NULL, '2024-05-26 23:23:30', NULL, '', NULL, '', ''),
(75, 'cus_req0031', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test accept</p>', 1, '2024-06-08', 7, 'abccompany', '', NULL, '<p>1234test</p>', '2345', '2024-06-08', '2024-05-26 23:23:51', '2024-05-26 23:23:51', '', '2024-05-26 23:24:02', '<p>OK</p>', 'accept'),
(76, 'cus_req0032', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test deny&nbsp;</p>', 1, '2024-06-08', 0, 'abccompany', '', NULL, '', '', NULL, '2024-05-26 23:43:44', NULL, '', NULL, '', ''),
(77, 'cus_req0032', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test deny </p>', 1, '2024-06-08', 7, 'abccompany', '', NULL, '<p>test discuss</p>', '4241', '2024-05-31', '2024-05-26 23:44:11', '2024-05-26 23:44:11', '', '2024-05-26 23:44:24', '<p>test discuss</p>', 'discuss'),
(78, 'cus_req0033', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test accept</p>', 1, '2024-06-01', 0, 'abccompany', '', NULL, '', '', NULL, '2024-05-27 00:13:37', NULL, '', NULL, '', ''),
(79, 'cus_req0033', 39, 'pizza', '', 'HIHI', 'test@gmail.com', 0, 'Print Material test ', '<p>test accept</p>', 1, '2024-06-01', 7, 'abccompany', '', NULL, '<p>OKOKO</p>', '42424', '2024-06-02', '2024-05-27 00:13:47', '2024-05-27 00:13:47', '', '2024-05-27 00:13:57', '<p>test</p>', 'discuss'),
(80, 'cus_req0034', 39, 'pizza', 'test12345', 'HIHI', 'test@gmail.com', 4, '', '521515', 1, '2024-06-08', 0, '', '', NULL, '', '', NULL, '2024-05-27 01:05:28', NULL, '', NULL, '', ''),
(81, 'cus_req0034', 39, 'pizza', 'test12345', 'HIHI', 'test@gmail.com', 4, '', '521515', 1, '2024-06-08', 7, 'ABC Company LTD', '', NULL, '<p>tset1234</p>', '23451', '2024-06-08', '2024-05-27 01:05:42', '2024-05-27 01:05:42', '', '2024-05-27 01:06:03', '<p>dasda</p>', 'deny'),
(82, 'cus_req0035', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>We want to purchase 1000 pc food Menu and the size 20CM * 25 CM<br>And Could you provide a discount for this?</p>', 3, '2024-06-30', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-05-30 01:37:51', NULL, '', NULL, '', ''),
(83, 'cus_req0036', 70, 'alexlam114', 'Food Menu 25cm * 30CM', '85388888888', 'lammanchio123@gmail.com', 3, '', 'Food Menu requirement: Size 25CM *30CM and material is plastic', 3, '2024-07-01', 0, '', '', NULL, '', '', NULL, '2024-05-30 01:42:58', NULL, '', NULL, '', ''),
(84, 'cus_req0037', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>I want to purhcase 1000 pc food menu and could you provide a discount for this request?</p>', 3, '2024-07-01', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-05-30 01:46:27', NULL, '', NULL, '', ''),
(85, 'cus_req0036', 70, 'alexlam114', 'Food Menu 25cm * 30CM', '85388888888', 'lammanchio123@gmail.com', 3, '', 'Food Menu requirement: Size 25CM *30CM and material is plastic', 3, '2024-07-01', 50, 'adscompany', '', NULL, '<p>Yes We can do this and can provide 10% discount for this&nbsp;</p>', '9000', '2024-07-01', '2024-05-30 02:16:35', '2024-05-30 02:16:35', '', NULL, '', ''),
(86, 'cus_req0036', 70, 'alexlam114', 'Food Menu 25cm * 30CM', '85388888888', 'lammanchio123@gmail.com', 3, '', 'Food Menu requirement: Size 25CM *30CM and material is plastic', 3, '2024-07-01', 7, 'ABC Company LTD', '', NULL, '<p>Yes I can provide 20% discount</p>', '15000', '2024-06-30', '2024-05-30 02:18:10', '2024-05-30 02:18:10', '', NULL, '', ''),
(87, 'cus_req0036', 70, 'alexlam114', 'Food Menu 25cm * 30CM', '85388888888', 'lammanchio123@gmail.com', 3, '', 'Food Menu requirement: Size 25CM *30CM and material is plastic', 3, '2024-07-01', 10, 'GoodCompany123', '', NULL, '<p>OK, give you 15 % discount</p>', '17500', '2024-06-30', '2024-05-30 02:18:56', '2024-05-30 02:18:56', '', NULL, '', ''),
(89, 'cus_req0037', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>I want to purhcase 1000 pc food menu and could you provide a discount for this request?</p>', 3, '2024-07-01', 10, 'GoodCompany', '', NULL, '<p>OK 10% discount</p>', '13000', '2024-06-30', '2024-05-30 02:23:31', '2024-05-30 02:23:31', '', NULL, '', ''),
(90, 'cus_req0035', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>We want to purchase 1000 pc food Menu and the size 20CM * 25 CM<br>And Could you provide a discount for this?</p>', 3, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>OK 20 % discount</p>', '8000', '2024-06-30', '2024-05-30 02:23:51', '2024-05-30 02:23:51', '', '2024-06-10 02:11:14', '', 'accept'),
(91, 'cus_req0038', 71, 'alexlam621', '', '85366726031', 'ALEXlam999@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>I want to purchase 100 pc lunch menu, but the size should be 20 cm * 30cm</p>', 2, '2024-07-01', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-06-07 21:56:25', NULL, '', NULL, '', ''),
(92, 'cus_req0039', 71, 'alexlam621', 'Food menu size 20 cm * 20cm', '85366726031', 'ALEXlam999@gmail.com', 3, '', 'Food menu size 20 cm * 20cm and the material should be plastic and the quantity is 500 pc', 3, '2024-07-01', 0, '', '', NULL, '', '', NULL, '2024-06-07 21:59:15', NULL, '', NULL, '', ''),
(93, 'cus_req0039', 71, 'alexlam621', 'Food menu size 20 cm * 20cm', '85366726031', 'ALEXlam999@gmail.com', 3, '', 'Food menu size 20 cm * 20cm and the material should be plastic and the quantity is 500 pc', 3, '2024-07-01', 7, 'abccompany', '', NULL, '<p>We need to do this request and need two weeks to completed</p>', '25000', '2024-06-30', '2024-06-07 22:03:54', '2024-06-07 22:03:54', '', '2024-06-07 22:05:09', '<p>OK&nbsp;</p>', 'accept'),
(94, 'cus_req0040', 71, 'alexlam621', 'Food Menu 20 cm *20 cm', '85366726031', 'ALEXlam999@gmail.com', 3, '', 'Food Menu 20 cm *20 cm', 3, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-07 22:08:13', NULL, '', NULL, '', ''),
(95, 'cus_req0040', 71, 'alexlam621', 'Food Menu 20 cm *20 cm', '85366726031', 'ALEXlam999@gmail.com', 3, '', 'Food Menu 20 cm *20 cm', 3, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>We can provide the items after 2 week.</p>', '60000', '2024-06-30', '2024-06-07 22:09:14', '2024-06-07 22:09:14', '', '2024-06-07 22:09:55', '<p>The Price is so high, could you provide a discount</p>', 'discuss'),
(96, 'cus_req0041', 70, 'alexlam114', 'test_deny', '85388888888', 'lammanchio123@gmail.com', 3, '', 'deny', 2, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-10 03:00:17', NULL, '', NULL, '', ''),
(97, 'cus_req0041', 70, 'alexlam114', 'test_deny', '85388888888', 'lammanchio123@gmail.com', 3, '', 'deny', 2, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>deny</p>', '50000', '2024-06-30', '2024-06-10 03:00:32', '2024-06-10 03:00:32', '', '2024-06-10 03:00:44', '<p>deny</p>', 'deny'),
(98, 'cus_req0042', 70, 'alexlam114', 'test Accept', '85388888888', 'lammanchio123@gmail.com', 3, '', 'accept', 3, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-10 03:01:20', NULL, '', NULL, '', ''),
(99, 'cus_req0042', 70, 'alexlam114', 'test Accept', '85388888888', 'lammanchio123@gmail.com', 3, '', 'accept', 3, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>accept</p>', '500000', '2024-06-30', '2024-06-10 03:01:31', '2024-06-10 03:01:31', '', '2024-06-10 03:01:43', '<p>accept</p>', 'accept'),
(100, 'cus_req0043', 70, 'alexlam114', 'discuss', '85388888888', 'lammanchio123@gmail.com', 3, '', 'discuss', 2, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-10 03:07:58', NULL, '', NULL, '', ''),
(101, 'cus_req0043', 70, 'alexlam114', 'discuss', '85388888888', 'lammanchio123@gmail.com', 3, '', 'discuss', 2, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>discuss</p>', '123', '2024-06-30', '2024-06-10 03:08:25', '2024-06-10 03:08:25', '', '2024-06-10 03:08:33', '<p>discuus</p>', 'discuss'),
(102, 'cus_req0044', 70, 'alexlam114', 'Test_print', '85388888888', 'lammanchio123@gmail.com', 3, '', 'discuss', 1, '2024-06-23', 0, '', '', NULL, '', '', NULL, '2024-06-10 03:09:53', NULL, '', NULL, '', ''),
(103, 'cus_req0044', 70, 'alexlam114', 'Test_print', '85388888888', 'lammanchio123@gmail.com', 3, '', 'discuss', 1, '2024-06-23', 10, 'GoodCompany', '', NULL, '<p>asd</p>', '979', '2024-06-30', '2024-06-10 03:10:03', '2024-06-10 03:10:03', '', '2024-06-10 03:10:11', '<p>asdad</p>', 'discuss'),
(104, 'cus_req0045', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>123</p>', 1, '2024-06-30', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-06-10 03:12:09', NULL, '', NULL, '', ''),
(105, 'cus_req0045', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>123</p>', 1, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>12321412</p>', '421', '2024-06-30', '2024-06-10 03:12:20', '2024-06-10 03:12:20', '', '2024-06-10 03:12:35', '<p>accept</p>', 'accept'),
(106, 'cus_req0046', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Test1', '<p>test reject</p>', 1, '2024-06-30', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-06-10 03:26:49', NULL, '', NULL, '', ''),
(107, 'cus_req0046', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Test1', '<p>test reject</p>', 1, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>ads</p>', '798', '2024-06-30', '2024-06-10 03:27:00', '2024-06-10 03:27:00', '', '2024-06-10 03:27:10', '<p>reject</p>', 'deny'),
(108, 'cus_req0047', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Breakfast Menu template size 20cm x 30xm \r\n\r\n', '<p>discusajd product</p>', 5, '2024-06-30', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-06-10 03:27:50', NULL, '', NULL, '', ''),
(109, 'cus_req0047', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Breakfast Menu template size 20cm x 30xm \r\n\r\n', '<p>discusajd product</p>', 5, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>product discuss</p>', '123123', '2024-06-30', '2024-06-10 03:28:07', '2024-06-10 03:28:07', '', '2024-06-10 03:28:21', '<p>discuss</p>', 'discuss'),
(110, 'cus_req0048', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Breakfast Menu template size 20cm x 30xm \r\n\r\n', '<p>test</p>', 1, '2024-06-30', 0, 'GoodCompany', '', NULL, '', '', NULL, '2024-06-10 03:35:13', NULL, '', NULL, '', ''),
(111, 'cus_req0048', 70, 'alexlam114', '', '85388888888', 'lammanchio123@gmail.com', 0, 'Breakfast Menu template size 20cm x 30xm \r\n\r\n', '<p>test</p>', 1, '2024-06-30', 10, 'GoodCompany', '', NULL, '<p>test product reject</p>', '424', '2024-06-30', '2024-06-10 03:35:31', '2024-06-10 03:35:31', '', '2024-06-10 03:35:42', '<p>NONON</p>', 'deny'),
(114, 'cus_req0026', 39, 'pizza', 'test deny', '67686960', 'test@gmail.com', 4, '', 'deny', 1, '2024-06-30', 7, 'abccompany', '', NULL, '<p>deny</p>', '1234', '2024-06-30', '2024-06-13 02:01:37', '2024-06-13 02:01:37', '', '2024-06-13 02:02:36', '<p>deny</p>', 'deny'),
(125, 'cus_req-2024-06-12-SN000050', 39, 'pizza', '', '67686960', 'test@gmail.com', 0, 'Print Material test ', '<p>2131</p>', 1, '2024-06-30', 0, 'abccompany', '', NULL, '', '', NULL, '2024-06-13 02:36:09', NULL, '', NULL, '', ''),
(126, 'cus_req-2024-06-12-SN000050', 39, 'pizza', '', '67686960', 'test@gmail.com', 0, 'Print Material test ', '<p>2131</p>', 1, '2024-06-30', 7, 'abccompany', '', NULL, '<p>test</p>', '12355', '2024-06-30', '2024-06-13 02:38:20', '2024-06-13 02:38:20', '', '2024-06-13 02:38:47', '<p>deny</p>', 'deny'),
(130, 'cus_req-2024-06-12-SN000051', 39, 'pizza', 'ts', '67686960', 'test@gmail.com', 3, '', '<p>asd</p>', 2, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-13 02:48:58', NULL, '', NULL, '', ''),
(131, 'cus_req-2024-06-12-SN000051', 39, 'pizza', 'ts', '67686960', 'test@gmail.com', 3, '', '<p>asd</p>', 2, '2024-06-30', 7, 'abccompany', '', NULL, '<p>t</p>', '123', '2024-06-30', '2024-06-13 02:48:58', '2024-06-13 02:49:16', '', '2024-06-22 16:47:45', '<p>discuss</p>', 'discuss'),
(132, 'cus_req-2024-06-21-SN000051', 27, 'alexlam', '123tset', '66726031', 'lammanchio@gmail.com', 3, '', '<p>123test</p>', 1, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-21 18:09:37', NULL, '', NULL, '', ''),
(133, 'cus_req-2024-06-22-SN000051', 39, 'pizza', 'test deny', '67686960', 'test@gmail.com', 3, '', '<p>deny</p>', 2, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-22 17:16:42', NULL, '', NULL, '', ''),
(134, 'cus_req-2024-06-21-SN000051', 27, 'alexlam', '123tset', '66726031', 'lammanchio@gmail.com', 3, '', '<p>123test</p>', 1, '2024-06-30', 7, 'abccompany', '', NULL, '<p>test1234</p>', '12345', '2024-06-30', '2024-06-21 18:09:37', '2024-06-22 17:17:34', '', '2024-06-22 18:11:24', '<p>d</p>', 'discuss'),
(135, 'cus_req-2024-06-22-SN000051', 39, 'pizza', 'test deny', '67686960', 'test@gmail.com', 3, '', '<p>deny</p>', 2, '2024-06-30', 7, 'abccompany', '', NULL, '<p>test1234513</p>', '231345', '2024-06-30', '2024-06-22 17:16:42', '2024-06-22 17:17:57', '', '2024-06-22 17:18:10', '<p>deny</p>', 'deny'),
(136, 'cus_req-2024-06-22-SN000051', 39, 'pizza', '', '67686960', 'test@gmail.com', 0, 'Print Menu -20cm *15cm ', '<p>asd</p>', 1, '2024-06-30', 0, 'adscompany', '', NULL, '', '', NULL, '2024-06-22 21:30:24', NULL, '', NULL, '', ''),
(137, 'cus_req0040', 71, 'alexlam621', 'Food Menu 20 cm *20 cm', '85366726031', 'ALEXlam999@gmail.com', 3, '', 'Food Menu 20 cm *20 cm', 3, '2024-06-30', 7, 'abccompany', '', NULL, '<p>test</p>', '123', '2024-06-30', '2024-06-07 22:08:13', '2024-06-22 21:59:41', '', NULL, '', ''),
(138, 'cus_req0038', 71, 'alexlam621', '', '85366726031', 'ALEXlam999@gmail.com', 0, 'English Lunch menu template size 15cm x 30xm', '<p>I want to purchase 100 pc lunch menu, but the size should be 20 cm * 30cm</p>', 2, '2024-07-01', 10, 'GoodCompany', '', NULL, '<p>tsesrt123</p>', '23', '2024-06-30', '2024-06-07 21:56:25', '2024-06-22 22:15:34', '', NULL, '', ''),
(139, 'cus_req-2024-06-22-SN000051', 39, 'pizza', 'discuss', '67686960', 'test@gmail.com', 3, '', '<p>Discuss</p>', 1, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-22 23:32:30', NULL, '', NULL, '', ''),
(140, 'cus_req-2024-06-22-SN000052', 39, 'pizza', 'discuss', '67686960', 'test@gmail.com', 3, '', '<p>discuss</p>', 2, '2024-06-30', 0, '', '', NULL, '', '', NULL, '2024-06-22 23:37:21', NULL, '', NULL, '', ''),
(141, 'cus_req-2024-06-22-SN000052', 39, 'pizza', 'discuss', '67686960', 'test@gmail.com', 3, '', '<p>discuss</p>', 2, '2024-06-30', 7, 'abccompany', '', NULL, '<p>dsad</p>', '1234', '2024-06-30', '2024-06-22 23:37:21', '2024-06-22 23:37:46', '', '2024-06-22 23:39:29', '<p>discuss</p>', 'discuss'),
(142, 'cus_req-2024-06-22-SN000053', 39, 'pizza', '1234', '67686960', 'test@gmail.com', 3, '', '<p>1234</p>', 1, '2024-06-01', 0, '', '', NULL, '', '', NULL, '2024-06-22 23:39:06', NULL, '', NULL, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `quotation_content`
--

CREATE TABLE `quotation_content` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `req_number` varchar(255) NOT NULL,
  `quotation_date` varchar(100) NOT NULL,
  `valid_day` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `reg_country` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_number` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `Item_summary` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `delivery_terms` varchar(255) NOT NULL,
  `delivery_time` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `bp_filename` varchar(255) NOT NULL,
  `bp_size` int(11) NOT NULL,
  `bp_type` varchar(50) NOT NULL,
  `bp_file_upload_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cs_filename` varchar(255) NOT NULL,
  `cs_size` int(11) NOT NULL,
  `cs_type` varchar(50) NOT NULL,
  `cs_file_upload_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `quotation_content`
--

INSERT INTO `quotation_content` (`id`, `quotation_id`, `req_number`, `quotation_date`, `valid_day`, `company_id`, `company_name`, `company_email`, `reg_number`, `reg_country`, `customer_name`, `customer_email`, `customer_number`, `subject`, `Item_summary`, `price`, `delivery_terms`, `delivery_time`, `created_date`, `bp_filename`, `bp_size`, `bp_type`, `bp_file_upload_date`, `cs_filename`, `cs_size`, `cs_type`, `cs_file_upload_date`) VALUES
(7, 45, 'cus_req0023', '2024-05-31', '31', 10, 'GoodCompany123', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam', 'lammanchio@gmail.com', '66726031', 'CUS_REQ0023', '<p><strong>CUS_REQ0023</strong></p>', 15000, 'CUS_REQ0023													    	', 'CUS_REQ0023', '2024-05-13 01:48:01', 'Business_Partner_PDF691.pdf', 240105, 'application/pdf', '2024-05-13 01:52:21', 'AdSmart_Customer_PDF240.pdf', 242595, 'application/pdf', '2024-05-13 02:54:16'),
(9, 61, 'cus_req0027', '2024-05-26', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', 'HIHI', ' cus_req0027', '<p><strong>&nbsp;</strong>cus_req0027</p>', 4567, ' cus_req0027													    	', 'cus_req0027', '2024-05-26 19:03:30', 'Business_Partner_PDF643.pdf', 242595, 'application/pdf', '2024-06-22 23:27:18', 'AdSmart_Customer_PDF369.pdf', 242595, 'application/pdf', '2024-06-22 23:28:07'),
(10, 68, 'cus_req0029', '2024-06-29', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', 'HIHI', 'cus_req0029', '<p>cus_req0029</p>', 1234, 'cus_req0029													    	', 'cus_req0029', '2024-05-26 21:40:51', 'Business_Partner_PDF116.pdf', 242595, 'application/pdf', '2024-05-26 22:04:09', 'AdSmart_Customer_PDF466.pdf', 242595, 'application/pdf', '2024-05-26 22:04:25'),
(11, 75, 'cus_req0031', '2024-05-26', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', 'HIHI', 'CUS_REQ0031', '<p>OKOK</p>', 1234, 'CUS_REQ0031													    	', 'CUS_REQ0031', '2024-05-26 23:24:35', 'Business_Partner_PDF288.pdf', 242595, 'application/pdf', '2024-05-26 23:25:03', 'AdSmart_Customer_PDF885.pdf', 242595, 'application/pdf', '2024-05-26 23:25:18'),
(12, 77, 'cus_req0032', '2024-05-27', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', 'HIHI', 'cus_req0032', '<p><strong>:&nbsp;</strong>cus_req0032</p>', 42424, ': cus_req0032													    	', ': cus_req0032', '2024-05-26 23:45:57', 'Business_Partner_PDF834.pdf', 242595, 'application/pdf', '2024-05-26 23:48:38', 'AdSmart_Customer_PDF85.pdf', 242595, 'application/pdf', '2024-05-26 23:48:53'),
(14, 79, 'cus_req0033', '2024-06-08', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', 'HIHI', 'CUS_REQ0033', '<p>test</p>', 2342, 'CUS_REQ0033													    	', 'CUS_REQ0033', '2024-05-27 00:15:08', 'Business_Partner_PDF279.pdf', 242595, 'application/pdf', '2024-05-27 00:15:31', '', 0, '', '2024-05-27 00:15:08'),
(15, 95, 'cus_req0040', '2024-06-07', '30 days', 10, 'GoodCompany', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam621', 'ALEXlam999@gmail.com', '85366726031', 'Food Menu 20 cm *20 cm', '<p>Food Menu 20 cm *20 cm and provide 10 % discount. The initial price is 60000, after discount the price should be 54000</p>', 54000, 'Receive 50% deposit 	\r\nFood Menu 20 cm *20 cm						    	', 'Receive the deposit after 10 days	', '2024-06-07 22:18:22', 'Business_Partner_PDF254.pdf', 49465, 'application/pdf', '2024-06-10 02:00:29', '', 239051, 'application/pdf', '2024-06-07 22:24:02'),
(16, 99, 'cus_req0042', '2024-06-10', '30 days', 10, 'GoodCompany', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam114', 'lammanchio123@gmail.com', '85388888888', 'Accept', '<p>Accpet</p>', 54000, 'accpet									    	', 'Receive the deposit after 10 days	', '2024-06-10 03:02:14', '', 0, '', '2024-06-10 03:02:14', '', 0, '', '2024-06-10 03:02:14'),
(17, 103, 'cus_req0044', '2024-06-10', '30 days', 10, 'GoodCompany', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam114', 'lammanchio123@gmail.com', '85388888888', 'Display', '<p>dasdsa</p>', 54000, 'dsad													    	', 'Receive the deposit after 10 days	', '2024-06-10 03:11:01', '', 0, '', '2024-06-10 03:11:01', '', 0, '', '2024-06-10 03:11:01'),
(18, 105, 'cus_req0045', '2024-06-30', '30 days', 10, 'GoodCompany', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam114', 'lammanchio123@gmail.com', '85388888888', 'accept_product', '<p>accept_product</p>', 54000, 'accept_product', 'Receive the deposit after 10 days	', '2024-06-10 03:13:32', '', 0, '', '2024-06-10 03:13:32', '', 0, '', '2024-06-10 03:13:32'),
(19, 109, 'cus_req0047', '2024-07-01', '30 days', 10, 'GoodCompany', 'lammanchio@gmail.com', 'A12345578', '澳門 青洲上街60號 綠洲第二座 20樓K', 'alexlam114', 'lammanchio123@gmail.com', '85388888888', 'discus', 'oasdjkl', 54000, 'asdasdasasdas													    	', 'Receive the deposit after 10 days	', '2024-06-10 03:29:03', 'Business_Partner_PDF478.pdf', 49465, 'application/pdf', '2024-06-10 03:29:43', 'AdSmart_Customer_PDF614.pdf', 49465, 'application/pdf', '2024-06-10 03:30:06'),
(20, 113, 'cus_req-2024-06-12-SN0049', '2024-06-13', '30 days', 7, 'abccompany', 'abccompany123@gmail.com', 'ABC1234', 'Macao street 21', 'pizza', 'test@gmail.com', '67686960', 'Cus-2024-06-12-SN0049', '<p>Test <label>:&nbsp;</label><strong>CUS_REQ-2024-06-12-SN0049</strong></p>', 12378, '<p>sada <label>:&nbsp;</label><strong>CUS_REQ-2024-06-12-SN0049</strong></p>', 'Receive the deposit after 10 days	', '2024-06-13 00:55:49', '', 0, '', '2024-06-13 00:55:49', '', 0, '', '2024-06-13 00:55:49');

-- --------------------------------------------------------

--
-- 資料表結構 `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `company_id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `customer_name`, `company_id`, `company_name`, `content`, `created_dt`, `status`) VALUES
(1, 1, 27, 'alexlam', 10, 'GoodCompany', 'test1', '2023-12-31 18:43:58', ''),
(2, 1, 27, 'alexlam', 10, 'GoodCompany', 'test123', '2023-12-31 18:49:17', ''),
(7, 1, 27, 'alexlam', 0, 'NULL', '12345648798979', '2024-02-13 07:56:24', ''),
(8, 3, 27, 'alexlam', 0, 'NULL', 'Can chap 5 per ', '2024-04-04 09:23:49', ''),
(10, 3, 0, 'NULL', 7, 'ABC Company LTD', 'OK OK', '2024-04-04 11:13:16', ''),
(11, 3, 0, 'NULL', 7, 'ABC Company LTD', '<p>testest</p>', '2024-04-04 11:23:36', ''),
(12, 3, 0, 'NULL', 7, 'ABC Company LTD', '<p>sadasdasdas</p>', '2024-04-04 11:27:13', ''),
(13, 3, 0, 'NULL', 7, 'ABC Company LTD', '<p>hihihi</p>', '2024-04-04 11:37:34', ''),
(14, 3, 27, 'alexlam', 0, 'NULL', '<p>customer_test</p>', '2024-04-06 03:18:24', 'progress'),
(15, 3, 27, 'alexlam', 0, 'NULL', '<p>test11</p>', '2024-04-06 04:26:14', 'progress'),
(16, 3, 27, 'alexlam', 0, 'NULL', '<p>test123</p>', '2024-04-06 04:27:16', 'progress'),
(17, 3, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-04-06 04:33:52', 'accept'),
(18, 6, 27, 'alexlam', 0, 'NULL', '<p>I want to but 100 units menu and budget 5000</p>', '2024-04-28 04:34:18', 'progress'),
(19, 6, 0, 'NULL', 7, 'ABC', '<p>OK deal</p>', '2024-04-28 04:35:42', 'progress'),
(22, 6, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-04-28 04:50:51', 'accept'),
(23, 7, 27, 'alexlam', 0, 'NULL', '<p>I want to choose option 1 and could you provide a discount about option 1 that it can be 130000?</p>\r\n<h2><strong>Option 1</strong></h2>\r\n<table style=\"border-collapse: collapse; width: 99.9538%; height: 44.7916px;\" border=\"1\"><colgroup><col style=\"width: 20.0093%;\"><col style=\"width: 20.0093%;\"><col style=\"width: 20.0093%;\"><col style=\"width: 20.0093%;\"><col style=\"width: 20.0093%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 22.3958px;\">\r\n<td style=\"height: 22.3958px;\">Location</td>\r\n<td style=\"height: 22.3958px;\">outdoor size</td>\r\n<td style=\"height: 22.3958px;\">Month</td>\r\n<td style=\"height: 22.3958px;\">Maintenance</td>\r\n<td style=\"height: 22.3958px;\">Price</td>\r\n</tr>\r\n<tr style=\"height: 22.3958px;\">\r\n<td style=\"height: 22.3958px;\">Macao</td>\r\n<td style=\"height: 22.3958px;\">20M*30M</td>\r\n<td style=\"height: 22.3958px;\">3</td>\r\n<td style=\"height: 22.3958px;\">No</td>\r\n<td style=\"height: 22.3958px;\">150000</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', '2024-04-29 10:19:09', 'progress'),
(24, 7, 0, 'NULL', 7, 'ABC', '<p>OK. Deal.</p>', '2024-04-29 10:29:10', ''),
(25, 7, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-04-29 10:46:47', 'accept'),
(26, 8, 39, 'pizza', 0, 'NULL', '<p>Can we have discount?&nbsp;</p>', '2024-05-10 06:46:23', 'progress'),
(27, 8, 0, 'NULL', 10, 'GoodCompany', '<p>OK. 10 % discount for you</p>', '2024-05-10 06:46:40', ''),
(28, 8, 39, 'pizza', 0, 'NULL', '<p>OK. Fine&nbsp;</p>', '2024-05-10 06:46:57', 'progress'),
(29, 8, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-10 06:47:06', 'accept'),
(30, 11, 27, 'alexlam', 0, 'NULL', '<p>OK</p>', '2024-05-12 10:47:34', 'progress'),
(31, 11, 0, 'NULL', 10, 'GoodCompany123', '<p>OK12345</p>', '2024-05-12 10:47:51', ''),
(33, 11, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-05-12 10:50:37', 'reject'),
(34, 10, 27, 'alexlam', 0, 'NULL', '<p>OKOK</p>', '2024-05-12 10:51:19', 'progress'),
(35, 10, 0, 'NULL', 10, 'GoodCompany123', '<p>OKOKOKOK</p>', '2024-05-12 10:51:28', ''),
(36, 10, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-05-12 10:51:37', 'accept'),
(37, 19, 39, 'pizza', 0, 'NULL', '<p>want to disucss</p>', '2024-05-26 04:55:35', 'progress'),
(38, 19, 0, 'NULL', 7, 'ABC', '<p>OKOKOK</p>', '2024-05-26 04:55:48', ''),
(39, 19, 39, 'pizza', 0, 'NULL', '<p>Done</p>', '2024-05-26 04:55:59', 'progress'),
(40, 19, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-26 04:56:07', 'accept'),
(41, 20, 39, 'pizza', 0, 'NULL', '<p>NONONONO</p>', '2024-05-26 05:17:20', 'progress'),
(42, 20, 0, 'NULL', 7, 'ABC', '<p>OKOKKOK</p>', '2024-05-26 05:17:29', ''),
(43, 20, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-26 05:17:38', 'reject'),
(44, 21, 39, 'pizza', 0, 'NULL', '<p>test discuss succss</p>', '2024-05-26 09:44:54', 'progress'),
(45, 21, 0, 'NULL', 7, 'ABC', '<p>OKOK</p>', '2024-05-26 09:45:03', ''),
(46, 21, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-26 09:45:14', 'accept'),
(47, 22, 39, 'pizza', 0, 'NULL', '<p>test reject</p>', '2024-05-26 10:12:28', 'progress'),
(48, 22, 0, 'NULL', 7, 'ABC', '<p>OKOK</p>', '2024-05-26 10:12:33', ''),
(49, 22, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-26 10:12:53', 'reject'),
(50, 23, 0, 'NULL', 7, 'ABC', '<p>test</p>', '2024-05-26 10:14:15', ''),
(51, 23, 39, 'pizza', 0, 'NULL', '<p>tsrt</p>', '2024-05-26 10:14:23', 'progress'),
(52, 23, 39, 'pizza', 0, 'NULL', 'NULL', '2024-05-26 10:14:37', 'accept'),
(53, 24, 71, 'alexlam621', 0, 'NULL', '<p>Do you provide a 10 % discount?&nbsp;</p>', '2024-06-07 08:11:21', 'progress'),
(54, 24, 0, 'NULL', 10, 'GoodCompany', '<p>We can provide 10% this discount</p>', '2024-06-07 08:13:09', ''),
(55, 24, 71, 'alexlam621', 0, 'NULL', 'NULL', '2024-06-07 08:14:11', 'accept'),
(56, 25, 70, 'alexlam114', 0, 'NULL', '<p>OKOK</p>', '2024-06-09 13:08:46', 'progress'),
(57, 25, 0, 'NULL', 10, 'GoodCompany', '<p>OKOK</p>', '2024-06-09 13:08:50', ''),
(58, 25, 70, 'alexlam114', 0, 'NULL', 'NULL', '2024-06-09 13:09:10', 'reject'),
(59, 26, 70, 'alexlam114', 0, 'NULL', '<p>dasdas</p>', '2024-06-09 13:10:21', 'progress'),
(60, 26, 0, 'NULL', 10, 'GoodCompany', '<p>dasd</p>', '2024-06-09 13:10:22', ''),
(61, 26, 70, 'alexlam114', 0, 'NULL', 'NULL', '2024-06-09 13:10:26', 'accept'),
(62, 27, 70, 'alexlam114', 0, 'NULL', 'NULL', '2024-06-09 13:28:34', 'accept'),
(63, 28, 39, 'pizza', 0, 'NULL', '<p>OK</p>', '2024-06-22 03:54:21', 'progress'),
(64, 28, 39, 'pizza', 0, 'NULL', 'NULL', '2024-06-22 03:54:28', 'accept'),
(65, 29, 27, 'alexlam', 0, 'NULL', '<p>ok</p>', '2024-06-22 04:11:45', 'progress'),
(66, 29, 27, 'alexlam', 0, 'NULL', 'NULL', '2024-06-22 04:17:33', 'accept'),
(67, 30, 0, 'NULL', 7, 'abccompany', '<p>test</p>', '2024-06-22 09:41:07', '');

-- --------------------------------------------------------

--
-- 資料表結構 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `company_name`, `company_id`, `customer_name`, `product_name`, `price`, `quantity`) VALUES
(20, 'GoodCompany', 10, '', 'Cafe Shop Menu template size 20cm x 30cm', 150, 1),
(58, 'abccompany', 7, 'pizza', 'Print Material test ', 100, 1),
(59, 'adscompany', 50, 'pizza', 'Print Menu -20cm *15cm ', 10, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `qoutation_id` int(11) NOT NULL,
  `req_number` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `topics`
--

INSERT INTO `topics` (`id`, `customer_id`, `customer_name`, `qoutation_id`, `req_number`, `title`, `content`) VALUES
(1, 27, 'alexlam', 21, 'cus_req0002', 'Test123456', '<p>test123456798</p>'),
(2, 27, 'alexlam', 29, 'cus_req0007', '', ''),
(3, 27, '', 33, 'cus_req0011', '', ''),
(4, 27, '', 34, 'cus_req0012', '', ''),
(5, 27, 'alexlam', 35, 'cus_req0013', '', ''),
(6, 27, 'alexlam', 36, 'cus_req0014', '', ''),
(7, 27, 'alexlam', 41, 'cus_req0019', '', ''),
(8, 39, 'pizza', 43, 'cus_req0021', '', ''),
(9, 27, 'alexlam', 44, 'cus_req0022', '', ''),
(10, 27, 'alexlam', 45, 'cus_req0023', '', ''),
(11, 27, 'alexlam', 46, 'cus_req0024', '', ''),
(12, 39, 'pizza', 47, 'cus_req0025', '', ''),
(13, 39, 'pizza', 54, 'cus_req0027', '', ''),
(14, 39, 'pizza', 56, 'cus_req0027', '', ''),
(15, 39, 'pizza', 58, 'cus_req0028', '', ''),
(19, 39, 'pizza', 61, 'cus_req0027', '', ''),
(20, 39, 'pizza', 63, 'cus_req0028', '', ''),
(21, 39, 'pizza', 77, 'cus_req0032', '', ''),
(22, 39, 'pizza', 70, 'cus_req0025', '', ''),
(23, 39, 'pizza', 79, 'cus_req0033', '', ''),
(24, 71, 'alexlam621', 95, 'cus_req0040', '', ''),
(25, 70, 'alexlam114', 101, 'cus_req0043', '', ''),
(26, 70, 'alexlam114', 103, 'cus_req0044', '', ''),
(27, 70, 'alexlam114', 109, 'cus_req0047', '', ''),
(28, 39, 'pizza', 131, 'cus_req-2024-06-12-SN000051', '', ''),
(29, 27, 'alexlam', 134, 'cus_req-2024-06-21-SN000051', '', ''),
(30, 39, 'pizza', 141, 'cus_req-2024-06-22-SN000052', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `adsmart_admin`
--
ALTER TABLE `adsmart_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `adsmart_business_partner`
--
ALTER TABLE `adsmart_business_partner`
  ADD PRIMARY KEY (`shop_code`);
ALTER TABLE `adsmart_business_partner` ADD FULLTEXT KEY `description_idx` (`description`);

--
-- 資料表索引 `adsmart_business_product`
--
ALTER TABLE `adsmart_business_product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `adsmart_business_product` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `adsmart_business_product` ADD FULLTEXT KEY `product_name` (`product_name`);
ALTER TABLE `adsmart_business_product` ADD FULLTEXT KEY `product_name_2` (`product_name`,`description`);

--
-- 資料表索引 `adsmart_category`
--
ALTER TABLE `adsmart_category`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `adsmart_category` ADD FULLTEXT KEY `description_idx` (`description`,`display_name`);

--
-- 資料表索引 `adsmart_customer`
--
ALTER TABLE `adsmart_customer`
  ADD UNIQUE KEY `id` (`id`);

--
-- 資料表索引 `business_bank_info`
--
ALTER TABLE `business_bank_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countrycode`);

--
-- 資料表索引 `country_numcode`
--
ALTER TABLE `country_numcode`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product_category` ADD FULLTEXT KEY `category_name` (`category_name`);

--
-- 資料表索引 `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- 資料表索引 `qoutation`
--
ALTER TABLE `qoutation`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `quotation_content`
--
ALTER TABLE `quotation_content`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- 資料表索引 `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adsmart_admin`
--
ALTER TABLE `adsmart_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adsmart_business_partner`
--
ALTER TABLE `adsmart_business_partner`
  MODIFY `shop_code` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adsmart_business_product`
--
ALTER TABLE `adsmart_business_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adsmart_category`
--
ALTER TABLE `adsmart_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `adsmart_customer`
--
ALTER TABLE `adsmart_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `business_bank_info`
--
ALTER TABLE `business_bank_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `country_numcode`
--
ALTER TABLE `country_numcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customer_credit_card`
--
ALTER TABLE `customer_credit_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qoutation`
--
ALTER TABLE `qoutation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `quotation_content`
--
ALTER TABLE `quotation_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
