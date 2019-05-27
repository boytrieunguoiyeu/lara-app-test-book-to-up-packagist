<?php

namespace Laratest\PostCRUD\Facades;

use Illuminate\Support\Facades\Facade;

class PostCRUD extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PostCRUD';
    }
}
