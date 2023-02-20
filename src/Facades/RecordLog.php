<?php

namespace Ppcsite\RecordLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ppcsite\RecordLog\RecordLog
 */
class RecordLog extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor():string
    {
        return 'packages-record-log';
    }
}
