<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Aplication\Cuestionarios;
use Bulk\Modules\Core\Logger;

class Cuestionarios {

    use Cuestionarios\getCuestionarioById;

    public function __construct() {
        Logger::setLog("Nuevo controlador de cuestionarios creado");
    }

}
