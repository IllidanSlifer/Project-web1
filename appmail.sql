-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2016 a las 19:39:48
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `appmail`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addressee` text NOT NULL,
  `iduser` int(11) NOT NULL,
  `message` text NOT NULL,
  `subject` text NOT NULL,
  `estado` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id`, `addressee`, `iduser`, `message`, `subject`, `estado`) VALUES
(19, 'kstryper@hotmail.com', 9, '      xd', 'cd', 'sent'),
(20, 'illidankj@hotmail.com', 10, '      fgh', 'ill', 'sent'),
(21, 'illidankj@hotmail.com', 10, '      dfgd', 'fghfg', 'sent'),
(22, 'illidankj@hotmail.com', 10, 'chupela !!!!!!!!', 'holee', 'sent'),
(23, 'illidankj@hotmail.com', 10, 'in your face motherfucker!!!!      ', 'h', 'sent');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `password`, `estado`, `code`, `email`) VALUES
(9, 'narvaez', 'pollis', '202cb962ac59075b964b07152d234b70', 1, 7477, 'narvaezeliecer@gmail.com'),
(10, 'kevin', 'illidan', '202cb962ac59075b964b07152d234b70', 1, 8091, 'illidankj@hotmail.com'),
(11, 'lol', 'yeer', '202cb962ac59075b964b07152d234b70', 1, 6513, 'kstryper@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
