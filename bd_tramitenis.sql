--
-- Base de datos: `tramitenis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `cedula` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancha`
--

CREATE TABLE `cancha` (
  `numero` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `codigo` int(20) NOT NULL,
  --`nombre` int(20) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `cupos_disponibles` int(3) NOT NULL,
  `horario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `horario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL ,
  `hora` time NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'disponible',
  `numero` int(10) NOT NULL AUTO_INCREMENT,
  `cancha` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `cedula` int(20) NOT NULL,
  `eps` varchar(20) NOT NULL,
  `estamento` varchar(30) NOT NULL,
  `dependencia` varchar(30) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `codigo` int(20) NOT NULL,
  `horario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) NOT NULL,
  `cedula` int(20) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `cancha`
--
ALTER TABLE `cancha`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `horario_curso` (`horario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD KEY `horario_evento` (`horario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`fecha_inicio`,`hora`,'cancha'),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `cancha_horario` (`cancha`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `horario_reserva` (`horario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `numero` int(10) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_usuario` FOREIGN KEY (`cedula`) REFERENCES `usuario` (`cedula`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `horario_curso` FOREIGN KEY (`horario`) REFERENCES `horario` (`numero`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `horario_evento` FOREIGN KEY (`horario`) REFERENCES `horario` (`numero`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `cancha_horario` FOREIGN KEY (`cancha`) REFERENCES `cancha` (`numero`);

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_usuario` FOREIGN KEY (`cedula`) REFERENCES `usuario` (`cedula`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `horario_reserva` FOREIGN KEY (`horario`) REFERENCES `horario` (`numero`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `horario`(`fecha_inicio`, `hora`, `cancha`, `fecha_fin`) VALUES (date('2017-4-14'),time('6:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('7:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('8:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('9:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('10:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('11:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('12:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('13:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('14:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('15:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('16:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('17:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('18:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('19:00'),'2',date('2017-5-30')),(date('2017-4-14'),time('20:00'),'2',date('2017-5-30'));
