<?php

namespace Bulk\Application\Ajax;

use Bulk\Modules\Extended;
use Bulk\Modules\Extended\ExtendedExtended;
use Bulk\Application\Ajax\Area;
use Bulk\Application\Ajax\Areas;

class AjaxRoute extends ExtendedExtended {

    /**
     *
     * @var Area
     */
    private static $Area;

    /**
     *
     * @var string
     */
    private $Url;

    /**
     *
     * @var string
     */
    private $AreaClass;

    /**
     *
     * @var array
     */
    private $Route = [];

    /**
     *
     * @var int
     */
    private $InputMethod = INPUT_GET;

    /**
     * 
     * @param string $Url
     * @param string $AreaClass
     * @param Extended $Extended
     */
    public function __construct($Url = 'p', $AreaClass = Areas\Info::class, Extended $Extended = NULL) {
        parent::__construct($Extended);

        $this->Url = $Url;
        $this->AreaClass = $AreaClass;
    }

    /**
     * 
     * @param \Bulk\Application\Ajax\AjaxRoute $Route
     * @return $this
     */
    public function addRoute(AjaxRoute $Route) {
        $b = $this->Extended()->Basics();

        $this->Route[$Route->getUrl()] = $Route;
        $b->setLog("Nuevo Route añadido URL: %s | AreaClass: %s", $Route->getUrl(), $Route->getAreaClass());
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getUrl(): string {
        return $this->Url;
    }

    /**
     * 
     * @return string
     */
    public function getAreaClass(): string {
        return $this->AreaClass;
    }

    /**
     * 
     * @return array
     */
    public function getRoutes(): array {
        return $this->Route;
    }

    /**
     * 
     * @param string $name
     * @return AjaxRoute
     */
    public function getRoute(string $name) {
        return (array_key_exists($name, $this->getRoutes()) ? $this->getRoutes()[$name] : NULL);
    }

    /**
     * 
     * @return Area
     */
    public static function getArea() {
        return self::$Area;
    }

    /**
     * 
     * @param boolean $SubRoute
     * @return $this
     */
    public function init($SubRoute = TRUE) {
        $b = $this->Extended()->Basics();
        $b->setLog("[%s] Init Ajax-Route...", $this->getAreaClass());

        $url = filter_input($this->InputMethod, $this->getUrl());
        $Route = $this->getRoutes();

        if ($SubRoute && array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {

            if (!self::getArea()) {
                $b->setLog("No areaclass found, create new");
            } else {
                $b->setLog("Areaclass found, overwrite...");
            }

            $AreaClass = $this->getAreaClass();
            self::$Area = new $AreaClass($this->Extended());

            $b->setLog("Ajax-Route init! working area: %s", $this->getAreaClass());
        }

        return $this;
    }

}
