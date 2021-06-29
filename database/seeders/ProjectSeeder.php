<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Project;
use App\Models\Technology;
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
        Candidate::all()->each(function($candidate) {
            return Project::factory(3)->create(['candidate_id' => $candidate->id])
                ->each(function($project) {
                    $technology = Technology::take(3)->inRandomOrder()->get();
                        return $project->technologies()->sync($technology);
            });
        });
    }
}
