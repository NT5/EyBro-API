<?php

namespace Bulk\Modules\Aplication;

use Bulk\Modules\Core\Logger;
use Bulk\Modules\Core\PageConfig;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

final class Correo {

    /**
     *
     * @var PageConfig
     */
    private static $config;

    /**
     *
     * @var PHPMailer
     */
    private static $mail;

    public static function init(): self {
        self::$config = PageConfig::instance();
        Logger::setLog("Nueva instancia de correos creada");
        self::prepareMail();
        return new static();
    }

    /**
     * 
     * @return \self
     */
    public static function instance(): self {
        return new static();
    }

    public static function send(string $asunto, string $texto) {
        $config = self::$config;
        $mail = self::$mail;

        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $texto;

        return (!$mail->send() ? false : true);
    }

    private static function prepareMail() {
        $mail = new PHPMailer(true);
        $config = self::$config->instance();

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = $config->getMail_server();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username = $config->getMail_user();
        $mail->Password = $config->getMail_password();
        $mail->Port = $config->getMail_port();

        $mail->setFrom($config->getMail_user(), $config->getMail_name());
        $mail->addReplyTo($config->getMail_user(), $config->getMail_name());

        $correos = $config->getMail_send();
        foreach (explode(',', $correos) as $correo) {
            $mail->addAddress($correo);
        }
        self::$mail = $mail;
    }

}
