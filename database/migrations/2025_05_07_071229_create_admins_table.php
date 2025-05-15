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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();                          // Kolom id, auto increment
            $table->string('name');                 // Kolom name untuk nama admin
            $table->string('email')->unique();      // Kolom email yang unik
            $table->string('profile_picture')->nullable(); // Kolom foto profil, nullable jika tidak ada foto
            $table->timestamps();                   // Kolom created_at dan updated_at
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
