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
        Schema::create('foto', function (Blueprint $table) {
            $table->id();
            $table->string('judul_foto');
            $table->text('deskripsi_foto');
            $table->date('tanggal_unggah')->nullable();
            $table->string('lokasi_file');
            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('likes')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
