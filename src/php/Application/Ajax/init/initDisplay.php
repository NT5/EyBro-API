<?php

namespace Bulk\Application\Ajax\init;

use Bulk\Application\Ajax\AjaxRoute;

trait initDisplay {

    /**
     * 
     * @return AjaxRoute
     */
    public abstract function getRoute();

    private function initDisplay() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');

        $Area = $this->getRoute()->getArea();

        if ($Area) {
            $Area->setVar('debug.execution', ( microtime(true) - $this->ExecutionTime));
            echo $Area->display();
        } else {
            echo "No areaclass found.";
        }
    }

}
