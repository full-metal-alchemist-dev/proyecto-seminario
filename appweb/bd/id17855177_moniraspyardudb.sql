
CREATE DATABASE `monitoreoraspberrypi`
USE  `monitoreoraspberrypi`



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";






CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 1),
(3, 'Produccion e Instalacion', 1),
(4, 'Limpieza', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `rtn_dni` varchar(14) DEFAULT NULL,
  `cliente_tipo_id` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(1024) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `rtn_dni`, `cliente_tipo_id`, `telefono`, `direccion`, `email`, `estado_registro`) VALUES
(3, 'La Eso', '2aaaa', 1, '111111111', '11111111', '111111', 1),
(4, 'luis maria romero romero', '169836709', 1, '98786757', 'Barrio jesus, cuadra y media ', 'luis@gmail.com', 1),
(6, 'Danilo', '403', 1, '255', 'managua', 'lapto2006@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cliente_tipo`
--

CREATE TABLE `cliente_tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente_tipo`
--

INSERT INTO `cliente_tipo` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'Revendedor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `depositos`
--

CREATE TABLE `depositos` (
  `id` int(11) NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `numero_cuenta` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `depositos`
--

INSERT INTO `depositos` (`id`, `trabajador_id`, `fecha`, `nombre`, `banco`, `numero_cuenta`, `monto`, `detalle`, `estado_registro`) VALUES
(1, 3, '2021-10-17', 'Ferreteria Caceress', 'BAC', '234567890', '89.00', 'Compra', 0),
(2, 3, '2021-10-19', 'Juan', 'BAC', '879000000', '77.00', 'material', 0),
(3, 3, '2021-10-19', 'rrr', 'rrrrr', 'rr', '66.00', 'rr', 0),
(4, 3, '2021-10-19', 'ddddddd', 'ddddddddd', 'fff', '78.00', 'fff', 1),
(5, 3, '2021-10-18', '444', '444', 'uuu', '78.00', 'kk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `estado_sistema`
--

CREATE TABLE `estado_sistema` (
  `id` int(11) NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado_sistema`
--

INSERT INTO `estado_sistema` (`id`, `estado`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `hora_inicio`, `hora_final`, `estado_registro`) VALUES
(1, '08:00:00', '15:00:00', 1),
(2, '06:00:00', '10:00:00', 1),
(3, '20:00:00', '22:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo1` varchar(255) NOT NULL,
  `costo2` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `costo1`, `costo2`, `estado_registro`) VALUES
(1, '2021-10-31 18:23:20', '1', '2', 1),
(2, '2021-10-31 18:23:20', '1', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producto_pro`
--

CREATE TABLE `producto_pro` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo1` varchar(255) NOT NULL,
  `costo2` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rtn_dni` varchar(14) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `rtn_dni`, `telefono`, `direccion`, `email`, `estado_registro`) VALUES
(2, 'Libreria Fernando E', 'f55', '555', '555', '555', 1),
(3, 'Ferreteria Caceres', '1548990', '98786756', 'barrio las acacias', 'ferreteriacaceres@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `detalles`, `estado_registro`) VALUES
(1, 'administrador', 'Administrador de la empresa', 1),
(2, 'empleado', 'empelado o trabajador', 1),
(3, 'Diseñador', 'Encargado de realizar los diseños de la empresa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salario_mensual` decimal(10,2) NOT NULL,
  `numero_cuenta_banco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `apellido`, `dni`, `cargo_id`, `salario_mensual`, `numero_cuenta_banco`, `entrada`, `salida`, `estado_registro`) VALUES
(3, 'Maria Fernanda', 'Muñoz Melendez', '1501199502308', '1', '7000.00', '123456789', '8:00 am', '5:00 pm', 1),
(4, '', '', '', '', '0.00', '', '', '', 0),
(5, '', '', '', '', '0.00', '', '', '', 0),
(6, 'Jennifer Nicolle', 'Calderon Aguirre', '167898767890', '2', '6000.00', '123454444', '8:00 am', '5:00 pm', 1),
(7, '', '', '', '', '0.00', '', '', '', 0),
(8, 'Osman Ariel', 'Calderon', '12456789', '3', '6500.00', '123456789', '8:00 am', '5:00 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `usuario_tipo_id` int(11) DEFAULT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1,
  `dni` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `salario_m` decimal(10,2) NOT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol_id`, `nombres`, `apellidos`, `cargo_id`, `horario_id`, `usuario_tipo_id`, `estado_registro`, `dni`, `salario_m`, `numero_cuenta`, `photo`) VALUES
(3, 'admin', '$2y$10$G7OLz39qFMjGwFTn9ixG3.ablT1zxmIMzvtLhW0d3sKT4EEBsurx2', 1, 'Administrador', 'Demo', 1, 1, 1, 1, '', '0.00', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente_tipo`
--
ALTER TABLE `cliente_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado_sistema`
--
ALTER TABLE `estado_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente_tipo`
--
ALTER TABLE `cliente_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estado_sistema`
--
ALTER TABLE `estado_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
