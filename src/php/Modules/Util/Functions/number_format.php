<?php

namespace Bulk\Modules\Util\Functions;

trait number_format {

    /**
     * 
     * @param float $number
     * @return string
     */
    public static function number_format(float $number): string {
        return "C$" . number_format($number, 2, '.', ',');
    }

}
