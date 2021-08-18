<?php

namespace Bulk\Modules\Core\Database;

use Bulk\Modules\Core\Database\QueryFactory;

final class QueryFactory {

    use QueryFactory\prepare_select,
        QueryFactory\prepare_insert;
}
