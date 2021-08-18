<?php

namespace Bulk\Modules\Core\Warning;

/**
 * Lista de las advertencias lanzadas por la pagina
 */
abstract class WarningCodes {

    /**
     * @todo Advertencia desconocida
     */
    const UNKNOWN = 0;

    /**
     * No se pudo cargar el archivo .ini con la configuración de la pagina
     */
    const CANT_LOAD_PAGE_CONFIGURATION_FILE = 1;

    /**
     * No se pudo guardar el archivo .ini con la configuración de la pagina
     */
    const CANT_SAVE_PAGE_CONFIG_FILE = 2;

    /**
     * El archivo .ini tiene un formato invalido y no pudo ser cargado
     */
    const PAGE_CONFIGURATION_INVALID_FORMAT = 3;

    /**
     * Se cargo la configuración por defecto de la pagina.
     */
    const DEFAULT_PAGE_CONFIGURATION = 4;

    /**
     * El archivo .ini de configuración MySQL no tiene un formato valido
     */
    const DATABASE_CONFIGURATION_INVALID_FORMAT = 5;

    /**
     * No se pudo cargar el archivo .ini de configuración de la base de datos
     */
    const CANT_LOAD_DATABASE_CONFIGURATION_FILE = 6;

    /**
     * No se pudieron inicializar o encontrar las tablas MySQL de la pagina
     */
    const NO_TABLES_INSTALLATION = 7;

    /**
     * No se pudo ejecutar el comando de instalcion de la pagina
     */
    const CANT_EXECUTE_INSTALLATION_TABLE_COMMAND = 8;

}
