<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\Error\ErrorAdition;
use Bulk\Modules\Core\Error\ErrorGetter;
use Bulk\Modules\Core\Error\ErrorChecks;

/**
 * @todo Documentación
 */
final class Errors {

    /**
     *
     * @var array
     */
    protected static $Errors = [];

    use ErrorAdition,
        ErrorGetter,
        ErrorChecks;

    /**
     * 
     */
    public static function resetErrors() {
        self::$Errors = [];
    }

}
