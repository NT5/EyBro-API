<?php

namespace Bulk\Modules\Core\Logger;

trait LoggerAdition {

    /**
     * Almacena todos los registros
     * @var \Bulk\Modules\Core\Logger\Log[] 
     */
    protected static $Logs = [];
    protected static $Enable = true;

    /**
     * 
     * @return int
     */
    abstract static function getLoggerTraceStepts();

    /**
     * 
     * @param string $key
     * @param array $array
     * @param string $default
     * @return mixed
     */
    protected static function check_array($key, $array, $default) {
        return array_key_exists($key, $array) ? $array[$key] : $default;
    }

    /**
     * 
     * @param bool $Enable
     */
    public static function setEnable(bool $Enable = true) {
        self::$Enable = $Enable;
    }

    /** Método que guarda un nuevo registro en la instancia
     * @param string $string Texto que se guarda (puede incluir formato) <b>Ejm.: Hola %s!</b>
     * @param string $format Lista de valores que se usaran si el texto posee un formato
     */
    public static function setLog($string, ...$format) {
        if (self::$Enable) {
            $trace_arr = debug_backtrace(FALSE, self::getLoggerTraceStepts());
            $trace = end($trace_arr);

            $class_name = self::check_array('class', $trace, "Unknown");
            $class_function = self::check_array('function', $trace, "foo");
            $class_file = self::check_array('file', $trace, "default.php");
            $class_line = self::check_array('line', $trace, 0);

            self::$Logs[$class_name][] = new Log(
                    $class_name, $class_function, $class_file, $class_line, microtime(true), date('m/d/Y h:i:sa', time()), sprintf($string, ...$format)
            );
        }
    }

}
