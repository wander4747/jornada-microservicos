<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->foreign('customer_id')->references("id")->on("customers");
            $table->string('status');
            $table->double('discount');
            $table->double('downpayment');
            $table->double('delivery_fee');
            $table->double('late_fee');
            $table->double('total')->default(0);
            $table->double('balance')->default(0);
            $table->date('order_date');
            $table->date('return_date');
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
        Schema::dropIfExists('orders');
    }
}