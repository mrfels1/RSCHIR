<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class SortingController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return Inertia::render('Sorting', ['array' => $request->query('array')]);
    }
}