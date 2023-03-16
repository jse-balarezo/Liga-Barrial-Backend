<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistantCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistant_coaches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        
            $table->foreignId('coach_id')
                ->constrained('coaches'); //Clave foranea

            $table->integer('age')
                ->comment('Ingreso de la edad del asistente del entrenador');

            $table->string('name', 100)
                ->comment('Ingreso del nombre del asistente del entrenador');

            $table->mediumText('nickname')
                ->comment('Ingreso del apodo del asistente del entrenador');

            $table->float('salary', 8, 2)
                ->comment('Ingreso del valor que gana el asistente del entrenador en el equipo');

            $table->boolean('state')
                ->default(true)
                ->comment('Ingreso del estado del asistente del entrenador para saber si esta activo(True), inactivo (false)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistant_coaches');
    }
}
