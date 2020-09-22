-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2020 at 11:59 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pousada`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(65) NOT NULL,
  `documento` varchar(25) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome_cliente`, `documento`, `data_nascimento`, `cidade`, `estado`) VALUES
(1, 'luiz', '12449974636', '1997-03-24', 'careacu', 'minas gerais');

-- --------------------------------------------------------

--
-- Table structure for table `quartos`
--

DROP TABLE IF EXISTS `quartos`;
CREATE TABLE IF NOT EXISTS `quartos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_porta` varchar(20) NOT NULL,
  `tipo_quarto` varchar(50) NOT NULL,
  `valor_diaria` int NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quartos`
--

INSERT INTO `quartos` (`id`, `num_porta`, `tipo_quarto`, `valor_diaria`, `status`) VALUES
(1, '5', 'simples', 560, 'livre'),
(2, '12', 'simples', 550, 'ocupado'),
(3, '15', 'simples', 1000, 'livre');

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_quarto` int NOT NULL,
  `id_cliente` int NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date NOT NULL,
  `valor_reserva` int NOT NULL,
  `status_reserva` varchar(25) NOT NULL,
  `datahora_status` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente_fk` (`id_cliente`),
  KEY `id_quarto_fk` (`id_quarto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservas`
--

INSERT INTO `reservas` (`id`, `id_quarto`, `id_cliente`, `data_entrada`, `data_saida`, `valor_reserva`, `status_reserva`, `datahora_status`) VALUES
(9, 1, 1, '2020-10-10', '2020-10-11', 560, 'TESTE', '2020-09-11 03:28:00'),
(10, 1, 1, '2020-10-10', '2020-10-11', 560, 'Checkin', '2020-09-11 03:00:00'),
(11, 3, 1, '2020-10-10', '2020-10-13', 3000, 'Checkin', '2020-09-11 03:15:00'),
(12, 3, 1, '2020-10-10', '2020-10-13', 3000, 'Checkin', '2020-09-11 03:16:00'),
(13, 1, 1, '2020-02-11', '2020-02-12', 560, 'Checkin', '2020-09-11 03:28:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `id_cliente_fk` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_quarto_fk` FOREIGN KEY (`id_quarto`) REFERENCES `quartos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
