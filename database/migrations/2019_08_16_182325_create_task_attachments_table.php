<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAttachmentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('task_attachments', function (Blueprint $table) {
      $table->id();
      $table->string('attachment');
      $table->foreignId('task_id')->constrained()->cascadeOnDelete();
      $table->foreignId('flag_id')->nullable()->constrained()->cascadeOnDelete();
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
    Schema::dropIfExists('task_attachments');
  }
}
