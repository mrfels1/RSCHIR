<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Resources\AuthorResource;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Author::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'revenue' => $request->revenue,
        ]);

        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        if ($request->author_id) {
            $author = Author::find($request->author_id);
            if (!$author) {
                return response()->json(['message' => 'Author does not exist'], 422);
            }
        }
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author does not exist'], 404);
        }
        $author->update($request->only([
            'name',
            'date_of_birth',
            'revenue',
            
        ]));
        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json(['message' => 'Author does not exist'], 404);
        }
        $author->delete();
        return response()->json(['message' => 'Author deleted successfully']);
    }
}

