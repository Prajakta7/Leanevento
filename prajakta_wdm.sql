-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 11:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prajakta_wdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `topic` varchar(64) NOT NULL,
  `message` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_phone` varchar(10) NOT NULL,
  `responsible` varchar(64) NOT NULL,
  `place` varchar(64) NOT NULL,
  `schedule` datetime NOT NULL,
  `ticket_amount` float NOT NULL,
  `description` varchar(512) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `price` float(5,2) NOT NULL,
  `image_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `image_url`) VALUES
(1, 'NO PERMADOS LA FE', 'Recién he comenz.do leer libro cup mensaje pnncjpal es aprender busc.r ese algo mejor Tdos los EI\r\n                    libro este escrito\r\n                    por une persona que vive ccn diabetes tipo nos presenta como Ios adelantos en tratamtentos y\r\n                    tecnolog no hen\r\n                    curato sundlctn. die tras dia mejoren su de vida.\r\n                    Busquemos siempre mejcrar en muestras vidas. mantengamos el deseo Ce progresar, de\r\n                    educarnos mgs acerca de la ccndiciön de nuestros hijos y veras como poco a poco comenzaremos a\r\n                    enterdena rrejor', 300.00, 'imagenes/minibaner4.jpg'),
(2, 'LA IMPORTANCIA DE LOS ALIMENTOS	', 'Recién he comenz.do leer libro cup mensaje pnncjpal es aprender busc.r ese algo mejor Tdos los EI\r\n                    libro este escrito\r\n                    por une persona que vive ccn diabetes tipo nos presenta como Ios adelantos en tratamtentos y\r\n                    tecnolog no hen\r\n                    curato sundlctn. die tras dia mejoren su de vida.\r\n                    Busquemos siempre mejcrar en muestras vidas. mantengamos el deseo Ce progresar, de\r\n                    educarnos mgs acerca de la ccndiciön de nuestros hijos y veras como poco a poco comenzaremos a\r\n                    enterdena rrejor', 300.00, 'imagenes/minibaner1.jpg'),
(3, 'EDUCANDO PARA EL FUTURO	', 'Recién he comenz.do leer libro cup mensaje pnncjpal es aprender busc.r ese algo mejor Tdos los EI\r\n                    libro este escrito\r\n                    por une persona que vive ccn diabetes tipo nos presenta como Ios adelantos en tratamtentos y\r\n                    tecnolog no hen\r\n                    curato sundlctn. die tras dia mejoren su de vida.\r\n                    Busquemos siempre mejcrar en muestras vidas. mantengamos el deseo Ce progresar, de\r\n                    educarnos mgs acerca de la ccndiciön de nuestros hijos y veras como poco a poco comenzaremos a\r\n                    enterdena rrejor', 0.00, 'imagenes/minibaner2.jpg'),
(4, 'POR LINA SONRISA DE VIDA', 'Recién he comenz.do leer libro cup mensaje pnncjpal es aprender busc.r ese algo mejor Tdos los EI\r\n                    libro este escrito\r\n                    por une persona que vive ccn diabetes tipo nos presenta como Ios adelantos en tratamtentos y\r\n                    tecnolog no hen\r\n                    curato sundlctn. die tras dia mejoren su de vida.\r\n                    Busquemos siempre mejcrar en muestras vidas. mantengamos el deseo Ce progresar, de\r\n                    educarnos mgs acerca de la ccndiciön de nuestros hijos y veras como poco a poco comenzaremos a\r\n                    enterdena rrejor', 300.00, 'imagenes/minibaner3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `SubID` int(11) NOT NULL,
  `SubEmail` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `zip` varchar(5) NOT NULL,
  `city` varchar(16) NOT NULL,
  `state` varchar(2) NOT NULL,
  `user_type` varchar(16) NOT NULL,
  `business_type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `volunteer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'requested'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`SubID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
