<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->integer('quantity')->default(1);
            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['EMITIDO', 'DUPLICADO','RECEBIDO'])->default('RECEBIDO');
            $table->string('printed_at')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
