<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', 'active')->get();
        $books = Book::all();
        return view('rent.book-rent', ['users' => $users, 'books' => $books]);
    }
    public function store(Request $request)
    {
        // untuk peminjaman buku
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(5)->toDateString();
        $booka = Book::find($request->book_id);
        if(is_null($booka)){
            Session::flash('message', 'Tolong masukkan data !');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }

        $book = $booka->only('status');
        // jika buku yang dipilih untuk di pinjam sedang tidak tersedia, maka tidak dapat dipinjam
        if ($book['status'] != 'tersedia') {
            Session::flash('message', 'Tidak dapat menyewa buku, buku sedang tidak tersedia !');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        } else {
            // jika user telah mencapai batas peminjaman, maka tidak dapat meminjam buku
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            if ($count >= 3) {
                Session::flash('message', 'Tidak dapat menyewa buku, pengguna telah mencapai batas buku !');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            } else {
                // jika user dan buku yang dipilih untuk di dipinjam benar, maka berhasil dipinjam
                try {
                    DB::beginTransaction();
                    RentLogs::create($request->all());
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'tidak tersedia';
                    $book->save();
                    DB::commit();
                    Session::flash('message', 'Berhasil Meminjam Buku !');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('book-rent');
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        $users = User::where('id', '!=', 1)->where('status', 'active')->get();
        $books = Book::all();
        return view('rent.return-book', ['users' => $users, 'books' => $books]);
    }

    public function saveReturn(Request $request)
    {
        // user dan buku yang dipilih untuk di kembalikan benar, maka berhasil dikempalikan
        // user dan buku yang dipilih untuk dikembalikan, maka muncul notif error

        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)
            ->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
        $booka = Book::find($request->book_id);
        if(is_null($booka)){
            Session::flash('message', 'Tolong masukkan data !');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }

        if ($countData == 1) {
            // akan mengembalikan buku
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
            $booka->status = 'tersedia';
            $booka->save();
            Session::flash('message', 'Buku berhasil dikembalikan !');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            // error pengembalian
            Session::flash('message', 'Data yang dimasukkan salah !');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
}
