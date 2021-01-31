-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2021 a las 17:07:54
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_historiaclinica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_ROL` ()  SELECT
rol.id_rol,
rol.nombre_rol
FROM
rol$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_ROL_PACIENTE` ()  SELECT
rol.id_rol, 
rol.nombre_rol
FROM
rol
WHERE id_rol=3$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_PACIENTE` ()  BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
usuario.nombre_usuario, 
usuario.id_usuario, 
usuario.id_rol, 
usuario.nombre,
usuario.apellido_usuario,
usuario.password_usuario, 
usuario.sexo_usuario,
usuario.cedula_usuario,
usuario.email,
usuario.estado_civil,
usuario.ciudad,
usuario.direccion,
usuario.telefono, 
usuario.nombre_medicamento,
usuario.indicaciones_medicamento,
rol.nombre_rol
FROM
usuario
INNER JOIN rol ON (usuario.id_rol = rol.id_rol) AND (rol.id_rol=3) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_USUARIO` ()  BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
usuario.id_usuario, 
usuario.nombre_usuario, 
usuario.id_rol,
usuario.nombre,
usuario.apellido_usuario,
usuario.password_usuario, 
usuario.sexo_usuario,
usuario.cedula_usuario,
usuario.email,
usuario.estado_civil,
usuario.ciudad,
usuario.direccion,
usuario.telefono, 
usuario.nombre_medicamento,
usuario.indicaciones_medicamento,
rol.nombre_rol
FROM 
usuario
INNER JOIN rol ON usuario.id_rol = rol.id_rol ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MODIFICAR_DATOS_PACIENTE` (IN `IDUSUARIO` INT, IN `ROL` INT, IN `NOM` VARCHAR(20), IN `APE` VARCHAR(20), IN `SEXO` CHAR(1), IN `CEDULA` INT(11), IN `EMAIL` VARCHAR(255), IN `ESTADO` CHAR(1), IN `CIUDAD` VARCHAR(50), IN `DIR` VARCHAR(50), IN `TELF` INT(11), IN `RECETA` VARCHAR(300))  UPDATE usuario SET
id_rol=ROL,
nombre=NOM,
apellido_usuario=APE,
sexo_usuario=SEXO,
cedula_usuario=CEDULA,
email=EMAIL,
estado_civil=ESTADO,
ciudad=CIUDAD,
direccion=DIR,
telefono=TELF,
receta=RECETA
WHERE (id_usuario=IDUSUARIO) AND (id_rol=3)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MODIFICAR_DATOS_USUARIO` (IN `IDUSUARIO` INT, IN `IDROL` INT, IN `NOM` VARCHAR(20), IN `APE` VARCHAR(20), IN `SEXO` CHAR(1), IN `CEDULA` INT(11), IN `EMAIL` VARCHAR(255), IN `ESTADO` CHAR(1), IN `CIUDAD` VARCHAR(50), IN `DIR` VARCHAR(50), IN `TELF` INT(11), IN `MED` VARCHAR(50), IN `IND` VARCHAR(255))  UPDATE usuario SET
id_rol=IDROL,
nombre=NOM,
apellido_usuario=APE,
sexo_usuario=SEXO,
cedula_usuario=CEDULA,
email=EMAIL,
estado_civil=ESTADO,
ciudad=CIUDAD,
direccion=DIR,
telefono=TELF,
nombre_medicamento=MED,
indicaciones_medicamento=IND
WHERE id_usuario=IDUSUARIO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_REGISTRAR_DATOS_USUARIO` (IN `USU` VARCHAR(20), IN `CONTRA` VARCHAR(255), IN `ROL` INT, IN `NOM` VARCHAR(20), IN `APE` VARCHAR(20), IN `SEXO` CHAR(1), IN `CEDULA` INT(11), IN `EMAIL` VARCHAR(255), IN `ESTADO` CHAR(1), IN `CIUDAD` VARCHAR(50), IN `DIR` VARCHAR(50), IN `TELF` INT(11), IN `MED` VARCHAR(50), IN `IND` VARCHAR(255))  BEGIN DECLARE CANTIDAD INT; SET @CANTIDAD:=(select count(*) from usuario where nombre_usuario=BINARY USU); 
IF @CANTIDAD=0 THEN 
INSERT INTO usuario (nombre_usuario,nombre,apellido_usuario,id_rol,password_usuario,sexo_usuario,cedula_usuario,email,estado_civil,ciudad,direccion,telefono,nombre_medicamento,indicaciones_medicamento) VALUES (USU,NOM,APE,ROL,CONTRA,SEXO,CEDULA,EMAIL,ESTADO,CIUDAD,DIR,TELF,MED,IND); 
SELECT 1;
 ELSE SELECT 2; 
 END IF; 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_REGISTRAR_USUARIO` (IN `USU` VARCHAR(20), IN `ROL` INT, IN `NOM` VARCHAR(20), `APE` VARCHAR(20), IN `CONTRA` VARCHAR(255), IN `SEXO` CHAR(1), IN `CEDULA` INT(11), IN `EMAIL` VARCHAR(255), IN `ESTADO` CHAR(1), IN `CIUDAD` VARCHAR(50), IN `DIR` VARCHAR(50), IN `TELF` INT(11), IN `MED` VARCHAR(50), IN `IND` VARCHAR(255))  BEGIN DECLARE CANTIDAD INT; SET @CANTIDAD:=(select count(*) from usuario where nombre_usuario=BINARY USU); 
IF @CANTIDAD=0 THEN 
INSERT INTO usuario (nombre_usuario,id_rol,nombre,apellido_usuario,password_usuario,sexo_usuario,cedula_usuario,email,estado_civil,ciudad,direccion,telefono,nombre_medicamento,indicaciones_medicamento) VALUES (USU,ROL,NOM,APE,CONTRA,SEXO,CEDULA,EMAIL,ESTADO,CIUDAD,DIR,TELF,MED,IND); 
SELECT 1;
 ELSE SELECT 2; 
 END IF; 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RESTABLECER_CONTRA` (IN `EMAIL` VARCHAR(255), IN `CONTRA` VARCHAR(255))  BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(select COUNT(*) from usuario where email=EMAIL);
IF @CANTIDAD>0 THEN
	update usuario SET
	password_usuario=CONTRA
	WHERE email=EMAIL;
	select 1;
ELSE
	select 2;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VERIFICAR_ADMINISTRADOR` (IN `USUARIO` VARCHAR(20))  SELECT
	usuario.id_usuario, 
	usuario.nombre_usuario, 
	usuario.id_rol, 
	usuario.nombre, 
	usuario.apellido_usuario, 
	usuario.password_usuario, 
	usuario.sexo_usuario, 
	usuario.cedula_usuario, 
	usuario.email, 
	usuario.estado_civil, 
	usuario.ciudad, 
	usuario.direccion, 
	usuario.telefono, 
	rol.nombre_rol, 
	usuario.nombre_medicamento,
	usuario.indicaciones_medicamento
FROM usuario INNER JOIN rol ON usuario.id_rol = rol.id_rol WHERE nombre_usuario=BINARY USUARIO$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VERIFICAR_PACIENTE` (IN `USUARIO` VARCHAR(20))  SELECT
usuario.id_usuario, 
usuario.nombre_usuario, 
usuario.id_rol, 
usuario.nombre,
usuario.apellido_usuario,
usuario.password_usuario, 
usuario.sexo_usuario,
usuario.cedula_usuario,
usuario.email,
usuario.estado_civil,
usuario.ciudad,
usuario.direccion,
usuario.telefono, 
usuario.nombre_medicamento,
usuario.indicaciones_medicamento,
rol.nombre_rol
FROM
usuario
INNER JOIN rol ON (usuario.id_rol = rol.id_rol) AND (rol.id_rol=3)
WHERE nombre_usuario= BINARY USUARIO$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'MEDICO'),
(3, 'PACIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellido_usuario` varchar(20) NOT NULL,
  `password_usuario` varchar(255) DEFAULT NULL,
  `sexo_usuario` char(1) NOT NULL,
  `cedula_usuario` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `estado_civil` char(1) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre_medicamento` varchar(50) NOT NULL,
  `indicaciones_medicamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `id_rol`, `nombre`, `apellido_usuario`, `password_usuario`, `sexo_usuario`, `cedula_usuario`, `email`, `estado_civil`, `ciudad`, `direccion`, `telefono`, `nombre_medicamento`, `indicaciones_medicamento`) VALUES
(1, 'idruiz1', 1, 'Ian', 'Ruiz Lpopez', '$2y$10$C4cCGFD7/68mCqAkB6Y7zuE8fPl5BmfgXkxHD8gPM9KhsjZpvbKgm', 'M', 1727484022, 'ianruizlopez1@hotmail.es', 'S', 'Quito', 'Norte', 2878074, '', ''),
(2, 'franc_', 2, 'Francisco', 'Arias', '$2y$10$C4cCGFD7/68mCqAkB6Y7zuE8fPl5BmfgXkxHD8gPM9KhsjZpvbKgm', 'M', 1727263511, 'franciscogmail.com', 'C', 'Quito', 'Quito norte', 994325789, '', ''),
(3, 'diana123', 2, 'Diana', 'Lozada', '$2y$10$C4cCGFD7/68mCqAkB6Y7zuE8fPl5BmfgXkxHD8gPM9KhsjZpvbKgm', 'F', 170848970, 'dia_lo@gmail.com', 'C', 'Quito', 'Av. Amazonas', 946789456, 'aspirina', 'cada 2 horas'),
(4, 'juan_rl', 3, 'Juan', 'Arias', '$2y$10$C4cCGFD7/68mCqAkB6Y7zuE8fPl5BmfgXkxHD8gPM9KhsjZpvbKgm', 'M', 172743234, 'ianruizlopez1@hotmail.com', 'C', 'Quito', 'Av. Amazonas', 99678765, 'Asprina', 'tomar una pastilla todas las noches duante 4 dias');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
