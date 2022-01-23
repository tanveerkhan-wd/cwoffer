<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('property_id');
            $table->integer('seller_id');
            $table->string('tranc_coordinator_name');
            $table->string('realtors_name');
            $table->enum('address_type', ['1','2'])->comment("1=From Google,2=Manual");
            $table->string('address')->nullable();
            $table->string('manual_address',255)->nullable();
            $table->string('latitude',100)->nullable();
            $table->string('longitude',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('zip_code',20)->nullable();
            $table->string('listing_price',100);
            $table->integer('min_sales_price')->nullable();
            $table->integer('seller_concessions')->nullable();
            $table->string('settlement_date')->nullable();
            $table->float('emd',10,2)->nullable();
            $table->float('due_diligence',10,2)->nullable();
            $table->string('finance')->nullable();
            $table->string('appraisal')->nullable();
            $table->string('inspection')->nullable();
            $table->string('home_sale')->nullable();
            $table->string('insurance')->nullable();
            $table->string('property_tax')->nullable();
            $table->string('other_fee')->nullable();
            $table->string('hoa')->nullable();
            $table->tinyInteger('listing_status')->comment("1=Active, 0=Inactive, 2=under contract,3=closed, 4=contract signed")->default(1);
            $table->tinyInteger('offer_status')->comment("1=Accepted,0=pending,2=denied,3=waiting")->default(0);
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
        Schema::dropIfExists('properties');
    }
}
