<?php

namespace Bulk\Application\Ajax\Areas\Cuestionarios;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Cuestionarios;

final class getCuestionarioById extends Area {

    /**
     *
     * @var int
     */
    private $cuestionario_id = 0;

    public function CheckPost() {
        $this->cuestionario_id = ($this->getPostInt('cuestionario_id') ?: 0);
    }

    public function initVars() {
        $cuestionario_id = $this->cuestionario_id;

        $cuestionario = Cuestionarios::getCuestionarioById($cuestionario_id);
        $this->setVars([
            'cuestionario' => $cuestionario->Json()
        ]);
    }

    public function setUp() {
        
    }

}
