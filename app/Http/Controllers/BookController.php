<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use App\Models\Author;

use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $id = $request->query('id');
        if (isset($id)) {
            return Book::where('author_id', $request->query('id'))->get();
        }
        return Book::all();
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
    public function store(StoreBookRequest $request)
    {
        $author = Author::find($request->author_id);
        if (!$author) {
            return response()->json(['message' => 'Author does not exist'], 422);
        }
        
        $book = Book::create([
            'name' => $request->name,
            'author_id' => $request->author_id,
            'date_of_publishing' => $request->date_of_publishing,
        ]);

        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book does not exist'], 404);
        }

        return new BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        if ($request->author_id) {
            $author = Author::find($request->author_id);
            if (!$author) {
                return response()->json(['message' => 'Author does not exist'], 422);
            }
        }
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book does not exist'], 404);
        }
        $book->update($request->only([
            'name',
            'author_id',
            'date_of_publishing',
        ]));

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book does not exist'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully']);
    }
}
