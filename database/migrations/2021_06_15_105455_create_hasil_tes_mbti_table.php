<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTesMbtiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tes_mbti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tes')->constrained('tes_mbti')->onUpdate('cascade')->onDelete('restrict');
            $table->string('nama_peserta_tes', 100);
            $table->string('personality', 4);
            $table->float('I', 5, 2);
            $table->float('E', 5, 2);
            $table->float('S', 5, 2);
            $table->float('N', 5, 2);
            $table->float('T', 5, 2);
            $table->float('F', 5, 2);
            $table->float('J', 5, 2);
            $table->float('P', 5, 2);
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
        Schema::dropIfExists('hasil_tes_mbti');
    }
}
