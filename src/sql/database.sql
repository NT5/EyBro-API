-- Estructura de la base de datos

CREATE TABLE IF NOT EXISTS `cuestionarios` (
    `id_cuestionario` BIGINT NOT NULL AUTO_INCREMENT,
    `descripcion` TEXT NOT NULL,
    `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_cuestionario`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `preguntas` (
    `id_pregunta` BIGINT NOT NULL AUTO_INCREMENT,
    `id_cuestionario` BIGINT NOT NULL,
    `pregunta_texto` TEXT NOT NULL,
    `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_pregunta`),
    CONSTRAINT FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id_cuestionario`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `posibles_respuestas` (
    `id_respuesta` BIGINT NOT NULL AUTO_INCREMENT,
    `id_pregunta` BIGINT NOT NULL,
    `respuesta_texto` TEXT NOT NULL,
    `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_respuesta`),
    CONSTRAINT FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `respuestas` (
    `id_respuesta` BIGINT NOT NULL,
    `id_pregunta` BIGINT NOT NULL
) ENGINE=InnoDB;

-- Datos de preguntas

INSERT INTO `cuestionarios` (`id_cuestionario`, `descripcion`) VALUES (1, 'EyBro!');

INSERT INTO `preguntas` (`id_cuestionario`, `id_pregunta`, `pregunta_texto`) VALUES
(1, 1, 'Según tu opinión personal ¿Te consideras bonito/a?'),
(1, 2, '¿Qué miembros de tu familia te protegen ante cualquier peligro?'),
(1, 3, '¿Qué miembro de tu familia consideras que te quiere más que los demás?'),
(1, 4, '¿Cuáles son las muestras de cariño con las que te trata esa persona de tu familia?'),
(1, 5, '¿Cómo te sientes con el comportamiento de esa persona?'),
(1, 6, '¿Quién es la persona de tu familia que menos te quiere?'),
(1, 7, '¿Tus compañeros te llaman por tu nombre o como te nombran cuando se refieren a vos?'),
(1, 8, '¿Cómo te sientes cuando te llaman así?'),
(1, 9, '¿Tus compañeros te quitan tus alimentos, te dan goles, te ofenden o te dicen que sos feo o que no sirves para nada?'),
(1, 10, '¿Cómo te sientes al ir a tu escuela?'),
(1, 11, '¿Cómo te gustaría que te trataran tus compañeros de clase?'),
(1, 12, '¿Con que frecuencia te hacen lo que refleja la pregunta número tres?'),
(1, 13, '¿Cómo es la relación con tus profesores?'),
(1, 14, '¿Hay algún maestro o maestra que no te agrada?'),
(1, 15, '¿Hay algún maestro que te dice palabras o frases que te hacen sentir avergonzado/a?'),
(1, 16, '¿Qué has hecho para disminuir tu intranquilidad ante ese comportamiento?'),
(1, 17, '¿Consideras que es correcto el comportamiento de tu maestro?');

INSERT INTO `posibles_respuestas` (`id_pregunta`, `respuesta_texto`) VALUES
(1, 'Si'),
(1, 'No'),
(2, 'Tu papá'),
(2, 'Tu mamá'),
(2, 'Tus hermanos mayores'),
(2, 'Ninguno'),
(3, 'Tu abuelito'),
(3, 'Tu tío'),
(3, 'Tu hermano'),
(3, 'Tu papá'),
(3, 'Tu primo mayor que vos '),
(4, 'Te abraza delante de todos los de casa'),
(4, 'Te abraza cuando están a solas'),
(4, 'Te besa cuando están a solas'),
(4, 'Te da regalos y te dice que te quiere'),
(4, 'Te hace cositas y te dice que son caricias porque te quiere mucho'),
(5, 'Con miedo'),
(5, 'Con mucho dolor'),
(5, 'Muy tranquilo/a'),
(5, 'Muy triste'),
(5, 'Con deseos de ya no seguir viviendo'),
(6, 'Tu abuelito'),
(6, 'Tu tío'),
(6, 'Tu hermano'),
(6, 'Tu papá'),
(6, 'Tu primo mayor que vos '),
(7, 'Un apodo'),
(7, 'Tu apellido'),
(7, 'Con el nombre de un animal'),
(7, 'Con una palabra soez'),
(8, 'Muy a gusto'),
(8, 'Apenado/a'),
(8, 'Con miedo'),
(8, 'Sin valor'),
(9, 'Si'),
(9, 'No'),
(9, 'Pocas veces'),
(10, 'Alegre'),
(10, 'Muy triste'),
(10, 'Desanimado'),
(10, 'No deseas ir'),
(11, 'Muy bien'),
(11, 'Con respeto'),
(11, 'Con cariño'),
(12, 'Tres veces a la semana'),
(12, 'Una vez a la semana'),
(12, 'Rara vez'),
(13, 'Bien'),
(13, 'Mal'),
(13, 'Muy bien'),
(13, 'Amigablemente'),
(14, 'Si'),
(14, 'No'),
(15, 'Si'),
(15, 'No'),
(16, 'Te escondes'),
(16, 'Lo conversas con tus compañeros'),
(16, 'Callas'),
(16, 'Haces lo que él te pide '),
(17, 'Si'),
(17, 'No');
