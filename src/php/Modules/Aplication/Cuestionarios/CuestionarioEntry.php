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

    public function Json(): array {
        $structure = [
            'cuestionario_id' => $this->getId_cuestionario(),
            'descripcion' => $this->getDescripcion(),
            'mensaje_bienvenida' => $this->getMensaje_bienvenida(),
            'mensaje_despedida' => $this->getMensaje_despedida()
        ];
        
        return $structure;
    }

}
