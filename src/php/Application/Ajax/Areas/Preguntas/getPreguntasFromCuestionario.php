<?php

namespace Bulk\Application\Ajax\Areas\Preguntas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Preguntas;
use Bulk\Modules\Aplication\Preguntas\PreguntaEntry;

class getPreguntasFromCuestionario extends Area {

    /**
     *
     * @var type 
     */
    private $cuestionario_id = 0;

    public function CheckPost() {
        $this->cuestionario_id = ($this->getPostInt('cuestionario_id') ?: 0);
    }

    public function initVars() {
        $cuestionario_id = $this->cuestionario_id;

        $preguntas = Preguntas::getPreguntasFromCuestionario($cuestionario_id);
        $this->setVars([
            'data' => array_map(
                    function (PreguntaEntry $arr) {
                        return $arr->Json();
                    }, $preguntas)
        ]);
    }

    public function setUp() {
        
    }

}
