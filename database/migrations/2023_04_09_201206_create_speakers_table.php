<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender')->default('M');
            $table->string('function');
            $table->string('company');
            $table->string('photo');
            $table->string('priority')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['APROVADO', 'EMITIDO', 'RECEBIDO', 'DUPLICADO'])->default('RECEBIDO');
            $table->integer('qrcode')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('speakers');
    }
}