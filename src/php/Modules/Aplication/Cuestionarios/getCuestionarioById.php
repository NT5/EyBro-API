<?php

namespace Bulk\Modules\Aplication\Cuestionarios;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Cuestionarios\CuestionarioEntry;

trait getCuestionarioById {

    /**
     * 
     * @param int $id_cuestionario
     * @return array
     */
    public static abstract function getCuestionarioPreguntasId(int $id_cuestionario): array;

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

        $cuestionario = $db->prepare_fetch_class(CuestionarioEntry::class, $sql, [
            "id_cuestionario" => $cuestionario_id
        ]);

        if ($cuestionario) {
            $id_preguntas = self::getCuestionarioPreguntasId($cuestionario_id);
            $cuestionario->setPreguntas_ids($id_preguntas);
            return $cuestionario;
        }
        return new CuestionarioEntry();
    }

}
