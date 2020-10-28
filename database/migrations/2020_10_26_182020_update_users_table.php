<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('beer_id');
            $table->dropColumn('brewery_id');
            $table->dropColumn('store_id');
            $table->dropColumn('bar_id');
        });
    }
}
