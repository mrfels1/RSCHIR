<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DrawerController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return Inertia::render('Drawer', ['num' => $request->query('num')]);
    }
}