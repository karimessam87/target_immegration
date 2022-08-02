<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWorkHistoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('client_work_histories', function (Blueprint $table) {
      $table->id();
      $table->string('resume');
      $table->string('hr_letters');
      $table->string('main_applicant');
      $table->string('company');
      $table->string('title');
      $table->string('noc');
      $table->string('city');
      $table->string('country');
      $table->date('work_from');
      $table->date('work_to');
      $table->foreignId('flag_id')->constrained()->cascadeOnUpdate();
      $table->foreignId('client_id')->constrained()->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('client_work_histories');
  }
}
