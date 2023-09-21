<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentLogController extends Controller
{
    public function index(Request $request)
    {
        // untuk menampilkan catatan sewa
        // $search = $request->query("search");

        // if (isset($search)) {
        //     $rentlogs = DB::table("rent_logs as rl")
        //         ->join('users as u', "u.id", '=', 'rl.user_id')
        //         ->join("books as b", 'b.id', '=', 'rl.book_id')
        //         ->where("u.username", 'LIKE', "%" . $search . "%")
        //         ->get();
        // } else {
            $rentlogs = RentLogs::with(['user', 'book'])->get();
        //     $rentlogs = DB::table("rent_logs as rl")
        //         ->join("users as u", 'u.id', '=', 'rl.user_id')
        //         ->join('books as b', 'b.id', '=', 'rl.book_id')
        //         ->get();
        // }
        return view('rent.rentlogs', ['rent_logs' => $rentlogs,]);
    }
}
