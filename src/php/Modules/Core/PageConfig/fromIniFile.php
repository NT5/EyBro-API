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
     * @param string $mail_server
     * @return \self
     */
    public static abstract function setMail_server(string $mail_server): self;

    /**
     * 
     * @param int $mail_port
     * @return \self
     */
    public static abstract function setMail_port(int $mail_port): self;

    /**
     * 
     * @param string $mail_user
     * @return \self
     */
    public static abstract function setMail_user(string $mail_user): self;

    /**
     * 
     * @param string $mail_password
     * @return \self
     */
    public static abstract function setMail_password(string $mail_password): self;

    /**
     * 
     * @param string $mail_name
     * @return \self
     */
    public static abstract function setMail_name(string $mail_name): self;

    /**
     * 
     * @param string $mail_send
     * @return \self
     */
    public static abstract function setMail_send(string $mail_send): self;

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
                "enable_debug",
                "mail.server",
                "mail.port",
                "mail.user",
                "mail.password",
                "mail.name",
                "mail.send",
                "telegram.api",
                "telegram.channel"
            ];

            if (Util\Functions::checkArray([$ini_area], $ini) && Util\Functions::checkArray($valid_structure, $ini[$ini_area])) {
                $data = $ini[$ini_area];
                $instance = new self();
                $instance
                        ->setEnableDebug($data['enable_debug'])
                        ->setPageDomain($data['page_domain'])
                        ->setFirstRun($data['first_run'])
                        ->setPageTitle($data['title'])
                        ->setMail_server($data['mail.server'])
                        ->setMail_port($data['mail.port'])
                        ->setMail_user($data['mail.user'])
                        ->setMail_password($data['mail.password'])
                        ->setMail_name($data['mail.name'])
                        ->setMail_send($data['mail.send'])
                        ->setTelegram_api($data['telegram.api'])
                        ->setTelegram_channel($data['telegram.channel']);

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
