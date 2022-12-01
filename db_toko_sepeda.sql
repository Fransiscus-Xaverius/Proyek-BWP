-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 02:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_sepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE DATABASE IF NOT EXISTS `db_toko_sepeda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_toko_sepeda`;

CREATE TABLE `customer` (
  `id_customer` varchar(6) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  `password_customer` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `jk_customer` int(10) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `noTelp_customer` int(12) NOT NULL,
  `status_customer` int(11) NOT NULL COMMENT '1 : active\r\n0 : non active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `username_customer`, `email_customer`, `password_customer`, `nama_customer`, `jk_customer`, `alamat_customer`, `noTelp_customer`, `status_customer`) VALUES
('US001', 'FransTest', 'x@gmail.com', 'Frans', 'Fransiscus Xaverius', 0, 'Ndaktau', 8111111, 1),
('US002', 'Fransajadeh', 'xaverius.fransiscus078@gmail.com', '1', 'Fransiscus Xaverius', 0, 'Ndaktau no.1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtrans`
--

CREATE TABLE `dtrans` (
  `htrans_id` varchar(15) NOT NULL,
  `id_sepeda` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `htrans`
--

CREATE TABLE `htrans` (
  `id_customer` varchar(6) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `htrans_id` varchar(128) NOT NULL,
  `h_date` date NOT NULL,
  `order_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans`
--

INSERT INTO `htrans` (`id_customer`, `harga_total`, `htrans_id`, `h_date`, `order_id`) VALUES
('US002', 52684500, 'n_1', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_10', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_2', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_3', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_4', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_5', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_6', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_7', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_8', '2022-11-29', '1572280554'),
('US002', 52684500, 'n_9', '2022-11-29', '1572280554');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(6) NOT NULL,
  `username_karyawan` varchar(100) NOT NULL,
  `password_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jk_karyawan` int(10) NOT NULL,
  `alamat_karyawan` varchar(255) NOT NULL,
  `noTelp_karyawan` varchar(12) NOT NULL,
  `dob_karyawan` date NOT NULL COMMENT 'date of birth',
  `tglMasuk_karyawan` date NOT NULL,
  `status_karyawan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('kat_1', 'MTB'),
('kat_2', 'Urban'),
('kat_3', 'BMX'),
('kat_4', 'Junior'),
('kat_5', 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(10) NOT NULL,
  `nama_merk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
('merk_1', 'Polygon'),
('merk_2', 'Wimcycle'),
('merk_3', 'KONA');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `kode_promo` varchar(15) NOT NULL,
  `besar_potongan` int(11) NOT NULL,
  `maks_potongan` int(11) NOT NULL,
  `min_pembelian` int(11) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL COMMENT 'pisahkan dengan , (koma) apabila lebih dari 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_sepeda`
--

CREATE TABLE `rating_sepeda` (
  `nota_jual` varchar(13) NOT NULL,
  `id_sepeda` varchar(6) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sepeda`
--

CREATE TABLE `sepeda` (
  `id_sepeda` varchar(10) NOT NULL,
  `nama_sepeda` varchar(100) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `id_merk` varchar(10) NOT NULL,
  `image_sepeda` varchar(500) NOT NULL,
  `deskripsi_sepeda` varchar(1024) NOT NULL,
  `stok_sepeda` int(11) NOT NULL,
  `harga_sepeda` int(11) NOT NULL,
  `status_sepeda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sepeda`
--

INSERT INTO `sepeda` (`id_sepeda`, `nama_sepeda`, `id_kategori`, `id_merk`, `image_sepeda`, `deskripsi_sepeda`, `stok_sepeda`, `harga_sepeda`, `status_sepeda`) VALUES
('spd_0', 'SISKIU N	', 'kat_1', 'merk_1', 'logo0.png', 'A burly machine that beats any steepest terrain																			', 32, 52684500, 1),
('spd_1', 'SISKIU T', 'kat_1', 'merk_1', 'logo1.png', 'Tackle any steep climbs and confident on any technical descents.																			', 77, 33309500, 1),
('spd_10', 'KALOSI', 'kat_1', 'merk_1', 'logo10.png', 'Your all-day choice for all-urban terrains', 35, 32534500, 1),
('spd_100', 'Dew-E', 'kat_5', 'merk_3', 'logo100.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 71, 4769448, 1),
('spd_101', 'Ecoco', 'kat_5', 'merk_3', 'logo101.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 63, 5969304, 1),
('spd_102', 'EL Kahuna SUV', 'kat_5', 'merk_3', 'logo102.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 36, 3621434, 1),
('spd_103', 'Rove HD', 'kat_5', 'merk_3', 'logo103.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 36, 9673453, 1),
('spd_104', 'Dew HD', 'kat_5', 'merk_3', 'logo104.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 1, 5816515, 1),
('spd_105', 'Coco HD', 'kat_5', 'merk_3', 'logo105.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 57, 8219359, 1),
('spd_11', 'BEND R', 'kat_1', 'merk_1', 'logo11.png', 'A capable adventure companion																			', 94, 32534500, 1),
('spd_12', 'PATH X', 'kat_1', 'merk_1', 'logo12.png', '​The mixture of urban bike and gravel bike has never been so rightfully deserved by a bike																			', 88, 15949500, 1),
('spd_13', 'HEIST X', 'kat_1', 'merk_1', 'logo13.png', 'Designed best for any urban terrains and light off-road.																			', 26, 27109500, 1),
('spd_14', 'GILI', 'kat_2', 'merk_1', 'logo14.png', 'Compact urban bicycle supported with electric pedal assistance system components and interactive applications																			', 87, 20134500, 1),
('spd_15', 'ZETA 2', 'kat_2', 'merk_1', 'logo15.png', ' Simple and stylish urban bicycle just for you commuters. ', 62, 9284500, 1),
('spd_16', 'ZETA FITTE', 'kat_2', 'merk_1', 'logo16.png', ' Simple and stylish urban bicycle just for you commuters. ', 62, 11764500, 1),
('spd_17', 'ZETA MIXTE', 'kat_2', 'merk_1', 'logo17.png', ' Simple and stylish urban bicycle just for you commuters. ', 62, 10369500, 1),
('spd_18', 'PATH 2', 'kat_2', 'merk_1', 'logo18.png', ' Simple and stylish urban bicycle just for you commuters. ', 62, 10834500, 1),
('spd_19', 'TRID ZZ', 'kat_3', 'merk_1', 'logo19.png', 'The ultimate happiness is at the top.																			', 12, 35634500, 1),
('spd_2', 'SISKIU D', 'kat_1', 'merk_1', 'logo2.png', 'Perfect for riders to tackle XC riding with some aggression. 																			', 62, 40284500, 1),
('spd_20', 'TRID', 'kat_3', 'merk_1', 'logo20.png', 'The ultimate happiness is at the top.																			', 31, 18584500, 1),
('spd_21', 'RAZOR ', 'kat_3', 'merk_1', 'logo21.png', ' Designed to accelerate when the gate drops, to corner precisely, and to catch the backside of doubles ', 24, 7424500, 1),
('spd_22', 'RELIC 20 ', 'kat_2', 'merk_1', 'logo22.png', 'A good start for your kids. ', 57, 5099500, 1),
('spd_23', 'RELIC 24 ', 'kat_2', 'merk_1', 'logo23.png', 'A good start for your children (Aged 8-10) ', 57, 6184500, 1),
('spd_24', 'Bugsy Girls 12″', 'kat_3', 'merk_2', 'logo24.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 95, 1250000, 1),
('spd_25', 'Bugsy Boys 12″', 'kat_3', 'merk_2', 'logo25.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 35, 1200000, 1),
('spd_26', 'BMX Dragster 20″', 'kat_3', 'merk_2', 'logo26.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 47, 1650000, 1),
('spd_27', '18″ BMX DRAGSTER', 'kat_3', 'merk_2', 'logo27.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 71, 1475000, 1),
('spd_28', 'BMX DRAGSTER 16″', 'kat_3', 'merk_2', 'logo28.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 16, 1375000, 1),
('spd_29', '16″ BMX SHOTGUN', 'kat_3', 'merk_2', 'logo29.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 44, 1225000, 1),
('spd_3', 'SYNCLINE C', 'kat_1', 'merk_1', 'logo3.png', 'Devoted for pro cross-country racers to trail seekers																			', 3, 18584500, 1),
('spd_30', '18″ BMX SHOTGUN', 'kat_3', 'merk_2', 'logo30.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 2, 1325000, 1),
('spd_31', '20″ BMX SHOTGUN', 'kat_3', 'merk_2', 'logo31.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 20, 1495000, 1),
('spd_32', '18″ BMX BIGFOOT', 'kat_3', 'merk_2', 'logo32.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 41, 1525000, 1),
('spd_33', ' BMX Bigfoot 20″		', 'kat_3', 'merk_2', 'logo33.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 76, 1675000, 1),
('spd_34', ' 16″ BMX BIG FOOT		', 'kat_3', 'merk_2', 'logo34.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 24, 1425000, 1),
('spd_35', ' 20″ BMX THRASHER		', 'kat_3', 'merk_2', 'logo35.png', 'A Classic BMX Bike from the prestigious local brand, Wimcycle.', 59, 1675000, 1),
('spd_36', ' Bugsy Girls 12″		', 'kat_4', 'merk_2', 'logo36.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 32, 1250000, 1),
('spd_37', ' Bugsy Boys 12″		', 'kat_4', 'merk_2', 'logo37.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 73, 1200000, 1),
('spd_38', ' Kids Yuna Steel Basket 20″		', 'kat_4', 'merk_2', 'logo38.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 28, 1735000, 1),
('spd_39', ' 18″ KIDS CLARA		', 'kat_4', 'merk_2', 'logo39.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 86, 1350000, 1),
('spd_4', 'XTRADA', 'kat_1', 'merk_1', 'logo4.png', 'Born to cross singletracks and endless miles.																			', 25, 21684500, 1),
('spd_40', ' 16″ KIDS CLARA		', 'kat_4', 'merk_2', 'logo40.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 16, 1250000, 1),
('spd_41', ' 20″ KIDS YUNA		', 'kat_4', 'merk_2', 'logo41.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 59, 1685000, 1),
('spd_42', ' 18″ KIDS YUNA		', 'kat_4', 'merk_2', 'logo42.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 50, 1550000, 1),
('spd_43', ' 16″ KIDS YUNA		', 'kat_4', 'merk_2', 'logo43.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 45, 1450000, 1),
('spd_44', ' 16″ BMX SHOTGUN		', 'kat_4', 'merk_2', 'logo44.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 67, 1225000, 1),
('spd_45', ' 18″ BMX SHOTGUN		', 'kat_4', 'merk_2', 'logo45.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 79, 1325000, 1),
('spd_46', ' 20″ BMX SHOTGUN		', 'kat_4', 'merk_2', 'logo46.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 96, 1495000, 1),
('spd_47', ' 18″ BMX BIGFOOT		', 'kat_4', 'merk_2', 'logo47.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 50, 1525000, 1),
('spd_48', ' BMX Bigfoot 20″		', 'kat_4', 'merk_2', 'logo48.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 41, 1675000, 1),
('spd_49', ' 16″ BMX BIG FOOT		', 'kat_4', 'merk_2', 'logo49.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 54, 1425000, 1),
('spd_5', 'PREMIER', 'kat_1', 'merk_1', 'logo5.png', ' 																					The way to mountains starts here																			', 74, 28659500, 1),
('spd_50', ' 20″ BMX THRASHER		', 'kat_4', 'merk_2', 'logo50.png', 'A Classic Junior Bike from the prestigious local brand, Wimcycle.', 66, 1675000, 1),
('spd_51', ' MTB Storm 27,5″ Aegyo Series		', 'kat_1', 'merk_2', 'logo51.png', 'A Classic Mountain Bike from the prestigious local brand, Wimcycle.', 82, 2500000, 1),
('spd_52', ' MTB FALCON 27,5″ Promo WIB		', 'kat_1', 'merk_2', 'logo52.png', 'A Classic Mountain Bike from the prestigious local brand, Wimcycle.', 63, 1975000, 1),
('spd_53', ' MTB STORM 27,5″ Promo WIB		', 'kat_1', 'merk_2', 'logo53.png', 'A Classic Mountain Bike from the prestigious local brand, Wimcycle.', 59, 2195000, 1),
('spd_54', ' 27,5″ MTB FALCON		', 'kat_1', 'merk_2', 'logo54.png', 'A Classic Mountain Bike from the prestigious local brand, Wimcycle.', 3, 2175000, 1),
('spd_55', ' MTB Storm 27,5″		', 'kat_1', 'merk_2', 'logo55.png', 'A Classic Mountain Bike from the prestigious local brand, Wimcycle.', 20, 2500000, 1),
('spd_56', ' Pocket Rocket 20″ Aegyo Series		', 'kat_2', 'merk_2', 'logo56.png', 'A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.', 3, 3000000, 1),
('spd_57', ' Pocket Rocket X3 20″		', 'kat_2', 'merk_2', 'logo57.png', 'A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.', 17, 3800000, 1),
('spd_58', ' POCKET ROCKET X2 20″		', 'kat_2', 'merk_2', 'logo58.png', 'A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.', 85, 3200000, 1),
('spd_59', ' Pocket Rocket 20″ Nusantara		', 'kat_2', 'merk_2', 'logo59.png', 'A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.', 61, 2395000, 1),
('spd_6', 'CASCADE', 'kat_1', 'merk_1', 'logo6.png', 'The way to mountains starts here', 1, 24784500, 1),
('spd_60', ' 20″ FOLDING POCKET ROCKET		', 'kat_2', 'merk_2', 'logo60.png', 'A Classic Urban Bike for City use from the prestigious local brand, Wimcycle.', 20, 3200000, 1),
('spd_61', 'Process X CR/DL', 'kat_1', 'merk_3', 'logo61.png', 'The mountain bikers mountain bike', 49, 7001099, 1),
('spd_62', 'Process X CR', 'kat_1', 'merk_3', 'logo62.png', 'The mountain bikers mountain bike', 71, 9635489, 1),
('spd_63', 'Process 153 DL 29', 'kat_1', 'merk_3', 'logo63.png', 'The mountain bikers mountain bike', 10, 8500409, 1),
('spd_64', 'Process 153 29', 'kat_1', 'merk_3', 'logo64.png', 'The mountain bikers mountain bike', 47, 8370640, 1),
('spd_65', 'Process 153 27.5', 'kat_1', 'merk_3', 'logo65.png', 'The mountain bikers mountain bike', 16, 4826084, 1),
('spd_66', 'Process 134 CR/DL 29', 'kat_1', 'merk_3', 'logo66.png', 'The mountain bikers mountain bike', 11, 8712359, 1),
('spd_67', 'Process 134 CR 29', 'kat_1', 'merk_3', 'logo67.png', 'The mountain bikers mountain bike', 74, 8086007, 1),
('spd_68', 'Process 134 DL 29', 'kat_1', 'merk_3', 'logo68.png', 'The mountain bikers mountain bike', 31, 5982175, 1),
('spd_69', 'Process 134 29', 'kat_1', 'merk_3', 'logo69.png', 'The mountain bikers mountain bike', 29, 6146546, 1),
('spd_7', 'HELIOS A', 'kat_1', 'merk_1', 'logo7.png', 'The all new performance road bike designed to cut through air without leaving behind turbulence, thus achieving an industry-leading level.																			', 52, 46484500, 1),
('spd_70', 'Process 134 DL 27.5', 'kat_1', 'merk_3', 'logo70.png', 'The mountain bikers mountain bike', 72, 4699219, 1),
('spd_71', 'Process 134 27.5', 'kat_1', 'merk_3', 'logo71.png', 'The mountain bikers mountain bike', 42, 3014918, 1),
('spd_72', 'Honzo ESD', 'kat_1', 'merk_3', 'logo72.png', 'The mountain bikers mountain bike', 27, 9657571, 1),
('spd_73', 'Honzo DL', 'kat_1', 'merk_3', 'logo73.png', 'The mountain bikers mountain bike', 22, 6827819, 1),
('spd_74', 'Honzo', 'kat_1', 'merk_3', 'logo74.png', 'The mountain bikers mountain bike', 91, 4179426, 1),
('spd_75', 'Honzo ST Frame', 'kat_1', 'merk_3', 'logo75.png', 'The mountain bikers mountain bike', 56, 7262647, 1),
('spd_76', 'Big Honzo DL', 'kat_1', 'merk_3', 'logo76.png', 'The mountain bikers mountain bike', 28, 8196002, 1),
('spd_77', 'Big Honzo', 'kat_1', 'merk_3', 'logo77.png', 'The mountain bikers mountain bike', 7, 8572550, 1),
('spd_78', 'Hei Hei CR/DL', 'kat_1', 'merk_3', 'logo78.png', 'The mountain bikers mountain bike', 7, 4838120, 1),
('spd_79', 'Hei Hei CR', 'kat_1', 'merk_3', 'logo79.png', 'The mountain bikers mountain bike', 56, 5601933, 1),
('spd_8', 'STRATTOS S ACX', 'kat_1', 'merk_1', 'logo8.png', 'All-rounder road bike built with a UCI approved ACX frame that is astonishingly responsive, smooth, and fast																			', 28, 61984500, 1),
('spd_80', 'Hei Hei', 'kat_1', 'merk_3', 'logo80.png', 'The mountain bikers mountain bike', 85, 8614780, 1),
('spd_81', 'Kahuna DL', 'kat_1', 'merk_3', 'logo81.png', 'The mountain bikers mountain bike', 26, 8727316, 1),
('spd_82', 'Kahuna', 'kat_1', 'merk_3', 'logo82.png', 'The mountain bikers mountain bike', 41, 6641891, 1),
('spd_83', 'Mahuna', 'kat_1', 'merk_3', 'logo83.png', 'The mountain bikers mountain bike', 29, 8965959, 1),
('spd_84', 'Lava Dome', 'kat_1', 'merk_3', 'logo84.png', 'The mountain bikers mountain bike', 60, 3849264, 1),
('spd_85', 'Cinder Cone', 'kat_1', 'merk_3', 'logo85.png', 'The mountain bikers mountain bike', 49, 6780069, 1),
('spd_86', 'Fire Mountain', 'kat_1', 'merk_3', 'logo86.png', 'The mountain bikers mountain bike', 29, 4935545, 1),
('spd_87', 'Dr Dew', 'kat_2', 'merk_3', 'logo87.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 73, 7409742, 1),
('spd_88', 'Dew Deluxe', 'kat_2', 'merk_3', 'logo88.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 9, 4380787, 1),
('spd_89', 'Dew Plus', 'kat_2', 'merk_3', 'logo89.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 58, 9464939, 1),
('spd_9', 'STRATTOS S ALX', 'kat_1', 'merk_1', 'logo9.png', 'All-rounder road bike built with ALX alloy frame and carbon fork, that defines a new way of experiencing the road																			', 96, 54234500, 1),
('spd_90', 'Dew', 'kat_2', 'merk_3', 'logo90.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 42, 5577532, 1),
('spd_91', 'Coco', 'kat_2', 'merk_3', 'logo91.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 1, 6424615, 1),
('spd_92', 'Splice', 'kat_2', 'merk_3', 'logo92.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 94, 3378158, 1),
('spd_93', 'Remote 160', 'kat_5', 'merk_3', 'logo93.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 76, 7808929, 1),
('spd_94', 'Remote 130', 'kat_5', 'merk_3', 'logo94.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 11, 5191771, 1),
('spd_95', 'Remote', 'kat_5', 'merk_3', 'logo95.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 10, 8387000, 1),
('spd_96', 'EL Kahuna', 'kat_5', 'merk_3', 'logo96.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 41, 7075874, 1),
('spd_97', 'EL Kahuna SUV', 'kat_5', 'merk_3', 'logo97.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 17, 5662559, 1),
('spd_98', 'Libre EL', 'kat_5', 'merk_3', 'logo98.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 44, 6360297, 1),
('spd_99', 'Dew-E DL', 'kat_5', 'merk_3', 'logo99.png', 'THE UPTOWN, DOWNTOWN, COMMUTE-FRIENDLY, INTERURBAN PATH-CRUISING, GROCERY-GETTING WORKHORSE', 28, 5651722, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `cp_supplier` varchar(25) NOT NULL,
  `pn_supplier` varchar(12) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD PRIMARY KEY (`htrans_id`);

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`htrans_id`),
  ADD KEY `FK_Customer_HJual` (`id_customer`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`kode_promo`);

--
-- Indexes for table `rating_sepeda`
--
ALTER TABLE `rating_sepeda`
  ADD PRIMARY KEY (`nota_jual`);

--
-- Indexes for table `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`id_sepeda`),
  ADD KEY `FK_Kategori_Sepeda` (`id_kategori`),
  ADD KEY `FK_Merk_Sepeda` (`id_merk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
