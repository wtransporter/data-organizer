<?php

namespace Database\Seeders;

use App\Models\Technology;
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
        $this->call([
            UserSeeder::class,
            TechnologySeeder::class,
            CandidateSeeder::class,
            ProjectSeeder::class,
            TagSeeder::class
        ]);
    }
}
