<?php

namespace Ppcsite\RecordLog;

use Illuminate\Support\ServiceProvider;

class RecordLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 讓 service container 連結自定義的 Facades
        $this->app->bind('packages-record-log', function($app) {
            return new \Ppcsite\RecordLog\Models\AdminLog();
        });
        // 合併使用者與系統預設 config 設定檔，讓使用者可以合併覆寫 config 設定檔
        $this->mergeConfigFrom(
            __DIR__.'/../config/record-log.php', 'record-log'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // 發佈 migration
        $timestamp = date('Y_m_d_His');
        $this->publishes([
            __DIR__.'/../database/migrations/create_admin_logs_table.php' => database_path('migrations/'.$timestamp.'_create_admin_logs_table.php'),
        ],'record-admin-logs-migration');
    }
}
