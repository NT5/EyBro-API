<?php

namespace Bulk\Modules\Core\Warning;

trait WarningGetter {

    /**
     *
     * @var array
     */
    protected static $Warnings = [];

    /**
     * 
     * @return array
     */
    public static function getWarnings() {
        return self::$Warnings;
    }

    /**
     * 
     * @param int $index
     * @return int|FALSE
     */
    public static function getWarning(int $index) {
        return (array_key_exists($index, self::getWarnings()) ? self::getWarnings()[$index] : FALSE);
    }

}
