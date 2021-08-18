<?php

namespace Bulk\Application\Ajax\Areas;

use Bulk\Modules\Extended;
use Bulk\Application\Ajax\AdminArea;
use Bulk\Modules\App\Users\UserEntry;

class UserList extends AdminArea {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

    public function CheckPost() {
        
    }

    public function initVars() {
        $users = $this->getUsers();
        $users_list = $users->getListaUsuarios();

        $users_json = array_map(function (UserEntry $user) {
            return $user->Json();
        }, $users_list);

        $this->setVar('users', $users_json);
    }

    public function setUp() {
        
    }

}
