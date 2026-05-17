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
        Schema::create('video_jocs', function (Blueprint $table) {
            $table->id();
            $table->string('titol');
            $table->string('any_llancament');
            $table->string('compatibilitat');
        // small integer porque no necesito mucho numeros 32,767
            $table->smallInteger('duracioJoc');
            $table->boolean('disponibilitat');
            // permitir hasta 2 digitos, uno depsues de la coma
            // ejemplo: 4.7 hasta 9.9
            $table->decimal('valoracion', 2, 1);
            $table->string('tipus');
            // hasta 99.99 // 4 digitos permitidos
            $table->decimal('preu', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_jocs');
    }
};
