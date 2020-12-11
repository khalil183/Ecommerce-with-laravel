<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_slug');
            $table->string('product_images')->nullable();
            $table->tinyInteger('product_brand_id');
            $table->tinyInteger('product_category_id');
            $table->tinyInteger('product_sub_category_id')->nullable();
            $table->double('buying_price')->nullable();
            $table->double('selling_price');
            $table->integer('qty');
            $table->string('video_link')->nullable();
            $table->tinyInteger('buyone_getone')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->double('weight')->nullable();
            $table->text('sort_des')->nullable();
            $table->text('long_des')->nullable();
            $table->double('offer_perchentage')->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('products');
    }
}
