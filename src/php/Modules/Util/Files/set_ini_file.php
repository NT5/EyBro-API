<?php

namespace Bulk\Modules\Util\Files;

trait set_ini_file {

    /**
     * Editar una sección de un fichero .ini
     * @param string $file Ruta del archivo .ini en el servidor
     * @param string $section Sección en el fichero .ini
     * @param string $key Parámetro a editar
     * @param string $value Valor del parámetro que se quiere asignar
     * @return boolean <b>TRUE</b> Si el fichero se guardo correctamente o
     * <b>FALSE</b> en caso contrario
     */
    public static function set_ini_file($file, $section, $key, $value) {
        $config_data = self::load_ini_file($file);
        if ($config_data !== FALSE) {
            $config_data[$section][$key] = $value;
            $new_content = '';
            foreach ($config_data as $section => $section_content) {
                $section_content = array_map(function($value, $key) {
                    return "$key=$value";
                }, array_values($section_content), array_keys($section_content));
                $section_content = implode("\n", $section_content);
                $new_content .= "[$section]\n$section_content\n";
            }
            $write = @file_put_contents($file, $new_content);
            return ( $write !== FALSE ? TRUE : FALSE );
        } else {
            return FALSE;
        }
    }

}
