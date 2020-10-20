<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_region');
            $table->bigInteger('altitud');
            $table->bigInteger('superficie');
            $table->string('fundacion');
            $table->bigInteger('poblacion_region');
            $table->string('bandera')->nullable();
            $table->foreignId('pais_id')->references('id')->on('pais')->onDelete('cascade')->unsigned()->nullable();
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
        Schema::dropIfExists('regions');
    }
}
