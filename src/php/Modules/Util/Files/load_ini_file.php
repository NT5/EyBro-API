<?php

namespace Bulk\Modules\Util\Files;

trait load_ini_file {

    /**
     * Carga un fichero .ini para su posterior uso
     * @param string $file Ruta del archivo .ini en el servidor
     * @return array|FALSE Regresa un array asociativo si el fichero se carga correctamente o false en caso contrario
     */
    public static function load_ini_file($file) {
        $ini = @\parse_ini_file($file, true);
        return ($ini !== FALSE ? $ini : FALSE);
    }

}
