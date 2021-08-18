<?php

namespace Bulk\Modules\Core\Database\QueryFactory;

trait prepare_insert {

    /**
     * 
     * @param array $colums
     * @param string $table_name
     * @param array $params
     * @return string
     */
    public static function prepare_insert(array $colums, string $table_name, array $params = null): string {
        $formatedColums = join(', ', $colums);
        $formatedParams = ($params ? join(', ', $params) : join(', ', array_fill(0, count($colums), '?')));

        return "INSERT INTO $table_name ($formatedColums) VALUES($formatedParams)";
    }

}
