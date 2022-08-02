<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEducationTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('client_educations', function (Blueprint $table) {
      $table->id();
      $table->string('degree');
      $table->string('certificate');
      $table->string('transcript');
      $table->string('credential_report');
      $table->string('country_issue');
      $table->string('issue_date');
      $table->string('eca');
      $table->date('from_date');
      $table->date('to_date');
      $table->date('graduation_date');
      $table->string('faculty_name');
      $table->string('university');
      $table->string('field');
      $table->foreignId('client_id')->constrained()->cascadeOnDelete();
      $table->foreignId('task_id')->nullable()->constrained()->cascadeOnDelete();
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
    Schema::dropIfExists('client_educations');
  }
}

