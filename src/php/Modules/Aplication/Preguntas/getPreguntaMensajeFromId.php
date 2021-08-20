<?php

namespace Bulk\Modules\Aplication\Preguntas;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;

trait getPreguntaMensajeFromId {

    /**
     * 
     * @param int $id_cuestionario
     * @param int $id_pregunta
     * @return string
     */
    public static function getPreguntaMensajeFromId(int $id_cuestionario, int $id_pregunta) {
        $db = Database::instance();

        $table_name = "mensajes_preguntas";
        $where = "id_cuestionario = :id_cuestionario AND id_pregunta = :id_pregunta";
        $statement = QueryFactory::prepare_select(
                        [
                            "mensaje"
                        ], $table_name, $where);

        $mensaje = $db->prepare_fetch_result($statement, [
            "id_cuestionario" => $id_cuestionario,
            "id_pregunta" => $id_pregunta
        ]);

        return ($mensaje ? $mensaje->mensaje : false);
    }

}
