-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-12-2024 a las 21:13:49
-- Versión del servidor: 10.5.26-MariaDB-0+deb11u2
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cat1921ajs_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potentiometer_data`
--

CREATE TABLE `potentiometer_data` (
  `id` int(11) NOT NULL,
  `pot_value` decimal(10,2) NOT NULL,
  `recorded_at` datetime NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `potentiometer_data`
--

INSERT INTO `potentiometer_data` (`id`, `pot_value`, `recorded_at`, `pin`) VALUES
(1, '1.53', '2024-12-04 20:19:31', 34),
(2, '1.51', '2024-12-04 20:19:31', 32),
(3, '1.53', '2024-12-04 20:19:32', 34),
(4, '1.51', '2024-12-04 20:19:32', 32),
(5, '1.53', '2024-12-04 20:19:32', 34),
(6, '1.50', '2024-12-04 20:19:32', 32),
(7, '1.53', '2024-12-04 20:19:32', 34),
(8, '1.51', '2024-12-04 20:19:32', 32),
(9, '1.53', '2024-12-04 20:19:33', 34),
(10, '1.50', '2024-12-04 20:19:33', 32),
(11, '1.53', '2024-12-04 20:19:33', 34),
(12, '1.51', '2024-12-04 20:19:33', 32),
(13, '1.51', '2024-12-04 20:19:33', 32),
(14, '1.53', '2024-12-04 20:19:33', 34),
(15, '1.51', '2024-12-04 20:19:33', 32),
(16, '1.51', '2024-12-04 20:19:33', 32),
(17, '1.53', '2024-12-04 20:19:34', 34),
(18, '1.50', '2024-12-04 20:19:34', 32),
(19, '1.53', '2024-12-04 20:19:34', 34),
(20, '1.51', '2024-12-04 20:19:34', 32),
(21, '1.53', '2024-12-04 20:19:34', 34),
(22, '1.51', '2024-12-04 20:19:34', 32),
(23, '1.53', '2024-12-04 20:19:34', 34),
(24, '1.51', '2024-12-04 20:19:34', 32),
(25, '1.53', '2024-12-04 20:19:34', 34),
(26, '1.51', '2024-12-04 20:19:34', 32),
(27, '1.53', '2024-12-04 20:19:35', 34),
(28, '1.51', '2024-12-04 20:19:35', 32),
(29, '1.53', '2024-12-04 20:19:35', 34),
(30, '1.51', '2024-12-04 20:19:35', 32),
(31, '1.53', '2024-12-04 20:25:00', 34),
(32, '1.51', '2024-12-04 20:25:00', 32),
(33, '1.53', '2024-12-04 20:25:00', 34),
(34, '1.51', '2024-12-04 20:25:00', 32),
(35, '1.53', '2024-12-04 20:25:01', 34),
(36, '1.51', '2024-12-04 20:25:01', 32),
(37, '1.53', '2024-12-04 20:25:01', 34),
(38, '1.53', '2024-12-04 20:25:01', 34),
(39, '1.50', '2024-12-04 20:25:01', 32),
(40, '1.51', '2024-12-04 20:25:01', 32),
(41, '1.53', '2024-12-04 20:25:02', 34),
(42, '1.51', '2024-12-04 20:25:02', 32),
(43, '1.53', '2024-12-04 20:25:02', 34),
(44, '1.50', '2024-12-04 20:25:02', 32),
(45, '1.53', '2024-12-04 20:25:02', 34),
(46, '1.51', '2024-12-04 20:25:02', 32),
(47, '1.53', '2024-12-04 20:25:02', 34),
(48, '1.51', '2024-12-04 20:25:02', 32),
(49, '1.53', '2024-12-04 20:25:02', 34),
(50, '1.51', '2024-12-04 20:25:02', 32),
(51, '1.53', '2024-12-04 20:25:03', 34),
(52, '1.51', '2024-12-04 20:25:03', 32),
(53, '1.53', '2024-12-04 20:25:03', 34),
(54, '1.51', '2024-12-04 20:25:03', 32),
(55, '1.53', '2024-12-04 20:25:03', 34),
(56, '1.51', '2024-12-04 20:25:03', 32),
(57, '1.53', '2024-12-04 20:25:03', 34),
(58, '1.50', '2024-12-04 20:25:04', 32),
(59, '1.53', '2024-12-04 20:25:04', 34),
(60, '1.51', '2024-12-04 20:25:04', 32),
(61, '1.53', '2024-12-04 20:25:04', 34),
(62, '1.51', '2024-12-04 20:25:04', 32),
(63, '1.53', '2024-12-04 20:25:04', 34),
(64, '1.51', '2024-12-04 20:25:04', 32),
(65, '1.53', '2024-12-04 20:25:04', 34),
(66, '1.51', '2024-12-04 20:25:04', 32),
(67, '1.53', '2024-12-04 20:25:04', 34),
(68, '1.51', '2024-12-04 20:25:04', 32),
(69, '1.53', '2024-12-04 20:25:05', 34),
(70, '1.51', '2024-12-04 20:25:05', 32),
(71, '1.53', '2024-12-04 20:25:05', 34),
(72, '1.51', '2024-12-04 20:25:05', 32),
(73, '1.53', '2024-12-04 20:25:05', 34),
(74, '1.51', '2024-12-04 20:25:05', 32),
(75, '1.53', '2024-12-04 20:25:05', 34),
(76, '1.51', '2024-12-04 20:25:05', 32),
(77, '1.53', '2024-12-04 20:25:06', 34),
(78, '1.51', '2024-12-04 20:25:06', 32),
(79, '1.53', '2024-12-04 20:25:06', 34),
(80, '1.51', '2024-12-04 20:25:06', 32),
(81, '1.53', '2024-12-04 20:25:06', 34),
(82, '1.50', '2024-12-04 20:25:06', 32),
(83, '1.53', '2024-12-04 20:25:06', 34),
(84, '1.51', '2024-12-04 20:25:06', 32),
(85, '1.51', '2024-12-04 20:25:06', 32),
(86, '1.51', '2024-12-04 20:25:06', 32),
(87, '1.53', '2024-12-04 20:25:07', 34),
(88, '1.51', '2024-12-04 20:25:07', 32),
(89, '1.53', '2024-12-04 20:25:07', 34),
(90, '1.51', '2024-12-04 20:25:07', 32),
(91, '1.53', '2024-12-04 20:25:07', 34),
(92, '1.51', '2024-12-04 20:25:07', 32),
(93, '1.53', '2024-12-04 20:25:07', 34),
(94, '1.51', '2024-12-04 20:25:07', 32),
(95, '1.53', '2024-12-04 20:25:07', 34),
(96, '1.51', '2024-12-04 20:25:07', 32),
(97, '1.53', '2024-12-04 20:25:08', 34),
(98, '1.51', '2024-12-04 20:25:08', 32),
(99, '1.51', '2024-12-04 20:25:08', 32),
(100, '1.52', '2024-12-04 20:25:08', 34),
(101, '1.51', '2024-12-04 20:25:08', 32),
(102, '1.53', '2024-12-04 20:25:08', 34),
(103, '1.51', '2024-12-04 20:25:08', 32),
(104, '1.53', '2024-12-04 20:25:08', 34),
(105, '1.51', '2024-12-04 20:25:08', 32),
(106, '1.51', '2024-12-04 20:25:09', 32),
(107, '1.53', '2024-12-04 20:25:09', 34),
(108, '1.51', '2024-12-04 20:25:09', 32),
(109, '1.53', '2024-12-04 20:25:09', 34),
(110, '1.50', '2024-12-04 20:25:09', 32),
(111, '1.51', '2024-12-04 20:25:09', 32),
(112, '1.53', '2024-12-04 20:25:09', 34),
(113, '1.51', '2024-12-04 20:25:09', 32),
(114, '1.53', '2024-12-04 20:25:09', 34),
(115, '1.51', '2024-12-04 20:25:10', 32),
(116, '1.51', '2024-12-04 20:25:10', 32),
(117, '1.53', '2024-12-04 20:25:10', 34),
(118, '1.51', '2024-12-04 20:25:10', 32),
(119, '1.53', '2024-12-04 20:25:10', 34),
(120, '1.51', '2024-12-04 20:25:10', 32),
(121, '1.53', '2024-12-04 20:25:10', 34),
(122, '1.51', '2024-12-04 20:25:10', 32),
(123, '1.53', '2024-12-04 20:25:11', 34),
(124, '1.51', '2024-12-04 20:25:11', 32),
(125, '1.53', '2024-12-04 20:30:51', 34),
(126, '1.51', '2024-12-04 20:30:51', 32),
(127, '1.51', '2024-12-04 20:30:51', 32),
(128, '1.51', '2024-12-04 20:30:52', 32),
(129, '1.51', '2024-12-04 20:30:52', 32),
(130, '1.51', '2024-12-04 20:30:52', 32),
(131, '1.51', '2024-12-04 20:30:52', 32),
(132, '1.51', '2024-12-04 20:30:53', 32),
(133, '1.51', '2024-12-04 20:30:53', 32),
(134, '1.51', '2024-12-04 20:30:53', 32),
(135, '1.51', '2024-12-04 20:30:53', 32),
(136, '1.51', '2024-12-04 20:30:53', 32),
(137, '1.51', '2024-12-04 20:30:53', 32),
(138, '1.51', '2024-12-04 20:30:53', 32),
(139, '1.51', '2024-12-04 20:30:54', 32),
(140, '1.50', '2024-12-04 20:30:54', 32),
(141, '1.51', '2024-12-04 20:30:54', 32),
(142, '1.51', '2024-12-04 20:30:54', 32),
(143, '1.51', '2024-12-04 20:30:54', 32),
(144, '1.51', '2024-12-04 20:30:54', 32),
(145, '1.51', '2024-12-04 20:30:55', 32),
(146, '1.51', '2024-12-04 20:30:56', 32),
(147, '1.51', '2024-12-04 20:30:56', 32),
(148, '1.51', '2024-12-04 20:30:56', 32),
(149, '1.51', '2024-12-04 20:30:56', 32),
(150, '1.51', '2024-12-04 20:30:57', 32),
(151, '1.51', '2024-12-04 20:30:57', 32),
(152, '1.51', '2024-12-04 20:30:57', 32),
(153, '1.51', '2024-12-04 20:30:57', 32),
(154, '1.51', '2024-12-04 20:30:57', 32),
(155, '1.51', '2024-12-04 20:30:58', 32),
(156, '1.51', '2024-12-04 20:30:58', 32),
(157, '1.51', '2024-12-04 20:30:58', 32),
(158, '1.51', '2024-12-04 20:30:58', 32),
(159, '1.51', '2024-12-04 20:30:58', 32),
(160, '1.51', '2024-12-04 20:30:58', 32),
(161, '1.51', '2024-12-04 20:30:59', 32),
(162, '1.51', '2024-12-04 20:30:59', 32),
(163, '1.51', '2024-12-04 20:30:59', 32),
(164, '1.51', '2024-12-04 20:30:59', 32),
(165, '1.51', '2024-12-04 20:30:59', 32),
(166, '1.51', '2024-12-04 20:31:00', 32),
(167, '1.53', '2024-12-04 20:34:26', 34),
(168, '1.51', '2024-12-04 20:34:26', 32),
(169, '1.50', '2024-12-04 20:34:29', 32),
(170, '1.51', '2024-12-04 20:34:29', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_config`
--

CREATE TABLE `system_config` (
  `id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `system_config`
--

INSERT INTO `system_config` (`id`, `status`) VALUES
(1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `potentiometer_data`
--
ALTER TABLE `potentiometer_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_config`
--
ALTER TABLE `system_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `potentiometer_data`
--
ALTER TABLE `potentiometer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de la tabla `system_config`
--
ALTER TABLE `system_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
