<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Application\Ajax\Area;
use Bulk\Modules\Aplication\Telegram;
use Bulk\Modules\Aplication\Correo;
use Bulk\Modules\Aplication\Visitante;
use Bulk\Modules\Aplication\PosiblesRespuestas;

final class SendEmail extends Area {

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
     * @var bool
     */
    private $sendTelegram = true;

    /**
     *
     * @var string
     */
    private $token = 0;

    public function CheckPost() {
        $this->visitante_id = $this->getPostInt('visitante_id');
        $this->token = $this->getPost('token');
    }

    public function initVars() {
        $visitante_id = $this->visitante_id;
        $correo = Correo::instance();

        $visitante = Visitante::getVisitanteFromId($visitante_id);
        $respuestas = Visitante::getRespuestasFromId($visitante_id);

        if ($visitante->getId_visitante() === 0 || $visitante->getUuid() !== $this->token) {
            $this->setVars([
                'error' => 'Id de visitante invalida'
            ]);
            return;
        }

        $meta = json_decode($visitante->getIdentificador());

        $this
                ->addText("Visitante: [{$visitante->getUuid()}] registro una nueva respuesta en el sistema")
                ->addText("Nombre: {$meta->usuario}")
                ->addText("Edad: {$meta->edad}")
                ->addText("Tutor/Maestro: {$meta->tutor}")
                ->addText("Grado: {$meta->grado_cursado}")
                ->addText("Centro de estudios: {$meta->centro_estudio}")
                ->addText("Departamento: {$meta->departamento}")
                ->addText("<br /><hr />");

        foreach ($respuestas as $respuesta) {
            $respuesta_data = PosiblesRespuestas::getPosibleRespuestaFromId($respuesta->id_respuesta_enviada);

            $this
                    ->addText($respuesta->pregunta_texto)
                    ->addText($respuesta_data->respuesta_texto)
                    ->addText('<br />');
        }

        $this->addText('<i>---- Fin del correo ---</i>');

        $emailText = $this->MessageText();
        $emailStatus = $correo->send("Respuesta de encuesta {$visitante->getUuid()}", $emailText);

        if ($this->sendTelegram) {
            $this->sendTelegram();
        }

        $this->setVars([
            'visitante.data' => $visitante->Json(),
            'visitante.respuestas' => $respuestas,
            'email.stats' => $emailStatus,
            'emai.text' => $emailText
        ]);
    }

    public function setUp() {
        Correo::init();
        Telegram::init();

        $this->addText("<h2> ----- Correo Automático no responder ----- </h2>");
        // $this->addText("<img src='https://eybrosoloentrevosyyo.mzdevocotal.com/img/banner.webp' alt='banner' width='500' height='600' />");
        // $this->addText('<h3>Datos abajo</h3>');
        $this->addText("<hr />");
    }

    /**
     * 
     * @param string $string
     * @return $this
     */
    private function addText(string $string) {
        $this->message[] = $string;
        return $this;
    }

    /**
     * 
     * @return string
     */
    private function MessageText(): string {
        return join("<br />" . PHP_EOL, $this->message);
    }

    private function sendTelegram(): void {
        $message = strip_tags($this->MessageText());
        Telegram::send($message);
    }

}
