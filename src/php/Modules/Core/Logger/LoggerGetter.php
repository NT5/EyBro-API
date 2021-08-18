<?php

namespace Bulk\Modules\Core\Logger;

trait LoggerGetter {

    /**
     * Almacena todos los registros
     * @var \Bulk\Modules\Core\Logger\Log[] 
     */
    protected static $Logs = [];

    /**
     * Regresa un arreglo con todos los registros que posee la instancia
     * @return \Bulk\Modules\Core\Logger\Log[] Lista de registros
     */
    public static function getLogs() {
        return self::$Logs;
    }

    /**
     * Regresa los registros del área especificada
     * @param string $class Lugar donde se guarda el registro
     * @param int $index índice del log dentro del array
     * @return array|FALSE Arreglo con todos los registros del área especificada
     * o <b>FALSE</b> si el área no existe en los registros
     */
    public static function getLog($class, $index = NULL) {
        return (array_key_exists($class, self::getLogs()) ? ($index === NULL ? self::getLogs()[$class] : self::getLogs()[$class][$index] ) : FALSE);
    }

    /**
     * Regresa la cantidad de logs registrados en el arreglo.
     * @return int
     */
    public static function getLogCount() {
        return array_sum(array_map("count", self::getLogs()));
    }

}
