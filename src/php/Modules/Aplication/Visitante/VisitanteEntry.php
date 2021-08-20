<?php

namespace Bulk\Modules\Aplication\Visitante;

final class VisitanteEntry {

    /**
     *
     * @var int
     */
    private $id_visitante = 0;

    /**
     *
     * @var string
     */
    private $uuid = "0";

    /**
     *
     * @var int
     */
    private $ip = 0;

    /**
     *
     * @var string
     */
    private $agent = "PHP";

    /**
     *
     * @var string
     */
    private $identificador = '{"bar": 1}';

    /**
     * 
     * @return int
     */
    public function getId_visitante(): int {
        return $this->id_visitante;
    }

    /**
     * 
     * @return string
     */
    public function getUuid(): string {
        return $this->uuid;
    }

    /**
     * 
     * @return int
     */
    public function getIp(): int {
        return $this->ip;
    }

    /**
     * 
     * @return string
     */
    public function getAgent(): string {
        return $this->agent;
    }

    /**
     * 
     * @return string
     */
    public function getIdentificador() {
        return $this->identificador;
    }

    /**
     * 
     * @return array
     */
    public function Json(): array {
        $structure = [
            "id_visitante" => $this->getId_visitante(),
            "uuid" => $this->getUuid(),
            "identificador" => $this->getIdentificador()
        ];
        return $structure;
    }

}
