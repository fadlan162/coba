<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsOnReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Ubah nama kolom di sini
            $table->renameColumn('problem type', 'problem_type');
            $table->renameColumn('report by', 'report_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Kembalikan ke nama kolom semula
            $table->renameColumn('problem_type', 'problem type');
            $table->renameColumn('report_by', 'report by');
        });
    }
}
