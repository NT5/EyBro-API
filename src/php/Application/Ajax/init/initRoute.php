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
        
        $Cuestionarios = new AjaxRoute('cuestionarios', Areas\Cuestionarios::class);
        
        $Cuestionarios
                ->addRoute(new AjaxRoute('getCuestionarioById', Areas\Cuestionarios\getCuestionarioById::class));

        $Route
                ->addRoute(new AjaxRoute('invalid', Areas\Invalid::class))
                ->addRoute(new AjaxRoute('info', Areas\Info::class))
                ->addRoute($Cuestionarios);

        $this->Route = $Route->init();
    }

}
