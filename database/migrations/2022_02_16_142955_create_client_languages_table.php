<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('test');
            $table->string('certificate_number');
            $table->smallInteger('listening');
            $table->smallInteger('reading');
            $table->smallInteger('writing');
            $table->smallInteger('speaking');
            $table->date('issue_date');
            $table->foreignId('flag_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->date('expire_date');
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
        Schema::dropIfExists('client_languages');
    }
}
