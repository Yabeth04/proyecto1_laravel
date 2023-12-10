<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chirps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //campo de texto para guardar lo que el usuario escriba en el texto
            $table->string('message');
            //necesitamos saber de quien es ese chirps(quien lo ha creado), para eso asociamos cada chirps a un usuario en la base de datos.
            //usamos llave foranea, constrained():restringa la llave foranea, y garantizamos la integridad referencial de la BD.
            //cascadaOnDelete: para que cuando se elimine un usuario tambien se elimine su chirps
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
