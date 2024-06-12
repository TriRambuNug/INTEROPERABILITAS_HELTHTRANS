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
        Schema::create('ambulan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petugas_id')->constrained('petugas');
            $table->foreignId('rumah_sakit_id')->constrained('rumah_sakit');
            $table->string('lokasi');
            $table->string('tipe');
            $table->string('plat_nomor');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulan');
    }
};
