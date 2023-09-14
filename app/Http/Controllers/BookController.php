<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        //untuk mencari nama buku dengan title
        $search = $request->search;
        $books = Book::where('title', 'LIKE', '%' . $search . '%')
            ->get();
        if ($books->count() <= 0) {
            $books = Book::get();
        }
        return view('book.books', ['books' => $books, 'search' => $search]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('book.book-add', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        // untuk menambahkan buku baru
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);
        // jika menambahkan buku dengan gambar
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }
        // jika tidak menambahkan buku dengan gambar
        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        return redirect('books')->with('status', 'Book Added Succesfully !');
    }
    public function edit($slug)
    {
        // untuk mengedit buku
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('book.book-edit',  ['categories' => $categories, 'book' => $book]);
    }
    public function update(Request $request, $slug)
    {
        // untuk mengupdate foto buku
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }
        // untuk menambahkan buku berdasarkan kategori
        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());
        if ($request->categories) {
            $book->categories()->sync($request->categories);
        }
        return redirect('books')->with('status', 'Berhasil Memperbarui Buku !');
    }
    // public function delete($slug)
    // {
    //     $book = Book::where('slug', $slug)->first();
    //     return view('book.book-delete', ['book' => $book]);
    // }
    public function destroy(Request $request)
    {
        // untuk menghapus buku
        $book = Book::where('slug', $request->slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Berhasil Menghapus Buku !');
    }
    public function deletedBook()
    {
        $deletedBook = Book::onlyTrashed()->get();
        return view('book.book-deleted-list', ['deletedBooks' => $deletedBook]);
    }
    public function restore($slug)
    {
        // untuk memulihkan buku yang dihapus
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Berhasil Memulihkan Buku !');
    }
}
