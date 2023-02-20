<?php

namespace Ppcsite\RecordLog;

class RecordLog
{
    public function testRecord ()
    {
        return config('record-log.test1');
    }
    public static function testRecord2 ()
    {
        return config('record-log.test2');
    }
}
