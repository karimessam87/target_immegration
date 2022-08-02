<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('leads', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->string('attachment');
      $table->boolean('status')->default(false);
      $table->foreignId('project_id')->constrained()->cascadeOnDelete();
      $table->foreignId('department_id')->constrained()->cascadeOnDelete();
      $table->foreignId('flag_id')->nullable()->constrained()->cascadeOnUpdate();
      $table->foreignId('label_id')->nullable()->constrained()->cascadeOnUpdate();
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
    Schema::dropIfExists('leads');
  }
}
