<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanadianConnectionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('canadian_connections', function (Blueprint $table) {
      $table->id();
      $table->string('firstname')->nullable();
      $table->string('lastname')->nullable();
      $table->string('related')->nullable();
      $table->string('relationship')->nullable();
      $table->string('province')->nullable();
      $table->boolean('education')->nullable();
      $table->string('education_note')->nullable();
      $table->boolean('work');
      $table->string('work_note')->nullable();
      $table->smallInteger('status');
      $table->string('note')->nullable();
      $table->string('document');
      $table->foreignId('client_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
    Schema::dropIfExists('canadian_connections');
  }
}
