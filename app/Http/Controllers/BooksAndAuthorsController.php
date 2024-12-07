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
    
    
    public function statistics()
    {
        $authorCount = Author::count();
        $bookCount = Book::count();

        $maxRevenue = Author::max('revenue');
        $minRevenue = Author::min('revenue');

        $maxBooks = Book::groupBy('author_id')->selectRaw('author_id, COUNT(*) as book_count')->orderBy('book_count', 'desc')->first()->book_count;
        $minBooks = Book::groupBy('author_id')->selectRaw('author_id, COUNT(*) as book_count')->orderBy('book_count', 'asc')->first()->book_count;

        $authorsRevenues = Author::whereNotNull('revenue')->get()->map(function($author) {
            return [ 'id' => $author->id, 'revenue' => $author->revenue ];
        })->toArray();
        $authorsBookCounts = Author::all()->map(function($author) {
            return [ 'id' => $author->id, 'bookCount' => $author->books()->count() ];
        })->toArray();
        $booksWithPublishingDates = Book::all()->map(function($book) {
            return ['id' => $book->id, 'date_of_publishing' => $book->date_of_publishing];
        })->toArray();
        
        $graph = imagecreate(1000, 500);
        $white = imagecolorallocate($graph, 255, 255, 255);
        $black = imagecolorallocate($graph, 0, 0, 0);
        $red = imagecolorallocate($graph, 255, 0, 0);
        $watermark = imagecolorallocatealpha($graph, 128, 128, 128, 20);
        
        // draw x-axis
        imageline($graph, 50, 499, 1000, 499, $black);
        // draw y-axis
        imageline($graph, 50, 50, 50, 500, $black);
        
        imagestring($graph, 5, 40, 485, '0', $black);
        imagestring($graph, 5, 40, 40, $maxRevenue, $black);
        imagestring($graph, 5, 975, 485, $authorCount, $black);

        $points = [];
        


        foreach($authorsRevenues as $author) {
            $xnormalized = ((int)$author['id'] - 0)/((int)$authorCount - 1);
            $ynormalized = ((int)$author['revenue']- 0)/((int)$maxRevenue -$minRevenue);
            $x = $xnormalized * 900;
            $y = $ynormalized * 400;
            $points[] = [ 'x' => (int) $x+50, 'y' => (int) $y+50 ];

        }
        
        foreach($points as $point) {
            $x = $point['x'];
            $y = $point['y'];
            for($i = -2; $i <= 2; $i++) {
                for($j = -2; $j <= 2; $j++) {
                    imagesetpixel($graph, $x + $i, $y + $j, $red);
                }
            }
        }
        

        for($x = 50; $x < 1000; $x += 50) {
            for($y = 50; $y < 500; $y += 50) {
                imagestring($graph, 5, $x, $y, "KDD", $watermark);
            }
        }

        imagepng($graph, storage_path('app/public/revenuebooks.png'));
        imagedestroy($graph);

        $graphBooks = imagecreatetruecolor(1000, 500);
        $white = imagecolorallocate($graphBooks, 255, 255, 255);
        $black = imagecolorallocate($graphBooks, 0, 0, 0);
        $blue = imagecolorallocate($graphBooks, 0, 0, 255);
        imagefill($graphBooks, 0, 0, $white);

        // draw x-axis
        imageline($graphBooks, 50, 499, 1000, 499, $black);
        // draw y-axis
        imageline($graphBooks, 50, 50, 50, 500, $black);

        imagestring($graphBooks, 5, 40, 485, '0', $black);
        imagestring($graphBooks, 5, 40, 40, $maxBooks, $black);
        imagestring($graphBooks, 5, 975, 485, $authorCount, $black);

        $pointsBooks = [];

        foreach($authorsBookCounts as $author) {
            $xnormalized = ((int)$author['id'] - 0)/((int)$authorCount - 1);
            $ynormalized = ((int)$author['bookCount'] - 0)/((int)$maxBooks - $minBooks);
            $x = $xnormalized * 900;
            $y = $ynormalized * 400;
            $pointsBooks[] = [ 'x' => (int) $x + 50, 'y' => (int) $y + 50 ];
        }

        foreach($pointsBooks as $point) {
            $x = $point['x'];
            $y = $point['y'];
            for($i = -2; $i <= 2; $i++) {
                for($j = -2; $j <= 2; $j++) {
                    imagesetpixel($graphBooks, $x + $i, $y + $j, $blue);
                }
            }
        }

        imagepng($graphBooks, storage_path('app/public/authorbooks.png'));
        imagedestroy($graphBooks);

        return inertia('Statistics');
    }

}