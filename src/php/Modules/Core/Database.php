<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\Database\DatabaseConfig;
use Bulk\Modules\Core\Errors;
use Bulk\Modules\Core\Error\ErrorCodes;
use Bulk\Modules\Core\Logger;

/**
 * Clase principal que controla y proporciona todos los métodos de la base de datos
 */
final class Database {

    /**
     * Instancia de configuración 
     * @var DatabaseConfig
     */
    private static $Config;

    /**
     *
     * @var \PDO
     */
    private static $PDO;

    /**
     * 
     */
    public static function init() {
        self::$Config = DatabaseConfig::instance();
        Logger::setLog("Nueva instancia de base de datos creada");
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
     * @return DatabaseConfig
     */
    public static function getConfig(): DatabaseConfig {
        return self::$Config;
    }

    /**
     * 
     * @return \PDO
     */
    public static function getPDO(): \PDO {
        return self::$PDO;
    }

    /**
     * Función que intenta crear instancia MySQL con la configuración asignada
     */
    public static function connect() {
        Logger::setLog("Intentando crear instancia de conexion de base de datos...");
        $Config = self::getConfig() ?: DatabaseConfig::instance();

        $protocol = $Config->getProtocol();
        $server = $Config->getServer();
        $database = $Config->getDatabase();
        $user = $Config->getUserName();
        $password = $Config->getPassword();

        try {
            $pdo = new \PDO("$protocol:host=$server;dbname=$database", $user, $password);
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(\PDO::ATTR_STRINGIFY_FETCHES, false);
            Logger::setLog("Conexion a base de datos creada correctamente");
            self::$PDO = $pdo;
        } catch (\PDOException $e) {
            Errors::addError(ErrorCodes::CANT_CONNECT_MYSQL_LINK);
            Logger::setLog("No se pudo crear instancia de conexion Error: %s", $e->getMessage());
            print "¡Error!: " . $e->getMessage() . "<br/>";
        }
    }

    /**
     * Método que cierra la conexión MySQLi
     */
    public static function close() {
        self::$PDO = NULL;
    }

    /**
     * Ejecuta un <b>PDO::query</b> a la base de datos
     * @param string $sql Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public static function query(string $sql) {
        $pdo = self::getPDO();
        return $pdo->query($sql);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement Cadena de texto con comando SQL
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     * si la instancia no esta conectada a la base de datos
     */
    public static function prepare(string $statement) {
        $pdo = self::getPDO();
        return $pdo->prepare($statement);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_execute(string $statement, array $params = []) {
        $stmt = self::prepare($statement);
        if ($stmt) {
            $stmt->execute($params);
        }
        return $stmt;
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch(string $statement, array $params = [], bool $results = false, $fetch_all = false) {
        $stmt = self::prepare_execute($statement, $params);
        if ($results) {
            return (!$fetch_all ? $stmt->fetch(\PDO::FETCH_OBJ) : $stmt->fetchAll(\PDO::FETCH_OBJ));
        }
        return $stmt;
    }

    /**
     * 
     * @param string $statement
     * @param array $params
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch_result(string $statement, array $params = []) {
        return self::prepare_fetch($statement, $params, true, false);
    }

    /**
     * Ejecuta un <b>PDO::prepare</b> a la base de datos
     * @param string $statement
     * @param array $params
     * @param bool $results
     * @return \PDOStatement Regresa objeto <b>PDOStatement</b> o <b>NULL</b>
     */
    public static function prepare_fetch_all(string $statement, array $params = []) {
        return self::prepare_fetch($statement, $params, true, true);
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public static function prepare_fetch_class(string $class, string $statement, array $params = []) {
        $stmt = self::prepare_execute($statement, $params);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    /**
     * 
     * @param string $class
     * @param string $statement
     * @param array $params
     * @return \PDOStatement
     */
    public static function prepare_fetch_all_class(string $class, string $statement, array $params = []) {
        $stmt = self::prepare_execute($statement, $params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * 
     * @return int
     */
    public static function getLastId(): int {
        return self::getPDO()->lastInsertId();
    }

}
