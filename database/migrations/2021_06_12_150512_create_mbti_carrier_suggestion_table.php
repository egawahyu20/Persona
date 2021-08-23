<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbtiCarrierSuggestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_carrier_suggestion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mbti_interprestation_id')->constrained('mbti_interprestation')->onUpdate('cascade')->onDelete('cascade');
            $table->string('carrier_suggestion');
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
        Schema::dropIfExists('mbti_carrier_suggestion');
    }
}
