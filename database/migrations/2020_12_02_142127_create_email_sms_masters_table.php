<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSmsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_sms_masters', function (Blueprint $table) {
            $table->increments('email_sms_master_id');
            $table->string('title',255)->nullable();
            $table->string('email_sms_key',255)->nullable();
            $table->string('parameters',255)->nullable(); 
            $table->text('subject',255)->nullable(); 
            $table->text('content',255)->nullable();
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
        Schema::dropIfExists('email_sms_masters');
    }
}
