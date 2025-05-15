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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_open');
            $table->string('problem type', 100);
            $table->string('report by', 100);
            $table->string('company', 100);
            $table->text('detail_problem');
            $table->string('handle_by', 100);
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open'); 
            $table->text('detail_solution'); 
            $table->date('tanggal_close'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
