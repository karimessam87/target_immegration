<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('description');
      $table->smallInteger('status')->default(0);
      $table->time('due_time');
      $table->time('expire_time');
      $table->foreignId('flag_id')->constrained()->cascadeOnDelete();
      $table->foreignId('label_id')->nullable()->constrained()->cascadeOnDelete();
      $table->foreignId('leader_id')->nullable()->constrained('employees', 'id')->cascadeOnDelete();
      $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnDelete();
      $table->foreignId('task_type_id')->constrained()->cascadeOnDelete();
      $table->date('due_date');
      $table->date('expire_date');
      $table->timestamp('started_at');
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
    Schema::dropIfExists('tasks');
  }
}
