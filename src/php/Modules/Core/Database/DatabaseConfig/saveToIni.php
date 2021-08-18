<?php

namespace Bulk\Modules\Core\Database\DatabaseConfig;

use Bulk\Modules\Util\Files;
use Bulk\Modules\Core\Logger;

trait saveToIni {

    /**
     * 
     * @return string
     */
    protected abstract static function getInitArea(): string;

    /**
     * 
     * @return string
     */
    public abstract static function getProtocol(): string;

    /**
     * 
     * @return string
     */
    public abstract static function getServer(): string;

    /**
     * 
     * @return string
     */
    public abstract static function getUserName(): string;

    /**
     * 
     * @return string
     */
    public abstract static function getPassword(): string;

    /**
     * 
     * @return string
     */
    public abstract static function getDatabase(): string;

    /**
     * Guarda la configuración en un archivo .ini
     * @param string $inifile Ruta del archivo .ini en el servidor
     * @return boolean
     */
    public static function saveToIni(string $inifile = 'config.ini') {
        Logger::setLog("Intentando guardar configuración en el archivo $inifile...");

        $ini_area = self::getInitArea();
        $data = [
            "protocol" => self::getProtocol(),
            "server" => self::getServer(),
            "username" => self::getUserName(),
            "password" => self::getPassword(),
            "database" => self::getDatabase()
        ];

        foreach ($data as $index => $value) {
            if (Files::set_ini_file($inifile, $ini_area, $index, $value)) {
                Logger::setLog("La variable %s fue guardada correctamente", $index);
                continue;
            } else {
                Logger::setLog("No se pudo guardar el archivo de configuración; operacion abortada");
                return FALSE;
            }
        }
        Logger::setLog("El archivo $inifile fue guardado correctamente");
        return TRUE;
    }

}
