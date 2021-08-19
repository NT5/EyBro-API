<?php

namespace Bulk\Modules\Aplication\Cuestionarios;

class CuestionarioEntry {

    /**
     *
     * @var int
     */
    private $id_cuestionario = 0;

    /**
     *
     * @var string
     */
    private $descripcion = "No definida";

    /**
     *
     * @var string
     */
    private $mensaje_bienvenida = "No definido";

    /**
     *
     * @var string
     */
    private $mensaje_despedida = "No definido";

    /**
     *
     * @var int
     */
    private $create_at = 0;

    /**
     *
     * @var array
     */
    private $preguntas_ids = [];

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
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    /**
     * 
     * @return string
     */
    public function getMensaje_bienvenida(): string {
        return $this->mensaje_bienvenida;
    }

    /**
     * 
     * @return string
     */
    public function getMensaje_despedida(): string {
        return $this->mensaje_despedida;
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
     * @return array
     */
    public function getPreguntas_ids(): array {
        return $this->preguntas_ids;
    }

    /**
     * 
     * @param array $preguntas_ids
     * @return $this
     */
    public function setPreguntas_ids(array $preguntas_ids) {
        $this->preguntas_ids = $preguntas_ids;
        return $this;
    }

    public function Json(): array {
        $structure = [
            'cuestionario_id' => $this->getId_cuestionario(),
            'descripcion' => $this->getDescripcion(),
            'preguntas' => $this->getPreguntas_ids(),
            'mensaje_bienvenida' => $this->getMensaje_bienvenida(),
            'mensaje_despedida' => $this->getMensaje_despedida()
        ];

        return $structure;
    }

}
