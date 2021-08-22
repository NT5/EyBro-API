<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\PageConfig;

/**
 * @todo Documentar
 * Clase que contiene métodos y variables de configuración de la pagina
 */
final class PageConfig {

    use PageConfig\saveToIni,
        PageConfig\fromIniFile;

    /**
     *
     * @var string
     */
    private static $ini_area = "Bulk";

    /**
     * @var string Cadena de texto con el titulo de la pagina
     */
    private static $page_title = 'Default';

    /**
     * @var bool Variable que comprueba el estado de la instalación
     */
    private static $first_run = true;

    /**
     *
     * @var string 
     */
    private static $page_domain = "http://localhost/";

    /**
     *
     * @var bool 
     */
    private static $enable_debug = true;

    /**
     *
     * @var string 
     */
    private static $mail_server = 'website.com';

    /**
     *
     * @var int 
     */
    private static $mail_port = 25;

    /**
     *
     * @var string 
     */
    private static $mail_user = 'example@website.com';

    /**
     *
     * @var string 
     */
    private static $mail_password = 'password';

    /**
     *
     * @var string 
     */
    private static $mail_name = 'bulk';

    /**
     *
     * @var string 
     */
    private static $mail_send = 'example@website.com';

    /**
     *
     * @var string
     */
    private static $telegram_api = 0;

    /**
     *
     * @var string
     */
    private static $telegram_channel = 0;

    /**
     *
     * @var string 
     */

    /**
     * Regresa instancia de configuración de la pagina web
     * @return \self
     */
    public static function init(): self {
        self::$page_domain = "http://localhost/";
        self::$page_title = "Default";
        self::$enable_debug = true;
        self::$first_run = true;

        Logger::setLog("Nueva instancia de configuración de pagina creada");
        return new static();
    }

    /**
     * 
     * @return \self
     */
    public static function instance(): self {
        return new static();
    }

    /**
     * 
     * @return string
     */
    public static function getIniArea(): string {
        return self::$ini_area;
    }

    /**
     * 
     * @return string
     */
    public static function getPageTitle(): string {
        return self::$page_title;
    }

    /**
     * 
     * @return bool
     */
    public static function getFirstRun(): bool {
        return self::$first_run;
    }

    /**
     * 
     * @return string
     */
    public static function getPageDomain(): string {
        return self::$page_domain;
    }

    /**
     * 
     * @return boolean
     */
    public static function getEnableDebug(): bool {
        return self::$enable_debug;
    }

    /**
     * 
     * @return string
     */
    public static function getMail_server(): string {
        return self::$mail_server;
    }

    /**
     * 
     * @return int
     */
    public static function getMail_port(): int {
        return self::$mail_port;
    }

    /**
     * 
     * @return string
     */
    public static function getMail_user(): string {
        return self::$mail_user;
    }

    /**
     * 
     * @return string
     */
    public static function getMail_password(): string {
        return self::$mail_password;
    }

    /**
     * 
     * @return string
     */
    public static function getMail_name(): string {
        return self::$mail_name;
    }

    /**
     * 
     * @return string
     */
    public static function getMail_send(): string {
        return self::$mail_send;
    }

    /**
     * 
     * @return string
     */
    public static function getTelegram_api(): string {
        return self::$telegram_api;
    }

    /**
     * 
     * @return string
     */
    public static function getTelegram_channel(): string {
        return self::$telegram_channel;
    }

    /**
     * 
     * @param string $title
     * @return \self
     */
    public static function setPageTitle(string $title): self {
        self::$page_title = $title;
        return new static();
    }

    /**
     * 
     * @param bool $first_run
     * @return \self
     */
    public static function setFirstRun(bool $first_run): self {
        self::$first_run = $first_run;
        return new static();
    }

    /**
     * 
     * @param string $page_domain
     * @return \self
     */
    public static function setPageDomain(string $page_domain): self {
        self::$page_domain = $page_domain;
        return new static();
    }

    /**
     * 
     * @param bool $enable_debug
     * @return \self
     */
    public static function setEnableDebug(bool $enable_debug): self {
        self::$enable_debug = $enable_debug;
        return new static();
    }

    /**
     * 
     * @param string $mail_server
     * @return \self
     */
    public static function setMail_server(string $mail_server): self {
        self::$mail_server = $mail_server;
        return new static();
    }

    /**
     * 
     * @param int $mail_port
     * @return \self
     */
    public static function setMail_port(int $mail_port): self {
        self::$mail_port = $mail_port;
        return new static();
    }

    /**
     * 
     * @param string $mail_user
     * @return \self
     */
    public static function setMail_user(string $mail_user): self {
        self::$mail_user = $mail_user;
        return new static();
    }

    /**
     * 
     * @param string $mail_password
     * @return \self
     */
    public static function setMail_password(string $mail_password): self {
        self::$mail_password = $mail_password;
        return new static();
    }

    /**
     * 
     * @param string $mail_name
     * @return \self
     */
    public static function setMail_name(string $mail_name): self {
        self::$mail_name = $mail_name;
        return new static();
    }

    /**
     * 
     * @param string $mail_send
     * @return \self
     */
    public static function setMail_send(string $mail_send): self {
        self::$mail_send = $mail_send;
        return new static();
    }

    /**
     * 
     * @param string $telegram_api
     * @return \self
     */
    public static function setTelegram_api(string $telegram_api): self {
        self::$telegram_api = $telegram_api;
        return new static();
    }

    /**
     * 
     * @param string $telegram_channel
     * @return \self
     */
    public static function setTelegram_channel(string $telegram_channel): self {
        self::$telegram_channel = $telegram_channel;
        return new static();
    }

}
