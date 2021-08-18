<?php

namespace Bulk\Modules\Core\Error;

/**
 * @todo Documentación
 * Clase con los errores validos
 */
final class ErrorCodes {

    /**
     * No se reconoce el error
     */
    const UNKNOWN = 0;

    /**
     * Imposible conectar la base de datos MySQL
     */
    const CANT_CONNECT_MYSQL_LINK = 1;

    /**
     * No se encontró el archivo de instalación de las tablas SQL
     */
    const INSTALLATION_TABLE_FILE_NOT_FOUND = 2;

}
