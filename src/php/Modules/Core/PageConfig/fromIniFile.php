<?php

namespace Bulk\Modules\Core\PageConfig;

use Bulk\Modules;
use Bulk\Modules\Util;
use Bulk\Modules\Core\Logger;
use Bulk\Modules\Core\Warnings;
use Bulk\Modules\Core\Warning\WarningCodes;

trait fromIniFile {

    /**
     * 
     * @return string
     */
    public static abstract function getIniArea(): string;

    /**
     * 
     * @param string $title
     * @return \self
     */
    public static abstract function setPageTitle(string $title): self;

    /**
     * 
     * @param bool $first_run
     * @return \self
     */
    public static abstract function setFirstRun(bool $first_run): self;

    /**
     * 
     * @param string $page_domain
     * @return \self
     */
    public static abstract function setPageDomain(string $page_domain): self;

    /**
     * 
     * @param bool $enable_debug
     * @return \self
     */
    public static abstract function setEnableDebug(bool $enable_debug): self;

    /**
     * Regresa instancia de configuración de la pagina web cargada desde un archivo .ini valido
     * @param Modules\Basics $Basics
     * @param string $inifile Ruta del archivo .ini en el servidor
     * @return PageConfig Regresa instancia de configuración creada
     */
    public static function fromIniFile($inifile = 'config.ini') {
        $ini = Util\Files::load_ini_file($inifile);

        if ($ini) {
            Logger::setLog("Comprobando estructura de $inifile...");

            $ini_area = self::getIniArea();
            $valid_structure = [
                "title",
                "first_run",
                "page_domain",
                "enable_debug"
            ];

            if (Util\Functions::checkArray([$ini_area], $ini) && Util\Functions::checkArray($valid_structure, $ini[$ini_area])) {
                $data = $ini[$ini_area];
                $instance = new self();
                $instance->setEnableDebug($data['enable_debug'])
                        ->setPageDomain($data['page_domain'])
                        ->setFirstRun($data['first_run'])
                        ->setPageTitle($data['title']);

                Logger::setLog("Instancia de configuración creada correctamente con $inifile");

                return $instance;
            } else {
                Logger::setLog("El archivo $inifile tiene una estructura invalida");
                Warnings::addWarning(WarningCodes::PAGE_CONFIGURATION_INVALID_FORMAT);
                Warnings::addWarning(WarningCodes::DEFAULT_PAGE_CONFIGURATION);
                self::init();
                return new self();
            }
        } else {
            Logger::setLog("El archivo $inifile no pudo ser cargado");
            Warnings::addWarning(WarningCodes::CANT_LOAD_PAGE_CONFIGURATION_FILE);
            Warnings::addWarning(WarningCodes::DEFAULT_PAGE_CONFIGURATION);

            self::init();
            return new self();
        }
    }

}
