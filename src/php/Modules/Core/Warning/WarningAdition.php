<?php

namespace Bulk\Modules\Core\Warning;

trait WarningAdition {

    /**
     *
     * @var array
     */
    protected static $Warnings = [];

    /**
     * 
     * @param int $Warning
     * @throws \Exception
     */
    public static function addWarning(int $Warning) {
        self::$Warnings[] = $Warning;
    }

}
