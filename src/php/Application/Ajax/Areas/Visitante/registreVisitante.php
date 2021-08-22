<?php

namespace Bulk\Application\Ajax\Areas\Visitante;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Visitante;
use Bulk\Modules\Aplication\Telegram;

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

        if ($visitante->getId_visitante() !== 0) {
            $meta = json_decode($identificador);
            $message = [];

            $message[] = "Un nuevo visitante esta contestando el cuestionario";
            $message[] = "Visitante: {$visitante->getUuid()}";
            $message[] = "Nombre: {$meta->usuario}";
            $message[] = "Edad: {$meta->edad}";
            $message[] = "Tutor/Maestro: {$meta->tutor}";
            $message[] = "Grado: {$meta->grado_cursado}";
            $message[] = "Centro de estudios: {$meta->centro_estudio}";
            $message[] = "Departamento: {$meta->departamento}";

            Telegram::send(join(PHP_EOL, $message));
        }

        $this->setVars([
            'visitante' => $visitante->Json(),
            'post' => $this->getPost()
        ]);
    }

    public function setUp() {
        
    }

}
