<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Core\Logger;
use Bulk\Modules\Core\PageConfig;

final class Telegram {

    public static function init(): self {
        Logger::setLog("Nueva instancia de Telegram creada");
        return new static();
    }

    /**
     * 
     * @return \self
     */
    public static function instance(): self {
        return new static();
    }

    /**
     * 
     * @param string $text
     * @return string
     */
    public static function send(string $text) {
        $apiToken = PageConfig::getTelegram_api();
        $channelId = PageConfig::getTelegram_channel();

        $data = [
            'chat_id' => $channelId,
            'text' => $text
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
        return $response;
    }

}
