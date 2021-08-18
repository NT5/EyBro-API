<?php

namespace Bulk\Application\Ajax\Areas\Cuestionarios;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Cuestionarios;

class getCuestionarioById extends Area {

    /**
     *
     * @var int
     */
    private $cuestionario_id = 0;

    /**
     *
     * @var Cuestionarios
     */
    private $Control;

    public function CheckPost() {
        $this->cuestionario_id = ($this->getPostInt('cuestionario_id') ?: 0);
    }

    public function initVars() {
        $cuestionario_id = $this->cuestionario_id;
        $control = $this->Control;

        $cuestionario = $control->getCuestionarioById($cuestionario_id);
        $this->setVars([
            'data' => $cuestionario->Json()
        ]);
    }

    public function setUp() {
        $this->Control = new Cuestionarios();
    }

}
