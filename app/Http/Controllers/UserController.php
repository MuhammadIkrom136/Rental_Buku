<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        // untuk mengarahkan user ke halaman profile
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('user.profile', ['rent_logs' => $rentlogs]);
    }
    public function index(Request $request)
    {
        // untuk mencari user berdasarkan username
        $search = $request->search;
        $users = User::where('username', 'LIKE', '%' . $search . '%')
            ->where('role_id', 2)->where('status', 'active')->get();
        if ($users->count() <= 0) {
            $users = User::get();
        }
        // $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user.users', ['users' => $users, 'search' => $search]);
    }
    public function registeredUser()
    {
        // untuk membuat akun baru
        $registeredUser = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('user.registered-user', ['registeredUsers' => $registeredUser]);
    }
    public function show($slug)
    {
        //  untuk melihat detail pada user
        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user.user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }
    public function approve($slug)
    {
        // untuk mengaktifkan user
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('registered-users/')->with('status', 'Berhasil Mengonfirmasi Pengguna !');
    }
    // public function delete($slug)
    // {
    //     $user = User::where('slug', $slug)->first();
    //     return view('user.user-delete', ['user' => $user]);
    // }
    public function destroy(Request $request)
    {
        // unntuk menghapus user
        $user = User::where('slug', $request->slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'Berhasil Memblokir Pengguna !');
    }
    public function banned()
    {
        // agar tidak terhapus di database
        $banned = User::onlyTrashed()->get();
        return view('user.user-banned', ['banned' => $banned]);
    }
    public function restore($slug)
    {
        // untuk memulihkan user yang dihapus
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'Berhasil Memulihkan Pengguna !');
    }
}
