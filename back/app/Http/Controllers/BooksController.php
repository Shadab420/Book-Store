<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function index()
    {
    	// return response()->json(Book::all());

        $books = Book::with(['Author', 'Category', 'Publication'])->get();

        return response()->json($books);

    }

    public function show($input)
    {
        $relatedBooks = Book::with(['Author','Category','Publication'])
                        ->where('title', '=', $input)
                        ->get();

    	
    	return response()->json($relatedBooks);
    }


}
