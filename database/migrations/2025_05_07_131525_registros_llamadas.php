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
        //
        Schema::create('registros_llamadas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id('id_registro_llamadas');
            $table->bigInteger('id_persona')->unsigned();
            $table->bigInteger('id_estado')->unsigned();
            $table->date('fecha_contacto');
            $table->time('hora_contacto');
            $table->integer('numero_llamada');
            $table->string('atendio_llamada', 70);
            $table->text('observaciones', 240);
            $table->timestamps();

            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->foreign('id_estado')->references('id_estado')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
