<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology::insert([
            [
                'title' => 'PHP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wordpress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Vue.js',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'JS',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
