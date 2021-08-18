<?php

namespace Bulk\Modules\Util\Functions;

trait strFormat {

    /**
     * Regresa una cadena de texto con el formato especificado
     * @param string $str Texto que será formateado
     * @param array $vars Arraglo con variablse usadas en el formateo
     * @param char $char Caracter de inicio que sera analizado (Por defecto '%')
     * @return string
     */
    public static function strFormat($str = '', $vars = array(), $char = '%') {
        if (!$str) {
            return '';
        }
        if (count($vars) > 0) {
            foreach ($vars as $k => $v) {
                $str = str_replace($char . $k, $v, $str);
            }
        }
        return $str;
    }

}
