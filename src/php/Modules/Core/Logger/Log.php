<?php

namespace Bulk\Modules\Core\Logger;

/**
 * @todo Documentación
 */
class Log {

    /**
     *
     * @var string 
     */
    private $Class;

    /**
     *
     * @var string 
     */
    private $Function;

    /**
     *
     * @var string
     */
    private $File;

    /**
     *
     * @var int
     */
    private $Line;

    /**
     *
     * @var string 
     */
    private $Microtime;

    /**
     *
     * @var string 
     */
    private $Date;

    /**
     *
     * @var string 
     */
    private $Text;

    /**
     * 
     * @param string $Class
     * @param string $Function
     * @param string $File
     * @param int $Line
     * @param string $Microtime
     * @param string $Date
     * @param string $Text
     */
    public function __construct($Class = '', $Function = '', $File = '', $Line = 0, $Microtime = 0, $Date = 0, $Text = '') {
        $this->Class = $Class;
        $this->Function = $Function;
        $this->File = $File;
        $this->Line = $Line;
        $this->Microtime = $Microtime;
        $this->Date = $Date;
        $this->Text = $Text;
    }

    /**
     * 
     * @return string
     */
    public function getClass() {
        return $this->Class;
    }

    /**
     * 
     * @return string
     */
    public function getFunction() {
        return $this->Function;
    }

    /**
     * 
     * @return string
     */
    public function getMicrotime() {
        return $this->Microtime;
    }

    /**
     * 
     * @return string
     */
    public function getDate() {
        return $this->Date;
    }

    /**
     * 
     * @return string
     */
    public function getFile() {
        return $this->File;
    }

    /**
     * 
     * @return int
     */
    public function getLine() {
        return $this->Line;
    }

    /**
     * 
     * @return string
     */
    public function getText() {
        return $this->Text;
    }

}
