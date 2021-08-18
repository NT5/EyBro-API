<?php

namespace Bulk\Modules\Core\Error;

trait ErrorChecks {

    /**
     * 
     * @return array
     */
    abstract static function getErrors();

    /**
     * 
     * @param int $Error
     * @return bool
     */
    public static function hasError(int $Error) {
        return (in_array($Error, self::getErrors(), TRUE));
    }

}
