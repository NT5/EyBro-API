<?php

namespace Bulk\Modules\Util;

use Bulk\Modules\Util\Functions;

/**
 * Instancia contenedora de métodos útiles para el correcto funcionamiento del
 * programa
 */
class Functions {

    use Functions\startsWith,
        Functions\strFormat,
        Functions\parseDir,
        Functions\set_array_value,
        Functions\get_array_value,
        Functions\checkArray,
        Functions\integerToRoman,
        Functions\number_format,
        Functions\redirect,
        Functions\getRealIpAddr,
        Functions\mis_null,
        Functions\is_base64_encoded,
        Functions\array_orderby;
}
