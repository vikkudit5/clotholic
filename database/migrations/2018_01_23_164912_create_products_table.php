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
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->integer('main_sub_cat_id')->unsigned();
            $table->foreign('main_sub_cat_id')->references('id')->on('main__sub__categories');
            $table->integer('sub_cat_id')->unsigned();
            $table->foreign('sub_cat_id')->references('id')->on('sub__categories');
            $table->integer('vendor_id');
            // $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->string('product_sku');
            $table->string('name');
            $table->string('price');
            $table->string('weight');
            $table->text('product_cart_desc');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->enum('status',['0','1'])->comment('1=>active,0=>inactive');
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
