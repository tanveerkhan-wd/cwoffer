<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('offer_id');
            $table->integer('property_id');
            $table->string('name',100);
            $table->string('phone_code',5)->nullable();
            $table->string('phone',11);
            $table->string('email',100);

            $table->string('buyer_name',100)->nullable();
            $table->string('buyer_ph_code',5)->nullable();
            $table->string('buyer_phone',11)->nullable();
            $table->string('buyer_email',100)->nullable();
            $table->string('sale_price')->nullable();
            $table->string('seller_concessions')->nullable();
            $table->string('settlement_date')->nullable();
            $table->float('emd',10,2)->nullable();
            $table->float('due_diligence',10,2)->nullable();
            $table->string('finance')->nullable();
            $table->string('appraisal')->nullable();
            $table->string('inspection')->nullable();
            $table->string('home_sale')->nullable();
            $table->text('additional_note')->nullable();

            $table->tinyInteger('contract_received')->comment("1=Yes, 0=No");
            $table->string('buyer_offer',100)->nullable();
            $table->tinyInteger('intend_to_pay')->comment("1=cash, 2=Loan");
            $table->string('down_payment',100)->nullable();
            $table->string('loan_term',10)->nullable();
            $table->string('interest_rate',100)->nullable();
            $table->string('est_cash_to_close',100)->nullable();
            $table->string('closing_cost',100)->nullable();
            $table->string('insurance',100)->nullable();
            $table->string('property_taxes',100)->nullable();
            $table->string('other_fees',100)->nullable();
            $table->string('mortgage',100)->nullable();
            $table->string('mortgage_insurance',100)->nullable();
            $table->string('hoa',100)->nullable();
            $table->string('estimated_payment',100)->nullable();
            $table->tinyInteger('user_type')->comment("1=Buyer, 2=Buyer Agent");
            $table->tinyInteger('pre_approved')->comment("1=Yes, 0=No")->default(1);
            $table->tinyInteger('offer_status')->comment("1=Acceptd,2=Rejected,0=No Change")->default(0);
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
        Schema::dropIfExists('offers');
    }
}
