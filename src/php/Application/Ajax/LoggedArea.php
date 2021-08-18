<?php

namespace Bulk\Application\Ajax;

use Bulk\Modules\Extended;
use Bulk\Modules\App\Users;
use Bulk\Modules\App\Users\UserEntry;

abstract class LoggedArea extends Area {

    /**
     *
     * @var UserEntry
     */
    private $LoggedUser;

    /**
     *
     * @var Users
     */
    private $Users;

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        $this->Users = new Users($Extended);
        $this->checkLogin($Extended);

        parent::__construct($Extended);
    }

    public function checkLogin($Extended) {
        $cookies = $Extended->Cookies();
        $session_token = $cookies->getCookie('session');

        if ($session_token) {
            $this->LoggedUser = $this->getUsers()->getUserBySession($session_token);
        } else {
            $this->LoggedUser = new UserEntry();
        }
    }

    public function prepareArea() {
        $me = $this->getUser();

        if ($me->getId() !== 0) {
            parent::prepareArea();
        } else {
            $this->setVars([
                'error.code' => 1,
                'error.message' => 'Need login'
            ]);
        }

        $this->setVars([
            'user' => $me->Json()
        ]);
    }

    /**
     * 
     * @return Users
     */
    public function getUsers() {
        return $this->Users;
    }

    /**
     * 
     * @return UserEntry
     */
    public function getUser() {
        return $this->LoggedUser;
    }

}
