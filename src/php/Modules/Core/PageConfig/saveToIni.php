<?php

namespace Bulk\Modules\Core\PageConfig;

use Bulk\Modules\Util;
use Bulk\Modules\Core\Logger;
use Bulk\Modules\Core\Warnings;
use Bulk\Modules\Core\Warning\WarningCodes;

trait saveToIni {

    /**
     * 
     * @return string
     */
    public static abstract function getIniArea(): string;

    /**
     * 
     * @return string
     */
    public static abstract function getPageTitle(): string;

    /**
     * 
     * @return bool
     */
    public static abstract function getFirstRun(): bool;

    /**
     * 
     * @return string
     */
    public static abstract function getPageDomain(): string;

    /**
     * 
     * @return boolean
     */
    public static abstract function getEnableDebug(): bool;

    /**
     * Guarda la configuración en un archivo .ini
     * @param string $ini Ruta del archivo .ini en el servidor
     * @return boolean
     */
    public static function saveToIni(string $ini = 'config.ini'): bool {
        Logger::setLog("Intentando guardar configuración en el archivo $ini...");
        $ini_area = self::getIniArea();
        $data = [
            "title" => self::getPageTitle(),
            "first_run" => (self::getFirstRun() ? "true" : "false"),
            "page_domain" => self::getPageDomain(),
            "enable_debug" => (self::getEnableDebug() ? "true" : "false")
        ];

        foreach ($data as $index => $value) {
            if (Util\Files::set_ini_file($ini, $ini_area, $index, $value)) {
                Logger::setLog("La variable %s fue guardada correctamente con el valor: %s", $index, $value);
                continue;
            } else {
                Logger::setLog("No se pudo guardar el archivo de configuración; operacion abortada");
                Warnings::addWarning(WarningCodes::CANT_SAVE_PAGE_CONFIG_FILE);
                return false;
            }
        }
        Logger::setLog("El archivo $ini fue guardado correctamente");
        return true;
    }

}
