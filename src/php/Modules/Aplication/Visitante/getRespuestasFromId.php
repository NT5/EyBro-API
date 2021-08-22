<?php

namespace Bulk\Modules\Aplication\Visitante;

use Bulk\Modules\Core\Database;

trait getRespuestasFromId {

    /**
     * 
     * @param int $visitante_id
     */
    public static function getRespuestasFromId(int $visitante_id) {
        $db = Database::instance();

        $statement = "
            SELECT
                respuestas.*,
                preguntas.pregunta_texto
            FROM respuestas
            INNER JOIN preguntas ON preguntas.id_pregunta = respuestas.id_pregunta
            WHERE id_visitante = :id_visitante";

        $respuesta = $db->prepare_fetch_all($statement, [
            "id_visitante" => $visitante_id
        ]);

        return ($respuesta ?: []);
    }

}
