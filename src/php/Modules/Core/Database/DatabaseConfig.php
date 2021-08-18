<?php

namespace Bulk\Modules\Core\Database;

use Bulk\Modules\Core\Database\DatabaseConfig;
use Bulk\Modules\Core\Logger;

/**
 * Instancia abstracta usada para almacenar y cargar
 * datos de configuración de la base de datos
 */
final class DatabaseConfig {

    use DatabaseConfig\saveToIni,
        DatabaseConfig\fromIniFile;

    private static $ini_area = "MySQL";

    /**
     *
     * @var string
     */
    private static $protocol = "mysql";

    /**
     * @var string Dirección del servidor de la base de datos
     */
    private static $server = "127.0.0.1";

    /**
     * @var string Nombre de usuario de la base de datos 
     */
    private static $username = "default";

    /**
     * @var string Contraseña de conexión 
     */
    private static $password = "";

    /**
     * @var string Base de datos que se usara
     */
    private static $database = "database";

    /**
     * Regresa una nueva instancia de configuración de la base de datos
     */
    public static function init() {

        self::$protocol = "mysql";
        self::$server = "127.0.0.1";
        self::$username = "default";
        self::$password = "";
        self::$database = "database";

        Logger::setLog("Nueva instancia de configuración de base de datos creada");
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
    protected static function getInitArea(): string {
        return self::$ini_area;
    }

    /**
     * 
     * @return string
     */
    public static function getProtocol(): string {
        return self::$protocol;
    }

    /**
     * 
     * @return string
     */
    public static function getServer(): string {
        return self::$server;
    }

    /**
     * 
     * @return string
     */
    public static function getUserName(): string {
        return self::$username;
    }

    /**
     * 
     * @return string
     */
    public static function getPassword(): string {
        return self::$password;
    }

    /**
     * 
     * @return string
     */
    public static function getDatabase(): string {
        return self::$database;
    }

    /**
     * 
     * @param string $protocol
     * @return \self
     */
    public static function setProtocol(string $protocol = 'mysql'): self {
        self::$protocol = $protocol;
        return new static();
    }

    /**
     * 
     * @param string $server
     * @return \self
     */
    public static function setServer(string $server = 'localhost'): self {
        self::$server = $server;
        return new static();
    }

    /**
     * 
     * @param string $username
     * @return \self
     */
    public static function setUserName(string $username = 'default'): self {
        self::$username = $username;
        return new static();
    }

    /**
     * 
     * @param string $password
     * @return \self
     */
    public static function setPassword(string $password = ''): self {
        self::$password = $password;
        return new static();
    }

    /**
     * 
     * @param string $database
     * @return \self
     */
    public static function setDatabase(string $database = 'database'): self {
        self::$database = $database;
        return new static();
    }

}
