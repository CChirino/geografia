<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pais', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('capital');
            $table->string('idioma');
            $table->string('gentilicio');
            $table->string('forma_de_gobierno');
            $table->bigInteger('superficie');
            $table->bigInteger('fronteras');
            $table->bigInteger('linea_de_costa');
            $table->bigInteger('poblacion_pais');
            $table->string('bandera')->nullable();
            $table->foreignId('continente_id')->references('id')->on('continentes')->onDelete('cascade')->unsigned()->nullable();
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
        Schema::dropIfExists('pais');
    }
}
