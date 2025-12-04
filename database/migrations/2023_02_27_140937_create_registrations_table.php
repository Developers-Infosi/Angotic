<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();


            $table->string('code');
            $table->string('plafond');
            $table->string('nif');
            $table->string('name');
            $table->string('email');
            $table->string('tel');
            $table->string('quantity')->default(1);
            $table->string('type');
            $table->string('paymethod');
            $table->string('payment_id')->nullable();
            $table->enum('status', ['APROVADO', 'EMITIDO', 'RECEBIDO', 'DUPLICADO'])->default('RECEBIDO');

            $table->string('printed_at')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
