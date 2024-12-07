<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('Upload');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => ['required', 'mimes:pdf', 'max:2048'],
        ]);

        $request->file('pdf')->store('pdfs', 'public');

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    
    
    public function getFiles()
    {
        $files_array = File::allFiles(storage_path('app/public/pdfs'));
        $files = array_map(function ($file) {
            return basename($file);
        }, $files_array);
        
        return Inertia::render('PdfFiles', [
            'files' => $files,
        ]);
    }

}
