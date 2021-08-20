<?php

namespace Bulk\Modules\Aplication\Visitante;

use Bulk\Modules\Core\Database;
use Bulk\Modules\Core\Database\QueryFactory;
use Bulk\Modules\Aplication\Visitante\VisitanteEntry;
use Bulk\Modules\Util\Functions;

trait registreVisitante {

    /**
     * 
     * @param int $visitante_id
     * @return VisitanteEntry
     */
    public static abstract function getVisitanteFromId(int $visitante_id): VisitanteEntry;

    /**
     * 
     * @param string $uuid
     * @param string $identificador
     * @return VisitanteEntry
     */
    public static function registreVisitante(string $uuid, string $identificador): VisitanteEntry {
        $db = Database::instance();

        $ip = Functions::getRealIpAddr();
        $agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT') ?: "PHP";

        $statement = QueryFactory::prepare_insert(
                        [
                            "uuid",
                            "ip",
                            "agent",
                            "identificador"
                        ],
                        "visitantes",
                        [
                            ':uuid',
                            'INET_ATON(:ip)',
                            ':agent',
                            ':identificador'
                        ]
        );

        $insert = $db->prepare_execute($statement,
                [
                    $uuid,
                    $ip,
                    $agent,
                    $identificador
                ]
        );

        if ($insert) {
            $visitante_id = $db->getLastId();
            return self::getVisitanteFromId($visitante_id);
        }
        return new VisitanteEntry();
    }

}
