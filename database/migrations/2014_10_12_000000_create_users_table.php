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
            // standard tables
            $table->id();
            $table->timestamps();

            // custom tables
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('age');
            $table->text('description');
            $table->integer('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // tokens
            $table->rememberToken();
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
