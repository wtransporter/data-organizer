<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Models\Candidate;

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
        return view('candidates.show', compact('candidate'));
    }

    /**
     * Display form for creating new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
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
        $candidate->create($request->validated());

        return redirect()->route('dashboard')->with('message', 'Candidate successfully added');
    }
}
