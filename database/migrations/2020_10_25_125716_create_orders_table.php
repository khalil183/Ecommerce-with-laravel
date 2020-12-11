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
            $table->bigIncrements('order_id');
            $table->string('order_track_id');
            $table->integer('user_id');
            $table->integer('shipping_id');
            $table->double('order_total');
            $table->integer('order_qty');
            $table->string('payment_method');
            $table->integer('payment_status')->default(0);
            $table->string('transection_id')->nullable();
            $table->string('order_ship_method')->nullable();
            $table->double('order_ship_cost')->nullable();
            $table->double('order_cupon_cost')->nullable();
            $table->double('order_vat')->nullable();
            $table->string('order_day')->nullable();
            $table->string('order_month')->nullable();
            $table->string('order_year')->nullable();
            $table->integer('order_status')->default(0);
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
