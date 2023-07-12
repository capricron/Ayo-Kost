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
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penghuni')
                ->references('id')
                ->on('users');
            $table->integer('id_kost')
                ->references('id')
                ->on('kosts');
            $table->integer('kamar');
            $table->date('tanggal_masuk')->nullable();
            $table->string('bukti');
            $table->string('acc')->nullable();
            $table->integer('lama_sewa');
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
        Schema::dropIfExists('penghunis');
    }
};
