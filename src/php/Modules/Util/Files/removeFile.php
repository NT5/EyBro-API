<?php

namespace Bulk\Modules\Util\Files;

trait removeFile {

    /**
     * 
     * @param string $path
     */
    public static function removeFile(string $path) {
        unlink($path);
    }

}
