<?php

namespace Bulk\Modules\Core\Error;

trait ErrorAdition {

    /**
     *
     * @var array
     */
    protected static $Errors = [];

    /**
     * 
     * @param int $Error
     * @throws \Exception
     */
    public static function addError(int $Error) {
        self::$Errors[] = $Error;
    }

}
