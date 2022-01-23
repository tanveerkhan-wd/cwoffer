<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name',50)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('password',255)->nullable();
            $table->string('tel_code',3)->nullable();
            $table->string('mobile_number',10)->nullable();
            $table->string('user_photo',255)->nullable();
            $table->tinyInteger('user_type')->comment("0=Admin, 1=Seller");
            $table->tinyInteger('user_status')->default(1)->comment("1=Active,0=Inactive");
            $table->tinyInteger('admin_status')->default(1)->comment("1=Active,0=Inactive");
            $table->integer('forgot_password_otp')->nullable();
            $table->tinyInteger('is_email_verify')->comment("0=Not Verify, 1=Verify")->default(0);
            $table->tinyInteger('deleted')->comment("0=Not Deleted, 1=Deleted")->default(0);
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
