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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ruangan_id');
        
            $table->date('tanggal'); 
            $table->date('tanggal'); 
            $table->time('jam_mulai'); 
            $table->time('jam_selesai'); 
        
            $table->text('keperluan');
            $table->enum('status', ['disetujui', 'menunggu', 'ditolak'])->default('menunggu');
            $table->text('alasan_penolakan')->nullable();
            $table->timestamp('tanggal_pengajuan')->useCurrent();
            $table->timestamps();
        
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('ruangan_id')->on('ruangans')->onDelete('cascade');
        });
        


            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('ruangan_id')->on('ruangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
