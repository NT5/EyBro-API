<?php

namespace Bulk\Application\Ajax;

use Bulk\Modules\Extended;

abstract class AdminArea extends LoggedArea {

    /**
     * 
     * @param Extended $Extended
     */
    public function __construct(Extended $Extended = NULL) {
        parent::__construct($Extended);
    }

    public function prepareArea() {
        $me = $this->getUser();
        $meAdmin = $me->isAdmin();

        if ($meAdmin) {
            parent::prepareArea();
        } else {
            $this->setVars([
                'error.code' => 2,
                'error.message' => 'No admin user'
            ]);
        }
    }

}
