<?php

namespace Bulk\Modules\Core\Warning;

trait WarningChecks {

    /**
     * 
     * @return array
     */
    abstract static function getWarnings();

    /**
     * 
     * @param int $Warning
     * @return bool
     */
    public static function hasWarning(int $Warning) {
        return (in_array($Warning, self::getWarnings(), TRUE));
    }

}
