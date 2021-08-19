<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Preguntas\PosibleRespuestaEntry;

trait getPosbilesRespuestasFromPreguntaId {

    /**
     * 
     * @param int $pregunta_id
     * @return PosibleRespuestaEntry[]
     */
    public static function getPosbilesRespuestasFromPreguntaId(int $pregunta_id): array {
        $db = Database::instance();

        $table_name = "posibles_respuestas";
        $where = "id_pregunta = :id_pregunta";
        $statement = QueryFactory::prepare_select(
                        [
                            "id_respuesta",
                            "id_pregunta",
                            "respuesta_texto",
                            "create_at"
                        ], $table_name, $where);
        $prepare = $db->prepare_fetch_all_class(PosibleRespuestaEntry::class, $statement, [
            "id_pregunta" => $pregunta_id
        ]);
        return ($prepare ?: []);
    }

}
