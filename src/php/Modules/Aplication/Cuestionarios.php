<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Aplication\Cuestionarios;

final class Cuestionarios extends BaseModule {

    use Cuestionarios\getCuestionarioById,
        Cuestionarios\getCuestionarioPreguntasId;
}
