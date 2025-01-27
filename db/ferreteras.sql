-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2025 a las 02:05:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blitz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ferreteras`
--

CREATE TABLE `ferreteras` (
  `id` int(11) NOT NULL,
  `tipoEncuesta` text NOT NULL,
  `nombreNegocio` text NOT NULL,
  `nombreCliente` text NOT NULL,
  `domicilio` text NOT NULL,
  `celular` text NOT NULL,
  `manejaPintura` text NOT NULL,
  `tipoPintura` text NOT NULL,
  `otrosPintura` text NOT NULL,
  `marcasPintura` text NOT NULL,
  `tipoComplementos` text NOT NULL,
  `marcasComplementos` text NOT NULL,
  `proveedor` text NOT NULL,
  `satisfechoProveedor` text NOT NULL,
  `porque` text NOT NULL,
  `faltaProductos` text NOT NULL,
  `inversionMensualPintura` text NOT NULL,
  `inversionMensualComplementos` text NOT NULL,
  `comentarios` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ferreteras`
--
ALTER TABLE `ferreteras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ferreteras`
--
ALTER TABLE `ferreteras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
