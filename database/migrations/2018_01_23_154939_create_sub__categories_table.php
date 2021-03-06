<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub__categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->unsigned();
             $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('main_sub_cat_id')->unsigned();
             $table->foreign('main_sub_cat_id')->references('id')->on('main__sub__categories')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
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
        Schema::dropIfExists('sub__categories');
    }
}
