<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::take(5)->get()->each(function($candidate) {
            return Project::factory(2)->create(['candidate_id' => $candidate->id]);
        });
    }
}
