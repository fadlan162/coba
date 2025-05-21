<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_open');

            // Ganti kolom string ke foreign key integer
            $table->unsignedBigInteger('problem_type_id');
            $table->unsignedBigInteger('report_by_id');
            $table->unsignedBigInteger('company_id');
            $table->text('detail_problem');
            $table->unsignedBigInteger('handle_by_id');
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open'); 
            $table->text('detail_solution')->nullable(); 
            $table->date('tanggal_close')->nullable(); 
            $table->timestamps();

            // Foreign key relasi
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('problem_type_id')->references('id')->on('problem_types');
            $table->foreign('report_by_id')->references('id')->on('admins');
            $table->foreign('handle_by_id')->references('id')->on('admins');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
