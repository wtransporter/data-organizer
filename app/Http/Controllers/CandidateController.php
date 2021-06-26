<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class CandidateController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'candidates' => Candidate::paginate(12)
        ]);
    }
}
