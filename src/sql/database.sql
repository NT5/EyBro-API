-- Estructura de la base de datos

CREATE TABLE IF NOT EXISTS `preguntas` (
    `id_pregunta` INT NOT NULL AUTO_INCREMENT,
    `pregunta_texto` TEXT NOT NULL,
    `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `posibles_respuestas` (

) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `respuestas` (

) ENGINE=InnoDB;