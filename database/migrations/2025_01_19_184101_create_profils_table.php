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
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mhs');
            $table->string('nim_mhs');
            $table->unsignedBigInteger('id_prodi'); // Foreign key
            $table->string('tahun_lulus');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->unsignedBigInteger('id_user'); // Foreign key
            $table->foreign('id_prodi')->references('id')->on('prodi')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil');
    }
};
