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
        Schema::create('antrian_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('antrian_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->unique(['antrian_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrian_user');
    }
};
