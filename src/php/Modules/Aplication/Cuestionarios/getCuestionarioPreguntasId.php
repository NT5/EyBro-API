<?php

namespace Bulk\Modules\Aplication\Cuestionarios;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;

trait getCuestionarioPreguntasId {

    /**
     * 
     * @param int $id_cuestionario
     * @return array
     */
    public static function getCuestionarioPreguntasId(int $id_cuestionario): array {
        $db = Database::instance();

        $table_name = "preguntas";
        $where = "id_cuestionario = :id_cuestionario";

        $statement = QueryFactory::prepare_select(["id_pregunta"], $table_name, $where);

        $prepare = $db->prepare_fetch_all($statement, [
            "id_cuestionario" => $id_cuestionario
        ]);

        return ($prepare ?: []);
    }

}
