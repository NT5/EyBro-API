<?php

namespace Bulk\Modules\Aplication\Preguntas;

class PosibleRespuestaEntry {

    /**
     *
     * @var int
     */
    private $id_respuesta = 0;

    /**
     *
     * @var int
     */
    private $id_pregunta = 0;

    /**
     *
     * @var string
     */
    private $respuesta_texto = "No definido";

    /**
     *
     * @var int
     */
    private $create_at = 0;

    /**
     * 
     * @return int
     */
    public function getId_respuesta(): int {
        return $this->id_respuesta;
    }

    /**
     * 
     * @return int
     */
    public function getId_pregunta(): int {
        return $this->id_pregunta;
    }

    /**
     * 
     * @return string
     */
    public function getRespuesta_texto(): string {
        return $this->respuesta_texto;
    }

    /**
     * 
     * @return int
     */
    public function getCreate_at(): int {
        return $this->create_at;
    }

    public function Json(): array {
        $structure = [
            'id_pregunta' => $this->getId_pregunta(),
            'id_respuesta' => $this->getId_respuesta(),
            'respuesta_texto' => $this->getRespuesta_texto()
        ];
        return $structure;
    }

}
