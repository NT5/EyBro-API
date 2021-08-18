<?php

namespace Bulk\Application\Initialization;

use Bulk\Modules\Core\Database\DatabaseConfig;
use Bulk\Modules\Core\Database;

trait initDatabase {

    /**
     * 
     * @param string $config_file
     * @return void
     */
    public function initDatabaseConfig(string $config_file = null): void {
        $inifile = realpath($config_file ?: __DIR__ . "/../../../../config.ini");
        DatabaseConfig::fromIniFile($inifile);
    }

    /**
     * 
     * @param bool $connect
     * @return void
     */
    public function initDatabaseInstance(bool $connect = true): void {
        Database::init();
        if ($connect) {
            Database::connect();
        }
    }

}
