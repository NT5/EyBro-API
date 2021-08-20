<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;

trait registreNuevaRespuesta {

    /**
     * 
     * @param int $id_visitante
     * @param int $id_cuestionario
     * @param int $id_pregunta
     * @param int $id_respuesta
     * @return bool
     */
    public static function registreNuevaRespuesta(int $id_visitante, int $id_cuestionario, int $id_pregunta, int $id_respuesta): bool {
        $db = Database::instance();

        $statement = QueryFactory::prepare_insert(
                        [
                            "id_visitante",
                            "id_cuestionario",
                            "id_pregunta",
                            "id_respuesta_enviada"
                        ],
                        "respuestas"
        );

        $respuesta = $db->prepare_execute($statement, [
            $id_visitante,
            $id_cuestionario,
            $id_pregunta,
            $id_respuesta
        ]);

        return ($respuesta ? true : false);
    }

}
