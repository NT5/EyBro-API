<?php

namespace Bulk\Modules\Aplication\Visitante;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Visitante\VisitanteEntry;

trait getVisitanteFromId {

    /**
     * 
     * @param int $visitante_id
     * @return VisitanteEntry
     */
    public static function getVisitanteFromId(int $visitante_id): VisitanteEntry {
        $db = Database::instance();

        $statement = QueryFactory::prepare_select(
                        [
                            "id_visitante",
                            "uuid",
                            "ip",
                            "agent",
                            "identificador"
                        ],
                        "visitantes",
                        "id_visitante = :id_visitante"
        );

        $visitante = $db->prepare_fetch_class(VisitanteEntry::class, $statement, [
            "id_visitante" => $visitante_id
        ]);

        return ($visitante ?: new VisitanteEntry());
    }

}
