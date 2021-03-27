<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_detail', function (Blueprint $table) {
            
            if (!Schema::hasTable('product_detail')) {
                $table->bigIncrements('id');
                $table->integer('height');
                $table->string('size');
                $table->string('color1');
                $table->string('color2');
                $table->string('color3');
                $table->string('texture');
                $table->integer('price');

                $table->timestamps();
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_detail');
    }
}
