<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Http\Requests\CreateCandidateTechnologyRequest;

class CandidateTechnologyController extends Controller
{
    /**
     * Store given resource to database
     *
     * @param Candidate $candidate
     * @param CreateCandidateTechnologyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, CreateCandidateTechnologyRequest $request)
    {
        $candidate->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.show', $candidate)
            ->with('message', 'Technology successfully assigned/unassigned');
    }
}
