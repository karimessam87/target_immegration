<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number');
            $table->string('noc')->nullable();
            $table->string('cic')->nullable();
            $table->string('job_seeker_code')->nullable();
            $table->smallInteger('score')->nullable();
            $table->date('application_effective_date')->nullable();
            $table->foreignId('file_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('file_statue_id')->constrained()->cascadeOnDelete();
            $table->foreignId('file_label_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('files');
    }
}
