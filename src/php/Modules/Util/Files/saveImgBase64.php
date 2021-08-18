<?php

namespace Bulk\Modules\Util\Files;

trait saveImgBase64 {

    /**
     * 
     * @param string $base_64
     * @param string $path
     * @return string
     */
    public static function saveImgBase64(string $base_64, string $path) {
        try {
            $uploadPath = getcwd() . $path;
            $image = $base_64;

            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);

            $image = base64_decode($image);
            $image_name = time() . '.png';
            file_put_contents($uploadPath . $image_name, $image);
            return $image_name;
        } catch (Exception $exc) {
            // error
        }
        return 'default.png';
    }

}
