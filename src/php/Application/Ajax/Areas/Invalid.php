<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Core\Logger;

class Invalid extends Area {

    public function initVars() {
        $this->setVars([
            'error.code' => 404,
            'error.message' => 'No valid API endpoint'
        ]);
    }

    public function CheckPost() {
        
    }

    public function setUp() {
        
    }

}
