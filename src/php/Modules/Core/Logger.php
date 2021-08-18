<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\Logger;

/**
 * Instancia que proporciona métodos para llevar un registro de ejecución
 */
final class Logger {

    use Logger\LoggerAdition,
        Logger\LoggerGetter;

    /**
     * Almacena todos los registros
     * @var Bulk\Modules\Core\Logger\Log[] 
     */
    protected static $Logs = [];

    /**
     * Profundidad de la clase en la que se registraran los eventos del Logger
     * @var int 
     */
    private static $LoggerTraceSteps = 3;

    /**
     * 
     * @param int $steps
     */
    public static function setLoggerTraceSteps(int $steps) {
        self::$LoggerTraceSteps = $steps;
    }

    /**
     * 
     * @return int
     */
    public static function getLoggerTraceStepts(): int {
        return self::$LoggerTraceSteps;
    }

    public static function reset() {
        self::$Logs = [];
    }

}
