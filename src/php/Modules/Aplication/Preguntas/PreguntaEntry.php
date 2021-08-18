<?php

namespace Bulk\Modules\Aplication\Preguntas;

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

    public function Json(): array {
        $structure = [
            "id_cuestionario" => $this->getId_cuestionario(),
            "id_pregunta" => $this->getId_pregunta(),
            "pregunta_texto" => $this->getId_cuestionario(),
            "pregunta_texto" => $this->getPregunta_texto()
        ];
        return $structure;
    }

}
