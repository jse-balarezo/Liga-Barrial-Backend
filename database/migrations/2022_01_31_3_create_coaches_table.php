<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreignId('team_id')
                ->constrained('teams'); //Clave foranea

            $table->integer('age')
                ->comment('Ingreso de la edad del entrenador');

            $table->string('name', 100)
                ->comment('Ingreso del nombre del entrenador');

            $table->mediumText('nickname')
                ->comment('Ingreso del apodo del entrenador');

            $table->float('salary', 8, 2)
                ->comment('Ingreso del valor que gana el entrenador en el equipo');

            $table->boolean('state')
                ->default(true)
                ->comment('Ingreso del estado del entrenador para saber si esta activo(True), inactivo (false)');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches');
    }
}
