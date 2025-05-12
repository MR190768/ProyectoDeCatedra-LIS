-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 09:11:34
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
-- Base de datos: `legalfacil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descripcion`) VALUES
(1, 'Derecho Penal', 'Plantillas relacionadas con denuncias, querellas, declaraciones juradas, defensa penal y otros procedimientos judiciales por delitos.'),
(2, 'Derecho de Familia', 'Plantillas legales relacionadas con relaciones familiares como divorcios, pensiones, custodias, adopciones y más.'),
(3, 'Arrendamientos', 'Documentos para alquiler de bienes inmuebles: viviendas, oficinas, locales.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `titulo`, `descripcion`, `categoria_id`, `file_path`) VALUES
(1, 'PoderFamiliar', 'Plantilla de designación de defensa técnica en proceso penal ante el Juzgado Especializado de Instrucción de San Salvador. Contiene campos dinámicos para completar con los datos del compareciente, la persona imputada y el abogado defensor.', 2, 'C:\\xampp\\htdocs\\LIS\\Proyecto-LIS\\ProyectoDeCatedra-LIS\\resources\\views\\pdf\\'),
(2, 'PoderImputado', 'Plantilla de presentación de abogado defensor ante el Juzgado Especializado de Instrucción de San Salvador. Permite que el abogado se muestre parte en el proceso penal en sustitución de un defensor anterior, incluyendo campos para datos del abogado, del imputado y del poderdante.', 1, 'C:\\xampp\\htdocs\\LIS\\Proyecto-LIS\\ProyectoDeCatedra-LIS\\resources\\views\\pdf\\PoderImputado.blade.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha_de_descarga` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombres` varchar(300) NOT NULL,
  `apellidos` varchar(300) NOT NULL,
  `email` varchar(150) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `personal_path` varchar(255) DEFAULT NULL,
  `tipo_usuario` enum('admin','usuario') NOT NULL DEFAULT 'usuario',
  `fecha_de_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `google_id`, `contrasena`, `personal_path`, `tipo_usuario`, `fecha_de_creacion`) VALUES
(5, 'Diego Majano', '', 'dmajano302@gmail.com', '111566808374079732593', '$2y$12$tig6p6SvQE1ycd3BvBzILuBtvoBIYDpq5Y3oKWUYXUYExFGS740OO', NULL, 'usuario', '2025-05-12 02:13:48'),
(6, 'Diego Rodriguez', '', 'drmajano12@gmail.com', '117902712518488352438', '$2y$12$5yC8cJ63/Ou/nhUE4j9que1/pz1iTzeyAu3qJG1OaFfQc.JVon5YO', NULL, 'usuario', '2025-05-12 03:25:28'),
(7, 'José', 'Rodríguez', 'diego.rodriguez@udb.edu.sv', NULL, '$2y$12$b7sKugIMiNvdBHLAnn4umOlMzdeYpTqdJLCsKR/AqGz1kILDuht6a', '/drodriguez', 'usuario', '2025-05-12 04:34:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `contrato_id` (`contrato_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD CONSTRAINT `descargas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `descargas_ibfk_2` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
