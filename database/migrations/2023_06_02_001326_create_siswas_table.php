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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nama');
            $table->enum('kelas', ['X TKJ 1', 'X TKJ 2', 'X TKJ 3', 'X MM 1', 'X MM 2', 'X RPL 1', 'X RPL 2', 'X BC', 'XI TKJ 1', 'XI TKJ 2', 'XI TKj 3', 'XI MM 1', 'XI MM 2', 'XI RPL 1', 'XI RPL 2', 'XI BC', 'XII TKJ 1', 'XII TKJ 2', 'XII TKj 3', 'XII MM 1', 'XII MM 2', 'XII RPL 1', 'XII RPL 2', 'XII BC']);
            $table->string('alamat');
            $table->enum('jenisKelamin',['Laki-laki','Perempuan']);
            $table->date('tglLahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
