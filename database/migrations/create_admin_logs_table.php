<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id();
            $table->string('function_name', 100)->comment('功能名稱');
            $table->foreignId('user_id')->comment('操作者');
            $table->string('user_type',20)->nullable()->comment('操作者類型');
            $table->string('action', 20)->comment('操作');
            $table->foreignId('datatable_id')->nullable()->comment('對象資料id');
            $table->string('datatable_type', 100)->nullable()->comment('對象資料model');
            $table->string('ip',25)->nullable()->comment('來源IP');
            $table->string('comment')->nullable()->comment('備註');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('admin_logs');
    }
};
