<?php

namespace Bulk\Application\Ajax\init;

use Bulk\Application\Ajax\AjaxRoute;
use Bulk\Application\Ajax\Areas;

trait initRoute {


    /**
     * 
     * @return AjaxRoute
     */
    public abstract function getRoute();

    private function initRoute() {
        $Route = new AjaxRoute('p', Areas\Invalid::class);

        $Route
                ->addRoute(new AjaxRoute('invalid', Areas\Invalid::class))
                ->addRoute(new AjaxRoute('info', Areas\Info::class));

        $this->Route = $Route->init();
    }

}
