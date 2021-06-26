<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCandidateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_user_may_not_see_dashboard()
    {
        $this->get('/dashboard')->assertRedirect('login');
    }

    /** @test */
    public function unauthenticated_user_may_not_see_candidate()
    {
        $candidate = Candidate::factory()->create();

        $this->get('candidates/' . $candidate->id)->assertRedirect('login');
    }

    /** @test */
    public function unauthenticated_user_may_not_create_candidate()
    {
        $this->get('candidates/create')->assertRedirect('login');
    }

    /** @test */
    public function authenticated_user_may_create_candidate()
    {
        $this->signIn();

        $candidate = Candidate::create([
            'name' => 'Test Candidate',
            'address' => 'Street address',
            'phone' => '0123456',
            'college' => 'Some college'
        ]);

        $this->post('candidates/store', $candidate->toArray());
        
        $this->assertDatabaseHas('candidates', ['name' => $candidate->name]);
    }

    /** @test */
    public function authenticated_user_may_see_candidate()
    {
        $this->signIn();

        $candidate = Candidate::factory()->create();

        $response = $this->get('candidates/' . $candidate->id);

        $response->assertSee(['name' => $candidate->name]);
    }
}