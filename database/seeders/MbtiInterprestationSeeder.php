<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;


class MbtiInterprestationSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeder-excel/MBTIInterprestation.xlsx';
        $this->tablename = 'mbti_interprestation';
        $this->timestamps = now();
        
        parent::run();
    }
}
