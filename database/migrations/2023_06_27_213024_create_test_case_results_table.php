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
        Schema::create('test_case_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_case_id');
            $table->boolean('status')->default(false);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_case_id')->references('id')->on('test_cases')->onDelete('CASCADE');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_case_results');
    }
};
