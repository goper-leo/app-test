<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Passer;

class PassersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $campus_eligibility = [
            'main',
            'evc',
            'src',
            'crc',
            'zrc',
            'smc',
            'carc',
            'wvc',
            'asd',
        ];

        $division = [
            'laguna',
            'tacloban city',
            'davao city',
            'cebu city',
            'marawi city',
            'quezon city',
            'baguio city',
            'surigao city',
            'panabo city',
            'tagum city',
            'surigao del sur',
            'zamboanga del sur',
            'bohol',
            'palawan',
            'dagupan city',
            'bulacan city',
            'masbate',
            'lanao del sur',
            'ilocos',
        ];

        // Seed 300 records
        for ($i=0; $i < 300; $i++) {
            Passer::create([
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'campus_eligibility' => $faker->randomElement($campus_eligibility),
                'school' => $faker->word . ' ' . $faker->word . ' ' . $faker->randomElement(['school', 'college', 'university']),
                'division' => $faker->randomElement($division),
            ]);
        }
    }
}
