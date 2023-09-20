<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        // untuk menampilkan daftar buku pada halaman public
        $search = $request->category;
        $categories = Category::get();
        if ($request->category || $request->title) {
            $books = Book::whereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })
                ->get();
        } else {
            $books = Book::all();
        }
        return view('book.book-list', ['books' => $books, 'categories' => $categories, 'search' => $search]);
    }
}
