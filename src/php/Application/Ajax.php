<?php

namespace Bulk\Application;

use Bulk\Application\Ajax;
use Bulk\Application\Initialization;
use Bulk\Application\Finalization;
use Bulk\Application\Ajax\AjaxRoute;

class Ajax {

    /**
     *
     * @var AjaxRoute
     */
    private $Route;

    use Initialization\initDatabase,
        Finalization\disposeDatabase,
        Ajax\init\initRoute,
        Ajax\init\initDisplay;

    private $ExecutionTime = 0;

    /**
     * 
     * @return $this
     */
    public function ajax() {
        $this->ExecutionTime = microtime(true);
        $this->initDatabaseConfig();
        $this->initDatabaseInstance();
        $this->initRoute();
        $this->initDisplay();
        $this->disconnectDatabase();
        return $this;
    }

    /**
     * 
     * @return AjaxRoute
     */
    public function getRoute() {
        return $this->Route;
    }

}
