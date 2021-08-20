<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Aplication\Preguntas\PosibleRespuestaEntry;

class PreguntaEntry {

    /**
     *
     * @var int
     */
    private $id_pregunta = 0;

    /**
     *
     * @var int
     */
    private $id_cuestionario = 0;

    /**
     *
     * @var string
     */
    private $pregunta_texto = "No definido";

    /**
     *
     * @var int
     */
    private $create_at = 0;

    /**
     *
     * @var PosibleRespuestaEntry[]
     */
    private $posibles_respuestas = [];

    /**
     *
     * @var string
     */
    private $mensaje = false;

    /**
     * 
     * @return int
     */
    public function getId_pregunta(): int {
        return $this->id_pregunta;
    }

    /**
     * 
     * @return int
     */
    public function getId_cuestionario(): int {
        return $this->id_cuestionario;
    }

    /**
     * 
     * @return string
     */
    public function getPregunta_texto(): string {
        return $this->pregunta_texto;
    }

    /**
     * 
     * @return int
     */
    public function getCreate_at(): int {
        return $this->create_at;
    }

    /**
     * 
     * @return PosibleRespuestaEntry[]
     */
    public function getPosibles_respuestas(): array {
        return $this->posibles_respuestas;
    }

    /**
     * 
     * @return string
     */
    public function getMensaje() {
        return $this->mensaje;
    }

    /**
     * 
     * @param array $posibles_respuestas
     * @return $this
     */
    public function setPosibles_respuestas(array $posibles_respuestas) {
        $this->posibles_respuestas = $posibles_respuestas;
        return $this;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
        return $this;
    }

    public function Json(): array {
        $structure = [
            "id_cuestionario" => $this->getId_cuestionario(),
            "id_pregunta" => $this->getId_pregunta(),
            "pregunta_texto" => $this->getId_cuestionario(),
            "pregunta_texto" => $this->getPregunta_texto(),
            "posibles_respuestas" => array_map(
                    function (PosibleRespuestaEntry $arr) {
                        return $arr->Json();
                    },
                    $this->getPosibles_respuestas()
            ),
            "mensaje" => $this->getMensaje()
        ];
        return $structure;
    }

}
