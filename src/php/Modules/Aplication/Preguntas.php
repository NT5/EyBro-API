<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Aplication\Preguntas;

final class Preguntas extends BaseModule {

    use Preguntas\getPreguntasFromCuestionario,
        Preguntas\getPosbilesRespuestasFromPreguntaId,
        Preguntas\getPreguntaFromId;
}
