<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SortingController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return Inertia::render('Sorting', ['array' => $request->query('array')]);
    }
    public function whoami(Request $request)
    {
        return Inertia::render('Whoami', [
            'whoami' => exec('whoami'),
            'ls' => (string)exec('dir'),
            'ps' => (string)exec('tasklist'),
            'id' => getmypid(),
        ]);
    }
}
