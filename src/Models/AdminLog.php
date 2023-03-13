<?php

namespace Ppcsite\RecordLog\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminLog extends Model implements \Ppcsite\RecordLog\Contracts\AdminLog
{
    // 操作類型
    CONST ACTION_NEW = '新增';
    CONST ACTION_EDIT = '編輯';
    CONST ACTION_DELETE = '刪除';
    CONST ACTION_SEARCH = '查詢';
    CONST ACTION_POST = '送出';
    CONST ACTION_DOWNLOAD = '下載';
    CONST ACTION_UPLOAD = '上傳';
    CONST ACTION_MAIL = '發信';

    CONST ACTION_LOGIN = '登入';
    CONST ACTION_LOGOUT = '登出';
    CONST ACTION_REGISTER = '註冊';


    protected $guarded = [];

    public function datatable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    public static function Log(string $function_name, $action, Model $data_model=null, $comment=null): void
    {
        $ip = Request::ip();

        $log = new self([
            'function_name' => $function_name,
            'user_id' => Auth::user()->id??0,
//            'user_type' => $user_type??'user',
            'action' => $action,
            'comment' => $comment,
            'ip' => $ip,
        ]);

        if($data_model) {
            $log->datatable()->associate($data_model);
        }

        $log->save();
    }
}
