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

        $Preguntas = new AjaxRoute('preguntas', Areas\Preguntas::class);

        $Preguntas
                ->addRoute(new AjaxRoute('getPreguntasFromCuestionario', Areas\Preguntas\getPreguntasFromCuestionario::class))
                ->addRoute(new AjaxRoute('getPreguntaFromId', Areas\Preguntas\getPreguntaFromId::class))
                ->addRoute(new AjaxRoute('registreNuevaRespuesta', Areas\Preguntas\registreNuevaRespuesta::class));

        $Visitante = new AjaxRoute('visitante', Areas\Visitante::class);

        $Visitante
                ->addRoute(new AjaxRoute('registreVisitante', Areas\Visitante\registreVisitante::class));

        $Route
                ->addRoute(new AjaxRoute('invalid', Areas\Invalid::class))
                ->addRoute(new AjaxRoute('info', Areas\Info::class))
                ->addRoute(new AjaxRoute('SendEmail', Areas\SendEmail::class))
                ->addRoute(new AjaxRoute('SendTelegram', Areas\SendTelegram::class))
                ->addRoute($Cuestionarios)
                ->addRoute($Preguntas)
                ->addRoute($Visitante);

        $this->Route = $Route->init();
    }

}
