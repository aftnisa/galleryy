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
        Schema::create('like_foto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('foto_id');
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal_like')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_foto');
    }


};
