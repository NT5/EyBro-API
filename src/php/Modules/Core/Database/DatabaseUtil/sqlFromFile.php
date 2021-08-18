<?php

namespace Bulk\Modules\Core\Database\DatabaseUtil;

use Bulk\Modules\Util;

trait sqlFromFile {

    /**
     * Función que carga un archivo de sintaxis SQL
     * @param string $file Directorio del fichero SQL
     * @return array Arreglo con todos los comandos cargados o <b>NULL</b> si es
     * un fichero invalido
     */
    public static function sqlFromFile(string $file) {
        if (realpath($file)) {
            $result = array();
            $Fcommands = @file_get_contents($file);
            $sql_lines = explode("\n", $Fcommands);
            $commands = '';
            foreach ($sql_lines as $sql_line) {
                $line = trim($sql_line);
                if ($line && !Util\Functions::startsWith($sql_line, '--')) {
                    $commands .= $sql_line . "\n";
                }
            }
            $commands = explode(";", $commands);
            foreach ($commands as $command) {
                if (trim($command)) {
                    array_push($result, trim($command));
                }
            }
            return $result;
        } else {
            return NULL;
        }
    }

}
