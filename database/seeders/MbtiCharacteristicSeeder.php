<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;


class MbtiCharacteristicSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeder-excel/MBTICharacteristic.xlsx';
        $this->tablename = 'mbti_characteristics';
        $this->timestamps = now();
        
        parent::run();
    }
}
