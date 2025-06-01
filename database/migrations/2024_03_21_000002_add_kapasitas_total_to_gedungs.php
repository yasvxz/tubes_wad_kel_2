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
        if (!Schema::hasColumn('gedungs', 'kapasitas_total')) {
            Schema::table('gedungs', function (Blueprint $table) {
                $table->integer('kapasitas_total')->default(0)->after('deskripsi');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('gedungs', 'kapasitas_total')) {
            Schema::table('gedungs', function (Blueprint $table) {
                $table->dropColumn('kapasitas_total');
            });
        }
    }
}; 