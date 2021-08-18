<?php

namespace Bulk\Modules\Core;

use Bulk\Modules\Core\Logger;

/**
 * @todo Documentar / Mejorar
 */
final class Cookies {

    /**
     *
     * @var type 
     */
    protected static $cookie_data;

    /**
     *
     * @var type 
     */
    protected static $cookie_meta;

    /**
     * 
     * @param string $name
     */
    public static function init(string $name = 'bulker') {
        self::$cookie_meta = array(
            "name" => $name,
            "SameSite" => "Strict", // TODO Implementar
            "expire" => (time() + ( 86400 * 30 )), // 30 Días
            "content" => array()
        );

        self::$cookie_data = self::createMyCookie();
        Logger::setLog("Nueva instancia de Cookies creada");
    }

    /**
     * 
     * @return mixed
     */
    private static function createMyCookie() {
        if (!filter_input(INPUT_COOKIE, self::$cookie_meta['name'])) {
            return self::setMyCookie(self::$cookie_meta['content']);
        } else {
            return filter_input(INPUT_COOKIE, self::$cookie_meta['name']);
        }
    }

    /**
     * 
     * @param array $string_data
     * @return mixed
     */
    private static function setMyCookie(array $string_data) {
        $string = serialize($string_data);
        \setcookie(self::$cookie_meta['name'], $string, self::$cookie_meta['expire'], "/", "", true, true);
        self::$cookie_data = $string;
        return $string;
    }

    /**
     * 
     * @return mixed
     */
    public static function getMyCookie() {
        return self::$cookie_data;
    }

    /**
     * 
     * @param string $sec
     * @return mixed
     */
    public static function getCookie(string $sec) {
        $cookie = unserialize(self::getMyCookie());
        return ( isset($cookie[$sec]) ? $cookie[$sec] : NULL );
    }

    /**
     * 
     * @param string $var
     * @param string $value
     */
    public static function setCookie(string $var, string $value) {
        $cookie = unserialize(self::getMyCookie());
        $cookie[$var] = $value;
        self::setMyCookie($cookie);
    }

    /**
     * 
     * @param type $sec
     */
    public static function delCookie(string $sec) {
        $cookie = unserialize(self::getMyCookie());
        if (isset($cookie[$sec])) {
            unset($cookie[$sec]);
            self::setMyCookie($cookie);
        }
    }

}
