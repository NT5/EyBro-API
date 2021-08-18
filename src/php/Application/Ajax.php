<?php

namespace Bulk\Application;

use Bulk\Application\Ajax;
use Bulk\Application\Web;
use Bulk\Modules\Basics;
use Bulk\Modules\Extended;
use Bulk\Application\Ajax\AjaxRoute;

class Ajax {

    /**
     *
     * @var AjaxRoute
     */
    private $Route;

    /**
     *
     * @var Basics
     */
    private $Basics;

    /**
     *
     * @var Extended
     */
    private $Extended;

    use Web\init\initBasics,
        Web\init\initExtended,
        Ajax\init\initRoute,
        Ajax\init\initDisplay,
        Web\dispose\disposeExtended;

    private $ExecutionTime = 0;

    /**
     * 
     * @return $this
     */
    public function ajax() {
        $this->ExecutionTime = microtime(true);
        $this->initBasics();
        $this->initExtended();
        $this->initRoute();
        $this->disposeExtended();
        $this->initDisplay();
        return $this;
    }

    /**
     * 
     * @return AjaxRoute
     */
    public function getRoute() {
        return $this->Route;
    }

    /**
     * 
     * @return Basics
     */
    public function getBasics() {
        return $this->Basics;
    }

    /**
     * 
     * @return Extended
     */
    public function getExtended() {
        return $this->Extended;
    }

}
