<?php

namespace Bulk\Application\Finalization;

use Bulk\Modules\Core\Database;

trait disposeDatabase {

    public function disconnectDatabase(): void {
        Database::close();
    }

}
