<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeerStyleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_style', function (Blueprint $table) {
            // standard tables
            $table->id();
            $table->timestamps();

            // pivot table relationship many beers to many styles
            $table->unsignedBigInteger('beer_id')->index();
            $table->foreign('beer_id')->references('id')->on('beers');

            $table->unsignedBigInteger('style_id')->index();
            $table->foreign('style_id')->references('id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer_style');
    }
}
