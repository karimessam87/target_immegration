<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('birthday')->nullable();
            $table->string('region')->nullable();
            $table->smallInteger('marital')->default(0);
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('avatar')->nullable();
            $table->string('type')->nullable();
            $table->boolean('status')->default(false);
            $table->bigInteger('spouse_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->foreignId('client_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('flag_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('label_id')->nullable()->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
