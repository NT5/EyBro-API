<?php

namespace Bulk\Application\Ajax\Areas\Preguntas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Preguntas;

final class getPreguntaFromId extends Area {

    /**
     *
     * @var int 
     */
    private $cuestionario_id = 0;

    /**
     *
     * @var int
     */
    private $pregunta_id = 0;

    public function CheckPost() {
        $this->cuestionario_id = ($this->getPostInt('cuestionario_id') ?: 0);
        $this->pregunta_id = ($this->getPostInt('pregunta_id') ?: 0);
    }

    public function initVars() {
        $cuestionario_id = $this->cuestionario_id;
        $pregunta_id = $this->pregunta_id;

        $pregunta = Preguntas::getPreguntaFromId($cuestionario_id, $pregunta_id);
        $this->setVars([
            'pregunta' => $pregunta->Json()
        ]);
    }

    public function setUp() {
        
    }

}
