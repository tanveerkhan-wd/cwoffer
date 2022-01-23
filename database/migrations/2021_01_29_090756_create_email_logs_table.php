<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->increments('email_log_id');
            $table->integer('user_id')->nullable();
            $table->string('email_id',200)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('subject',200)->nullable();
            $table->longText('email_content');
            $table->longText('email_error_message')->nullable();
            $table->integer('email_attempt')->nullable();
            $table->tinyInteger('type')->comment("1=SMS,2=Email");
            $table->tinyInteger('email_status')->comment("1=send,2=pending,3=notSend");
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
        Schema::dropIfExists('email_logs');
    }
}
