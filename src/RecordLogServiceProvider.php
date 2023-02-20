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
        //
        $this->publishes([
            __DIR__.'/../config/record-log.php' => config_path('record-log.php'),
        ]);
    }
}
