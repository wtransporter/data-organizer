<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCandidateProjectRequest;
use App\Models\Candidate;
use App\Models\Technology;

class CandidateProjectController extends Controller
{
    /**
     * Show form for creating new resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate)
    {
        return view('projects.create', [
            'candidate' => $candidate,
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Candidate $candidate
     * @param CreateCandidateProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, CreateCandidateProjectRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $project = $candidate->projects()->create($attributes);
        $project->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.projects.create', $candidate)
            ->with('message', 'Project ' . $project->title . ' successfully added');
    }
}
