<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Aplication\Preguntas;
use Bulk\Modules\Core\Logger;

class Preguntas {

    use Preguntas\getPreguntasFromCuestionario;

    public function __construct() {
        Logger::setLog("Nueva instancia controladora de preguntas creada");
    }

}
