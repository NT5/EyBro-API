<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Preguntas\PreguntaEntry;
use Bulk\Modules\Aplication\Preguntas\PosibleRespuestaEntry;

trait getPreguntaFromId {

    /**
     * 
     * @param int $pregunta_id
     * @return PosibleRespuestaEntry[]
     */
    public static abstract function getPosbilesRespuestasFromPreguntaId(int $pregunta_id): array;

    /**
     * 
     * @param int $id_cuestionario
     * @param int $id_pregunta
     * @return PreguntaEntry
     */
    public static function getPreguntaFromId(int $id_cuestionario, int $id_pregunta): PreguntaEntry {
        $db = Database::instance();

        $table_name = "preguntas";
        $where = "id_cuestionario = :id_cuestionario AND id_pregunta = :id_pregunta";
        $statement = QueryFactory::prepare_select(
                        [
                            "id_pregunta",
                            "id_cuestionario",
                            "pregunta_texto",
                            "create_at"
                        ], $table_name, $where);

        $pregunta = $db->prepare_fetch_class(PreguntaEntry::class, $statement, [
            "id_cuestionario" => $id_cuestionario,
            "id_pregunta" => $id_pregunta
        ]);

        if ($pregunta) {
            $respuestas_validas = self::getPosbilesRespuestasFromPreguntaId($id_pregunta);
            $pregunta->setPosibles_respuestas($respuestas_validas);

            return $pregunta;
        }
        return new PreguntaEntry();
    }

}
