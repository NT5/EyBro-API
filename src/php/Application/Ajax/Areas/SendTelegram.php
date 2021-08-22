<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Telegram;
use Bulk\Modules\Aplication\Visitante;

final class SendTelegram extends Area {

    /**
     *
     * @var array
     */
    private $message = [];

    /**
     *
     * @var int
     */
    private $visitante_id = 0;

    /**
     *
     * @var string
     */
    private $message_text = "";

    /**
     *
     * @var string
     */
    private $token = 0;

    public function CheckPost() {
        $this->visitante_id = $this->getPostInt('visitante_id');
        $this->token = $this->getPost('token');
        $this->message_text = $this->getPost('message');
    }

    public function initVars() {
        $visitante_id = $this->visitante_id;

        $visitante = Visitante::getVisitanteFromId($visitante_id);

        if ($visitante->getId_visitante() !== 0 || $visitante->getUuid() === $this->token) {
            $this->addText($this->message_text);
            $this->setVar('message', $this->MessageText());
            $this->sendTelegram();
        } else {
            $this->setVar('error', 'invalid id');
        }
    }

    public function setUp() {
        Telegram::init();
    }

    /**
     * 
     * @param string $string
     * @return $this
     */
    private function addText(string $string) {
        $this->message[] = "[$this->token] {$string}";
        return $this;
    }

    /**
     * 
     * @return string
     */
    private function MessageText(): string {
        return join(PHP_EOL, $this->message);
    }

    private function sendTelegram(): void {
        $message = strip_tags($this->MessageText());
        Telegram::send($message);
    }

}
