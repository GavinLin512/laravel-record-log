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
        //
        $this->app->bind('packages-record-log', function($app) {
            return new \Ppcsite\RecordLog\RecordLog();
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
        // 發佈 config 設定檔
        $this->publishes([
            __DIR__.'/../config/record-log.php' => config_path('record-log.php'),
        ],'record-log-config');
    }
}
