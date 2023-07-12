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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->integer('id_user')
                ->references('id')
                ->on('users');
            $table->string('slug');
            $table->string('alamat');
            $table->string('deskripsi');
            $table->string('foto');
            $table->string('fasilitas');
            $table->integer('harga');
            $table->string("bank");
            $table->string("no_rekening");
            $table->integer('jumlah_kamar');
            $table->string('disetujui')->default(false);
            $table->string("bukti")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kosts');
    }
};
