<?php

namespace Bulk\Modules\Core\Database\QueryFactory;

trait prepare_select {

    /**
     * 
     * @param array $colums
     * @param string $table_name
     * @param string $where
     * @return string
     */
    public static function prepare_select(array $colums, string $table_name, string $where = null): string {
        $formatedColums = join(', ', $colums);
        $formatedWhere = ($where ? " WHERE $where" : '');
        return "SELECT $formatedColums FROM $table_name$formatedWhere";
    }

}
