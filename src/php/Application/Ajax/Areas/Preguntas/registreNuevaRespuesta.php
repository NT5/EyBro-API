<?php

namespace Bulk\Application\Ajax\Areas\Preguntas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Preguntas;

final class registreNuevaRespuesta extends Area {

    /**
     *
     * @var int
     */
    private $id_visitante = 0;

    /**
     *
     * @var int 
     */
    private $cuestionario_id = 0;

    /**
     *
     * @var int 
     */
    private $id_pregunta = 0;

    /**
     *
     * @var int 
     */
    private $id_respuesta = 0;

    public function CheckPost() {
        $this->id_visitante = ($this->getPostInt('id_visitante') ?: 0);
        $this->cuestionario_id = ($this->getPostInt('cuestionario_id') ?: 0);
        $this->id_pregunta = ($this->getPostInt('id_pregunta') ?: 0);
        $this->id_respuesta = ($this->getPostInt('id_respuesta') ?: 0);
    }

    public function initVars() {
        $id_visitante = $this->id_visitante;
        $cuestionario_id = $this->cuestionario_id;
        $id_pregunta = $this->id_pregunta;
        $id_respuesta = $this->id_respuesta;

        $repuesta = Preguntas::registreNuevaRespuesta($id_visitante, $cuestionario_id, $id_pregunta, $id_respuesta);
        $this->setVars([
            'data' => $repuesta,
            'post' => $this->getPost()
        ]);
    }

    public function setUp() {
        
    }

}
