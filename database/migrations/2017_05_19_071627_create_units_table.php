<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('plural');
            $table->string('symbol');
            $table->timestamps();
        });

        DB::table('units')->insert(
        array(
        [
            'name' => 'kilogram', 
            'plural' => 'kilogram', 
            'symbol' => 'kg'
        ],
        [
            'name' => 'gram',
            'plural' => 'gram',  
            'symbol' => 'gr'
        ],
        [
            'name' => 'liter', 
            'plural' => 'liter', 
            'symbol' => 'l'
        ],
        [
            'name' => 'deciliter', 
            'plural' => 'deciliter', 
            'symbol' => 'dl'
        ],
        [
            'name' => 'milliliter', 
            'plural' => 'milliliter', 
            'symbol' => 'ml'
        ],
        [
            'name' => 'teen', 
            'plural' => 'tenen', 
            'symbol' => 'tn'
        ],
        [
            'name' => 'stuk', 
            'plural' => 'stuks', 
            'symbol' => 'stk'
        ],
        [
            'name' => 'fles', 
            'plural' => 'flessen', 
            'symbol' => 'fl'
        ],
        [
            'name' => 'theelepel', 
            'plural' => 'theelepels', 
            'symbol' => 'tl'
        ],
        [
            'name' => 'eetlepel', 
            'plural' => 'eetlepels', 
            'symbol' => 'el'
        ],
      ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
