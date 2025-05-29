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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id('ruangan_id');
            $table->unsignedBigInteger('gedung_id');
            $table->string('nama_ruangan');
            $table->integer('kapasitas');
            $table->text('deskripsi')->nullable();
            $table->boolean('tersedia')->default(true);
            $table->timestamps();

            $table->foreign('gedung_id')->references('gedung_id')->on('gedungs')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
