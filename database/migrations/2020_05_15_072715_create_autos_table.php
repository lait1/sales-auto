<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->bigInteger('modelcar_id')->unsigned()->nullable();
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('year', 5)->nullable();
            $table->string('drive')->nullable();
            $table->string('transmission')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('draft');

            $table->string('keywords')->nullable();
            $table->string('title')->nullable();
            $table->string('seo_desc')->nullable();

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
        Schema::dropIfExists('autos');
    }
}
