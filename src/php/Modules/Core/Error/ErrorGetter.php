<?php

namespace Bulk\Modules\Core\Error;

trait ErrorGetter {

    /**
     *
     * @var array
     */
    protected static $Errors = [];

    /**
     * 
     * @return array
     */
    public static function getErrors() {
        return self::$Errors;
    }

    /**
     * 
     * @param int $index
     * @return int|FALSE
     */
    public static function getError(int $index) {
        return (array_key_exists($index, self::getErrors()) ? self::getErrors()[$index] : FALSE);
    }

}
