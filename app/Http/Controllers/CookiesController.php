<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class CookiesController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('Cookies', [
            'cookies' => $request->cookie('user_data')
        ]);
    }
}