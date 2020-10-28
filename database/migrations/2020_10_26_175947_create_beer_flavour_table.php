<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeerFlavourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_flavour', function (Blueprint $table) {
            // standard tables
            $table->id();
            $table->timestamps();

            // pivot table relationship many beers to many flavours
            $table->unsignedBigInteger('beer_id')->index();
            $table->foreign('beer_id')->references('id')->on('beers');

            $table->unsignedBigInteger('flavour_id')->index();
            $table->foreign('flavour_id')->references('id')->on('flavours');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer_flavour');
    }
}
