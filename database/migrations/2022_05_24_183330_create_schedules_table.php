<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->string('program');
            $table->longText('description')->nullable();
            $table->enum('day',['I', 'II', 'III']);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->longText('speaker')->nullable();
            $table->string('room')->nullable();
            $table->longText('moderator')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
