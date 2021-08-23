<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesMbtiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_mbti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan')->constrained('perusahaan')->onUpdate('cascade')->onDelete('restrict');
            $table->char('token',8);
            $table->string('keterangan');
            $table->date('tanggal_dibuka');
            $table->date('tanggal_ditutup');
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
        Schema::dropIfExists('tes_mbti');
    }
}
