<?php

namespace Bulk\Modules\Util;

/**
 * 
 */
class ImgPicker {

    /**
     * 
     * @param string $path
     * @param bool $return_path
     * @return string
     */
    public static function getRandImg($path, $return_path = FALSE) {
        $images = glob($path . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        $randomImage = $images[array_rand($images)];
        return ($return_path ? $randomImage : pathinfo($randomImage, PATHINFO_BASENAME) );
    }

}
