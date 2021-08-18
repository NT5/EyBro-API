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

}
