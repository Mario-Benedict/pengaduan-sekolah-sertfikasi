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
        Schema::create('input_aspirasis', function (Blueprint $table) {
            $table->id('id_pelaporan');
            $table->string('nisn', 10);
            $table->unsignedBigInteger('id_kategori');
            $table->string('lokasi', 50);
            $table->string('ket', 50);
            $table->timestamps();

            $table->foreign('nisn')->references('nisn')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirasis');
    }
};
