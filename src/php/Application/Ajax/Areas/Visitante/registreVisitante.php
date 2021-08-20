<?php

namespace Bulk\Application\Ajax\Areas\Visitante;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Visitante;

final class registreVisitante extends Area {

    /**
     *
     * @var string 
     */
    private $uuid = "0";

    /**
     *
     * @var string
     */
    private $identificador = "0";

    public function CheckPost() {
        $this->uuid = ($this->getPost('uuid') ?: "0");
        $this->identificador = ($this->getPost('identificador', FILTER_UNSAFE_RAW) ?: '{"key1": "value1", "key2": "value2"}');
    }

    public function initVars() {
        $uuid = $this->uuid;
        $identificador = $this->identificador;

        $visitante = Visitante::registreVisitante($uuid, $identificador);
        $this->setVars([
            'visitante' => $visitante->Json(),
            'post' => $this->getPost()
        ]);
    }

    public function setUp() {
        
    }

}
