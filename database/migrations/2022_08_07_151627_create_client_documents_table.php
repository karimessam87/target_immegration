<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('country_issue');
            $table->string('file');
            $table->date('issue_date');
            $table->date('expire_date');
            $table->foreignId('document_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('flag_id')->constrained()->cascadeOnDelete();
            $table->foreignId('label_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('documents');
    }
}
