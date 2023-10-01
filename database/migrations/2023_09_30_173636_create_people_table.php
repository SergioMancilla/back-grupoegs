<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_type');
            $table->string('id_number')->unique();
            $table->string('names');
            $table->string('last_name');
            $table->string('middle_name');
            $table->date('born_date');
            $table->unsignedBigInteger('born_city');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('document_type')->references('id')->on('document_types');
            $table->foreign('born_city')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
