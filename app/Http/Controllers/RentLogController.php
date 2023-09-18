<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        // untuk menampilkan catatan sewa
        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('rent.rentlogs', ['rent_logs' => $rentlogs]);
    }
}
