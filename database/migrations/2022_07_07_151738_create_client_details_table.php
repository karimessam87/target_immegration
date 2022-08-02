<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_details', function (Blueprint $table) {
            $table->id();
            $table->integer('nationality_number');
            $table->integer('passport_number');
            $table->date('passport_date');
            $table->string('additional_phone')->nullable();
            $table->string('additional_email')->nullable();
            $table->string('cic_username')->nullable();
            $table->string('cic_password')->nullable();
            $table->string('sponsor_eligibility')->nullable();
//            $table->string('supporting_document')->nullable();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('sponsor_name')->nullable();
            $table->smallInteger('canadian_status')->nullable();
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
        Schema::dropIfExists('client_details');
    }
}
