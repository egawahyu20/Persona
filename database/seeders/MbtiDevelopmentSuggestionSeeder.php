<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;


class MbtiDevelopmentSuggestionSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeder-excel/MBTIDevelopmentSuggestion.xlsx';
        $this->tablename = 'mbti_development_suggestion';
        $this->timestamps = now();
        
        parent::run();
    }
}
