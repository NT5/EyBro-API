<?php

namespace Bulk\Application\Initialization;

use Bulk\Modules\Core\PageConfig;

trait initPageConfig {

    /**
     * 
     * @param string $config_file
     * @return void
     */
    public function initPageConfig(string $config_file = null): void {
        $inifile = realpath($config_file ?: __DIR__ . "/../../../../config.ini");
        PageConfig::fromIniFile($inifile);
    }

}
