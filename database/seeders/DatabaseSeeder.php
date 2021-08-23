<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(SoalTesSeeder::class);
        $this->call(MbtiInterprestationSeeder::class);
        $this->call(MbtiDevelopmentSuggestionSeeder::class);
        $this->call(MbtiCharacteristicSeeder::class);
        $this->call(MbtiCarrierSuggestionSeeder::class);
        $this->call(IndoRegionSeeder::class);
    }
}
