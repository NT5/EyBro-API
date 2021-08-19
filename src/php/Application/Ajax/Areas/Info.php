<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Core\Database;

final class Info extends Area {

    public function CheckPost() {
        
    }

    public function initVars() {
        $db = Database::instance();
        $query = $db->prepare_fetch_result('SELECT NOW() AS DATE;');

        $this->setVars([
            'ajax.version' => '0.0.1b',
            'time.php' => date('Y-m-d h:i:s A', time()),
            'time.database' => $query->DATE
        ]);
    }

    public function setUp() {
        
    }

}
