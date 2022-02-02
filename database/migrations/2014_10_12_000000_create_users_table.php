<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 255);
            $table->string('last_name', 255)->nullable();
            $table->string('adress', 255)->nullable();
            $table->string('phone', 9)->nullable();
            $table->string('email', 100)->unique();
            $table->enum('profile',['ADMIN', 'TRABAJADOR'])->default('ADMIN');
            $table->enum('status',['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->string('user', 20)->unique()->nullable();
            $table->timestamp('user_verified_at')->nullable();
            $table->string('password', 100);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
