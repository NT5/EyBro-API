<?php

namespace Bulk\Modules\Core\Database\DatabaseConfig;

use Bulk\Modules\Util\Files;
use Bulk\Modules\Util\Functions;
use Bulk\Modules\Core\Logger;
use Bulk\Modules\Core\Warnings;
use Bulk\Modules\Core\Warning\WarningCodes;

trait fromIniFile {

    /**
     * 
     * @return string
     */
    protected abstract static function getInitArea(): string;

    /**
     * 
     * @param string $protocol
     * @return \self
     */
    public abstract static function setProtocol(string $protocol): self;

    /**
     * 
     * @param string $server
     * @return \self
     */
    public abstract static function setServer(string $server): self;

    /**
     * 
     * @param string $username
     * @return \self
     */
    public abstract static function setUserName(string $username): self;

    /**
     * 
     * @param string $password
     * @return \self
     */
    public abstract static function setPassword(string $password): self;

    /**
     * 
     * @param string $database
     * @return \self
     */
    public abstract static function setDatabase(string $database): self;

    /**
     * Regresa instancia de configuración de la base de datos cargada desde un archivo .ini valido
     * @param string $inifile Ruta del archivo .ini en el servidor
     * @return \self Regresa instancia de configuración creada
     */
    public static function fromIniFile(string $inifile = 'config.ini'): self {
        $ini = Files::load_ini_file($inifile);

        $ini_area = self::getInitArea();
        $valid_structure = [
            "protocol",
            "server",
            "username",
            "password",
            "database"
        ];

        Logger::setLog("Intentando crear configuración de base de datos con $inifile...");

        if ($ini) {
            Logger::setLog("Comprobando estructura de $inifile...");

            if (Functions::checkArray([$ini_area], $ini) && Functions::checkArray($valid_structure, $ini[$ini_area])) {
                $data = $ini[$ini_area];
                $instance = new self();
                $instance->setProtocol($data['protocol'])
                        ->setServer($data['server'])
                        ->setUserName($data['username'])
                        ->setPassword($data['password'])
                        ->setDatabase($data['database']);

                Logger::setLog("Instancia de configuración de base de datos creada correctamente con $inifile");

                return $instance;
            } else {
                Warnings::addWarning(WarningCodes::DATABASE_CONFIGURATION_INVALID_FORMAT);
                Logger::setLog("El archivo $inifile tiene una estructura invalida");
                self::init();
                return new self();
            }
        } else {
            Warnings::addWarning(WarningCodes::CANT_LOAD_DATABASE_CONFIGURATION_FILE);
            Logger::setLog("El archivo $inifile no pudo ser cargado");
            self::init();
            return new self();
        }
    }

}
