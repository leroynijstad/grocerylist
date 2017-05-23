<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLijstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('lijsts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('recipe')->default('');
            $table->boolean('done');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('lijst_product', function (Blueprint $table) {
            $table->integer('lijst_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->primary(['lijst_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lijsts');
        Schema::dropIfExists('lijst_product');
    }
}
