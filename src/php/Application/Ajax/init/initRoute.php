<?php

namespace Bulk\Application\Ajax\init;

use Bulk\Application\Ajax\AjaxRoute;
use Bulk\Modules\Extended;
use Bulk\Application\Ajax\Areas;

trait initRoute {

    /**
     * 
     * @return Extended
     */
    public abstract function getExtended();

    /**
     * 
     * @return AjaxRoute
     */
    public abstract function getRoute();

    private function initRoute() {
        $Route = new AjaxRoute('p', Areas\Invalid::class, $this->getExtended());
        $e = $Route->Extended();

        $Route
                ->addRoute(new AjaxRoute('invalid', Areas\Invalid::class, $e))
                ->addRoute(new AjaxRoute('info', Areas\Info::class, $e))
                ->addRoute(new AjaxRoute('userlist', Areas\UserList::class, $e));

        $this->Route = $Route->init();
    }

}
