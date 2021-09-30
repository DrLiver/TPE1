-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 19:39:59
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fichajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones`
--

CREATE TABLE `divisiones` (
  `id_division` int(11) NOT NULL,
  `cantidad_equipos` int(11) NOT NULL,
  `division` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `divisiones`
--

INSERT INTO `divisiones` (`id_division`, `cantidad_equipos`, `division`) VALUES
(2, 13, 'Primera'),
(3, 10, 'B Metropolitana'),
(4, 10, 'Primera B Nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `division` varchar(100) NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `descripcion`, `division`, `posicion`) VALUES
(1, 'River Plate', 'El Club Atlético River Plate, más conocido simplemente como River Plate, es una entidad polideportiva con sede en Buenos Aires, Argentina.10​ Fue fundado el 25 de mayo de 1901 en el barrio de La Boca, tras la fusión de los clubes Santa Rosa y La Rosales, y su nombre proviene de la antigua denominación que se le daba en el inglés británico al Río de la Plata.', 'Primera', 1),
(2, 'Boca Juniors', 'El Club Atlético Boca Juniors es una entidad deportiva argentina con sede en el barrio de La Boca, Buenos Aires. Fue fundado en dicho barrio el 3 de abril de 1905 por seis vecinos adolescentes hijos de italianos. El fútbol es su disciplina más destacada, aunque también compite a nivel profesional, nacional e internacionalmente, en baloncesto, voleibol, futsal, fútbol femenino y balonmano.', 'Primera', 2),
(3, 'Colegiales', 'El Club Atlético Colegiales es un club de fútbol argentino, radicado en el barrio de Munro, partido de Vicente López, ubicado en la provincia de Buenos Aires. Fue fundado el 1 de abril de 1908 bajo el nombre Libertarios Unidos, nombre que actualmente lleva su estadio, donde juega sus partidos como local.', 'B Metropolitana', 1),
(4, 'Los Andes', 'El Club Atlético Los Andes es un club de fútbol argentino fundado en Lomas de Zamora, Buenos Aires el 1 de enero de 1917.4​ Actualmente juega en la Primera B Metropolitana, tercera división del fútbol argentino. Hace de local en el Estadio Eduardo Gallardón. Es uno de los clubes de la zona Sur que ha pasado por la Primera División en la que disputó partidos con grandes como Independiente.', 'B metropolitana', 3),
(5, 'Fenix', 'El Club Atlético Fénix es un club de fútbol argentino, cuya sede social se encuentra en la ciudad de Buenos Aires, fundado el 26 de abril de 1948. Actualmente juega en la Primera B Metropolitana.', 'B Metropolitana', 2),
(6, 'Comunicaciones', 'El Club Comunicaciones es una institución deportiva del barrio de Agronomía, ciudad de Buenos Aires, Argentina, fundado el 15 de marzo de 1931. Actualmente disputa la Primera B Metropolitana, tercera división del fútbol argentino.', 'B Metropolitana', 4),
(7, 'Racing', 'Racing Club, conocido como Racing Club de Avellaneda o simplemente Racing, es una entidad deportiva oriunda de Argentina, fundada el 25 de marzo de 1903 en la Ciudad de Avellaneda, Provincia de Buenos Aires.10​ Si bien su principal actividad deportiva es el fútbol masculino profesional, que milita en la Primera División de Argentina, también se practican otros deportes', 'Primera', 5),
(8, 'Independiente', 'El Club Atlético Independiente, conocido popularmente como Independiente o por su sigla CAI, es una entidad deportiva de Argentina de la ciudad de Avellaneda, situado en el sur del Gran Buenos Aires. Fue fundado el 1 de enero de 1905 por unos jóvenes empleados independistas del Club Maipú.', 'Primera', 4),
(9, 'Argentinos', 'La Asociación Atlética Argentinos Juniors, conocida como Argentinos Juniors o simplemente Argentinos, es una centenaria institución polideportiva fundada el 15 de agosto de 1904 en el barrio de La Paternal, Ciudad Autónoma de Buenos Aires, Argentina. Participa en la Liga Profesional de Fútbol Argentino.', 'Primera', 3),
(10, 'Colon', 'El Club Atlético Colón, es un club polideportivo de la ciudad de Santa Fe, Argentina. Su primer equipo de fútbol masculino profesional participa en la Primera División de Argentina. Además posee un equipo alternativo que disputa la Liga Santafesina de Fútbol desde 1948, conformado por jugadores amateurs.', 'Primera', 7),
(11, 'Newells', 'El Club Atlético y Biblioteca Newell\'s Old Boys es una institución deportiva y cultural de la localidad de Laguna Larga, provincia de Córdoba, Argentina. Recibe su nombre en honor al Club Atlético Newell\'s Old Boys de la ciudad de Rosario.', 'Primera', 6),
(12, 'Banfield', 'El Club Atlético Banfield es una entidad deportiva con sede en la localidad de Banfield, provincia de Buenos Aires. Fue fundado el 21 de enero de 1896 por habitantes de esa ciudad, mayoritariamente de orígenes británicos. Su principal actividad es el fútbol profesional. Actualmente milita en la Liga Profesional,4​ máxima categoría del fútbol argentino.', 'Primera', 8),
(13, 'Arsenal', 'El Arsenal Football Club (pronunciación en inglés: /ˈɑː(ɹ)sənəl ˈfʊtˌbɔl klʌb/) es un club de fútbol profesional con sede en Holloway, Londres, Inglaterra, que juega en la máxima categoría del fútbol de ese país, la Premier League. Uno de los más laureados del fútbol inglés, ha ganado 45 títulos en su país, incluyendo 13 campeonatos de liga y un récord de 14 Copas de Inglaterra; también ha ganado ', 'Primera', 9),
(14, 'Acassuso', 'El Club Atlético Acassuso, llamado simplemente Acassuso, es un club de fútbol argentino, fundado el 7 de septiembre de 1922, y cuya sede se encuentra en San Isidro, en la zona norte del Gran Buenos Aires. Es el único club de fútbol de dicho partido. En sus inicios el club se denominó Villa Acassuso Football Club hasta el año 1925, cuando adoptó el nombre Sportivo Acassuso, que llevaría hasta 19422', 'B Metropolitana', 5),
(15, 'Velez', 'El Club Atlético Vélez Sarsfield es una entidad deportiva de Argentina con sede en el barrio de Liniers, Buenos Aires. Fue fundado el 1 de enero de 1910 y su principal actividad es el fútbol, cuyo primer equipo participa en la Liga Profesional. Es uno de los clubes más laureados y representativos del fútbol argentino; habiéndose consagrado campeón de la Primera División en 10 oportunidades.', 'Primera', 12),
(16, 'Rosario Central', 'Rosario Central es uno de los clubes más laureados del fútbol argentino: registra 34 títulos oficiales de los cuales 23 los consiguió en la era amateur y 11 en la era profesional. A su vez, 23 de ellos son a nivel regional mientras que ha conseguido 10 conquistas a nivel nacional, y ha ganado un título internacional oficial organizado por la CONMEBOL. Este logro, lo convierte en el único equipo de', 'Primera', 11),
(17, 'Talleres (C)', 'El Club Atlético Talleres (Córdoba) es una institución deportiva con sede en la ciudad de Córdoba, Argentina. Su principal actividad es el fútbol masculino y también se practican el hockey, vóley, balonmano, patín artístico, karate, futsal y básquet en la institución. Fue fundado el 12 de octubre de 1913 y participa en la Primera División de Argentina.', 'Primera', 13),
(18, 'Villa San Carlos', 'El Club Atlético Villa San Carlos, o simplemente Villa San Carlos o San Carlos es un club de fútbol argentino, fundado el 25 de abril de 1925 en Berisso, Buenos Aires. Actualmente disputa la Primera B Metropolitana, tercera división del fútbol argentino para los equipos afiliados directamente a la AFA.', 'B Metropolitana', 6),
(19, 'UAI Urquiza', 'El Club Deportivo Universidad Abierta Interamericana de Urquiza simplificado como UAI Urquiza es una institución polideportiva de Villa Lynch, provincia de Buenos Aires, Argentina. Fue fundado el 21 de mayo de 1950 como Club Deportivo Social y Cultural Ferrocarril Urquiza.', 'B Metropolitana', 7),
(20, 'Flandria', 'El Club Social y Deportivo Flandria es una institución deportiva argentina fundada el 9 de febrero de 1941 por Julio Steverlynck. Una de sus actividades principales es el fútbol y está afiliado a la AFA desde 1947. El 12 de junio de 2016 ascendió a la Primera B Nacional (segunda división del fútbol argentino). Hoy en día milita en la Primera B Metropolitana.', 'B Metropolitana', 8),
(21, 'San Miguel', 'El Club Atlético San Miguel es un club cuya actividad de mayor referencia es el fútbol. Fue fundado el 7 de agosto de 1922. Tiene su sede social en el Partido de San Miguel. Actualmente milita en la Primera B, tercera categoría del fútbol argentino.', 'B Metropolitana', 9),
(22, 'Sacachispas', 'Sacachispas Fútbol Club es un club de fútbol argentino fundado el 17 de octubre de 1948. Tiene su sede en el barrio de Villa Soldati, en la ciudad de Buenos Aires. Actualmente se desempeña en la Primera B (Argentina) tercera categoría del Fútbol argentino para los equipos directamente afiliados a la AFA.', 'B Metropolitana', 10),
(23, 'Alte Brown', 'El Club Almirante Brown es una entidad deportiva argentina del partido de La Matanza, zona Oeste del Gran Buenos Aires, fundado originalmente el 1 de julio de 1912 como Club Atlético Almirante Brown, siendo su primer presidente Carlos E. Massa. El 21 de mayo de 1915, mediante una asamblea, tomó su segunda denominación de Atletic Club Almirante Brown.', 'Primera B Nacional', 1),
(24, 'Quilmes', 'El Quilmes Atlético Club es una institución deportiva argentina, de la ciudad de Quilmes, provincia de Buenos Aires. Sus principales deportes son el fútbol masculino, donde participa en la Primera Nacional, y el hockey sobre césped, siendo el primero de estos el que recibe mayor prioridad.', 'Primera B Nacional', 2),
(25, 'San Martin (T)', 'El Club Atlético San Martín (conocido como el \"Ciruja\") es un club deportivo argentino fundado en Tucumán el 2 de noviembre de 1909. Su nombre remite al general José de San Martín). Actualmente juega en la Primera Nacional.', 'Primera B Nacional', 3),
(26, 'Gimnasia (M)', 'El Club Atlético Gimnasia y Esgrima, conocido popularmente como «Gimnasia de Mendoza», «Lobo mendocino» o por su acrónimo «GEM», es una institución deportiva argentina de la ciudad de Mendoza, provincia homónima, cuya principal actividad es el fútbol profesional. Fue fundado oficialmente el 30 de agosto de 1908, por un grupo de socios con ideas innovadoras pertenecientes al «Club de Pelota». ', 'Primera B Nacional', 4),
(27, 'Belgrano', 'El Club Atlético Belgrano, conocido como Belgrano de Córdoba, o simplemente Belgrano de manera abreviada, es una institución deportiva de la ciudad de Córdoba en Argentina. Fue fundado oficialmente un lunes 19 de marzo de 1905.3​ Fue fundado por un grupo de niños y una mujer adulta. Los niños eran los cinco hermanos Lascano.', 'Primera B Nacional', 6),
(28, 'Agropecuario', 'El Club Agropecuario Argentino, simplificado como Agropecuario, es un club de fútbol ubicado en la ciudad de Carlos Casares, ubicada en el interior de la Provincia de Buenos Aires, Argentina. Es uno de los más jóvenes del fútbol argentino, ya que fue fundado el 23 de agosto de 2011 por el empresario Bernardo Grobocopatel, que es el presidente del club.', 'Primera B Nacional', 7),
(29, 'Atlanta', 'El Club Atlético Atlanta es una institución social, cultural y deportiva argentina, radicada en el barrio de Villa Crespo, Buenos Aires. Fue fundado el 12 de octubre de 1904 y actualmente juega en la Primera Nacional, segunda categoría del fútbol argentino. Comenzó su participación futbolística en 1906.', 'Primera B Nacional', 8),
(30, 'Alvarado', 'El Club Atlético Alvarado es una entidad deportiva de la ciudad de Mar del Plata, en la provincia de Buenos Aires, Argentina. Se destaca en fútbol, actualmente participando en la Liga Marplatense de Fútbol y de la Primera Nacional, segunda división del fútbol argentino.', 'Primera B Nacional', 9),
(31, 'Riestra', 'Deportivo Riestra Asociación de Fomento Barrio Colón,2​ también conocido como Club Deportivo Riestra, es un club deportivo y social de Buenos Aires, Argentina. Tiene su sede en el barrio de Nueva Pompeya, y posee además el estadio Guillermo Laza en el barrio de Villa Soldati, cuya capacidad aproximada es de 3000 espectadores.', 'Primera B Nacional', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  ADD PRIMARY KEY (`id_division`),
  ADD KEY `nombre_division` (`division`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `division` (`division`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `divisiones`
--
ALTER TABLE `divisiones`
  ADD CONSTRAINT `divisiones_ibfk_1` FOREIGN KEY (`division`) REFERENCES `equipos` (`division`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
