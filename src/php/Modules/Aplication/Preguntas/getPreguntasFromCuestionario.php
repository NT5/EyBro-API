<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Preguntas\PreguntaEntry;

trait getPreguntasFromCuestionario {

    /**
     * 
     * @param int $id_cuestionario
     * @return array
     */
    public static function getPreguntasFromCuestionario(int $id_cuestionario): array {
        $db = Database::instance();

        $table_name = "preguntas";
        $where = "id_cuestionario = :id_cuestionario";
        $statement = QueryFactory::prepare_select(
                        [
                            "id_pregunta",
                            "id_cuestionario",
                            "pregunta_texto",
                            "create_at"
                        ], $table_name, $where);

        $prepare = $db->prepare_fetch_all_class(PreguntaEntry::class, $statement, [
            "id_cuestionario" => $id_cuestionario
        ]);

        return ($prepare ?: []);
    }

}
