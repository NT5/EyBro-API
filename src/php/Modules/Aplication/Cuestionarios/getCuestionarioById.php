<?php

namespace Bulk\Modules\Aplication\Cuestionarios;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Cuestionarios\CuestionarioEntry;

trait getCuestionarioById {

    /**
     * 
     * @param int $cuestionario_id
     * @return CuestionarioEntry
     */
    public static function getCuestionarioById(int $cuestionario_id): CuestionarioEntry {
        $db = Database::instance();

        $table_name = "cuestionarios";
        $where = "id_cuestionario = :id_cuestionario";
        $sql = QueryFactory::prepare_select(
                        [
                            "id_cuestionario",
                            "descripcion",
                            "mensaje_bienvenida",
                            "mensaje_despedida",
                            "create_at"
                        ],
                        $table_name, $where);

        $prepare = $db->prepare_fetch_class(CuestionarioEntry::class, $sql, [
            "id_cuestionario" => $cuestionario_id
        ]);

        return ($prepare ?: new CuestionarioEntry());
    }

}
