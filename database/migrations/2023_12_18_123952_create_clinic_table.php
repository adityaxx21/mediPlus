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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Rumah Sakit', 'Klinik', 'Praktek Dokter']);
            $table->string('alamat');
            $table->string('image')->nullable();
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
