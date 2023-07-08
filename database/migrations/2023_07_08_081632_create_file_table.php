<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pengumpulan_id");
            $table->foreignId('materi_id');
            $table->string("kategori_anggota");
            $table->string("file_pengumpulan");
            $table->string("kategori_mentor");
            $table->string("file_materi");
            $table->string("deskripsi", 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
    }
};
