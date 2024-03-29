<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
        array(
        [
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'admin' => true,
        ],
        [
            'username' => 'demo',
            'password' => bcrypt('demo'),
            'admin' => false,
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
        Schema::dropIfExists('users');
    }
}
