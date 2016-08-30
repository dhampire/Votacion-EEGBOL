-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-05-2016 a las 09:55:35
-- Versión del servidor: 5.5.49-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `martinig_LIKES`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `likes` int(5) NOT NULL,
  `hates` int(5) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `likes`, `hates`, `titulo`, `resumen`) VALUES
(1, 535, 199, 'Mantener fijo el cabecero al hacer scroll con jQuery', 'A raíz de una consulta en Twitter de mi buen amigo @tecnorama y de mi nuevo amigo @opeto82, he preparado una minidemo para dejar fijo el cabecero (o el elemento que nos interese) al hacer scroll y no perderlo de vista.'),
(2, 617, 309, 'Calcular fecha pasada relativa con PHP', 'Como desarrolladores web, a menudo necesitamos mostrar las fechas en nuestro sitio web. Como usuario, no me gusta leer fechas completos como "26 de noviembre 2011 23:30" porque, inconscientemente, me pongo a hacer la cuenta para saber cuánto tiempo pasó hasta el día de hoy.'),
(3, 876, 337, 'Comprobar que una fecha existe usando jQuery Validate', 'Siguiendo con mis anteriores post donde hablo de jQuery Validate, esta vez me ha tocado verificar que la fecha ingresada en un campo de texto de mi formulario sea correcta.'),
(4, 1168, 566, 'Rellenar un select con datos obtenidos remotamente en json vía jQuery', 'Volvemos a jQuery y esta vez lo hacemos con un poco de PHP y JSON. Lo que vamos a hacer es rellenar un SELECT (o lista desplegable) con opciones cargadas remotamente mediante JSON.'),
(5, 1805, 864, 'Subflash 2013 a la riojana', 'Otro año más se viene EL evento del año para los amantes de las webs, los juegos, los pica códigos, los diseñadores, los que quieren pasar un buen rato, las novias o novios de todos estos y todo aquel que quiera ir a conocer gente y volver con muchos amigos nuevos.'),
(6, 2984, 560, '30 plugins jQuery que vale la pena mirar', 'Quien me conoce, sabe que soy muy fan de jQuery y la manera en que simplificó el uso de javascript a la vez que aportó grandes funcionalidades y efectos simples y complejos con, muchas veces, pocas líneas de código.');
