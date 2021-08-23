<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbtiDevelopmentSuggestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbti_development_suggestion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mbti_interprestation_id')->constrained('mbti_interprestation')->onUpdate('cascade')->onDelete('cascade');
            $table->string('development_suggestion');
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
        Schema::dropIfExists('mbti_development_suggestion');
    }
}
