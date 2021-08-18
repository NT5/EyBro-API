<?php

namespace Bulk\Application\Ajax;

use Bulk\Application\Ajax\Area;
use Bulk\Application\Ajax\Areas;
use Bulk\Modules\Core\Logger;

class AjaxRoute {

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
     */
    public function __construct(string $Url = 'p', string $AreaClass = Areas\Info::class) {
        $this->Url = $Url;
        $this->AreaClass = $AreaClass;
    }

    /**
     * 
     * @param \Bulk\Application\Ajax\AjaxRoute $Route
     * @return $this
     */
    public function addRoute(AjaxRoute $Route) {
        $this->Route[$Route->getUrl()] = $Route;
        Logger::setLog("Nuevo Route añadido URL: %s | AreaClass: %s", $Route->getUrl(), $Route->getAreaClass());
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
        Logger::setLog("[%s] Init Ajax-Route...", $this->getAreaClass());

        $url = filter_input($this->InputMethod, $this->getUrl());
        $Route = $this->getRoutes();

        if ($SubRoute && array_key_exists($url, $Route)) {
            $Route[$url]->init();
        } else {

            if (!self::getArea()) {
                Logger::setLog("No areaclass found, create new");
            } else {
                Logger::setLog("Areaclass found, overwrite...");
            }

            $AreaClass = $this->getAreaClass();
            self::$Area = new $AreaClass();

            Logger::setLog("Ajax-Route init! working area: %s", $this->getAreaClass());
        }

        return $this;
    }

}
