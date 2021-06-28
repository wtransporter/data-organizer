<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;

class CandidateController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'candidates' => Candidate::latest()->paginate(12)
        ]);
    }

    /**
     * Show specified resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('candidates.show', [
            'candidate' => $candidate->load('technologies'),
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Display form for editing given resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', [
            'candidate' => $candidate,
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Candidate $candidate
     * @param StoreCandidateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Candidate $candidate, StoreCandidateRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $candidate->update($attributes);
        $candidate->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.edit', $candidate)->with('message', 'Candidate updated');
    }

    /**
     * Display form for creating new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create', [
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Store a newly created resource
     * 
     * @param Candidate $candidate
     * @param StoreCandidateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, StoreCandidateRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $newCandidate = $candidate->create($attributes);

        $newCandidate->assignTechnology($request->get('technologies'));

        return redirect()->route('dashboard')->with('message', 'Candidate successfully added');
    }
}
