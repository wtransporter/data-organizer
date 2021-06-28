<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'candidate_id' => Candidate::factory(),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(25)
        ];
    }
}
