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

            // Delegate information
            $table->enum('type', ['Yes', 'No']); // registering on behalf
            $table->enum('based', ['Yes', 'No']); // based in Angola
            $table->string('nationality');
            $table->enum('title', ['Dr', 'Miss', 'Mrs', 'Ms', 'Mr', 'Prof']);
            $table->string('fullname');
            $table->string('phone');
            $table->string('email')->nullable();

            // Organization details
            $table->string('org_type');
            $table->string('org_name');
            $table->string('position');
            // Head of delegation
            $table->enum('head_of_delegation', ['Yes', 'No']);

            // Accommodation & diet (só obrigatórios se based = No)
            $table->enum('accommodation', ['Yes', 'No'])->nullable();
            $table->string('diet')->nullable();

            // Travel Information (só obrigatórios se based = No)
            $table->string('passport_number')->nullable();
            $table->string('passport_type')->nullable(); // Ordinary, Diplomatic, Service
            $table->string('visa_status')->nullable();
            $table->string('country_of_departure')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('departure_date')->nullable();

            $table->string('level')->default('PARTICIPANT');
            $table->enum('status', ['IMPRESSO', 'APROVADO', 'RECEBIDO', 'DUPLICADO'])->default('RECEBIDO');
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
