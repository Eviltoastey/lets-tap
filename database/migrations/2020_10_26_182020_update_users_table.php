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
            $table->unsignedBigInteger('beer_id')->nullable()->unsigned()->index();
            $table->foreign('beer_id')->references('id')->on('beers')->onDelete('set null');

            // bar relation many to one
            $table->unsignedBigInteger('bar_id')->nullable()->unsigned()->index();
            $table->foreign('bar_id')->references('id')->on('bars')->onDelete('set null');

            // brewery relation many to one
            $table->unsignedBigInteger('brewery_id')->nullable()->unsigned()->index();
            $table->foreign('brewery_id')->references('id')->on('breweries')->onDelete('set null');

            // store relation many to one
            $table->unsignedBigInteger('store_id')->nullable()->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
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
