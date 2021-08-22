<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;

final class PosiblesRespuestas extends BaseModule {

    public static function getPosibleRespuestaFromId(int $posible_respuesta_id) {
        $db = Database::instance();

        $where = "id_respuesta = :id_respuesta";
        $sql = QueryFactory::prepare_select(
                        [
                            "respuesta_texto"
                        ],
                        'posibles_respuestas', $where
        );

        $query = $db->prepare_fetch_result($sql, [
            'id_respuesta' => $posible_respuesta_id
        ]);

        return ($query ?: null);
    }

}
