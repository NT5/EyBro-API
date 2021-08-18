<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Modules\Extended;
use Bulk\Application\Ajax\Area;

class Info extends Area {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

    public function CheckPost() {
        
    }

    public function initVars() {
        $db = $this->Extended()->Database();

        $query = $db->sql_query_result('SELECT NOW() AS DATE;');

        $this->setVars([
            'ajax.version' => '0.0.1b',
            'time.php' => date('Y-m-d h:i:s A', time()),
            'time.database' => $query[0]['DATE']
        ]);
    }

    public function setUp() {
        
    }

}
