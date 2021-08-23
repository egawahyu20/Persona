<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;


class MbtiCarrierSuggestionSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeder-excel/MBTICarrierSuggestion.xlsx';
        $this->tablename = 'mbti_carrier_suggestion';
        $this->timestamps = now();
        
        parent::run();
    }
}
