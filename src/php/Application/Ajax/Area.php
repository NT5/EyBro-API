<?php

namespace Bulk\Application\Ajax;

use Bulk\Modules\Extended;
use Bulk\Modules\Extended\ExtendedExtended;
use Bulk\Modules\Util\Functions;

abstract class Area extends ExtendedExtended {

    /**
     *
     * @var array
     */
    private $Vars = [];

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);

        $this->prepareArea();
    }

    public abstract function setUp();

    public abstract function CheckPost();

    public abstract function initVars();

    public function prepareArea() {
        $this->setUp();
        if ($this->getPost()) {
            $this->CheckPost();
        }
        $this->initVars();
    }

    /**
     * 
     * @param string $var
     * @param int $filter_type filter_var
     * @return array|string
     */
    public function getPost(string $var = NULL, int $filter_type = FILTER_SANITIZE_STRING) {
        if (!$var) {
            $POST = filter_input_array(INPUT_POST);
            return ($POST ?: []);
        } else {
            return filter_input(INPUT_POST, $var, $filter_type);
        }
    }

    /**
     * 
     * @param string $var
     * @return int|null
     */
    public function getPostInt(string $var) {
        return $this->getPost($var, FILTER_VALIDATE_INT);
    }

    /**
     * 
     * @return array
     */
    public function getQuery(): array {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $url = parse_url($uri, PHP_URL_QUERY);
        parse_str($url, $query);

        return $query;
    }

    /**
     * 
     * @param string $name
     * @param string $value
     */
    public function setVar($name, $value) {
        Functions::set_array_value($this->Vars, $name, $value);
    }

    /**
     * 
     * @param array $vars
     */
    public function setVars(array $vars) {
        foreach ($vars as $k => $v) {
            $this->setVar($k, $v);
        }
    }

    /**
     * 
     * @return array
     */
    public function getVars() {
        return $this->Vars;
    }

    /**
     * 
     * @param string $name
     * @return array
     */
    public function getVar($name) {
        return Functions::get_array_value($this->Vars, $name);
    }

    /**
     * 
     * @return string
     */
    public function display() {
        return json_encode($this->Vars, JSON_PRETTY_PRINT);
    }

}
