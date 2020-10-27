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

            // beer relation many to one
            $table->unsignedBigInteger('beer_id')->index();
            $table->foreign('beer_id')->references('id')->on('beers');

            // bar relation many to one
            $table->unsignedBigInteger('bar_id')->index();
            $table->foreign('bar_id')->references('id')->on('bars');

            // brewery relation many to one
            $table->unsignedBigInteger('brewery_id')->index();
            $table->foreign('brewery_id')->references('id')->on('breweries');

            // store relation many to one
            $table->unsignedBigInteger('store_id')->index();
            $table->foreign('store_id')->references('id')->on('stores');

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
