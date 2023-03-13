<?php

namespace Ppcsite\RecordLog\Contracts;

use Illuminate\Database\Eloquent\Model;

interface AdminLog
{
    /**
     * 紀錄 Log
     *
     * @param string $function_name
     * @param $action
     * @param Model|null $data_model
     * @param $comment
     * @return void
     */
    public static function Log(string $function_name, string $action, Model $data_model=null, string $comment=null): void;

    /**
     * 取得變更資料之 model 關聯
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function datatable(): \Illuminate\Database\Eloquent\Relations\MorphTo;
}
