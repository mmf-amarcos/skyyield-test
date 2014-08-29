DROP TABLE IF EXISTS apartamento;
DROP TABLE IF EXISTS hospedaje;


CREATE TABLE IF NOT EXISTS `apartamento` (
  `idapartamento` int(11) NOT NULL AUTO_INCREMENT,
  `idhospedaje` int(11) NOT NULL,
  `disponibles` smallint(6) DEFAULT NULL,
  `adultos_por_apartamento` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idapartamento`),
  KEY `fk_apartamento_1_idx` (`idhospedaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;



CREATE TABLE IF NOT EXISTS `hospedaje` (
  `idhospedaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `tipo` enum('apartamento','hotel') NOT NULL,
  PRIMARY KEY (`idhospedaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0

