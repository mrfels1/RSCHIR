<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\UpdateBookRequest;

class BooksAndAuthorsController extends Controller
{
    public function books()
    {
        return inertia('Books');
    }

    public function author($id)
    {
        $author = Author::findOrFail($id);
        return inertia('Author', compact('author'));
    }
    
}