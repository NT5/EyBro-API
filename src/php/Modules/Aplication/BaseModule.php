<?php

namespace Bulk\Modules\Aplication;

abstract class BaseModule {

    /**
     * 
     * @return \self
     */
    public static function instance(): self {
        return new static();
    }

}
