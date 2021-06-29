<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::factory(20)->create()->each(function($candidate) {
                $technology = Technology::take(3)->inRandomOrder()->get();
                    return $candidate->technologies()->sync($technology);
            });
    }
}
