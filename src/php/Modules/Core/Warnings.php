<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\Warning\WarningAdition;
use Bulk\Modules\Core\Warning\WarningGetter;
use Bulk\Modules\Core\Warning\WarningChecks;

/**
 * @todo Documentación
 */
final class Warnings {

    /**
     *
     * @var array
     */
    protected static $Warnings = [];

    use WarningAdition,
        WarningGetter,
        WarningChecks;

    /**
     * 
     */
    public static function resetWarnings() {
        self::$Warnings = [];
    }

}
